<?php
/**
* Allow searching and selection of a user
* Perform user specified function when selected
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-05-05
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
/**
* Template class
*/
include_once('lib/Template.class.php');
/**
* SelectUser class
*/
include_once('_new/AddUser.class.php');

// Check that the user is logged in
if (!Auth::is_logged_in()) {
    Auth::print_login_msg();
}

$fname = $lname = null;

if (isset($_GET['searchUsers'])) {					// Search for users or get all users?
	$fname = trim($_GET['firstName']);
	$lname = trim($_GET['lastName']);
}
if (isset($_GET['resid'])) {					// Need the resid 0218
	$resid = trim($_GET['resid']);
	//echo $resid;
} else {
	echo ('error, the reservation is not existing yet. please close this window and save your reservation.');
}
$selectUserControl = new SelectUser($fname, $lname);
$selectUserControl->javascript = 'addUserForReservation';

$t = new Template(translate('Add User'));

$t->printHTMLHeader();
// Begin main table
$t->startMain();

$selectUserControl->printUserTable($resid);

// End main table
$t->endMain();

// Print HTML footer
$t->printHTMLFooter();
?>
