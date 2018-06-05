<?php
/* nov 16
copy cluster
*/
/* mei 14
cluster, rond regel 230, de volgorde:
nieuw art toevoegen
 - mag niet dan: del art, en ga door
 upd dates
 - mag niet dan: del art, en ga door
upd status
upd statics
refresh
//not here: upd dates

*/
/**
* Interface form for placing/modifying/viewing a reservation
* This file will present a form for a user to
*  make a new reservation or modify/delete an old one.
* It will also allow other users to view this reservation.
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 02-07-09
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

include_once('lib/Resource.class.php');
include_once('lib/Template.class.php');
include_once('lib/helpers/ReservationHelper.class.php');
include_once('lib/Utility.class.php');
require_once('lib/Time.class.php');
include_once('lib/copycluster.class.php');
$Class = 'Reservation';

$timer = new Timer();
$timer->start();



if ((!isset($_GET['read_only']) || !$_GET['read_only']) && $conf['app']['readOnlyDetails']) {
	// Make sure user is logged in
	if (!Auth::is_logged_in()) {
		Auth::print_login_msg();
	}
}

$t = new Template();

	if ((isset($_POST['btnSubmit'])||isset($_POST['btnSubmitAndCluster'])) && strstr($_SERVER['HTTP_REFERER'], $_SERVER['PHP_SELF'])) {
	
		$t->set_title(translate("Processing $Class"));
		$t->printHTMLHeader();
		$t->startMain();
// echo ('<br>PROCESS starts with fn en btnsubmit: '.$fn.' '. $_POST['btnSubmit']);// testing
		if ($_POST['fn'] == 'clustercopy' or true) {
			process_reservation_make_cluster_copy($_POST['fn']); //ALWAYS TRUE
		}else{
			process_reservation($_POST['fn']);
		}
	}
	else {
		$res_info = getResInfo();
		$t->set_title($res_info['title']);
		$t->printHTMLHeader();
		$t->startMain();
// echo ('<br>PRESENT starts with fn en btnsubmit: '.$fn .' '.  $_POST['btnSubmit']);// testing
		present_reservation($res_info['resid']);
	}

// End main table
$t->endMain();

$timer->stop();
$timer->print_comment();

// Print HTML footer
$t->printHTMLFooter();

/**
* Processes a reservation request (copy)   NOT(add/del/edit)
* @param string $fn function to perform

in $fn = copy
in resid = resid en clusterid

save (add) with new:
resid // add 
clusterid // add

new:
starttimes
endtimes
user (= lener) = admin
notities.' copy'


*/ 

function process_reservation_make_cluster_copy($fn) 
{
	echo $fn; //CLUSTERCOPY always
	//echo "Copy Success!"; //CLUSTERCOPY always
	$Class = 'Reservation';

	if (isset($_POST['newid'])) //jarocc
	{ //echo "newid:$_POST['newid']";
		$res = new $Class($_POST['newid'], false, $is_pending);
		//echo('<br>resobjectp :'. $_POST['newid']); //janrtesting
		$oudresid = $_POST['resid']; // jaro
		$_POST['resid'] = $_POST['newid']; // jarocc
	}
	else if (isset($_GET['newid']))
	{
		$res = new $Class($_GET['newid'], false, $is_pending);
		//echo ('<br>resobjectg :'. $_GET['resid']); //janrtesting
		$oudresid = $_POST['resid']; // jaro
		$_POST['resid'] = $_POST['newid']; // jarocc
	}
///////////////
	$cur_user = new User(Auth::getCurrentID());
//	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || ($fn != 'create' && 	$cur_user->is_group_admin($res->user->get_groupids()));
	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || ($fn != 'create' && $cur_user->is_group_admin($res->user->get_groupids()) || $cur_user->is_schedule_admin($res->get_scheduleid()));

//	if (Auth::isAdmin() || $cur_user->get_isadmin())
	if (Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_schedule_admin($res->get_scheduleid()))	
	{
		$res->is_pending = false;	
	}
///////////////
	//$cur_user = new User($_POST['memberid']);
	$res->user 		= new User($_POST['memberid']);
	$invited = (isset($_POST['memberid'])) ? $_POST['memberid'] : array();
	//$users_to_invite = $helper->getRowsForInvitation(array(), $invited);
	
	// user updaten
			$res->mod_res($invited, array(), array(), $_POST['selected_resources'], array(), isset($_POST['del']), isset($_POST['mod_recur'])); // jarocc success

/// inlezen de rij van machids die we willen kopieren 
			if ( $res->clusterid <> null ) {
				$cresids = $res->db->get_cluster_resids($oudresid);   // terug komt array van machids
			
				for ($i = 0; $i < count($cresids); $i++)  {
					 $cres = new Reservation($cresids[$i]); //PIKE
				
					$newres = new $Class(null, false, false);
					// var_dump ($newres);
					$newres->id = $_REQUEST['resid'];
					// echo ('request machid'. $_REQUEST['machid1']); //TEST
					$newres->load_by_id();
					//$newres->machid = $cres->resource->machid; // welk artikel
					$newmachid = $cres->resource->machid; // welk artikel
					
					// res-regel krijgt nieuw: - machid, id
					// de master-machid hebben we al
					if ($_POST['machid'] <> $newmachid) {
							$newid = $newres->db->add_res_copycluster_slave($res,null,array(),array(),null, $newmachid); // toevoegen
							//echo ('Toegevoegd:'.$newmachid.' - '.$_POST['machid']);
					}
				}
			}
///
			
	//print_r ($_POST); 
	echo "Copy Success!";
	//echo "<br>=class:$Class";
	//var_dump ($res);
						print ('<br>Moment...');

					// $returnid is de resid van het zojuist gemaakte r nieuwe reservering
					// de $returnid is bekend in php, moet in deze javascript terechtkomen 
					echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
					echo "	reserve('c','','','{$res->clusterid}','','','','','','','2500');\n";
					echo "</script>\n";
//die;
}




/**
* Prints out reservation info depending on what parameters
*  were passed in through the query string
* @param none
*/
function present_reservation($resid) {
	global $Class;

	// Get info about this reservation
	// echo ('$Class = '.$Class); // goed = reservation
	$res = new $Class($resid, false, false, $_GET['scheduleid']);
	//var_dump ($res);
	// Load the properties
	// JARO FORCE NEW FIELD VALUES
	if ($resid == null OR TRUE) { // JARO
		
				////////// set end date and end time. copied from check and update.php
					/// begin set tijdwaardes
							$gmtimenow = time() - (int)substr(date('O'),0,3)*60*60; 
							$offset = -60; // minuten tov GMT local xampp
							$midnight = strtotime('00:00');
														$epochseconds = gettimeofday(true);
														$timeofdayseconds = $epochseconds - $midnight;
														$timeofdayminutes = $timeofdayseconds/60;
														$timeofdayhour = $timeofdayminutes/60;
														$timeofdaylasthourinminutes = floor($timeofdayhour)*60;
							$time_nu = $timeofdaylasthourinminutes + $offset; // laatst verstreken uur in minuten na middernacht
							$dag_nu = Time::getAdjustedDate($gmtimenow); //DIT IS DAG nu in seconden
							
							$dag_verschil = 86400; // dag verchil is 86400 = 3600 x 24, in seconden
							$uur_verschil = 60; // uurverschil is 60, in minuten
					/// einde set tijdwaardes					
////////// end timings
					$oldresdate=$res->end_date; 
					$oldrestime=$res->end;
					
					$res->start_date = $dag_nu; 	// jaro
					$res->start = $time_nu;			// jaro
					$res->end_date = $dag_nu;		// jaro
					$res->end = $time_nu+$uur_verschil;		// jaro
						
					
					$res->oldid = $res->id; // jaro
					//$res->newid = 										// get_new_id, NOT load_by_id();; // jaro
					$res->reservation_status = 0; // jaro, THIS IS THE MASTER
		
		$res->user = new User(Auth::getCurrentID()); //jaro
		//$res->is_pending = $_GET['pending'];

		// $res->mod = $_GET['mod'];   //janr
		//$res->resource = new Resource($_GET['machid']); LATER = jaro
	}

	
	// $cur_user = new User(Auth::getCurrentID());
	$cur_user = $res->user;
	
//	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_group_admin($res->user->get_groupids() );
	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_group_admin($res->user->get_groupids()) || $cur_user->is_schedule_admin($res->get_scheduleid());
// janr , userlogin
//	if (!($res->adminMode)) { $res->userMode = true; // you are useruserlogin}
//	}// janr

	
//	if (Auth::isAdmin() || $cur_user->get_isadmin())
	if (Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_schedule_admin($res->get_scheduleid()))
	{
		$res->is_pending = false;	
	}
	$res->set_type($_GET['type']);
	// PRINT RES TO SCREEN
	// jarocc
	// add the new master res.
	
	/* new fields:
		var $oldid 		= null;	// jaro
		var $newid 		= null;	// jaro
		@param array $resources_to_add array of resourceids to add to this reservation, is accesoires
		
		nieuwe tijden, zit in class res
		new notice
	
	// oud $newid = $newres->db->add_res($newres,null,array(),array(),null); // toevoegen
	
			$clusters=array();
			if ( $this->clusterid <> null ) {				
				$clusters = $db->get_reservation_clusterdata($res->clusterid);
			}
	*/		
	//$rs = $resource->properties;
	//$machid = $res->get_machid();
	//$newid = $res->$db->get_new_id();
	// based on $newid = $res->$db->get_new_id();
// jarocc first save, before print
/*	*/
//if ($res->check_res(array())) {
	if  (	($newid == '') || 
			($newid == null))  
			{
		$newid = uniqid('cc');
		$res->summary = $res->summary .' COPY' ; // jaro
		$res->newid = $res->db->add_res_copycluster($res,null,array(),null,null,$newid); // toevoegen jarocc, goed eerste regel, in present
	}

	$res->print_res();
}


/**
* Return array of data from query string about this reservation
*  or about a new reservation being created
* @param none
*/
function getResInfo() {
	$res_info = array();
	global $Class;

	// Determine title and set needed variables
	$res_info['type'] = $_GET['type'];
	switch($res_info['type']) {
		case RES_TYPE_ADD :
			$res_info['title'] = "New $Class";
			$res_info['resid']	= null;
			break;
		case RES_TYPE_MODIFY :
			$res_info['title'] = "Modify $Class"; //
			$res_info['resid'] = $_GET['resid'];
			break;
		case RES_TYPE_DELETE :
			$res_info['title'] = "Delete $Class";
			$res_info['resid'] = $_GET['resid'];
			break;
        case RES_TYPE_APPROVE :
			$res_info['title'] = "Approve $Class";
			$res_info['resid'] = $_GET['resid'];
			break;
		case RES_TYPE_CLUSTER :
			$res_info['title'] = "Add resources to $Class"; // janr addart to cluster
			$res_info['resid'] = $_GET['resid'];
			break;
		case RES_TYPE_COPY_CLUSTER :
			$res_info['title'] = "Copy this cluster to $Class"; // 
			$res_info['resid'] = $_GET['resid'];
			break;
			default : $res_info['title'] = "Copy this cluster to  $Class";
			$res_info['resid'] = $_GET['resid'];
			break;
	}

	return $res_info;
}
?>