<?php
/**
* Reservation class
* Provides access to reservation data
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 09-04-07
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/..';

require_once($basedir . '/config/mailconstants.php');
require_once($basedir . '/lib/db/ResDB.class.php');
require_once($basedir . '/lib/User.class.php');
require_once($basedir . '/lib/Resource.class.php');
require_once($basedir . '/lib/PHPMailer.class.php');
require_once($basedir . '/lib/Reminder.class.php');
require_once($basedir . '/templates/copycluster.template.php');


class Reservation {
	var $id 		= null;				//	Properties
	var $start_date	= null;				//
	var $end_date	= null;				//
	var $start	 	= null;				//
	var $end	 	= null;				//
	var $resource 	= null;				//
	var $user		= null;				//
	var $resources = array();			//
	var $created 	= null;				//
	var $modified 	= null;				//
	var $type 		= null;				//
	var $is_repeat	= false;			//
	var $repeat		= null;				//
	var $minres		= null;				//
	var $maxRes		= null;				//
	var $parentid	= null;				//
	var $is_blackout= false;			//
	var $is_pending = false;			//
	var $summary	= null;				//
	var $scheduleid	= null;				//
	var $sched		= null;				//
	var $users		= null;				//
	var $allow_participation = 0;		//
	var $allow_anon_participation = 0;	//
	var $checkout_via = null;		// janr 3 velden erbij
	var $checkin_via = null;			//
	var $reservation_status = 0;				//
	var $contractsoort = 0;				//
	var $clusterid = null;				//	
	
	var $reminderid	= null;				//
	var $invited_users = array();
	var $participating_users = array();

	var $errors     = array();
	var $word		= null;
	var $adminMode  = false;
	var $is_participant = false;
	var $reminder_minutes_prior = 0;

	var $db;
	var $oldid 		= null;	// jaro
	var $newid 		= null;	// jaro

	/**
	* Reservation constructor
	* Sets id (if applicable)
	* Sets the reservation action type
	* Sets the database reference
	* @param string $id id of reservation to load
	* @param bool $is_blackout if this is a blackout or not
	* @param bool $is_pending if this is a pending reservation or not
	* @param string $scheduleid id of the schedule this belongs to
	* janr : indien $clusterid dan andere res ophalen
	*/
	function Reservation($id = null, $is_blackout = false, $is_pending = false, $scheduleid = null) {
		$this->db = new ResDB();

		if (!empty($id)) {
			$this->id = $id;
			$this->load_by_id();			
			}
		else {
			$this->is_blackout = $is_blackout;
			$this->is_pending = $is_pending;
			$this->scheduleid = $scheduleid;
		}

		$this->word = $is_blackout ? 'blackout' : 'reservation';
		$this->sched = $this->db->get_schedule_data($this->scheduleid);
	}

	/**
	* Loads all reservation properties from the database
	* @param none
	*/
	function load_by_id() {
		$res = $this->db->get_reservation($this->id, Auth::getCurrentID());	// Get values from DB

		if (!$res) {	// Quit if reservation doesnt exist
			CmnFns::do_error_box($this->db->get_err());
		}

		$this->start_date = $res['start_date'];
		$this->end_date	= $res['end_date'];
		$this->start	= $res['starttime'];
		$this->end		= $res['endtime'];
		$this->resource = new Resource($res['machid']);
		$this->created	= $res['created'];
		$this->modified = $res['modified'];
		$this->parentid = $res['parentid'];
		$this->summary	= htmlspecialchars($res['summary']);
		$this->scheduleid	= $res['scheduleid'];
		$this->is_blackout	= $res['is_blackout'];
		$this->is_pending	= $res['is_pending'];
		$this->allow_participation = $res['allow_participation'];
		$this->allow_anon_participation = $res['allow_anon_participation'];
		$this->checkout_via = $res['checkout_via']; // janr drie velden toegevoegd
		$this->checkin_via = $res['checkin_via'];
		$this->reservation_status = $res['reservation_status'];						
		$this->contractsoort = $res['contractsoort'];	
		$this->clusterid = $res['clusterid'];			
		$this->is_participant = $res['participantid'] != null;
		$reminder = new Reminder($res['reminderid']);
		$reminder->set_reminder_time($res['reminder_time']);
		$this->reminderid = $res['reminderid'];
		$this->reminder_minutes_prior = $reminder->getMinutuesPrior($this);
		// $janruser = $res['user']; // user die reserverveerd los van invitations - ongebruikt janrphp
		
		$this->users = $this->db->get_res_users($this->id);

		// Store the memberid of the owner
		for ($i = 0; $i < count($this->users); $i++) {
			if ($this->users[$i]['owner'] == 1) {
				$this->user = new User($this->users[$i]['memberid']);
			}
			else if ($this->users[$i]['invited'] == 1) {
				$this->invited_users[] = $this->users[$i];
			}
			else {
				$this->participating_users[] = $this->users[$i];
			}
		}
		$this->resources = $this->db->get_sup_resources($this->id);

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
							//	print ('nowtime UNIX: '.$nowtime.'<br>');	
							//	print ('nowtime .Time::formatDateTime: ' .Time::formatDateTime($nowtime) . '<br />'); //NOW datum en tijd formatted

							//	print ('nowtime .Time::getHours: ' .Time::getHours($nowtime) . '<br />'); //NOW datum en tijd formatted
							//	print ('nowtime .Time::getHours%24: ' .Time::getHours($nowtime)%(24 *60). '<br />'); //NOW datum en tijd formatted
							//	$mod1 = Time::getAdjustedHour( $nowtime%(24 * 60 * 60)) ;
							//	$mod2 = $nowtime%(24 * 60 * 60) ;			// seconden na midnight
							//	$mod2m = $nowtime%(24 * 60) ;			// seconden na midnight
									//	$mod4 = floor($mod2/3600);					// floor seconds to whole hour
									//	$mod5 = ($mod4*60);							// hour to unix minutes
							//	$mod7 = abs($nowtime/1440);
							//	print ('$nowtime%(24 * 60 * 60): ' .$mod2 . '<br />minute na midnight '.$mod2m.'<br>');
						
							//	print ('uren vandaag floor ' .$mod4 . '<br />');
							//	print ('unix hour floor ' .$mod5 . '<br />');
							// Timestamp for whatever day we are currently viewing
							  // $this->_date['current'] = mktime(0,0,0, $temp_date['mon'], $temp_date['mday'] + $dayCount, $temp_date['year']);
							  // echo ('_datecurrent '.$this->_date['current']);

							//	print ('$enddateDB: '.$enddateDB.'<br>');
							//	$mod6 = ($nowtime - $mod2); // nowtime minus seconden in deze dag
							//	print ('mod6  ' .$mod6 . '<br />');
							//	$current_timestamp = Time::getAdjustedTime(mktime());
							//	$thisday = $current_timestamp  - ($current_timestamp % 86400);
							//	$nextday = $current_timestamp + 86400 - ($current_timestamp % 86400);
							//	$thisday = $thisday-7200; // servercorrection
							//	print ('thisday '. $thisday. 'nextday '. $nextday);
							//print ('DBvalue datumtijd: ' .Time::formatDateTime($enddateDB) . '<br />'); //NOW datum en tijd formatted					
							//print ('this->end_date: '.$this->end_date.'<br>');
							//print ('this->end: '.$this->end.'<br>');
							//print ('mod7  ' .$mod7 . '<br />');	
		$toolate=false;
	
		if ( ($enddateDB < ($nowtime - $conf['time']['servercorrect'])) && ($this->reservation_status < 2))
			{ 	$toolate=TRUE;
			}
		return $toolate; 
	}
		
	
	
	
	/**
	* Deletes the current reservation from the database
	* If this is a recurring reservation, it may delete all reservations in group
	* @param boolean $del_recur whether to delete all recurring reservations in this group
	*/
	function del_res($del_recur) 
	{
		$this->type = RES_TYPE_DELETE;

		$this->is_repeat = $del_recur;

		$this->check_perms();					// Make sure they are who they claim to be

		$users_to_inform = array();				// Notify all users that this reservation is being deleted
		for ($i = 0; $i < count($this->users); $i++) 
		{
			$users_to_inform[] = $this->users[$i]['email'];
		}
		//janr
		if ($this->id == $this->clusterid) {
			// echo ('this is a delmaster');
			$del_master= TRUE; // Complete cluster will be deleted
			$this->db->del_res_cluster($this->id, $this->clusterid, $del_master, mktime(0,0,0), $this->user->userid); // use analogy of parent
		}else {
			$this->db->del_res($this->id, $this->parentid, $del_recur, mktime(0,0,0), $this->user->userid); //org
		}

		if (!$this->is_blackout)		// Mail the user if they want to be notified
		{
			//$this->send_email('e_del', null, $users_to_inform);  // wordt  vervangen door confirmmail
		}
		
		CmnFns::write_log($this->word . ' ' . $this->id . ' deleted.', $this->user->get_id(), $_SERVER['REMOTE_ADDR']);
		if ($this->is_repeat)
		{
			CmnFns::write_log('All ' . $this->word . 's associated with ' . $this->id . ' (having parentid ' . $this->parentid . ') were also deleted', $this->memberid, $_SERVER['REMOTE_ADDR']);
		}
		$this->print_success('deleted');
	}

	/**
	* Add a new reservation to the database
	*  after verifying that user has permission
	*  and the time is available
	* @param array $users_to_invite array of users to invite to this reservation
	* @param array $resources_to_add array of additional resources to add to this reservation
	*/
	function add_res($users_to_invite = array(), $resources_to_add = array()) 
	{
		$this->type     = RES_TYPE_ADD;
		$repeat = $this->repeat;

	
		$orig_reservation_status = $res->reservation_status;	// Janr Store the original reservation_status because ... the proces	
		// echo ('orig0 ' .$res->reservation_status);
		// echo ('orig1 ' .$orig_reservation_status);
		
		$orig_start_date = $this->start_date;		// Store the original dates because they will be changed if we repeat
		$orig_end_date = $this->end_date;
		$accept_code = $this->db->get_new_id();

		$dates = array();
		$tmp_valid = false;

		if (!$this->is_blackout) {
			$this->check_perms();			// Only need to check once
			$this->check_min_max();
			$this->check_reservation_status($orig_reservation_status);		// janr , doet niks
			// $this->check_janrchecks();		// janr	dit eruit gaat als warning direct in reserve.php
		}

		if ($this->check_startdate()) {
			$this->check_times();			// Check valid times
		}

		if ($this->has_errors() ) {			// Print any errors generated above and kill app
			//$this->print_all_errors(true);
			$this->print_all_errors(false);
		}

		$reminder = new Reminder();
		$reminder->setDB(new ReminderDB());
		
		//$is_parent = $this->is_repeat;		// 2art afhandeling toegevoegd artikel start hier janr 306
		
		$is_parent = $this->is_repeat;		// First valid reservation will be parentid (no parentid if solo reservation)
// echo ("test this->is_repeat = false");
		for ($i = 0; $i < count($repeat); $i++) 
		{
			$this->start_date = $repeat[$i];
			
			if ($this->is_repeat) 
			{
			echo ("test$this->is_repeat = true");
				// End date will always be the same as the start date for recurring reservations
				$this->end_date = $this->start_date;
			}
			if ($i == 0) 
			{
				$tmp_date = $this->start_date;			// Store the first date to use in the email
			}
			
			$is_valid = $this->check_res($resources_to_add);

			if ($is_valid) 
			{
				$tmp_valid = true;								// Only one recurring needs to work
				$this->id = $this->db->add_res($this, $is_parent, $users_to_invite, $resources_to_add, $accept_code);
				if ($this->reminder_minutes_prior != 0) 
				{
					$reminder->save($this, $this->reminder_minutes_prior); 		// Add the reminder
				}
				if (!$is_parent) 
				{
					array_push($dates, $this->start_date);		// Add recurring dates (first date isnt recurring)
				}
				else 
				{
					$this->parentid = $this->id;				// The first reservation is the parent id
				}
				CmnFns::write_log($this->word . ' ' . $this->id . ' added.  machid:' . $this->resource->get_property('machid') .', dates:' . $this->start_date . ' - ' . $this->end_date . ', start:' . $this->start . ', end:' . $this->end, $this->user->get_id(), $_SERVER['REMOTE_ADDR']);
			}
			$is_parent = false;									// Parent has already been stored
		}
// end repeat janr
		if ($this->has_errors() )					// Print any errors generated when adding the reservations
		{
			$this->print_all_errors(!$this->is_repeat);
		}
		
		$this->start_date = $tmp_date;				// Restore first date for use in email
		if ($this->is_repeat) 
		{
			array_unshift($dates, $this->start_date);		// Add to list of successful dates
		}

		sort($dates);

		// Restore original reservation dates
		
		// testing echo ("testorig_end_date = " . Time::formatReservationDate( $orig_end_date, $this->end) ."<br>");
		
		$this->start_date = $orig_start_date;
		$this->end_date = $orig_end_date;

		// Notify the user if they want (only 1 email)
		if (!$this->is_blackout) 
		{		
			$this->sched = $this->db->get_schedule_data($this->scheduleid);
			// $this->send_email('e_add', $dates); 	// wordt vervangen door confirmmail
		}

		// Send out invites, if needed
		if (!$this->is_pending && count($users_to_invite) > 0) 
		{
			$this->invite_users($users_to_invite, $dates, $accept_code);
		}

		if (!$this->is_repeat || $tmp_valid)
		{
			// $this->print_success('created', $dates);
			$this->print_success('created', $dates, $this->end_date, $orig_start_date, $orig_end_date); // janr enddate for print voor nonrepeat res
			// janr 2art, hier komt button 'meer artikel' 
			// print ('add_res1');
		}
		//janrtest
		//echo ('$xthis->id: ' . $this->id);
		return ($this->id);
	}
	
	/**
	* Modifies a current reservation, setting new start and end times or deleting it
	* @param array $all_invited_users array of all invited users to be used for DB insertion
	* @param array $users_to_invite array of newly invited users to be used for invitation emails
	* @param array $users_to_remove array of users that will be removed from invitation/participating in this reservation
	* @param array $unchanged_users array of users who have no status change at all
	* @param array $resources_to_add array of additional resources to add to this reservation
	* @param array $resources_to_remove array of additional resources to remove from this reservation
	* @param bool $del whether to delete it or not
	* @param boolean $mod_recur whether to modify all recurring reservations in this group
	*/
	function mod_res($users_to_invite, $users_to_remove, $unchanged_users, $resources_to_add, $resources_to_remove, $del, $mod_recur) {
		$recurs = array();
		$valid_resids = array();
		$this->type = RES_TYPE_MODIFY;
	
		//$orig_reservation_status = $res->reservation_status;	// Janr Store the original reservation_status because ... the proces	
		// veranderd ivm Notice
		$orig_reservation_status = $this->reservation_status;	// Janr Store the original reservation_status because ... the proces	
		// echo ('orig0 ' .$res->reservation_status);
		// echo ('orig1 ' .$orig_reservation_status);
		
		
		$orig_start_date = $this->start_date;		// Store the original dates because they will be changed if we repeat
		$orig_end_date = $this->end_date;

		$accept_code = $this->db->get_new_id();

		if ($del) {									// First, check if this should be deleted
			$this->del_res($mod_recur, mktime(0,0,0));
			return;
		}

		if (!$this->is_blackout) {
			$this->check_perms();					// Check permissions
			$this->check_min_max();		// Check min/max reservation times
			$this->check_reservation_status($orig_reservation_status);		// janr	
			//$this->check_janrchecks();		// janr	dit eruit gaat als warning direct in reserve.php				
		}

		if ($this->check_startdate()) {
			$this->check_times();			// Check valid times
		}

		$this->is_repeat = $mod_recur;	// If the mod_recur flag is set, it must be a recurring reservation
		$dates = array();

		// First, modify the current reservation
		if ($this->has_errors() ) {			// Print any errors generated above and kill app
			//$this->print_all_errors(true);  // 
			$this->print_all_errors(false);
		}

		$reminder = new Reminder();
		$reminder->setDB(new ReminderDB());

		$tmp_valid = false;

		$this->is_pending = !Auth::isAdmin() && $this->resource->get_property('approval');

		if ($this->is_repeat) {				// Check and place all recurring reservations
			$recurs = $this->db->get_recur_ids($this->parentid, mktime(0,0,0));

			for ($i = 0; $i < count($recurs); $i++) {
				$this->id = $recurs[$i]['resid'];		// Load reservation data
				$this->start_date = $recurs[$i]['start_date'];
				if ($this->is_repeat) {
					// End date will always be the same as the start date for recurring reservations
					$this->end_date = $this->start_date;
				}
				$is_valid = $this->check_res($resources_to_add);			// Check overlap (dont kill)

				if ($is_valid) { // jarocc xxx
					$tmp_valid = true;						// Only one recurring needs to pass
					$this->db->mod_res($this, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code);		// And place the reservation

					if (!empty($this->reminderid)) {
						$reminder->update($this, $this->reminder_minutes_prior);
					}
					else if ($this->reminder_minutes_prior != 0 && empty($this->reminderid)) {
						$reminder->save($this, $this->reminder_minutes_prior);
					}

					$dates[] = $this->start_date;
					$valid_resids[] = $this->id;
					CmnFns::write_log($this->word . ' ' . $this->id . ' modified.  machid:' . $this->get_machid() .', dates:' . $this->start_date . ' - ' . $this->end_date . ', start:' . $this->start . ', end:' . $this->end, $this->memberid, $_SERVER['REMOTE_ADDR']);
				}
			}
		}
		else {
			if ($this->check_res($resources_to_add) or true) {				// jaroccxx	maart2017 - do not Check overlap - save must be done
				$this->db->mod_res($this, $users_to_invite, $users_to_remove, $resources_to_add, $resources_to_remove, $accept_code);		// And place the reservation

				if (!empty($this->reminderid)) {
					$reminder->update($this, $this->reminder_minutes_prior);
				}
				else if ($this->reminder_minutes_prior != 0 && empty($this->reminderid)) {
					$reminder->save($this, $this->reminder_minutes_prior);
				}

				$dates[] = $this->start_date;
				// $dates[] = $this->end_date; // janr add, dit werkt goed maar help repaet res om zeep
				
				$valid_resids[] = $this->id;
			}
		}

		// Restore original reservation dates
		$this->start_date = $orig_start_date;
		$this->end_date = $orig_end_date;

		if ($this->has_errors() )		// Print any errors generated when adding the reservations
			$this->print_all_errors(!$this->is_repeat);

		if (!$this->is_blackout) {		// Notify the user if they want
			//$this->send_email('e_mod', null, $unchanged_users); // wordt  vervangen door confirmmail
		}

		// Send out invites, if needed
		if (!$this->is_pending && count($users_to_invite) > 0) {
			$this->invite_users($users_to_invite, $dates, $accept_code);
		}

		if (!$this->is_pending && count($users_to_remove) > 0) {
			$this->remove_users_email($users_to_remove, $dates);
		}

		if (!$this->is_repeat || $tmp_valid)
			// $this->print_success('modified', $dates); // janr enddate 
			$this->print_success('modified', $dates, $this->end_date, $orig_start_date, $orig_end_date);
	}

    /**
	* Approves reservation and sends out an email to the owner
	* Any reservation invitations are sent at this point
	* @param bool $mod_recur if we should update all reservations in this group
	*/
	function approve_res($mod_recur) {
		$this->type = RES_TYPE_APPROVE;

		$this->is_repeat = $mod_recur;

		$this->db->approve_res($this, $mod_recur);
		$where = 'WHERE resid = ?';
		$values = array($this->id);
		if ($mod_recur) {
			$where .= ' OR parentid = ?';
			array_push($values, $this->parentid);
		}

		$dates = array();
		$ds = $this->db->get_table_data('reservations', array('start_date'), array('start_date'), null, null, $where, $values);
		for ($d = 0; $d < count($ds); $d++) {
			$dates[] = $ds[$d]['start_date'];
		}

		$this->send_email('e_app', $dates);

		// Send out invites, if needed
		if (count($this->users) > 0) {
			$accept_code = $this->db->get_new_id();
			$userinfo = array();
			for ($i = 0; $i < count($this->users); $i++) {
				if ($this->users[$i]['owner'] != 1) {
					$userinfo[$this->users[$i]['memberid']] = $this->users[$i]['email'];
				}
			}
			if (!empty($userinfo)) {
				$this->invite_users($userinfo, $dates, $accept_code);
			}
		}
		$this->print_success('approved', $dates);
	}

	/**
	* Prints a message nofiying the user that their reservation was placed
	* @param string $verb action word of what kind of reservation process just occcured
	* @param array $dates dates that were added or modified.  Deletions are not printed.
	*/
	function print_success($verb, $dates = array()) {
		echo '<script language="JavaScript" type="text/javascript">' . "\n"
			. 'if (window.opener && window.opener.opener)'
			. 'window.opener.opener.document.location.href = window.opener.opener.document.URL;' . "\n"
			. '</script>';
		$date_text = '';
		//CmnFns::do_message_box(translate('Your ' . $this->word . ' was successfully ' . $verb) );
		$msg = translate('Your ' . $this->word . ' was successfully ' . $verb) ;	
		echo '<script language="JavaScript" type="text/javascript">' . "\n"
			. 'if (window.parent!=self && jQuery("#checkDiv",window.parent.document).size())'
			. "jQuery('#checkDiv',window.parent.document).html('<td width=\"25\"><img src=\"img/checkbox.gif\" alt=\"ok\"/></td><div class=\"messagePositive\">$msg</div>').show();\n"
			. "else alert('$msg');". "\n"
			. '</script>';
					
	}

	/**
	* Verify that the starting date has not already passed
	* @return if the starting date is valid
	*/
	function check_startdate() {
		if ($this->adminMode) { return true; }

		$dates_valid = true;

		$min_notice = $this->resource->get_property('min_notice_time');
		$max_notice = $this->resource->get_property('max_notice_time');

		$date_vals = getdate();
		$month = $date_vals['mon'];
		$day = $date_vals['mday'];
		$hour = $date_vals['hours'];
		$min = $date_vals['minutes'];
		$sec = $date_vals['seconds'];
		$year = $date_vals['year'];
		
		$min_date_full = mktime($hour + $min_notice, $min, $sec, $month, $day);
		$min_date_vals = getdate($min_date_full);
		$min_date = mktime(0,0,0, $min_date_vals['mon'], $min_date_vals['mday'], $min_date_vals['year']);
		$min_time = $min_date_vals['hours'] * 60 + $min_date_vals['minutes'];

		if ( ($this->start_date < $min_date) ||
			 ($this->start_date == $min_date && $this->start < $min_time) )
		{
			$dates_valid = false;
			$this->add_error( translate('This resource cannot be reserved less than x hours in advance', array($min_notice)) );
		}

		if ($max_notice != 0 && $dates_valid) {
			// Only need to check this if the min notice check passed			
			$max_date_full = mktime($hour + $max_notice, $min, $sec, $month, $day);
			$max_date_vals = getdate($max_date_full);
			$max_date = mktime(0,0,0, $max_date_vals['mon'], $max_date_vals['mday'], $max_date_vals['year']);
			$max_time = $max_date_vals['hours'] * 60 + $max_date_vals['minutes'];
			
			if ( ($this->start_date > $max_date) ||
				 ($this->start_date == $max_date && $this->start > $max_time) )
			{
				$dates_valid = false;
				$this->add_error( translate('This resource cannot be reserved more than x hours in advance', array($max_notice)) );
			}
		}

		return $dates_valid;
	}

	/**
	* Verify that the user selected appropriate times and dates
	* @return if the times and dates selected are all valid
	*/
	function check_times() {
		$is_valid = ( (intval($this->start_date) < intval($this->end_date)) || ( intval($this->start_date) == intval($this->end_date) ) && (intval($this->start) < intval($this->end)) );
		// It is valid if the start date is less than or equal to the end date or (if the dates are equal), the start time is less than the end time
		if (!$is_valid) {
			$this->add_error(translate('Start time must be less than end time') . '<br /><br />'
					. translate('Current start time is') . ' ' . Time::formatDateTime($this->start_date + 60 * $this->start) . '<br />'
					. translate('Current end time is') . ' ' . Time::formatDateTime($this->end_date + 60 * $this->end) );
		}
		return $is_valid;
	}

	/**
	* Check to make sure that the reservation falls within the specified reservation length
	* @param int $min minimum reservation length
	* @param int $max maximum reservation length
	* @return if the time is valid
	*/
	function check_min_max() {
		if ($this->adminMode) { return true; }
		$min = $this->resource->get_property('minres');
		$max = $this->resource->get_property('maxRes');
		if ($this->start_date < $this->end_date) {  return true; }	// Cannot have a min/max for multi-day reservations

		$this_length = ( $this->end - $this->start);
		$is_valid = ($this_length >= ($min)) && (($this_length) <= ($max));
		if (!$is_valid)
			$this->add_error(translate('Reservation length does not fall within this resource\'s allowed length.') . '<br /><br >'
					. translate('Your reservation is') . ' ' . Time::minutes_to_hours($this_length) . '<br />'
					. translate('Minimum reservation length') . ' ' . Time::minutes_to_hours($min). '<br />'
					. translate('Maximum reservation length') . ' ' . Time::minutes_to_hours($max)
					);
		return $is_valid;
	}

	/** niet gebruikt
	/** deze errorchecks kunnen ook als warning-checks worden ingevoerd, zie reserve.php r 192
	* Check to make sure that the reservation falls within the specified reservation length
	* @param int $min minimum reservation length
	* @param int $max maximum reservation length
	* @return if the time is valid
	*/
	function check_janrchecks() {

				
		// *****************************************
		// start _check janr 
		// *****************************************
		$timestamp = date(U);
			// janr: te vroeg teruggebracht:
			// als (reservation_status =>2 ) en (einddatum in de toekomst) dan (einddatum wordt nu)
			if ( ($this->reservation_status > 1) && ($this->end_date > $timestamp) )	{
				// echo ('$res->start_date '.$res->start_date. '<br>');
				// echo ('$res->end_date '.$res->end_date. '<br>');
				// echo ('$timestamp '.$timestamp. '<br>');
				if ($this->start_date > $timestamp)	{ //als begindatum ook in de toekomst, dan beter weggooien
				//	$res->start_date	= $timestamp;
					$this->add_error( translate('Startdate is in the future, and reservation is checked in. better you DELETE this reservation') );
					// echo ("Begindate ligt in de toekomst, en artikelen worden al check-in. Beter DELETE u deze reservering.". '<br>');
					
				}				
				if ($this->start_date <= $timestamp)	{ //als begindatum ook in de toekomst, dan beter weggooien
					$this->end_date		= $timestamp;
					$this->add_error( translate('note : please change the enddate of this reservation to TODAY, because the resources are checked in.') );
					//echo ("note : please change the enddate of this reservation to TODAY, because the resources are checked in.". '<br>');
				}
			}else {
				// echo "NOTHING";
			}
			// als admin voor zichzelf leent
			// zie regel 131,  owner ophalen
			
			// $this->janruser = new User($janruser); //lener
			//echo ('lener ' . $this->user->get_email() . '<br>');
			
			if (Auth::isAdmin() || $this->user->get_isadmin() || $this->user->is_schedule_admin($res->get_scheduleid()))	
			{	
				// echo ("POST-memberid (de gebruiker): " . $_POST['memberid'] . '<br>' );
				// echo ("member email : " . $res->user->get_email() . '<br>' ); // de lener
				// echo ("member email2 : " . $res->user->get_email2() . '<br>' ); // de lener
				// echo ("cur_user email: " . $cur_user->get_email() . '<br>' ); // de scheduleadmin
				
				print_r ($_SESSION[sessionAdmin] .'<br>');				
				
				if ( ($this->user->get_email() == $_SESSION[sessionAdmin] ) || ($this->user->get_email2() == $_SESSION[sessionAdmin] )  )					{
					$this->add_error( translate('You: ScheduleAdmin make this reservation for yourself. Not permitted, use blackout if you want to do this.') );
					// echo ("ScheduleAdmin reserveerd voor zichzelf (niet student of medewerker). Weet u zeker dat u door wilt gaan?". '<br>');
				}
			}	
			
		
		// *****************************************
		// end _check janr 
		// *****************************************

				
				
		return $is_valid;
	}

	
	/** check_reservation_status
	* zie ook check-reservation-status.php
	*
	* Checks to if the new set status_res is valid compared to the orig_status_res
	* @return if the changed status is valid
	*												
	* $strings['reservation_status0']  = 'reservering';
	* $strings['reservation_status1']  = 'checked out';
	* $strings['reservation_status2']  = 'checked in';
	* $strings['reservation_status3']  = 'voltooid';
	*
	*		status oud		status nieuw	dan
	*		==========      ============	===
	*
	*		res of out		in or gereed	
	*										dan: eindtijd reservering wordt NU.				
	*
	*/
	function check_reservation_status($orig_status_res) {
			//echo ('van: '.$res->reservation_status);
			//echo ('naar: '.$res->reservation_status);
			// gaat van uit naar in	?
			if ( ($orig_status_res == 0 || $orig_status_res == 1) && ($res->reservation_status == 2 || $res->reservation_status == 3) )
			{	
				if ($status < 0 || $status > 3)
								$res->reservation_status = 0;
				else
				//				$res->reservation_status = $status;
				
				if ($status == 4)
								$res->reservation_status = 3;
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
			///
					while ($res->end_date > $dag_nu)  {
					$res->end_date = $res->end_date - $dag_verschil; // 1 dag terug 
					}
					
					if ($res->end_date == $dag_nu ) {
						while ($res->end > $time_nu) {
							$res->end = $res->end - $uur_verschil; // 1 uur terug
						}
					}
						///
					// EINDTIJD MAG NIET VROEGER DAN BEGINTIJD
				// check de nieuwe eindtijd: 
				
					if ($res->start_date==$res->end_date && $res->end <= $res->start) {
									$res->end = $res->start+60; // force 1 hour up.
					}

					if ($res->start_date > $res->end_date) {
									$res->end_date = $oldresdate; // RESTORE, do not update timings; ***todo: alert begintijd groter dan nieuwe eindtijd, artikel niet vrijgegeven
									$res->end = $oldrestime;
					}		
					
					
				}
				// end doit
			}
			return ;
			}

	/**
	* Checks to see if a time is already reserved
	* For Resource AND Additional resource 
	* @return whether the time is reserved or not
	* return : $add_valid - additional resource is valid  // deze delete janr
	* return : $is_valid -  resource is valid
	*/
	function check_res($resources_to_add) {
		$is_valid = $add_valid = true;
		$reserved = $this->db->checkAdditionalResources($this, $resources_to_add);
		$is_valid = !($this->db->check_res($this));
		if (!$is_valid) {
			$this->add_error(translate('reserved or unavailable', array(Time::formatDateTime($this->start_date + (60*$this->start)), Time::formatDateTime($this->end_date + (60*$this->end)))));
		}
		//echo ($is_valid && $add_valid); // test janr
		return $is_valid && $add_valid;
	}
	/**
	* Checks to see if a time is already reserved
	* For Resource ONLY
	* @return whether the time is reserved or not
	* NOTreturn : $add_valid - additional resource is valid
	* return : $is_valid -  resource is valid
	* hier toevoegen: is dit art al eerder gekozen in deze res? dan err
	*/
	
	function check_res_resource_verlenging() {
		$is_valid = true;
		$is_valid = !($this->db->check_res_verlenging($this));
	
		if (!$is_valid) {
			$this->add_error(translate('verlenging niet toegekend', array(Time::formatDateTime($this->start_date + (60*$this->start)), Time::formatDateTime($this->end_date + (60*$this->end)))));
		}
		// echo ('check_res_resource_only (is valid):'.$is_valid.'<br>'); // test janr
		return $is_valid;
	}

	/**
	* Checks to see if a time is already reserved
	* For Resource ONLY
	* @return whether the time is reserved or not
	* NOTreturn : $add_valid - additional resource is valid
	* return : $is_valid -  resource is valid
	* hier toevoegen: is dit art al eerder gekozen in deze res? dan err
	*/
	
	function check_res_resource_only() {
		$is_valid = true;
		$is_valid = !($this->db->check_res($this));
	
		if (!$is_valid) {
			$this->add_error(translate('reserved or unavailable', array(Time::formatDateTime($this->start_date + (60*$this->start)), Time::formatDateTime($this->end_date + (60*$this->end)))));
		}
		// echo ('check_res_resource_only (is valid):'.$is_valid.'<br>'); // test janr
		return $is_valid;
	}
	/**
	* Check if a user has permission to use a resource
	* @param bool whether to kill the app if the user does not have permission
	* @return whether user has permission to use resource
	*/
	function check_perms($kill = true) {
		if ($this->adminMode)                    // Admin always has permission
		   return true;

		if ((Auth::getCurrentID() == null) || ($this->user->get_id() != Auth::getCurrentID())) {
		   $has_perm = false;                    // Check user is allowed to modify this reservation
		}
		else {
		   $has_perm = $this->user->has_perm($this->resource->get_property('machid')); // Get user permissions
		}

		if (!$has_perm)
		   CmnFns::do_error_box(
				   translate('You do not have permission to use this resource.')
				   , 'width: 90%;'
				   , $kill);

		return $has_perm;
	}

	/**
	* Prints out the reservation table
	* @param none
	*/
	function print_res() {
		global $conf;

			//$this->type = RES_TYPE_VIEW; // JARO force as view
			
		$is_private = $conf['app']['privacyMode'] && !$this->adminMode;

		$day_has_passed = !$this->check_startdate();

		if (!$this->adminMode && !$this->is_blackout && $day_has_passed )  { 
			$this->type = RES_TYPE_VIEW;
		}

		if (Auth::getCurrentID() != $this->user->get_id() && !$this->adminMode) { $this->type = RES_TYPE_VIEW; };

		$rs = $this->resource->properties;
		if ($this->type == RES_TYPE_ADD && $rs['approval'] == 1 && !Auth::IsAdmin()) {
			$this->is_pending = true;		// On the initial add, make sure that the is_pending flag is correct
//
		}

		$is_owner = (($this->user->get_id() == Auth::getCurrentID() || $this->adminMode) && $this->type != RES_TYPE_VIEW);

		print_title($rs['name'], $this->user->get_fname(), $this->user->get_lname(), $this->is_blackout, $is_private ); 
//		print_mod(); // janr test 

		begin_reserve_form($this->type == RES_TYPE_ADD, $this->is_blackout);
		begin_container();

		if (empty($this->start)) {
			$this->start = $this->sched['daystart'];
			$this->end = $this->start + $this->sched['timespan'];
		}
		
		$toolate=$this->res_to_late() ; // is lening te laat teruggebracht?  // janr te laat
				//  $nowtime = Time::getAdjustedTime(mktime()); 	// test janr
				//  $enddateDB = $this->end_date + 60 * $this->end; // test janr
				//  echo ('xxx nowtime '.$nowtime);					// test janr
				//  echo ('xxx enddateDB '.$enddateDB);				// test janr
				
		// haal alle res met deze clusterid // clusterdataxxx
		$clusters=array();
			if ( $this->clusterid <> null ) {				
				$clusters = $this->db->get_reservation_clusterdata($this->clusterid);
			}
		// jaro, set the 
		// Contains resource/user info, time select, summary, repeat boxes						
		print_basic_panel($this, $rs, $is_private && !$is_owner, $toolate, $clusters);		// clusterdataXX

		if ($this->is_blackout || $is_private) {
			print_users_panel($this, array(), null, '', false, false);	// No advanced for either case
		}
		else
		{
			$this->user->get_id();

			$all_users = ($is_owner) ? $this->db->get_non_participating_users($this->id, Auth::getCurrentID()) : array();
			print_users_panel($this, $all_users, $is_owner, $rs['max_participants'], true, $day_has_passed);
		}

		if ($this->is_blackout)
		{
			print_additional_tab($this, array(), false, false);
		}
		else
		{
		// janr toevoeging add additional artikelen ?
		// // filter schedulid
		$all_resources = ($is_owner) ? $this->db->get_non_participating_resources($this->id) : array();
		// print_add_resources_tab($this, $all_resources, $is_owner, true);
		// janr end toevoeging add artikelen
			$all_resources = ($is_owner) ? $this->db->get_non_participating_resources($this->id) : array();
			print_additional_tab($this, $all_resources, $is_owner, true);
		}

		end_container();

			print_buttons_and_hidden($this); //jaro

		end_reserve_form();
		print_jscalendar_setup($this, $rs);

		if ((bool)$this->allow_anon_participation || (bool)$this->allow_participation) {
			print_join_form_tags();
		}
	}
	
	/** // 'janr print into email, de Accessories'
	* Prints out view only van de accessoires
	*/
	function print_to_mail_accessories ($resid) {
		
		$accresources = $this->db->get_sup_resources($resid);
		
		
		if (count($res->resources) < 0) {
			echo translate('None');
		}

		for ($i = 0; $i < count($accresources); $i++) {
				if ($i == 0) { //headerline
				$accessories = '<tr class="header"><td colspan=3></td><td>' . translate('Accessories') . ':</td><td colspan=6> </td></tr>';
				}
			$accessories .= '<tr class="valuesfirst"><td colspan=4></td><td colspan=2><b>'.$accresources[$i]['name'].'</b></td><td colspan=4> </td></tr>';
		}
		
		return $accessories;
	}

	/** // 'janr print into email, de Accessories'
	* Prints out view only van de accessoires
	*/
	function print_to_mail_accessories_tot ($resid) {
		
		$accresources = $this->db->get_sup_resources($resid);
		
		
		if (count($res->resources) < 0) {
			echo translate('None');
		}

		for ($i = 0; $i < count($accresources); $i++) {
				if ($i == 0) { //headerline
				//$accessories = 'Plus:<br />';
				$accessories = '';
				}
			$accessories .= '+  '.$accresources[$i]['name'].'<br />';
		}
		
		return $accessories;
	}
	
		
        /**
        * Sends an email notification to the user
        * This function sends an email notifiying the user
        * of creation/modification/deletion of a reservation
        * @param string $type type of modification made to the reservation
        * @param array $repeat_dates array of dates reserved on
        * @param array $users_to_inform array of emails to CC about the reservation mod
        * @global $conf
        */
        function send_email($type, $repeat_dates = null, $users_to_inform = null) {
                global $conf;

                // e_late wordt altijd gezonden
                // if (!$this->user->wants_email($type) && !$conf['app']['emailAdmin'] ) {
                if ( !$conf['app']['emailAdmin'] ) {
                    return;
                }
print ('<br />');
                // Email addresses
                $adminemail = $this->sched['adminemail'];
                // $scheduletitle = $this->sched['scheduletitle'];
                $techEmail  = $conf['app']['techEmail'];
                $url        = CmnFns::getScriptURL();
                
                // wie is admin, welke werkplaats
                $adminemail = $this->sched['adminemail'];
                $scheduletitle = $conf[$adminemail]['schedulename'] ; // nov 13
                $werkplaats = $conf[$adminemail]['schedulename'] ; // nov 13
                
                // volgens deze defs
                //                              $conf['toolotheek@rietveldacademie.nl']['schedulename'] = "Tool-O-Theek";
                //                              $conf['schedulenew@larka.nl']['schedulename'] = "Uitleen 242";
                //                              $conf['christiaan@rietvelddigital.nl']['schedulename'] = "schedulename";
                //                              $conf['uitleen@rietveldwerkplaats.nl']['schedulename'] = "Werkplaats Fotografie";
                //                              $conf['loge@rietveldacademie.nl']['schedulename'] = "Loge";
                
                // nov 13, aparte afhandeling voor tool-o-theek
                // if ( $werkplaats == "Tool-O-Theek" ) {}
                
                // Format date
                $start_date   = Time::formatReservationDate($this->start_date, $this->start);
                $end_date         = Time::formatReservationDate($this->end_date, $this->end);
                $start  = Time::formatTime($this->get_start());
                $end    = Time::formatTime($this->get_end());
                
                // getters: checkout_via en checkin_via
                $checkout_via = $this->get_checkout_via();
                $checkin_via = $this->get_checkin_via();
                
                // janr sept13; let op: location out, en in = checkout_via en checkin_via
                $defs = array(
                                translate('Reservation #'),
                                translate('Start Date'),
                                translate('Start Time'),
                                translate('Resource'),
                                translate('Package'),
                                translate('Fixed accesoires'),
                                translate('End Date'),
                                translate('End Time'),
                                translate('Location out'),
                                translate('Location in')
                                );

                switch ($type) {
                        case 'e_add' : $mod = 'created';
                        break;
                        case 'e_mod' : $mod = 'modified';
                        break;
                        case 'e_del' : $mod = 'deleted';
                        break;
                        case 'e_app' : $mod = 'approved';
                        break;
                        case 'e_late' : $mod = 'toolate';
                        break;
                }
                // get data
                $to     = $this->user->get_email();             // Who to mail to //janr
                if ($this->user->get_email2()<>null) {
                        $to     = $this->user->get_email2();            // Who to mail to //janr 
                }
                $uname  = $this->user->get_fname();
                $location = $this->resource->properties['location'];
                $phone    = $this->resource->properties['rphone']; // momenteel niet ingebruik
                $name     = $this->resource->properties['name'];
                $package     = $this->resource->properties['package'];
                $vast_toebehoren     = $this->resource->properties['vast_toebehoren'];          
                $description     = $this->resource->properties['description'];
                $location = !empty($location) ? $location : translate('N/A');
                $phone    = !empty($phone) ? $phone : translate('N/A');
				
				
				
// begin text van mail opbouw alle overige mails                
            $text = " ";
                                if ($mod == 'approved') {
            $text .= translate_email('reservation_activity_7', $uname, $this->id, $start_date, $start, $end_date, $end, $name, $location, translate($mod));
        }
           
                if (($werkplaats <> "Tool-O-Theek") && ($mod <> 'approved')) {
				// zie /lang  $strings['toolate']
            $text .= translate_email('reservation_activity_1', $uname, translate($mod), $this->id, $scheduletitle, $start_date, $start, $end_date, $end);

        }
                                $tottoolate = FALSE;
                                $totcreated = FALSE;
                // hiet begint TOT toolate, 
                if ( ($werkplaats == "Tool-O-Theek") && ($mod <>'toolate') ) {
                        $totcreated = TRUE;
                        // Tool-O-Theek – Confirmation
                        $subject = $werkplaats. "  – Confirmation of reservation for ".$name." - ".$mod ;
                } else {
                        $totcreated = FALSE;
                        $subject= translate("Reservation $mod for", array($start_date));
                }
                // hiet begint TOT toolate, 
                if ( ($werkplaats == "Tool-O-Theek") && ($mod == 'toolate') ) {
                        $tottoolate = TRUE;
                        // Tool-O-Theek – Please return artikel a.s.a.p.
                        $subject = $werkplaats. "  – Please return ".$name." a.s.a.p.!" ;
                } else {
					if ($werkplaats <> "Tool-O-Theek") {
                        $tottoolate = FALSE;
                        $subject= translate("Reservation $mod for", array($start_date));
						}
                }

/// TOT specifics
/// TOT specific APPROVED
if ($werkplaats == "Tool-O-Theek") {
                                                                
	if ($totcreated == TRUE ) {
                                        // begin mailopbouw voor tot approved
                                        // start text
                                        // 1 inittekst

                                        $text = translate_email('tot-created_1', $uname);

                                        // start items
										$items = '<br /><br />';
										
                                        if (!empty($this->summary)) { 
                                                        $items .= translate_email('tot-created_2a', $name,$this->summary ); // janr 
                                        }else{
                                                        $items .= translate_email('tot-created_2b', $name); // janr 
                                        }
                                        
                                        // is het cluster, ook volgende artikelen 
                                        if ( $this->clusterid <> null ) {       
                                                $clusters = $this->db->get_reservation_clusterdata($this->clusterid);   
                                                for ($i = 0; $i < count($clusters); $i++)  {
                                                        if ($clusters[$i]['resid'] <> $this->clusterid){ // niet de master      
                                                                $items .= translate_email('tot-created_2b', $clusters[$i][name]); // janr        
                                                        }
                                                }
                                        }
										
										// zijn er accessoires?
										$accessories = $this->print_to_mail_accessories_tot ($this->id);
										$items .= $accessories;
                                $text.= translate_email('tot-created_start', $start_date, $start);
                                $text.= $email['1break'];
                                $text.= $email['1break'];
                                $text.= translate_email('tot-created_eind', $end_date, $end);

                $textsignature = translate_email('tot-created_3');       
                                              
                                                if ($contractsoort<0 || $contractsoort>2){$contractsoort=0; }// default                 
                                                        if ($contractsoort==0) {
                                                                $textsignature .= ($conf[$adminemail]['linkcontract1here']); 
                                                                
                                                        }
                                                        if ($contractsoort==1) {
                                                                $textsignature .= ($conf[$adminemail]['linkcontract2here']);  
                                                        }
                                                //                      
                                        $textsignature .= $email['1break'];
                                        $textsignature .= $email['1break'];
                                        $textsignature .= translate_email('tot-signatuur');
}
/// end TOT specific APPROVED
/// begin TOT specific TOOLATE                                   
if ($tottoolate == TRUE ) {
                                        // begin mailopbouw voor tot toolate
                                        // start text
                                        // 1 inittekst
                // voornaam
                // startdatum
                // einddatum
                // eindtijd
                
                                        $text = translate_email('tot-telaat_1', $uname, $start_date, $end_date, $end);
										
                                        // start items

                // 2 iteratief
                // artikel
                // notitie, evt
                $email['tot-telaat_2a'] = "xxxx<b>%s</b> - %s\r\n<br />";
                $email['tot-telaat_2b'] = "xxxx<b>%s</b>\r\n<br />";



                                        if (!empty($this->summary)) { 
                                                        $items = translate_email('tot-telaat_2a', $name,$this->summary ); // janr 
                                        }else{
                                                        $items = translate_email('tot-telaat_2b', $name); // janr 
                                        }
                                        
                                        // is het cluster, ook volgende artikelen 
                                        if ( $this->clusterid <> null ) {       
                                                $clusters = $this->db->get_reservation_clusterdata($this->clusterid);   
                                                for ($i = 0; $i < count($clusters); $i++)  {
                                                        if ($clusters[$i]['resid'] <> $this->clusterid){ // niet de master      
                                                                $items .= translate_email('tot-telaat_2b', $clusters[$i][name]); // janr        
                                                        }
                                                }
                                        }
										
										
										// zijn er accessoires?
										$accessories = $this->print_to_mail_accessories_tot ($this->id);
										$items .= $accessories;
										
										
										
                // 3 sign-off
                

                                        $textsignature = translate_email('tot-telaat_3');       

                // hier iets met contract // print contractregel
                                                
                                                if ($contractsoort<0 || $contractsoort>2){$contractsoort=0; }// default                 
                                                        if ($contractsoort==0) {
                                                                $textsignature .= ($conf[$adminemail]['linkcontract1here']); 
                                                                
                                                        }
                                                        if ($contractsoort==1) {
                                                                $textsignature .= ($conf[$adminemail]['linkcontract2here']);  
                                                        }
                                                //                      
                                        $textsignature .= $email['1break'];
                                        $textsignature .= $email['1break'];
                                        
                                        $textsignature .= translate_email('tot-signatuur');

/// end TOT specific TOOLATE
	}                                
} 
// begin not TOT werkplaatsen                                            
                  if ($werkplaats <> "Tool-O-Theek") {

                        // begin mailopbouw alle overige mails
                        if ($this->is_repeat && count($repeat_dates) > 1) {
                                // Start at index = 1 because at index 0 is the parent date
                                $text .= translate_email('reservation_activity_2');
                                for ($d = 1; $d < count($repeat_dates); $d++) {
                                        $text .= Time::formatDate($repeat_dates[$d]) . "\r\n<br/>";
                                }
                                $text .= "\r\n<br/>";
                        }

                        if ($type != 'e_add' && $this->is_repeat) {
                                $text .= translate_email('reservation_activity_3', translate($mod));
                        }

                        if (!empty($this->summary)) {
                                $text .= stripslashes(translate_email('reservation_activity_4', ($this->summary)));
                        }

                        //if (!empty($techEmail)) $text .= translate_email('reservation_activity_6', $techEmail, $techEmail);
                        if (false) $text .= translate_email('reservation_activity_6', $techEmail, $techEmail);

                        // janr, checkin out
                        $items = translate_email('reservation_activity_11', $this->id, $start_date, $start, $checkout_via, $name, $package, $vast_toebehoren, $end_date, $end, $checkin_via);
                        $items .= translate_email('reservation_activity_11b', $description,$description ); // janr 
                        // is het cluster, lees ook 2e en volgende artikelen 
                        if ( $this->clusterid <> null ) {       
                                $clusters = $this->db->get_reservation_clusterdata($this->clusterid);
                                
                                for ($i = 0; $i < count($clusters); $i++)  {
                                                
                                        if ($clusters[$i]['resid'] <> $this->clusterid){ // niet de master      

                                                $items .= translate_email('reservation_activity_11', '&nbsp;&nbsp;', '&nbsp;&nbsp;','&nbsp;&nbsp;', '&nbsp;&nbsp;', $clusters[$i][name], $clusters[$i][package], $clusters[$i][vast_toebehoren], '&nbsp;&nbsp;', '&nbsp;&nbsp;', '&nbsp;&nbsp;');
                                                if (isset($clusters[$i][description]) && ($clusters[$i][description] <> '') && ($clusters[$i][description] <> ' ')){
                                                        $items .= translate_email('reservation_activity_11b', $clusters[$i][description],$clusters[$i][description] ); // janr 
                                                        }else{
                                                        $items .= translate_email('reservation_activity_11bleeg'); // janr 
                                                        }
                                        }
                                }
                        }
                                $items .= translate_email('dottedline'); // dotte line in tabel
                                // zijn er accessoires?
                                $accessories = $this->print_to_mail_accessories ($this->id);
                                //$items .= $accessories;
                                // print contractregel
                                $textsignature = translate_email('reservation_activity_12');
                                if ($contractsoort<0 || $contractsoort>2){$contractsoort=0; }// default                 
                                        if ($contractsoort==0) {
                                                //$textsignature= '<br>'.translate('contract1print');  
                                                //$textsignature .= '<br>test1<br>';
                                                $textsignature .= ($conf[$adminemail]['linkcontract1']);  
                                        }
                                        if ($contractsoort==1) {
                                                //$textsignature=  '<br>'.translate('contract2print');  
                                                //$textsignature .= '<br>test2<br>';
                                                $textsignature .= ($conf[$adminemail]['linkcontract2']);  
                                        }
                                //
                                if ($mod == 'toolate') {
                                        $textsignature .= '<br>'.translate_email('reservation_activity_5_late', $adminemail, $phone);
                                } else {
                                        $textsignature .= '<br>'.translate_email('reservation_activity_5', $adminemail, $phone);
                                }
                                
                                // signature onder de mail
                                $afzender = $_SESSION[sessionAdmin];
                                $textsignature .= $conf[$afzender]['adres'];
                }
// end not TOT werkplaatsen

if ($tottoolate == TRUE || $totcreated == TRUE)   {
                        $msg = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
        <!--
        body {
           
        font-family: Verdana, Arial, Helvetica, sans-serif;
                background-color: #F0F0F0;
        }
        a {
                color: #104E8B;
                text-decoration: none;
        }
        a:hover {
                color: #474747;
                text-decoration: underline;
        }
        table tr.header td {
                padding-top: 2px;
                padding-botton: 2px;
                background-color: #CCCCCC;
                color: #000000;
                font-weight: bold;
           
                padding-left: 10px;
                padding-right: 10px;
                border-bottom: 0px solid #555;
        }
        table tr.valuesfirst td {
                border-top: 1px dotted #555;
                padding-left: 10px;
                padding-right: 10px;
                font-size: 12px;
        }
                table tr.valueslast td {
                border-bottom: 0px dotted #555;
                padding-left: 10px;
                padding-right: 10px;
           
        }
        -->
        </style>
</head>

<body>

$text
$items
$textsignature

  </body>
</html>
EOT;

}else{
                        $msg = <<<EOT
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
        <!--
        body {
           
        font-family: Verdana, Arial, Helvetica, sans-serif;
                background-color: #F0F0F0;
        }
        a {
                color: #104E8B;
                text-decoration: none;
        }
        a:hover {
                color: #474747;
                text-decoration: underline;
        }
        table tr.header td {
                padding-top: 2px;
                padding-botton: 2px;
                background-color: #CCCCCC;
                color: #000000;
                font-weight: bold;
           
                padding-left: 10px;
                padding-right: 10px;
                border-bottom: 0px solid #555;
        }
        table tr.valuesfirst td {
                border-top: 1px dotted #555;
                padding-left: 10px;
                padding-right: 10px;
           
        }
                table tr.valueslast td {
                border-bottom: 0px dotted #555;
                padding-left: 10px;
                padding-right: 10px;
           
        }
        -->
        </style>
</head>

<body>

$text

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="header">
    <td>{$defs[0]}</td>
    <td>{$defs[1]}</td>
    <td>{$defs[2]}</td>
        <td>{$defs[8]}</td>
    <td>{$defs[3]}</td>
    <td>{$defs[4]}</td>
    <td>{$defs[5]}</td>
    <td>{$defs[6]}</td>
        <td>{$defs[7]}</td>
        <td>{$defs[9]}</td>
  </tr>

$items

$accessories

</table>

$textsignature

  </body>
</html>
EOT;
                }       

                        
                // Send email using PHPMailer   
                
                $mailer = new PHPMailer();
                $mailer->ClearAllRecipients();
				
				$mailer->AddCC($adminemail); // ccmail
				//$mailer->AddCC('jan2013@larka.nl'); // ccmail     testing                        
                
				$mailer->AddAddress($to, $uname);
                $mailer->AddAddress($adminemail); // ccmail
                //$mailer->AddAddress('jan2013@larka.nl'); // ccmail testing
               
// multiple users?
                /*
				if (!empty($users_to_inform)) {
                        foreach ($users_to_inform as $idx => $email) {
                                $mailer->AddCC($email);
                        }
                }
				*/
                $mailer->From = $adminemail;
                $mailer->FromName = $conf['app']['title'];
                $mailer->Subject = $subject;
                // add the right $msg xxxx
                $mailer->Body = $msg;
                $mailer->IsHTML($this->user->wants_html());

               

			//if ($send) { // TEST
			//$success = $mailer->Send();
			
			// send the mail
			if(!$mailer->Send()) {

				echo "Mailer Error: " . $mailer->ErrorInfo;
				
			} else {
				
				print($mailer->Body); //test to screen
				//die();
				// print_r($mailer); //test to screen
				// sleep (5);
			}
		
		$headers = null;
		unset($headers, $msg, $fields);
			
	}

	/**
	* Sends an email to all invited users with a link to accept or deny the reservation
	* @param array $userinfo array of users to invite
	* @param array $dates array of dates for this reservation
	* @param string $accept_code the acceptance code to be used in the email
	*/
	function invite_users($userinfo, $dates, $accept_code) {
		global $conf;
		$mailer = new PHPMailer();

		$mailer->From = $this->user->get_email();
		$mailer->FromName = $this->user->get_name();
		$mailer->Subject = $conf['app']['title'] . ' ' . translate('Reservation Invitation');
		$mailer->IsHTML(false);

		$url = CmnFns::getScriptURL();

		// Format dates
		$start_date   = Time::formatDate($this->start_date);
		$end_date	  = Time::formatDate($this->end_date);
		$start  = Time::formatTime($this->get_start());
		$end    = Time::formatTime($this->get_end());

		$dates_text = '';
		for ($d = 1; $d < count($dates); $d++) {
			$dates_text .= Time::formatDate($dates) . ",";
		}

		foreach ($userinfo as $memberid => $email) {
			$accept_url = $url . "/manage_invites.php?id={$this->id}&memberid=$memberid&accept_code=$accept_code&action=" . INVITE_ACCEPT;
			$decline_url= $url . "/manage_invites.php?id={$this->id}&memberid=$memberid&accept_code=$accept_code&action=" . INVITE_DECLINE;

			$mailer->ClearAllRecipients();
			$mailer->AddAddress($email);
			// $mailer->AddAddress('post@larka.nl', 'test webmaster');
			$mailer->AddAddress($adminemail, $adminemail); // ccmail
			$mailer->Body = translate_email('reservation_invite', $this->user->get_name(), $this->resource->properties['name'], $start_date, $start, $end_date, $end, $this->summary, $dates_text, $accept_url, $decline_url, $conf['app']['title'], $url);
			$mailer->Send();
		}
	}

	/**
	* Send an email informing the users they have been dropped from the reservation
	* @param array $emails array of email addresses
	* @param array $dates that have been dropped
	*/
	function remove_users_email($emails, $dates) {
		global $conf;
		$mailer = new PHPMailer();

		$mailer->From = $this->user->get_email();
		$mailer->FromName = $this->user->get_name();
		$mailer->Subject = $conf['app']['title'] . ' ' . translate('Reservation Participation Change');
		$mailer->IsHTML(false);

		$url        = CmnFns::getScriptURL();

		// Format dates
		$start_date   = Time::formatDate($this->start_date);
		$end_date	  = Time::formatDate($this->end_date);
		$start  = Time::formatTime($this->get_start());
		$end    = Time::formatTime($this->get_end());

		$dates_text = '';
		for ($d = 1; $d < count($dates); $d++)
			$dates_text .= Time::formatDate($dates) . ",";

		foreach ($emails as $email) {
			$mailer->ClearAllRecipients();
			$mailer->AddAddress($email);
			// $mailer->AddAddress('post@larka.nl', 'test webmaster');
			$mailer->AddAddress($adminemail, $adminemail); // ccmail
			$mailer->Body = translate_email('reservation_removal', $this->resource->properties['name'], $start_date, $start, $end_date, $end, $this->summary, $dates_text);
			$mailer->Send();
		}
	}

	/**
	* This function updates a users reservation status
	* This can accept/decline a reservation for a user
	* @param string $memberid id of the member to change the status for
	* @param string $action action code to perform
	* @param bool $update_all if this action applies to all reservations in the group
	* @param int $max_participants the maximum number of participants for this reservation
	*/
	function update_users($memberid, $action, $update_all, $max_participants = 0) {
		$failed = array();
		switch ($action) {
			case INVITE_ACCEPT :
				$failed = $this->db->confirm_user($memberid, $this->id, $this->parentid, $update_all, $max_participants);
				break;
			case INVITE_DECLINE :
				$this->db->remove_user($memberid, $this->id, $this->parentid, $update_all);
				break;
			default :
				return false;
				//break;
		}
		return $failed;
	}

	/**
	* Adds a user to a reservation as a participant
	* @param string $memberid id of the user to add
	* @param string $resid id of the reservation this user is being added to
	* @param string $accept_code accept code for the user to be able to participate
	*/
	function add_participant($memberid, $accept_code) {
		$this->db->add_participant($memberid, $this->id, $accept_code);
	}

	/**
	* Returns the type of this reservation
	* @param none
	* @return string the 1 char reservation type
	*/
	function get_type() {
		return $this->type;
	}

	/**
	* Returns the ID of this reservation
	* @param none
	* @return string this reservations id
	*/
	function get_id() {
		return $this->id;
	}

	/**
	* Returns the start time of this reservation
	* @param none
	* @return int start time (in minutes)
	*/
	function get_start() {
		return $this->start;
	}

	/**
	* Returns the end time of this reservation
	* @param none
	* @return int ending time (in minutes)
	*/
	function get_end() {
		return $this->end;
	}

	/**
	* Returns the timestamp for this reservation's date
	* @param none
	* @return int reservation timestamp
	*/
	function get_date() {
		return $this->start_date;
	}

	/**
	* Returns the created timestamp of this reservation
	* @param none
	* @return int created timestamp
	*/
	function get_created() {
		return $this->created;
	}

	/**
	* Returns the modified timestamp of this reservation
	* @param none
	* @return int modified timestamp
	*/
	function get_modified() {
		return $this->modified;
	}

	/**
	* Returns the resource id of this reservation
	* @param none
	* @return string resource id
	*/
	function get_machid() {
		return $this->resource->get_property('machid');
	}

	/**
	* Returns the uitleennivo of this reservation
	* @param none
	* @return string resource id
	*/
	function get_uitleennivo() {
		return $this->resource->get_property('uitleennivo');
	}

	/**
	* Returns the uitleennivo of this reservation
	* @param none
	* @return string resource id
	*/
	function get_uitleenperiode() {
		return $this->resource->get_property('uitleenperiode');
	}

	
    /**
	* Returns the resource id of this reservation
	* @param none
	* @return string resource id
	*/
	function get_pending() {
		return intval($this->is_pending);
	}

	/**
	* Returns the member id of this reservation
	* @param none
	* @return string memberid
	*/
	function get_memberid() {
		return $this->user->get_id();
	}

	/**
	* Returns the User object for this reservation
	* @param none
	* @return User object for this reservation
	*/
	function &get_user() {
		return $this->user;
	}

	/**
	* Returns the id of the parent reservation
	* This will only be set if this is a recurring reservation
	*  and is not the first of the set
	* @param none
	* @return string parentid
	*/
	function get_parentid() {
		return $this->parentid;
	}

	/**
	* Returns the summary for this reservation
	* @param none
	* @return string summary
	*/
	function get_summary() {
		return $this->summary;
	}

	/**
	* Returns the scheduleid for this reservation
	* @param none
	* @return string scheduleid
	*/
	function get_scheduleid() {
		return $this->scheduleid;
	}

	/**
	* Returns this reservations start date
	* @param none
	* @return int timestamp for this reservations start date
	*/
	function get_start_date() {
		return $this->start_date;
	}

	/**
	* Returns this reservations end date
	* @param none
	* @return int timestamp for this reservations end date
	*/
	function get_end_date() {
		return $this->end_date;
	}

	/**
	 * @param none
	 * @return if participation is allowed for this reservation
	 */
	function get_allow_participation() {
		return $this->allow_participation;
	}
		/**
		* Janr get name of the schedule from configPrint out the header of the schedule
		* @param string $emailadres = $_SESSION[sessionAdmin], identifier for the schedule
		*/
		function get_schedule_address($emailadres) {
			global $conf;
			return $conf[$emailadres]['adres'];
			}
	/**
	 * @param none
	 * @return if anonymous participation is allowed for this reservation
	 */
	function get_allow_anon_participation() {
		return $this->allow_anon_participation;
	}

	/**
	 * janr added this	
	 * @param none
	 * @return if checkout_via (uitgifte via loge) is allowed for this reservation
	 */
	function get_checkout_via() {
		return $this->checkout_via;
	}

	/**
	 * janr added this	
	 * @param none
	 * @return if checkin_via (inname via loge) is allowed for this reservation
	 */
	function get_checkin_via() {
		return $this->checkin_via;
	}

	/**
	 * janr added this	
	 * @param none
	 * @return status van deze reservering
	 */
	function get_reservation_status() {
		return $this->reservation_status;
	}
	/**
	 * janr added this	
	 * @param none
	 * @return status van deze reservering
	 */
	function get_contractsoort() {
		return $this->contractsoort;
	}
	/**
	 * janr added this	
	 * @param none
	 * @return status van deze reservering
	 */
	function get_clusterid() {
		return $this->clusterid;
	}

	/**
	* Returns if this reservation is repeating or not
	* @param none
	* @return bool if this is a repeating reservation
	*/
	function is_repeat() {
		return ($this->parentid != null);
	}

		function setNewEndDate () {
			// begin standaarcode van check-reservation-status
						if ($this->reservation_status == 2 || $this->reservation_status == 3) {
						
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

							$oldresdate=$this->end_date;
							$oldrestime=$this->end;
					/// te vroeg binnen, einddatum ligt in de toekomst,
					/// data aanpassen naar nu
							while ($this->end_date > $dag_nu)  {
							$this->end_date = $this->end_date - $dag_verschil; // 1 dag terug 
							}
							
							if ($this->end_date == $dag_nu ) {
								while ($this->end > $time_nu) {
									$this->end = $this->end - $uur_verschil; // 1 uur terug
								}
							}
								///
							// EINDTIJD MAG NIET VROEGER DAN BEGINTIJD
						// check de nieuwe eindtijd: 
						
							if ($this->start_date==$this->end_date && $this->end <= $this->start) {
											$this->end = $this->start+60; // force 1 hour up.
							}

							if ($this->start_date > $this->end_date) {
											$this->end_date = $oldresdate; // RESTORE, do not update timings; ***todo: alert begintijd groter dan nieuwe eindtijd, artikel niet vrijgegeven
											$this->end = $oldrestime;
							}			
						}
						// klaar met data aanpassen naar nu
			return ($this->end_date);
		// eind standaarcode van check-reservation-status
		}


		function setNewEndTime () {
			// begin standaarcode van check-reservation-status
						if ($this->reservation_status == 2 || $this->reservation_status == 3) {
						
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

							$oldresdate=$this->end_date;
							$oldrestime=$this->end;
					/// te vroeg binnen, einddatum ligt in de toekomst,
					/// data aanpassen naar nu
							while ($this->end_date > $dag_nu)  {
							$this->end_date = $this->end_date - $dag_verschil; // 1 dag terug 
							}
							
							if ($this->end_date == $dag_nu ) {
								while ($this->end > $time_nu) {
									$this->end = $this->end - $uur_verschil; // 1 uur terug
								}
							}
								///
							// EINDTIJD MAG NIET VROEGER DAN BEGINTIJD
						// check de nieuwe eindtijd: 
						
							if ($this->start_date==$this->end_date && $this->end <= $this->start) {
											$this->end = $this->start+60; // force 1 hour up.
							}

							if ($this->start_date > $this->end_date) {
											$this->end_date = $oldresdate; // RESTORE, do not update timings; ***todo: alert begintijd groter dan nieuwe eindtijd, artikel niet vrijgegeven
											$this->end = $oldrestime;
							}			
						}
						// klaar met data aanpassen naar nu
			return ($this->end_date);
		// eind standaarcode van check-reservation-status
		}
		
	
	
	/**
	* Whether there were errors processing this reservation or not
	* @param none
	* @return if there were errors or not processing this reservation
	*/
	function has_errors() {
		return count($this->errors) > 0;
	}

	/**
	* Add an error message to the array of errors
	* @param string $msg message to add
	*/
	function add_error($msg) {
		array_push($this->errors, $msg);
	}

	/**
	* Return the last error message generated
	* @param none
	* @return the last error message
	*/
	function get_last_error() {
		if ($this->has_errors())
			return $this->errors[count($this->errors)-1];
		else
			return null;
	}

	/**
	* Prints out all the error messages in an error box
	* @param boolean $kill whether to kill the app after printing messages  // vervallen
	*/
	function print_all_errors($kill) {
		$msg='';
		if ($this->has_errors()) {
			/*$div = '<hr size="1"/>';
			CmnFns::do_error_box(
				'<a class="button" href="javascript: history.back();">' . translate('Please go back and correct any errors.') . '</a><br /><br />' . join($div, $this->errors) . '<br /><br />'
				, 'width: 90%;'
				, $kill);
			*/	
			if ($kill) {
				$msg = implode("; ",$this->errors).' - code 101';
				}
			else $msg = implode("; ",$this->errors);
			echo '<script language="JavaScript" type="text/javascript">' . "\n"
				. "if (jQuery('#checkDiv',window.parent.document).size())"
				. "jQuery('#checkDiv',window.parent.document).html('<img src=\"img/x.gif\" alt=\"not ok\" align=\"left\"/><div class=\"messageNegative\">$msg</div>').show();\n"
				. "else alert('$msg');". "\n"
				. '</script>';
			 if ($kill) {	
				//go_dead();
				// overschrijf het scherm, wat er staat is niet meer valid
				// $div = '<hr size="1"/>';
				// CmnFns::do_error_box(
				//   '<a class="button" href="javascript: history.back();">' . translate('Please go back and correct any errors.') . ' - code 102</a><br /><br />' . join($div, $this->errors) . '<br //   /><br />'
				//   , 'width: 90%;');
	
				//die('...this pages has ended.1');
				//exit();
				//$this->print_all_errors(true);
			}
		}
	}

	/**
	* Sets the reservation type
	* @param string type to set the reservation to
	*/
	function set_type($type) {
		$this->type = isset($type) ? substr($type, 0, 1) : null;
	}
}
?>