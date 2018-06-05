<?php
/**
* This file accesses the database and retrieves data
*  for adminstrative purposes
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @author Richard Cantzler <rmcii@users.sourceforge.net>
* @version 02-07-09
* @package DBEngine
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
/**
* Base directory of application
*/
@define('BASE_DIR', dirname(__FILE__) . '/../..');

/**
* DBEngine class
*/
include_once(BASE_DIR . '/lib/DBEngine.class.php');


class AdminDB extends DBEngine {

	/**
	* Returns array of user data!!
	* @param Object $pager pager object
	* @param string $table name of table to retrieve
	* @param string $orders order to return values in
	* @param boolean $limit whether this is a limited query or not
	* @return array of user data
	*/
	function get_all_admin_data(&$pager, $table, $orders, $limit = false) {
			// janr:schedulefilter : dit stuk moet in aparte funktie
			// janr filter zo dat de admin alleen eigen spullen ziet.
			// via sessie, 
			// als sessionadmin = emailaddress van deze schedule, dan filter op deze schedule id
			// * @return txt string for SQL
			// If it is an admin for a schedule, find out what schedule
			$schedule_filter_txt1 = null;
			$schedule_filter_txt2 = null;
			$schedule_filter_txt2 = null;
			$rs2= 0;
			if ($_SESSION['sessionAdmin']<>'') {						
				$rs = $this->get_schedule_data_admin($_SESSION['sessionAdmin']);
				$schedule_filter_txt3 = ' WHERE scheduleid =  "'.$rs['scheduleid'].'"'; 
				if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {$schedule_filter_txt3 = ''; }
				
			}
 			// janr:schedulefilter : return schedule_filter_txt3;
			// if ($table == 'login') $schedule_filter_txt3=null; // USERS no filter
			if ($table == 'login') $schedule_filter_txt3=" WHERE `nonactive`<>'y'  "; // USERS no filter
			$return = array();

			if ($limit) {
				$lim = $pager->getLimit();
				$offset = $pager->getOffset();
			}
			else {
				$limit = '';
				$offset = '';
			}
			
			
			
			return $this->get_table_data($table, array('*'), $orders, $lim, $offset, $schedule_filter_txt3);
	}

	

	/**
	* Returns an array of all reservation data
	* @param Object $pager pager object
	* @param array $orders order than results should be sorted in
	* @return array of all reservation data
	
	* janr add filter: hidearchive, default = false
	* default: archive=off
	*/
	function get_reservation_data($pager, $orders, $pending=null, $groupids = null, $hidearchive = false) {
		//var_dump ('<div style="dxisplay:none">$orders ' . $orders . '</div>'); //test
		
		$return = array();

		$order = CmnFns::get_value_order($orders);
		//var_dump($order);
		$vert = CmnFns::get_vert_order();

		if ($order == 'start_date' && !isset($_GET['vert'])) {		// Default the date to DESC
			$vert = 'DESC';
		}

		// Clean out the duplicated order so that MSSQL is OK
		$order_str = trim(preg_replace("/(res|l).$order(,)? (DESC|ASC)?(,)?/", '', 'res.start_date DESC, res.starttime, res.endtime, l.lname, l.fname, rs.name'));
		if (strrpos($order_str, ',') == strlen($order_str)-1) {
			$order_str = substr($order_str, 0, strlen($order_str)-1);
		}

		$group_inner = '';
		$group_and = '';
		if (!is_null($groupids) && !empty($groupids)) {
			$group_inner = ' INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid';
			$group_and = ' AND ug.groupid IN (' . $this->make_in_list($groupids) . ')';
		}
	// janr archive
	// doe iets indien $hidearchive
	// iets = WHERE reservation_status < 3
	$hidearchive_filter_txt1 = '';
	if ($hidearchive) {
		//echo 'hidearchive';
		$hidearchive_filter_txt1 = ' AND res.reservation_status < 3'; // janr query filter
	}
			// janr:schedulefilter : dit stuk moet in aparte funktie
			// janr filter zo dat de admin alleen eigen spullen ziet.
			// via sessie, 
			// als sessionadmin = emailaddress van deze schedule, dan filter op deze schedule id
			// * @return txt string for SQL
			// If it is an admin for a schedule, find out what schedule
			$schedule_filter_txt1 = null;
			$schedule_filter_txt2 = null;
			$rs2= 0;
			if ($_SESSION['sessionAdmin']<>'') {						
				$rs = $this->get_schedule_data_admin($_SESSION['sessionAdmin']);
				$schedule_filter_txt1 = ' AND res.scheduleid =  "'.$rs['scheduleid'].'"'; // janr query filter
				if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {$schedule_filter_txt1 = ''; }
			}
 			// janr:schedulefilter : return schedule_filter_txt1;

			// Set up query to get neccessary records ordered by user request first, then logical order
		// janr add three fields
		// add INNER JOIN db01_schedules AS s ON res.scheduleid = s.scheduleid
		// // janr: ook userstatus: 1.osiris_ok_now, 1.demerit_punt
		$query = 'SELECT res.resid, res.scheduleid,res.machid, res.start_date, res.end_date,
			res.starttime, res.endtime,
			res.created, res.modified, checkout_via, checkin_via, reservation_status, contractsoort, clusterid,
			rs.name,
			l.fname, l.lname, l.memberid, l.osiris_ok_now, l.demerit_punt, s.scheduletitle
			FROM ' . $this->get_table(TBL_RESERVATIONS) . ' as res'
			. ' INNER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' as ru ON res.resid = ru.resid'
			. ' INNER JOIN ' . $this->get_table(TBL_LOGIN) . ' as l ON ru.memberid=l.memberid'
			. ' INNER JOIN ' . $this->get_table(TBL_RESOURCES) . ' as rs ON res.machid=rs.machid'
			. ' INNER JOIN ' . $this->get_table(TBL_SCHEDULES) . ' as s ON res.scheduleid = s.scheduleid'
			. $group_inner
			. ' WHERE ru.owner = 1 AND res.is_blackout <> 1' . $group_and;

        if( $pending ) {
			$query .= ' AND res.is_pending = 1';
		}
		// filter to my schedule
		$query .= $schedule_filter_txt1; // janr add
		$query .= $hidearchive_filter_txt1;// janr add
		$query .= ' ORDER BY ' . $order . ' ' . $vert . ', ' . $order_str;// 'res.start_date DESC, res.starttime, res.endtime, l.lname, l.fname';
			
		// print_r ('<div >get_all_admin_data ' . $query . '</div>'); // janr test

		// now override that pager value! for num records

		// $result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());
		

		$result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());
	
		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			if ($pending) {
				$this->err_msg = translate('No reservations requiring approval');
			}
			else {
				$this->err_msg = translate('No results');
			}

			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}

	

	/**
	* Returns an array of all archive data
	* @param Object $pager pager object
	* @param array $orders order than results should be sorted in
	* @return array of all archive data
	
	*/
	function get_archive_data($pager, $orders, $pending=null, $groupids = null, $hidearchive = false) {
		//var_dump ('<div style="dxisplay:none">$orders ' . $orders . '</div>'); //test
		
		$return = array();

		$order = CmnFns::get_value_order($orders);
		//var_dump($order);
		$vert = CmnFns::get_vert_order();

		if ($order == 'start_date' && !isset($_GET['vert'])) {		// Default the date to DESC
			$vert = 'DESC';
		}

		// Clean out the duplicated order so that MSSQL is OK
		$order_str = trim(preg_replace("/(res|l).$order(,)? (DESC|ASC)?(,)?/", '', 'res.start_date DESC, res.starttime, res.endtime, l.lname, l.fname, rs.name'));
		if (strrpos($order_str, ',') == strlen($order_str)-1) {
			$order_str = substr($order_str, 0, strlen($order_str)-1);
		}

		$group_inner = '';
		$group_and = '';
		if (!is_null($groupids) && !empty($groupids)) {
			$group_inner = ' LEFT JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid';
			$group_and = ' AND ug.groupid IN (' . $this->make_in_list($groupids) . ')';
		}
	
			// janr:schedulefilter : dit stuk moet in aparte funktie
			// janr filter zo dat de admin alleen eigen spullen ziet.
			// via sessie, 
			// als sessionadmin = emailaddress van deze schedule, dan filter op deze schedule id
			// * @return txt string for SQL
			// If it is an admin for a schedule, find out what schedule
			$schedule_filter_txt1 = null;
			$schedule_filter_txt2 = null;
			$rs2= 0;
			if ($_SESSION['sessionAdmin']<>'') {						
				$rs = $this->get_schedule_data_admin($_SESSION['sessionAdmin']);
				$schedule_filter_txt1 = ' AND res.scheduleid =  "'.$rs['scheduleid'].'"'; // janr query filter
				if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {$schedule_filter_txt1 = ''; }
			}
 			// janr:schedulefilter : return schedule_filter_txt1;

			// Set up query to get neccessary records ordered by user request first, then logical order
		// janr add three fields
		// add LEFT JOIN db01_schedules AS s ON res.scheduleid = s.scheduleid
		// // janr: ook userstatus: 1.osiris_ok_now, 1.demerit_punt
		$query = 'SELECT res.resid, res.scheduleid,res.machid, res.start_date, res.end_date,
			res.starttime, res.endtime,
			res.created, res.modified, checkout_via, checkin_via, reservation_status, contractsoort, clusterid,
			rs.name,
			l.fname, l.lname, l.memberid, l.osiris_ok_now, l.demerit_punt, s.scheduletitle
			FROM ' . $this->get_table(TBL_RESERVATIONS_ARCHIVE) . ' as res'
			. ' LEFT JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' as ru ON res.resid = ru.resid'
			. ' LEFT JOIN ' . $this->get_table(TBL_LOGIN) . ' as l ON ru.memberid=l.memberid'
			. ' LEFT JOIN ' . $this->get_table(TBL_RESOURCES) . ' as rs ON res.machid=rs.machid'
			. ' LEFT JOIN ' . $this->get_table(TBL_SCHEDULES) . ' as s ON res.scheduleid = s.scheduleid'
			. $group_inner
			. ' WHERE ru.owner = 1 AND res.is_blackout <> 1' . $group_and;

        if( $pending ) {
			$query .= ' AND res.is_pending = 1';
		}
		// filter to my schedule
		$query .= $schedule_filter_txt1; // janr add
		$query .= $hidearchive_filter_txt1;// janr add
		$query .= ' ORDER BY ' . $order . ' ' . $vert . ', ' . $order_str;// 'res.start_date DESC, res.starttime, res.endtime, l.lname, l.fname';
			
		// print_r ('<div >get_all_admin_data ' . $query . '</div>'); // janr test

		// now override that pager value! for num records

		// $result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());
		
		// echo 'WEBMASTER DATA IGNORE<BR>'.$query; //test only

		$result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());
	
		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			if ($pending) {
				$this->err_msg = translate('No reservations requiring approval');
			}
			else {
				$this->err_msg = translate('No results');
			}

			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}
// //
	
	
	
	
	/**
	* Returns an array of all resource data
	* @param Object $pager pager object
	* @param array $orders order than results should be sorted in
	* @return array of all resource data
	*/
	function get_all_resource_data($pager, $orders) {
	
			// janr:schedulefilter : dit stuk moet in aparte funktie
			// janr filter zo dat de admin alleen eigen spullen ziet.
			// via sessie, 
			// als sessionadmin = emailaddress van deze schedule, dan filter op deze schedule id
			// * @return txt string for SQL
			// If it is an admin for a schedule, find out what schedule
			$schedule_filter_txt1 = null;
			$schedule_filter_txt2 = null;
			$rs2= 0;
			if ($_SESSION['sessionAdmin']<>'') {						
				$rs = $this->get_schedule_data_admin($_SESSION['sessionAdmin']);
				$schedule_filter_txt1 = ' AND res.scheduleid =  "'.$rs['scheduleid'].'"'; // janr query filter
				$schedule_filter_txt2 = ' WHERE rs.scheduleid =  "'.$rs['scheduleid'].'"'; // janr query filter
				if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {$schedule_filter_txt1 = '';$schedule_filter_txt2 = ''; }
			}
 			// janr:schedulefilter : return schedule_filter_txt1;
// $xxx=('SELECT * FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid=?', array($machid));
// print ($xxx);


		$return = array();

		$order = CmnFns::get_value_order($orders);
		$vert = CmnFns::get_vert_order();

		// Set up query to get neccessary records ordered by user request first, then logical order
		$query = 'SELECT rs.*, s.scheduletitle
			FROM ' . $this->get_table(TBL_RESOURCES) . ' as rs INNER JOIN ' . $this->get_table(TBL_SCHEDULES) . ' as s
			ON rs.scheduleid=s.scheduleid ' . $schedule_filter_txt2. '
			ORDER BY ' . $order . ' ' . $vert;
 // print ('<div style="display:none">query ' . $query . '</div>');
		$result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());

		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}


	/**
	* Returns the number of records from a given table
	*  (for paging purposes)
	* @param string $table table to count
	* @return number of records in the table
	*/
	function get_num_admin_recs($table, $where_clause = null, $where_values = array()) {
		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table($table);
		if ($table == 'reservations')
			$query .= ' WHERE is_blackout <> 1 ';

		if (!empty($where_clause)) {
			$query .= $where_clause;
		}
	//	print_r ($query);
		// Get # of records
		$result = $this->db->getRow($query, $where_values);

		// Check query
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}

    /**
	* Returns the number of reservations pending approval
	*  (for paging purposes)
	* @param none
	* @return number of reservations pending approval
	*/
	function get_num_pending_res() {
		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table(TBL_RESERVATIONS) . ' as reservations WHERE is_pending = 1';
		$result = $this->db->getRow($query);

		// Check query
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}

	/**
	* Gets the total number reservations in the system for these groups
	* @param array $groupids array of groupids to search on
	* @return number of reservation records
	*/
	function get_num_reservations($groupids) {
		$groups = $this->make_in_list($groupids);

		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table(TBL_RESERVATIONS) . ' r
				INNER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON r.resid = ru.resid AND ru.owner = 1
				INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid
				WHERE r.is_blackout <> 1 AND ug.groupid IN (' . $groups . ')';

		$result = $this->db->getRow($query);
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}

	/**
	* Gets the total number reservations in the system for these groups
	* @param array $groupids array of groupids to search on
	* @return number of reservation records
	*/
	function get_reservations($groupids) {
		$groups = $this->make_in_list($groupids);

		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table(TBL_RESERVATIONS) . ' r
				INNER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON r.resid = ru.resid AND ru.owner = 1
				INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid
				WHERE r.is_blackout <> 1 AND ug.groupid IN (' . $groups . ')';

		$result = $this->db->getRow($query);
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}
	
	
	/**
	* Gets the total number archive in the system for these groups
	* @param array $groupids array of groupids to search on
	* @return number of reservation records
	*/
	function get_num_archive($groupids) {
		$groups = $this->make_in_list($groupids);

		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table(TBL_RESERVATIONS_ARCHIVE) . ' r
				INNER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON r.resid = ru.resid AND ru.owner = 1
				INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid
				WHERE r.is_blackout <> 1 AND ug.groupid IN (' . $groups . ')';

		$result = $this->db->getRow($query);
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}

	/**
	* Gets the total number archive in the system for these groups
	* @param array $groupids array of groupids to search on
	* @return number of archive records
	*/
	function get_archive($groupids) {
		$groups = $this->make_in_list($groupids);

		$query = 'SELECT COUNT(*) as num FROM ' . $this->get_table(TBL_RESERVATIONS_ARCHIVE) . ' r
				INNER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON r.resid = ru.resid AND ru.owner = 1
				INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON ru.memberid = ug.memberid
				WHERE r.is_blackout <> 1 AND ug.groupid IN (' . $groups . ')';

		$result = $this->db->getRow($query);
		$this->check_for_error($result);

		return $result['num'];              // # of records
	}

/** janr
	* Returns an array of data about a schedule
	* @param int $adminemail admin email
	* @return array of data associated with that schedule
	*/
	function get_schedule_data_admin($adminemail) {

		$result = $this->db->getRow('SELECT * FROM ' . $this->get_table(TBL_SCHEDULES) . ' WHERE adminemail=?', array($adminemail));
		// Check query
		$this->check_for_error($result);

		if (count($result) <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		return $this->cleanRow($result);
	}

	/**
	* Returns an array of data about a schedule
	* @param int $scheduleid schedule id
	* @return array of data associated with that schedule
	*/
	function get_schedule_data($scheduleid) {

		$result = $this->db->getRow('SELECT * FROM ' . $this->get_table(TBL_SCHEDULES) . ' WHERE scheduleid=?', array($scheduleid));
		// Check query
		$this->check_for_error($result);

		if (count($result) <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		return $this->cleanRow($result);
	}

	/**
	* Inserts a new schedule into the database
	* @param array $rs array of schedule data
	*/
	function add_schedule($rs) {
		$values = array();

		$id = $this->get_new_id();

		array_push($values, $id);	// Values to insert
		array_push($values, $rs['scheduletitle']);
		array_push($values, $rs['daystart']);
		array_push($values, $rs['dayend']);
		array_push($values, $rs['timespan']);
		array_push($values, 12);
		array_push($values, $rs['weekdaystart']);
		array_push($values, $rs['viewdays']);
		array_push($values, $rs['ishidden']);
		array_push($values, $rs['showsummary']);
		array_push($values, $rs['adminemail']);

		$q = $this->db->prepare('INSERT INTO ' . $this->get_table(TBL_SCHEDULES) .
			' (scheduleid,scheduletitle,daystart,dayend,timespan,timeformat,weekdaystart,viewdays,ishidden,showsummary,adminemail)'
			.' VALUES(?,?,?,?,?,?,?,?,?,?,?)');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		return $id;
	}

	/**
	* Edits resource data in database
	* @param array $rs array of values to edit
	*/
	function edit_schedule($rs) {
		$values = array();

		array_push($values, $rs['scheduletitle']);
		array_push($values, $rs['daystart']);
		array_push($values, $rs['dayend']);
		array_push($values, $rs['timespan']);
		array_push($values, $rs['weekdaystart']);
		array_push($values, $rs['viewdays']);
		array_push($values, $rs['ishidden']);
		array_push($values, $rs['showsummary']);
		array_push($values, $rs['adminemail']);
		array_push($values, $rs['scheduleid']);

		$sql = 'UPDATE '. $this->get_table(TBL_SCHEDULES) . ' SET'
				. ' scheduletitle=?, daystart=?, dayend=?, timespan=?,'
				. ' weekdaystart=?, viewdays=?, ishidden=?, showsummary=?, adminemail=?'
				. ' WHERE scheduleid=?';

		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
	}

	/**
	* Delete a list of schedules and all of their reservations
	* @param array $schedules array of schedules
	*/
	function del_schedule($schedules) {
		// Do not delete default schedule
		$default_schedule = $this->db->getOne('SELECT scheduleid FROM ' . $this->get_table(TBL_SCHEDULES) . ' WHERE isdefault = 1');
		if (($idx = array_search($default_schedule, $schedules)) !== false) {
			unset($schedules[$idx]);
		}

		$scheduleids = $this->make_del_list($schedules);

		// Get all the ids of reservations that are associated with these schedules
		$result = $this->db->query('SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE scheduleid IN (' . $scheduleids . ')');
		$this->check_for_error($result);
		$results = array();
		while ($rs = $result->fetchRow()) {
			$results[] = $rs['resid'];
		}

		$resids = $this->make_del_list($results);
		$result->free();
		// Delete out of the reservation_users table
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);
		// Delete out of the reservations table
		$result = $result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete reservation/accessory relationship
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete all reservations for these schedules
		//$result = $this->db->query('DELETE r, ru'
		//						. ' FROM ' . $this->get_table('reservations') . ' r LEFT JOIN ' . $this->get_table('reservation_users') . ' ru '
		//						. ' ON r.resid = ru.resid WHERE r.scheduleid IN(' . $scheduleids . ')');
		$this->check_for_error($result);
		// Delete all schedules
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_SCHEDULES) . ' WHERE scheduleid IN(' . $scheduleids . ')');
		$this->check_for_error($result);

		$newid = $this->db->getOne('SELECT scheduleid FROM ' . $this->get_table(TBL_SCHEDULES) . ' WHERE isdefault = 1');

		// Reassign all resources from old schedule to default
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_RESOURCES) . ' SET scheduleid = ? WHERE scheduleid IN(' . $scheduleids . ')', array($newid));

		$this->check_for_error($result);
	}

	/**
	* Sets the default schedule
	* @param string $scheduleid id of default schedule
	*/ //JANR yyyyyy
	function set_default_schedule($scheduleid) {
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_SCHEDULES) . ' SET isdefault = 0');
		$this->check_for_error($result);

		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_SCHEDULES) . ' SET isdefault = 1 WHERE scheduleid = ?', array($scheduleid));
		$this->check_for_error($result);
	}

	/**
	* Return the number of records found in a search
	*  for use in paging
	* @param string $fname first name of the user to search for
	* @param string $lname last name of the user to search for
	* @param array $groupids group ids to limit users to
	* @return number of records found
	*/
	function get_num_user_recs($fname = null, $lname = null, $groupids = array()) {
		$inner_join = '';
		$where = '';
		$values = array();
		$group_list = $this->make_in_list($groupids);

		if (!empty($groupids)) {
			$inner_join = ' INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON l.memberid = ug.memberid AND ug.groupid IN (' . $group_list . ')';
		}
		if (!empty($fname) || !empty($lname) ) {
			$where = " WHERE fname LIKE '$fname%' AND lname LIKE '$lname%'";
		}
		$result = $this->db->getRow('SELECT COUNT(*) AS num FROM ' . $this->get_table(TBL_LOGIN) . ' l '
				. $inner_join
				. $where, $values);

		$this->check_for_error($result);
		return $result['num'];
	}

	/**
	* Search for users matching this first and last name and return the results in an array
	* @param object $pager pager object
	* @param array $orders order to print results in
	* @param string $fname first name to search for
	* @param string $lname last name to search for
	* @param string $groupid groupid to limit users to
		* filter:
			'Coworker' - enkel medewerkers
			'NoCoworker' - students only
		* filter2:
			 `nonactive`<>'y' 
	* @return array of user data
	*/
	function search_users(&$pager, $orders, $fname = null, $lname = null, $groupids = array(), $klas) {
	// print_r ($orders); //janrorders
		$inner_join = '';
		$where = '';
		$values = array();
		$group_list = $this->make_in_list($groupids);

		if (!empty($groupids)) 
		{
			$inner_join = ' INNER JOIN ' . $this->get_table(TBL_USER_GROUPS) . ' ug ON l.memberid = ug.memberid AND ug.groupid IN (' . $group_list . ')';
		}
		// er zijn zoekwaardes opgegeven, wordt niet gebruikt
		if (!empty($fname) || !empty($lname) ) 
		{
			// print ($fname. ' in f-n' .$lname); //janrsearch test
			// $where = " WHERE fname LIKE '$fname%' AND lname LIKE '$lname%'";
		}
		// er zijn zoekwaardes opgegeven, wordt niet gebruikt
		$where = " WHERE `nonactive`<>'y' "; // deze altijd
		if (!empty($klas) && ($klas =='Coworker') ) 
		{
			$where = " WHERE klas LIKE 'Coworker' ";
			$where .= " AND ";
			$where .= " `nonactive`<>'y' ";
		}
		if (!empty($klas) && ($klas =='NoCoworker') ) 
		{
			$where = " WHERE klas NOT LIKE 'Coworker' ";
			$where .= " AND ";
			$where .= " `nonactive`<>'y' ";
		}
		
			// print ($where); // janrtest
		$return = array();

		$order = CmnFns::get_value_order($orders);
		$vert = CmnFns::get_vert_order();

		if ($order == 'date' && !isset($_GET['vert']))		// Default the date to DESC
		{
			$vert = 'DESC';
		}
		// janr dit is vage troep en moet eruit.
		// $orders = trim(preg_replace("/l.$order,?/", '', 'l.lname, l.demerit_punt'));
		// if (strrpos($orders, ',') == strlen($orders)-1) 
		// {
		//	$orders = substr($orders, 0, strlen($orders)-1);
		// }
		// echo ('<br>'); // janrorders test
		// print_r ($orders);		// janrorders test
		// Set up query to get neccessary records ordered by user request first, then logical order
		// janr  WAS: ORDER BY $orders en IS:  ORDER BY $order
		$query = 'SELECT l.*'
				. ' FROM ' . $this->get_table(TBL_LOGIN) . ' as l'
				. $inner_join
				. $where
				. " ORDER BY $order $vert";

				// echo ('<br>'); // janrorders test
				// print_r ($query); // janrorders test
				// echo ('<br>'); // janrorders test limit		
				// print ($limit); // janrorders test	
		
		$result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit(), $values);

		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}

	/**
	* Returns an array of data about a resource
	* @param int $machID resource id
	* @return array of data associated with that resource
	*/
	function get_resource_data($machid) {
	

		$result = $this->db->getRow('SELECT * FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid=?', array($machid));
		// Check query
		$this->check_for_error($result);

		if (count($result) <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		return $this->cleanRow($result);
	}


	/**
	* Deletes a list of users from the database
	* @param array $users list of users to delete
	*/
	function del_users($users) {
		$uids = $this->make_del_list($users);

		// Delete user_groups
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_USER_GROUPS) . ' WHERE memberid IN (' . $uids . ')');
		$result = $this->db->execute($q);
		$this->check_for_error($result);

		// Delete reservation participation (non-owner)
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE memberid IN (' . $uids . ') AND owner <> 1');
		$result = $this->db->execute($q);
		$this->check_for_error($result);

		// Delete all reservations, reservation_users for these users if they owned the reservation
		$result = $this->db->query('SELECT resid FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE memberid IN (' . $uids . ') AND owner = 1');
		$this->check_for_error($result);

		$results = array();
		while ($rs = $result->fetchRow()) {
			$results[] = $rs['resid'];
		}
		$resids = $this->make_del_list($results);
		$result->free();

		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid IN (' . $resids . ')');
		$result = $this->db->execute($q);
		$this->check_for_error($result);

		//$result = $this->db->query('DELETE r, ru FROM ' . $this->get_table('reservations') . ' r LEFT JOIN ' . $this->get_table('reservation_users') . ' ru ON r.resid = ru.resid  WHERE ru.memberid IN (' . $uids . ') AND ru.owner = 1');
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid IN (' . $resids . ')');
		$result = $this->db->execute($q);
		$this->check_for_error($result);

		// Delete reservation/accessory relationship
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete permissions
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_PERMISSION) . ' WHERE memberid IN (' . $uids . ')');
		$result = $this->db->execute($q);
		$this->check_for_error($result);

		// Delete users
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_LOGIN) . ' WHERE memberid IN (' . $uids . ')');
		$result = $this->db->execute($q);
		$this->check_for_error($result);
	}

	
	//janr

   /**
    * Gets to check newmachid 
    * @param newmachid
    * @return bool
	// JANR ONGEBRUIKT, WERKT NIET
    */
    function check_exists_resourcexxx($newmachid) {
		
		$result = 'SELECT machid FROM ' . $this->get_table('resources') . ' WHERE machid=\''.$newmachid.'\'';
        $this->check_for_error($result);
		$result = mysqli_query($query);

		$test = mysqli_num_rows($result);
echo ('<BR>test: '.$test);

       if ( empty($result) ){    // If default is hidden
	   echo ('<BR>EMPTIT: '.empty($result));
			return true;
        } else {
			   echo ('<BR>EMPTIF: '.empty($result));
			return true;
		}
    }

	/**
	* Inserts a new resource into the database with given barkode
	* @param array $rs array of resource data
	*/
	function add_resource_barkode($rs) {
		$values = array();

		$values[] = $rs['newmachid']; //janr barcode = key
		$values[] = $rs['scheduleid'];
		$values[] = $rs['name'];
		$values[] = $rs['location'];
		$values[] = $rs['rphone'];
		$values[] = $rs['notes'];
		$values[] = 'a';
		$values[] = $rs['minres'];
		$values[] = $rs['maxres'];
		$values[] = intval(isset($rs['autoassign']));
		$values[] = intval(isset($rs['approval']));
		$values[] = intval(isset($rs['allow_multi']));
		$values[] = $rs['max_participants'];
		$values[] = $rs['min_notice_time'];
		$values[] = $rs['max_notice_time'];
		$values[] = $rs['package'];
		$values[] = $rs['description'];
		$values[] = $rs['maintenance'];
		$values[] = $rs['rowner'];
		$values[] = $rs['serial_nr'];
		$values[] = $rs['vast_toebehoren'];
				$values[] = $rs['aankoopbedrag'];
				$values[] = $rs['datum_aankoop'];
				$values[] = $rs['uitleennivo'];
				$values[] = $rs['waardecat'];
				$values[] = $rs['uitleenperiode'];
				
		$q = $this->db->prepare('INSERT INTO ' . $this->get_table(TBL_RESOURCES) . ' VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		return $id;
	}
	/**
	* Inserts a new resource into the database with generated new id
	* @param array $rs array of resource data
	*/
	function add_resource($rs) {
		$values = array();

		$id = $this->get_new_id();

		$values[] = $id;
		$values[] = $rs['scheduleid'];
		$values[] = $rs['name'];
		$values[] = $rs['location'];
		$values[] = $rs['rphone'];
		$values[] = $rs['notes'];
		$values[] = 'a';
		$values[] = $rs['minres'];
		$values[] = $rs['maxres'];
		$values[] = intval(isset($rs['autoassign']));
		$values[] = intval(isset($rs['approval']));
		$values[] = intval(isset($rs['allow_multi']));
		$values[] = $rs['max_participants'];
		$values[] = $rs['min_notice_time'];
		$values[] = $rs['max_notice_time'];
		$values[] = $rs['package'];
		$values[] = $rs['description'];
		$values[] = $rs['maintenance'];
		$values[] = $rs['rowner'];
		$values[] = $rs['serial_nr'];
		$values[] = $rs['vast_toebehoren'];
				$values[] = $rs['aankoopbedrag'];
				$values[] = $rs['datum_aankoop'];
				$values[] = $rs['uitleennivo'];
				$values[] = $rs['waardecat'];
				$values[] = $rs['uitleenperiode'];
				
				
		$q = $this->db->prepare('INSERT INTO ' . $this->get_table(TBL_RESOURCES) . ' VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		return $id;
	}

	/**
	* Edits resource data in database
	* @param array $rs array of values to edit
	*/
	function edit_resource($rs) {
		$values = array();

		$sql = 'SELECT scheduleid FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid=?';
		$old_id = $this->db->getOne($sql, array($rs['machid']));
		$this->check_for_error($old_id);

		$values[] = $rs['scheduleid'];
		$values[] = $rs['name'];
		$values[] = $rs['location'];
		$values[] = $rs['rphone'];
		$values[] = $rs['notes'];
		$values[] = $rs['minres'];
		$values[] = $rs['maxres'];
		$values[] = intval(isset($rs['autoassign']));
		$values[] = intval(isset($rs['approval']));
		$values[] = intval(isset($rs['allow_multi']));
		$values[] = $rs['max_participants'];
		$values[] = $rs['min_notice_time'];
		$values[] = $rs['max_notice_time'];
		$values[] = $rs['package'];
		$values[] = $rs['description'];
		$values[] = $rs['maintenance'];
		$values[] = $rs['rowner'];
		$values[] = $rs['serial_nr'];
		$values[] = $rs['vast_toebehoren'];
				$values[] = $rs['aankoopbedrag'];
				$values[] = $rs['datum_aankoop'];
				$values[] = $rs['uitleennivo'];
				$values[] = $rs['waardecat'];
				$values[] = $rs['uitleenperiode'];
		$values[] = $rs['machid'];

		$sql = 'UPDATE '. $this->get_table(TBL_RESOURCES) . ' SET '
				. 'scheduleid=?, name=?, location=?, rphone=?, notes=?, minres=?, maxres=?, autoassign=?, approval=?, allow_multi=?, max_participants=?, min_notice_time=?, max_notice_time=?, package=?, description=?, maintenance=?, rowner=?, serial_nr=?, vast_toebehoren=?, aankoopbedrag=?, datum_aankoop=?, uitleennivo=?, waardecat=?, uitleenperiode=?'
				. ' WHERE machid=?';

		// print_r ($sql); // test janr
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);

		if ($old_id != $rs['scheduleid']) {		// Update reservations if schedule changes
			$sql = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS) . ' SET scheduleid=? WHERE machid=?';
			$result = $this->db->query($sql, array($rs['scheduleid'], $rs['machid']));
			$this->check_for_error($result);
		}
	}

	/** janr
	* Duplicates resource data in database
	* @param array $rs array of values to edit
	*/
	function dup_resource($rs) {
			$values = array();
// print_r ($rs);
		$id = $this->get_new_id();

		$values[] = $id;
		$values[] = $rs['scheduleid'];
		$values[] = $rs['name'].' Copy';
		$values[] = $rs['location'];
		$values[] = $rs['rphone'];
		$values[] = $rs['notes'];
		$values[] = 'u';
		$values[] = $rs['minres'];
		$values[] = $rs['maxres'];
		$values[] = intval(isset($rs['autoassign']));
		// "Goedkeuring vereist, student mag dit zelf reserveren" is default: no
		//$values[] = intval(isset($rs['approval']));
		$values[] = 0;
		$values[] = intval(isset($rs['allow_multi']));
		$values[] = $rs['max_participants'];
		$values[] = $rs['min_notice_time'];
		$values[] = $rs['max_notice_time'];
		$values[] = $rs['package'];
		$values[] = $rs['description'];
		$values[] = $rs['maintenance'];
		$values[] = $rs['rowner'];
		$values[] = $rs['serial_nr'];
		$values[] = $rs['vast_toebehoren'];
		$values[] = $rs['aankoopbedrag'];
				$values[] = $rs['datum_aankoop'];
				$values[] = $rs['uitleennivo'];
				$values[] = $rs['waardecat'];
				$values[] = $rs['uitleenperiode'];
		
		$q = $this->db->prepare('INSERT INTO ' . $this->get_table(TBL_RESOURCES) . ' VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		return $id;


	}

	/** JANR
	* Deletes ONE resources from the database
	* deletes old machid when resource gets new barcode
	* @param array $rs list of machids to delete
	* @param array $rs list of machids to delete
	*/
	function del_one_resource($id) {

		// work with $rs['machid'];
		// Delete out of the reservation_users table
		// Delete one resources
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid =?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q,$id);
		$this->check_for_error($result);
		//echo ('delete one done:'.$id);
	}
	function exists_resource($id) {
// janrhier werkt niet
		$sql = 'SELECT FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid =?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q,$id);
		$this->check_for_error($result);
		print_r ($result);
	}
	/**
	* Updates reservations with the new machid of the changes barcode of resourcein the database
	* @param array $rs list of machids to delete
	*/	
	function update_reservations($old_id,$new_id)	{
		$rs = array();
		$rs[]=$old_id;
		$rs_list = $this->make_del_list($rs);
			
			// UPDATE `db01_reservations` SET `machid`='10F' WHERE machid='10e'
	
				// Reassign all reservations with new resources-id
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_RESERVATIONS) . ' SET machid = ? WHERE machid IN (' . $rs_list . ')',$new_id );
		//$result = $this->db->query('UPDATE ' . $this->get_table(TBL_RESOURCES) . ' SET scheduleid = ? WHERE scheduleid IN(' . $scheduleids . ')', array($newid));

		
		$this->check_for_error($result);
		$results = array();
		
		
	}
	/**
	* Deletes a list of resources from the database
	* @param array $rs list of machids to delete
	*
	*	janr 2015
	* deze routine vervalt, tbv statistieken:
					Dan wordt de werking in het systeem zo:
				 
				- alle reserveerregels over dit artikel blijven bestaan.
				- het artikel blijft bestaan in database, maar wordt op geen enkel scherm meer getoond (*)
				- het statusveld van artikel is
								- actief
								- non actief
				wordt uitgebreid met
								- deleted

	*
	*/
	function del_resource_this_is_deprecated($rs) {
		$rs_list = $this->make_del_list($rs);

		// Get all the ids of reservations that are associated with these schedules
		$result = $this->db->query('SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
		$results = array();
		while ($rs = $result->fetchRow()) {
			$results[] = $rs['resid'];
		}

		$resids = $this->make_del_list($results);
		$result->free();

		// Delete out of the reservation_users table
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete out of the reservations table
		$result = $result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);

		// Delete resources
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);

		// Delete reservation/accessory relationship
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete all reservations and the associated record in reservation_users using these resources
		//$result = $this->db->query('DELETE r, ru FROM ' . $this->get_table('reservations') . ' r LEFT JOIN ' . $this->get_table('reservation_users') . ' ru ON r.resid = ru.resid WHERE r.machid IN (' . $rs_list . ')');
		//$this->check_for_error($result);

		// Delete permissions
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_PERMISSION) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
	}
/**
	* Deletes a list of resources from the database
	* @param array $rs list of machids to delete
	*
	*	janr 2015
	* deze routine vervalt, tbv statistieken:
					Dan wordt de werking in het systeem zo:
				 
				- alle reserveerregels over dit artikel blijven bestaan.
				- het artikel blijft bestaan in database, maar wordt op geen enkel scherm meer getoond (*)
				- het statusveld van artikel is
								- actief
								- non actief
				wordt uitgebreid met
								- deleted

	*
	*/
	function del_resource($rs) {
		$rs_list = $this->make_del_list($rs);
/*
		// Get all the ids of reservations that are associated with these schedules
		$result = $this->db->query('SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
		$results = array();
		while ($rs = $result->fetchRow()) {
			$results[] = $rs['resid'];
		}

		$resids = $this->make_del_list($results);
		$result->free();

		// Delete out of the reservation_users table
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete out of the reservations table
		$result = $result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
*/
		// Delete resources
		
		//$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid IN (' . $rs_list . ')');
		//$this->check_for_error($result);
		// janr sept 2015; Update resource to status is deleted = d
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_RESOURCES) . ' SET status = "d" WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
		//echo "Result janr : ";
		//echo $result;
		
/*
		// Delete reservation/accessory relationship
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid IN (' . $resids . ')');
		$this->check_for_error($result);

		// Delete all reservations and the associated record in reservation_users using these resources
		//$result = $this->db->query('DELETE r, ru FROM ' . $this->get_table('reservations') . ' r LEFT JOIN ' . $this->get_table('reservation_users') . ' ru ON r.resid = ru.resid WHERE r.machid IN (' . $rs_list . ')');
		//$this->check_for_error($result);

		// Delete permissions
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_PERMISSION) . ' WHERE machid IN (' . $rs_list . ')');
		$this->check_for_error($result);
*/
	}

	/**
	* Toggles a resource active/inactive
	* @param string $machid id of resource to toggle
	* @param string $status current status of the resource
	*/
	function tog_resource($machid, $status) {
		$status = ($status == 'a') ? 'u' : 'a';
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_RESOURCES) . ' SET status=? WHERE machid=?', array($status, $machid));
		$this->check_for_error($result);
	}

	/**
	* Clears all user permissions
	* @param string $memberid member id to clear
	*/
	function clear_perms($memberid) {
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_PERMISSION) . ' WHERE memberid=?', array($memberid));
		$this->check_for_error($result);
	}

	/**
	* Sets user permissions for resources
	* @param string $memberid member's id
	* @param array $machids array of machids to set
	*/
	function set_perms($memberid, $machids) {
		// Create values array for prepared query
		$values = array();
		for ($i = 0; $i < count($machids); $i++) {
			$values[$i] = array($memberid, $machids[$i]);
		}

		$query = 'INSERT INTO ' . $this->get_table(TBL_PERMISSION) . ' VALUES (?,?)';
		// Prepare query
		$q = $this->db->prepare($query);
		// Execute query
		$result = $this->db->executeMultiple($q, $values);
		$this->check_for_error($result);

		unset($values);
	}

		/**
	* Returns an array of data about a announcement
	* @param int $announcementid announcement id
	* @return array of data associated with that announcement
	*/
	function get_announcement_data($announcementid) {

		$result = $this->db->getRow('SELECT * FROM ' . $this->get_table(TBL_ANNOUNCEMENTS) . ' WHERE announcementid=?', array($announcementid));
		// Check query
		$this->check_for_error($result);

		if (count($result) <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		return $this->cleanRow($result);
	}

	/**
	* Inserts a new announcement into the database
	* @param array $rs array of announcement data
	*/
	function add_announcement($rs) {
		$id = $this->get_new_id();

		$values = array($id, $rs['announcement'], $rs['number'], $rs['start_datetime'], $rs['end_datetime']);

		$q = $this->db->prepare('INSERT INTO ' . $this->get_table(TBL_ANNOUNCEMENTS)
			. ' VALUES(?,?,?,?,?)');

		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		return $id;
	}

	/**
	* Edits announcement data in database
	* @param array $rs array of values to edit
	*/
	function edit_announcement($rs) {
		$values = array($rs['announcement'], $rs['number'], $rs['start_datetime'], $rs['end_datetime'], $rs['announcementid']);

		$sql = 'UPDATE '. $this->get_table(TBL_ANNOUNCEMENTS) . ' SET'
				. ' announcement=?, number=?, start_datetime=?, end_datetime=?'
				. ' WHERE announcementid=?';

		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
	}

    /**
	* Deletes announcement data from database
	* @param array $rs array of values to edit
	*/
	function del_announcement($announcements) {

		$announcementids = $this->make_del_list($announcements);

		// Delete all reservations for these schedules
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_ANNOUNCEMENTS) . ' WHERE announcementid IN(' . $announcementids . ')');
		$this->check_for_error($result);
	}

	/**
	* Get a list of users, emails
	* @param none
	* @return array of email data
	*/
	function get_user_email() {
		global $conf;
		$return = array();

		// Select all users in the system
		$result = $this->db->query('SELECT fname, lname, email FROM ' . $this->get_table(TBL_LOGIN) . ' WHERE email <> ? ORDER BY lname, fname', array($conf['app']['adminEmail']));
		// Check query
		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}

	/**
	* Automatically give permission to all users in the system to use this resource
	* @param string $machid id of resource to auto-assign
	*/
	function autoassign($machid) {
		// Delete all permissions that may be in assigned for this resource so that we dont get "key already exists" errors when inserting records
		$sql = 'DELETE FROM ' . $this->get_table(TBL_PERMISSION) . ' WHERE machid = ?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, array($machid));
		$this->check_for_error($result);

		$sql = 'INSERT INTO ' . $this->get_table(TBL_PERMISSION) . ' (memberid, machid) SELECT memberid, "' . $machid . '" FROM ' . $this->get_table('login');
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q);
		$this->check_for_error($result);
	}

	/**
	* Reset a password for a user
	* @param string $memberid id of user to reset password for
	* @param string $new_password new password value for the user
	*/
	function reset_password($memberid, $new_password) {
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_LOGIN) . ' SET password=? WHERE memberid=?', array($this->make_password($new_password), $memberid));
		$this->check_for_error($result);
	}

	/**
	* Change the is_admin status for this user to the new status value
	* @param string $memberid ID of the member to update
	* @param int $new_status new is_admin status value
	*/
	function change_admin_status($memberid, $new_status) {
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_LOGIN) . ' SET is_admin = ? WHERE memberid=?', array($new_status, $memberid));
		$this->check_for_error($result);
	}

	/** // addadditional scheduleid
	* Adds a new additional resource to the database
	* @param string $name resource name
	* @param string $scheduleid
	* @param int $number_available the number of this resource available
	*/
	function add_additional_resource($name, $scheduleid, $number_available) {
		$id = $this->get_new_id();
		$values = array($id, $scheduleid, $name, 'a', $number_available);

		$sql = 'INSERT INTO ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' VALUES(?,?,?,?,?)';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
	}

	/**  // addadditional scheduleid
	* Updates an additional resource to the database
	* @param string $id resourceid for the additional resource to update
	* @param string $name resource name
	* @param int $number_available the number of this resource available
	*/
	function edit_additional_resource($id, $name, $scheduleid, $number_available) {
		$result = $this->db->query('UPDATE ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' SET scheduleid = ?, name = ?, number_available = ? WHERE resourceid=?', array($scheduleid, $name, $number_available, $id));
		$this->check_for_error($result);
	}

	/**
	* Deletes a list of addtional resources
	* @param array $resourceids array of additional resource ids to delete
	*/
	function del_additional_resource($resourceids) {
		$ids = $this->make_del_list($resourceids);
		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' WHERE resourceid IN(' . $ids . ')');
		$this->check_for_error($result);
	}

	/**
	* Returns an array of all group data
	* @param none
	* @return array of group data
	*/
	function get_all_group_data($pager) {
		$return = array();

		// Set up query to get neccessary records ordered by user request first, then logical order
		$query = 'SELECT g.groupid, g.group_name, u.fname, u.lname, cnt.user_count
			FROM ' . $this->get_table(TBL_GROUPS) . ' g LEFT JOIN '
			. $this->get_table(TBL_USER_GROUPS) . ' ug ON g.groupid = ug.groupid AND ug.is_admin = 1 LEFT JOIN '
			. $this->get_table(TBL_LOGIN) . ' u ON ug.memberid = u.memberid LEFT JOIN (
				SELECT ug.groupid, COUNT(ug.memberid) as user_count FROM ' . $this->get_table(TBL_USER_GROUPS) . ' ug GROUP BY ug.groupid
			) cnt ON cnt.groupid = g.groupid
			ORDER BY group_name';

		$result = $this->db->limitQuery($query, $pager->getOffset(), $pager->getLimit());

		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('No results');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();
		return $return;
	}

	/**
	* Gets the list of all users assigned to a certain group
	* @param string $groupid the group id to get users for
	* @return array of user data for this group
	*/
	function get_group_users($groupid) {
		$return = array();

		// Set up query to get neccessary records ordered by user request first, then logical order
		$query = 'SELECT ug.memberid, u.fname, u.lname, ug.is_admin
			FROM ' . $this->get_table(TBL_USER_GROUPS) . ' ug
			INNER JOIN ' . $this->get_table(TBL_LOGIN) . '  u ON u.memberid = ug.memberid
			WHERE groupid = ?
			ORDER BY lname, fname';

		$result = $this->db->query($query, array($groupid));

		$this->check_for_error($result);

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();
		return $return;
	}

	/**
	* Adds a new group to the database
	* @param string $group_name the name of the group
	* @param string $group_admin the memberid of the group admin, if any
	*/
	function add_group($group_name) {
		$id = $this->get_new_id();
		$values = array($id, $group_name);

		$sql = 'INSERT INTO ' . $this->get_table(TBL_GROUPS) . ' VALUES(?,?)';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
	}

	/**
	* Edits an existing group in the database
	* @param string $groupid id of the group to edit
	* @param string $group_name the name of the group
	* @param string $group_admin the memberid of the group admin, if any
	*/
	function edit_group($groupid, $group_name, $adminid) {
		$values = array($group_name, $groupid);

		$sql = 'UPDATE ' . $this->get_table(TBL_GROUPS) . ' SET group_name = ? WHERE groupid = ?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);

		// Clear previous admin
		$values = array($groupid);
		$sql = 'UPDATE ' . $this->get_table(TBL_USER_GROUPS) . ' SET is_admin = 0 WHERE groupid = ?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		
		if (!empty($adminid)) {			
			// Set new admin
			$values = array($groupid, $adminid);
			$sql = 'UPDATE ' . $this->get_table(TBL_USER_GROUPS) . ' SET is_admin = 1 WHERE groupid = ? AND memberid = ?';
			$q = $this->db->prepare($sql);
			$result = $this->db->execute($q, $values);
		}

		$this->check_for_error($result);
	}

	/**
	* Deletes a list of groups from the database
	* @param array $groupids list of groupids to delete
	*/
	function del_group($groupids) {
		$ids = $this->make_del_list($groupids);

		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_USER_GROUPS) . ' WHERE groupid IN(' . $ids . ')');
		$this->check_for_error($result);

		$result = $this->db->query('DELETE FROM ' . $this->get_table(TBL_GROUPS) . ' WHERE groupid IN(' . $ids . ')');
		$this->check_for_error($result);
	}
}
?>