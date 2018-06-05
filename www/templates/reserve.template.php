<?php
/**
* This file provides output functions for reserve.php
* No data manipulation is done in this file
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 02-17-07
* @package Templates
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
/**
* Print rdm. dit is test voor mod staat aan janr
* @param string $mod / modification is rdm.
*/
$basedir = dirname(__FILE__) . '/..';
require_once($basedir . '/lib/Link.class.php');

function print_mod() {
	// echo $mod;
}

/**
* Print out the resource name
* @param string $name name of the resource
* @param string $lname name of user
* @param string $fname name of user
*/
function print_title($name, $fname, $lname, $is_blackout = false, $is_private = false) {

	if (!$is_blackout && !$is_private) {
	echo "<h3 >".$fname ." ".$lname ." &raquo; " .$name. "</h3>\n"; // usernaam
	}
	if ($is_blackout) {
	echo "<h3 >translate ('Blackout')</h3>\n"; // 
	}
	if ($is_private) {
	echo "<h3 >translate ('Private')</h3>\n"; // 
	}
}

/**
* Opens form for reserve
* @param bool $isnew = $this->type == RES_TYPE_ADD
* @param bool $is_blackout if this is a blackout
*/
function begin_reserve_form($isnew, $is_blackout = false) {
	// janr , adminlogin
	if ((Auth::isAdmin())  && ($isnew)) { 
		echo '<form name="reserve" id="reserve" method="post" action="' . $_SERVER['PHP_SELF'] . '?is_blackout=' . intval($is_blackout) . '" style="margin: 0px"' . " onsubmit=\"return check_reservation_form(this) && check_warnings(this);\" target=\"execute\">\n";
	}else{ 	
	// janr , userlogin
		echo '<form name="reserve" id="reserve" method="post" action="' . $_SERVER['PHP_SELF'] . '?is_blackout=' . intval($is_blackout) . '" style="margin: 0px"' . " onsubmit=\"return check_reservation_form(this);\" target=\"execute\">\n";
	}
}

/**
* Begins the outer reservation table.  This prints out the tabs for basic/advanced
* and switches between them
* @param none
*/
function begin_container() {


?>
<!-- begin tabs bovenin -->


<table width="100%" cellspacing="0" cellpadding="0" border="0" id="tab-container">
<tr class="tab-row">
<td class="tab-selected" id="tab_basic" onclick="javacript: jQuery('#check-button').attr('link','check-child.php'); clickTab(this, 'pnl_basic');"><a href="javascript:void(0);"><?php echo translate('Basic')?></a></td>

<!-- janr deelnemers eruit  
<td class="tab-not-selected" id="tab_advanced" onclick="javacript: clickTab(this, 'pnl_advanced');" style="border-left-width:0px;"><a href="javascript:void(0);"><?php // echo // translate('Participants')?></a></td>
end janr artikelen eruit 
<td class="tab-not-selected" id="tab_add_resources" onclick="javacript: clickTab(this, 'pnl_add_resources');" style="border-left-width:0px;"><a href="javascript:void(0);"><?php // echo translate('Resources_Add')?></a></td> -->
 
 
<!-- janr reserveer additional resources button-->
<?php
	// janr , userlogin
	if (Auth::isAdmin()) { 	
?>
<td class="tab-not-selected" id="tab_additional" onclick="javacript: jQuery('#check-button').attr('link','check.php');clickTab(this, 'pnl_additional');" style="border-left-width:0px;"><a href="javascript:void(0);"><?php echo translate('Accessories')?></a></td>

<?php
 	}// janr userlogin
?>
<td class="tab-filler">&nbsp;</td>
</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tab-main">
  <tr>
    <td id="main-tab-panel" style="padding:7px;">
<?php
}

/**
* Prints the basic reservation form elements
* This contains: resource data, time information/select, user info, create/modify times, recurring selection, pending info
* @param object $res Reservation object to work with
* @param array $rs resource data array
* @param bool $is_private if the privacy mode is on and we should hide personal data
* @param bool $toolate janr te laat
* @param array $clusterdata 
*/
function print_basic_panel(&$res, &$rs, $is_private, $toolate, $clusters) {
		global $conf;
?>
	<!-- Begin basic panel -->
      <div id="pnl_basic" style="display:table; width:100%; position: relative;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="pnl_basic" >
          <tr>
            <!-- td width="330" -->
            <td>
			<!-- Content begin -->
<?php

//print_r ('<br>basic panel template ' . $clusters);


	// begin janr
	begin_print_resource_data($rs, ($res->type == RES_TYPE_ADD ? 2 : 1));		
	
	// here start looping through batch of resources on this reservation, parent first, then children
	// Print resource info janr
	// print_resource_data($rs, ($res->type == RES_TYPE_ADD ? 2 : 1));		// Print resource info-original
	
	// 1 line per resources on this res. janr
	// do something with: if student makes reservation and the resource needs approval:
	// if (not is admin) || ($res->type == RES_TYPE_ADD) || ($rs->approval == 1) then $res->type=0
			//test
				//===============
			// [0]     Array ( [resid] => pk14d498ae86365c [reservation_status] => 1 [resname] => cam5 ) 
			// [1] => Array ( [resid] => pk14d498b02cb052 [reservation_status] => 0 [resname] => cam6
				//print_r ($clusters);
			
			
				// =========
				// echo ('<br>clusterdataxx id ' .$this->clusterid);
				// $clusters = $this->clusterdata;
				// print_r ('<br>clusterdataxx direct ' . $this->db->get_reservation_clusterdata($this->clusterid) );
				// print_r ('<br>clusterdataxx clusters' . $clusters);
				
		//endtest
	$allowed_reservation_status = $conf['app']['allowed_reservation_status']; // which status can a reservation have. get array values from config
	print_resource_data_one_resource($rs, $res->type, (bool)$res->get_pending(), $allowed_reservation_status, $res->reservation_status, $res->id);		
	// janrres_status
	
	$orig_reservation_status = $res->reservation_status;	// Janr Store the original reservation_status FOR WARNING CHECKS	
	
	print_rest_cluster ($res->id ,$clusters, (bool)$res->get_pending());
		
	// addart, geeft button kies artikel
	// echo ('res type ' . $res->type . '<BR>');
	// if ($res->type == 'c') { // RES_TYPE_CLUSTER
	if (RES_TYPE_CLUSTER) {
		print_addart_link ($rs, $res->type, $res->id);
	}	

	print_reservation_status_alt($res->type, $allowed_reservation_status, $res->reservation_status);

	// end janr
	end_print_resource_data($rs, ($res->type == RES_TYPE_ADD ? 2 : 1));			

	// janr checkin checkout, toegevoegd
	$allowed_checkout = $conf['app']['allowed_checkout']; // get array values from config
	$allowed_checkin = $conf['app']['allowed_checkin']; // get array values from config

// logistiek uit res box
	print_time_info($res, $rs, !$res->is_blackout, (isset($rs['allow_multi']) && $rs['allow_multi'] == 1),$toolate);	// 
	print_checkoutin_info($res->type,$allowed_checkout, $res->checkout_via, $allowed_checkin, $res->checkin_via);	// checkoutin


	if (!$is_private ) {
		print_contractform($res->summary,$res->contractsoort, $res->type);
	}
	if (!$is_private) {
		print_summaryform($res->summary,$res->contractsoort, $res->type);
	}
	// Print created/modified times (if applicable)
	if (!empty($res->id)) {			
		print_create_modify($res->created, $res->modified);
	}	

	print_table01_end();	// Close off table	
	if (!$res->is_blackout && !$is_private) {
			// print_user_info($res->type, $res->user,$allowed_checkout, $res->checkout_via, $allowed_checkin, $res->checkin_via);	// Print user info
			print_user_info($res->type, $res->user);	// user
		}
	print_table02_end();	// Close off table

// hier table02_end
//janr_test(); // lange expose over date time formats

// janr janrepeat !eruit (via display:none)
	if (!empty($res->parentid) && ($res->type == RES_TYPE_MODIFY || $res->type == RES_TYPE_DELETE || $res->type == RES_TYPE_APPROVE)) {
		print_recur_checkbox($res->parentid);
	}

	if ($res->type == RES_TYPE_MODIFY) {
		print_del_checkbox();
	}

	if ($res->type == RES_TYPE_ADD || $res->type == RES_TYPE_MODIFY) {		// Print out repeat reservation box, if applicable
		divide_table();
		if ($res->type == RES_TYPE_ADD) {
// janr repeat res niet	, niet hier uitzetten, maar met display none	r1080
			print_repeat_box(date('m', $res->start_date), date('Y', $res->start_date));
			if( $res->is_pending ) {
				 print_pending_approval_msg();
			}
		}
		// janrreminder eruit
		$reminder_times = $conf['app']['allowed_reminder_times'];
		// print_reminder_box($reminder_times, $res->reminder_minutes_prior, $res->reminderid);
		
		// janr checki checkout, toegevoegd
		//$allowed_checkout = $conf['app']['allowed_checkout']; // get array values from config
		// print_checkout_via($allowed_checkout, $res->checkout_via);
		// $allowed_checkin = $conf['app']['allowed_checkin']; // get array values from config
		// print_checkin_via($allowed_checkin, $res->checkin_via);		
		
		// janr : see also translate_reservation_status
		// $allowed_reservation_status = $conf['app']['allowed_reservation_status']; // which status can a reservation have. get array values from config
		// print_reservation_status($allowed_reservation_status, $res->reservation_status);			
	}
?>
			<!-- Content end -->
			</td>
          </tr>
        </table>
      </div>
	  <!-- End basic panel -->
<?php
}

/**
* Prints out the advanced reservation functions
* @param Object $res Reservation object that is being printed out
* @param array $users array of all users fname, lname, memberid
* @param bool $is_owner if the current user is the reservations owner
* @param string $max_participants the maximum number of participants for this resource
* @param bool $viewable if the advanced panel shows anything
* @param bool $day_has_passed if the day being displayed is already in the past
*/
function print_users_panel($res, $users, $is_owner, $max_participants, $viewable = true, $day_has_passed) {
?>
	<!-- Begin advanced panel = janr = add participants -->
     <div id="pnl_advanced" style="display:none; width:100%; position: relative;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="pnl_advanced">
          <tr>
		  <!-- Begin content -->
		  <?php
		    if (!$viewable) {
				echo '<td>' . translate('No advanced options available') . '</td>';
			}
			else {
				$user_info = $res->users;
				$total_users = 0;

				if ($max_participants != '' && $is_owner) {
					echo '<p class="warningText">' . translate('Maximum of participants', array($max_participants)) . '</p>';
				}
				else if ($max_participants != '' && !$is_owner) {
					// Show how many openings are taken
					for ($i = 0; $i < count($user_info); $i++) {
						if ($user_info[$i]['invited'] != 1 && $user_info[$i]['owner'] != 1) {
							$total_users++;
						}
					}
					echo "<p class=\"warningText\">$total_users/$max_participants " . translate('Participants') . '</p>';
				}

				if ($is_owner && $res->type != RES_TYPE_APPROVE && $res->type != RES_TYPE_DELETE) {
					print_invite_selectboxes($res, $users, $user_info);
					print_participating_users($user_info);
					print_participation_checkboxes((bool)$res->allow_participation, (bool)$res->allow_anon_participation);
				}
				else {
					print_invited_particpating_users($user_info);
					if (
						((bool)$res->get_allow_participation() || (bool)$res->get_allow_anon_participation())
						&& ( ($max_participants == '') || ($total_users < intval($max_participants)) )
						&& !$day_has_passed
						) {
							print_join_form($res->get_allow_participation(), $res->get_allow_anon_participation(), $res->get_parentid());
					}
				}
			}
		  ?>
			<!-- End content -->
          </tr>
        </table>
      </div>
	  <!-- End advanced panel -->
<?php
}

// end add resources panel janr

function print_additional_tab($res, $all_resources, $is_owner, $viewable) {
// print_r ($all_resources);
?>
<!-- Begin additional panel -->
     <div id="pnl_additional" style="display:none; width:100%; position: relative;">
        <table width="100%" cellpadding="0" cellspacing="0" border="0" class="pnl_additional">
          <tr>
		  <!-- Begin content -->
		  <?php
		    if (!$viewable) {
				echo '<td>' . translate('No advanced options available') . '</td>';
			}
			else {
				if ($is_owner && $res->type != RES_TYPE_APPROVE && $res->type != RES_TYPE_DELETE) {
					echo '<td width="330" align="center">';

					// Print select boxes
					echo translate('All Accessories');
					?>
					<!--br/><select name="all_resources[]" id="all_resources" class="textbox" multiple="multiple" size="10" style="width:330px;"   -->
					<br/><select name="all_resources[]" id="all_resources" onchange="hideDuplicateOptions(all_resources)" class="textbox" multiple="multiple" size="10" style="width:330px;">
					<?php
					for ($i = 0; $i < count($all_resources); $i++) {
						echo "<option value=\"{$all_resources[$i]['resourceid']}\">{$all_resources[$i]['name']}</option>\n";
					}
					?>
					</select>
					</td>
					<td valign="middle" align="center"><BR><BR>
					<button type="button" id="add_to_additionalresource" class="button" onclick="javascript: moveSelectItems('all_resources','selected_resources'); hideDuplicateOptions('all_resources')" style="width:75px;font-size:12px;">&raquo;&raquo;</button>
					<br/><br/>
					<?php echo translate('Hold CTRL to select multiple')?>
					<br/><br/>
					<button type="button" id="remove_from_additionalresource" class="button" onclick="javascript: moveSelectItems('selected_resources','all_resources'); hideDuplicateOptions('all_resources')" style="width:75px;font-size:12px;">&laquo;&laquo;</button>
					</td>
					<td width="330" align="center">
					<?php echo translate('Added Accessories')?><br/>
					<select name="selected_resources[]" id="selected_resources" class="textbox" multiple="multiple" size="10" style="width:330px;">
						<?php
						for ($i = 0; $i < count($res->resources); $i++) {
							echo "<option value=\"{$res->resources[$i]['resourceid']}\">{$res->resources[$i]['name']}</option>";
						}
						?>
					</select>
					<select style="visibility:hidden;display:none;" id="orig_resources" name="orig_resources[]" multiple="multiple">
					<?php
					// Original reservations used for array_diff to make sure we update the right ones
					for ($i = 0; $i < count($res->resources); $i++) {
							echo "<option value=\"{$res->resources[$i]['resourceid']}\" selected=\"selected\">{$res->resources[$i]['name']}</option>";
						}
					?>
					</select>
					</td>
					<?php
				}
				else {  // view only 
					echo '<td ><p style="font-weight:bold;">' . translate('Accessories') . '</p>';
					if (count($res->resources) <= 0) {
						echo translate('None');
					}

					// Print additional resource info
					for ($i = 0; $i < count($res->resources); $i++) {
						if ( isset($res->resources[$i]['name']) && $res->resources[$i]['name'] <> null) {
							echo "<p>".$res->resources[$i]['name']."</p>";
						}
					}
					echo '</td>';
				}
			}
		  ?>
			<!-- End content -->
          </tr>
        </table>
      </div>
	  <!-- End additional panel -->
<?php
}
/** // 'janr print Accessories'
* Prints out view only van de accessoires
*/
function print_accessories ($res) {
	$resources = $res->db->get_sup_resources($res->id);
	echo '<tr><td  colspan="2"> </td></tr>';
	echo '<tr><td class="cellColor" valign="top"><p style="font-weight:bold;">' . translate('Accessories') . '</p></td><td class="cellColor">';
	//if (count($res->resources) <= 0) {
	//	echo translate('None');
	//}
	//Print additional resource info
	//var_dump ($resources);
	for ($i = 0; $i < count($resources); $i++) {
		echo ($resources[$i]['name']."<br>");
	}
	
	echo '</td></tr>';
}
//**




/**
* Prints out select boxes so that the reservation owner/creator can
*  invite or uninvite users
* @param Object $res Reservation object of current reservation
* @param array $users array of all users in the database
* @param array $user_info the users array of the Reservation object
*/
function print_invite_selectboxes($res, $users, $user_info) {
	?>
	<td colspan="3"><p align="center" style="font-weight: bold;">
	<?php
	echo translate('Invite Users');
	?>
	</p>
	</td>
	</tr>
	<tr>
	<td width="200" align="center">
	<?php echo translate('All Users')?><br/>
	<select name="all_users[]" id="all_users" class="textbox" multiple="multiple" size="10" style="width:195px;">
	<?php
	for ($i = 0; $i < count($users); $i++) {
		echo "<option value=\"{$users[$i]['memberid']}|{$users[$i]['email']}\">{$users[$i]['lname']}, {$users[$i]['fname']}</option>";
	}
	?>
	</select>
	</td>
	<td valign="middle" align="center">
	<button type="button" id="add_to_invite" class="button" onclick="javascript: moveSelectItems('all_users','invited_users'); javascript: addInvitedUserHidden('all_users', 'users_to_add', 'orig_invited_users');" style="width:75px;font-size:12px;">&raquo;&raquo;</button>
	<br/><br/>
	<?php echo translate('Hold CTRL to select multiple')?>
	<br/><br/>
	<button type="button" id="remove_from_invite" class="button" onclick="javascript: moveSelectItems('invited_users','all_users');" style="width:75px;font-size:12px;">&laquo;&laquo;</button>
	</td>
	<td width="200" align="center">
	<?php echo translate('Invited Users')?><br/>
	<select name="invited_users[]" id="invited_users" class="textbox" multiple="multiple" size="10" style="width:195px;">
	<?php
	for ($i = 0; $i < count($user_info); $i++) {
		if ($user_info[$i]['invited'] == 1) {
			echo "<option value=\"{$user_info[$i]['memberid']}|{$user_info[$i]['email']}\">{$user_info[$i]['lname']}, {$user_info[$i]['fname']}</option>";
		}
	}
	?>
	</select>
	<select style="visibility:hidden;display:none;" id="orig_invited_users" name="orig_invited_users[]" multiple="multiple">
	<?php
	for ($i = 0; $i < count($user_info); $i++) {
		if ($user_info[$i]['invited'] == 1) {
			echo "<option value=\"{$user_info[$i]['memberid']}|{$user_info[$i]['email']}\" selected=\"selected\">{$user_info[$i]['lname']}, {$user_info[$i]['fname']}</option>";
		}
	}
	?>
	</select>
	</td>
	<?php
}

/**
* Prints out select boxes so that the reservation owner/creator can
*  remove users from participating in this reservation
* @param array $user_info the users array of the Reservation object
*/
function print_participating_users($user_info) {
	?>
	</tr><tr><td colspan="3"><p align="center" style="font-weight: bold;padding-top:10px;">
	<?php echo translate('Remove Participants'); ?>
	</p>
	</td>
	</tr><tr>
	<td width="200" align="center">
	<?php echo translate('All Users'); ?><br/>
	<select name="removed_users[]" id="removed_users" class="textbox" multiple="multiple" size="10" style="width:195px;">
	</select>
	</td>
	<td valign="middle" align="center">
	<button type="button" id="add_to_participate" class="button" onclick="javascript: moveSelectItems('removed_users','participating_users');" style="width:75px;font-size:12px;">&raquo;&raquo;</button>
	<br/><br/>
	<?php echo translate('Hold CTRL to select multiple'); ?>
	<br/><br/>
	<button type="button" id="remove_from_participate" class="button" onclick="javascript: moveSelectItems('participating_users','removed_users');" style="width:75px;font-size:12px;">&laquo;&laquo;</button>
	</td>
	<td width="200" align="center">
	<?php echo translate('Particpating Users'); ?><br/>
	<select name="participating_users[]" id="participating_users" class="textbox" multiple="multiple" size="10" style="width:195px;">
	<?php
	for ($i = 0; $i < count($user_info); $i++) {
		if ($user_info[$i]['invited'] != 1 && $user_info[$i]['owner'] != 1) {
			echo "<option value=\"{$user_info[$i]['memberid']}|{$user_info[$i]['email']}\">{$user_info[$i]['lname']}, {$user_info[$i]['fname']}</option>";
		}
	}
	?>
	</select>
	</td>
	<?php
}


/**
* Prints out lists of all of the invited and all of the participating users
* @param array $user_info users array from the Reservation object
*/
function print_invited_particpating_users($user_info){
	$invited = $participating = '';
	for ($i = 0; $i < count($user_info); $i++) {
		if ($user_info[$i]['invited'] == 1) {
			$invited .= "<p>{$user_info[$i]['lname']} , {$user_info[$i]['fname']}</p>";
		}
		else if ($user_info[$i]['owner'] != 1){
			$participating .= "<p>{$user_info[$i]['lname']} , {$user_info[$i]['fname']}</p>";
		}
	}
?>
	<td style="width:48%; vertical-align:top;">
		<p style="font-weight:bold;"><?php echo translate('Invited Users')?></p>
		<?php echo $invited?>
	</td>
	<td>&nbsp;</td>
	<td style="width:48%; vertical-align:top;">
		<p style="font-weight:bold;"><?php echo translate('Particpating Users')?></p>
		<?php echo $participating?>
	</td>
<?php
}

function print_participation_checkboxes($allow_part, $allow_anon) {
?>
</tr><tr><td colspan="3">
<input type="checkbox" name="allow_participation" <?php echo ($allow_part) ? 'checked="checked"' : ''?>/><?php echo translate('Allow registered users to join?')?><br/>
<input type="checkbox" name="allow_anon_participation" <?php echo ($allow_anon) ? 'checked="checked"' : ''?>/><?php echo translate('Allow non-registered users to join?')?>
</td>
<?php
}

/**
* Prints out the textboxes and buttons for the self registration
* @param bool $allow_participation if self registration is allowed for registered users
* @param bool $allow_anon_participation if self registration is allowed for non registered users
*/
function print_join_form($allow_participation, $allow_anon_participation, $parentid) {
	$join = translate('Join');
	$allow_participation = ($allow_participation && Auth::is_logged_in());
	$allow_anon_participation = ($allow_anon_participation && !Auth::is_logged_in());
?>
</tr><tr><td colspan="3">
<p align="center" style="margin-top:10px;"><a href="javascript:showHide('join_options');"><?php echo translate('My Participation Options')?></a></p>
<div id="join_options" style="display:none;">
<?php
if ($allow_participation) {
	echo '<input type="hidden" name="join_userid" id="join_userid" value="' . Auth::getCurrentID() . '"/>';
}
else if ($allow_anon_participation) {
?>
<table width="100%" border="0" style="border: dashed 1px #DDDDDD;background-color:#FFFFFF;" align="center">
<tr>
	<td align="right" width="20%"><?php echo translate('First Name')?></td>
	<td><input type="text" name="join_fname" id="join_fname" class="textbox" maxlength="30"/></td>
</tr>
<tr>
	<td align="right"><?php echo translate('Last Name')?></td>
	<td><input type="text" name="join_lname" id="join_lname" class="textbox" maxlength="30"/></td>
</tr>
<tr>
	<td align="right"><?php echo translate('Email')?></td>
	<td><input type="text" name="join_email" id="join_email" class="textbox" maxlength="75"/></td>
</tr>
</table>
<?php
}

if ($allow_participation || $allow_anon_participation) {
	echo '<p align="center">';
	echo '<button type="button" name="btn_join" value="' . $join . '" class="button" onclick="submitJoinForm(' . (int)$allow_participation . ');">' . $join . '</button>';
	//echo ($parentid != null) ? ' <input type="checkbox" name="join_parentid"/> ' . translate('Join All Recurring') : '';
	echo '</p>';
}
?>
</div>
</td>
<?php
}

/**
* Prints out a form of hidden values for the self registration
* @param none
*/
function print_join_form_tags() {
?>
<form name="join_form" method="post" action="join.php" style="margin:0px;" id="join_form">
	<input type="hidden" name="h_join_fname" value=""/>
	<input type="hidden" name="h_join_lname" value=""/>
	<input type="hidden" name="h_join_email" value=""/>
	<input type="hidden" name="h_join_userid" value=""/>
	<input type="hidden" name="h_join_resid" value=""/>
</form>
<form name="reserve_check" id="reserve_check" method="post" action="reserve.php" style="margin:0px;">
</form>
<?php
}

/**
* Closes all tags opened by begin_container()
* @param none
*/
function end_container() {
?>
	<!-- end_container() -->
    </td>
  </tr>
</table>
			<!-- voor verlenging, biedt delete funktie -->
			<script type="text/javascript">
			function deleteReservationOneResource(resid) {
				if (confirm('Verwijder deze regel. Weet je zeker?'+'#Verleng'+resid)) {
					
					jQuery('#execute').show().attr('src','delete-reservation-one-resource.php?resid='+resid);
					
					//alert("from js: current window name: "+window.name);
				}
				void(0);   
			}
			</script>
<?php
}

/**
* Prints all the buttons and hidden fields
* @param object $res Reservation object to work with
*/
function print_buttons_and_hidden(&$res) {
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td>
<?php
	$is_owner = ($res->user->get_id() == Auth::getCurrentID());
	if ($is_owner) {
	// testing	echo ( 'ownername:' . $res->user->get_id(). ' ' . $res->user->get_name() );
		}
	$type = $res->get_type();
    // Print buttons depending on type
	// janr dit is verplaatst naar reserve 248	 . '<input type="button" name="btnPrint" value="' . translate('Print Contract') . '" class="button" onclick="selectAllOptions(this);"/><input type="hidden" name="print" value="print" />';

    echo '<p>';	
	// $is_owner = de res is op mijn naam
	//print ('is owner:'.$is_owner); //test
	switch($type) {
	// disabled="disabled"

		case RES_TYPE_CLUSTER :
            echo '<input type="submit"  name="btnSubmit" value="' . translate('Savetocluster') . '" class="button" onclick="selectAllOptions(this);"/>'
				. '<input type="hidden" name="fn" value="cluster" />';

	    break;
  	    case RES_TYPE_MODIFY :
            echo '<input type="submit" name="btnSubmit" value="' . translate('Save') . '" class="button" onclick="selectAllOptions(this);"/>'
			. '<input type="submit" name="btnSubmitAndCluster" value="' . translate('add article') . '" class="button" onclick="selectAllOptions(this);"/>'
				. '<input type="hidden" name="fn" value="modify" />';
	    break;
        case RES_TYPE_DELETE :
            echo '<input type="submit" name="btnSubmit" value="' . translate('Delete') . '" class="button" />'
					. '<input type="hidden" name="fn" value="delete" />';
	    break;
        case RES_TYPE_VIEW :
            echo '<input type="button" name="close" value="' . translate('Close Window') . '" class="button" onclick="window.close();" />';
	    break;
        case RES_TYPE_ADD :
            echo '<input type="submit" name="btnSubmit" value="' . translate('Save') . '" class="button" onclick="selectAllOptions(this);"/>'
					. '<input type="hidden" name="fn" value="create" />';
        break;
		case RES_TYPE_APPROVE :
			echo '<input type="submit" name="btnSubmit" value="' . translate('Approve') . '" class="button"/>'
				. '<input type="hidden" name="fn" value="approve" />';
    }
    // Print cancel button as long as type is not "view"
	if ($type != RES_TYPE_VIEW) {
		echo '<input type="button" name="close" value="' . translate('Cancel') . '" class="button" onclick="window.close();" />';
	}
	// $is_owner = de res is op mijn naam
	if ($type != RES_TYPE_ADD && $is_owner) {
		print_export_button($res->id);
		echo ('<input type="button" name="btnPrint" value="' . translate('Print Contract') . '" class="button" ');
		echo ("onclick=\"prrrint('p','','','{$res->id}');\"/>");
		//echo ("<a type=\"button\" target=\"schedule\" class=\"button\" href=\"admin.php?tool=reservations&search=".$res->id."\" ");
		//echo (">Summmmary</a>"); 
		
				echo ('<input type="button" name="noname" value="' . translate('Summary this reservation') . '" class="button" ');
				echo ("onclick=\"window.open('admin.php?tool=reservations&search={$res->id}' , 'schedule');\"/>");
	} else {
			if ($type != RES_TYPE_ADD && Auth::isAdmin() ) { 
				//print 'is admin and type='.$type;
				
				print_export_button($res->id);
				echo ('<input type="button" name="btnPrint" value="' . translate('Print Contract') . '" class="button" ');
				echo ("onclick=\"prrrint('p','','','{$res->id}');\"/>");
			//	echo ("<a type=\"button\" target=\"schedule\" class=\"button\" href=\"admin.php?tool=reservations&search=".$res->id."\" value=\". translate('Summary this reservation') .\">". translate('Summary this reservation') . "</a>"); 
				
				echo ('<input type="button" name="noname" value="' . translate('Summary this reservation') . '" class="button" ');
				echo ("onclick=\"window.open('admin.php?tool=reservations&search={$res->id}' , 'schedule');\"/>");
			}
	}

	echo '</p>';

	if ($type != RES_TYPE_VIEW) {
		echo '</td><td><iframe id="execute" name="execute" width="100%" border="0"></iframe>';
	}	
	// verleng, start de check
	if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY ) {
		echo '</td><td align="right"><button type="button" name="check" value="' . translate('Check Availability') . '" class="button" onclick="check_reservation_form(document.forms[0]) && checkReservation(\'check.php\', \'reserve\', \'' . translate('Checking') . '\');">' . translate('Check Availability') . '</button></td><td>';
	}		
	// janrcluster: in geval van cluster, aparte check

	$verlengaanvraag = FALSE;
	if ($type == RES_TYPE_CLUSTER && ($verlengaanvraag == FALSE)) {	
// deze button enkel de nieuw toegevoegde artikel	
		echo '</td><td align="right"><button id="check-button" link="check-child.php" type="button" name="check" value="' . translate('Check Availability') . '" class="button" onclick="check_reservation_form(document.forms[0]) && checkReservation(jQuery(this).attr(\'link\'), \'reserve\', \'' . translate('Checking') . '\');">' . translate('Check Availability') . '</button></td><td>';
	}
	//if ($type == RES_TYPE_CLUSTER  && ($verlengaanvraag == FALSE)) {		
	// and if end_date/time is changes
// deze button alle artikelen
	//echo '</td><td align="right"><button id="check-button"  type="button" name="check" value="' . translate('Check Availability') . '" class="button" onclick="check_reservation_form(document.forms[0]) && checkReservation(jQuery(this).attr(\'link\'), \'reserve\', \'' . translate('Checking') . '\');">'.' Check-Availability-Verleng '. '</button></td><td>';
	//}

	// janr
	if ($is_owner) {			 
		echo '<input type="hidden" name="adminid" value="' . $res->user->get_id() . '" />' . "\n";	
				 }
	// print hidden fields
	if ($res->get_type() == RES_TYPE_ADD) {
		 echo '<input type="hidden"  name="override" length="1" value="" />' . "\n" ; //unused
		 echo '<input type="hidden"  id="overridex" length="1" value="" />' . "\n" ; //unused
        echo '<input type="hidden" name="machid" value="' . $res->get_machid(). '" />' . "\n"
			  . '<input type="hidden" name="scheduleid" value="' . $res->sched['scheduleid'] . '" />' . "\n"
			  . '<input type="hidden" name="pending" value="' . $res->get_pending(). '" />' . "\n"
			  . '<input type="hidden" name="uitleennivoxxx" value="' . $res->get_uitleennivo(). '" />' . "\n"
			
			  . '<input type="hidden" name="memberid" value="' . Auth::getCurrentID() . '" />' . "\n";
    }
    else {
	 echo '<input type="hidden"  name="override" length="1" value="" />' . "\n" ; //unused
	 echo '<input type="hidden"  id="overridex" length="1" value="" />' . "\n" ; //unused
        echo '<input type="hidden" name="machid" value="' . $res->get_machid(). '" />' . "\n"
			. '<input type="hidden" name="scheduleid" value="' . $res->sched['scheduleid'] . '" />' . "\n"
			. '<input type="hidden" name="resid" id="resid" value="' . $res->get_id() . '" />' . "\n"
			. '<input type="hidden" name="uitleennivoxxx" value="' . $res->get_uitleennivo(). '" />' . "\n"
			
			. '<input type="hidden" name="memberid" value="' . $res->get_memberid() . '" />' . "\n";
    }
?>
    </td>
  </tr>
  <?php
	if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_CLUSTER) {
  		echo '<tr><td colspan="3"><div id="checkDiv" style="display:none;width:100%;padding-top:15px;"></div></td></tr>';
	}
  ?>
</table>




<?php
}

/**
* This function prints out begin of aa table containing
*  all information about a given resource
* @param array $rs array of resource information
*/
function begin_print_resource_data_overzicht(&$rs, $colspan = 1) {

?>
<table width="90%" name="roverzicht" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr class="tableBorder">
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
<?php
}

/**
* This function prints out begin of aa table containing
*  all information about a given resource
* @param array $rs array of resource information
*/
function begin_print_resource_data(&$rs, $colspan = 1) {

?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr class="tableBorder">
    <td>
      <table  class="responsive-one-item reserve begin_print_resource_data" width="100%" border="0" cellspacing="1" cellpadding="0">
<?php
}
/**
* This function prints out end of a table containing
*  all information about a given resource
* @param array $rs array of resource information
*/
function end_print_resource_data(&$rs, $colspan = 1) {
?>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<?php
}	  

/** janr - old function, unused!
* Print out information about this resource
* This function prints out a table containing
*  all information about a given resource
* @param array $rs array of resource information
*/
function print_resource_data(&$rs, $colspan = 1) {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr class="tableBorder">
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td  class="formNames"><?php echo translate('Location')?></td>
          <td class="cellColor"><?php echo $rs['location']?>
          </td>
        </tr>
        <tr>
          <td  class="formNames"><?php echo translate('Phone')?></td>
          <td class="cellColor"><?php echo $rs['rphone']?>
          </td>
        </tr>
        <tr>
          <td  class="formNames"><?php echo translate('Notes')?></td>
          <td class="cellColor"><?php echo $rs['notes']?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<?php
}

/**
* Print ADDART BUTTON 
* @param array 
* @param array 
*/
function print_addart_link(&$rs, $type,$resid ) {	
	
// admin mode - dit is hoe admin het ziet.	 {  
	if  (Auth::isAdmin() && $type == RES_TYPE_CLUSTER) {
			
			echo ("<tr><td class=\"cellColor\"><b><div id=machname></div></b><span class=\"button\">".
			"<input type=\"hidden\"  name=\"machid1\" value=\"\" />".
			"<input type=\"hidden\"  name=\"uitleennivo1\" value=\"\" />".
			"<input type=\"hidden\"  name=\"resid\" value=\"$resid\" />".
			"&nbsp;&nbsp;<a id=selectmach class=\"positive\"href=\"javascript:window.open('resource_select.php?resid=$resid','selectresource','height=430,width=570,scrollbars=yes,resizable');void(0);\">" . translate('Add resource') . "</a></span>");
			echo ("</td><td class=\"cellColor\"></td></tr>");
	}
}
/**
* Print out information about the other slave resources in this reservation
* @param array $cluster array of resource information
*/
function print_rest_cluster ($resid, $clusters, $pending=false)
{
	//$this->cdresid = 				$clusters[$i]['resid'];		//
	// $this->cdreservation_status = 	$clusters[$i]['reservation_status'];
	//$this->cdresname = 				$clusters[$i]['name'];
	//echo ('<br>   '.$this->cdresid.'   '.$this->cdreservation_status.'   '.$this->cdresname);
		// endtest
	for ($i = 0; $i < count($clusters); $i++)  {
	 if ($clusters[$i]['resid'] <> $resid)			{ // niet de master
		?>
        <tr>
            <td class="cellColor"><b><?php 
			echo isset($clusters[$i]['name']) ? $clusters[$i]['name'] : '';  // resource name
			// echo ('  '.$clusters[$i]['resid'].' x '.$res->resid); // werkt
			// echo ('  '.$clusters[$i]['reservation_status'].' x '); // werkt
			?>
			</td><td class="cellColor">
			<?php  
// view mode - dit is hoe student het ziet.
			if ($pending) {
					echo translate('Pending Approval');
			} else {
			echo translate_status_res($clusters[$i]['reservation_status'])	;
					//echo ('testprint_rest_cluster: ' .translate_status_res($clusters[$i]['reservation_status'])	);
					// schrijf div die verlenginfo krijgt evt
			echo ('<div id="Verleng'.$clusters[$i]['resid'].'" style="display: inline; width: 100%; padding-left: 15px; text-align: left;"> ');
			// echo ('Verleng'.$clusters[$i]['resid']); // default is empty
			echo ('</div>');
			}
			
 			?>
			</td>
			<?php 
// admin mode - dit is hoe admin het ziet.	
// deze status checkbox	, in DEV mode, volgende if werkt niet	.
// $type = undefined
// echo ($type.' '. Auth::isAdmin()); // test	
		//	if (Auth::isAdmin() && ($type == RES_TYPE_MODIFY || $type == RES_TYPE_ADD)) {  
		if (FALSE) {
				?>		
				<td class="cellColor">test: <input type="checkbox" name="$clusters[$i]['reservation_status']" checked value="$clusters[$i]['reservation_status']" ></td>
				<?php
			}
			echo ('</tr>');
			
		} // endif
	} // endfor
}


/**
* Print out information about one resource in this reservation
* @param array $rs array of resource information
* @param array hier status info
*/
function print_resource_data_one_resource(&$rs, $type, $pending, $allowed_reservation_status, $allowed_reservation_status_cv, $resid) {
	// hier one row of one resource
			 ?>

        <tr>
            <td class="cellColor"><b><?php 
				//echo isset($rs['name']) ? $rs['name'].' '.$rs['machid'] : '';  // resource name test
				echo isset($rs['name']) ? $rs['name'] : '';  // resource name
			?>
			</td><td class="cellColor">
			<?php  
// view mode - dit is hoe student het ziet, en eerste res regel voor admin
			if ($pending) {
				echo translate('Pending Approval');
			} else {
			echo translate_status_res($allowed_reservation_status_cv);
			// echo ('<br>testprint_$allowed_reservation_status_cv: '.translate_status_res($allowed_reservation_status_cv) );	
			// echo ('<br>testprint_$allowed_reservation_status: '.translate_status_res($allowed_reservation_status) );	
			
			// schrijf div die verlenginfo krijgt evt
			echo ('<div id="Verleng'.$resid.'" style="display: inline; width: 100%; padding-left: 15px; text-align: left;"> ');
			// echo ('Verlengx'.$resid);
			echo ('</div>');
			}
 			?>
			</td>
			<?php 
			// admin mode - dit is hoe admin het ziet.	
			// DIT VERVALT GEHEEL			
			// if (Auth::isAdmin() && ($type == RES_TYPE_MODIFY || $type == RES_TYPE_ADD)) {  
			if (FALSE) {  ?>		
				<td class="cellColor"><input type="checkbox" name="$res->resid0" checked value="$res->resid" onclick="adminRowClick(this,'tr2',2);"></td>
			<?php
			}
			?>	
		</tr>
		
		<?php
}

/**janr
* Prints out a checkbox for - reservation_status 
* @param array $allowed_reservation_status - values from config;
* @param string $res->allowed_checkin_cv- the current value read from db
*/
function print_reservation_status_alt($type,$allowed_reservation_status, $allowed_reservation_status_cv) { ?>

<?php  if (Auth::isAdmin() && ($type == RES_TYPE_MODIFY || $type == RES_TYPE_ADD || $type == RES_TYPE_CLUSTER)) {  ?>		
<?php // if (Auth::isAdmin() && ($type == RES_TYPE_ADD )) {  ?>	
			  <tr>
			   <td  class="formNames">
						 </td><td colspan="2" class="cellColor"> 
				 <?php
				 echo '<select name="reservation_status" id="reservation_status" class="textbox">';
				 // i bepaald welke reservation_status wordt geboden voor update
				 for ($i = 0; $i < 4; $i++) {
					//echo translate_status_res($allowed_reservation_status[$i]);
					// echo $allowed_reservation_status_cv.' test ' .$allowed_reservation_status[$i];
					// if ($allowed_reservation_status_cv==0)
					//{
					//	echo "<option value=\"{$allowed_reservation_status[$i]}\">" . translate_status_res($allowed_reservation_status[$i]) . "</option>\n";
					//}else{
						echo "<option value=\"{$allowed_reservation_status[$i]}\"" . ($allowed_reservation_status_cv == $allowed_reservation_status[$i] ? ' selected="selected"' : '') . ">" . translate_status_res($allowed_reservation_status[$i]) . "</option>\n";
					//}
				 }
				 echo '</select>&nbsp;';
				 
				 if (Auth::isAdmin() && ($type == RES_TYPE_CLUSTER )) {  ?>	
					 <input type="checkbox" name="upd_status" value="yes" checked>
					 <?php echo (translate('Wijzig voor ALLE artikelen')); 
				 } else {
				  ?>
					<input type="hidden" name="upd_status" value="yes"  checked>
				 <?php 
				 }
				 ?>
				 
				 
				 
				&nbsp;</td>
			  </tr>
<?php } else { 
				// of waarde hidden doorgeven
				echo '<input type="hidden" name="reservation_status" id="reservation_status" value="' . $allowed_reservation_status_cv . '"/>';
	}  ?>
<?php
	
}
// close box (is een double table)
function print_table01_end() {
        // Close off table
        echo "</tr>\n</table>\n</td>\n</tr>\n</table>\n<p>&nbsp;</p>\n";
}


/**
* Print out available times or current reservation's time
* This function will print out all available times to make
*  a reservation or will print out the selected reservation's time
*  (if this is a view).
* @param array $res resource data array
* @param object $rs reservation object
* @param bool $print_min_max bool whether to print the min_max cells
* @param bool $allow_multi bool if multiple day reseravtions are allowed
* @global $conf
*/
function print_time_info($res, $rs, $print_min_max = true, $allow_multi = false, $toolate) {
	global $conf;

	$type = $res->get_type();
	$interval = $res->sched['timespan'];
	$startDay = $res->sched['daystart'];
	$endDay	  = $res->sched['dayend'];
?>
    <table width="100%" border="0" cellspacing="0" cellpadding="1" class="print_time_info">
     <tr class="tableBorder">
      <td>
       <table width="100%" class="responsive-one-item reserve print_time_info" border="0" cellspacing="1" cellpadding="0">
        
	   <tr>
	   <td class="formNames"><?php echo translate('Start');
	   // new! show message without consequence
	   if ( $res->type == RES_TYPE_ADD )	{ 	print (' &raquo '. translate('New Reservation'));}
	   ?></td>
	   <td class="formNames"><?php echo translate('End');
	   // too late! show message without consequence
			if ( $res->type <> RES_TYPE_ADD && $toolate )	{ 	print (' x '. translate('Too late'));}
	   ?></td>
	   </tr>
      
<?php
		$start_date = $res->get_start_date();
		$end_date = $res->get_end_date();
		
		/*
		* Janr, toegevoegd uitleenperiode: 
		* afhankelijk van werkplaats en resource rs-->uitleenperiode (0 1 2 3 of 4)			
		*/
		
		// jaro uitleenperiode start
		// init set org. schedule values
		$end_time_to_screen=$res->get_end();
		$end_date_to_screen=$res->get_end_date();
		// end init
		
		$up = $rs['uitleenperiode'];
		$adminemail=$res->sched['adminemail'];
		// alleen als nieuwe reservering
		if ( $res->type == RES_TYPE_ADD )	{
			if ($conf['uitleenperiode']==1) { 		// en module uitleenperiode is ON
				$test=' mod ON.';
				if ($conf[$adminemail]['up']==1){	// en module up deze werkplaats is ON
					$test .=' UP ON.';
					//$end_date_up = $res->get_end_date_up($up); // up= uitleenperiode value uit object resource
					$end_date = $res->get_end_date_up($up,$adminemail); // up= uitleenperiode value recalc
					$end_up = $res->get_end_up($up,$adminemail);
					
					//$end_time_to_screen=$end_up;

					// assign the new endtime, or not
					//if($res->get_end() < $end_up){ // new endtime gekregen
					if(0 <> $end_up){ // new endtime gekregen
						$end_time_to_screen=$end_up;
					}else{
						//$end_time_to_screen=$res->get_end();
					}
					//
					
				}
			}
	
		}
		


			// start testbox
			/*
			echo '<tr><td class="cellColor" colspan="2">';
			echo $test;
			echo ' up:'.$rs['uitleenperiode'];
			echo ' today:'.date("D");
			echo '='.date("w");
			echo ' starttime:'.$res->get_start_date();
			echo ' endtime old:'.$res->get_end_date();
			echo ' endtime new:'.$end_date;
			echo ' next tue:'.date('Y-m-d', strtotime('next tuesday'));
			echo ' next fri:'.date('Y-m-d', strtotime('next friday'));
			//echo ' endtime:'.$res->get_end();
			//echo ' new end:'.$end_up;
			//echo ' adminemail:'.$res->sched['adminemail'];
			
			
			echo '</td></tr>';
			*/
			// end testbox
			

			
		// jaro uitleenperiode1 end
		$display_start_date = Time::getAdjustedDate($res->get_start_date(), $res->get_start()); // timezone
		$display_end_date = Time::getAdjustedDate($end_date, $end_time_to_screen); // timezone

		// Show reserved time or select boxes depending on type
		// voor verleng: ook geval cluster zijn einddatum te wijzigen
		echo '<tr>';
        if ( ($type == RES_TYPE_ADD) || ($type == RES_TYPE_MODIFY) || ($type == RES_TYPE_APPROVE) || ($type == RES_TYPE_CLUSTER) ) {
            // Start time select box
            echo '<td class="cellColor" width="50%"><h5><div id="div_start_date" style="float:left;width:101px;">' . Time::formatDate($display_start_date, '1', false) . '</div><h5><input type="hidden" id="hdn_start_date" name="start_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $start_date) . '" onchange="checkCalendarDates();"/>';
			if ($allow_multi) {
				echo '<a href="javascript:void(0);"><img src="img/calendar.gif" border="0" id="img_start_date" alt="' . translate('Start') . '"/></a>'
                   . '&nbsp;&nbsp;&nbsp;&nbsp; ';
			}
			//echo "<div id=\"div_starttime\" style=\"float:right;width:101px;\"><select name=\"starttime\" class=\"textbox\" id=\"starttime\" onchange=\"updateEnd(this);\">\n";
			// jaro 01 2015- vervallen: update enddate naar start plus 1 uur
			echo "<div id=\"div_starttime\" style=\"float:right;width:101px;\"><select name=\"starttime\" class=\"textbox\" id=\"starttime\" >\n";
            // Start at startDay time, end 30 min before endDay
            for ($i = $startDay; $i < $endDay+$interval; $i += $interval) {
                echo '<option value="' . $i . '"';
                // If this is a modification, select corrent time
                if ( ($res->get_start() == $i) ) {
                    echo ' selected="selected" ';
				}
                echo '>' . Time::formatTime($i) . '</option>';
            }
            echo "</select>\n</div></td>\n";

            // End time select box

            echo '<td class="cellColor"><h5><div id="div_end_date" style="float:left;width:101px;">' . Time::formatDate($display_end_date, '1', false) . '</div></h5><input type="hidden" id="hdn_end_date" name="end_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $end_date) . '" onchange="checkCalendarDates();"/>';
			if ($allow_multi) {
			echo '<a href="javascript:void(0);"><img src="img/calendar.gif" border="0" id="img_end_date" alt="' . translate('End') . '"/></a>'
                   . '&nbsp;&nbsp;&nbsp;&nbsp; ';
            }
			echo "<div id=\"div_endtime\" style=\"float:right;width:101px;\"><select name=\"endtime\" class=\"textbox\" id=\"endtime\">\n";
			// Start at 30 after startDay time, end 30 at endDay time
            for ($i = $startDay; $i < $endDay+$interval; $i += $interval) {
				
                echo "<option value=\"$i\"";
                // If this is a modification, select correct time
                if ( ($end_time_to_screen == $i) ) {
                    echo ' selected="selected" ';
				}
                echo '>' . Time::formatTime($i) . "</option>\n";
            }
            echo "</select>\n</div></td>\n";
			if ($print_min_max & !$allow_multi) {
			//	echo '<tr class="cellColor">'
			//			. '</tr><td colspan="2">' . translate('Minimum Reservation Length') . ' ' . Time::minutes_to_hours($rs['minres'])
			//			. '</td></tr>'
			//			. '<tr class="cellColor">'
			//			. '<td colspan="2">' . translate('Maximum Reservation Length') . ' ' . Time::minutes_to_hours($rs['maxres'])
			//			. '</td>';
			}
        }
        else {
            echo '<td class="cellColor" width="50%"><h5><div id="div_start_date" style="float:left;width:140px;">' . Time::formatDate($start_date, '1', false) . '</div>' . Time::formatTime($res->get_start()) . "</h5></td>\n"
			      . '<td class="cellColor"><h5><div id="div_end_date" style="float:left;width:140px;">' . Time::formatDate($end_date, '1', false) . '</div>' . Time::formatTime($res->get_end()) . "</h5></td></tr>\n";

        }
		//print hiddenfields tvb check availability ajax logistics
		// JARO FALSE AS TEST
		if  ($type == RES_TYPE_CLUSTER && FALSE)   {
			echo ('<input type="hidden" id="hdn_start_date" name="start_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $start_date) . '" onchange="checkCalendarDates();"/>');
			echo ('<input type="hidden" id="hdn_end_date" name="end_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $end_date) . '" onchange="checkCalendarDates();"/>');

			echo ('	<input type="hidden"  value="'.$res->get_start().'" name="starttime">X');
			echo ('	<input type="hidden"  value="'.$res->get_end().'" name="endtime">X');
		}
		
		
        // Close off table
//        echo "</tr>\n</table>\n</td>\n</tr>\n</table>\n<p>&nbsp;</p>\n";
}

/**
* Print out information about reservation's owner
* This function will print out information about
*  the selected reservation's user.
* @param string $type viewing type
* @param Object $user User object of this user
*/
function print_user_info($type, $user) {
	if (!$user->is_valid()) {
		$user->get_error();
	}
	$user = $user->get_user_data();
	//var_dump ($user);
?>
   <table width="100%" border="0" cellspacing="0" cellpadding="1">
    <tr class="tableBorder">
     <td>
      <table width="100%"  class="responsive-one-item reserve print_user_info" border="0" cellspacing="1" cellpadding="0">
       <tr>
        <td colspan="2" class="cellColor"><h5 align="center">
		<div id="name" style="position: relative;float:left;"><b><h5><?php 
		
		// janr :geef link voor edit user ipv display name
		//echo $user['fname'] . ' ' . $user['lname'];
		//<input type="button" name="noname" value="Overzicht deze reservering" class="button"  //onclick="window.open('admin.php?tool=reservations&amp;search=pk159ccf90fdefa6' , 'schedule');">
		
		echo '<a target="_new" href=register.php?edit=true&memberid=' .$user['memberid']. '>' .$user['fname'] . ' ' . $user['lname']. '</a>';
		
		?>
		</h5></b></div>
		<?php
		// let op: indien student view only, dan moet hier iets anders geprint		
		if (Auth::isAdmin() && ($type == RES_TYPE_MODIFY || $type == RES_TYPE_ADD)) { echo "<span class=\"button\"><a href=\"javascript:window.open('user_select.php','selectuser','scrollbars=1','height=430,width=570,resizable');void(0);\">" . translate('Change') . '</a></span>'; } 
		?>	
		<?php
		// toon extra student info, enkel voor admin		
		if (Auth::isAdmin()) { 
		
		?>		

		        &nbsp;&nbsp;<a href="javascript: changeImage('plusmin');" onclick="showHideCpanelTable('studentsh');"><img align="right" id="plusmin" src="img/plus.gif"  border=0 alt="more" /></a></h5> 
		<?php } ?>
			
			<?php 
			$userstatustxt = CmnFns::validate_user ($user['osiris_ok_now'], $user['demerit_punt']); // userstatustext
			if ($userstatustxt<>null) echo ($userstatustxt); // print status
			?>
			</div></td></tr>
             
		  </table>
		  <div id="studentsh" style="display: <?php echo getShowHide('studentsh') ?>">
		       <table width="100%"  class="responsive-one-item reserve print_more_user_info" border="0" cellspacing="1" cellpadding="0">
			  <tr>
			   <td  class="formNames"><?php echo translate('Phone')?></td>
			   <td class="cellColor"><div id="phone" style="position: relative;"><?php echo $user['phone'];echo "&nbsp;&nbsp;&nbsp;";echo $user['phone_mob'];echo "&nbsp;&nbsp;&nbsp;";echo $user['phone2'];?></div></td>
			  </tr>
			  <tr>
			   <td  class="formNames"><?php echo translate('Email')?></td>
			   <td class="cellColor"><div id="email" style="position: relative;"><?php echo $user['email'];echo "&nbsp;&nbsp;&nbsp;";echo $user['email2'];?></div></td>
			  </tr>

	                                <tr>
                                  <td  class="formNames"><?php echo translate('klas')." ".translate('leenpermissie'); ?></td>
                                  <td class="cellColor">
								  
								  <span  id="klas"  style="position: relative;"><?php echo $user['klas']; echo "&nbsp;&nbsp;&nbsp;";?></span >
								  <span id="leenpermissie" style="position: relative;"><?php echo $user['leenpermissie']?></span>	  
								  
								 
								  <?php echo '<input type="hidden" name="leenpermissie1" value="' . $user['leenpermissie'] . '" />' . "\n" ?>
								  
								  </td>
                                </tr>							
                                <tr>
                                  <td  class="formNames"><?php echo translate('demerit_text')?></td>
                                  <td class="cellColor"><div id="demerit_punt" style="position: relative;"><?php echo $user['demerit_text']?></div></td>
                                </tr>

    <?php
}


/**
* Print out information about reservation's owner
* This function will print out checkin en checkout van deze reservering
* staticfields ook igv cluster gewijzigd worden
* @param string
* @param Object
*/
function print_checkoutin_info($type, $allowed_checkout, $allowed_checkout_cv, $allowed_checkin, $allowed_checkin_cv) {


		// Show logistics or select boxes depending on type
       // if ( ($type == RES_TYPE_ADD) || ($type == RES_TYPE_MODIFY) || ($type == RES_TYPE_APPROVE) ) 
	   // staticfields ook igv cluster gewijzigd worden
        //if ( (Auth::isAdmin()) && ( ($type == RES_TYPE_ADD) || ($type == RES_TYPE_MODIFY) || ($type == RES_TYPE_APPROVE) )) 
		if ( (Auth::isAdmin()) && ( ($type == RES_TYPE_ADD) || ($type == RES_TYPE_MODIFY) || ($type == RES_TYPE_APPROVE) || ($type == RES_TYPE_CLUSTER) )) 
		{
		?>
   								<tr>
                                  <td  class="cellColor"><?php  // class="cellColor"
								  // janr, dit hoeft niet, 2 regels , sept 2012
								//	echo '<input type="hidden" name="checkout_via" id="checkout_via" value="' . $res->sched['checkout_via'] . '"/>';
								echo translate('checkout_via') . ' ';
									
									echo '<select name="checkout_via" id="checkout_via" class="textbox">';
									//echo '<option value="'.translate('Zelf').'">' . translate('Zelf') . '</option>';
									 for ($i = 0; $i < count($allowed_checkout); $i++) {
										if ($allowed_checkout_cv=='')
										{
											echo "<option value=\"{$allowed_checkout[$i]}\">" . $allowed_checkout[$i] . "</option>\n";
										}else{
											echo "<option value=\"{$allowed_checkout[$i]}\"" . ($allowed_checkout_cv == $allowed_checkout[$i] ? ' selected="selected"' : '') . ">" . $allowed_checkout[$i] . "</option>\n";
										}
									 }
									 echo '</select><br/>';
									?>
								  </td>
                               
                                  <td  class="cellColor"><?php
								// janr, dit hoeft niet, 2 regels , sept 2012
								//	 echo '<input type="hidden" name="checkin_via" id="checkin_via" value="' . $res->sched['checkin_via'] . '"/>';
								echo translate('checkin_via') . ' '; ?>
									
									
									<?php 	 
									echo '<select name="checkin_via" id="checkin_via" class="textbox">';
									// echo '<option value="'.translate('Zelf').'">' . translate('Zelf') . '</option>';
									 for ($i = 0; $i < count($allowed_checkin); $i++) {
										// echo $allowed_checkin_cv.' ' .$allowed_checkin[$i];
										if ($allowed_checkin_cv=='')
										{
											echo "<option value=\"{$allowed_checkin[$i]}\">" . $allowed_checkin[$i] . "</option>\n";
										}else{
											echo "<option value=\"{$allowed_checkin[$i]}\"" . ($allowed_checkin_cv == $allowed_checkin[$i] ? ' selected="selected"' : '') . ">" . $allowed_checkin[$i] . "</option>\n";
										}
									 }
									 echo '</select><br/></td></tr>';
	 
		}else{
									 ?>
   								<tr>
                                  <td  class="cellColor"><?php  
									echo translate('checkout_via') . ' ';
									echo $allowed_checkout_cv;
									?>
								  </td>
                                  <td  class="cellColor"><?php
								  	echo translate('checkin_via') . ' ';
									echo $allowed_checkin_cv;							
									echo '</td></tr>';
	 	}
		
		
	// end view only mode Show logistics or select boxes depending on type
}

/**
* Print out created and modifed times in a table, if they exist
* @param int $c created timestamp
* @param int $m modified stimestamp
*/
function print_create_modify($c, $m) {
?>

       <tr>
       <td class="formNames" ><?php echo translate('Created')?></td>
       <td class="cellColor"><?php echo Time::formatDateTime($c)?></td>
	   </tr>
       <tr>
       <td class="formNames"><?php echo translate('Last Modified')?></td>
       <td class="cellColor"><?php echo !empty($m) ? Time::formatDateTime($m) : translate('N/A') ?></td>
       </tr>
 
<?php
}

/**
* Print out the reservation summary or a box to add/edit one
* @param string $summary summary to edit
* @param string $contractsoort summary to edit
* @param string $type type of reservation
*/
function print_contractform($summary, $contractsoort, $type) {
?>
<tr>
        <td  class="formNames"><?php echo translate('Contractform') ?></td>
        <td class="cellColor"><div id="contract" style="position: relative;">
		<?php 
		// $res->adminMode
		if ((Auth::isAdmin()) && ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_APPROVE || $type == RES_TYPE_CLUSTER)) {
			echo '<input type="radio" name="contractsoort" value="0" ' . (($contractsoort==0) ? 'checked="checked"' : '') . ' />' .  translate('Contract1');
			echo '<input type="radio" name="contractsoort" value="1" ' . (($contractsoort==1) ? 'checked="checked"' : '') . ' />' .  translate('Contract2');
		}else {
			if ($contractsoort==0) {echo translate('Contract1'); }
			if ($contractsoort==1) {echo translate('Contract2'); }
			if ($contractsoort<0 || $contractsoort>2){
				$contractsoort=0; // default
				echo translate('N/A');
			}
		}
		  ?></div></td>
       </tr>
	   <!--<tr><td style="height:1px"></td></tr>    force blue line -->
       				
      
<?php
}

/**
* Print out the reservation summary or a box to add/edit one
* @param string $summary summary to edit
* @param string $contractsoort summary to edit
* @param string $type type of reservation
*/
function print_summaryform($summary, $contractsoort, $type) {
?>
       <tr>
	    <td class="formNames" ><?php echo translate('Summary')?></td>
		
		<td class="cellColor"  style="text-align: left;">
		<?php
		//
		if ((Auth::isAdmin())) {
			if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_APPROVE || $type == RES_TYPE_CLUSTER) {
				echo '<div id="summary_div"><textarea class="textbox" name="summary" rows="3" cols="50">' . $summary . '</textarea></div>';
			}else {
				echo (!empty($summary) ? CmnFns::html_activate_links($summary) : translate('N/A'));
			}
		}else{
		// userlogin: de note box is veel smaller
		if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_APPROVE || $type == RES_TYPE_CLUSTER) {
				echo '<div id="summary_div"><textarea class="textbox" name="summary" rows="6" cols="25">' . $summary . '</textarea></div>';
			}else {
				echo (!empty($summary) ? CmnFns::html_activate_links($summary) : translate('N/A'));
			}
		}
		?>
		</td>
	   </tr>								
      
<?php
}

/**
* Print out the end box 

*/
function print_table02_end() {
?>
								
      </table>
     </td>
    </tr>
   </table>
<?php
}





/** janrrepeat dit gaat vervallen janrrepeat
/**
* Prints out a checkbox to modify all recurring (= repeat, janr )reservations associated with this one
* @param string $parentid id of parent reservation
*/
function print_recur_checkbox($parentid) {
	?>
	<p align="left"><input type="checkbox" name="mod_recur" value="<?php echo $parentid?>" /><?php echo translate('Update all recurring records in group')?></p>
	<?php
}

function print_del_checkbox() {
?>
	<p align="left"><input type="checkbox" name="del" value="true" /><?php echo translate('Delete?')?></p>
<?php
}

/** janrrepeat dit gaat vervallen 

* Prints a box where users can select if they want
*  to repeat a reservation
* @param int $month month of current reservation
* @param int $year year of current reservation
*/
function print_repeat_box($month, $year) {
// display NO
	global $days_abbr;

// http://php.brickhost.com/forums/index.php?topic=2786.0
?>
<table width="200" border="0" cellspacing="0" cellpadding="0" class="recur_box" id="repeat_table"  style="display:none">
  <tr>
    <td style="padding: 5px;">
	 <p style="margin-bottom: 8px;">
	  <?php echo translate('Repeat every')?><br/>
	  <select name="frequency" class="textbox">
	    <option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	  </select>
      <select name="interval" class="textbox" onchange="javascript: showHideDays(this);">
	    <option value="none"><?php echo translate('Never')?></option>
	    <option value="day"><?php echo translate('Days')?></option>
	    <option value="week"><?php echo translate('Weeks')?></option>
		<option value="month_date"><?php echo translate('Months (date)')?></option>
	    <option value="month_day"><?php echo translate('Months (day)')?></option>
      </select>
    </p>
	<div id="week_num" style="position: relative; visibility: hidden; overflow: show; display: none;">
	<p>
	<select name="week_number" class="textbox">
	  <option value="1"><?php echo translate('First Days')?></option>
	  <option value="2"><?php echo translate('Second Days')?></option>
	  <option value="3"><?php echo translate('Third Days')?></option>
	  <option value="4"><?php echo translate('Fourth Days')?></option>
	  <option value="last"><?php echo translate('Last Days')?></option>
	</select>
	</p>
	</div>
	<div id="days" style="position: relative; visibility: hidden; overflow: show; display: none;">
        <p style="margin-bottom: 8px;">
		<?php echo translate('Repeat on')?><br/>
        <input type="checkbox" name="repeat_day[]" value="0" /><?php echo $days_abbr[0]?><br />
		<input type="checkbox" name="repeat_day[]" value="1" /><?php echo $days_abbr[1]?><br />
		<input type="checkbox" name="repeat_day[]" value="2" /><?php echo $days_abbr[2]?><br />
		<input type="checkbox" name="repeat_day[]" value="3" /><?php echo $days_abbr[3]?><br />
		<input type="checkbox" name="repeat_day[]" value="4" /><?php echo $days_abbr[4]?><br />
		<input type="checkbox" name="repeat_day[]" value="5" /><?php echo $days_abbr[5]?><br />
		<input type="checkbox" name="repeat_day[]" value="6" /><?php echo $days_abbr[6]?>
        </p>
	</div>
	<div id="until" style="position: relative;">
		<p>
		<?php echo translate('Repeat until date')?>
		<div id="_repeat_until" style="float:left;width:140px;font-size:11px;"><?php echo translate('Choose Date')?></div><input type="button" id="btn_choosedate" value="..." />
		<input type="hidden" id="repeat_until" name="repeat_until" value="" />
		</p>
	</div>
	</td>
  </tr>
</table>
<?php
}

/**
* Prints out the box where users can select when to get a reminder
* @param array $reminder_times the minutes that are shown in the selection box
* @param int $selected_minutes the currently selected minutes
* @param string $reminderid id of the reminder to modify
*/
function print_reminder_box($reminder_times, $selected_minutes, $reminderid) {
	if (empty($reminder_times)) {
		return;
	}
?>
<table width="200" border="0" cellspacing="0" cellpadding="0" class="recur_box" id="reminder_table" style="margin-top:5px;">
  <tr>
    <td style="padding: 5px;">
	 <?php
	 echo '<input type="hidden" name="reminderid" id="reminderid" value="' . $reminderid . '"/>';
	 echo translate('Reminder') . ' ';
	 echo '<select name="reminder_minutes_prior" id="reminder_minutes_prior" class="textbox">';
	 echo '<option value="0">' . translate('Never') . '</option>';
	 for ($i = 0; $i < count($reminder_times); $i++) {
	 // als dit niet goed selekteerd zie regel rond 960 voor idem

		echo "<option value=\"{$reminder_times[$i]}\"" . ($selected_minutes == $reminder_times[$i] ? 'selected="selected"' : '') . ">" . Time::minutes_to_hours($reminder_times[$i]) . "</option>\n";
	 }
	 echo '</select><br/>';
	 echo translate('before reservation')
	 ?>
	</td>
  </tr>
</table>
<?php
}

/**
* Prints a box where users can select if they want
*  to repeat a reservation
* @param int $month month of current reservation
* @param int $year year of current reservation
*/
function print_pending_approval_msg() {
?>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td style="padding: 5px;">
	           <p style="font-weight: bold;" align="center"><?php echo translate('This reservation must be approved by the administrator.')?></p>
	       </td>
        </tr>
      </table>
     </td>
    </tr>
</table>
<?php
}
/**janr
* Prints out a checkbox for - checkout_via -checkin_via -reservation_status
* @param array $allowed_checkout - values from config;
* @param string $res->allowed_checkout_cv- the current value read from db
*/
function print_checkout_via($allowed_checkout, $allowed_checkout_cv) {
	?>

<table width="200" border="0" cellspacing="0" cellpadding="0" class="recur_box" id="checkout_table" style="margin-top:5px;">
  <tr>
    <td style="padding: 5px;">
	 <?php
	 echo '<input type="hidden" name="checkout_via" id="checkout_via" value="' . $res->sched['checkout_via'] . '"/>';
	 echo translate('checkout_via') . ' ';
	// echo '$allowed_checkout ' .$allowed_checkout . '<br>$allowed_checkout_cv '. $allowed_checkout_cv.'<br>$res->selected_checkout' . $res->selected_checkout. '<br>'; //test
	 echo '<select name="checkout_via" id="checkout_via" class="textbox">';
	 echo '<option value="'.translate('Zelf').'">' . translate('Zelf') . '</option>';
	 for ($i = 0; $i < count($allowed_checkout); $i++) {
		// echo $allowed_checkout_cv.' ' .$allowed_checkout[$i];
		if ($allowed_checkout_cv=='')
		{
			echo "<option value=\"{$allowed_checkout[$i]}\">" . $allowed_checkout[$i] . "</option>\n";
		}else{
			echo "<option value=\"{$allowed_checkout[$i]}\"" . ($allowed_checkout_cv == $allowed_checkout[$i] ? ' selected="selected"' : '') . ">" . $allowed_checkout[$i] . "</option>\n";
		}
	 }
	 echo '</select><br/>';
	 ?>
	</td>
  </tr>
</table>
<?php
}
/**janr
* Prints out a checkbox for - checkin_via 
* @param array $allowed_checkin - values from config;
* @param string $res->allowed_checkin_cv- the current value read from db
*/
function print_checkin_via($allowed_checkin, $allowed_checkin_cv) {
	?>

<table width="200" border="0" cellspacing="0" cellpadding="0" class="recur_box" id="ckeckin_table" style="margin-top:5px;">
  <tr>
    <td style="padding: 5px;">
	 <?php
	 echo '<input type="hidden" name="checkin_via" id="checkin_via" value="' . $res->sched['checkin_via'] . '"/>';
	 echo translate('checkin_via') . ' ';
	 // test echo '$allowed_checkin ' .$allowed_checkin . '<br>$allowed_checkin_cv '. $allowed_checkin_cv. '<br>$res->selected_checkin' . $res->selected_checkin. '<br>';
	 echo '<select name="checkin_via" id="checkin_via" class="textbox">';
	 echo '<option value="'.translate('Zelf').'">' . translate('Zelf') . '</option>';
	 for ($i = 0; $i < count($allowed_checkin); $i++) {
		// echo $allowed_checkin_cv.' ' .$allowed_checkin[$i];
		if ($allowed_checkin_cv=='')
		{
			echo "<option value=\"{$allowed_checkin[$i]}\">" . $allowed_checkin[$i] . "</option>\n";
		}else{
			echo "<option value=\"{$allowed_checkin[$i]}\"" . ($allowed_checkin_cv == $allowed_checkin[$i] ? ' selected="selected"' : '') . ">" . $allowed_checkin[$i] . "</option>\n";
		}
	 }
	 echo '</select><br/>';
	 ?>
	</td>
  </tr>
</table>
<?php
}

	/** janr
	* Prints out all the error messages in an error box
	* @param boolean $kill whether to kill the app after printing messages
	*/
	function print_warning($msg,$kill=false) {

		if ($kill) $msg .= ' - dying...2';
		echo '<script language="JavaScript" type="text/javascript">' . "\n"
			. 'if (window.parent!=self)'
			. "jQuery('#checkDiv',window.parent.document).html('<td width=\"25\"><img src=\"img/x.gif\" alt=\"not ok\"/></td><div class=\"messageNegative\">$msg</div>').show();\n"
			. "else alert('$msg');". "\n"
			. '</script>';
		//if ($kill) go_dead();
		if ($kill) die('...this pages has ended.');
	}



function print_export_button($id) {
?>
	<input type="button" onclick="showHere(this, 'export_menu');" class="button" value="<?php echo translate('Export')?>"></input>
	<div id="export_menu" class="export_menu" onMouseOut="showHide('export_menu');">
	<table width="100%" cellpadding="0" cellspacing="1" border="0">
		<tr>
			<td class="export_menu_out" onmouseover="switchStyle(this,'export_menu_over');" onmouseout="switchStyle(this, 'export_menu_out');" onclick="openExport('ical', '<?php echo $id ?>');">iCalendar</td>
		</tr>
		<tr>
			<td class="export_menu_out" onmouseover="switchStyle(this,'export_menu_over');" onmouseout="switchStyle(this, 'export_menu_out');" onclick="openExport('vcal', '<?php echo $id ?>');">vCalendar</td>
		</tr>
	</table>
	</div>
<?php
}

/**
* Closes reserve form
* @param none
*/
function end_reserve_form() {
	echo "</form>\n";
}

// testing dates
function janr_test() {
			// Describe the formats.
			$strftimeFormats = array(
				'A' => 'A full textual representation of the day',
				'B' => 'Full month name, based on the locale',
				'C' => 'Two digit representation of the century (year divided by 100, truncated to an integer)',
				'D' => 'Same as "%m/%d/%y"',
				'E' => '',
				'F' => 'Same as "%Y-%m-%d"',
				'G' => 'The full four-digit version of %g',
				'H' => 'Two digit representation of the hour in 24-hour format',
				'I' => 'Two digit representation of the hour in 12-hour format',
				'J' => '',
				'K' => '',
				'L' => '',
				'M' => 'Two digit representation of the minute',
				'N' => '',
				'O' => '',
				'P' => 'lower-case "am" or "pm" based on the given time',
				'Q' => '',
				'R' => 'Same as "%H:%M"',
				'S' => 'Two digit representation of the second',
				'T' => 'Same as "%H:%M:%S"',
				'U' => 'Week number of the given year, starting with the first Sunday as the first week',
				'V' => 'ISO-8601:1988 week number of the given year, starting with the first week of the year with at least 4 weekdays, with Monday being the start of the week',
				'W' => 'A numeric representation of the week of the year, starting with the first Monday as the first week',
				'X' => 'Preferred time representation based on locale, without the date',
				'Y' => 'Four digit representation for the year',
				'Z' => 'The time zone offset/abbreviation option NOT given by %z (depends on operating system)',
				'a' => 'An abbreviated textual representation of the day',
				'b' => 'Abbreviated month name, based on the locale',
				'c' => 'Preferred date and time stamp based on local',
				'd' => 'Two-digit day of the month (with leading zeros)',
				'e' => 'Day of the month, with a space preceding single digits',
				'f' => '',
				'g' => 'Two digit representation of the year going by ISO-8601:1988 standards (see %V)',
				'h' => 'Abbreviated month name, based on the locale (an alias of %b)',
				'i' => '',
				'j' => 'Day of the year, 3 digits with leading zeros',
				'k' => '',
				'l' => 'Hour in 12-hour format, with a space preceeding single digits',
				'm' => 'Two digit representation of the month',
				'n' => 'A newline character ("\n")',
				'o' => '',
				'p' => 'UPPER-CASE "AM" or "PM" based on the given time',
				'q' => '',
				'r' => 'Same as "%I:%M:%S %p"',
				's' => 'Unix Epoch Time timestamp',
				't' => 'A Tab character ("\t")',
				'u' => 'ISO-8601 numeric representation of the day of the week',
				'v' => '',
				'w' => 'Numeric representation of the day of the week',
				'x' => 'Preferred date representation based on locale, without the time',
				'y' => 'Two digit representation of the year',
				'z' => 'Either the time zone offset from UTC or the abbreviation (depends on operating system)',
				'%' => 'A literal percentage character ("%")',
			);

			// Results.
			$strftimeValues = array();

			// Evaluate the formats whilst suppressing any errors.
			foreach($strftimeFormats as $format => $description){
				if (False !== ($value = @strftime("%{$format}"))){
					$strftimeValues[$format] = $value;
				}
			}

			// Find the longest value.
			$maxValueLength = 2 + max(array_map('strlen', $strftimeValues));

			// Report known formats.
			foreach($strftimeValues as $format => $value){
				echo "Known format   : '{$format}' = ", str_pad("'{$value}'", $maxValueLength), " ( {$strftimeFormats[$format]} )\n";
			}

			// Report unknown formats.
			foreach(array_diff_key($strftimeFormats, $strftimeValues) as $format => $description){
				echo "Unknown format : '{$format}'   ", str_pad(' ', $maxValueLength), ($description ? " ( {$description} )" : ''), "\n";
			}
}

// end janrtest
/**
* Splits the table into two columns
*/
function divide_table() {
?>
</td>
<td style="vertical-align: top; padding-left: 15px;">
<?php
}
/**
* Returns the proper expansion type for this table
*  based on cookie settings
* @param string table name of table to check
* @return either 'block' or 'none'
*/
function getShowHide($table) {
	if (isset($_COOKIE[$table]) && $_COOKIE[$table] == 'hide') {
		return 'none';
	}
	else
		return 'block';
}

/**
* Prints out the javascript necessary to set up the calendars for choosing recurring dates, start/end dates
* @param Reservation $res reservation to populate the calendar dates with
*/
function print_jscalendar_setup(&$res, $rs) {
	global $dates;
	$allow_multi = (isset($rs['allow_multi']) && $rs['allow_multi'] == 1);
?>

<script type="text/javascript">
var now = new Date(<?php echo date('Y', $res->start_date) . ',' . (intval(date('m', $res->start_date))-1) . ',' . date('d', $res->start_date)?>);
<?php
if ($res->get_type() == RES_TYPE_ADD) { //janr, repeat table uitzetten!
// if (false) { //janr, repeat table uitzetten!
?>
// Recurring calendar
Calendar.setup(
{
inputField : "repeat_until", // ID of the input field
ifFormat : "<?php echo '%m' . INTERNAL_DATE_SEPERATOR . '%d' . INTERNAL_DATE_SEPERATOR . '%Y'?>", // the date format
button : "btn_choosedate", // ID of the button
date : now,
displayArea : "_repeat_until",
daFormat : "<?php echo $dates['general_date_named']?>" // the date format
}
);
<?php }  if ($allow_multi && ($res->get_type() == RES_TYPE_ADD || $res->get_type() == RES_TYPE_MODIFY || $res->get_type() == RES_TYPE_CLUSTER)) { ?>
//php Start date calendar
Calendar.setup(
{
inputField : "hdn_start_date", // ID of the input field
ifFormat : "<?php echo '%m' . INTERNAL_DATE_SEPERATOR . '%d' . INTERNAL_DATE_SEPERATOR . '%Y'?>", // the date format
daFormat : "<?php echo $dates['general_date_named']?>", // the date format
button : "img_start_date", // ID of the button
date : now,
displayArea : "div_start_date"
}
);
// End date calendar
Calendar.setup(
{
inputField : "hdn_end_date", // ID of the input field
ifFormat : "<?php echo '%m' . INTERNAL_DATE_SEPERATOR . '%d' . INTERNAL_DATE_SEPERATOR . '%Y'?>", // the date format
daFormat : "<?php echo $dates['general_date_named']?>", // the date format
button : "img_end_date", // ID of the button
date : now,
displayArea : "div_end_date"
}
);
<?php
	}
echo '</script>';
}
?>