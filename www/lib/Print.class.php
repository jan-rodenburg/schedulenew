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
	
require_once($basedir . '/lib/db/ResDB.class.php');
require_once($basedir . '/lib/User.class.php');
require_once($basedir . '/lib/Resource.class.php');
//require_once($basedir . '/lib/PHPMailer.class.php');
require_once($basedir . '/lib/Reminder.class.php'); // kan eigenlijk weg
require_once($basedir . '/templates/print.template.php');

include_once('lang/en_GB.lang.php');  // push uk als taal voor printcontract


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
		$janruser = $res['user']; // user die reserverveerd los van invitations
		
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

		
		// janr te laat
		// $toolate=$this->res_to_late() ; // is lening te laat teruggebracht?

		
	}

	/** janr te laat
	*** funktie vervallen! te laat hoeft niet naar papier
	* check if this reservation is TOO LATE
	* @param boolean $TELAAT whether TOO LATE STUFF BROUGHT BACK
	*/
		
	function resxxx_to_late() 
	{
		$nowtime = Time::getAdjustedTime(mktime()); 	// serverdate and time unix
				//	print ('nowtime UNIX: '.$nowtime.'<br>');	
				//	print ('nowtime FORMAT: ' .Time::formatDateTime($nowtime) . '<br />'); //NOW datum en tijd formatted
		$enddateDB = $this->end_date + 60 * $this->end;
				//	print ('DBvalue datumtijd: ' .Time::formatDateTime($enddateDB) . '<br />'); //NOW datum en tijd formatted					
				// print ('this->end_date: '.$this->end_date.'<br>');
				//	print ('this->end: '.$this->end.'<br>');
				// print ('$enddateDB: '.$enddateDB.'<br>');
		$toolate=false;
		if ( ($enddateDB < $nowtime) && ($this->reservation_status < 2))
			{ 	$toolate=TRUE;
			}
		return $toolate;
	}
		
	

	/**
	* Prints out the reservation table
	* @param none
	*/
	function print_res() {
		global $conf;

		$is_private = $conf['app']['privacyMode'] && !$this->adminMode;

		//$day_has_passed = !$this->check_startdate();

		if (!$this->adminMode && !$this->is_blackout && $day_has_passed )  {
			$this->type = RES_TYPE_VIEW;///
		}

		if (Auth::getCurrentID() != $this->user->get_id() && !$this->adminMode) { $this->type = RES_TYPE_VIEW; };

		$rs = $this->resource->properties;
		if ($this->type == RES_TYPE_ADD && $rs['approval'] == 1 && !Auth::IsAdmin()) {
			$this->is_pending = true;		// On the initial add, make sure that the is_pending flag is correct
		}
		$is_owner = (($this->user->get_id() == Auth::getCurrentID() || $this->adminMode) && $this->type != RES_TYPE_VIEW);

		$this->type = RES_TYPE_PRINT;
		
		if (Auth::IsAdmin()){
			print_header ($_SESSION[sessionAdmin]);
			print_header ($_SESSION['en_GB']);
		}
		print_title($this->id, $this->user->get_fname(), $this->user->get_lname() ); 
		// Print created/modified times (if applicable)
		if (!empty($this->id)) {			
			print_create_modify($this->created, $this->modified);
		}
			
	if (!$res->is_blackout && !$is_private) {
			
			print_user_info($this->type, $this->user);	// user
		}
		//begin_container();

		if (empty($this->start)) {
			$this->start = $this->sched['daystart'];
			$this->end = $this->start + $this->sched['timespan'];
		}
		
	//	$toolate=$this->res_to_late() ; // is lening te laat teruggebracht?  // janr te laat
		
		
		// haal alle res met deze clusterid // clusterdataxxx
			if ( $this->clusterid <> null ) {				
				
				$clusters = $this->db->get_reservation_clusterdata($this->clusterid);
				
				}

		// Contains resource/user info, time select, summary, repeat boxes						
		print_basic_panel($this, $rs, $is_private && !$is_owner, $toolate, $clusters);		// clusterdataXX

		
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
	* @param boolean $kill whether to kill the app after printing messages
	*/
	function print_all_errors($kill) {
		if ($this->has_errors()) {
			$div = '<hr size="1"/>';
			CmnFns::do_error_box(
				'<a class="button" href="javascript: history.back();">' . translate('Please go back and correct any errors.') . '</a><br /><br />' . join($div, $this->errors) . '<br /><br /><a class="button" href="javascript: history.back();">' . translate('Please go back and correct any errors.') . '</a>'
				, 'width: 90%;'
				, $kill);
			}
	}
/**
	* Returns the type of this reservation
	* @param none
	* @return string the 1 char reservation type
	*/
	function get_type() {
		return RES_TYPE_PRINT;
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