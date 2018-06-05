<?php
/**
* ResDB class handles all database functions for reservations
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @author Richard Cantzler <rmcii@users.sourceforge.net>
* @version 06-23-07
* @package DBEngine
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/../..';
include_once($basedir  . '/lib/DBEngine.class.php');

/**
* Provide all access to database to manage reservations
*/
class ResDB extends DBEngine {

	/**
	* Returns all data about a specific resource
	* @param string $machid id of resource to look up
	* @return array of all resource data
	*/
	function get_resource_data($machid) {
		$return = array();

		$result = $this->db->getRow('SELECT * FROM ' . $this->get_table(TBL_RESOURCES) . ' WHERE machid=?', array($machid));
		$this->check_for_error($result);

		if (count($result) <= 0)
			$return = translate('That record could not be found.');
		else
			$return = $this->cleanRow($result);

		return $return;
	}

	/**
	* Return all data about a given reservation
	* @param string $resid reservation id
	* @return array of all reservation data
	*/
	function get_reservation($resid, $memberid) {
		$return = array();
		
		$query = 'SELECT r.*, ru.memberid AS participantid, rem.reminder_time, rem.reminderid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' r'
				. ' LEFT JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON r.resid = ru.resid AND ru.memberid = ? AND ru.owner = 0 AND ru.invited = 0'
				. ' LEFT JOIN ' . $this->get_table(TBL_REMINDERS) . ' rem ON r.resid = rem.resid AND rem.memberid = ?'
				. ' WHERE r.resid=?';
		
		$result = $this->db->getRow($query, array($memberid, $memberid, $resid));
		$this->check_for_error($result);

		if (count($result) <= 0) {
			$this->err_msg = translate('That record could not be found.');
			return false;
		}
			
		return $this->cleanRow($result);
	}
	/**
	* Checks to see if a given mach/date/start/end is already booked
	* @param Object $res reservation we are checking
	* @return whether time is taken or not
	*/
	function check_res($res) {
		$t = new Timer('check_res()');
		$t->start();
		
		$values = array (
					$res->get_machid(),
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_end_date(), $res->get_end_date(), $res->get_end(),
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_end_date(), $res->get_end_date(), $res->get_end(),
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_start_date(), $res->get_start_date(), $res->get_start(),
					$res->get_end_date(), $res->get_end_date(), $res->get_end(), $res->get_end_date(), $res->get_end_date(), $res->get_end()					
				);
		// If it starts between the 2 dates, ends between the 2 dates, or surrounds the 2 dates, get it
		$query = 'SELECT COUNT(resid) AS num FROM ' . $this->get_table(TBL_RESERVATIONS)
				. ' WHERE machid=?'
				. ' AND ('
					// Is surrounded by
					//(starts on a later day OR starts on same day at a later time) AND (ends on an earlier day OR ends on the same day at an earlier time)					
					. ' ( (start_date > ? OR (start_date = ? AND starttime > ?)) AND ( end_date < ? OR (end_date = ? AND endtime < ?)) )'
					// Surrounds
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day OR ends on the same day at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) )'
					// Conflicts with the starting time
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day than the starting day OR ends on the same day as the starting day but at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime <= ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) ) '
					// Conflicts with the ending time
					//(starts on an earlier day than this ends OR starts on the same day as this ends but at an earlier time) AND (ends on a day later than the ending day OR ends on the same day as the ending day but at a later time) 
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime >= ?)) )'
				. ' )';

		$id = $res->get_id();
		if ( !empty($id) ) {		// This is only if we need to check for a modification
			$query .= ' AND resid <> ?';
			array_push($values, $id);
		}
		
		$result = $this->db->getRow($query, $values);
		$this->check_for_error($result);
		
		$t->stop();
		$t->print_comment();
		
		return ($result['num'] > 0);	// Return if there are already reservations
	}

	/**
	* Checks to see if a given mach/date/start/end verlenging geaccepteerd kan worden.
	* @param Object $res reservation we are checking
	* @param Object wordt uit db gelezen, behalve $res->end_date, $res->end, $res->machid .when -not valid- reset is in reserve.php r 320
	* @return whether time is taken or not
	*/
	function check_res_verlenging($res) {
		$t = new Timer('check_res()');
		$t->start();
		
		$values = array (
					$res->machid,
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->end_date, $res->end_date, $res->end,
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->end_date, $res->end_date, $res->end,
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_start_date(), $res->get_start_date(), $res->get_start(),
					$res->end_date, $res->end_date, $res->end, $res->end_date, $res->end_date, $res->end					
				);
		// If it starts between the 2 dates, ends between the 2 dates, or surrounds the 2 dates, get it
		$query = 'SELECT COUNT(resid) AS num FROM ' . $this->get_table(TBL_RESERVATIONS)
				. ' WHERE machid=?'
				. ' AND ('
					// Is surrounded by
					//(starts on a later day OR starts on same day at a later time) AND (ends on an earlier day OR ends on the same day at an earlier time)					
					. ' ( (start_date > ? OR (start_date = ? AND starttime > ?)) AND ( end_date < ? OR (end_date = ? AND endtime < ?)) )'
					// Surrounds
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day OR ends on the same day at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) )'
					// Conflicts with the starting time
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day than the starting day OR ends on the same day as the starting day but at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime <= ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) ) '
					// Conflicts with the ending time
					//(starts on an earlier day than this ends OR starts on the same day as this ends but at an earlier time) AND (ends on a day later than the ending day OR ends on the same day as the ending day but at a later time) 
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime >= ?)) )'
				. ' )';

		$id = $res->get_id();
		if ( !empty($id) ) {		// This is only if we need to check for a modification
			$query .= ' AND resid <> ?';
			array_push($values, $id);
			//echo $query;
		}
		
		$result = $this->db->getRow($query, $values);
		$this->check_for_error($result);
		
		$t->stop();
		$t->print_comment();
		
		return ($result['num'] > 0);	// Return if there are already reservations
	}
	
	
	/**
	* Checks to see if any of the additional resources conflict
	* @param Reservation $res the reservation object to validate
	* @return An array of available_number and names of any conflicting resources
	*/
	function checkAdditionalResources($res, $resources_to_add) {
		$return = array();
		
		$t = new Timer('get_additional_resource_count()');
		$t->start();
		
//		$query = 'SELECT ar.resourceid, ar.name, ar.number_available '
//				. ' FROM ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' ar'
//				. ' WHERE resourceid IN (' . . ') AND ar.number_available = 0';
		
		$values = array (
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_end_date(), $res->get_end_date(), $res->get_end(),
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_end_date(), $res->get_end_date(), $res->get_end(),
					$res->get_start_date(), $res->get_start_date(), $res->get_start(), $res->get_start_date(), $res->get_start_date(), $res->get_start(),
					$res->get_end_date(), $res->get_end_date(), $res->get_end(), $res->get_end_date(), $res->get_end_date(), $res->get_end()					
				);
				
		$resourceids = $this->make_del_list($resources_to_add);
		$id = $res->get_id();
		
		$and = '';
		
		if (!empty($id)) {
			$and = ' AND rr.resid <> ?';	// Modifying this reservation
			array_unshift($values, $id);
		}
		
		$query = 'SELECT ar.resourceid, ar.name, ar.number_available, COUNT(*) AS total'
				. ' FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' rr'
				. ' INNER JOIN ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' ar ON rr.resourceid = ar.resourceid'
				. ' INNER JOIN ' . $this->get_table(TBL_RESERVATIONS) . ' r ON r.resid = rr.resid'
				. ' WHERE rr.resourceid IN (' . $resourceids . ')'
				. ' AND ar.number_available <> -1 AND ar.number_available IS NOT NULL'	// no need to worry about add'l resources with unlimited availability
				. $and				
				. ' AND ('
					// Is surrounded by
					//(starts on a later day OR starts on same day at a later time) AND (ends on an earlier day OR ends on the same day at an earlier time)					
					. ' ( (start_date > ? OR (start_date = ? AND starttime > ?)) AND ( end_date < ? OR (end_date = ? AND endtime < ?)) )'
					// Surrounds
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day OR ends on the same day at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) )'
					// Conflicts with the starting time
					//(starts on an earlier day OR starts on the same day at an earlier time) AND (ends on a later day than the starting day OR ends on the same day as the starting day but at a later time)
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime <= ?)) AND (end_date > ? OR (end_date = ? AND endtime > ?)) ) '
					// Conflicts with the ending time
					//(starts on an earlier day than this ends OR starts on the same day as this ends but at an earlier time) AND (ends on a day later than the ending day OR ends on the same day as the ending day but at a later time) 
					. ' OR ( (start_date < ? OR (start_date = ? AND starttime < ?)) AND (end_date > ? OR (end_date = ? AND endtime >= ?)) )'
				. ' )'
				. ' GROUP BY ar.resourceid, ar.name, ar.number_available'
				. ' HAVING COUNT(*) >= ar.number_available'
				. ' UNION '		// All accessories that have no available currently
				. ' SELECT ar.resourceid, ar.name, ar.number_available, 0 AS total'
				. ' FROM ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' ar'
				. ' WHERE resourceid IN (' . $resourceids . ') AND ar.number_available = 0';
		
		$result = $this->db->query($query, $values);

        // Check if error
        $this->check_for_error($result);
        
		while ($rs = $result->fetchRow()) {
			$return[] = array('name' => $rs['name'], 'number_available' => $rs['number_available']);
        }
        
		$t->stop();
		$t->print_comment();
		
        return $return;		
	}

	/**
	* Add a new reservation to the database
	* @param Object $res reservation that we are placing
	* @param boolean $is_parent if this is the parent reservation of a group of recurring reservations
	* @param array $users_to_invite hashtable of users to invite
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function add_res($res, $is_parent, $users_to_invite, $resources_to_add, $accept_code) {
		$id = $this->get_new_id();

		// Insert the main reservation data
		$values = array (
					$id,
					$res->get_machid(),
					$res->get_scheduleid(),
					$res->get_start_date(),
					$res->get_end_date(),
					$res->get_start(),
					$res->get_end(),
					mktime(),
					null,
					($is_parent ? $id : $res->get_parentid()),
					intval($res->is_blackout),
					$res->get_pending(),
					$res->get_summary(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					$res->get_reservation_status(),
					$res->get_contractsoort(),
					$res->get_clusterid()
				);
		
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATIONS) . ' VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
		
		// Insert the user participation data
		$values = null;
		$values[] = array($id, $res->get_memberid(), 1, 0, 1, 1, null);

		foreach ($users_to_invite as $memberid => $email) {
			$values[] = array($id, $memberid, 0, 1, 0, 0, $accept_code);
		}
// janr interessant: table RESERVATION_USERS bevat alle participation data (analogy to multiple resources )
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?)';
		$q = $this->db->prepare($query);
		$result = $this->db->executeMultiple($q, $values);
		$this->check_for_error($result);
		
		// Insert the additional resources data	
		if (count($resources_to_add) > 0) {
			$values = null;
			for ($i = 0; $i < count($resources_to_add); $i++) {
				$values[] = array($id, $resources_to_add[$i], 0);
			}
	
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' VALUES(?,?,?)';
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}

		unset($values, $query);
		return $id;
	}
	/**
	* Add a new reservation to the database
	* @param Object $res reservation that we are placing
	* @param boolean $is_parent if this is the parent reservation of a group of recurring reservations
	* @param array $users_to_invite hashtable of users to invite
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function add_res_copycluster($res, $is_parent, $users_to_invite, $resources_to_add, $accept_code,$id) {
		//$id = $this->get_new_id(); // jarocc, zie xreserve

		// Insert the main reservation data
		$values = array (
					$id,
					$res->get_machid(),
					$res->scheduleid,
					$res->start_date,
					$res->end_date,
					$res->start,
					$res->end,
					mktime(),
					null,
					($is_parent ? $id : $res->get_parentid()),
					intval($res->is_blackout),
					$res->get_pending(),
					$res->summary,
					$res->allow_participation,
					$res->allow_anon_participation,
					$res->checkout_via,
					$res->checkin_via,
					$res->reservation_status,
					$res->contractsoort,
					$id
				);
		
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATIONS) . ' VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
		
		// Insert the user participation data
		$values = null;
		$values[] = array($id, $res->get_memberid(), 1, 0, 1, 1, null);

		foreach ($users_to_invite as $memberid => $email) {
			$values[] = array($id, $memberid, 0, 1, 0, 0, $accept_code);
		}
// janr interessant: table RESERVATION_USERS bevat alle participation data (analogy to multiple resources )
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?)';
		$q = $this->db->prepare($query);
		$result = $this->db->executeMultiple($q, $values);
		$this->check_for_error($result);
		
		// Insert the additional resources data	
		if (count($resources_to_add) > 0) {
			$values = null;
			for ($i = 0; $i < count($resources_to_add); $i++) {
				$values[] = array($id, $resources_to_add[$i], 0);
			}
	
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' VALUES(?,?,?)';
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}

		unset($values, $query);
		return $id;
	}
	/**
	* Add a new reservation to the database
	* @param Object $res reservation that we are placing
	* @param boolean $is_parent if this is the parent reservation of a group of recurring reservations
	* @param array $users_to_invite hashtable of users to invite
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	* @param string $newmachid is nieuw te kopieren to cluster
	*/
	function add_res_copycluster_slave($res, $is_parent, $users_to_invite, $resources_to_add, $accept_code,$newmachid) {
		$id = $this->get_new_id();
//echo "slave id:".$id;
		// Insert the main reservation data
		$values = array (
					$id,
					$newmachid,
					$res->scheduleid,
					$res->start_date,
					$res->end_date,
					$res->start,
					$res->end,
					mktime(),
					null,
					($is_parent ? $id : $res->get_parentid()),
					intval($res->is_blackout),
					$res->get_pending(),
					$res->get_summary(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					$res->get_reservation_status(),
					$res->get_contractsoort(),
					$res->get_clusterid()
				);
		
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATIONS) . ' VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
		
		// Insert the user participation data
		$values = null;
		$values[] = array($id, $res->get_memberid(), 1, 0, 1, 1, null);

		foreach ($users_to_invite as $memberid => $email) {
			$values[] = array($id, $memberid, 0, 1, 0, 0, $accept_code);
		}
// janr interessant: table RESERVATION_USERS bevat alle participation data (analogy to multiple resources )
		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?)';
		$q = $this->db->prepare($query);
		$result = $this->db->executeMultiple($q, $values);
		$this->check_for_error($result);
		
		// Insert the additional resources data	
		if (count($resources_to_add) > 0) {
			$values = null;
			for ($i = 0; $i < count($resources_to_add); $i++) {
				$values[] = array($id, $resources_to_add[$i], 0);
			}
	
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' VALUES(?,?,?)';
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}

		unset($values, $query);
		return $id;
	}




	/**
	* Modify current reservation time
		* janr clusterstaticmod indien statische velden worden gewijzigd en het is cluster dan wijzig deze in alle clusterrecords.
	* If this reservation is part of a recurring group, all reservations in the
	*  group will be modified that havent already passed
	* @param Object $res reservation that we are modifying
	* @param array $users_to_invite hashtable of users to invite to this reservation
	* @param array $users_to_remove hashtable of users to remove from this reservation
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param array $resources_to_remove array of resourceids to remove from this reservation	
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function mod_res($res, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code) {
		$t = new Timer("mod_res()");
		$t->start();

		$id = $res->get_id();

		$updatescope= ' WHERE resid=?'; // staticfields, in what scope do we update //janr
		// als status van  R U naar I G gaat, dan dient terugkomdatum  getest te worden identiek aan: check-reservation-status.php
		// testline jaro at: $res->get_summary().' mod_res',		
		// Update the reservation data

		// Update the reservation data
		$values = array (
					$res->get_start_date(),
					$res->get_end_date(),
					$res->get_start(),
					$res->get_end(),
					mktime(),
					$res->get_summary(),
					$res->get_pending(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					$res->get_reservation_status(),
					$res->get_contractsoort(),
					$res->get_clusterid(),
					$id
				);
		// var_dump($values);
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET '
				. ' start_date=?,'
				. ' end_date=?,'
				. ' starttime=?,'
                . ' endtime=?,'
                . ' modified=?,'
				. ' summary=?,'
				. ' is_pending=?,'
				. ' allow_participation=?,'
				. ' allow_anon_participation=?,'
				. ' checkout_via=?,'
				. ' checkin_via=?,'
				. ' reservation_status=?,'
				. ' contractsoort=?,'
				. ' clusterid=?'
                . $updatescope;

		$q = $this->db->prepare($query);

		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		// Update the owner of the reservation
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATION_USERS) . ' SET memberid=? WHERE resid=? AND owner = 1';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, array($res->get_memberid(), $res->get_id()));
		$this->check_for_error($result);		
		
		//die('updated owner');
		
		// Insert all new invitees
		if (count($users_to_invite) > 0) {
			$values = array();	// Reset values
			foreach ($users_to_invite as $memberid => $email) {
				$values[] = array($id, $memberid , 0, 1, 0, 0, $accept_code, $id, $memberid);
			}
			
			// Equivalent to 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?) WHERE NOT EXISTS (SELECT 1 FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid=? AND memberid=?)';
			// This is needed in case a user is being added to a group of recurring reservations and already exsits on another one
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) 
			 		. ' SELECT ?,?,?,?,?,?,? FROM ' . $this->get_table(TBL_MUTEX) . ' mutex'
					. ' LEFT OUTER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON ru.resid=? AND ru.memberid=?'
					. ' WHERE mutex.i = 1 AND ru.resid IS NULL AND ru.memberid IS NULL';
				
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}
		
		// Delete all removed/uninvited users
		if (count($users_to_remove) > 0) {
			$userids = array();	// Reset values
			$userids = array_keys($users_to_remove);
		
			$query = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid=? AND memberid IN (' . $this->make_del_list($userids) . ')';
			$q = $this->db->prepare($query);
			$result = $this->db->execute($q, array($id));
			$this->check_for_error($result);

		}
			
		// Insert all new additional resource records
		if (count($resources_to_add) > 0) {
			$values = null;
		
			for ($i = 0; $i < count($resources_to_add); $i++) {
				$values[] = array($id, $resources_to_add[$i], 0, $id, $resources_to_add[$i]);
			}
			
			// Equivalent to 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' VALUES(?,?,?) WHERE NOT EXISTS (SELECT 1 FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid=? AND resourceid=?)';
			// This is needed in case a resource is being added to a group of recurring reservations and already exsits on another one
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) 
			 		. ' SELECT ?,?,? FROM ' . $this->get_table(TBL_MUTEX) . ' mutex'
					. ' LEFT OUTER JOIN ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' ar ON ar.resid=? AND ar.resourceid=?'
					. ' WHERE mutex.i = 1 AND ar.resid IS NULL AND ar.resourceid IS NULL';
			
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}

		// Delete all removed additional resources
		if (count($resources_to_remove) > 0) {
			$query = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid=? AND resourceid IN (' . $this->make_del_list($resources_to_remove) . ')';
			$q = $this->db->prepare($query);
			$result = $this->db->execute($q, array($id));
			$this->check_for_error($result);
		}
		
		$t->stop();
		$t->print_comment();
		unset($values, $query);
	}
	
/**
	* Modify 
	* jaro	alle artikelen in deze cluster gereed gemeld.
	* jaro	deze wordt gebruikt door check-reservation-status.php
		*/
	function mod_res_cluster_readyall(&$res) {
		$values = array(3, $res->get_clusterid());

		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET reservation_status = ?'
                . ' WHERE clusterid = ?';
		
		//echo ($query);
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);	
		
		// $t->stop();
		// $t->print_comment();
		unset($values, $query);
	}

	/**
	* Modify current reservation
		* janr clusterstaticmod indien statische velden worden gewijzigd en het is cluster dan wijzig deze in alle clusterrecords. MAAR NIET STATUS
	* If this reservation is part of a recurring group, all reservations in the
	*  group will be modified that havent already passed
	* @param Object $res reservation that we are modifying
	* @param array $users_to_invite hashtable of users to invite to this reservation
	* @param array $users_to_remove hashtable of users to remove from this reservation
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param array $resources_to_remove array of resourceids to remove from this reservation	
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function mod_res_cluster($res, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code) {
		$t = new Timer("mod_res_cluster()");
		$t->start();
		$clusterid = $res->get_clusterid();

			
		$updatescope= ' WHERE clusterid=?'; // staticfields, in what scope do we update //janr

	//	echo ('Values: '.$id. ' clusterid:'.$res->get_clusterid(). '<BR>');
		
		// Update the reservation data
		$values = array (
					$res->get_start_date(),
					$res->get_end_date(),
					$res->get_start(),
					$res->get_end(),
					mktime(),
					$res->get_summary(),
					$res->get_pending(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					
					$res->get_contractsoort(),
					$res->get_clusterid(),
					$clusterid
				);
		// var_dump($values);
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET '
				. ' start_date=?,'
				. ' end_date=?,'
				. ' starttime=?,'
                . ' endtime=?,'
                . ' modified=?,'
				. ' summary=?,'
				. ' is_pending=?,'
				. ' allow_participation=?,'
				. ' allow_anon_participation=?,'
				. ' checkout_via=?,'
				. ' checkin_via=?,'
				
				. ' contractsoort=?,'
				. ' clusterid=?'
                . $updatescope;

		$q = $this->db->prepare($query);
		//		print ('Query:'.$query.'<br>');
				//print_r ($q);
		//print ('Q:'.$q.'<br>');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		// Update the owner of the reservation
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATION_USERS) . ' SET memberid=? WHERE resid=? AND owner = 1';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, array($res->get_memberid(), $res->get_id()));
		$this->check_for_error($result);		
		
		//die('updated owner');
		
		
		$t->stop();
		$t->print_comment();
		unset($values, $query);
	}
	
	
	/**
	* Modify current reservation
		* janr clusterstaticmod indien statische velden worden gewijzigd en het is cluster dan wijzig deze in alle clusterrecords. 	OOK STATUS
	* If this reservation is part of a recurring group, all reservations in the
	*  group will be modified that havent already passed
	* @param Object $res reservation that we are modifying
	* @param array $users_to_invite hashtable of users to invite to this reservation
	* @param array $users_to_remove hashtable of users to remove from this reservation
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param array $resources_to_remove array of resourceids to remove from this reservation	
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function mod_res_cluster_upd_status($res, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code,$oldstatus) {
		$t = new Timer("mod_res_cluster()");
		$t->start();
		$clusterid = $res->get_clusterid();

			
		$updatescope= ' WHERE clusterid=?'; // staticfields, in what scope do we update //janr

		// als status van  R U naar I G gaat, dan dient terugkomdatum  getest te worden identiek aan: check-reservation-status.php
		// testline jaro at: $res->get_summary().' mod_res_cluster_upd_status',		
		// Update the reservation data
		
		//my values
		// $oldstatus
		// $res->reservation_status = new status		
			if ($oldstatus < 2) {
		// begin standaarcode van check-reservation-status
						// nu incoming
						if ($res->reservation_status == 2 || $res->reservation_status == 3) {
						
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

							$oldresdate=$res->end_date;
							$oldrestime=$res->end;
					/// te vroeg binnen, einddatum ligt in de toekomst,
					/// data aanpassen naar nu
					$testval = "";
							while ($res->end_date > $dag_nu)  {
								$res->end_date = $res->end_date - $dag_verschil; // 1 dag terug 
								$testval .= "d-";
							}
							
							if ($res->end_date == $dag_nu ) {
								while ($res->end > $time_nu) {
									$res->end = $res->end - $uur_verschil; // 1 uur terug
									$testval .= "h-";
								}
							}
								///
							// EINDTIJD MAG NIET VROEGER DAN BEGINTIJD
						// check de nieuwe eindtijd: 
						
							if ( ($res->start_date==$res->end_date) && ($res->end <= $res->start) ) {
											$res->end = $res->start+60; // force 1 hour up.
							}

							if ($res->start_date > $res->end_date) {
											$res->end_date = $oldresdate; // RESTORE, do not update timings; ***todo: alert begintijd groter dan nieuwe eindtijd, artikel niet vrijgegeven
											$res->end = $oldrestime;
							}			
						}
						// klaar /// data aanpassen naar nu
			}
		// eind standaarcode van check-reservation-status
		// handige testline: $res->get_summary().$testval.'enddate '.$res->end_date .'dagnu '. $dag_nu,
		$values = array (
					$res->get_start_date(),
					$res->end_date,
					$res->get_start(),
					$res->end,
					mktime(),
					$res->get_summary(),
					$res->get_pending(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					$res->get_reservation_status(),  
					$res->get_contractsoort(),
					$res->get_clusterid(),
					$clusterid
				);
		//var_dump($values);
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET '
				. ' start_date=?,'
				. ' end_date=?,'
				. ' starttime=?,'
                . ' endtime=?,'
                . ' modified=?,'
				. ' summary=?,'
				. ' is_pending=?,'
				. ' allow_participation=?,'
				. ' allow_anon_participation=?,'
				. ' checkout_via=?,'
				. ' checkin_via=?,'
				. ' reservation_status=?,'
				. ' contractsoort=?,'
				. ' clusterid=?'
                . $updatescope;

		$q = $this->db->prepare($query);
		//		print ('Query:'.$query.'<br>');
				//print_r ($q);
		//print ('Q:'.$q.'<br>');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		// Update the owner of the reservation
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATION_USERS) . ' SET memberid=? WHERE resid=? AND owner = 1';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, array($res->get_memberid(), $res->get_id()));
		$this->check_for_error($result);		
		
		//die('updated owner');
		
		
		$t->stop();
		$t->print_comment();
		unset($values, $query);
	}
	
	
	/**
	* Modify current reservation time
		* janr clusterstaticmod indien statische velden worden gewijzigd en het is cluster dan wijzig deze in alle clusterrecords.
	* If this reservation is part of a recurring group, all reservations in the
	*  group will be modified that havent already passed
	* @param Object $res reservation that we are modifying
	* @param array $users_to_invite hashtable of users to invite to this reservation
	* @param array $users_to_remove hashtable of users to remove from this reservation
	* @param array $resources_to_add array of resourceids to add to this reservation
	* @param array $resources_to_remove array of resourceids to remove from this reservation	
	* @param string $accept_code acceptance code to be used for reservation accept/decline
	*/
	function mod_res_OUD($res, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code) {
		$t = new Timer("mod_res()");
		$t->start();
		
	
		$id = $res->get_id();
		if ($id == $res->get_clusterid()) {
			echo ('CLUSTER: <BR>'); 
			$updatescope= ' WHERE clusterid=?'; // staticfields, in what scope do we update //janr
		}else{
			echo ('NOTCLUSTER: <BR>');
			$updatescope= ' WHERE resid=?'; // staticfields, in what scope do we update //janr
		}
		echo ('Values: '.$id. ' clusterid:'.$res->get_clusterid(). '<BR>');
		
		// Update the reservation data
		$values = array (
					$res->get_start_date(),
					$res->get_end_date(),
					$res->get_start(),
					$res->get_end(),
					mktime(),
					$res->get_summary(),
					$res->get_pending(),
					$res->get_allow_participation(),
					$res->get_allow_anon_participation(),
					$res->get_checkout_via(),
					$res->get_checkin_via(),
					$res->get_reservation_status(),
					$res->get_contractsoort(),
					$res->get_clusterid(),
					$id
				);
		// var_dump($values);
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET '
				. ' start_date=?,'
				. ' end_date=?,'
				. ' starttime=?,'
                . ' endtime=?,'
                . ' modified=?,'
				. ' summary=?,'
				. ' is_pending=?,'
				. ' allow_participation=?,'
				. ' allow_anon_participation=?,'
				. ' checkout_via=?,'
				. ' checkin_via=?,'
				. ' reservation_status=?,'
				. ' contractsoort=?,'
				. ' clusterid=?'
                . $updatescope;

		$q = $this->db->prepare($query);
				print ('Query:'.$query.'<br>');
				//print_r ($q);
		//print ('Q:'.$q.'<br>');
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);

		// Update the owner of the reservation
		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATION_USERS) . ' SET memberid=? WHERE resid=? AND owner = 1';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, array($res->get_memberid(), $res->get_id()));
		$this->check_for_error($result);		
		
		//die('updated owner');
		
		// Insert all new invitees
		if (count($users_to_invite) > 0) {
			$values = array();	// Reset values
			foreach ($users_to_invite as $memberid => $email) {
				$values[] = array($id, $memberid , 0, 1, 0, 0, $accept_code, $id, $memberid);
			}
			
			// Equivalent to 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?) WHERE NOT EXISTS (SELECT 1 FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid=? AND memberid=?)';
			// This is needed in case a user is being added to a group of recurring reservations and already exsits on another one
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) 
			 		. ' SELECT ?,?,?,?,?,?,? FROM ' . $this->get_table(TBL_MUTEX) . ' mutex'
					. ' LEFT OUTER JOIN ' . $this->get_table(TBL_RESERVATION_USERS) . ' ru ON ru.resid=? AND ru.memberid=?'
					. ' WHERE mutex.i = 1 AND ru.resid IS NULL AND ru.memberid IS NULL';
				
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}
		
		// Delete all removed/uninvited users
		if (count($users_to_remove) > 0) {
			$userids = array();	// Reset values
			$userids = array_keys($users_to_remove);
		
			$query = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid=? AND memberid IN (' . $this->make_del_list($userids) . ')';
			$q = $this->db->prepare($query);
			$result = $this->db->execute($q, array($id));
			$this->check_for_error($result);

		}
			
		// Insert all new additional resource records
		if (count($resources_to_add) > 0) {
			$values = null;
		
			for ($i = 0; $i < count($resources_to_add); $i++) {
				$values[] = array($id, $resources_to_add[$i], 0, $id, $resources_to_add[$i]);
			}
			
			// Equivalent to 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' VALUES(?,?,?) WHERE NOT EXISTS (SELECT 1 FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid=? AND resourceid=?)';
			// This is needed in case a resource is being added to a group of recurring reservations and already exsits on another one
			$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_RESOURCES) 
			 		. ' SELECT ?,?,? FROM ' . $this->get_table(TBL_MUTEX) . ' mutex'
					. ' LEFT OUTER JOIN ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' ar ON ar.resid=? AND ar.resourceid=?'
					. ' WHERE mutex.i = 1 AND ar.resid IS NULL AND ar.resourceid IS NULL';
			
			$q = $this->db->prepare($query);
			$result = $this->db->executeMultiple($q, $values);
			$this->check_for_error($result);
		}

		// Delete all removed additional resources
		if (count($resources_to_remove) > 0) {
			$query = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid=? AND resourceid IN (' . $this->make_del_list($resources_to_remove) . ')';
			$q = $this->db->prepare($query);
			$result = $this->db->execute($q, array($id));
			$this->check_for_error($result);
		}
		
		$t->stop();
		$t->print_comment();
		unset($values, $query);
	}

	/**
	* Deletes a reservation from the database
	* If this reservation is part of a recurring group, all reservations
	*  in the group will be deleted that havent already passed
	* janr:
	* If this reservation is master of a cluster see , FUNCTION DEL_RES_CLUSTER
	*  
	*
	* @param string $id reservation id
	* @param string $parentid id of parent reservation
	* @param boolean $del_recur whether to delete recurring reservations or not
	* @param int $date timestamp of current date
	* @param string $memberid id of the reservation owner
	*/
	function del_res($id, $parentid, $del_recur, $date, $memberid) {
		$values = array($id);
		$sql = 'SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid=?';
		//$sql = 'DELETE ru.*, r.*'
		//		. ' FROM ' . $this->get_table('reservation_users') . ' as ru, ' . $this->get_table('reservations') . ' as r'
		//		. ' WHERE ru.resid=r.resid AND ru.resid=?';
//echo ('del_res in resDB was called.');
		if ($del_recur) {			// Delete all recurring reservations
			//$sql .= ' OR ru.resid = r.parentid OR r.parentid = ? AND r.start_date >= ?';
			$sql .= ' OR parentid = ? AND start_date >= ?';
			array_push($values, $parentid, $date);
		}
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
		
		while ($rs = $result->fetchRow()) {
			$resids[] = $rs['resid'];
		}
		
		$result->free();
		
		$del_list = $this->make_del_list($resids);
		
		// Delete the reservation
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid IN (' . $del_list . ')';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q);
		$this->check_for_error($result);
		
		// Delete the participants
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE resid IN (' . $del_list . ')';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q);
		$this->check_for_error($result);
		
		// Delete the additional resources
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid IN (' . $del_list . ')';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q);
		$this->check_for_error($result);
		
		// Delete the reminders
		$sql = 'DELETE FROM ' . $this->get_table(TBL_REMINDERS) . ' WHERE resid IN (' . $del_list . ') AND memberid = ?';
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, array($memberid));		
		$this->check_for_error($result);
	}
	/**
	* get all res this cluster jaro mei14
*/
	function get_res_cluster($id, $clusterid) {
		$values = array($id);
		$sql = 'SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid=? OR clusterid = ?';
		
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $id);
		$this->check_for_error($result);
		return $result;
	
	}
	

	
	/**
	* Deletes a clusterreservation from the database

	* If this reservation is master of a cluster, the complete clusterwill be deleted
	*  
	*
	* @param string $id reservation id
	* @param string $clusterid  parent reservation is zelfde als $id
	* @param boolean $del_master whether to delete complete cluster
	* @param int $date timestamp of current date
	* @param string $memberid id of the reservation owner
	*/
	function del_res_cluster($id, $clusterid, $del_master, $date, $memberid) {
		$values = array($id);
		$sql = 'SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE resid=? OR clusterid = ?';

			//echo ('del_res in resDB was called.');

		
		// Delete the reservation
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE clusterid = ?';
		
			// echo ($sql);
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $id);
		$this->check_for_error($result);
		
		// Delete the additional resources
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_RESOURCES) . ' WHERE resid = ?';
			// echo ($sql);
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $id);
		$this->check_for_error($result);
	
	}
	
    /**
	* Approve a reservation
	* @param string $id reservation id
	*/
	function approve_res(&$res, $mod_recur) {
		$values = array(0, $res->get_id());

		$query = 'UPDATE ' . $this->get_table(TBL_RESERVATIONS)
                . ' SET is_pending = ?'
                . ' WHERE resid = ?';
		
		if ($mod_recur) {
			$query .= ' OR parentid = ?';
			array_push($values, $res->get_parentid());
		}

		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
		
		unset($values, $query);
	}

	/**
	* Return all data needed in the emails
	* @param string $id reservation id to look up
	* @return array of data to be used in an email
	*/
	function get_email_info($id) {
		$query = 'SELECT r.*, rs.name, rs.rphone, rs.location'
            . ' FROM '
			. $this->get_table(TBL_RESOURCES) . ' as rs INNER JOIN '
			. $this->get_table(TBL_RESERVATIONS) . ' as r ON rs.machid=r.machid'
			. ' WHERE r.resid=?';
		$result = $this->db->getRow($query, array($id));

		$this->check_for_error($result);
		return $this->cleanRow($result);
	}

	/**
	* Get an array of all reservation ids and dates for a recurring group
	*  of reservations, including the parent
	* @param string $parentid id of parent reservation for recurring group
	* @param int $start_date timestamp of current date
	* @return array of all reservation ids and dates
	*/
	function get_recur_ids($parentid, $start_date) {
		$return = array();

		$sql = 'SELECT resid, start_date FROM '
				. $this->get_table(TBL_RESERVATIONS)
				. ' WHERE (parentid = ?'
				. ' OR resid = ?) AND parentid IS NOT NULL'
				. ' AND start_date >= ?'
				. ' ORDER BY start_date ASC';
		$result = $this->db->query($sql, array($parentid, $parentid, $start_date));

		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('This reservation is not recurring.');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $this->cleanRow($rs);
		}

		$result->free();

		return $return;
	}		
	/**
	* Returns all of the users and the data for this reservation
	* @param string $resid reservation id
	* @return array of user/reservation data
	*/
	function get_res_users($resid) {
		$return = array();
				
		$sql = 'SELECT ru.*, users.fname, users.lname, users.email FROM '
				. $this->get_table(TBL_RESERVATION_USERS) . ' as ru INNER JOIN ' . $this->get_table(TBL_LOGIN) . ' as users'
				. ' ON users.memberid = ru.memberid WHERE ru.resid=?'
				. ' UNION SELECT ru.*, au.fname, au.lname, au.email FROM '
				. $this->get_table(TBL_RESERVATION_USERS) . ' as ru INNER JOIN ' . $this->get_table(TBL_ANONYMOUS_USERS) . ' as au'
				. ' ON ru.memberid = au.memberid WHERE ru.resid=?';

		$result = $this->db->query($sql, array($resid, $resid));

		$this->check_for_error($result);

		if ($result->numRows() <= 0) {
			$this->err_msg = translate('That record could not be found.');
			return false;
		}

		while ($rs = $result->fetchRow()) {
			$return[] = $rs;
		}

		$result->free();

		return $return;
	}
	/**
	* Returns an array of all reservation data
	* @param Object $pager pager object
	* @param array $orders order than results should be sorted in
	* @return array of all reservation data in this cluster
	*/
	function get_reservation_clusterdata($clusterid) {
		$return = array();
			//nieuw janr clusterid.  Find all res with this clusterid, the get all resources
			$cluster_filter_txt1 = null;
			if ($clusterid<>'') {						
				$cluster_filter_txt1 = ' res.clusterid =  "'.$clusterid.'"'; // janr cluster filter
			}
 	
		$sql = 'SELECT res.resid, res.reservation_status, res.clusterid, rs.serial_nr, rs.package, rs.description, rs.vast_toebehoren, rs.notes , rs.name
			FROM ' . $this->get_table(TBL_RESERVATIONS) . ' AS res' 
			. ' INNER JOIN ' . $this->get_table(TBL_RESOURCES) . ' AS rs ON res.machid = rs.machid'
			. ' WHERE res.clusterid=?'
			. ' ORDER BY rs.name';

			// echo ($sql.'<br>');// = goed
		// $result = $this->db->query($sql,arr ($clusterid));
		$result = $this->db->Query($sql,array($clusterid));
		
		$this->check_for_error($result);
		
		if ($result->numRows() <= 0) {
			$this->err_msg = translate('That cluster could not be found.');
			return false;
		} else {
		// echo ('<br> ' . $result->numRows()); // = 2 is goed
		}
		
		while ($rs = $result->fetchRow()) {
				$return[] = $rs;
		}
		
		// print_r ($return); //goed
		 $result->free();
		return $return;	
		}

	/**
	* Returns an array of all reservation data
	* @return array of all reservation id-s in this cluster
	*/
	function get_cluster_resids($clusterid) {
		$return = array();
			//nieuw janr clusterid.  Find all res with this clusterid
			
			if ($clusterid=='') {						
				return array(); // janr cluster filter
			}
 	
		$sql = 'SELECT res.resid
			FROM ' . $this->get_table(TBL_RESERVATIONS) . ' AS res' 
			. ' WHERE res.clusterid=?';

			
		$result = $this->db->Query($sql,array($clusterid));
		
		$this->check_for_error($result);
		
		if ($result->numRows() <= 0) {
			$this->err_msg = translate('That cluster could not be found.');
			return array();
		} 
		
		while ($rs = $result->fetchRow()) {
				$return[] = $rs['resid'];
		}
		
		// print_r ($return); //goed
		 $result->free();
		return $return;	
	}


	/**
	* Changes the members status of the reservation
	* @param string $memberid id of member to change
	* @param string $resid id of reservation to change
	* @param int $max_participants the maximum number of participants for this reservation
	* @return array of dates that failed
	*/
	function confirm_user($memberid, $resid, $parentid, $update_all, $max_participants = 0) {
		$values = array(0, $memberid);
		$sql = 'UPDATE ' . $this->get_table(TBL_RESERVATION_USERS) . ' SET invited=? WHERE memberid=? ';
		$failed = array();
		
		if ($update_all && $parentid != null) {
			$r = array();		
			$result = $this->db->query('SELECT resid, start_date FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE parentid=?', array($parentid));
			$this->check_for_error($result);
			while ($rs = $result->fetchRow()) {
				if (!empty($max_participants)) {
					// Get the count of participants if the maximum is set
					$tmp_result = $this->db->fetchRow('SELECT COUNT(resid) AS participants'
													. ' FROM ' . $this->get_table(TBL_RESERVATION_USERS)
													. ' WHERE invited=0 AND owner=0 AND resid=?', array($rs['resid']));
					$this->check_for_error($tmp_result);
				}
				else {
					$tmp_result['participants'] = -1;
				}
				// Only change the user status if there are not already enough participants
				if ($tmp_result['participants'] < (int)$max_participants) {
					$r[] = $rs['resid'];
				}
				else {
					$failed[] = $rs['start_date'];
				}
			}
			$sql .= ' AND resid IN (' . $this->make_del_list($r) . ')';
		}
		else {
			$sql .= ' AND resid=?';
			$values[] = $resid;
		} 
		$result = $this->db->query($sql, $values);

		$this->check_for_error($result);
		
		return $failed;
	}
	
	/**
	* Removes a user from a reservation
	* @param string $memberid id of member to change
	* @param string $resid id of reservation to change
	*/
	function remove_user($memberid, $resid, $parentid, $update_all) {
		$values = array($memberid);
		$sql = 'DELETE FROM ' . $this->get_table(TBL_RESERVATION_USERS) . ' WHERE memberid=? ';
		if ($update_all && $parentid != null) {
			$r = array();
			$result = $this->db->query('SELECT resid FROM ' . $this->get_table(TBL_RESERVATIONS) . ' WHERE parentid=?', array($parentid));
			$this->check_for_error($result);
			while ($rs = $result->fetchRow()) {
				$r[] = $rs['resid'];
			}
			$sql .= ' AND resid IN (' . $this->make_del_list($r) . ')';
		}
		else {
			$sql .= ' AND resid=?';
			$values[] = $resid;
		} 
		$result = $this->db->query($sql, $values);

		$this->check_for_error($result);
	}
	
	/**
	* Adds a user to a reservation as a participant
	* @param string $memberid id of the user to add
	* @param string $resid id of the reservation this user is being added to
	* @param string $accept_code accept code for the user to be able to participate
	*/
	function add_participant($memberid, $resid, $accept_code) {		
		$values = array($resid, $memberid, 0, 1, 0, 0, $accept_code);

		$query = 'INSERT INTO ' . $this->get_table(TBL_RESERVATION_USERS) . ' VALUES(?,?,?,?,?,?,?)';
		$q = $this->db->prepare($query);
		$result = $this->db->execute($q, $values);
		$this->check_for_error($result);
	}
	
	/** janr : = additional resources
	* Returns an array of all supplemental resources associated with this reservation
	* @param string $resid id of the reservation to get resources for
	* @return array of resource information for display and update
	*/
	function get_sup_resources($resid) {
		$resources = array();
		
		$sql = 'SELECT rr.*, ar.name FROM '
				. $this->get_table(TBL_RESERVATION_RESOURCES) . ' as rr INNER JOIN ' . $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' as ar'
				. ' ON rr.resourceid = ar.resourceid WHERE rr.resid=?'
			. ' ORDER BY ar.name'; // janr sorteer
		// print ($sql); // test
		$result = $this->db->query($sql, array($resid));

		$this->check_for_error($result);

		while ($rs = $result->fetchRow()) {
			$resources[] = $rs;
		}
		
		return $resources;
	}
	
	/** janr : = additional resources
	* janr:schedulefilter
	* janr:sorteer op naam
	* Returns an array of supplemental resources which are already not a part of this reservation
	* @param string $resid id of the reservation to get resources for
	* @return array of resource information for display and update
	*/
	function get_non_participating_resources($resid) {
		$resources = array();
		$vals = array();
		
		if (empty($resid)) {
			$join_and = ' rr.resid IS NULL';
		}
		else {
			$join_and = ' rr.resid = ?';
			$vals = array($resid);
		}
		
		// janr schedulefilter 
			if ($_SESSION['sessionAdmin']<>'') {						
			//	$rs = $this->get_schedule_data_admin($_SESSION['sessionAdmin']);
				$schedule_filter_txt3 = ' AND ar.scheduleid =  "'.$_SESSION['sessionScheduleAdmin'].'"';
				$schedule_filter_txt1 = '';				
			}
			if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {$schedule_filter_txt3 = ''; }

			// print ('sessionScheduleAdmin ' .$_SESSION['sessionScheduleAdmin']);
			
			// print ('$schedule_filter_txt3 ' .$schedule_filter_txt3);
		// end janr
		// get_schedule_data_admin avn adminDB toegevoegd hier in resDB
		
		// janr:schedulefilter
		$sql = 'SELECT ar.* FROM '
			. $this->get_table(TBL_ADDITIONAL_RESOURCES) . ' ar LEFT JOIN '. $this->get_table(TBL_RESERVATION_RESOURCES) . ' rr'
			. " ON ar.resourceid = rr.resourceid AND $join_and"
			. ' WHERE rr.resourceid IS NULL'
			. $schedule_filter_txt3
			. ' ORDER BY ar.name'; // janr sorteer
		// print ($sql); // test
		
		$result = $this->db->query($sql, $vals);

		$this->check_for_error($result);

		while ($rs = $result->fetchRow()) {
			$resources[] = $rs;
		}

		return $resources;
	}
	
	/**
	* Gets a list of users who are not participating or invited to this reservation
	* @param string $resid id of the reservation to search for
	* @param string $cur_user_id the id of the currently logged user
	* @return array of users who are not participating or invited
	*/
	function get_non_participating_users($resid, $cur_user_id) {
		$users = array();
		$vals = array($cur_user_id);
		
		if (empty($resid)) {
			$join_and = ' ru.resid IS NULL';
		}
		else {
			$join_and = ' ru.resid = ?';
			array_unshift($vals, $resid);
		}
		
		$sql = 'SELECT l.memberid, l.fname, l.lname, l.email FROM '
			. $this->get_table(TBL_LOGIN) . ' l LEFT JOIN '. $this->get_table(TBL_RESERVATION_USERS) . ' ru'
			. " ON l.memberid = ru.memberid AND $join_and"
			. ' WHERE ru.memberid IS NULL AND l.memberid <> ?'
			. ' ORDER BY l.lname, l.fname';
			
		$result = $this->db->query($sql, $vals);

		$this->check_for_error($result);

		while ($rs = $result->fetchRow()) {
			$users[] = $rs;
		}

		return $users;
	}
}
?>