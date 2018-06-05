<?php
/**
* new janr
*
* Allow searching and selection of a resource
* Perform resource specified function when selected
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-05-05
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
* echo (count($resources);
*/
/**
* Template class
*/
include_once('lib/Template.class.php');

// jaro add


/**
* Selectresource class
*/
include_once('lib/SelectResource.class.php');

// Check that the user is logged in
if (!Auth::is_logged_in()) {
    Auth::print_login_msg();
}

if (isset($_REQUEST['resid'])) 	{	 
		$resid = $_REQUEST['resid'] ;
	} else {
		$resid = isset($_POST['resid']) ? $_POST['resid'] : (isset($_GET['resid']) ? $_GET['resid'] :'');	
	}
	
//echo ('resid: '.$resid ); //test

if (isset($_GET['searchResources'])) {					// Search for resources or get all?
	$name = trim($_GET['Name']);
}

$selectResourceControl = new SelectResource($name);
$selectResourceControl->javascript = 'selectResourceForReservation';
$selectResourceControl->toresid = $resid;
$selectResourceControl->available = true;

$t = new Template(translate('Select Resource'));

$t->printHTMLHeader();
// Begin main table
$t->startMain();

$selectResourceControl->printResourceTable();

// End main table
$t->endMain();

// Print HTML footer
$t->printHTMLFooter();
?>
