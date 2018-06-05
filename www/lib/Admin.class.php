<?php
/**
* Administrative class provides all functions for managing
*  data and settings in phpScheduleIt
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 04-06-07
* @package Admin
* TOOLATE timings
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/..';

include_once($basedir . '/lib/Utility.class.php');
include_once($basedir . '/lib/db/AdminDB.class.php');
include_once($basedir . '/lib/Auth.class.php');
include_once($basedir . '/lib/AdditionalResource.class.php');
include_once($basedir . '/lib/Group.class.php');
include_once($basedir . '/templates/admin.template.php');


class Admin {
	/*
	Tools array has tool name as index, and array of title and function call as value
	
	Toevoeging : Archief
	*/
	var $tools = array (
					'schedules'	=> array ('Manage Schedules', 'manageSchedules', 'schedules'),
					'users' 	=> array ('Manage Users', 'manageUsers', 'users'),
					'coworkers' => array ('Manage Coworkers', 'manageCoworkers', 'coworkers'),
					'resources'	=> array ('Manage Resources', 'manageResources', 'resources'),
					'perms'		=> array ('Manage User Training', 'managePerms', 'perms'),
					'reservations'	=> array ('Manage Reservations', 'manageReservations', 'reservations'),
					'email'		=> array ('Email Users', 'manageEmail', 'email'),
					'export'	=> array ('Export Database Data', 'export_data', 'export'),
					'pwreset'	=> array ('Reset Password', 'reset_password', 'pwreset'),
					'announcements' => array ('Manage Announcements', 'manageAnnouncements', 'announcements'),
					'approval'	=> array ('Approve Reservations', 'approveReservations', 'approval'),
					'additional_resources' => array ('Manage Additional Resources', 'manageAdditionalResources', 'additional_resources'),
					'groups' 	=> array ('Manage Groups', 'manageGroups', 'groups'),
					'archief'	=> array ('Archive', 'manageArchive', 'archive'),
					);
	var $pager;
	var $db;
	var $tool;
	var $is_error = false;
	var $error_msg;
	var $user = null;

	
		/** janr test adminclass
		*/
	function AdminClassTest() {
		
		echo ('adminclass call oke');
	}

	
	
	/**
	* Admin class constructor
	* Sets up GUI and gets the current tool
	*/
	function Admin($tool) {
		$this->pager = CmnFns::getNewPager();
		$this->pager->setTextStyle('font-size: 10px;');
		$this->pager->setTbClass('textbox');

		$this->db = new AdminDB();
		// Make sure its a proper tool
		if (!isset($this->tools[$tool])) {
			$this->is_error = true;
			$this->error_msg = translate('Could not determine tool').$tools[$fn];
		}
		else
			$this->tool = $this->tools[$tool];
			}

	/**
	* Returns whether an error occured or not
	* @param none
	* @return boolean whether error occured
	*/
	function is_error() {
		return $this->is_error;
	}

	/**
	* Returns the last error message given
	* @param none
	* @return string last error message
	*/
	function get_error_msg() {
		return $this->error_msg;
	}

	/**
	* Determines if the user has privilege to manage this tool
	* @param none
	* @return if this user is allowed to access this tool or not
	*/
	function isUserAllowed() {
		$allowed = false;

		if ($this->user->get_isadmin()) {
			$allowed = true;
		}
		else if (
			$this->tool[2] == 'users' ||
			$this->tool[2] == 'perms' ||
			$this->tool[2] == 'pwreset' ||
			$this->tool[2] == 'reservations' ||
			$this->tool[2] == 'additional_resources' ||
			$this->tool[2] == 'resources' ||
			$this->tool[2] == 'archief' ||
			$this->tool[2] == 'approval'
			) {
			// $allowed = $this->user->is_group_admin();
			$allowed = ($this->user->is_group_admin() || $this->user->is_admin() ) ; // janr stayloggedin problem
		}
//		else if ($this->tool[2] == 'schedules') {
//			$allowed = $this->user->get_isscheduleadmin();
//		}
		return $allowed;
	}

	/**
	* Execute the proper function based on the tool
	* @param none
	* add: janr: manageArchive()
	*/
	function execute() {
		eval('$this->' . $this->tool[1] . '();');
		// echo ($this->tool[1]); // what function?
	}

	/**
	* Interface for managing schedules
	* @param none
	*/
	function manageSchedules() {
		$this->listSchedulesTable();		// List resources and allow deletion
		$this->editScheduleTable();			// Enter/display info about a resource
	}

	/**
	* Prints out list of current schedules
	* @param none
	*/
	function listSchedulesTable() {
		$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('schedules');	// Get number of records
		$pager->setTotRecords($num);				// Pager method calls
		$orders = array('scheduletitle');

		$schedules = $this->db->get_all_admin_data($pager, 'schedules', $orders, true);

		print_manage_schedules($pager, $schedules, $this->db->get_err());	// Print table of resources
		$pager->printPages();						// Print pages
	}


	/**
	* Interface to add or edit schedule information
	* @param none
	*/
	function editScheduleTable() {
		$edit = (isset($_GET['scheduleid']));	// Determine if the form should contain values or be blank
		$rs = array();

		if ($edit)							// Validate machid
			$scheduleid =  trim($_GET['scheduleid']);

		if ($edit) {						// If this is an edit, get the resource information from database
			$rs = $this->db->get_schedule_data($scheduleid);
		}
		if (isset($_SESSION['post'])) {
			$rs = $_SESSION['post'];
		}

		print_schedule_edit($rs, $edit, $this->pager);
		unset($_SESSION['post'], $rs);
	}

	/** janrlogin
	* Interface for managing users
	* Provides interface for viewing user information
	* and deleting users and their reservations from the database
	* @param none
	*/
	function manageUsers() {
		$pager = $this->pager;
		$orders = array('fname', 'lname', 'demerit_punt');
		$groupids = array();
		$fname = isset($_GET['firstName']) ? trim($_GET['firstName']) : null;
		$lname = isset($_GET['lastName']) ? trim($_GET['lastName']) : null;
		if (isset($_GET['groupid'])) {
			 $groupids = array($_GET['groupid']);
		}
		else if (!Auth::isAdmin() && $this->user->is_group_admin()) {
			$groupids = $this->user->get_admin_groups();
		}

		$num   = $this->db->get_num_user_recs($fname, $lname, $groupids);
		
		$pager->setTotRecords($num);
		
		$users = $this->db->search_users($pager, $orders, $fname, $lname, $groupids, 'NoCoworker'); //janr all users minus Coworker

		print_manage_users($pager, $users, $this->db->get_err());		// Print table of users
		$pager->printPages();
	}

	/** janrlogin
	* Interface for managing coworkers
	* Provides interface for viewing coworkers information
	* and deleting coworkers and their reservations from the database
	* NOTE JANR: coworkers resides in the user table. the edit functionality for coworkers is different:
	* 	- users come from osiris, restricted edit fie's
	*	- coworkers, full edit fie's
	* @param none
	*/
	function manageCoworkers() {
		$pager = $this->pager;
		$orders = array('fname', 'lname', 'demerit_punt');
		$groupids = array();
		$fname = isset($_GET['firstName']) ? trim($_GET['firstName']) : null;
		$lname = isset($_GET['lastName']) ? trim($_GET['lastName']) : null;
		if (isset($_GET['groupid'])) {
			 $groupids = array($_GET['groupid']);
		}
		else if (!Auth::isAdmin() && $this->user->is_group_admin()) {
			$groupids = $this->user->get_admin_groups();
		}

		$num   = $this->db->get_num_user_recs($fname, $lname, $groupids); // not used for nothing
		
		$pager->setTotRecords($num);
		
		$users = $this->db->search_users($pager, $orders, $fname, $lname, $groupids, 'Coworker'); //janr coworkers only

		print_manage_coworkers($pager, $users, $this->db->get_err());		// Print table of users
		$pager->printPages();
	}


	/**
	* Interface for managing resources
	* Provides an interface for viewing resource information,
	* adding, modifiying and deleting resource information
	* and associated reservations from database
	* @param none
	*/
	function manageResources() {
	if ( $_GET['machid']== null && $_GET['add']==null  ) { // not edit and not add 
			$this->listResourcesTable();			// List resources and allow deletion
		}
		$this->editResourceTable();					// Enter/display info about a resource
	}


	/**
	* Prints out list of current resources IN ADMIN AREA
	* @param none
	*/
	function listResourcesTable() {
		$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('resources');	// Get number of records
		$pager->setTotRecords($num);				// Pager method calls
		$orders = (isset( $_GET['order'] )  ? array( trim( $_GET['order'] ), 'machID' ) : array('name', 'machID'));

		$resources = $this->db->get_all_resource_data($pager, $orders);

		print_manage_resources($pager, $resources, $this->db->get_err());	// Print table of resources
		// x1800tip_help_print_table ();
		$pager->printPages();
	}

	/**
	* Prints out list of current resources HOME
	* @param none 
	* function is an extend to function listResourcesTable
	* zoekveld dealing via jquery (janr)
	* list wordt eerst onzichtbaar getoond
	*/
	function searchResourcesTable() {
		$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('resources');	// Get number of records
		$pager->setTotRecords($num);				// Pager method calls
		$orders = (isset( $_GET['order'] )  ? array( trim( $_GET['order'] ), 'machID' ) : array('name', 'machID'));

		$resources = $this->db->get_all_resource_data($pager, $orders);

		
		print_search_resources($pager, $resources, $this->db->get_err());	// Print table of resources
		$pager->printPages();
	}


	/**
	* Interface to add or edit resource information
	* @param none
	* @see printResourceEdit()
	*/
	function editResourceTable() {
		$edit = (isset($_GET['machid']));	// Determine if the form should contain values
		$add = (isset($_GET['add']));	// Determine if the form should contain values
		
		
		// janr
	//	$duplicate = (isset($_GET['duplicate']));
	//	if ((isset$_GET['duplicate'])==1) {
	//		$duplicate = TRUE;
	//	}
	//		echo ('DUP is on: '.$_GET['duplicate']);
	
	
		$rs = array();

		if ($edit) {						// Validate machid
			$machid =  trim($_GET['machid']);
		}
		if ($edit) {						// If this is an edit, get the resource information from database
			$rs = $this->db->get_resource_data($machid);
		}
		if ($add) {						// If this is an add, get at least a key
			//$rs = $this->db->get_resource_data($machid);
		}
		if (isset($_SESSION['post'])) {
			$rs = $_SESSION['post'];
		}
// janr:schedulefilter, keuze uit schedules is enkel EIGEN schedule
		if ($_SESSION['sessionAdmin']<>'') {						
			//$rs = $this->db->get_schedule_data_admin($_SESSION['sessionAdmin']);
			//$scheds[0] = $rs[scheduleid];
			 $scheds = $this->db->get_table_data('schedules', array('scheduleid', 'scheduletitle'), array('scheduletitle'));
		}

		print_resource_edit($rs, $scheds, $edit, $this->pager);
		unset($_SESSION['post'], $rs);
	}


	/**
	* Interface for managing user training
	* Provide interface for viewing and managing
	*  user training information
	* @param none
	*/
	function managePerms() {
		$user = new User($_GET['memberid']);	// User object
		if (Auth::isAdmin()) {
			$rs = $this->db->get_mach_ids();
			print_manage_perms($user, $rs, $this->db->get_err());
		}
		else if($this->user->is_group_admin($user->get_groupids()))
		{
			$perms = $user->get_perms();
			$rs = array();
			foreach ($perms as $machid => $p)
			{
				$rs[] = array('machid' => $machid, 'name' => $p);
			}
			print_manage_perms($user, $rs, $this->db->get_err());
			
		}
		else {
			print_not_allowed();
		}
	}


	/**
	* Interface for managing reservations
	* Provide a table to allow admin to modify or delete reservations
	* @param none
	* 
	* janr add more fields to the $orders
	*/
	function manageReservations() {
			// janr afvangen archive
				//$archive = 'off';
			$hidearchive = TRUE;
			    if (  (isset($_GET['archive'])) && ($_GET['archive']=='on')  )  {
					$hidearchive = FALSE;
					//echo "archive=true";
					}
				
				
				
				
		$pager = $this->pager;
		$groupids = !$this->user->get_isadmin() ? $this->user->get_admin_groups() : null;
		$num = $this->user->get_isadmin() ? $this->db->get_num_admin_recs('reservations') : $this->db->get_num_reservations($groupids);
		// print ('is admin<br>') // true
		// print ( $this->db->get_num_reservations($groupids) );  //test
		
		$pager->setTotRecords($num);							// Pager method calls
		 // janr: add to orders
		 
		$orders = array('scheduleid','machid','scheduletitle','start_date', 'end_date', 'name', 'lname', 'starttime', 'endtime', 'checkout_via','checkin_via','reservation_status', 'osiris_ok_now','demerit_punt','contractsoort','clusterid'); // janr
		// nwe par: bool: $hidearchive value default TRUE
		// 
		$res = $this->db->get_reservation_data($pager, $orders, null, $groupids, $hidearchive);  // hier archive filter meegeven
		
		
		$toolate=$this->res_to_late() ; // is lening te laat teruggebracht?  // janr te laat
			//if ( $res->res_to_late() ) 
			//		$toolatetext=' &raquo xxx'. translate('Too late1');
		
		
		
	 	print_manage_reservations($pager, $res, $this->db->get_err(),$toolate);		// Print table of res

		$pager->printPages();									// Print pages
	}


	/**
	* Interface for managing archief
	* Note: dit is niet de archief button in manage_reservations. Dit is voorgaande studiejaar (jaren)
	* Provide a table to allow admin to modify or delete archief
	* @param none
	
	* 
	* janr add more fields to the $orders
	*/
	function manageArchive() {
			// janr afvangen archive
				//$archive = 'off';
			$hidearchive = TRUE;
			//    if (  (isset($_GET['archive'])) && ($_GET['archive']=='on')  )  {
			//		$hidearchive = FALSE;
			//		//echo "archive=true";
			//		}
				
				
				
				
		$pager = $this->pager;
		$groupids = !$this->user->get_isadmin() ? $this->user->get_admin_groups() : null;
		$num = $this->user->get_isadmin() ? $this->db->get_num_admin_recs('reservations_archive_1112') : $this->db->get_num_reservations($groupids);
		// print ('is admin<br>') // true
		// print ( $this->db->get_num_reservations($groupids) );  //test
		
		$pager->setTotRecords($num);							// Pager method calls
		 // janr: add to orders
		 
		$orders = array('scheduleid','machid','scheduletitle','start_date', 'end_date', 'name', 'lname', 'starttime', 'endtime', 'checkout_via','checkin_via','reservation_status', 'osiris_ok_now','demerit_punt','contractsoort','clusterid'); // janr
		// nwe par: bool: $hidearchive value default TRUE
		// 
		$res = $this->db->get_archive_data($pager, $orders, null, $groupids, FALSE);  // hier archive filter meegeven
		
	 	print_manage_archive($pager, $res, $this->db->get_err());		// Print table of res

		$pager->printPages();									// Print pages
	}


	
	/**
	* Wrapper function to call proper email function
	* @param none
	*/
	function manageEmail() {
		if (isset($_POST['previewEmail'])) {		// Preview email
			$_SESSION['sub'] = !empty($_POST['subject']) ? stripslashes(trim($_POST['subject'])) : 'No subject';
			$_SESSION['msg'] = !empty($_POST['message']) ? stripslashes(trim($_POST['message'])) : 'No message';
			$_SESSION['usr'] = isset($_POST['emailIDs']) ? $_POST['emailIDs'] : array();
			preview_email($_SESSION['sub'], nl2br($_SESSION['msg']), $_SESSION['usr']);
		}
		else if (isset($_POST['sendEmail'])) {
			$this->sendMessage();
		}
		else {
			$this->list_email_users();				// Default, pick users/message
		}
	}

	/**
	* Prints out GUI list to of email addresses
	* Prints out a table with option to email users,
	*  and prints form to enter subject and message of email
	* @param none
	*/
	function list_email_users() {
		$sub = isset($_SESSION['sub']) ? $_SESSION['sub'] : 'No subject';
		$msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : 'No message';
		$usr = isset($_SESSION['usr']) ? $_SESSION['usr'] : array();
		$users = $this->db->get_user_email();
		print_manage_email($users, $sub, $msg, $usr, $this->db->get_err());
	}

	/**
	* Send email message to users
	* Loop through array of emails and send HTML mail to each one
	*  printing success or failure message
	* @param none
	*/
	function sendMessage() {
		global $conf;
		$success = false;

		$usr = $_SESSION['usr'];
		$msg = $_SESSION['msg'];
		$sub = $_SESSION['sub'];
		$to = $conf['app']['adminEmail'];

		$mailer = new PHPMailer();
		$mailer->AddAddress($to);
				// $mailer->AddAddress('post@larka.nl', 'test webmaster');
				$mailer->AddAddress($adminemail, $adminemail); // ccmail
		$mailer->FromName = $conf['app']['title'];
		$mailer->From = $to;
		// If emailAdmin is set to true, put them in cc
		for ($i = 0; $i < count($usr); $i++) {
			$mailer->AddBCC($usr[$i]);
		}
		$mailer->Subject = $sub;
		$mailer->Body = $msg;
		$mailer->IsHTML(false);

		if ($mailer->Send()) {
			$success = true;
		}
		else {
			$success = false;
		}

		print_email_results($sub, $msg, $success);
		unset($_SESSION['usr'], $_SESSION['msg'], $_SESSION['sub'], $usr, $sub, $msg);
	}

	/**
	* Call the function to show table data or to show the resulting data
	* @param none
	*/
	function export_data() {
		if (is_array($_POST) && isset($_POST['submit'])) {		// The form is submitted, print out the selected data
			$form = $_POST;
			$xml = ($form['type'] == 'xml');					// XML or CSV format

			// Build the query for each table to output
			foreach ($form as $key => $val) {
				if ($key == 'table') {		// table[] checkbox
					for ($i = 0; $i < count($form[$key]); $i++) {
						$table_name = $form[$key][$i];
						$query = $this->build_export_query($form, $table_name);
						$data = $this->get_export_data($query);
						start_exported_data($xml, $table_name);
						print_exported_data($data, $xml);
						end_exported_data($xml, $table_name);
					}
				}
			}
		}
		else {
			$tables = $this->db->db->getListOf('tables');
			for ($i = 0; $i < count($tables); $i++) {
				$result = $this->db->db->getRow('select * from ' . $this->db->get_table($tables[$i]));
				if (count($result) > 0) {
					foreach ($result as $field => $v) {
						$fields[$tables[$i]][] = $field;	// Assignment is done in the loop
					}
				}
			}
			show_tables($tables, $fields);
		}
	}


	/**
	* Builds the query to retrieve specific data from database
	* @param array $form array of all form data
	* @return the query to execute
	*/
	function build_export_query($form, $table_name) {
		$query = 'select';
		for ($j = 0; $j < count($form['table,' . $table_name]); $j++) {
			if ($form['table,' . $table_name][$j] == 'all')
				$query .= ' * ';
			else
				$query .= ' ' . $form['table,' . $table_name][$j] . ',';
		}
		// Trim off last char (it will be a space or a comma)
		//$query = substr($query, 0, strlen($query) - 1) . ' from ' . $this->db->get_table($table_name);
		$query = substr($query, 0, strlen($query) - 1) . ' from ' . $this->db->get_table_for_export($table_name);

		return $query;
	}

	/**
	* Returns the data to export in an array
	* @param string $query query to execute
	*/
	function get_export_data($query) {
	// echo $query; //test
		$data = array();
		$result = $this->db->db->query($query);
		while ($rs = $result->fetchRow())
			$data[] = $rs;

		return $data;
	}

	/**
	* Prints a form to reset a password for a user
	* @param none
	*/
	function reset_password() {
		$user = new User($_GET['memberid']);	// User object
		if (Auth::isAdmin() || $this->user->is_group_admin($user->get_groupids())) {
			print_reset_password($user);
		}
		else {
			print_not_allowed();
		}
	}

	/**
	* Interface for managing announcements
	* @param none
	*/
	function manageAnnouncements() {
	   $this->listAnnouncementsTable();
	   $this->editAnnouncementTable();
	}

    /**
	* Prints out list of current announcements
	* @param none
	*/
	function listAnnouncementsTable() {
		$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('announcements');	// Get number of records
		$pager->setTotRecords($num);				// Pager method calls
		$orders = array('number');

		$announcements = $this->db->get_all_admin_data($pager, 'announcements', $orders, true);

		print_manage_announcements($pager, $announcements, $this->db->get_err());	// Print table of resources
		$pager->printPages();						// Print pages
	}


	/**
	* Interface to add or edit announcement information
	* @param none
	*/
	function editAnnouncementTable() {
		$edit = (isset($_GET['announcementid']));	// Determine if the form should contain values or be blank
		$rs = array();

		if ($edit)					// Validate machid
			$announcementid = trim($_GET['announcementid']);

		if ($edit) {				// If this is an edit, get the resource information from database
			$rs = $this->db->get_announcement_data($announcementid);
		}
		if (isset($_SESSION['post'])) {
			$rs = $_SESSION['post'];
		}

		print_announce_edit($rs, $edit, $this->pager);
		unset($_SESSION['post'], $rs);
	}

	/**
 	* Interface for approving/disapproving reservations
 	* Provide a table to allow admin to approving/disapproving reservations
	* @param none
 	*/
 	function approveReservations() {
		$pager = $this->pager;
		$num = $this->db->get_num_pending_res();	// Get number of records
		$pager->setTotRecords($num);							// Pager method calls
		$orders = array('start_date', 'end_date', 'name', 'lname', 'starttime', 'endtime');

		$res = $this->db->get_reservation_data($pager, $orders, true, null);

		print_approve_reservations($pager, $res, $this->db->get_err());		// Print table of users
 		$pager->printPages();									// Print pages
 	}

 	/**
 	 * Interface for managing additional resources
 	 */
 	function manageAdditionalResources() {
 		$this->listAdditionalResources();
 		$this->editAdditionalResources();
 	}

 	/**
 	 * Interface for creating/deleting additional resources
 	 * @param none
 	 */
 	function listAdditionalResources() {
 		$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('additional_resources');	// Get number of records
		$pager->setTotRecords($num);				// Pager method calls
		$orders = array('name');

		$resources = $this->db->get_all_admin_data($pager, 'additional_resources', $orders, true);

		print_manage_additional_resources($pager, $resources, $this->db->get_err());	// Print table of additional resources

		$pager->printPages();						// Print pages
 	}

	/**
	* Interface to add or edit an additional resource
	* @param none
	*/
 	function editAdditionalResources() {
 		$edit = (isset($_GET['resourceid']));	// Determine if the form should contain values or be blank
		$resourceid = $edit ? trim($_GET['resourceid']) : null;
		$rs = new AdditionalResource($resourceid);

		if (isset($_SESSION['post'])) {
			$rs = new AdditionalResource();
			$rs->id = $resourceid;
			$rs->name = trim($_SESSION['post']['name']);
			$rs->number_available = trim($_SESSION['post']['number_available']);
		}

		print_additional_resource_edit($rs, $edit, $this->pager);

		unset($_SESSION['post'], $rs);
 	}

	/**
	* Interface for managing groups
	*/
	function manageGroups() {
		$this->listGroups();
		$this->editGroup();
	}

	/**
	* Interface to view and delete a group
	* @param none
	*/
	function listGroups() {
	 	$pager = $this->pager;
		$num = $this->db->get_num_admin_recs('groups');	// Get number of records

		$pager->setTotRecords($num);				// Pager method calls
		$groups = $this->db->get_all_group_data($pager);

		print_manage_groups($pager, $groups, $this->db->get_err());	// Print table of resources

		$pager->printPages();						// Print pages
	}

	/**
	* Interface to add and edit a group
	* @param none
	*/
	function editGroup() {
	 	$edit = (isset($_GET['groupid']));	// Determine if the form should contain values or be blank
		$rs = array();
		$groupid = $edit ? trim($_GET['groupid']) : null;

		$group = new Group(new GroupDB(), $groupid);
		$users = $this->db->get_group_users($groupid);

		if (isset($_POST['submit'])) {
			$group->group_name = $_POST['group_name'];
			$group->group_admin = $_POST['group_admin'];
		}

		print_group_edit($group, $edit, $this->pager, $users);
	}
		/** janr te laat
	* check if this reservation is TOO LATE
	* @param boolean $TELAAT whether TOO LATE STUFF BROUGHT BACK
	*/
		
	function res_to_late() 
	{
		global $conf;
		$nowtime = Time::getAdjustedTime(mktime()); 	// serverdate and time unix
		$enddateDB = $this->end_date + 60 * $this->end;
								
		$toolate=false;
	
		if ( ($enddateDB < ($nowtime - $conf['time']['servercorrect'])) && ($this->reservation_status < 2))
			{ 	$toolate=TRUE;
			}
		return $toolate; 
	}
		
	
	

}
?>