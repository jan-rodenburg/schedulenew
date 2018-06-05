<?php
/**
* This file provides output functions for print.php
* janr: het print een reservering
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
function print_mod() {
	// echo $mod;
}
/**
* Print out the header of the schedule
* @param string $header = $_SESSION[sessionAdmin], identifier for the schedule
*/
function print_header($header) {
	global $conf;
	echo $conf[$header]['contractheader'];
	}

/**
* Print out the resource name
* @param string $name name of the resource
* @param string $lname name of user
* @param string $fname name of user
*/
function print_title($id, $fname, $lname) {
// janr: de naam van de reservering is niet artikel maar student
	if (!$res->is_blackout && !$is_private) {
		//echo '<table width="100%" border="0" cellspacing="3" cellpadding="0">
		
		echo '<tr><td class="cellColor1" colspan="2"><div style="font-weight:bold;">'.translate('Contract').' &raquo; '.$id. '</div>';
		echo "<div style=\"font-weight:bold;\" class=\"cellColor1 w50 groot \">"; 
		//echo "to &raquo; ".$fname ." ".$lname ."</div></td>\n"; // usernaam
		echo "</div></td>\n"; // usernaam
	}
	if ($res->is_blackout) {
		echo '<table width="100%" border="0" cellspacing="3" cellpadding="0">
<tr><td class="cellColor1" ><p style="margin-left:10px;font-weight:bold;">'. translate ('Blackout'). '</h3></td>'; // 
	}
	if ($is_private) {
			echo '<table width="100%" border="0" cellspacing="3" cellpadding="0">
<tr><td class="cellColor1" ><p style="margin-left:10px;font-weight:bold;">'. translate ('Private'). '</h3></td>'; // 
	}
}
/**
* Print out created and modifed times in a table, if they exist
* @param int $c created timestamp
* @param int $m modified stimestamp
*/
function print_create_modify($c, $m) {
?>
     
       <td class="cellColor1" id="print_create_modify" align="right"><?php echo translate('Created')?><br><?php echo translate('Last Modified')?></td>
	
       <td class="cellColor1"><?php echo Time::formatDateTime($c)?><br><?php echo !empty($m) ? Time::formatDateTime($m) : translate('N/A') ?></td>
       </tr>
	   <tr><td  align="right" colspan=4>&nbsp;</td></tr></table>
	  <br><br>
<?php
}


/**
* Begins the outer reservation table.  This prints out the tabs for basic/advanced
* and switches between them
* @param none
*/
function begin_container() {


?>
<!-- begin tabs bovenin -->



<table width="100%" cellspacing="3" cellpadding="0" border="0" class="tab-main-print ">
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
      <div id="pnl_basic">

			<!-- Content begin -->
<?php

	// janr checkin checkout, toegevoegd
	$allowed_checkout = $conf['app']['allowed_checkout']; // get array values from config
	$allowed_checkin = $conf['app']['allowed_checkin']; // get array values from config

	// // start  table
	// date time location
		print_time_info($res, $rs, !$res->is_blackout, (isset($rs['allow_multi']) && $rs['allow_multi'] == 1),$toolate,$res->checkout_via,  $res->checkin_via);	// start  table
		//print_checkoutin_info( $res->checkout_via,  $res->checkin_via);	// checkoutin
		//endtable
		if (!$is_private) {
			print_summaryform($res->summary,$res->contractsoort, $res->type); //open en sluit
		}
		// print_table01_end();	
	// end table	


	// begin resource data
		begin_print_resource_data($rs, ($res->type == RES_TYPE_ADD ? 2 : 1));		//table start
			print_resource_data_one_resource($rs, $res->type, (bool)$res->get_pending(), $allowed_reservation_status, $res->reservation_status);		
			$orig_reservation_status = $res->reservation_status;	// Janr Store the original reservation_status FOR WARNING CHECKS	
			print_rest_cluster ($res->id ,$clusters);
			
			print_additional_resource($res);
					
			// janr : print dropbox - with selected do...
			$allowed_reservation_status = $conf['app']['allowed_reservation_status']; // which status can a reservation have. get array values from config
			print_reservation_status_altxxxxx($res->type, $allowed_reservation_status, $res->reservation_status);
		end_print_resource_data($rs, ($res->type == RES_TYPE_ADD ? 2 : 1));	//table end		
	// end resource data

	
	//if (!$res->is_blackout && !$is_private) {
			
	//		print_user_info($res->type, $res->user);	// user
	//	}
	//print_table02_end();	// Close off table
	print_finalnote($res->contractsoort,$res->user,$_SESSION[sessionAdmin]);	// final text
	print_table01_end();	
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
	  
<script type="text/javascript">
	// prrrint
	//if (document.readyState=="complete") 
		window.setTimeout(function () {
				printpage();
		}, 500);	
</script>
<?php


}

// end add resources panel janr

function print_additional_tab($res, $all_resources, $is_owner, $viewable) {
// print_r ($all_resources);
?>
<!-- Begin additional panel -->
     <div id="pnl_additional" style="display:none; width:100%; position: relative;">
        <table width="100%" cellpadding="0" cellspacing="3" border="0" class="pnl_additional">
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
					<br/><select name="all_resources[]" id="all_resources" class="textbox" multiple="multiple" size="10" style="width:330px;">
					<?php
					for ($i = 0; $i < count($all_resources); $i++) {
						echo "<option value=\"{$all_resources[$i]['resourceid']}\">{$all_resources[$i]['name']}</option>\n";
					}
					?>
					</select>
					</td>
					<td valign="middle" align="center">
					<button type="button" id="add_to_additionalresource" class="button" onclick="javascript: moveSelectItems('all_resources','selected_resources');" style="width:75px;font-size:12px;">&raquo;&raquo;</button>
					<br/><br/>
					<?php echo translate('Hold CTRL to select multiple')?>
					<br/><br/>
					<button type="button" id="remove_from_additionalresource" class="button" onclick="javascript: moveSelectItems('selected_resources','all_resources');" style="width:75px;font-size:12px;">&laquo;&laquo;</button>
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
						echo "<p>{$res->resources[$i]['name']}</p>";
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
// end add resources panel janr

function print_additional_tabmy($res, $all_resources, $is_owner, $viewable) {
// print_r ($all_resources);
?>
<!-- Begin additional panel -->
    
        <table width="100%" cellpadding="0" cellspacing="3" border="0" class="pnl_additional">
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
					<br/><select name="all_resources[]" id="all_resources" class="textbox" multiple="multiple" size="10" style="width:330px;">
					<?php
					for ($i = 0; $i < count($all_resources); $i++) {
						echo "<option value=\"{$all_resources[$i]['resourceid']}\">{$all_resources[$i]['name']}</option>\n";
					}
					?>
					</select>
					</td>
					<td valign="middle" align="center">
					<button type="button" id="add_to_additionalresource" class="button" onclick="javascript: moveSelectItems('all_resources','selected_resources');" style="width:75px;font-size:12px;">&raquo;&raquo;</button>
					<br/><br/>
					<?php echo translate('Hold CTRL to select multiple')?>
					<br/><br/>
					<button type="button" id="remove_from_additionalresource" class="button" onclick="javascript: moveSelectItems('selected_resources','all_resources');" style="width:75px;font-size:12px;">&laquo;&laquo;</button>
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
						echo "<p>{$res->resources[$i]['name']}</p>";
					}
					echo '</td>';
				}
			}
		  ?>
			<!-- End content -->
          </tr>
        </table>

	  <!-- End additional panel -->
<?php
}

/** // 'janr print Accessories'
* Prints out view only van de accessoires
*/
function xprint_accessories ($res) {
	$resources = $res->db->get_sup_resources($res->id);
	echo '<tr><td  colspan="2"> </td></tr>';
	echo '<tr><td class="cellColor1" valign="top"><p style="font-weight:bold;">' . translate('Accessories') . '</p></td><td class="cellColor1">';
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
* Closes all tags opened by begin_container()
* @param none
*/
function end_container() {
?>
	<!-- end_container() -->
    </td>
  </tr>
</table>	
<?php
}

/**
* Prints all the buttons and hidden fields
* @param object $res Reservation object to work with
*/
function print_buttons_and_hidden(&$res) {
?>
<table width="100%" cellpadding="0" cellspacing="3" border="0">
  <tr>
    <td>
<?php
	$is_owner = ($res->user->get_id() == Auth::getCurrentID());
	if ($is_owner) {
	// testing	echo ( 'ownername:' . $res->user->get_id(). ' ' . $res->user->get_name() );
		}
	$type = $res->get_type();
    // Print buttons depending on type
	// janr dit is verplaatst naar reserve 248	 . '&nbsp;&nbsp;&nbsp;<input type="button" name="btnPrint" value="' . translate('Print Contract') . '" class="button" onclick="selectAllOptions(this);"/><input type="hidden" name="print" value="print" />';

    echo '<p>';
	switch($type) {
	// disabled="disabled"
		case RES_TYPE_CLUSTER :
            echo '<input type="submit"  name="btnSubmit" value="' . translate('Savetocluster') . '" class="button" onclick="selectAllOptions(this);"/>'
				. '<input type="hidden" name="fn" value="cluster" />';

	    break;
  	    case RES_TYPE_MODIFY :
            echo '<input type="submit" name="btnSubmit" value="' . translate('Save') . '" class="button" onclick="selectAllOptions(this);"/>'
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
		echo '&nbsp;&nbsp;&nbsp;<input type="button" name="close" value="' . translate('Cancel') . '" class="button" onclick="window.close();" />';
	}
	if ($type != RES_TYPE_ADD && $is_owner) {
		echo '&nbsp;&nbsp;';
		print_export_button($res->id);
	}

	echo '</p>';


	if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY ) {
		echo '</td><td align="right"><button type="button" name="check" value="' . translate('Check Availability') . '" class="button" onclick="check_reservation_form(document.forms[0]) && checkReservation(\'check.php\', \'reserve\', \'' . translate('Checking') . '\');">' . translate('Check Availability') . '</button></td><td>';
	}		
	// janrcluster: in geval van cluster, aparte check
	if ($type == RES_TYPE_CLUSTER) {		
		echo '</td><td align="right"><button id="check-button" link="check-child.php" type="button" name="check" value="' . translate('Check Availability') . '" class="button" onclick="check_reservation_form(document.forms[0]) && checkReservation(jQuery(this).attr(\'link\'), \'reserve\', \'' . translate('Checking') . '\');">' . translate('Check Availability') . '</button></td><td>';
	}
	// janr
	if ($is_owner) {			 
		echo '<input type="hidden" name="adminid" value="' . $res->user->get_id() . '" />' . "\n";	
				 }
	// print hidden fields
	if ($res->get_type() == RES_TYPE_ADD) {
        echo '<input type="hidden" name="machid" value="' . $res->get_machid(). '" />' . "\n"
			  . '<input type="hidden" name="scheduleid" value="' . $res->sched['scheduleid'] . '" />' . "\n"
			  . '<input type="hidden" name="pending" value="' . $res->get_pending(). '" />' . "\n"
			  . '<input type="hidden" name="memberid" value="' . Auth::getCurrentID() . '" />' . "\n";
    }
    else {
        echo '<input type="hidden" name="machid" value="' . $res->get_machid(). '" />' . "\n"
			. '<input type="hidden" name="scheduleid" value="' . $res->sched['scheduleid'] . '" />' . "\n"
			. '<input type="hidden" name="resid" id="resid" value="' . $res->get_id() . '" />' . "\n"
			. '<input type="hidden" name="memberid" value="' . $res->get_memberid() . '" />' . "\n";
    }
?>
    </td>
  </tr>
  <?php
	if ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_CLUSTER) {
  		echo '<tr><td colspan="2"><div id="checkDiv" style="display:none;width:100%;padding-top:15px;"></div></td></tr>';
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
function begin_print_resource_data(&$rs, $colspan = 1) {

?>
     <table width="100%" class="cxxontract" border="0" cellspacing="0" cellpadding="0"> <!-- begin begin_print_resource_data-->
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
<p class="whiteline"></p>
<?php
}	  

/**
* This function prints out end of a table containing
*  all information about a given resource
* @param array $rs array of resource information
*/
function end_print_resource_dataxxxxx(&$rs, $colspan = 1) {
?>
      </table>
    </td>
  </tr>
</table>
<br class="whiteline"></br>
<?php
}	  

/**
* Print ADDART BUTTON 
* @param array 
* @param array 
*/
function print_addart_link(&$rs, $type) {	
	
// admin mode - dit is hoe admin het ziet.	 {  
	if  (Auth::isAdmin() && $type == RES_TYPE_CLUSTER) {
			
			echo ("<tr><td class=\"cellColor1\"><b><div id=machname></div></b><input type=\"hidden\" name=\"machid1\" value=\"\" />&nbsp;&nbsp;<a id=selectmach href=\"javascript:window.open('resource_select.php','selectresource','height=430,width=570,scrollbars=yes,resizable');void(0);\">" . translate('Add resource') . "</a>");
			echo ("</td><td class=\"cellColor1\"></td></tr>");
	}
}

/**
* Print out information about one resource in this reservation
* @param array $rs array of resource information
* @param array hier status info
*/
function print_resource_data_one_resource(&$rs, $type, $pending, $allowed_reservation_status, $allowed_reservation_status_cv) {
	// hier one row of one resource
			
			echo '<tr><td  colspan="2" class="cellColor1 klein">' . translate('Resource') . '</td>
				<td class="cellColor1 klein">' . translate('Serial_nr') . '</td>
				<td class="cellColor1 klein">' . translate('Package') . '</td></tr>';
				
			echo '<tr><td colspan="2" class="cellColor1 w50 groot indent"><b>';
			echo isset($rs['name']) ? $rs['name'] : ''; 
			echo '</td>';
			
			echo '<td class="cellColor1 w20">';
			echo isset($rs['serial_nr']) ? $rs['serial_nr'] : '-'; 
			echo '</td>';
			
			echo '<td class="cellColor1 w30">';
			echo isset($rs['package']) ? $rs['package'] : '-'; 
			echo '</td></tr>';			
			
			if ((isset($rs['description'])) && (!$rs['description']==null)) {
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Description') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $rs['description'];  
				echo '</td></tr>';
			}

			if ((isset($rs['vast_toebehoren'])) && (!$rs['vast_toebehoren']==null)) {			
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Fixed accesoires') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $rs['vast_toebehoren'] ;  
				echo '</td></tr>';	
			}
			if ((isset($rs['notes'])) && (!$rs['notes']=='')) {				
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Notes') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $rs['notes'];  
				echo '</td></tr>';
			}
			
			echo '<tr><td colspan="4" >&nbsp;</td></tr>';
}

/**
* Print out information about the other slave resources in this reservation
* @param array $cluster array of resource information
*/
function print_rest_cluster ($resid, $clusters)
{
	for ($i = 0; $i < count($clusters); $i++) 
	{ if ($clusters[$i]['resid'] <> $resid){ // niet de master

			echo '<tr><td  colspan="2" class="cellColor1 klein">' . translate('Resource') . '</td>
				<td class="cellColor1 klein">' . translate('Serial_nr') . '</td>
				<td class="cellColor1 klein">' . translate('Package') . '</td></tr>';
				
			echo '<tr><td colspan="2" class="cellColor1 w50 groot indent"><b>';
			echo isset($clusters[$i]['name']) ? $clusters[$i]['name'] : ''; 
			echo '</td>';
			
			echo '<td class="cellColor1 w20">';
			echo isset($clusters[$i]['serial_nr']) ? $clusters[$i]['serial_nr'] : '-'; 
			echo '</td>';
			
			echo '<td class="cellColor1 w30">';
			echo isset($clusters[$i]['package']) ? $clusters[$i]['package'] : '-'; 
			echo '</td></tr>';			
			

			if ((isset($clusters[$i]['description'])) && (!$clusters[$i]['description']==null)){
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Description') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $clusters[$i]['description'];  
				echo '</td></tr>';
				}
 
			if ((isset($clusters[$i]['vast_toebehoren'])) && (!$clusters[$i]['vast_toebehoren']==null)) {
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Fixed accesoires') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $clusters[$i]['vast_toebehoren'];  
				echo '</td></tr>';
			}	
			if ((isset($clusters[$i]['notes'])) && (!$clusters[$i]['notes']=='')) {
				echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Notes') . '</td></tr>';
				echo '<tr><td colspan="4" class="cellColor1 indent">';
				echo $clusters[$i]['notes'];  
				echo '</td></tr>';
			}				
				
				echo '<tr><td colspan="4" >&nbsp;</td></tr>';
			}
	} 
} 



/**
* Print out information about one resource in this reservation
* @param array $rs array of resource information
* @param array hier status info
*/
function print_additional_resource($res) {
	
					echo '<tr><td colspan="4" class="cellColor1 klein">' . translate('Accessories') . '</td></tr>';
					if (count($res->resources) <= 0) {
					echo '<tr><td colspan="4" class="cellColor1 groot indent">';
						echo translate('None');
					echo '</td></tr>';	
					}

					// Print additional resource info
					for ($i = 0; $i < count($res->resources); $i++) {
						
						echo '<tr><td colspan="4" class="cellColor1  groot indent">';
						echo isset($res->resources[$i]['name']) ? $res->resources[$i]['name'] : '';  
						echo '</td></tr>';							
					}
					echo '<tr><td colspan="4" >&nbsp;</td></tr>';
}

/**janr
* Prints out a checkbox for - reservation_status 
* @param array $allowed_reservation_status - values from config;
* @param string $res->allowed_checkin_cv- the current value read from db
*/
function print_reservation_status_altxxxxx($type,$allowed_reservation_status, $allowed_reservation_status_cv) { ?>

<?php if (Auth::isAdmin() && ($type == RES_TYPE_MODIFY || $type == RES_TYPE_ADD)) {  ?>		

  <tr>
   <td  class="formNames">
	 <?php
	echo '<input type="hidden" name="reservation_status" id="reservation_status" value="' . $res->sched['reservation_status'] . '"/>';
	echo translate('Status for this reservation') . ' ';
	
	?>
			 </td><td colspan="2" class="cellColor1"> 
	 <?php
	 echo '<select name="reservation_status" id="reservation_status" class="textbox">';
	 for ($i = 0; $i < count($allowed_reservation_status); $i++) {
	 echo translate_status_res($allowed_reservation_status[$i]);
		// echo $allowed_reservation_status_cv.' ' .$allowed_reservation_status[$i];
		if ($allowed_reservation_status_cv==0)
		{
			echo "<option value=\"{$allowed_reservation_status[$i]}\">" . translate_status_res($allowed_reservation_status[$i]) . "</option>\n";
		}else{
			echo "<option value=\"{$allowed_reservation_status[$i]}\"" . ($allowed_reservation_status_cv == $allowed_reservation_status[$i] ? ' selected="selected"' : '') . ">" . translate_status_res($allowed_reservation_status[$i]) . "</option>\n";
		}
	 }
	 echo '</select><br/>';
	 ?>
	</td>
  </tr>
<?php } else { // echo "view only";
	}  ?>
<?php
	
}
// close box (is een double table)
function print_table01_end() {
        // Close off table
        echo "</table><!--print_table01_end-->";
	
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
function print_time_info($res, $rs, $print_min_max = true, $allow_multi = false, $toolate,$allowed_checkout_cv, $allowed_checkin_cv) {
	global $conf;

	$type = $res->get_type();
	$interval = $res->sched['timespan'];
	$startDay = $res->sched['daystart'];
	$endDay	  = $res->sched['dayend'];
	
		$start_date = $res->get_start_date();
		$end_date = $res->get_end_date();
		$display_start_date = Time::getAdjustedDate($res->get_start_date(), $res->get_start()); // timezone
		$display_end_date = Time::getAdjustedDate($res->get_end_date(), $res->get_end()); // timezone
?>
      <br><br><table width=100%>
	   <tr>
		   <td class="cellColor1" ><?php echo translate('Start');?></td>
		   <?php
				echo '<td class="cellColor1 w35"><h5><span id="div_start_date">' . Time::formatDate($start_date, '1', false) . ' &nbsp;&middot;&nbsp; ' . Time::formatTime($res->get_start()) . "</span></h5></td>\n";
		   
		   							echo '<td align="right" class="cellColor1 w20">'.translate('checkout_via') .' </td> ';
									echo '<td  class="cellColor1 w30">'.$allowed_checkout_cv.' </td> ';
		   ?>
		   </tr><tr>
		   <td class="cellColor1" ><?php echo translate('End');
		   // too late! show message without consequence
				if ( $res->type <> RES_TYPE_ADD && $toolate )	{ 	print (' &raquo '. translate('Too late'));}
		   ?></td>
		   		   <?php
				echo '<td class="cellColor1"><h5><span id="div_end_date" >' . Time::formatDate($end_date, '1', false) . ' &nbsp;&middot;&nbsp; ' . Time::formatTime($res->get_end()) . "</span></h5></td>\n";
				echo '<td align="right" class="cellColor1">'.translate('checkin_via') .' </td> ';
				echo '<td  class="cellColor1">'.$allowed_checkin_cv.' </td> ';
		   ?>
	   </tr>
      </table><!-- end print_time_info -->
<br><br>
<?php

}

/**
* Print out information about reservation's owner
* This function will print out checkin en checkout van deze reservering
* @param string
* @param Object
*/
function print_checkoutin_info( $allowed_checkout_cv, $allowed_checkin_cv) {
?>
   								<tr>
                                  <td  class="cellColor1"><b><?php  
									echo translate('checkout_via') . ' ';
									echo $allowed_checkout_cv;
									?>
								  </b></td>
                                  <td  class="cellColor1"><b><?php
								  	echo translate('checkin_via') . ' ';
									echo $allowed_checkin_cv;							
									echo '</b></td></tr>';

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
?>
<table border="0" width="100%">
 
      <tr><td class="cellColor1 w20 groot indent"></td><td  class="cellColor1 w50 heelgroot"><b><?php 
		echo $user['fname'] . ' ' . $user['lname']?>
					
			<?php 
			$userstatustxt = CmnFns::validate_user ($user['osiris_ok_now'], $user['demerit_punt']); // userstatustext
			if ($userstatustxt<>null) echo (' &middot <strong>'.$userstatustxt.'</strong>'); // print status
			//if (false) echo ($userstatustxt); // print status
			?></td>
			  </tr>

			  <tr>
			   <td  class="cellColor1 w20 klein"><?php echo translate('Phone')?></td>
			   <td  class="cellColor1"><div id="phone" style="position: relative;"><?php echo $user['phone'];echo "&nbsp;&nbsp;&nbsp;";echo $user['phone_mob'];echo "&nbsp;&nbsp;&nbsp;";echo $user['phone2'];?></div></td>
			  </tr>
			  <tr>
			   <td  class="cellColor1 w20 klein"><?php echo translate('Email')?></td>
			   <td  class="cellColor1"><div id="email" style="position: relative;"><?php echo $user['email'];echo "&nbsp;&nbsp;&nbsp;";echo $user['email2'];?></div></td>
			  </tr>
				<tr>
			  <td  class="cellColor1 w20 klein"><?php echo translate('klas')?></td>
			  <td  class="cellColor1"><div id="klas" style="position: relative;"><?php echo $user['klas']?></div></td>
			</tr>
			<tr>
			  <td  class="cellColor1 w20 klein"><?php echo translate('leenpermissie')?></td>
			  <td  class="cellColor1"><div id="leenpermissie" style="position: relative;"><?php echo $user['leenpermissie']?></div></td>
			</tr></table>

    <?php
}



/**
* Print out created and modifed times in a table, if they exist
* @param int $c created timestamp
* @param int $m modified stimestamp
*/
function print_create_modifyxxxxaaaaax($c, $m) {
?>

       <tr>
       <td class="formNames" ><?php echo translate('Created')?></td>
       <td class="cellColor1"><?php echo Time::formatDateTime($c)?></td>
	   </tr>
       <tr>
       <td class="formNames"><?php echo translate('Last Modified')?></td>
       <td class="cellColor1"><?php echo !empty($m) ? Time::formatDateTime($m) : translate('N/A') ?></td>
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
        <td class="cellColor1"><div id="contract" style="position: relative;">
		<?php 
		// $res->adminMode
		if ((Auth::isAdmin()) && ($type == RES_TYPE_ADD || $type == RES_TYPE_MODIFY || $type == RES_TYPE_APPROVE)) {
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
		<table width="100%"><!-- begin print_summaryform -->
       <tr class="print_summaryform" >
	    <td class="cellColor1 w20" ><?php echo translate('Summary')?></td>
		
		<td class="cellColor1 w50 groot"  style="text-align: left;">
		<?php echo (!empty($summary) ? CmnFns::html_activate_links($summary) : translate('N/A'));?>
		</td>
	   </tr></table>								
      
<?php
}

/**
* Print out the end box 

*/
function print_table02_end() {
?>
								
      </table>

<?php
}
//  $header = $_SESSION[sessionAdmin]
function print_finalnote($contractsoort, $user, $header ) {

global $conf;

	if (!$user->is_valid()) {
		$user->get_error();
	}
	$user = $user->get_user_data();

?>
								
<div class="finalnote"> <br><br>
<?php	
			if ($contractsoort<0 || $contractsoort>2){$contractsoort=0; }// default			
			if ($contractsoort==0) {echo translate('contract1print');  echo ($conf[$header]['linkcontract1']);  }
			if ($contractsoort==1) {echo translate('contract2print');  echo ($conf[$header]['linkcontract2']);  }
?><br/> <h4>
<?php		//echo translate('contractslot1'). $user['fname'] . ' ' . $user['lname'] .translate('contractslot2') ;
			echo  $user['fname'] . ' ' . $user['lname'] ;
			// echo "&raquo; ".$fname ." ".$lname ."</h3></div>\n";
?>
			</div>
<?php	}
	
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
<table width="200" border="0" cellspacing="3" cellpadding="0" class="recur_box" id="repeat_table"  style="display:none">
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
<table width="200" border="0" cellspacing="3" cellpadding="0" class="recur_box" id="reminder_table" style="margin-top:5px;">
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
<table width="100%" border="0" cellspacing="3" cellpadding="1">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
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

<table width="200" border="0" cellspacing="3" cellpadding="0" class="recur_box" id="checkout_table" style="margin-top:5px;">
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

<table width="200" border="0" cellspacing="3" cellpadding="0" class="recur_box" id="ckeckin_table" style="margin-top:5px;">
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
			$div = ('<hr size="1"/>');
			$msg = $div.$msg;
			
			CmnFns::do_error_box(
				'<br /> ' . $msg . '<br /><br /><a href="javascript: history.back();">' . translate('Please go back and correct any warnings.') . '</a>'
				, 'width: 90%;'
				, $kill);
	}



function print_export_button($id) {
?>
	<input type="button" onclick="showHere(this, 'export_menu');" class="button" value="<?php echo translate('Export')?>"></input>
	<div id="export_menu" class="export_menu" onMouseOut="showHide('export_menu');">
	<table width="100%" cellpadding="0" cellspacing="3" border="0">
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
<?php }  if ($allow_multi && ($res->get_type() == RES_TYPE_ADD || $res->get_type() == RES_TYPE_MODIFY)) { ?>
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