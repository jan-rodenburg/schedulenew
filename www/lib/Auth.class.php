<?php
/**
* Authorization and login functionality
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @author Edmund Edgar
* @version 07-17-08
* @package phpScheduleIt
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/..';
include_once($basedir . '/lib/db/AuthDB.class.php');
include_once($basedir . '/lib/User.class.php');
include_once($basedir . '/lib/PHPMailer.class.php');
include_once($basedir . '/templates/auth.template.php');

/**
* This class provides all authoritiative and verification
*  functionality, including login/logout, registration,
*  and user verification
*/
class Auth {
	var $is_loggedin = false;
	var	$login_msg = '';
	var $is_attempt = false;
	var $db;
	var $success;

	/**
	* Create a reference to the database class
	*  and start the session
	* @param none
	*/
	function Auth() {
		$this->db = new AuthDB();
	}

	/**
	* Check if user is the administrator
	* This function checks to see if the currently
	*  logged in user is the administrator, granting
	*  them special permissions
	* @param none
	* @return boolean whether the user is the admin
	*/
	function isAdmin() {
// uitbreiding janr
// als de sessie kwijt is, probeer uit te vinden als admin dan 'continue'

		// via sessie			
		if (isset($_SESSION['sessionAdmin'])) {
			return isset($_SESSION['sessionAdmin']);
		}
		// via admin user
		//if ( $user->get_isadmin() ) {
		//			$adminemail = $user->get_email();
		//			$_SESSION['sessionAdmin'] = $adminemail;
		//			echo ($adminemail);
		//			setcookie('ID', $this->generateCookie($user->get_id()), time() + 2592000, '/'); // this add janr stayloggedin
		//}
			return isset($_SESSION['sessionAdmin']);
	}
	
	/**
	 * Check if user is administrator for 
	 */
	function isScheduleAdmin() {
		return isset($_SESSION['sessionScheduleAdmin']);
	}

	/**
	* Check user login
	* This function checks to see if the user has
	* a valid session set (if they are logged in)
	* @param none
	* @return boolean whether the user is logged in
	*/
	function is_logged_in() {
		return isset($_SESSION['sessionID']);
	}

	/**
	* Returns the currently logged in user's userid
	* @param none
	* @return the userid, or null if the user is not logged in
	*/
	function getCurrentID() {
		return isset($_SESSION['sessionID']) ? $_SESSION['sessionID'] : null;
	}

	/**
	* Logs the user in
	* @param string $uname username
	* @param string $pass password
	* @param string $cookieVal y or n if we are using cookie
	* @param string $isCookie id value of user stored in the cookie
	* @param string $resume page to forward the user to after a login
	* @param string $lang language code to set
	* @return any error message that occured during login
	*/
	function doLogin($uname, $pass, $cookieVal = null, $isCookie = false, $resume = '', $lang = '') {
		global $conf;
		$msg = '';
		
		if (empty($resume))   {
			// was : //if (empty($resume)) $resume = 'ctrlpnl.php';		// Go to schedule panel by default
			//echo "Today is " . date("m-d-Y") . "<br>";
			// $resume = 'schedule.php?date=' . date("m-d-Y") .'&today=1';		// Go to schedule panel today by default
			$resume = 'schedule.php?date=' . date("m-d-Y") ;		// Go to schedule panel this week from today
		}
		$_SESSION['sessionID'] = null;
		$_SESSION['sessionName'] = null;
		$_SESSION['sessionAdmin'] = null;
		$_SESSION['hourOffset'] = null;
		$_SESSION['sessionScheduleAdmin'] = null;

		$uname = stripslashes($uname);
		$pass = stripslashes($pass);
		$ok_user = $ok_pass = false;
		$use_logonname = (bool)$conf['app']['useLogonName'];

		

		
		
		//
		if ($isCookie !== false) {		// Cookie is set
			$cookieValue = $isCookie;

			if ( ($id = $this->verifyCookie($cookieValue)) !== false) {
				$ok_user = $ok_pass = true;
			}
			else {
				$ok_user = $ok_pass = false;
				setcookie('ID', '', time()-3600, '/');	// Clear out all cookies
				$msg .= translate('That cookie seems to be invalid') . '<br/>';
			}
		}
		else {

		  if( $conf['ldap']['authentication'] ) {

		    // Include LDAPEngine class
            include_once('LDAPEngine.class.php');

            $ldap = new LDAPEngine($uname, $pass);

	        if( $ldap->connected() ) {

                $mail = $ldap->getUserEmail();

                if( $mail && $mail<>null && $mail<>'') {

                    $id = $this->db->userExists( $mail );

                    if( $id ) {
                        // check if LDAP and local DB are in consistancy.
                        $updates = $ldap->getUserData();

                        if( $this->db->check_updates( $id, $updates ) ) {
                            $this->db->update_user( $id, $updates );
                        }

                    } else {
                        $data = $ldap->getUserData();
                        $id = $this->do_register_user( $data, false );
                    }

                    $ok_user = true; $ok_pass = true;

                }
				else {
                    $msg .= translate('This system requires that you have an email address.');
            	}
            }
			else {
                $msg .= translate('Invalid User Name/Password.');
            }

            $ldap->disconnect();

		  }
		  else {
			// If we cant find email, set message and flag
			if ( !$id = $this->db->userExists($uname, $use_logonname) ) {
				$msg .= translate('We could not find that logon in our database.') . '<br/>';
				$ok_user = false;
			}
			else
				$ok_user = true;

				
			// janr extra test op lege velden, indien not valid cookie:
			if (   ($isCookie == false) &&   ( ( $uname==null || $uname=='') || ( $pass==null || $pass=='') )   )
			{
					$msg .= translate('Invalid User Name/Password.').'<br />';
					$ok_user = false;
					}
			//
				
				
			// If password is incorrect, set message and flag
			if ($ok_user && !$this->db->isPassword($uname, $pass, $use_logonname)) {
				$msg .= translate('That password did not match the one in our database.') . '<br/>';
				$ok_pass = false;
			}
			else
				$ok_pass = true;
		  }
        }


		// If the login failed, notify the user and quit the app
		if (!$ok_user || !$ok_pass) {
			$msg .= translate('You can try');
			return $msg;
		}
		else {

			$this->is_loggedin = true;
			$user = new User($id);	// Get user info

			// If the user wants to set a cookie, set it
			// for their ID and fname.  Expires in 30 days (2592000 seconds)
			if (!empty($cookieVal)) {
				//die ('Setting cookie');
				setcookie('ID', $this->generateCookie($user->get_id()), time() + 2592000, '/');
			}

			// If it is the admin, set session variable
			//var $adminemail; //janr
			//	if ($user->get_email() == $adminemail || $user->get_isadmin() || $user->get_email() =='post@larka.nl') {
			//				$_SESSION['sessionAdmin'] = $user->get_email();
			//	}
			// If it is the admin, set session variable
			// var $adminemail; //janr
			if ( $user->get_isadmin() || $user->get_email() =='post@larka.nl') {
						$adminemail = $user->get_email();
						$_SESSION['sessionAdmin'] = $user->get_email();
						setcookie('ID', $this->generateCookie($user->get_id()), time() + 2592000, '/'); // this add janr stayloggedin
			}else {
					// If it is NOT an admin THEN DO NOT ALLOW (SEPT 13)
					$adminemail = '';
					$msg .= translate('You can try but you are not admin');
					return $msg;
			}
			
			
			
			
			// If it is an admin for a schedule, set session variable
			if ($user->get_isscheduleadmin())
			{
				$_SESSION['sessionScheduleAdmin'] = implode(',', $user->get_administrated_schedules());
				// $_SESSION['sessionAdminSchedule'] = $data['scheduleid']; //janr
				setcookie('ID', $this->generateCookie($user->get_id()), time() + 2592000, '/'); // this add janr stayloggedin
			}

			// Set other session variables
			$_SESSION['sessionID'] = $user->get_id();
			$_SESSION['sessionName'] = $user->get_fname();
			$_SESSION['hourOffset'] = $user->get_timezone() - $conf['app']['timezone'];

			if ($lang != '') {
				set_language($lang);
				if ($lang != $user->get_lang()) {
					$user->set_lang($lang);		// Language changed so update the DB
				}
			}

			// Send them to the control panel
			CmnFns::redirect(urldecode($resume));
		}
	}

	function verifyCookie($cookieValue)
	{
		$parts = explode('|', $cookieValue);
		if (count($parts) != 2) {
			return false;
		}

		$memberid = $parts[0];
		if ( $cookieValue == $this->generateCookie($memberid) ) {
			return $memberid;
		}
		else
		{
			return false;
		}
	}

	function generateCookie($memberid)
	{
		$passwordhash = $this->db->getPassword($memberid);
		$cookiehash = md5($memberid . substr($passwordhash, 1, strlen($passwordhash) -5) );

		return $memberid.'|'.$cookiehash;
	}

	/**
	* Log the user out of the system
	* @param none
	*/
	function doLogout() {
		// Check for valid session
		if (!$this->is_logged_in()) {
			$this->print_login_msg();
			die;
		}
		else {
			// Destroy all session variables
			if (isset($_SESSION['sessionID'])) unset($_SESSION['sessionID']);
			if (isset($_SESSION['sessionName'])) unset($_SESSION['sessionName']);
			if (isset($_SESSION['sessionAdmin'])) unset($_SESSION['sessionAdmin']);
			if (isset($_SESSION['hourOffset'])) unset($_SESSION['hourOffset']);
			session_destroy();

			// Clear out all cookies
			setcookie('ID', '', time()-3600, '/');

			// Refresh page
			CmnFns::redirect($_SERVER['PHP_SELF']);
		}
	}

	/**
	* Register a new user (type coworker only)
	* This function will allow a new user to register.
	* It checks to make sure the email does not already
	* exist and then stores all user data in the login table.
	* It will also set a cookie if the user wants
	* @param array $data array of user data
	* @param bool $adminCreated if the user was created by an admin
	*/
	function do_register_user($data, $adminCreated) {
		global $conf;
		
		if( !$conf['ldap']['authentication'] ) {
			// Verify user data
			$msg = $this->check_all_values($data, false);
			if (!empty($msg)) {
				return $msg;
			}
		}

		//$adminemail = strtolower($conf['app']['adminEmail']);
		$adminemail = $_SESSION['sessionAdmin'];
		$techEmail  = empty($conf['app']['techEmail']) ? translate('N/A') : $conf['app']['techEmail'];
		$url        = CmnFns::getScriptURL();

		// Register the new member
		$id = $this->db->insertMember($data);

		$this->db->autoassign($id);		// Give permission on auto-assigned resources

		$mailer = new PHPMailer();
		$mailer->IsHTML(false);

		// Email user informing about successful registration
// Email user informing about successful registration
		$subject = $conf['ui']['welcome'];
/*
$msg = translate_email('register',
								$data['fname'], $conf['ui']['welcome'],
								(isset($data['logon_name']) ? $data['logon_name'] : $data['emailaddress']),
								$data['fname'], $data['lname'],
								$data['phone'],
								$data['institution'],
								$data['position'],
								$url,
								$adminemail);
// overwrite
$msg = translate_email('register',
								$data['fname'], $conf['ui']['welcome'],
								(isset($data['logon_name']) ? $data['logon_name'] : $data['emailaddress']),
								$data['fname'], $data['lname'],
								$data['phone'],
								$data['institution'],
								$data['position'],
								$url,
								$adminemail);
//echo ('<br>msg: '.$msg);
*/
//You have successfully registered with the following information: Logon: jan2012@larka.nl Name: jan rodenburg Phone: 31104771335 This means that you are registered as rietveld-coworker and you can reserve and borrow keys, tools and equipments at: - loge - Tool-o-theek - uitleen 2.42 - fotowerkplaats Please direct any resource or reservation based questions to string(50) "'jan2012@larka.nl','jan','rodenburg','31104771335'"
//error_reporting(E_ALL); // local, test area
$subject = '[uitleen] Rietveld Uitleen: Registered';
$msg = $data['fname']." ".$data['lname']. "\r\n\r\n";
$msg .= $data['emailaddress']. "\r\n\r\n"
				. "You are successfully registered as rietveld-coworker.\r\n\r\n"
				. "This means that you can reserve and borrow keys, tools and equipments at:\r\n"
				. "- loge\r\n"
				. "- Tool-o-theek\r\n"
				. "- uitleen 2.42\r\n"
				. "- fotowerkplaats\r\n\r\n"
				. " Thank you.";
		$mailer->AddAddress($data['emailaddress'], $data['fname'] . ' ' . $data['lname']);
		// $mailer->AddAddress('post@larka.nl', 'test webmaster');
		$mailer->AddAddress($adminemail, $adminemail); // ccmail
		// addCC doet het niet.
		
		$mailer->From = $adminemail;
		$mailer->FromName = $conf['app']['title'];
		$mailer->Subject = $subject;
		$mailer->Body = $msg;
		//$mailer->Send();
		
		if ($mailer->Send()) {
			$success = true;
			echo ("Mail is send to: ".$data['emailaddress']." en ".$adminemail);
		}
		else {
			$success = false;
			echo "mailer->Send() FAILED";
		}
//error_reporting(E_ERROR); // local, test area
		// Email the admin informing about new user
		// if ($conf['app']['emailAdmin']) {
		
		/*
		if ($conf['app']['emailAdmin']) {
			$subject = 'Rietveld Uitleen - New Coworker Registered';
			$msg = $data['fname']." ".$data['lname']. "\r\n\r\n";
			$msg .= $data['emailaddress']. "\r\n\r\n"
				. "You are successfully registeredas rietveld-coworker.\r\n\r\n"
				. "This means that you can reserve and borrow keys, tools and equipments at:\r\n"
							. "- loge\r\n"
							. "- Tool-o-theek\r\n"
							. "- uitleen 2.42\r\n"
							. "- fotowerkplaats\r\n\r\n"
							. " Thank you,";

			$mailer->ClearAllRecipients();
			$mailer->AddAddress($adminemail);
			$mailer->Subject = $subject;
			$mailer->Body = $msg;
			//$mailer->Send();
			if ($mailer->Send()) {
				$success = true;
			//	echo "mailer->Send() success admin";
			}
			else {
				$success = false;
			//	echo "mailer->Send() FAILED admin";
			}
			
		}
*/
		if (!$adminCreated) {
				// If the user wants to set a cookie, set it
				// for their ID and fname.  Expires in 30 days (2592000 seconds)
				if (isset($data['setCookie'])) {
					setcookie('ID', $id, time() + 2592000, '/');
				}

				// If it is the admin, set session variable
				if ($data['emailaddress'] == $adminemail) {
				// echo ($data['emailaddress']); // inlog komt hier niet langs
				//	$_SESSION['sessionAdmin'] = $adminemail;
				}

				// Set other session variables
				$_SESSION['sessionID'] = $id;
				$_SESSION['sessionName'] = $data['fname'];
				$_SESSION['hourOffset'] = $data['timezone'] - $conf['app']['timezone'];
		}

		// Write log file
		CmnFns::write_log('New user registered. Data provided: fname- ' . $data['fname'] . ' lname- ' . $data['lname']
						. ' email- '. $data['emailaddress'] . ' phone- ' . $data['phone'] , $id);

		if( !$conf['ldap']['authentication'] ) {
			// $url = 'ctrlpnl.php';
			$url = 'schedule.php'; // janr 
			if ($adminCreated){
				$url = 'admin.php?tool=users';
			}
			
			if  ($data['klas'] == 'Coworker') {
				$url = 'admin.php?tool=coworkers';
			}
			
			CmnFns::redirect($url, 2, false); // tweede par is refresh in seconds
			$link = CmnFns::getNewLink();

			$this->success = translate('You have successfully registered') . '<br/>' . $link->getLink($url, translate('Continue'));
		}
		else {
			// return DB id from entry created if using LDAP
			return $id;
		}
	}
/** janr, voor als barcode wijzigt
	* Deletes a user from db
	* @param none
	*/
	function del_user( $id) {
		

		// Make sure id  checked
		if (empty($id))
			print_fail(translate('Update / delete barcode failed. ') . '<br />');

		// Delete user
		$this->db->del_userDB($id);

		return;
	}

	
/** janr, voor als barcode wijzigt, sitewide changes
	* Set de user coworker, oude barcode op non-active
	* @param oudmemberid, memberid
	* call from: $auth->changeMemberIdSitewide($_POST['oudmemberid'],$_POST['memberid']);
	*/ 
	function changeMemberIdSitewide($oudid, $id) {

		// Make sure id and oudid is checked
		if (empty($oudid) || empty($id))
			print_fail(translate('Link new barcode to old barcode reservations failed ') . '<br />');// new

		$this->db->changeMemberIdSitewide($oudid, $id); // dit gaat over 3 tabellen, zie analysis/coworker-change-sidewide

		return;
	}	
	
	
	
/** janr, voor als barcode wijzigt
	* Set de user coworker, oude barcode op non-active
	* @param oudmemberid
	* call from: $auth->update_user_nonactive($_POST['oudmemberid']); 
	*/ 
	function update_user_nonactive( $id) {
		

		// Make sure id  checked
		if (empty($id))
			print_fail(translate('Set old barcode to nonactive failed ') . '<br />');// new

		// update to nonactive='y'
		$this->db->update_user_nonactiveDB($id); // deze fie: AuthDB.class.php r229

		return;
	}
	
	/**
	* Edits user data
	* @param array $data array of user data
	* @param bool if the admin is updating user data
	*/
	function do_edit_user($data, $adminUpdate) 
	{
		global $conf;
//print_r ($data); //goed

		// Verify user data
		$msg = $this->check_all_values($data, true);
		if (!empty($msg)) 
		{
			return $msg;
		}
		// janr
		if  ($data['klas'] != 'Coworker') {
				$this->db->update_user($data['memberid'], $data);
			} else{
				$this->db->update_user_coworker($data['memberid'], $data);
			}

		if (!$adminUpdate) 
		{
			$adminemail = strtolower($conf['app']['adminEmail']);
			// If it is the admin, set session variable
			if ($data['emailaddress'] == $adminemail) 
			{
				$_SESSION['sessionAdmin'] = $adminemail;
			}

			// Set other session variables
			$_SESSION['sessionName'] = $data['fname'];
			$_SESSION['hourOffset'] = $data['timezone'] - $conf['app']['timezone'];
		}

		CmnFns::write_log('User data modified. Data provided: fname- ' . $data['fname'] . ' lname- ' . $data['lname']
						. ' email- '. $data['emailaddress'] . ' phone- ' . $data['phone'] . ' institution- ' . $data['institution']
						. ' position- ' . $data['position'], $data['memberid']);

		$link = CmnFns::getNewLink();

		$url = 'schedule.php';
		if ($adminUpdate){
			$url = 'admin.php?tool=users';
		}
		
		if  ($data['klas'] == 'Coworker') {
			$url = 'admin.php?tool=coworkers';
		}
		$this->success = translate('Your profile has been successfully updated!') . '<br/>' . $link->getLink($url, translate('Continue'));
		CmnFns::redirect($url, 2, false); // tweede par is refresh in seconds
	}

	/**
	* Verify that the user entered all data properly
	* @param array $data array of data to check
	* @param boolean $is_edit whether this is an edit or not
	*/
	function check_all_values(&$data, $is_edit) {
		global $conf;
		$use_logonname = (bool)$conf['app']['useLogonName'];

		$msg = $data['memberid'].''.$data['oudmemberid'];
		$msg = '';
		if (empty($data['memberid'])) {
			// $msg .= 'Barcodekey' . '<br/>'; // deze check niet, generate memberid
		}
		if ($use_logonname && empty($data['logon_name'])) {
			$msg .= translate('Valid username is required') . '<br/>';
		}
		else if ($use_logonname) {
			$data['logon_name'] = htmlspecialchars($data['logon_name']);
		}
		if (empty($data['emailaddress']) || !preg_match("/^[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/", $data['emailaddress']))
			//$data['emailaddress'] = 'unknown@mail.com';
			//$msg .= translate('Valid email address is required.') . '<br/>';
		if (empty($data['fname'])) {
			$msg .= translate('First name is required.') . '<br/>';
		}
		else {
			$data['fname'] = htmlspecialchars($data['fname']);
		}
		if (empty($data['lname'])) {
			$msg .= translate('Last name is required.') . '<br/>';
		}
		else {
			$data['lname'] = htmlspecialchars($data['lname']);
		}
		if(!empty($data['phone'])) {
			$data['phone'] = htmlspecialchars($data['phone']);
		}
		if (!empty($data['institution'])) {
			$data['institution'] = htmlspecialchars($data['institution']);
		}
		if (!empty($data['position'])) {
			$data['position'] = htmlspecialchars($data['position']);
		}


        //if( !$conf['ldap']['authentication'] ) {

            // Make sure email isnt in database (and is not current users email)
            if ($is_edit) {
                $user = new User($data['memberid']);
                if ($this->db->userExists($data['emailaddress']) && ($data['emailaddress'] != $user->get_email()) )
                {
					$msg .= translate('That email is taken already.') . '<br/>';
				}
                if ($use_logonname)
                {
					if ( $this->db->userExists($data['logon_name'], true) && ($data['logon_name'] != $user->get_logon_name()) ) {
						$msg .= translate('That logon name is taken already.') . '<br/>';
					}
				}
// JANR NO PASSWORD CHECK HERE
                if (!empty($data['password'])) {
                //    if (strlen($data['password']) < $conf['app']['minPasswordLength'])
                //        $msg .= translate('Min 6 character password is required.', array($conf['app']['minPasswordLength'])) . '<br/>';
                //    if ($data['password'] != $data['password2'])
                //        $msg .= translate('Passwords do not match.') . '<br/>';
                }

                unset($user);
            }
            else {
                if (empty($data['password']) || strlen($data['password']) < $conf['app']['minPasswordLength']) {
                //     $msg .= translate('Min 6 character password is required.', array($conf['app']['minPasswordLength'])) . '<br/>';
				}
                if ($data['password'] != $data['password2']) {
                //    $msg .= translate('Passwords do not match.') . '<br/>';
				}
                if ($this->db->userExists($data['emailaddress'])) {
                //    $msg .= translate('That email is taken already.') . '<br/>';
                }
				if ($use_logonname && $this->db->userExists($data['logon_name'], true)) {
				//	$msg .= translate('That logon name is taken already.') . '<br/>';
				}
            }
        //}

		return $msg;
	}
	/**
	* Returns whether the user is attempting to log in
	* @param none
	* @return whether the user is attempting to log in
	*/
	function isAttempting() {
		return $this->is_attempt;
	}

	/**
	* Kills app
	* @param none
	*/
	function kill() {
		die;
	}

	/**
	* Destroy any lingering sessions
	* @param none
	*/
	function clean() {
		// Destroy all session variables
		if (isset($_SESSION['sessionID'])) unset($_SESSION['sessionID']);
		if (isset($_SESSION['sessionName'])) unset($_SESSION['sessionName']);
		if (isset($_SESSION['sessionAdmin'])) unset($_SESSION['sessionAdmin']);
		if (isset($_SESSION['hourOffset'])) unset($_SESSION['hourOffset']);
		session_destroy();
		session_destroy();
	}

	/**
	* Wrapper function to call template 'print_register_form' function
	* @param boolean $edit whether this is an edit or a new register
	* @param array $data values to auto fill
	* @param string $msg error message to print out
	* @param string $id member id to edit
	*/
	function print_register_form($edit, $data, $msg = '', $id = '') {
		print_register_form($edit, $data, $msg, $id);		// Function in auth.template.php
	}


	/**
	* Wrapper function to call template 'print_registerCoworker_form' function
	* @param boolean $edit whether this is an edit or a new register
	* @param array $data values to auto fill
	* @param string $msg error message to print out
	* @param string $id member id to edit
	*/
	function print_registerCoworker_form($edit, $data, $msg = '', $id = '') {
		print_registerCoworker_form($edit, $data, $msg, $id);		// Function in auth.template.php
	}
	/**
	* Wrapper function to call template 'printLoginForm' function
	* @param string $msg error messages to display for user
	* @param string $resume page to resume after a login
	*/
	function printLoginForm($msg = '', $resume = '') {
		printLoginForm($msg, $resume);
	}

	/**
	* Prints a message telling the user to log in
	* @param boolean $kill whether to end the program or not
	*/
	function print_login_msg($kill = true) {
		CmnFns::redirect(CmnFns::getScriptURL() . '/index.php?auth=no&resume=' . urlencode($_SERVER['PHP_SELF']) . '?' . urlencode($_SERVER['QUERY_STRING']));
	}

	/**
	* Prints out the latest success box
	* @param none
	*/
	function print_success_box() {
		CmnFns::do_message_box($this->success);
	}
}
?>