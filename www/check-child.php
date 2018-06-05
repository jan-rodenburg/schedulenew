<?php
/**
* janr
* check-child.php, based on check.php. check to see if child resource is available - no check accesoiries, no check repeat_dates -
*
* Input reservation data and perfom a check to see if each one -this is 1 master resource plus accessoiries plus repeat_dates- is available
*  without actually placing the reservation.
* The output from this is to be used by an AJAX response handler
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-07-09
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

include_once('lib/Resource.class.php');
include_once('lib/Blackout.class.php');
include_once('lib/Auth.class.php');
include_once('lib/Utility.class.php');

if (!Auth::is_logged_in()) {
	die();
}

//$id = isset($_POST['resid']) ? $_POST['resid'] : null;
$id = null;
$is_blackout = (isset($_GET['is_blackout']) && ($_GET['is_blackout'] == '1'));

if ($is_blackout) {
	$Class = 'Blackout';
}
else {
	$Class = 'Reservation';
}

$res = new $Class($id);

if ($id != null) {
	$cur_user = new User(Auth::getCurrentID());
	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_group_admin($res->user->get_groupids()); 
}
else {
	$res->adminMode = Auth::isAdmin();
}
// hier spannend
$repeat_dates = process_reservation($res);
$errors = array();

$helper = new Utility();

$orig_resources = (isset($_POST['orig_resources']) && count($_POST['orig_resources']) > 0) ? $_POST['orig_resources'] : array();
$selected_resources =  (isset($_POST['selected_resources']) && count($_POST['selected_resources']) > 0) ? $_POST['selected_resources'] : array();

$resources_to_add = $helper->getAddedItems($orig_resources, $selected_resources);

if ($res->check_startdate()) {
	if ($res->check_times()) {
		if ($res->check_min_max()) {
			
			// janr for ($i = 0; $i < count($repeat_dates); $i++) {
			// janr 	$res->start_date = $repeat_dates[$i];
			// janr 	if ($res->is_repeat) { $res->end_date = $res->start_date; }
				
			// pike we *should* check acessoires on the cluster reservation
			if (!$res->check_res($resources_to_add)) {
					$errors[] = $res->get_last_error();
			}
			
			// janr }
		}
		else {
			$errors[] = translate('Reservation length does not fall within this resource\'s allowed length.');
		}
	}
	else {
		$errors[] = translate('Start time must be less than end time');
	}
}
else {
	$errors[] = $res->get_last_error();
}

// This is what will be printed by the AJAX return request
if ($res->has_errors()) {
	echo '<table align="center" width="100%" cellspacing="0" cellpadding="1"><tr class="messageNegative"><td width="25"><img src="img/x.gif" alt="x"/></td><td>check-child.php1: ' . 'Reservation Not Available' . '</td></tr>'
		. '<tr><td class="messageNegativeBG" colspan="2"><table width="100%" cellspacing="0" cellpadding="0">';
	for ($i = 0; $i < count($errors); $i++) {
		echo "<tr><td class=\"warningCell" . ($i%2) . "\">check-child.php2: {$errors[$i]}</td></tr>";
	}
	echo '</table></td></tr></table>';
}
else {
	echo '<table align="center" width="100%" cellspacing="0" cellpadding="1"><tr class="messagePositive"><td width="25"><img src="img/checkbox.gif" alt="ok"/></td><td>' . 'Reservation Available' . '</td></tr></table>';
}
// debug janr
// var_dump($res);

/**
* Processes a reservation request (add/del/edit)
* @return none
*/
function process_reservation(&$res) {
	$success = false;
	global $Class;
	$is_pending = (isset($_POST['pending']) && $_POST['pending']);
	
	if (isset($_POST['start_date'])) {			// Parse the POST-ed starting and ending dates
		$sd = explode(INTERNAL_DATE_SEPERATOR, $_POST['start_date']);
		$ed = explode(INTERNAL_DATE_SEPERATOR, $_POST['end_date']);

		$start_date = mktime(0,0,0, $sd[0], $sd[1], $sd[2]);
		$end_date = mktime(0,0,0, $ed[0], $ed[1], $ed[2]);
	}
	
	$repeat = array($start_date);

	if ($res->get_id() == null) {
		//$res->resource = new Resource($_POST['machid']);	// Wont be loaded 
		$res->resource = new Resource($_POST['machid1']);	
		$res->scheduleid= $_POST['scheduleid'];				//
		
		//janr if ($_POST['interval'] != 'none') {		// Check for reservation repeation
		//janr 	if ($start_date == $end_date) { 
		//janr 		$days = isset($_POST['repeat_day']) ? $_POST['repeat_day'] : NULL;
		//janr 		$week_num = isset($_POST['week_number']) ? $_POST['week_number'] : NULL;
		//janr 		$repeat = CmnFns::get_repeat_dates($start_date, $_POST['interval'], $days, $_POST['repeat_until'], $_POST['frequency'], $week_num);
		//janr 		$res->is_repeat = true;
		//janr 	}
		//janr }
	}
	
	$res->user 		= new User($_POST['memberid']);
	$res->start_date= $start_date;
	$res->end_date 	= $end_date;
	$res->start		= $_POST['starttime'];
	$res->end		= $_POST['endtime'];
	
	return $repeat;
}
?>