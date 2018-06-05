<?php
/**
* janr: PRINTING A RESERVATION a reservation

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

if ($is_blackout) {
	// Make sure user is logged in
	if (!Auth::is_logged_in()) {
		Auth::print_login_msg();
	}

	include_once('lib/Blackout.class.php');
	$Class = 'Blackout';
	$_POST['minres'] = $_POST['maxRes'] = null;
}
else {

	include_once('lib/Print.class.php');
	$Class = 'Reservation';
}

	if (!Auth::is_logged_in()) {
		Auth::print_login_msg();
	}


$t = new Template();

	
		$res_info = getResInfo();
		$t->set_title($res_info['title']);
		$t->printHTMLHeader();
		$t->startMain();

		present_reservation($res_info['resid']);


// End main table
$t->endMain();

$timer->stop();
$timer->print_comment();

// Print HTML footer
$t->printHTMLFooterSimple();

/**
* Prints out reservation info depending on what parameters
*  were passed in through the query string
* @param none
*/
function present_reservation($resid) {
	global $Class;

	// Get info about this reservation
	$res = new $Class($resid, false, false, $_GET['scheduleid']);
	// Load the properties
	if ($resid == null) {
		$res->resource = new Resource($_GET['machid']);
		$res->start_date = $_GET['start_date'];
		$res->end_date = $_GET['start_date'];
		$res->user = new User(Auth::getCurrentID());
		$res->is_pending = $_GET['pending'];
		$res->start = $_GET['starttime'];
		$res->end = $_GET['endtime'];

	}

	$cur_user = new User(Auth::getCurrentID());
	$res->adminMode = Auth::isAdmin() || $cur_user->get_isadmin() || $cur_user->is_group_admin($res->user->get_groupids()) || $cur_user->is_schedule_admin($res->get_scheduleid());

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
	$res_info['type'] = RES_TYPE_PRINT;
	$res_info['title'] = "Print $Class";
	$res_info['resid']	= $_GET['resid'];

	return $res_info;
}
?>