<?php
/**
* This file prints out a registration or edit profile form
* It will fill in fields if they are available (editing)
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-07-09
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
/**
* Include Template class
*/
include_once('lib/Template.class.php');

/**
* Prints a page notifiying the admin that the requirest failed.
* It will also assign the data passed in to a session variable
*  so it can be reinserted into the form that it came from
* @param string or array $msg message(s) to print to user
* @param array $data array of data to post back into the form
*/
function print_fail($msg, $data = null) {
	if (!is_array($msg))
		$msg = array ($msg);

	if (!empty($data)) {
		$_SESSION['post'] = $data;
	}

	$t = new Template(translate('Update failed!'));
	$t->printHTMLHeader();
	$t->printWelcome(Auth::isAdmin(), false, Auth::isScheduleAdmin());
	$t->startMain();
	CmnFns::do_error_box(translate('There were problems processing your request.') . '<br /><br />'
			. '- ' . join('<br />- ', $msg) . '<br />'
			. '<br /><a href="' . $_SERVER['HTTP_REFERER'] . '">' . translate('Please go back and correct any errors.') . '</a>');
	$t->endMain();
	$t->printHTMLFooter();
	die;
}
// Auth included in Template.php
$auth = new Auth();
$t = new Template();
$curUser = new User(Auth::getCurrentID());

$edit = isset($_GET['edit']) && (bool)$_GET['edit'];
$id = null;

if ( isset($_GET['memberid']) && !empty($_GET['memberid']) ) 
{
	$id = $_GET['memberid'];
}

if ( isset($_SESSION['sessionID']) && !empty($_SESSION['sessionID']) ) 
{
	if ($id == null) 
	{
		// No id was passed in, so use the current user's id
		$id = $_SESSION['sessionID'];
	}
}

$msg = '';
$show_form = true;

// Check login status
if ($edit && !Auth::is_logged_in()) 
{
	$auth->print_login_msg(true);
	$auth->clean();			// Clean out any lingering sessions
}
else if ( !$edit && !(bool)$conf['app']['allowSelfRegistration'] ) 
{
	$isAdmin = ($curUser->is_group_admin(array($id)) || Auth::isAdmin());
	if ( !$isAdmin ) 
	{
		// Only the administrator can create users
		CmnFns::do_error_box(translate('540'.'This is only accessable to the administrator'), '', true);
	}
}

// If we are editing and have not yet submitted an update
if ($edit && !isset($_POST['update'])) 
{
	$user = new User($id);
	$data = $user->get_user_data();
	$data['emailaddress'] = $data['email'];		// Needed to be the same as the form
}
else 
{
	$data = CmnFns::cleanPostVals();
}

if (isset($_POST['register'])) 
{	// New registration
	$data['lang'] = determine_language();
	$adminCreated = (Auth::is_logged_in() && Auth::isAdmin());
	$msg = $auth->do_register_user($data, $adminCreated); //coworker
	$show_form = false;
}
else if (isset($_POST['update'])) 
{	
	// Update registration
	// $user = new User($id);	
	$adminUpdate = ( ($curUser->get_id() != $id) && (Auth::isAdmin() || $curUser->is_group_admin($user->get_groupids())) );
	
	// is de barcode ge-edit?
	if ($_POST['memberid'] <> $data['oudmemberid']) {
	
		// error on input
		if (empty($data['memberid']))
			print_fail($data['memberid'].' '.$data['memberid'].'Barcode mag niet leeg zijn of bestaat al (dient uniek te zijn)' . '**OF**'. translate('You did not select any members to delete.') . '<br />');
		if (empty($data['memberid']))
			print_fail(translate('You did not select any members to delete.') . '<br />');
		
		// analysis/ coworker-change-sitewide.txt
		
		// stap 1
			// Delete registration VERVALT
			// $auth->del_user($_POST['oudmemberid']);
			// WORDT : (update user: nonactive='y')
		$auth->update_user_nonactive($_POST['oudmemberid']); // set to nonactive='y'
			// DIT DOET: $this->db->update_user_nonactiveDB($id); // deze fie: AuthDB.class.php r229

		// stap 2, TOEVOEGING
		
		//nieuw toevoegen met  key: $data['memberid']
			// New registration
		$data['lang'] = determine_language();
		$adminCreated = (Auth::is_logged_in() && Auth::isAdmin());
		$msg = $auth->do_register_user($data, $adminCreated); //coworker
		// toevoeging:		
		$msg .= $auth->changeMemberIdSitewide($_POST['oudmemberid'],$_POST['memberid']);   //
		
		$show_form = false;
	}else{
		// barcode niet ge-edit
		$msg = $auth->do_edit_user($data, $adminUpdate);
		$show_form = false;
	}
	
	// wordt medewrker delete... is set op nonactief
	if ($_POST['set_coworker_inactive'] == 'y') {
		// echo 'do you pass '.$_POST['set_coworker_inactive'];
		$auth->update_user_nonactive($_POST['oudmemberid']); // set to nonactive='y'
	}
	
	
}

// Print HTML headers
$t->printHTMLHeader();

$t->set_title(($edit) ? translate('Modify My Profile') : translate('Register'));

// Print the welcome banner if they are logged in
if ($edit || !(bool)$conf['app']['allowSelfRegistration'])
{
	$t->printWelcome(Auth::isAdmin(), false, Auth::isScheduleAdmin());
}

// Begin main table
$t->startMain();

// Either this is a fresh view or there was an error, so show the form
if ($show_form || $msg != '') 
{
	if (!isset($data['timezone'])) { $data['timezone'] = $conf['app']['timezone']; }
	
	$auth->print_registerCoworker_form($edit, $data, $msg, $id);
}

// The registration/edit went fine, print the message
if ($msg == '' && $show_form == false) 
{
	$auth->print_success_box();
}

// End main table
$t->endMain();

// Print HTML footer
$t->printHTMLFooter();
?>