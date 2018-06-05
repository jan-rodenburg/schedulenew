<?php
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


$timer = new Timer();
$timer->start();

$is_blackout = (isset($_GET['is_blackout']) && ($_GET['is_blackout'] == '1'));
// allways check, janr
if ($is_blackout) {
	// Make sure user is logged in
	//if (!Auth::is_logged_in()) {
	//	Auth::print_login_msg();
	//}

	include_once('lib/Blackout.class.php');
	$Class = 'Blackout';
	$_POST['minres'] = $_POST['maxRes'] = null;
}
else {

	include_once('lib/Reservation.class.php');
	$Class = 'Reservation';
}

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

		process_reservation($_POST['fn']);
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
* Processes a reservation request (add/del/edit)
* @param string $fn function to perform
*/ 
function process_reservation($fn) 
{
	$success = false;
	global $Class;
	$is_pending = (isset($_POST['pending']) && $_POST['pending']);
	$alles_verlengen_okee = true; // optimist
	
	if (isset($_POST['start_date'])) // Parse the POST-ed starting and ending dates
	{			
		$sd = explode(INTERNAL_DATE_SEPERATOR, $_POST['start_date']); // screen
		$ed = explode(INTERNAL_DATE_SEPERATOR, $_POST['end_date']);

		$start_date = mktime(0,0,0, $sd[0], $sd[1], $sd[2]); //unix
		$end_date = mktime(0,0,0, $ed[0], $ed[1], $ed[2]);
	}

	if (isset($_POST['resid']))
	{ 
		$res = new $Class($_POST['resid'], false, $is_pending);
		// echo('<br>resobject :'. $_POST['resid']); //janrtesting
	}
	else if (isset($_GET['resid']))
	{
		$res = new $Class($_GET['resid'], false, $is_pending);
		//echo ('<br>resobject :'. $_GET['resid']); //janrtesting
	}
	else 
	{
		// New reservation
		$res = new $Class(null, false, $is_pending);
		if ($_POST['interval'] != 'none') // Check for reservation repeation
		{		
			if ($start_date == $end_date) 
			{
				$res->is_repeat = true;
				$days = isset($_POST['repeat_day']) ? $_POST['repeat_day'] : NULL;
				$week_num = isset($_POST['week_number']) ? $_POST['week_number'] : NULL;
				$repeat = CmnFns::get_repeat_dates($start_date, $_POST['interval'], $days, $_POST['repeat_until'], $_POST['frequency'], $week_num);
			}
			else 
			{
				// Cannot repeat multi-day reservations
				$repeat = array($start_date);
				$res->is_repeat = false;
			}
		}
		else 
		{
			$repeat = array($start_date);
			$res->is_repeat = false;
		}
	}

	$cur_user = new User(Auth::getCurrentID());
//	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || ($fn != 'create' && 	$cur_user->is_group_admin($res->user->get_groupids()));
	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || ($fn != 'create' && $cur_user->is_group_admin($res->user->get_groupids()) || $cur_user->is_schedule_admin($res->get_scheduleid()));

//	if (Auth::isAdmin() || $cur_user->get_isadmin())
	if (Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_schedule_admin($res->get_scheduleid()))	
	{
		$res->is_pending = false;	
	}
	
	
	if ($fn == 'create' || $fn == 'modify' )
	{
		// echo ('fn: '.$fn); // janr test
		$helper = new ReservationHelper();
		$util = new Utility();

		$orig = (isset($_POST['orig_invited_users']) && count($_POST['orig_invited_users']) > 0) ? $_POST['orig_invited_users'] : array();
		$invited = (isset($_POST['invited_users'])) ? $_POST['invited_users'] : array();
		$removed = (isset($_POST['removed_users'])) ? $_POST['removed_users'] : array();
		$participating = (isset($_POST['participating_users'])) ? $_POST['participating_users'] : array();
		
		$users_to_remove = $helper->getRowsForRemoval($orig, $removed, $invited);
		$users_to_invite = $helper->getRowsForInvitation($orig, $invited);
		$unchanged_users = $helper->getUnchangedUsers($orig, $invited, $participating);
		
		$orig_resources = (isset($_POST['orig_resources']) && count($_POST['orig_resources']) > 0) ? $_POST['orig_resources'] : array();
		$selected_resources =  (isset($_POST['selected_resources']) && count($_POST['selected_resources']) > 0) ? $_POST['selected_resources'] : array();

		$resources_to_add = $util->getAddedItems($orig_resources, $selected_resources);
		$resources_to_remove = $util->getRemovedItems($orig_resources, $selected_resources);

		$res->user 		= new User($_POST['memberid']);
		$res->start_date= $start_date;
		$res->end_date 	= $end_date;
		$res->start		= $_POST['starttime'];
		$res->end		= $_POST['endtime'];
		$leenperm		= 5;

		$res->summary	= stripslashes($_POST['summary']);
		$res->allow_participation = (int)isset($_POST['allow_participation']);
		$res->allow_anon_participation = (int)isset($_POST['allow_anon_participation']);
		
		$res->checkout_via = $_POST['checkout_via']; // janr toevoeging 3 velden // todo contractsoort
		$res->checkin_via = $_POST['checkin_via'];
		if ($_POST['upd_status']=='yes') {
			$res->reservation_status = $_POST['reservation_status']; // alleen als de waarde ook binnekomt
		}
		//$old_reservation_status = $res->reservation_status; // jaro
		// echo ('$_POST[reservation_status] :' .$_POST['reservation_status']);
		$res->contractsoort = $_POST['contractsoort'];		
		$res->clusterid = $_POST['clusterid'];	 //this often gives 'empty' notice
		
		$timestamp = date('U');
				
		
		$res->reminderid = isset($_POST['reminderid']) ? $_POST['reminderid'] : null;
		$res->reminder_minutes_prior = isset($_POST['reminder_minutes_prior']) ? intval($_POST['reminder_minutes_prior']) : 0;
	}
//create (r)
	if ($fn == 'create') 
	{
		$res->resource = new Resource($_POST['machid']);



						// $leenpermissie = $res->resource->get_property('leenpermissie');
						// als de user die is gewijzigd
			
			if (isset($_REQUEST['leenpermissie1']))  { 
				//print ("leenpermissie1".$_REQUEST['leenpermissie1']); 
				$leenperm = $_REQUEST['leenpermissie1'];
			} 
			$no_perm = false;
			$override = 0;
			if (isset($_REQUEST['override']))  { 
				//print ("override".$_REQUEST['override']); 
				$override = $_REQUEST['override'];
				//$override =true;
			} 
			//print ('Override before:'.$override.' '); 
			
			//debug
			echo('<script type="text/javascript">');
		//	echo ("alert ('res ".$res->resource->properties['uitleennivo']." user ".$leenperm." override ".$override."');");
			echo "</script>\n";	
			
			$noperm =( ($res->resource->properties['uitleennivo'] > $leenperm) && ($override <> "1") );
			if ( $noperm ) {
			//if ( ($res->resource->properties['uitleennivo'] > $leenperm)  ) {
				//print ('FIRSTcannot UITLEENNIVO '.$res->resource->properties['uitleennivo'].' LEENPERM '. $leenperm . 'OVERRIDE '.$_POST['override'].' <br>'); 
				//echo("<script type=\"text/javascript\">alert_this_user(\"$leenperm\")  \n");
				echo('<script type="text/javascript">');
				//echo ('alert ("run");');
				echo ' if (allow_this_user("'.$leenperm.'")) { ';
				echo '		parent.document.forms[0].override.value = "1";';
				// now resubmit the form
				echo '		var $btn = parent.jQuery(\'form input[name="btnSubmit"]\'); $btn.click();';
				echo '} else {';
				echo ' 		parent.document.forms[0].override.value = "0";';
				echo '}';
				
				echo "</script>\n";		
				//print ('Override after:'.$override.' '); 
			//}else {		
			}

				$res->scheduleid= $_POST['scheduleid'];
				$res->repeat = $repeat;
				$returnid =$res->add_res($users_to_invite, $resources_to_add); // janr ADD
				if ($res->adminMode) {

				//print ('FIRSTwarning:'.__LINE__.': UN  '.$res->resource->properties['uitleennivo'].' LP '. $leenperm . ' -<br>');
				if ($res->resource->properties['machid']) {
					if ($no_perm) {
						print ('Reservering NIET gemaakt. Lener heeft geen permissie.<br> ');
						$res->del_res();
					} else{				
						if ($res->has_errors()) {
							print ('Reservering NIET gemaakt. Artikel niet beschikbaar deze periode.<br> '.implode(';',$res->errors));
							//print ('error#101: '.implode(';',$res->errors)); //
							$res->del_res();
						}else{
							if (!$noperm) { // schets, no perm.
								print ('Succes, even wachten');

								// refresh opener
								echo("<script type=\"text/javascript\">refresh_opener (\"$res->id\");</script>");

								// nu refresh the page naar 'modify' mode
								// $returnid is de resid van het zojuist gemaakte r nieuwe reservering
								// de $returnid is bekend in php, moet in deze javascript terechtkomen 
								echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
								echo "	reserve('m','','','{$returnid}','','','','','','','2500');\n"; // voor test ff uit
								echo "</script>\n";
							}else { //test
								print ('Reservering niet gemaakt. Geen leenpermissie gegeven.'); //schets
								$res->del_res(); //schets
							}
						}
					}
				}
			}
			
		//}
	}
	// end create (r)
	// cluster (c)
	else if ($fn == 'cluster')   		// dit gaat nwe machid toevoegen aan cluster
	{
		$warning = '';
		$orig_resources = (isset($_POST['orig_resources']) && count($_POST['orig_resources']) > 0) ? $_POST['orig_resources'] : array();
		$selected_resources =  (isset($_POST['selected_resources']) && count($_POST['selected_resources']) > 0) ? $_POST['selected_resources'] : array();
		
		$util = new Utility();
		$resources_to_add = $util->getAddedItems($orig_resources, $selected_resources);
		$resources_to_remove = $util->getRemovedItems($orig_resources, $selected_resources);
		
		$res->checkout_via = $_POST['checkout_via']; 	//modify staticfields
		$res->checkin_via = $_POST['checkin_via'];
		$res->contractsoort = $_POST['contractsoort'];
		$res->summary	= stripslashes($_POST['summary']); // end modify staticfields
		
		// save org time date
		// $end_date is incoming zie r 
		$orig_end_date	= $res->end_date; 	// save dateorg unix $end_date
		$orig_end		= $res->end; 		// save timeorg unix

		

		if (!$res->clusterid) {
			$res->clusterid = $_REQUEST['resid'];
			$oldstatus = $res->reservation_status; 						// old status
			$res->db->mod_res($res,null,null,null,null,null);		// modify master reservation with clusterid
		}
		
// deze routine gaat add article uitvoeren		
		$newres = new $Class(null, false, false);
		// var_dump ($newres);
		$newres->id = $_REQUEST['resid'];
		// echo ('request machid'. $_REQUEST['machid1']); //TEST
		$newres->load_by_id();
		
		// deze 2 is onzin?
		//$leenperm = $_REQUEST['leenpermissie'];
		//$leenperm = $_POST['leenpermissie'];
		// als de user die is gewijzigd
			$warning ="";
			if (isset($_REQUEST['leenpermissie1']))  { 
				//$warning .= ("via REQ".$_REQUEST['leenpermissie1']); 
				$leenperm = (int)$_REQUEST['leenpermissie1'];
			}
			
			
			//$warning .= ('ADDwarning1: UN  '.$_REQUEST['uitleennivo1'].'X'.$newres->resource->properties['uitleennivo'].' LP '. $leenperm  . ' -<br>');
		//if ($_REQUEST['uitleennivo1']) {} // TEST ONLY
		// dit gaat fout ALS add mag niet DAN is machid1 gedefault naar 1
		if ($_REQUEST['machid1']) {
			//$warning .= ('ADDwarning2: UN  '.$_REQUEST['uitleennivo1'].'X'.$newres->resource->properties['uitleennivo'].' LP '. $leenperm  . ' -<br>');
			// als 'nwe artikel' == 'artikel van master' dan 'je kan niet zelfde art 2x in 1 clusterres.' 
			if ($_REQUEST['machid1']!=$newres->get_machid()) {
				// lees nwe artikel
				$newres->resource = new Resource($_REQUEST['machid1']);
				// ALS 	(studentpermissie >= artikelnivo) 
				//if ($user->leenpermissie >= $newres->uitleennivo) { 
				//}
			
				$no_perm = false;
				$override = 0;
				if (isset($_REQUEST['override']))  { 
					//print ("override".$_REQUEST['override']); 
					$override = $_REQUEST['override'];
					//$override =true;
				} 
			
						//debug
				echo('<script type="text/javascript">');
				//echo ("alert ('newres ".$newres->resource->properties['uitleennivo']." user ".$leenperm." override ".$override."');");
				echo "</script>\n";	
				
				$noperm =( ($newres->resource->properties['uitleennivo'] > $leenperm) && ($override <> "1") );
				if ( $noperm ) {
				//if ( ($res->resource->properties['uitleennivo'] > $leenperm)  ) {
					//print ('FIRSTcannot UITLEENNIVO '.$res->resource->properties['uitleennivo'].' LEENPERM '. $leenperm . 'OVERRIDE '.$_POST['override'].' <br>'); 
					//echo("<script type=\"text/javascript\">alert_this_user(\"$leenperm\")  \n");
					echo('<script type="text/javascript">');
					//echo ('alert ("run");');
					echo ' if (allow_this_user("'.$leenperm.'")) { ';
					echo '		parent.document.forms[0].override.value = "1";';
					// now resubmit the form
					echo '		var $btn = parent.jQuery(\'form input[name="btnSubmit"]\'); $btn.click();';
					echo '} else {';
					echo ' 		parent.document.forms[0].override.value = "0";';
					echo '}';
					
					echo "</script>\n";		
				}
										//debug
				echo('<script type="text/javascript">');
				//echo ("alert ('newres ".$newres->resource->properties['uitleennivo']." user ".$leenperm." override ".$override."');");
				echo "</script>\n";	
				
				if ($no_perm) {
					print ('Reservering NIET gemaakt. Lener heeft geen permissie.<br> ');
					$newres->del_res();  // php heeft save al gedaan, maar user reactie op de javascript was NO, dus ff del
				} else{				
					if ($newres->check_res_resource_only()) {
						if (!$noperm) { // schets, no perm.
							$newid = $newres->db->add_res($newres,null,array(),array(),null); // toevoegen
							echo ('Toegevoegd.');
						}else { //test
								print ('Geen leenpermissie gegeven voor dit artikel.'); //schets
								// refresh opener
								//echo("<script type=\"text/javascript\">echo (\"$res->clusterid\");refresh_opener (\"$res->clusterid\");</script>");
								//$newres->del_res(); //schets

						}
						
					} else {
						$warning .= ('warning:'.__LINE__.': dit artikel is niet beschikbaar en wordt niet toegevoegd: '.$newres->resource->properties['name'].'.');
					}
				}
				
				
			} else{
				$warning .= ('warning:'.__LINE__.': dit artikel is het hoofdartikel op deze Reservering, wordt NIET toegevoegd: '.$newres->resource->properties['name'].'.');
			}
		} 
		// end add article
		// de save komt automaties hieronder
		
		// wel accesoires updaten van master, silent
	$res->mod_res(array(), array(), array(), $resources_to_add, $resources_to_remove, false, false); 					
		// end add article
		
		// indien verlenging
		$alles_verlengen_okee = true; // optimist
		
		//if ($res->end_date <> $end_date || $res->end <> $_POST['endtime'])		{ 
		// jaro 201501, ook begintijd testen
		if ($res->end_date <> $end_date || $res->end <> $_POST['endtime'] || $res->start_date <> $start_date || $res->start <> $_POST['starttime'])		{ 
						$res->start_date = $_POST['start_date'];
						$res->start = $_POST['starttime'];
		
				// echo (' old '.$res->end_date.' t '.$res->end.'<br>');
				// echo (' new '.$end_date.' t '.$_POST['endtime'].'<br>');
				// echo (' old '.$res->start_date.' t '.$start_date.'<br>');
				// echo (' new '.$res->start.' t '.$_POST['starttime'].'<br>');
			// voor alle res in deze cluster
			if ( $res->clusterid <> null ) {
				
			// $
			$cresids = $res->db->get_cluster_resids($res->clusterid);   // terug komt array van machids
				// echo (' c: '.$res->clusterid);
				// var_dump ($cresids); //
			for ($i = 0; $i < count($cresids); $i++)  {
			     $cres = new Reservation($cresids[$i]); //PIKE
				 //var_dump ($cres->resource);
				 //$cres = $db->get_res()
				 // echo (' cres '.$cres->id.' == '.$cresids[$i].': '.$cres->resource->machid);

						$verlengen_okee = TRUE;
						// save timings, and keys
						//$orig_end_date = $cres->end_date;
						//$orig_endtime = $cres->end;
						//$orig_machid = $cres->machid;
						//$orig_resid = $cres->id;
						// user input fields
						$cres->end_date = $end_date;
						$cres->end = $_POST['endtime'];
								// jaro experimental 201501: result: begindatum tijd cluster, werkt.
								$cres->start_date = $start_date;
								$cres->start = $_POST['starttime'];
								
						// input, the mach we check for availability
						$cres->machid = $cres->resource->machid; // welk artikel
						//echo ('pre date: '.$cres->end_date.'time: '.$cres->end.'mach: '.$cres->machid.'cres: '.$cres->id.'<br>');
						if ($cres->check_res_resource_verlenging()) {
								// schrijf msg to div
								//$statustext =  'Deze '.$cres->machid.' Verlenging okee <br>';	
								$statustext =  ' Verlenging okee <br>';	
							} else {
								$cresid=$cres->id;
								// schrijf msg to div
								$cresidhelper = '\''.$cresid.'\'';
								if ($cres->id == $cres->clusterid) {
									// msg zonder delete button bieden, want dit is de master 
									$statustext = "<span class=\"valop\"> Verlenging NIET okee. </span> ";
								}else {	// msg + delete button bieden 
									$statustext = "<span class=\"valop\"> Verlenging NIET okee. </span> <a href=\"javascript:deleteReservationOneResource(\'$cresid\');\">delete</a>";
								}
								$verlengen_okee = FALSE;	
								$alles_verlengen_okee = FALSE;								
								// $cres->end_date = $orig_end_date;
								// $cres->end = $orig_endtime;
								$warning  .= $statustext;
							}
						// hier javascript die verlengstatus schrijft naar scherm
						$cresid=$cres->id;
						echo<<<EOT
						<script type="text/javascript">
							if (window.parent && window.parent.jQuery) {
								window.parent.jQuery('#Verleng$cresid').html('$statustext');
							}
						</script>
EOT;
						//
				}
			}	// end cluster loop, cresids
			
			// UPDATE de cluster gebeurd vanzelf hieronder
			if (!$alles_verlengen_okee) {	
								//echo ('De Verlenging kan niet!');
								$warning = "De Verlenging kan niet!"; // stop
								
			}else {
						$res->end_date = $end_date;
						$res->end = $_POST['endtime'];
						// jaro experimental 201501: result: begindatum tijd 1 resource, werkt.
								$res->start_date = $start_date;
								$res->start = $_POST['starttime'];
			}
		
		// print javascript error
		}
		// end verlenging
		// nwe toevoegen
		

		if ($alles_verlengen_okee) {	
			// nu nog static fields in de cluster updaten
			//echo ('xxx '.		$_POST['upd_status']);
			if ($_POST['upd_status']=='yes') {
				$oldstatus = $res->reservation_status; 						// old status
				$res->reservation_status = $_POST['reservation_status']; 	// new status
				//$status = $_POST['reservation_status']; 	// new status
				$res->db->mod_res_cluster_upd_status($res,null,null,null,null,null,$oldstatus);		// modify master reservation with clusterid + static fields + reservation_status
				} 		
			if ($_POST['upd_status']<>'yes') {	
				// echo ('NOT '.		$_POST['upd_status']);
				echo ($_POST['upd_status']);
				$res->db->mod_res_cluster($res,null,null,null,null,null);		// modify master reservation with clusterid + static fields (but not reservation_status)
				// deze routine doet ook print_all_errors  - en - print_success , dat moet anders ()reservation.class r450 )	
				}
				// $warning = "forcestop"; //dit is een helper om refresh page te stoppen
			if ($warning <> '') {
				print_warning($warning, false);  // simple warnings;
			}	
			// end cluster updaten
		} else	{
			// error en stop (verlengen not okee)
			print ('error:'.__LINE__.' verlengen van cluster kan niet.');
		}
		
		if ($res->adminMode && $alles_verlengen_okee) {
			if ($res->has_errors()) {
				// error en stop
				print ('error '.__LINE__.': '.implode(';',$res->errors));
				//$res->del_res();
			} elseif ($warning!='') {
				// warning en f5
				print ('warning '.__LINE__.': '.$warning);
				// alert de warning
				// refresh noodzakelijk
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "  alert (' '+'$warning');";
				echo "	reserve('c','','','{$res->id}','','','','','','','0');\n";
				echo "</script>\n";
				
			} else{
				// succes en f5
				print ('Succes, even wachten');

				// refresh opener, doet f5
				echo("<script type=\"text/javascript\">refresh_opener (\"$res->id\");</script>");

				// nu refresh the page van cluster naar 'cluster' mode
				// $returnid is de resid van het zojuist gemaakte r nieuwe reservering
				// de $returnid is bekend in php, moet in deze javascript terechtkomen 
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "	reserve('c','','','{$res->id}','','','','','','','2500');\n";
				echo "</script>\n";
			}
		}
	}
	// end cluster (c)
	//modify (m)
	else if ($fn == 'modify') 
	{
		$res->summary = str_replace("\n", '', $_POST['summary']);

		$res->mod_res($users_to_invite, $users_to_remove, $unchanged_users, $resources_to_add, $resources_to_remove, isset($_POST['del']), isset($_POST['mod_recur']));
		
		if ($res->adminMode) {
		
			if ($res->has_errors()) {
				print ('error '.__LINE__.': '.implode(';',$res->errors));
				//$res->del_res();
			}else{
				// refresh opener
				echo("<script type=\"text/javascript\">refresh_opener (\"$res->id\");</script>");
				
				if ($_POST['btnSubmitAndCluster']) {
					// door naar cluster
					print ('Succes, door naar cluster');

					// $returnid is de resid van het zojuist gemaakte r nieuwe reservering
					// de $returnid is bekend in php, moet in deze javascript terechtkomen 
					echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
					echo "	reserve('c','','','{$res->id}','','','','','','','2500');\n";
					echo "</script>\n";
				} else {
					print ('Modify succes');
					//	print ("<input type=\"button\" class=\"button buttoniframe\" onclick=\"reserve('c','','','{$res->id}');\" value=\"artikel toevoegen\">"); //aan deze reservering, met zelfde gebruiker, zelfde begin en eindtijd); // janr 2art button aanbieden voor meer artikelenn
					//	echo ('<input type="button" name="btnPrint" value="' . translate('Print Contract') . '" class="button buttoniframe" ');
					//	echo ("onclick=\"prrrint('p','','','{$res->id}');\"/>");
						
					//	print ("<a type=\"button\" target=\"parent\" class=\"button buttoniframe\" href=\"admin.php?tool=reservations&search=".$res->id."\" ");
					//	print ("onclick='if (window.opener) { window.opener.document.location.href=\"admin.php?tool=reservations&search=".$res->id."\"; return false;} ' ");
					//	print ("value=\"". translate('Summary this reservation') ."\">". translate('Summary this reservation') ." </a>"); // janr 2art button aanbieden voor meer artikelen
						
						//print ("<a type=\"button\" target=\"parent\" class=\"button\" href=\"admin.php?tool=reservations&search=".$res->id."\" value=\"". translate('Summary this reservation') ."\">". translate('Summary this reservation') ." </a>"); // janr 2art button aanbieden voor meer artikelen
				}
				
			}
		}
	}
	// endmodify (m)
	//delete
	else if ($fn == 'delete') 
	{
		$res->del_res(isset($_POST['mod_recur']));
	?>
		<script type="text/javascript"><!--//
			refresh_opener ("<?php echo($res->id)?>");
		//--></script>
	<?php
	}
	//approve
	else if ($fn == 'approve') 
	{
		$res->approve_res(isset($_POST['mod_recur']));
	}
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
	// var_dump ($res);
	// Load the properties
	if ($resid == null) {
		$res->resource = new Resource($_GET['machid']);
		$res->start_date = $_GET['start_date'];
		$res->end_date = $_GET['start_date']; 	// default is 'tot het volgende uur
		
		$res->user = new User(Auth::getCurrentID());
		$res->is_pending = $_GET['pending'];
		$res->start = $_GET['starttime'];
		$res->end = $_GET['endtime'];
		// $res->mod = $_GET['mod'];   //janr
	}

	$cur_user = new User(Auth::getCurrentID());
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
			$res_info['title'] = "Modify $Class";
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
			$res_info['title'] = "Add resources to $Class"; // janr addart
			$res_info['resid'] = $_GET['resid'];
			break;
        default : $res_info['title'] = "View $Class";
			$res_info['resid'] = $_GET['resid'];
			break;
	}

	return $res_info;
}
?>