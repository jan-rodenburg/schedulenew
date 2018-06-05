<?php
/**
* This file provides output functions
* @author Nick Korbel <lqqkout13@users.sourceforge.net>, mods: jan rodenburg - larka
* @author Richard Cantzler <rmcii@users.sourceforge.net>
* @version 03-30-06
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/..';

include_once($basedir . '/lib/Auth.class.php');

/**
* Provides functions for outputting template HTML
*/
class Template {
	var $title;
	var $link;
	var $dir_path;
	
	/**
	* Set the page's title
	* @param string $title title of page
	* @param int $depth depth of the current page relative to phpScheduleIt root
	*/
	function Template($title = '', $depth = 0) {
		global $conf;
		
		$this->title = (!empty($title)) ? $title : $conf['ui']['welcome'];
		$this->dir_path = str_repeat('../', $depth);
		$this->link = CmnFns::getNewLink();
		//echo $this->title;
	}
	
	/**
	* Print all XHTML headers
	* This function prints the HTML header code, CSS link, and JavaScript link
	*
	* DOCTYPE is XHTML 1.0 Transitional
	* @param none
	*/
	function printHTMLHeader() {
		global $conf;
		global $languages;
		global $lang;
		global $charset;
		global $text_direction;
		
		if (!isset($text_direction))
		{
			$text_direction = 'ltr';
		}
		
		$path = $this->dir_path;
		echo "<?xml version=\"1.0\" encoding=\"$charset\"?" . ">\n";
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $languages[$lang][2]?>" lang="<?php echo $languages[$lang][2]?>" dir="<?php echo $text_direction?>">
	<head>
	<title>
	<?php echo $this->title?>
	</title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset?>" />
	<?php
	if ((bool)$conf['app']['allowRss'] && Auth::is_logged_in()) {
		echo '<link rel="alternate" type="application/rss+xml" title="phpScheduleIt" href=" ' . CmnFns::getScriptURL() . '/rss.php?id=' . Auth::getCurrentID() . "\"/>\n";
	}
	// janr ivm keep session
	// echo '<meta http-equiv="refresh" content="580; URL='.$_SERVER['HTTP_REFERER'].'">'; // 9 minuten, 40 seconden 
	// per 2018, nieuwe javascript functies in functions18.js // schoon werken
	?>
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="icon" href="favicon.ico"/>
	<script language="JavaScript" type="text/javascript" src="<?php echo $path?>functions.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php echo $path?>functions18.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php echo $path?>ajax.js"></script>
	<?php
	//new1800
	// upgrading jquery, oud is jsquery/jquery-1.4.3.min.js
	// upgrading jquery, nieuw is jsquery/jquery-3.3.1.js
	
	?>
	
	<script language="JavaScript" type="text/javascript" src="jsquery/jquery-3.3.1.js"></script>
	<script language="JavaScript" type="text/javascript" src="jsquery/jquery.cookie.js"></script>
	<script language="JavaScript" type="text/javascript" src="jsquery/jquery.quicksearch.js"></script>
	<?php
	// https://datatables.net/download/
	?>
	<link rel="stylesheet" type="text/css" href="jsquery/datatables/DataTables-1.10.16/css/jquery.dataTables.css"/>
	<link rel="stylesheet" type="text/css" href="jsquery/datatables/Buttons-1.5.1/css/buttons.dataTables.css"/>
	<link rel="stylesheet" type="text/css" href="jsquery/datatables/FixedColumns-3.2.4/css/fixedColumns.dataTables.css"/>
	<link rel="stylesheet" type="text/css" href="jsquery/datatables/Responsive-2.2.1/css/responsive.dataTables.css"/>
	 
	<script type="text/javascript" src="jsquery/datatables/DataTables-1.10.16/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="jsquery/datatables/Buttons-1.5.1/js/dataTables.buttons.js"></script>
	<script type="text/javascript" src="jsquery/datatables/FixedColumns-3.2.4/js/dataTables.fixedColumns.js"></script>
	<script type="text/javascript" src="jsquery/datatables/Responsive-2.2.1/js/dataTables.responsive.js"></script>
	
		
	<script type="text/javascript"><!--//
	
/* new18 switch stylesheet
$('#phone').click(function (){
   $('link[href="style1.css"]').attr('href','style2.css');
});
$('#desktop').click(function (){
   $('link[href="style2.css"]').attr('href','style1.css');
});
*/

// // helper functions for datatables, per TABLE_ID
function td_counter(i) {$( "#manageUser tr td:nth-child(" + i + ")").prepend( "<span>"+i+" </span>" );}

function thead_td_get(i) {
	var className = $("#manageUser thead tr td:nth-child(" + i + ")").attr('class');
		return  '"'+className+'",';
	}
// end helper functions for datatables
	
jQuery(document).ready(function(){
	
	// call helpers ? 
	//add column number before.	
		// for(i = 0; i < 30; i++) { 					td_counter(i-1);		}

	// eenmalig : helper to get all classnames from thead.

		var result=""; 
		//for(i = 0; i < 30; i++) { 					var x = thead_td_get(i-1);					var result = result.concat(x);		} 
		//console.log(result);
	// end call helpers ?
	
	// detect x table for datatables
	if($("#table_id_manage_resource").length)   {  /*exists, resource page*/	
		 $('#table_id_manage_resource').DataTable( {
				stateSave: true,
				stateDuration: 60 * 60 * 1, // one hour
				//stateDuration: 1200, // 20 minutes
				responsive: {
							details: {
								type: 'column'
							}
						},
				
				columnDefs: [
					{
					searchable: true,						
					className: 'control',
					orderable: false,
					targets:   0
				} ],
				order: [ 6, 'asc' ] // order by resource name

			} );
	}
	// detect x table for datatables
	if($("#manageAdditionalResource").length)   {  /*exists, resource page*/	
		 $('#manageAdditionalResource').DataTable( {
				stateSave: true,
				stateDuration: 60 * 60 * 1, // one hour
				//stateDuration: 1200, // 20 minutes
				responsive: {
							details: {
								type: 'column'
							}
						},
				
				columnDefs: [
					{
					searchable: true,						
					className: 'control',
					orderable: false,
					targets:   0
				} ],
				order: [ 2, 'asc' ] // order by additional resource name

			} );
	}
	// detect x table for datatables
	if($("#manageUser").length)   {  /*exists, resource page*/	
		 $('#manageUser').DataTable( {
				//stateSave: true,
				//stateDuration: 60 * 60 * 1, // one hour
				//stateDuration: 1200, // 20 minutes
				responsive: {
							details: {
								type: 'column'
							}
						},
				
				columnDefs: [
					{
					searchable: true,						
					className: 'control',
					orderable: false,
					targets:   0
				} ],
				order: [ 3, 'asc' ] // order by lname

			} );
	}
	// detect x table for datatables
	if($("#manageUserCoworker").length)   {  /*exists, resource page*/	
		 $('#manageUserCoworker').DataTable( {
				stateSave: true,
				stateDuration: 60 * 60 * 1, // one hour
				//stateDuration: 1200, // 20 minutes
				responsive: {
							details: {
								type: 'column'
							}
						},
				
				columnDefs: [
					{
					searchable: true,						
					className: 'control',
					orderable: false,
					targets:   0
				} ],
				order: [ 3, 'asc' ] // order by lname

			} );
	}
	
	//old stuff	
		if (jQuery('.welcomeBack')[0]) {
			// this is the main schedule window
			window.name='schedule';
			//alert(window.name); 
		} 
	// end old
	
		
});	//--></script>
	<style type="text/css">
	@import url(<?php echo $path?>css/normalize.css);
	</style>
	<link rel="stylesheet" href="<?php echo $path?>css/blueprintx/silksprite/sprites/sprite.css" type="text/css">
	<style type="text/css">
	@import url(<?php echo $path?>jscalendar/calendar-blue-custom.css);
	@import url(<?php echo $path?>css/css.css);
	<?php
	// oktober 17; listview.css, zie admin.php?tool=resources
	// vervallen, new18, nu door datatables
	//if ((isset($_GET['listview'])) && ($_GET['listview']=='on')) {
	//	echo '@import url('.$path.'css/listview.css)';
	//}
	?>
	</style>
	<script type="text/javascript" src="<?php echo $path?>jscalendar/calendar.js"></script>
	<script type="text/javascript" src="<?php echo $path?>jscalendar/lang/<?php echo get_jscalendar_file()?>"></script>
	<script type="text/javascript" src="<?php echo $path?>jscalendar/calendar-setup.js"></script>
	</head><!-- template.class -->
	<body class="<?php echo ($_SESSION['sessionScheduleAdmin']);?>."><div align="right" style="margin-right:40px;position:absolute;top:-40px"><a id="top" name="top"></a></div>
	<?php
	// debug
	if ($conf['debug'] == '1') {
		CmnFns::print_test_area (Auth::isAdmin(), Auth::is_logged_in(), Auth::isScheduleAdmin()); //debug test
		}
	}
	
	
	/**
	* Print welcome header message
	* This function prints out a table welcoming
	*  the user.  It prints links to My Control Panel,
	*  Log Out, Help, and Email Admin.
	* If the user is the admin, an admin banner will
	*  show up
	* @global $conf
	*/
	function printWelcome($is_admin = false, $is_group_admin = false, $is_schedule_admin = false) {
		global $conf;
		
		$user = new User(Auth::getCurrentID());

		// Print out notice for administrator
		// janrlook eruit
		// echo Auth::isAdmin() ? '<h3 align="xenter">' . translate('Administrator') . '</h3>' : '';
		
		// Print out logoImage if it exists
		echo (!empty($conf['ui']['logoImage']))
			? '<div align="left" style="margin-top:6px;margin-left:4px;"><img src="' . $conf['ui']['logoImage'] . '" alt="logo"  /></div>'
			: '';
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="mainBorder">
	  <tr>
		<td class="mainBkgrdClr">
		  <p>
			<?php 	  $this->link->doLink($this->dir_path . 'ctrlpnl.php', translate('My Control Panel')) ;?>
			|
			<?php 	  $today = getdate(Time::getAdjustedTime(mktime()));
					$this->link->doLink('schedule.php?date=' . date('m-d-Y',mktime(0,0,0,$today['mon'], $today['mday'], $today['year'])), translate('Bookings'));?>	
			|
			<?php 	$this->link->doLink('schedule.php?date=' . date('m-d-Y',mktime(0,0,0,$today['mon'], $today['mday'], $today['year'])) 
				. "&amp;today=1", translate('Today'));?>				
			<?php 	  
			if ($is_admin || $is_schedule_admin) { ?>
			
	

						|
				<?php 	echo $this->link->getLink('admin.php?tool=reservations', translate('Manage Reservations')) ; ?>
						
				| <a href="#" onclick="jQuery('#quicklinks-wrapper').slideToggle('slow')">More...</a></p>
				<div id="quicklinks-wrapper" style="position:absolute; left:18em; display:none; width:150px; border:2px solid #A2B5CD;  z-index: 1000;">
					<?php self::showQuickLinks(Auth::isAdmin(), $user->is_group_admin(), Auth::isScheduleAdmin());		// Print out My Quick Links ?>
				</div>
			<?php 	  } ?>
		</td>
		<td class="mainBkgrdClr" valign="top"><?php echo ($conf['ui']['msg-to-user']); ?></td>
		<td class="mainBkgrdClr" valign="top">
		  <div align="right">
		  <div class="welcomeBack"><?php echo translate('Welcome Back', array($_SESSION['sessionName'], $_SESSION['sessionAdmin']))?></div>
			</p>
			<p>
			<?php 	// TOOLATE
					$nowtime =Time::getAdjustedTime(mktime());
					$nowtime = $nowtime - 7200; //gractime 2 uur correctie
					//echo translate_date('header', $nowtime );
					echo (Time::formatDateTime($nowtime) );?> 
				|
			<?php  $this->link->doLink('javascript: help();', translate('Help')) ?>
			  	|
			
			<?php $this->link->doLink($this->dir_path . 'index.php?logout=true', translate('Log Out')) ?>
			</p>
		  </div>
		</td>
	  </tr>
	</table>
	<?php 
	}
		
	/**
	* Print out MENU : a table of links for user or administrator
	* This function prints out a table of links to
	* other parts of the system.  If the user is an admin,
	* it will print out links to administrative pages, also
	* @param none
	*/
	//function showQuickLinks($is_admin = false, $is_group_admin = false) {
	function showQuickLinks($is_admin = false, $is_group_admin = false, $is_schedule_admin = false) {
		global $conf;
		
	?>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	  <tr>
		<td>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td class="tableTitle" style="background-color:#A2B5CD;">
				&middot; <?php echo translate('My Quick Links')?>
			  </td>
			  <td class="tableTitle" style="background-color:#A2B5CD;"><div align="right">
				  <?php $this->link->doLink("javascript: help('quick_links');", '?', '', 'color: #FFFFFF', translate('Help') . ' - ' . translate('My Quick Links')) ?>
				</div>
			  </td>
			</tr>
		  </table>
		  <div id="quicklinks" style="display: <?=(isset($_COOKIE[$table]) && ($_COOKIE[$table] == 'hide'))?'none':'block';?>;">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr style="padding: 5px;" class="cellColor">
			  <td colspan="2">
				<?php

				if ($conf['unused_menu'] == '1') {
					echo '&nbsp;&nbsp;debug=1<br>';
				}
				if ($conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ';
				  $this->link->doLink('rescalendar.php?view=3', translate('View Resource Calendar'));
					echo '</p>';
				}
				
				//	echo '<p><b space>&nbsp;</b> ';
				//  $this->link->doLink('schedule.php', translate('Bookings'));
				//	echo '</p>';
				
				if ($conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ';
				  $this->link->doLink('mycalendar.php?view=3', translate('My Calendar'));
					echo '</p>';
				}
				if ($conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ';
				  $this->link->doLink('my_email.php', translate('Manage My Email Preferences'));
					echo '</p>';
				}
				if ($conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ';
				  $this->link->doLink('mailto:' . $conf['app']['adminEmail'].'?cc=' . $conf['app']['ccEmail'], translate('Email Administrator'), '', '', 'Send a non-technical email to the administrator');
					echo '</p>';
				}
				if ($conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ';
				  $this->link->doLink('register.php?edit=true', translate('Change My Profile Information/Password'));
					echo '</p>';
				}
				
				//	echo '<p><b space>&nbsp;</b> ';
				//  $this->link->doLink('index.php?logout=true', translate('Log Out'));
				//	echo '</p>';
				
				
				// If it's the admin, print out admin links
	//			if ($is_admin) {
				//if ($is_admin || $is_schedule_admin) {
				//	echo '<p style="margin-top:7px;font-weight:bold;">&nbsp;&nbsp;' . translate('System Administration') . '</p>';
				//}
				else if (($is_group_admin) && ($conf['unused_menu'] == '1')) {
					echo '<p style="margin-top:7px;font-weight:bold;">' . translate('Group Administration') . '</p>';
				}
				
				
				if ($is_admin || $is_group_admin) {
					echo '<p><b space>&nbsp;</b> ' .  $this->link->getLink('ctrlpnl.php', translate('Resource timeslot')) . "</p>\n"					
					//. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=approval', translate('Approve Reservations')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=users', translate('Manage Users')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=coworkers', translate('Manage Coworkers')) . "</p>\n"	;	
				}
				if ($is_admin ) {
					// additional resources hier toegevoegd
					echo
					'<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=resources', translate('Manage Resources')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=additional_resources', translate('Manage Additional Resources')) . "</p>\n"	
					;									
				}
				//if ($is_admin && $conf['unused_menu'] == '1') {
				if ($is_admin ) {
					echo '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=archief', translate('Archive')) . "</p>\n"	
					;									
				}
				if ($is_admin && $conf['unused_menu'] == '1') {
					// additional resources hier toegevoegd
					echo
					'<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=resources', translate('Manage Resources')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=additional_resources', translate('Manage Additional Resources')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('blackouts.php', translate('Manage Blackout Times')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=schedules', translate('Manage Schedules')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=announcements', translate('Manage Announcements')) . "</p>\n"
					. '<p style="margin-top:10px;"><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=groups', translate('Manage Groups')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=archief', translate('Archive')) . "</p>\n"	
					;			
				}
				if ($is_schedule_admin && $conf['unused_menu'] == '1') {
					echo '<p><b space>&nbsp;</b> ' .  $this->link->getLink('blackouts.php', translate('Manage Blackout Times')) . "</p>\n";
				}
				

				if ($is_admin && $conf['unused_menu'] == '1') {
					echo
					'<p style="margin-top:10px;"><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=email', translate('Mass Email Users')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('usage.php', translate('Search Scheduled Resource Usage')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('admin.php?tool=export', translate('Export Database Content')) . "</p>\n"
					. '<p><b space>&nbsp;</b> ' .  $this->link->getLink('stats.php', translate('View System Stats')) . "</p>\n";
				}
			?>

			  </td>
			</tr>
		  </table>
		  </div>
		</td>
	  </tr>
	</table>
	<?php
	}

	/**
	* Start main HTML table
	* @param none
	*/
	function startMain() {
	?>

	<table class="main" width="100%" border="0" cellspacing="0" cellpadding="10" >
	  <tr>
		<td class="mainBkgrdClr">
		  <?php 
	}
	
	
	/**
	* End main HTML table
	* @param none
	*/
	function endMain() {
	?>
		</td>
	  </tr>
	</table>
	<?php 
	}
	
	
	/**
	* Print HTML footer
	* This function prints out a tech email
	* link and closes off HTML page
	* @global $conf
	*/
	function printHTMLFooter() {
		global $conf;
	?>
	
	<table width="100%" border="0" cellspacing="0" cellpadding="5" class="mainBorder">
	  <tr>
		<td class="mainBkgrdClr">
		  <div class="goodbye"><p>
			<?php $this->link->doLink($this->dir_path . 'index.php?logout=true', translate('Log Out')) ?>
			|
			<?php $this->link->doLink($this->dir_path . 'ctrlpnl.php', translate('My Control Panel')) ?>
			|
			<a href="#">Top</a>
			</p>
		  </div>
		</td>
	  </tr>
	</table>
	
	</body>
	</html>
	<?php 
	}
	/**
	* Print HTML footer
	* This function prints prints simple footer
	* link and closes off HTML page
	* @global $conf
	*/
	function printHTMLFooterSimple() {
		global $conf;
	?>
	
	</body>
	</html>
	<?php 
	}
	
	
	/**
	* Sets the link class variable to reference a new Link object
	* @param none
	*/
	function set_link() {
		$this->link = CmnFns::getNewLink();
	}
	
	/**
	* Returns the link object
	* @param none
	* @return link object for this class 
	*/
	function get_link() {
		return $this->link;
	}
	
	/**
	* Sets a new title for the template page
	* @param string $title title of page
	*/
	function set_title($title) {
		$this->title = $title;
	}
}
?>