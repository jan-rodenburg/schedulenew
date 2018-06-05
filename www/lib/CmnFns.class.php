<?php
/**
* This contains functions common to most pages
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 04-19-06
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/..';

require_once($basedir . '/config/config.php');
require_once($basedir . '/config/configdata.php');

if (isset($_SERVER['HTTP_HOST'])) {
	require_once($basedir . '/config/init.php');
}
else {
	require_once($basedir . '/config/cmdinit.php');
}
require_once($basedir . '/lib/Link.class.php');
require_once($basedir . '/lib/Pager.class.php');
require_once($basedir . '/lib/Timer.class.php');
require_once($basedir . '/lib/Time.class.php');

/**
* Provides functions common to most pages
* ook janrdebug functies
*/
class CmnFns {	
		
	/** janrdebug
	* Prints out a box with inlog status this user message
	* @param string $msg message to print out

	*/
	/*
	function print_test_area_oud($a,$li,$sa) {
	if  ($a)	$atxt = ' = JA';	else	$atxt = ' = NEE';
	if 	($li)	$litxt = ' = JA';	else	$litxt = ' = NEE';
	if 	($sa)	$satxt = ' = JA';	else	$satxt = ' = NEE';	
						//$nowtime = Time::getAdjustedTime(mktime());
						$nowtime = mktime();
						$time1 =  Time::getAdjustedMinutes($nowtime);	
						// $time2    = Time::formatTime($this->get_end());
						$gmtimenow = time() - (int)substr(date('O'),0,3)*60*60; 
						$gmtimenow1 = Time::getAdjustedMinutes($gmtimenow);
						$time3=gettimeofday();
						// time4=$time3 / 60;
		echo '<div style="position:absolute; top:0px;left:800px;width:300px;"><table border="0" cellspacing="0" cellpadding="0" align="center" class="message" style=""><tr>
		<td>status box</td></tr>
		<tr><td>admin: ' . $atxt . '</td></tr>
		<tr><td>is logged in: ' . $litxt . '</td></tr>
		<tr><td>schedule admin: ' . $satxt . '</td></tr>
		<tr><td>sessionAdmin: ' . $_SESSION['sessionAdmin'] . '</td></tr>
		<tr><td>$_SESSION[\'sessionID\'] ' . $_SESSION['sessionID'] . '</td></tr>	

		<tr><td>time1: ' . $time1 . '</td></tr>
		<tr><td>time2: ' .$gmtimenow1. '</td></tr>
		<tr><td>time3: '.$time3.'</td></tr>
		</table></div>';
	}
*/
		
	/** janrdebug
	* Prints out a box with inlog status this user message
	* @param string $msg message to print out

	*/
	function print_test_area($a,$li,$sa) {
	if  ($a)	$atxt = ' = JA';	else	$atxt = ' = NEE';
	if 	($li)	$litxt = ' = JA';	else	$litxt = ' = NEE';
	if 	($sa)	$satxt = ' = JA';	else	$satxt = ' = NEE';	
						//$nowtime = Time::getAdjustedTime(mktime());
						$nowtime = mktime();
						$time1 =  Time::getAdjustedMinutes($nowtime);	
						// $time2    = Time::formatTime($this->get_end());
						$gmtimenow = time() - (int)substr(date('O'),0,3)*60*60; 
						$gmtimenow1 = Time::getAdjustedMinutes($gmtimenow);
						$time3=gettimeofday();
						// time4=$time3 / 60;
		echo '<div class="message" style="position:absolute; bottom:0px;left:0px;width:100%;border:1px solid #dd006a; text-align:left;position: fixed;">';
		echo '<b>&middot; Je werkt op de <span style="color:#dd006a; ">TEST</span> toepassing met een <span style="color:#dd006a; ">TEST</span> Database. </b> ';
		echo '<b><span style="color:#dd006a; ">&middot; TestAREA: </span></b> ';
		//echo 'admin: ' . $atxt . '<b>&nbsp&middot</b> ';
		//echo 'is logged in: ' . $litxt . '<b>&nbsp&middot</b> ';
		//echo 'schedule admin: ' . $satxt . '<b>&nbsp&middot</b> ';
		//echo 'sessionAdmin: ' . $_SESSION['sessionAdmin'] . '<b>&nbsp&middot</b> ';
		//echo '$_SESSION[\'sessionID\'] ' . $_SESSION['sessionID'] . '<b>&nbsp&middot</b>	 ';
		//echo 'time1: ' . $time1 . '<b>&nbsp&middot</b> ';
		//echo 'time2: ' .$gmtimenow1. '<b>&nbsp&middot</b> ';
		//echo 'time3: '.$time3.'<b>&nbsp&middot</b> ';
			echo "<BR>All cookie data: ";
			print_r($_COOKIE);
			echo "<BR>All sessie data: ";
			print_r($_SESSION);			
		//echo '$_SESSION["sessionsearchstring"]:'.$_SESSION["sessionsearchstring"] . '<b>&nbsp&middot</b>	 ';
		//echo ' $_REQUEST["search"]'.$_REQUEST["search"]. '<b>&nbsp&middot</b>	 ';
		echo '</div><div style="clear:both"> </div>';
	}
	

	
	
/** janrdebug
	* Prints out a box with inlog status this user message
	* @param string $msg message to print out

	*/
	function print_test_area2($string) {
	
		echo '<div class="message" style="position:absolute; top:0px;left:0px;width:100%;border-bottom:1px solid black; text-align:left;">webmaster test box: 
		' . $string . ' end</div>';
	}
	
	/**
	* Prints an error message box and kills the app
	* @param string $msg error message to print
	* @param string $style inline CSS style definition to apply to box
	* @param boolean $die whether to kill the app or not
	*/
	function do_error_box($msg, $style='', $die = true) {
		global $conf;
		
		echo '<table border="0" cellspacing="0" cellpadding="0" align="center" class="alert" style="' . $style . '"><tr><td>' . $msg . '</td></tr></table>';

		if ($die) {
			echo '</td></tr></table>';		// endMain() in Template
			// echo '<p align="center"><a href="http://phpscheduleit.sourceforge.net">phpScheduleIt v' . $conf['app']['version'] . '</a></p></body></html>';	
			echo '</body></html>';
		 	die();
		}
	}


/**
* Prints out the links to select last names
* @param $resid,
* @param $clusterid
* return $userstatustxt

janr todo: deze routine ook zetten:
					$color = CmnFns::random_hexcolor();
					$colorblock[$cur['clusterid']] = 'style="border-right:5px solid '.$color.';"';
*/
function get_cluster_status ($resid, $clusterid){	
	global $conf;
	$clusterstatustxt = '';
		$clusterstatus=0;
		
		if ($clusterid == null) {
			$clusterstatus=0; // not cluster
		} else {
			if ($clusterid == $resid) {
				$clusterstatus=1; // clustermaster
				}
			if ($clusterid <> $resid) {
				$clusterstatus=2; // clusterslave
				}
			}
			// additional text
			// 0 reservation for one resource - autonoom
			// 1 reservation multiple resources - master
			// 2 reservation multiple resources - slave
			// $clusterstatustxt = $conf['clusterstatus'][$clusterstatus];
	return $clusterstatus;
}	
/**
* Prints out the links to select last names
* @param $osiris_ok_now,
* @param $demerit_punt
* return $userstatustxt
*/
function validate_user ($osiris_ok_now, $demerit_punt){	
	global $conf;
	$userstatustxt = '';
	
	if ($demerit_punt == 1) 	$userstatustxt = $conf['userstatus']['1'];
	if ($demerit_punt == 2) 	$userstatustxt = $conf['userstatus']['2'];
	if ($demerit_punt == 3) 	$userstatustxt = $conf['userstatus']['3'];
	if ($demerit_punt > 3) 		$userstatustxt = $conf['userstatus']['99'];
	if (($osiris_ok_now == '0') ) 	$userstatustxt = $conf['userstatus']['100']; 
	// $userstatustxt = $demerit_punt." ".$osiris_ok_now." ".$userstatustxt; // testonly
	return $userstatustxt;
}

	/**
	* Return the current script URL directory
	* @param none
	* @return url url of curent script directory
	*/
	function getScriptURL() {
		global $conf;
		$uri = $conf['app']['weburi'];
		return (strrpos($uri, '/') === false) ? $uri : substr($uri, 0, strlen($uri));
	}

	//janr
// make string into a link
function makelink ($string, $ellipse=false) {
	if ($ellipse) {
		$stringout= '<a href= "'.$string.'" target="_new" title='.$string.'><span style="text-overflow:ellipsis">'.basename($string).'</span></a>';
	}else{
		$stringout= '<a href= "'.$string.'" target="_new" title='.$string.'>'.$string.'</a>';
	}
	return $stringout;
}

	
	/**
	* Prints out a box with notification message
	* @param string $msg message to print out
	* @param string $style inline CSS style definition to apply to box
	*/
	function do_message_box($msg, $style='') {
		echo '<table border="0" cellspacing="0" cellpadding="0" align="center" class="message" style="' . $style . '"><tr><td>' . $msg . '</td></tr></table>';
	}
	
	/**
	* Returns a reference to a new Link object
	* Used to make HTML links
	* @param none
	* @return Link object
	*/
	function getNewLink() {
		return new Link();
	}
	
	/**
	* Returns a reference to a new Pager object
	* Used to iterate over limited recordesets
	* @param none
	* @return Pager object
	*/
	function getNewPager() {
		return new Pager();
	}
	
	/**
	* Strip out slahses from POST values
	* @param none
	* @return array of cleaned up POST values
	*/
	function cleanPostVals() {
		$return = array();
		
		foreach ($_POST as $key => $val)
			$return[$key] = stripslashes(trim($val));
		
		return $return;
	}
	
	/**
	* Strip out slahses from an array of data
	* @param none
	* @return array of cleaned up data
	*/
	function cleanVals($data) {
		$return = array();
		
		foreach ($data as $key => $val)
			$return[$key] = stripslashes($val);
		
		return $return;
	}
	
	/**
	* Verifies vertical order and returns value
	* @param string $vert value of vertical order
	* @return string vertical order
	*/
	function get_vert_order($get_name = 'vert') {
		// If no vertical value is specified, use ASC
		$vert = isset($_GET[$get_name]) ? $_GET[$get_name] : 'ASC';
	    
		// Validate vert value, default to DESC if invalid
		switch($vert) {
			case 'DESC';
			case 'ASC';
			break;
			default :
				$vert = 'DESC';
			break;
		}
		
		return $vert;
	}
	
	/**
	* Verifies and returns the order to list recordset results by
	* If none of the values are valid, it will return the 1st element in the array
	* @param array $orders all valid order names
	* @return string order of recorset
	*/
	function get_value_order($orders = array(), $get_name = 'order') {
		if (empty($orders))		// Return null if the order array is empty
			return NULL;
			
		// Set default order value
		// If a value is specifed in GET, use that.  Else use the first element in the array
		$order = isset($_GET[$get_name]) ? $_GET[$get_name] : $orders[0];
		
		if (in_array($order, $orders))
			$order = $order;
		else
			$order = $orders[0];
	
		return $order;
	}
	
	
	/**
	* Opposite of php's nl2br function.
	* Subs in a newline for all brs
	* @param string $subject line to make subs on
	* @return reformatted line
	*/
	function br2nl($subject) {
		return str_replace('<br />', "\n", $subject);
	}
	
	/**
	* Writes a log string to the log file specified in config.php
	* @param string $string log entry to write to file
	* @param string $userid memeber id of user performing the action
	* @param string $ip ip address of user performing the action
	*/
	function write_log($string, $userid = NULL, $ip = NULL) {
		global $conf;
		$delim = "\t";
		$file = $conf['app']['logfile'];
		$values = '';

		if (!$conf['app']['use_log'])	// Return if we aren't going to log
			return;
		
		if (empty($ip))
			$ip = $_SERVER['REMOTE_ADDR'];
		
		clearstatcache();				// Clear cached results
		
		if (!is_dir(dirname($file)))
			mkdir(dirname($file), 0777);		// Create the directory
		
		if (!touch($file))
			return;					// Return if we cant touch the file
			
		if (!$fp = fopen($file, 'a'))
			return;					// Return if the fopen fails
		
		flock($fp, LOCK_EX);		// Lock file for writing
		if (!fwrite($fp, '[' . date('D, d M Y H:i:s') . ']' . $delim . $string . $delim . $userid . $delim . $ip . "\r\n"))	// Write log entry
        	return;					// Return if we cant write to the file
		flock($fp, LOCK_UN);		// Unlock file
		fclose($fp);
	}
	
	/**
	* Returns the day name
	* @param int $day_of_week day of the week
	* @param int $type how to return the day name (0 = full, 1 = one letter, 2 = two letter, 3 = three letter)
	*/
	function get_day_name($day_of_week, $type = 0) {
		global $days_full;
		global $days_abbr;
		global $days_letter;
		global $days_two;

		$names = array (
			$days_full, $days_letter, $days_two, $days_letter
			);
		
		return $names[$type][$day_of_week];
	}

	/**
	* Redirects a user to a new location
	* @param string $location new http location
	* @param int $time time in seconds to wait before redirect
	*/ 
	function redirect($location, $time = 0, $die = true) {
		header("Refresh: $time; URL=$location");
		if ($die) exit;
	}
	
	/**
	* Prints out the HTML to choose a language
	* @param none
	*/
	function print_language_pulldown() {
		global $conf;
		?>
		<select name="language" class="textbox" onchange="changeLanguage(this);">
		<?php
			$languages = get_language_list();
			foreach ($languages as $lang => $settings) {
				echo '<option value="' . $lang . '"'
					. ((determine_language() == $lang) ? ' selected="selected"' : '' )
					. '>' . $settings[3] . ($lang == $conf['app']['defaultLanguage'] ? ' ' . translate('(Default)') : '') . "</option>\n";
			}
		?>
		</select>
		<?php
	}
	
	/**
	* Searches the input string and creates links out of any properly formatted 'URL-like' text
	* Written by Fredrik Kristiansen (russlndr at online.no)
	* and Albrecht Guenther (ag at phprojekt.de).
	* @param string $str string to search for links to create
	* @return string with 'URL-like' text changed into clickable links
	
	for php 321 : http://stackoverflow.com/questions/2084881/alternative-for-deprecated-php-function-eregi-replace
	i use ~ or \ for delimiter
	*/
	function html_activate_links($str) {
		$str = preg_replace('~(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.#?&//=]+)~i', '<a href="\1" target="_blank">\1</a>', $str);
		$str = preg_replace('~([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.#?&//=]+)~i', '\1<a href="http://\2" target="_blank">\2</a>', $str);
		$str = preg_replace('~([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})~i','<a href="mailto:\1">\1</a>', $str);
		return $str;
	} 
	/** janr
	* return random number between 0 en $i
	*
	*/
	function random_number($i){
//mt_srand((double)microtime()*1000000);
		$c = 0;
		$c = mt_rand(0, $i);
		return $c;
	}	
	function random_hexcolor(){
		$r = dechex(mt_rand(0,255)); // generate the red component
		$g = dechex(mt_rand(0,255)); // generate the green component
		$b = dechex(mt_rand(0,255)); // generate the blue component
		$rgb = $r.$g.$b;
		if($r >= 'aa' && $g >= 'bb' && $b >= 'aa' ){ // te dicht bij wit, onzichtbaar
			$b ='60';
			// $rgb = substr($rgb,0,3); // shorter version
		}
		return '#'.$rgb;
	}
	/** janr
	* return random hex color
	* 
	*/
		function random_color(){
		mt_srand((double)microtime()*1000000);
		$c = '';
		while(strlen($c)<6){
			$c .= sprintf("%02X", mt_rand(0, 255));
		}
		return $c;
	}
	/**
	* Returns an array of all timestamps for repeat reservations
	* @param string $initial_ts timestamp of first reservation
	* @param string $interval interval of reservation recurrances
	* @param array $days days of week to repeat on
	* @param string $until final date of recurrance
	* @param int $frequency frequency of interval
	* @param string $week_number week of month number (for reserve by day of month)
	* @return array of all timestamps that the reservation is repeated on
	*/
	function get_repeat_dates($initial_ts, $interval, $days, $until, $frequency, $week_number) {
		$res_dates = array();
		$initial_date = getdate($initial_ts);
		
		list($last_m, $last_d, $last_y) = explode('/', $until);
		$last_ts = mktime(0,0,0,$last_m, $last_d, $last_y);
		$last_date = getdate($last_ts);
		
		$day_of_week = $initial_date['wday'];
		$day_of_month = $initial_date['mday'];
		
		$ts = $initial_ts;
		
		if ($initial_ts > $last_ts)		// Recurring date is in the past
			return array($ts);
		
		switch ($interval) {
			case 'day' :
				for ($i = $frequency; $ts <= $last_ts; $i += $frequency) {
					$res_dates[] = $ts;
					$ts = mktime(0,0,0, $initial_date['mon'], $i + $initial_date['mday'], $initial_date['year']);						
				}
			break;
			case 'week' :
				$additional_days = 0;
				$res_dates[] = $ts;		// Add initial reservation
				
				while ($ts <= $last_ts) {		
					for ($i = 0; $i < count($days); $i++) {					// Repeat for all days selected
						$days_between = ($days[$i] - $day_of_week) + $additional_days;
						// If the day of week is less than reservation day of week, move ahead one week
						if ($days[$i] <= $day_of_week) {
							$days_between += $frequency * 7;
						}
						$ts = mktime(0,0,0,$initial_date['mon'], $initial_date['mday'] + $days_between, $initial_date['year']);
						
						if ($ts <= $last_ts)
							$res_dates[] = $ts;
					}
					$additional_days += $frequency * 7;	// Move ahead week
				}
			break;
			case 'month_date' :
				$next_month = $initial_date['mon'];
				$res_dates[] = $ts;			// Add initial reservation
				
				while ($ts <= $last_ts) {			
					$next_month += $frequency;
					if (date('t',mktime(0,0,0, $next_month, 1, $initial_date['year'])) >= $initial_date['mday']) {		// Make sure month has enough days
						$ts = mktime(0,0,0,$next_month, $initial_date['mday'], $initial_date['year']);
						if ($ts <= $last_ts)
							$res_dates[] = $ts;
					}
				}
			break;
			case 'month_day' :
				$res_dates[] = $ts;		// Add initial reservation
			
				$days_in_month = date('t', mktime(0,0,0, $initial_date['mon'], $initial_date['mday'], $initial_date['year']));
				$next_month = $initial_date['mon'];
				
				// Fill in all months			
				while ($ts <= $last_ts) {
					
					$days_in_month = date('t', mktime(0,0,0, $next_month, 1, $initial_date['year']));
					$first_day_of_month = date('w', mktime(0,0,0, $next_month, 1, $initial_date['year']));
					$last_day_of_month = date('w', mktime(0,0,0, $next_month, $days_in_month, $initial_date['year']));	
				
					if ($week_number != 'last') {
						$offset_date = ($week_number - 1) * 7 + 1; 		// Starting date
						$day_of_week = $first_day_of_month;				// Day of week
					}
					else {
						$offset_date = $days_in_month - 6;
						$day_of_week = $last_day_of_month + 1;
					}
					
					// Repeat on chosen days for this week
					for ($i = 0; $i < count($days); $i++) {					// Repeat for all days selected
						$days_between = ($days[$i] - $day_of_week);
						
						// If the day of week is less than reservation day of week, move ahead one week
						if ($days[$i] < $day_of_week) {
							$days_between += 7;
						}
						
						$current_date = $offset_date + $days_between;
						
						$need_to_add = ( ($current_date <= $days_in_month) && ($next_month > $initial_date['mon'] || ($current_date >= $initial_date['mday'] && $next_month >= $initial_date['mon'])) );
						
						if ($need_to_add)
							$ts = mktime(0,0,0, $next_month, $current_date, $initial_date['year']);
						
						if ( $ts <= $last_ts && $need_to_add && $ts != $initial_ts)// && ($current_date <= $days_in_month) && ($current_date >= $initial_date['mday'] && $next_month >= $initial_date['mon']) )
							$res_dates[] = $ts;
					}
						
					$next_month += $frequency;
				}	
			break;
		}
		return $res_dates;
	}
}
?>
