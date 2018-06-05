<?php
/**
* AuthDB class
* Provides all login and registration functionality
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 07-30-07
* @package DBEngine
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$basedir = dirname(__FILE__) . '/../..';
include_once($basedir . '/lib/DBEngine.class.php');

/**
* Provide all database access/manipulation functionality
* @see DBEngine
*/
class AuthDB extends DBEngine {

	/**
	* Returns whether a user exists or not
	* @param string $email users email address
	* @param bool $use_logonname if we are using a logonname instead of the email address for logon
	* @return user's id or false if user does not exist
	*/
	function userExists($uname, $use_logonname = false) {
		$data = array (strtolower($uname));
		if ($use_logonname) {
			// Can be logonname or email address
			$where = '(email=? OR logon_name=?)';
			$data[] = $data[0];
		}
		else {
			// Can only be email address
			$where = '(email=?)';
		}
		$email_or_login = ($use_logonname) ? 'logon_name' : 'email';
		$result = $this->db->getRow('SELECT memberid FROM ' . $this->get_table('login') . " WHERE $where", $data);
		$this->check_for_error($result);

		return (!empty($result['memberid'])) ? $result['memberid'] : false;
	}

	/**
	* Returns whether the password associated with this username
	*  is correct or not
	* @param string $uname user name
	* @param string $pass password
	* @param bool $use_logonname if we are using a logonname instead of the email address for logon
	* @return whether password is correct or not
	*/
	function isPassword($uname, $pass, $use_logonname = false) {
		$password = $this->make_password($pass);
		$data = array (strtolower($uname), strtolower($uname), $password);
		//$email_or_login = ($use_logonname) ? 'logon_name' : 'email';
		$result = $this->db->getRow('SELECT count(*) as num FROM ' . $this->get_table('login') . " WHERE (email=? OR logon_name=?) AND password=?", $data);
		$this->check_for_error($result);

		return ($result['num'] > 0 );
	}

	/** janrlogin
	* Inserts a new user into the database
	* @param array $data user information to insert
	* @return new users id
	*/
	function insertMember($data) {
		
		//echo ('is there:$data[memberid]:'.$data['memberid'].'EOT' );
	
		if (  isset($data['memberid']) && $data['memberid']<>'' && $data['memberid']<>' ' ) {
			$id = $data['memberid'];
		//	echo ('isset>$data[memberid]:'.$data['memberid'].'EOT' );
		}else{
			$id = $this->get_new_id();
		}
		// echo ('Created id when insertmember: '.$id  );
		
		
// Put data into a properly formatted array for insertion
		$to_insert = array();
array_push($to_insert, $id);
		array_push($to_insert, strtolower($data['emailaddress']));
				array_push($to_insert, strtolower($data['email2']));
		array_push($to_insert, $this->make_password($data['password']));
		array_push($to_insert, empty($data['fname']) ? '' : $data['fname']);
		array_push($to_insert, empty($data['lname']) ? '' : $data['lname']);
		array_push($to_insert, empty($data['phone']) ? '' : $data['phone']);
		array_push($to_insert, empty($data['institution']) ? '' : $data['institution']);
		array_push($to_insert, empty($data['position']) ? '' : $data['position']);
		array_push($to_insert, 'y');
		array_push($to_insert, 'y');
		array_push($to_insert, 'y');
		array_push($to_insert, 'y');
		array_push($to_insert, 'y');
		array_push($to_insert, isset($data['logon_name']) ? $data['logon_name'] : null);	// Push the logon name if we are using it
		array_push($to_insert, 0);	// is_admin
		array_push($to_insert, $data['lang']);
		array_push($to_insert, 0);
		array_push($to_insert, empty($data['phone_mob']) ? '' : $data['phone_mob']);
		array_push($to_insert, empty($data['osiris_ok_last']) ? '' : $data['osiris_ok_last']);
		array_push($to_insert, empty($data['osiris_ok_now']) ? '1' : $data['osiris_ok_now']);
		array_push($to_insert, empty($data['demerit_text']) ? '' : $data['demerit_text']);
		array_push($to_insert, 0); // demerit punt
		array_push($to_insert, empty($data['last_modify_osiris']) ? '' : $data['last_modify_osiris']);
		array_push($to_insert, empty($data['lnotes']) ? '' : $data['lnotes']);
		array_push($to_insert, empty($data['croho']) ? '' : $data['croho']);
		array_push($to_insert, empty($data['opleiding']) ? '' : $data['opleiding']);
		array_push($to_insert, empty($data['klas']) ? '' : $data['klas']);
		array_push($to_insert, empty($data['collegejaar_in']) ? '' : $data['collegejaar_in']);
		array_push($to_insert, empty($data['instellingstatus']) ? '' : $data['instellingstatus']);	
		array_push($to_insert, 'n'); // JANR NONACTIVE = n
		array_push($to_insert, empty($data['leenpermissie']) ? '1' : $data['leenpermissie']);	
		array_push($to_insert, empty($data['mutbyadmin']) ? '0' : $data['mutbyadmin']);	
				array_push($to_insert, empty($data['phone2']) ? '' : $data['phone2']);; //phone2
		// janrlogin
		$q = $this->db->prepare('INSERT INTO ' . $this->get_table('login') . ' VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		$result = $this->db->execute($q, $to_insert);
		$this->check_for_error($result);

		return $id;
	}

	/**
	* Updates user data
	* @param string $userid id of user to update
	* @param array $data array of new data
	* if { $data['klas'] <> 'Coworker' }
	*/
	function update_user($userid, $data) {
	//print_r ($data); // janr testonly
		$to_insert = array();
		array_push($to_insert, strtolower($data['emailaddress']));
		array_push($to_insert, empty($data['fname']) ? '' : $data['fname']);
		array_push($to_insert, empty($data['lname']) ? '' : $data['lname']);
//		array_push($to_insert, empty($data['phone']) ? '' : $data['phone']);
//		array_push($to_insert, empty($data['institution']) ? '' : $data['institution']);
//		array_push($to_insert, empty($data['position']) ? '' : $data['position']);
//		array_push($to_insert, isset($data['logon_name']) ? $data['logon_name'] : null);	// Push the logon name if we are using it
		array_push($to_insert, $data['timezone']);
// janr fields extra that can be updated: demerit_text, demerit_punt, lnotes
//		array_push($to_insert, empty($data['phone_mob']) ? '' : $data['phone_mob']);
		array_push($to_insert, empty($data['email2']) ? '' : $data['email2']);
		array_push($to_insert, empty($data['demerit_text']) ? '' : $data['demerit_text']);
		array_push($to_insert, empty($data['demerit_punt']) ? '' : $data['demerit_punt']);
		array_push($to_insert, empty($data['lnotes']) ? '' : $data['lnotes']);		
		array_push($to_insert, empty($data['leenpermissie']) ? '0' : $data['leenpermissie']);		
		
		// mutbyadmin, de leenpermissie is gewijzigd door admin
		if ($leenpermissieOud <> $leenpermissie) {
			array_push($to_insert, '1');
		} else {
			array_push($to_insert, '0');	
		}
		array_push($to_insert, empty($data['phone2']) ? '' : $data['phone2']); //phone2
		$sql = 'UPDATE ' . $this->get_table('login')
			. ' SET email=?,'
			. ' fname=?,'
			. ' lname=?,'
			. ' timezone=?,'
			. ' email2=?,'			
			. ' demerit_text=?,'
			. ' demerit_punt=?,'
			. ' lnotes=?,'
			. ' leenpermissie=?,'
			. ' mutbyadmin=?,'
			. ' phone2=?';
 		//print ($sql); // janr testonly
		
		if (isset($data['password']) && !empty($data['password'])) {	// If they are changing passwords
			$sql .= ', password=?';
			array_push($to_insert, $this->make_password($data['password']));
		}
		array_push($to_insert, $userid);

		$sql .= ' WHERE memberid=?';

		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $to_insert);
		$this->check_for_error($result);
	}

	/**
	* Updates user data COWORKER
	* @param string $userid id of user to update
	* @param array $data array of new data
	* 										if ( $data['klas'] == 'Coworker' ) //JANR
	*
	*/
	function update_user_coworker($userid, $data) {
	// print_r ($data); // janr testonly
		
		$data['timezone']=0;
		
		$to_insert = array();
		array_push($to_insert, strtolower($data['emailaddress']));
		array_push($to_insert, empty($data['fname']) ? '' : $data['fname']);
		array_push($to_insert, empty($data['lname']) ? '' : $data['lname']);
			array_push($to_insert, empty($data['phone']) ? '' : $data['phone']);
		//	array_push($to_insert, empty($data['institution']) ? '' : $data['institution']);
		//	array_push($to_insert, empty($data['position']) ? '' : $data['position']);
		//	array_push($to_insert, isset($data['logon_name']) ? $data['logon_name'] : null);	// Push the logon name if we are using it
		array_push($to_insert, $data['timezone']);
// janr fields extra that can be updated: demerit_text, demerit_punt, lnotes
		array_push($to_insert, empty($data['phone_mob']) ? '' : $data['phone_mob']);
		array_push($to_insert, empty($data['email2']) ? '' : $data['email2']);
		array_push($to_insert, empty($data['demerit_text']) ? '' : $data['demerit_text']);
		array_push($to_insert, empty($data['demerit_punt']) ? '0' : $data['demerit_punt']);
		array_push($to_insert, empty($data['lnotes']) ? '' : $data['lnotes']);		
		array_push($to_insert, empty($data['leenpermissie']) ? '' : $data['leenpermissie']);		

		// mutbyadmin, de leenpermissie is gewijzigd door admin
		if ($leenpermissieOud <> $leenpermissie) {
			array_push($to_insert, '0');
		} else {
			array_push($to_insert, '1');	
		}
		array_push($to_insert, empty($data['phone2']) ? '' : $data['phone2']);

		$sql = 'UPDATE ' . $this->get_table('login')
			. ' SET email=?,'
			. ' fname=?,'
			. ' lname=?,'
			. ' phone=?,'
			. ' timezone=?,'
			. ' phone_mob=?,'
			. ' email2=?,'			
			. ' demerit_text=?,'
			. ' demerit_punt=?,'
			. ' lnotes=?,'
			. ' leenpermissie=?,'
			. ' mutbyadmin=?,'
			. ' phone2=?';
			
		// 		print ($sql); // janr testonly
		if (isset($data['password']) && !empty($data['password'])) {	// If they are changing passwords
			$sql .= ', password=?';
			array_push($to_insert, $this->make_password($data['password']));
		}
		array_push($to_insert, $userid);
									// print_r ($to_insert); // test janr
		$sql .= ' WHERE memberid=?';
						// echo ('<br>JANR at function update_user_coworker<br>SQL: ');// test janr
						// echo ($sql);// test janr
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q, $to_insert);
		$this->check_for_error($result);
	}

	/** janr, voor als barcode wijzigt
	* update oud barcode to nonactive=y
	* @param none
	*/
	function update_user_nonactiveDB($id) {
		// Make sure id  checked
		if (empty($id))
			print_fail(translate('Set old barcode to nonactive failed ') . '<br />');// new
		
		// Update user
		$sql = 'UPDATE ' . $this->get_table('login'). ' SET nonactive=\'y\' WHERE memberid=?';
						
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q,$id);
		$this->check_for_error($result);
		
		return;
	}

	
	
	/** janr, voor als barcode wijzigt
	* anywhere in DB where $oudid, change to $id
					FROM 	LOGIN - is al gedaan
					FROM  `db01_reservation_users` 	WHERE  `memberid` LIKE  'acoaco'
					FROM  `db01_permission` 		WHERE  `memberid` LIKE  'acoaco' // hoeft niet, deze tabel ongebruikt in rietveld version
	* call: $this->db->changeMemberIdSitewide($oudid, $id); // dit gaat over 3 tabellen, zie analysis/coworker-change-sidewide
	* @param none
	*/
	function changeMemberIdSitewide($oudid, $id) {
		// Make sure id and oudid is checked
		if (empty($oudid) || empty($id))
			print_fail(translate('Link new barcode to old barcode reservations failed ') . '<br />');// new
		
		// Update user IN `db01_reservation_users`
		$sql = 'UPDATE ' . $this->get_table('reservation_users'). ' SET memberid=\''.$id.'\' WHERE memberid=?';
		//echo '<br>oud-nieuw '.$oudid.' '. $id.'<br>';
		//echo $sql;
		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q,$oudid);
		$this->check_for_error($result);
		
		// Update user IN `db01_permission`
		//$sql = 'UPDATE ' . $this->get_table('permission'). ' SET memberid='.$id. 'WHERE memberid=?';
						
		//$q = $this->db->prepare($sql);
		//$result = $this->db->execute($q,$id);
		//$this->check_for_error($result);
		return;
	}
	
	
	
	/** janr, voor als barcode wijzigt
	* Deletes a user from db
	* @param none
	*/
	function del_userDB($id) {
		

		// Make sure id  checked
		if (empty($id))
			print_fail(translate('Update / delete barcode failed. ') . '<br />');

		// Delete user
		//DELETE FROM `gra_uitleen`.`db01_login` WHERE `db01_login`.`memberid` = '1021297';
		$q = $this->db->prepare('DELETE FROM ' . $this->get_table(TBL_LOGIN) . ' WHERE memberid =?');
		$result = $this->db->execute($q,$id);
		$this->check_for_error($result);
		
		return;
	}

    /**
	* Checks to see if User information in DB is synched with LDAP Info
	* @param string $id user to check
	* @param array $ldap array of user's LDAP information
	* @author FCCC
	*/
	function check_updates( $id, $ldap ) {

		$result = $this->db->getRow('SELECT email, fname, lname, phone FROM ' . $this->get_table('login') . ' WHERE memberid=?', array($id));
		$this->check_for_error($result);

        if( $result['email'] != $ldap['emailaddress'] ) {
			return true;
		}
		else if( $result['fname'] != $ldap['fname'] ) {
            return true;
       	}
		else if( $result['lname'] != $ldap['lname'] ) {
           return true;
       	}
		else if( $result['phone'] != $ldap['phone'] ) {
			return true;
        }

        return false;
	}

	/**
	* Checks to make sure the user has a valid ID stored in a cookie
	* @param string $id id to check
	* @return whether the id is valid
	*/
	function verifyID($id) {
		$result = $this->db->getRow('SELECT count(*) as num FROM ' . $this->get_table('login') . ' WHERE memberid=?', array($id));
		$this->check_for_error($result);

		return ($result['num'] > 0 );
	}

	/**
	* Gives full resource permissions to a user upon registration
	* @param string $id id of user to auto assign
	*/
	function autoassign($id) {
		$sql = 'INSERT INTO ' . $this->get_table('permission') . ' (memberid, machid) SELECT "' . $id . '", machid FROM ' . $this->get_table('resources') . ' WHERE autoassign=1';

		$q = $this->db->prepare($sql);
		$result = $this->db->execute($q);
		$this->check_for_error($result);
	}
	
	function getPassword($id)
	{
		$data = array ($id);
		$result = $this->db->getRow('SELECT password FROM ' . $this->get_table('login') . " WHERE memberid=?", $data);
		$this->check_for_error($result);
		
		return $result['password'];
	}
}
?>