<?php
/**
* This file provides output functions for the admin class
* No data manipulation is done in this file
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author David Poole <David.Poole@fccc.edu>
* @version 08-18-07
* @package Templates
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$link = CmnFns::getNewLink();	// Get Link object

/**
* Return the tool name
* @param none
*/
function getTool() {
	return $_GET['tool'];
}

/**
* Prints out list of current schedules
* @param Pager $pager pager object
* @param mixed $schedules array of schedule data
* @param string $err last database error
*/
function print_manage_schedules(&$pager, $schedules, $err) {
	global $link;
?>
<form name="manageSchedule" method="post" action="admin_update.php" onsubmit="return checkAdminForm();">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%"  class="responsive manageSchedule" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="9" class="tableTitle">&middot; <?php echo translate('All Schedules')?></td>
        </tr>
	<?php
		echo "
        <tr class=\"rowHeaders\">
          <td>" . translate('Schedule Title') . "</td>
          <td width=\"8%\">" . translate('Start Time') . "</td>
          <td width=\"8%\">" . translate('End Time') . "</td>
          <td width=\"9%\">" . translate('Time Span') . "</td>
		  <td width=\"11%\">" . translate('Weekday Start') . "</td>
          <td width=\"20%\">" . translate('Admin Email') . "</td>
		  <td width=\"7%\">" . translate('Default') . "</td>
		  <td width=\"5%\">" . translate('Edit') . "</td>
          <td style=\"display:none\" width=\"7%\">" . translate('Delete') . "</td>
        </tr>
		";

	if (!$schedules)
		echo '<tr class="cellColor0"><td colspan="9" style="text-align: center;">' . $err . '</td></tr>' . "\n";

    for ($i = 0; is_array($schedules) && $i < count($schedules); $i++) {
		$cur = $schedules[$i];
        echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
            . '<td style="text-align:left">' . $cur['scheduletitle'] . "</td>\n"
            . '<td style="text-align:left">' . Time::formatTime($cur['daystart'], false) . "</td>\n"
            . '<td style="text-align:left">' . Time::formatTime($cur['dayend'], false) . "</td>\n"
            . '<td style="text-align:left">' . Time::minutes_to_hours($cur['timespan']) . "</td>\n"
		    . '<td style="text-align:left">' . CmnFns::get_day_name($cur['weekdaystart'], 0) . "</td>\n"
		 	. '<td style="text-align:left">' . $cur['adminemail'] . "</td>\n"
			. '<td><input type="radio" value="' . $schedules[$i]['scheduleid'] . "\" name=\"isdefault\"" . ($schedules[$i]['isdefault'] == 1 ? ' checked="checked"' : '') . ' onclick="javacript: setSchedule(\'' . $schedules[$i]['scheduleid'] . '\');" /></td>'
            . '<td>' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&scheduleid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;scheduleid=' . $cur['scheduleid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['scheduletitle']))) . "</td>\n"
            . "<td style=\"display:none\"><input type=\"checkbox\" name=\"scheduleid[]\" value=\"" . $cur['scheduleid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\"/></td>\n"
            . "</tr>\n";
    }

    // Close table
    ?>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
if ($_SESSION['sessionAdmin'] == 'post@larka.nl') {
	echo submit_button(translate('Delete'), 'scheduleid') . hidden_fn('delSchedule');
	}
?>
</form>
<form id="setDefaultSchedule" name="setDefaultSchedule" method="post" action="admin_update.php">
<input type="hidden" name="scheduleid" value=""/>
<input type="hidden" name="fn" value="dfltSchedule"/>
</form>
<?php
}


/**
* Interface to add or edit schedule information
* @param mixed $rs array of schedule data
* @param boolean $edit whether this is an edit or not
* @param object $pager Pager object
*/
function print_schedule_edit($rs, $edit, &$pager) {
	global $conf;
    ?>
<form name="addSchedule" method="post" action="admin_update.php" <?php echo $edit ? "" : "onsubmit=\"return checkAddSchedule();\"" ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive-one-item" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="200" class="formNames"><?php echo translate('Schedule Title')?></td>
          <td class="cellColor"><input type="text" size="50" name="scheduletitle" class="textbox" value="<?php echo isset($rs['scheduletitle']) ? $rs['scheduletitle'] : '' ?>" />
          </td>
        </tr>
		<tr>
		  <td class="formNames"><?php echo translate('Start Time')?></td>
		  <td class="cellColor"><select name="daystart" class="textbox">
		  <?php
		  for ($time = 0; $time <= 1410; $time += 30)
		  	echo '<option value="' . $time . '"' . ((isset($rs['daystart']) && ($rs['daystart'] == $time)) ? ' selected="selected"' : '') . '>' . Time::formatTime($time, false) . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('End Time')?></td>
		  <td class="cellColor"><select name="dayend" class="textbox">
		  <?php
		  for ($time = 30; $time <= 1440; $time += 30)
		  	echo '<option value="' . $time . '"' . ((isset($rs['dayend']) && ($rs['dayend'] == $time)) ? (' selected="selected"') : (($time==1440 && !isset($rs['dayend'])) ? ' selected="selected"' : '')) . '>' . Time::formatTime($time, false) . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
        <tr>
          <td class="formNames"><?php echo translate('Time Span')?></td>
          <td class="cellColor"><select name="timespan" class="textbox">
		  <?php
		  $spans = array (30, 10, 15, 60, 120, 180, 240);
		  for ($i = 0; $i < count($spans); $i++)
		  	echo '<option value="' . $spans[$i] . '"' . ((isset($rs['timespan']) && ($rs['timespan'] == $spans[$i])) ? (' selected="selected"') : '') . '>' . Time::minutes_to_hours($spans[$i]) . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
        </tr>
        <tr>
          <td class="formNames"><?php echo translate('Weekday Start')?></td>
          <td class="cellColor"><select name="weekdaystart" class="textbox">
		  <?php
		  for ($i = 0; $i < 7; $i++)
		  	echo '<option value="' . $i . '"' . ( (isset($rs['weekdaystart']) && $rs['weekdaystart'] == $i) ? ' selected="selected"' : '') . '>' . CmnFns::get_day_name($i) . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
        </tr>
        <tr>
          <td class="formNames"><?php echo translate('Days to Show')?></td>
          <td class="cellColor"><input type="text" name="viewdays" class="textbox" size="2" maxlength="2" value="<?php echo isset($rs['viewdays']) ? $rs['viewdays'] : '7' ?>" />
          </td>
        </tr>
		<tr style="display:none">
		  <td class="formNames" ><?php echo translate('Hidden')?></td>
		   <td class="cellColor"><select name="ishidden" class="textbox">
		  <?php
		  $yesNo = array(translate('No'), translate('Yes'));
		  for ($i = 0; $i < 2; $i++)
		  	echo '<option value="' . $i . '"' . ((isset($rs['ishidden']) && ($rs['ishidden'] == $i)) ? (' selected="selected"') : '') . '>' . $yesNo[$i]  . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
		<tr style="display:none">
		  <td class="formNames"><?php echo translate('Show Summary')?></td>
		   <td class="cellColor"><select name="showsummary" class="textbox">
		  <?php
		  for ($i = 1; $i >= 0; $i--)
		  	echo '<option value="' . $i . '"' . ((isset($rs['showsummary']) && ($rs['showsummary'] == $i)) ? (' selected="selected"') : '') . '>' . $yesNo[$i]  . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
		<tr>
          <td class="formNames"><?php echo translate('Admin Email')?></td>
          <td class="cellColor"><input type="text" size="50" name="adminemail" maxlength="75" class="textbox" value="<?php echo isset($rs['adminemail']) ? $rs['adminemail'] : $conf['app']['adminEmail'] ?>" />
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
        // Print out correct buttons
        if (!$edit) {
            echo submit_button(translate('Add Schedule'), 'scheduleid') . hidden_fn('addSchedule')
			. ' <input type="reset" name="reset" value="' . translate('Clear') . '" class="button" />' . "\n";
        }
		else {
            echo submit_button(translate('Edit Schedule'), 'scheduleid') . cancel_button($pager) . hidden_fn('editSchedule')
				. '<input type="hidden" name="scheduleid" value="' . $rs['scheduleid'] . '" />' . "\n";
        	// Unset variables
			unset($rs);
		}
		echo "</form>\n";
}

/** janrlogin
* Prints out the user management table
* @param Object $pager pager object
* @param mixed $users array of user data
* @param string $err last database error
*/
function print_manage_users(&$pager, $users, $err) {
	global $link;
	global $conf;
	$util = new Utility();
	$isAdmin = Auth::isAdmin();

//	if ($isAdmin) {
//  janr admin mag nwe user maken, dit gaat eruit, behalve superadmin
//	print_additional_tools_box( array (
//									array('Create User', 'register.php')
//										)
//						);
//  Janr Jquery search.
//  // echo ('Janr Jquery search:<br>');
//	$colspan = $isAdmin ? 10 : 9;
//}

	if ($isAdmin) {
		$colspan = $isAdmin ? 13 : 12;
	}

?>
<form name="manageUser" method="post" action="admin_update.php" onsubmit="return checkAdminForm();">
<div class="tableTitle tableTitle_new"><?php  echo translate('All Users')?></div>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td >
		<table width="100%" id="manageUser" class="display responsive wrap  user" width="100%" style="border 1px red" >
      
        		<?php 

	if ( true || ($_SESSION['sessionScheduleAdmin'] == "Uitleen-2.42")) {
		// ss = show when/what screen settings for datatables js package // init in template.class
		// class defs, zie: https://datatables.net/extensions/responsive/classes
		$ss[] = "all"; // "fname"
		$ss[] = "all"; // "lname"
		
		 $ss[] = "all"; // klas
		$ss[] = "all"; // "loanpermiz"
		$ss[] = "desktop tablet"; // "email"
		 $ss[] = "desktop tablet"; // "phone"
		$ss[] = "desktop tablet"; // "mobile"
		$ss[] = "desktop tablet"; // "phone2"
		$ss[] = "desktop tablet"; // "email2"
		 $ss[] = "desktop tablet"; // "lnotes"
		$ss[] = "desktop tablet"; // "demp"
		$ss[] = "none"; // "demt"
		
		$ss[] = "desktop tablet"; // "admin"
		$ss[] = "none"; // "barcode"
		$ss[] = "desktop tablet"; // "admin"
	}
	$i=0;
		echo "<thead>
        <tr class=\"rowHeaders\">
		<td > </td>
          <td  class=\"".$ss[$i++]." fname\">" .  translate('First Name') . " </td>
		  <td  class=\"".$ss[$i++]." lname\">" .  translate('Last Name') . " </td>
		  <td  class=\"".$ss[$i++]." klas\">"  . translate('klas'). "</td>
		   <td  class=\"".$ss[$i++]." leenpermissie\">" . translate('leenpermissie'). "</td>
          <td  class=\"".$ss[$i++]." email\">" . translate('Email'). "</td>
          <td  class=\"".$ss[$i++]." phone\">" . translate('Phone') . "</td>
		   <td  class=\"".$ss[$i++]." mob\">" . translate('Mobile phone') . "</td>
		  <td  class=\"".$ss[$i++]." phone2\">" . translate('phone2') . "</td>
		  <td  class=\"".$ss[$i++]." email2\">" . translate('Email address 2') . "</td>
		   <td  class=\"".$ss[$i++]." lnotes\">" . translate('lnotes') . "</td>
		  <td  class=\"".$ss[$i++]." demp\">" . translate('demerit_punt'). "</td>
		  <td  class=\"".$ss[$i++]." demt\">" . translate('demerit_text') . "</td>		  
		   <td  class=\"".$ss[$i++]." barcode\">" . translate('Barcodekey') . "</td>
		  <td  class=\"".$ss[$i++]." admin\">" . translate('Admin') . "</td>"
		 . "</tr></thead>\n";


	if (!$users)
		echo '<tr class="cellColor0"><td colspan="13" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	if ($users)
		echo '<tbody  id="tbody_list">'; // ivm jquery
		
	for ($i = 0; is_array($users) && $i < count($users); $i++) {
		$cur = $users[$i];
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		$email = $cur['email'];
		$email2 = $cur['email2'];
		$leenpermissie = $cur['leenpermissie'];
		
		$timezone = $cur['timezone'];

		$fname_lname = array($fname, $lname);
		
			// janr userstatus
			$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
		
			
			

		$admin_text = (($cur['is_admin'] == 1) ? translate('Yes') : translate('No'));
		// fancy, commented out: change admin yes / no, dit eruit
		// $admin_link = $isAdmin ? $link->getLink("admin_update.php?fn=adminToggle&amp;memberid={$cur['memberid']}&amp;status=" . (($cur['is_admin'] == 1) ? '0' : '1'), $admin_text) : $admin_text;
				$admin_link = $admin_text;

		$group_function = $isAdmin ? 'popGroupEdit' : 'popGroupView';
		$group_text = $isAdmin ? 'Edit' : 'View';

		echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
				. '<td ></td>'
               . '<td style="text-align:left;">' .$fname . "</td>\n"
				. '<td style="text-align:left;">' . $link->getLink("register.php?edit=true&amp;memberid=". $cur['memberid'], $lname, '', '', translate('View information about', $fname_lname)) . "</td>\n"			   
                  . '<td style="text-align:left;">' . $cur['klas'] . "</td>\n"
				 . '<td style="text-align:left;">' . $cur['leenpermissie'] . "</td>\n"
			. '<td style="text-align:left;">' . $link->getLink("mailto:$email", $email, '', '', translate('Send email to', array($fname, $lname))) . "</td>\n"
               . '<td style="text-align:left;">' . $cur['phone'] . "</td>\n"
			   . '<td style="text-align:left;">' . $cur['phone_mob'] . "</td>\n"
			   . '<td style="text-align:left;">' . $cur['phone2'] . "</td>\n"
			   . '<td style="text-align:left;">'. $link->getLink("mailto:$email2", $email2, '', '', translate('Send email to', array($fname, $lname))) . "</td>\n" 
			   . '<td style="text-align:left;">' . $cur['lnotes'] . "</td>\n"
			   . '<td style="text-align:left;">' . $userstatustxt. "</td>\n"
			   . '<td style="text-align:left;">' . $cur['demerit_text'] . "</td>\n"			
			   . '<td style="text-align:left;">' . $cur['memberid'] . "</td>\n"
               . '<td>' . $admin_link . '</td>'
              . "</tr>\n";
    }
	// eruit
	// . '<td>' . $link->getLink("admin.php?tool=pwreset&amp;memberid=" . $cur['memberid'], translate('Reset'), '', '', translate('Reset password for', $fname_lname)) .  "</td>\n"
               // . ($isAdmin ? '<td><input type="checkbox" name="memberid[]" value="' . $cur['memberid'] 
			   // . "\" 					onclick=\"adminRowClick(this,'tr$i',$i);\"/></td>\n" : '')
			   
			   
    // Close users table
    ?>				
	<!-- janr search -->
				</tbody>
      </table>
    </td>
  </tr>
</table>
<br />
<?php

	//echo ($isAdmin ? submit_button(translate('Delete')) . hidden_fn('deleteUsers') : '') . '</form>';

?>


<?php
}



/** janrlogin
* Prints out the coworkers management table
* @param Object $pager pager object
* @param mixed $coworkers array of user data
* @param string $err last database error
*/
function print_manage_coworkers(&$pager, $users, $err) {
	global $link;
	global $conf;
	$util = new Utility();
	$isAdmin = Auth::isAdmin();


//  janr admin mag nwe user maken, maar enkel van het type COWORKER
	print_additional_tools_box( array (
									array('add Medewerker', 'registerCoworker.php')
										)
						);



	if ($isAdmin) {
		$colspan = $isAdmin ? 10 : 9;
	}

?>

<form name="manageUser" method="post" action="admin_update.php" onsubmit="return checkAdminForm();">
<div class="tableTitle tableTitle_new"><?php echo translate('All Coworkers')?></div>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td  >
      
	  <table width="100%" id="manageUserCoworker" class="display responsive wrap  coworkers" width="100%" >
        
		<?php 
	if ( true || ($_SESSION['sessionScheduleAdmin'] == "Uitleen-2.42")) {
		// ss = show when/what screen settings for datatables js package // init in template.class
		// class defs, zie: https://datatables.net/extensions/responsive/classes
		$ss[] = "all"; // "fname"
		$ss[] = "all"; // "lname"
		$ss[] = "never"; // "coworker"
		$ss[] = "none"; // "loanpermiz" = klas
		$ss[] = "desktop tablet"; // "email"
		$ss[] = "desktop tablet"; // "phone"
		$ss[] = "desktop tablet"; // "mobile"
		$ss[] = "desktop tablet"; // "email2"
		$ss[] = "desktop tablet"; // "lnotes"
		$ss[] = "desktop tablet"; // "demp"
		$ss[] = "desktop tablet"; // "demt"
		$ss[] = "none"; // "barcode"
	}
 
	$i=0;
		
		// bij coworker heet klas funktie
		echo "
		<thead>
        <tr class=\"rowHeaders\">
				<td class=\" childrow\"></td>
          <td  class=\"".$ss[$i++]." fname\">" .  translate('First Name') . " </td>
		  <td  class=\"".$ss[$i++]." lname\">" .  translate('Last Name') . " (edit)</td>
		  <td  class=\"".$ss[$i++]." coworker\">" .  translate('Coworker'). "</td>
		  <td  class=\"".$ss[$i++]." klas\">" .  translate('leenpermissie'). "</td>
          <td  class=\"".$ss[$i++]." email\">" . translate('Email'). "</td>
          <td  class=\"".$ss[$i++]." phone\">" . translate('Phone') . "</td>
		  <td  class=\"".$ss[$i++]." mobile\">" . translate('Mobile phone') . "</td>
		  <td  class=\"".$ss[$i++]." email2\">" . translate('Email address 2') . "</td>
		  <td  class=\"".$ss[$i++]." lnotes\">" .  translate('lnotes'). "</td>
		  <td  class=\"".$ss[$i++]." demp\">" .  translate('demerit_punt'). "</td>
		  <td  class=\"".$ss[$i++]." demt\">" . translate('demerit_text') . "</td>		  
		  <td  class=\"".$ss[$i++]." barcode\">" . translate('Barcodekey') . "</td>"          
		 . "</tr></thead>\n";
 	

	if (!$users)
		echo '<tr class="cellColor0"><td colspan="14" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	if ($users)
		echo '<tbody  id="tbody_list">'; // ivm jquery
		
	for ($i = 0; is_array($users) && $i < count($users); $i++) {
		$cur = $users[$i];
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		$email = $cur['email'];
		$email2 = $cur['email2'];
		$leenpermissie = $cur['leenpermissie'];
		$timezone = $cur['timezone'];

		$fname_lname = array($fname, $lname);
		
			// janr userstatus
			$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
		
		$admin_text = (($cur['is_admin'] == 1) ? translate('Yes') : ' ');
		$admin_link =$admin_text;
	//	$admin_link = $isAdmin ? $link->getLink("admin_update.php?fn=adminToggle&amp;memberid={$cur['memberid']}&amp;status=" . (($cur['is_admin'] == 1) ? '0' : '1'), $admin_text) : $admin_text;

		$group_function = $isAdmin ? 'popGroupEdit' : 'popGroupView';
		$group_text = $isAdmin ? 'Edit' : 'View';

		echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
			. '	<td class=\" childrow\"></td>' 
            . '<td style="text-align:left;">' .$fname . "</td>\n"
			. '<td style="text-align:left;">' . $link->getLink("registerCoworker.php?edit=true&amp;memberid=". $cur['memberid'], $lname, '', '', translate('View information about', $fname_lname)) . "</td>\n"			   
            . '<td style="text-align:left;">' . $cur['klas'] . "</td>\n"
			. '<td style="text-align:left;">' . $cur['leenpermissie'] . "</td>\n"
			. '<td style="text-align:left;">' . $link->getLink("mailto:$email", $email, '', '', translate('Send email to', array($fname, $lname))) . "</td>\n"
            . '<td style="text-align:left;">' . $cur['phone'] . "</td>\n"
			. '<td style="text-align:left;">' . $cur['phone_mob'] . "</td>\n"
			. '<td style="text-align:left;">'. $link->getLink("mailto:$email2", $email2, '', '', translate('Send email to', array($fname, $lname))) . "</td>\n" 
			. '<td style="text-align:left;">' . $cur['lnotes'] . "</td>\n"
			. '<td style="text-align:left;">' . $userstatustxt. "</td>\n"
			. '<td style="text-align:left;">' . $cur['demerit_text'] . "</td>\n"			
			. '<td style="text-align:left;">' . $cur['memberid'] . "</td>\n"
	        . "</tr>\n";		
/*
dit is eruit:
			. '<td  style="display:none">' . $link->getLink("admin.php?tool=pwreset&amp;memberid=" . $cur['memberid'], translate('Reset'), '', '', translate('Reset password for', $fname_lname)) .  "</td>\n"
			. '<td>' . $admin_link . 'admin_link</td>'
			. ($isAdmin ? '<td style="display:none"><input type="checkbox" name="memberid[]" value="' . $cur['memberid'] 
			. "\" 					onclick=\"adminRowClick(this,'tr$i',$i);\"/></td>\n" : '') 	
*/				
	}		   
    // Close users table
	
    ?>				
	<!-- janr search -->
	 
</table> </tr>
				</tbody>
      </table>
    </td>
  </tr>
</table>
<br />
<?php

	// echo ($isAdmin ? submit_button(translate('Delete')) . hidden_fn('deleteUsers') : '') . '</form>';

?>


<?php
}

/**
* Prints out the links to select last names
* @param none
*/
function print_lname_links() {
	global $letters;
	echo '<a href="javascript: search_user_lname(\'\');">' . translate('All Users') . '</a>';
	foreach($letters as $letter) {
		echo '<a href="javascript: search_user_lname(\''. $letter . '\');" style="padding-left: 10px; font-size: 12px;">' . $letter . '</a>';
	}
}

/**
* Prints out list of current resources
* @param Pager $pager pager object
* @param mixed $resources array of resource data
* @param string $err last database error
*/
function print_manage_resources(&$pager, $resources, $err) {
	global $link;
	$util = new Utility();
 

// jaro dit zijn de links bovenaan het scherm op list resource page
//echo $link->getLink('admin.php?tool=resources&add=1', translate('Add Resource')) . "</p><br/>\n"; 
//echo $link->getLink('admin.php?tool=resources&add=1', "ADD AND RETURN TO THIS SCREEN") . "</p><br/>\n"; 
//echo $link->getLink('admin.php?tool=resources&add=1', "ADD AND GO TO LIST") . "</p><br/>\n"; 
?>


<!--
<script type="text/javascript"> 
			$(function () {
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{'persist':false});
			});
</script>


	<table width="100%" border=0><tr><td >
	Zoek 	
<form action="#" onsubmit="return false">
   <input type="search" name="search" value="" id="id_searchs" placeholder="Search" autofocus />
</form></p>
<script type="text/javascript">$('input#id_searchs').focus();</script> 

-->
</td><td align="right" valign="bottom"><br>
				<?php
				// janr afvangen archive
				echo '<span class="button right">';
			    if ((isset($_GET['listview'])) && ($_GET['listview']=='on')) {
					$listview = 'on';
					$qs=http_build_query(array_merge($_GET,array('listview'=>'off')));
					echo '<a href="'.$conf['app']['weburi'].'admin.php?'.$qs.'">Show in Editview</a>'; // edit
				}
				else { 
					$listview = 'off';
					$qs=http_build_query(array_merge($_GET,array('listview'=>'on')));
					echo '<a href="'.$conf['app']['weburi'].'admin.php?'.$qs.'">Show in Listview</a>'; // list
			
					
				}
				echo '</span>';
				// ADD ART BUTTON
				echo '<span class="button right">';
				echo " ".$link->getLink('admin.php?tool=resources&add=1', translate('Add Resource')) . "</span>\n";  // ADD ART BUTTON
				?>
</td></tr></table>









<!-- print_manage_resources -->
<form name="manageResource" method="post" action="admin_update.php" onsubmit="return checkAdminForm();">
<div class="tableTitle tableTitle_new"><?php echo translate('All Resources')?></div>
<table class="admin resources" width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <!--td class="tableBorder"-->
	<td>
      <table  id="table_id_manage_resource" class="display responsive wrap manageResource"  width="100%" >


		<?php 
/*
zie
https://datatables.net/extensions/responsive/examples/display-control/classes.html
https://datatables.net/extensions/responsive/examples/column-control/classes
https://datatables.net/extensions/responsive/classes#Breakpoints
*/

	//$ss =  array[];
echo 'listview:'.	$listview;
if ( ($listview == 'off') && (true || ($_SESSION['sessionScheduleAdmin'] == "Uitleen-2.42"))) {
// ss = show when/what screen settings for datatables js package // init in template.class
// class defs, zie: https://datatables.net/extensions/responsive/classes
echo ' editmode';	 
	$ss[] = "all"; //edit",   
	$ss[] = "none"; //barcode",   
	$ss[] = "all"; //duplicate",   
	$ss[] = "all"; //status",   
	$ss[] = "all"; //name",   
	$ss[] = "never"; //schedule never",   
	$ss[] = "none"; //serial",   
	$ss[] = "none"; //package",   
	$ss[] = "desktop tablet"; //description",   
	$ss[] = "desktop "; //notes",   
	$ss[] = "desktop"; //accesoires",   
	$ss[] = "all"; //uitleennivo",   
	$ss[] = "desktop"; //owner",   
	$ss[] = "all"; //uitleenperiode",   
	$ss[] = "all"; //delete",   
	$ss[] = "all"; //deletebutton",   
	$ss[] = "none"; //maintenance",   
	$ss[] = "none"; //datum_aankoop",   
	$ss[] = "none"; //aankoopbedrag"
}
if ( ($listview == 'on') && (true || ($_SESSION['sessionScheduleAdmin'] == "Uitleen-2.42"))) {
// ss = show when/what screen settings for datatables js package // init in template.class
echo ' listmode';	 
	$ss[] = "never"; //edit",   
	$ss[] = "never"; //barcode",   
	$ss[] = "never"; //duplicate",   
	$ss[] = "never"; //status",   
	$ss[] = "all"; //name",   
	$ss[] = "never"; //schedule never",   
	$ss[] = "all"; //serial",   
	$ss[] = "all"; //package",   
	$ss[] = "all"; //description",   
	$ss[] = "all "; //notes",   
	$ss[] = "all"; //accesoires",   
	$ss[] = "all"; //uitleennivo",   
	$ss[] = "all"; //owner",   
	$ss[] = "all"; //uitleenperiode",   
	$ss[] = "never"; //delete",   
	$ss[] = "never"; //deletebutton",   
	$ss[] = "all"; //maintenance",   
	$ss[] = "all"; //datum_aankoop",   
	$ss[] = "all"; //aankoopbedrag"
}
$i=0;

		echo "<thead>
        <tr class=\"rowHeaders\">
		<td class=\" childrow\"></td>
          <td class=\"".$ss[$i++]." edit\">" . translate('Edit') . "</td>
		  <td class=\"".$ss[$i++]." barcode\">" . translate('Barcode') . "</td>
		  <td class=\"".$ss[$i++]." duplicate\">" . translate('Duplicate') . "</td>
          <td class=\"".$ss[$i++]." status\">" . translate('status') . "</td>
		  <td class=\"".$ss[$i++]." name\">". translate('Resource Name') . "</td>          
		  <td class=\"".$ss[$i++]." schedule\" >". translate('Schedule') . "</td>
		  <td class=\"".$ss[$i++]." serial\">" .  translate('Serial_nr') . "</td>
          <td class=\"".$ss[$i++]." package\">" . translate('Package') . "</td>
		  <td class=\"".$ss[$i++]." description\">" . translate('Description') . "</td>
		  <td class=\"".$ss[$i++]." notes\">" . translate('Notes') . "</td>
		  <td class=\"".$ss[$i++]." accesoires\">" . translate('Fixed accesoires') . "</td>
		  <td class=\"".$ss[$i++]." uitleennivo\">" . translate('uitleennivo') . "</td>
	      <td class=\"".$ss[$i++]." owner\">" .  translate('Owner') . "</td>
	  	  <td class=\"".$ss[$i++]." uitleenperiode\">" . translate('uitleenperiode') . "</td>
          <td class=\"".$ss[$i++]." delete\">" . translate('Delete') . "</td>
          <td class=\"".$ss[$i++]." deletebutton\"> </td>
          <td class=\"".$ss[$i++]." maintenance\">" . translate('Maintenance') . "</td>
          <td class=\"".$ss[$i++]." datum_aankoop\">" . translate('datum_aankoop') . " </td>
          <td class=\"".$ss[$i++]." aankoopbedrag\">" . translate('aankoopbedrag') . " </td>
        </tr></thead>";

	if (!$resources)
		echo '<tr class="cellColor0"><td colspan="19" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	if ($resources)
		echo '<tbody  id="tbody_list">'; // ivm jquery
	
	for ($i = 0; is_array($resources) && $i < count($resources); $i++) {
			$cur = $resources[$i];
			// janr
		if ($cur['status'] == 'd') $deletestring=" deleted";	
		if ($cur['status'] <> 'd') $deletestring=" ";
		
		$togglestring =           '<td class="status" >' . $link->getLink("admin_update.php?fn=togResource&amp;machid=" . $cur['machid'] . "&amp;status=" . $cur['status'], $cur['status'] == 'a' ? translate('Active') : translate('Inactive'), '', '', translate('Toggle this resource active/inactive')) . $deletestring  ."</td>\n";
		
		if ($cur['status'] == 'd') {
			$togglestring = '<td>' . $link->getLink("admin_update.php?fn=togResource&amp;machid=" . $cur['machid'] . "&amp;status=" . $cur['status'], 'Undelete' , translate('Toggle this resource to active/inactive')) . $deletestring  ."</td>\n"	;	
		}
		// start print header row
		if ($cur['status'] <> 'd') {
			
if (isset($cur['description']) && (strpos($cur['description'], "http://") === 0)) {
	$thedescription = $cur['description'];
	$thedescription = CmnFns::makelink ($cur['description'], true);
}else{
	$thedescription = $cur['description'];
}



			echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
			.  '<td class=\"childrow\"></td>'			
				. '<td class="edit">' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&machid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;machid=' . $cur['machid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['name']))) . "</td>\n"

			. '<td class="barcode" style="text-align:left">' . $cur['machid'] . "</td>\n"
				. '<td class="duplicate">' . $link->getLink("admin_update.php?fn=dupResource&amp;machid=" . $cur['machid'] . "&amp;duplicate=yes", translate('Duplicate'), '', '', translate('Make instant COPY of this resource')) . "</td>\n"
				
				. $togglestring 
				
			. '<td class="name" style="text-align:left">' . $cur['name'] . "</td>\n"
			   
				. '<td class="schedule never" style="text-align:left;display:none">' . $cur['scheduletitle'] . "</td>\n"
				
				. '<td class="serial" style="text-align:left">' . $cur['serial_nr'] . "</td>\n"
				. '<td class="package" style="text-align:left">'. (isset($cur['package']) ?  $cur['package'] : '') . "</td>\n"
				. '<td class="description" style="text-align:left">'.$thedescription."</td>\n"
				. '<td class="notes" style="text-align:left">'. (isset($cur['notes']) ?  $cur['notes'] : '&nbsp;') . "</td>\n"
				. '<td class="accesoires" style="text-align:left">'. (isset($cur['vast_toebehoren']) ?  $cur['vast_toebehoren'] : '&nbsp;') . "</td>\n"
				. '<td class="uitleennivo" style="text-align:left">'. (isset($cur['uitleennivo']) ?  $cur['uitleennivo'] : '&nbsp;') . "</td>\n"
				. '<td class="owner" style="text-align:left">'. (isset($cur['rowner']) ?  $cur['rowner'] : '&nbsp;') . "</td>\n"
				. '<td class="uitleenperiode" style="text-align:left">'. (isset($cur['uitleenperiode']) ?  $cur['uitleenperiode'] : '&nbsp;') . "</td>\n"
				. "<td class=\"checkbox\" ><input type=\"checkbox\" name=\"machid[]\" value=\"" . $cur['machid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\" /></td>\n";
			echo '<td class="delete" style="text-align:left">';
			echo submit_button(translate('Delete'), 'machid') . hidden_fn('delResource');
			echo "</td>\n";
			echo'<td class="maintenance"> '. (isset($cur['maintenance']) ?  $cur['maintenance'] : '&nbsp;') . '</td>
				<td class="datum_aankoop">'. (isset($cur['datum_aankoop']) ?  $cur['datum_aankoop'] : '&nbsp;') . ' </td>
				<td class="aankoopbedrag">'. (isset($cur['aankoopbedrag']) ?  $cur['aankoopbedrag'] : '&nbsp;') . ' </td>';			
			echo "</tr>\n";
		}
	}



    ?>
					<!-- janr search -->
				</tbody>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
	echo submit_button(translate('Delete'), 'machid') . hidden_fn('delResource');
	echo '</form>';


}


/** JANR print_search_resources is een extensie op print_manage_resources - timeslot thing
* Prints out list of current resources
* @param Pager $pager pager object
* @param mixed $resources array of resource data
* @param string $err last database error
*/
function print_search_resources(&$pager, $resources, $err) {
	global $link;
	$util = new Utility();
							
?>

<script type="text/javascript"> 
			$(function () {
				/*
				janr - jquery quicksearch. init display none.
				input#id_searchs - the id of the input textfield
				tbody#tbody_list - the id of the tbody, this is the range.
				tr - the subrange
				*/
				
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{
					'onBefore':function() {
						//alert('before')
						if (jQuery('input#id_searchs').val()=='') {
							jQuery('#resource-table').hide(); //janr switched
						} else {
							jQuery('#resource-table').show();
						}
					}
				});
				
			});
		</script>
		<p align="left"> 
	Zoek Artikel
<form action="#" onsubmit="return false">
  <fieldsetx>
    <input type="search" name="search" value="" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search -->
  </fieldsetx>
</form></p><script type="text/javascript">$('input#id_searchs').focus();</script> 
<!-- janr search end-->

<form name="manageResource" method="post" action="admin_update.php" onsubmit="return checkAdminForm();">
<table id="resource-table" width="100%" border="0" cellspacing="0" cellpadding="10" style="display:none; border: solid #CCCCCC 1px">
  <tr>
    <td class="tableBorder"><table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="10" class="tableTitle">&middot; <?php echo translate('All Resources')?></td>
        </tr> 
		<?php echo "<tr class=\"rowHeaders\"><td width=140>" . translate('Time Slots') . "</td>
			<td width=140 style=\"display:none\">" . translate('Barkode') . "</td>
			<td width=140>" . translate('Resource Name') . "</td>
			<td>" . translate('Package') . "</td>
			<td>" . translate('Description') . "</td>
			<td>" . translate('Notes') . "</td>
			<td>" . translate('Fixed accesoires') . "</td>
			<td>" . translate('uitleennivo') . "</td>
			<td>" . translate('uitleenperiode') . "</td>
			
			</tr>";

	if (!$resources)
		echo '<tr class="cellColor0"><td colspan="7" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	if ($resources)
		// datum today ophalen voor time slot links
	    $date = getdate($_date);

		$today = getdate(Time::getAdjustedTime(mktime()));
		$todaydate = date('m-d-Y',mktime(0,0,0,$today['mon'], $today['mday'], $today['year']));
		// datum today format = 12-16-2011
		echo '<tbody id="tbody_list">'; // ivm jquery
		
    for ($i = 0; is_array($resources) && $i < count($resources); $i++) {
		$cur = $resources[$i];
		// print ($cur['machid']); // janr = array
		// echo ('$todaydate '.$todaydate); // janr test
		
		// pre voorwaardes om artikel aan res te geven: moet active zijn.
		if ($cur['status'] == 'a') {
		        
		echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n";
        echo '<td>';
		// week
		$link->doLink('schedule.php?date=' . $todaydate . '&amp;today=0&scheduleid=&amp;machid=' .$cur['machid'], translate('Week'));
		echo '&nbsp;';
		// vandaag
		$link->doLink('schedule.php?date=' . $todaydate . '&amp;today=1&scheduleid=&amp;machid=' .$cur['machid'], translate('Day'));
		echo "</td>\n";
        echo '<td style="text-align:left;display:none">' . $cur['machid'] . "</td>\n"
			. '<td style="text-align:left">' . $cur['name'] . "</td>\n"
           	. '<td style="text-align:left">'. (isset($cur['package']) ?  $cur['package'] : '&nbsp;') . "</td>\n"
			. '<td style="text-align:left">'. (isset($cur['description']) ?  $cur['description'] : '&nbsp;') . "</td>\n"
            . '<td style="text-align:left">'. (isset($cur['notes']) ?  $cur['notes'] : '&nbsp;') . "</td>\n"
			. '<td style="text-align:left">'. (isset($cur['vast_toebehoren']) ?  $cur['vast_toebehoren'] : '&nbsp;') . "</td>\n"
			. '<td style="text-align:left">'. (isset($cur['uitleennivo']) ?  $cur['uitleennivo'] : '&nbsp;') . "</td>\n"
			. '<td style="text-align:left">'. (isset($cur['uitleenperiode']) ?  $cur['uitleenperiode'] : '&nbsp;') . "</td>\n"
            . "</tr>\n";
			}
    }

    ?>
					<!-- janr search -->
				</tbody>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
// janr geen del button hier
	// echo submit_button(translate('Delete'), 'machid') . hidden_fn('delResource') . '</form>';
}

/**
* Interface to add or edit ONE resource information
*** janr - or to duplicate -
* @param mixed $rs array of resource data
* @param boolean $edit whether this is an edit or not
* @param object $pager Pager object
*/
function print_resource_edit($rs, $scheds, $edit, &$pager) {
	global $conf;
	$start = 0;
	$end   = 1440;
	$mins = array(0, 10, 15, 30);
	$disabled = ($edit && $rs['allow_multi'] == 1) ? 'disabled="disabled"' : '';

	if ($edit) {
		$minH = intval($rs['minres'] / 60);
		$minM = intval($rs['minres'] % 60);
		$maxH = intval($rs['maxres'] / 60);
		$maxM = intval($rs['maxres'] % 60);
		
		$minNotice = $rs['min_notice_time'];
		$maxNotice = $rs['max_notice_time'];
	}
	else {
		$maxH = 24;
		
		$minNotice = 0;
		$maxNotice = 0;
	}

    ?>
	<br><br>
<form name="addResource" method="post" action="admin_update.php" <?php echo $edit ? "" : "onsubmit=\"return checkAddResource(this);\"" ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" id="table_id-one-item" class="responsive-one-item" border="0" cellspacing="1" cellpadding="0">
	  <tr>
<td class="tableTitle" colspan="2">· Add a Resource</td>
</tr>
	          <tr>
          <td colspan="2" width="200" class="formNames"><?php echo translate('Barcode')?><input type="hidden" name="machid" value="<?php echo isset($rs['machid']) ? $rs['machid'] : '' ?>" />
          &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="50" name="newmachid" class="textbox" value="<?php echo isset($rs['machid']) ? $rs['machid'] : '' ?>" />
          <?php 	
		  echo '<br>';
		  if ($edit) { 
			echo translate('Do not touch this field UNLESS you scan a unique barcode');
		  } else {
			echo translate('Do not touch this field UNLESS you scan a unique barcodeADD');
		  }
		  ?>
		  <a href="javascript: info('barcode-resource');">(Info)</a></td>
        </tr>
        <tr>
          <td width="200" class="formNames"><?php echo translate('Resource Name')?></td>
          <td class="cellColor"><input type="text" size="75" name="name" class="textbox" value="<?php echo isset($rs['name']) ? $rs['name'] : '' ?>" /> <span class="star">*</span>
          </td>
        </tr>
		<tr>
		  <td class="formNames"><?php echo translate('Serial_nr')?></td>
          <td class="cellColor"><input type="text" size="50" name="serial_nr" class="textbox" value="<?php echo isset($rs['serial_nr']) ? $rs['serial_nr'] : '' ?>" />
          </td>
		</tr>

        <tr>
          <td class="formNames"><?php echo translate('Location')?></td>
          <td class="cellColor"><input type="text" size="75" name="location" class="textbox" value="<?php echo isset($rs['location']) ? $rs['location'] : '' ?>" />
          </td>
        </tr>
        <tr style="display:none">
          <td class="formNames"><?php echo translate('Phone')?></td>
          <td class="cellColor"><input type="text" size="16" name="rphone" class="textbox" value="<?php echo isset($rs['rphone']) ? $rs['rphone'] : '' ?>" />
          </td>
        </tr>
				<tr>
		  <td class="formNames"><?php echo translate('Package')?></td>
          <td class="cellColor"><input type="text" size="64" name="package" class="textbox" value="<?php echo isset($rs['package']) ? $rs['package'] : '' ?>" />
          </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('Description')?></td>
		  <td class="cellColor"><textarea name="description" class="textbox" rows="5" cols="50"><?php echo isset($rs['description']) ? $rs['description'] : '' ?></textarea>
          </td>
		</tr>
        <tr>
          <td class="formNames"><?php echo translate('Notes')?></td>
          <td class="cellColor"><textarea name="notes" class="textbox" rows="10" cols="50"><?php echo isset($rs['notes']) ? $rs['notes'] : '' ?></textarea>
          </td>
        </tr>
		<tr>
		  <td class="formNames"><?php echo translate('Fixed accesoires')?></td>
		  <td class="cellColor"><textarea name="vast_toebehoren" class="textbox" rows="5" cols="50"><?php echo isset($rs['vast_toebehoren']) ? $rs['vast_toebehoren'] : '' ?></textarea>
          </td>
		</tr>

		<tr>
		  <td class="formNames"><?php echo translate('Maintenance')?></td>
		        <td class="cellColor"><textarea name="maintenance" class="textbox" rows="10" cols="50"><?php echo isset($rs['maintenance']) ? $rs['maintenance'] : '' ?></textarea>
          </td>
		</tr>

		<tr>
		  <td class="formNames"><?php echo translate('Owner')?></td>
          <td class="cellColor"><input type="text" size="50" name="rowner" class="textbox" value="<?php echo isset($rs['rowner']) ? $rs['rowner'] : 'GRA' ?>" />
          </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('datum_aankoop')?></td>
          <td class="cellColor"><input type="text" size="50" name="datum_aankoop" class="textbox" value="<?php echo isset($rs['datum_aankoop']) ? $rs['datum_aankoop'] : '' ?>" />
          </td>
		</tr>		
		<tr>
		  <td class="formNames"><?php echo translate('uitleennivo')?></td>
          <td class="cellColor"><input type="text" size="3" name="uitleennivo" maxlength="1"  class="textbox" value="<?php echo isset($rs['uitleennivo']) ? $rs['uitleennivo'] : '1' ?>" />
          <a href="javascript: info('uitleennivo');">(Info)</a></td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('waardecat')?></td>
          <td class="cellColor"><input type="text" size="3" name="waardecat" maxlength="1" class="textbox" value="<?php echo isset($rs['waardecat']) ? $rs['waardecat'] : '1' ?>" />
          <a href="javascript: info('waardecat');">(Info)</a></td>
		</tr>		
		<tr>
		  <td class="formNames"><?php echo translate('uitleenperiode')?></td>
          <td class="cellColor"><input type="text" size="3" name="uitleenperiode" maxlength="1" class="textbox" value="<?php echo isset($rs['uitleenperiode']) ? $rs['uitleenperiode'] : '0' ?>" />
          <a href="javascript: info('uitleenperiode');">(Info)</a></td>
		</tr>	
		<tr>
		  <td class="formNames"><?php echo translate('aankoopbedrag')?></td>
          <td class="cellColor"><input type="text" size="50" name="aankoopbedrag" class="textbox" value="<?php echo isset($rs['aankoopbedrag']) ? $rs['aankoopbedrag'] : '' ?>" />
          </td>
		</tr>

		
		<tr>
		<td class="formNames"><?php echo translate('Schedule'); 
		// print_r ($_SESSION['sessionScheduleAdmin'].'<br>'.$rs['scheduleid']); // test
		?>
		</td>
		<td class="cellColor">
		
		<?php  //janrschedulefilter
		if (empty($scheds))
			echo '<option value="">Please add schedules</option>';
		else {
			for ($i = 0; $i < count($scheds); $i++)
			if ($scheds[$i]['scheduleid'] == $_SESSION['sessionScheduleAdmin']) {
				echo '<input type="hidden" name="scheduleid" class="textbox" value="';
				echo isset($scheds[$i]['scheduleid']) ? $scheds[$i]['scheduleid'] : '';
				echo '" />';
				echo isset($scheds[$i]['scheduletitle']) ? $scheds[$i]['scheduletitle'] : '';
				}
		}
		?>
		
		</td>
		</tr>
		        <tr>
		  <td class="formNames"><?php echo translate('Approval Required')?></td>
		  <td class="cellColor"><input type="checkbox" name="approval" <?php echo (isset($rs['approval']) && ($rs['approval'] == 1)) ? 'checked="checked"' : ''?>/>
		  </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('Allow Multiple Day Reservations')?></td>
		  <td class="cellColor"><input type="checkbox" name="allow_multi" <?php echo (isset($rs['allow_multi']) && ($rs['allow_multi'] == 0)) ? '' : 'checked="checked"'?> onclick="showHideMinMax(this);" />
		  </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('Minimum Reservation Time')?></td>
		  <td class="cellColor">
		  <select name="minH" class="textbox" id="minH" <?php echo $disabled?>>
		  <?php
		  for ($h = 0; $h < 25; $h++)
		  	echo '<option value="' . $h . '"' . ((isset($minH) && $minH == $h) ? ' selected="selected"' : '') . '>' . $h . ' ' . translate('hours') . '</option>' . "\n";
		  ?>
		  </select>
		  <select name="minM" class="textbox" id="minM" <?php echo $disabled?>>
		  <?php
		  foreach ($mins as $m)
		  	echo '<option value="' . $m . '"' . ((isset($minM) && $minM == $m) ? ' selected="selected"' : '') . '>' . $m . ' ' . translate('minutes') . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
		<tr>
		  <td class="formNames"><?php echo translate('Maximum Reservation Time')?></td>
		  <td class="cellColor">
		  <select name="maxH" class="textbox" id="maxH" <?php echo $disabled?>>
		  <?php
		  for ($h = 0; $h < 25; $h++)
		  	echo '<option value="' . $h . '"' . ((isset($maxH) && $maxH == $h) ? ' selected="selected"' : '') . '>' . $h . ' ' . translate('hours') . '</option>' . "\n";
		  ?>
		  </select>
		  <select name="maxM" class="textbox" id="maxM" <?php echo $disabled?>>
		  <?php
		  foreach ($mins as $m)
		  	echo '<option value="' . $m . '"' . ((isset($maxM) && $maxM == $m) ? ' selected="selected"' : '') . '>' . $m . ' ' . translate('minutes') . '</option>' . "\n";
		  ?>
		  </select>
		  </td>
		</tr>
		<tr style="display:none">
			<td class="formNames"><?php echo translate('Minimum Booking Notice')?></td>
			<td class="cellColor">
				<input type="text" name="min_notice_time" id="min_notice_time" class="textbox" size="3" value="<?php echo $minNotice?>" /> <?php echo translate('hours prior to the start time') ?>
			</td>
		</tr>
		<tr style="display:none">
			<td class="formNames"><?php echo translate('Maximum Booking Notice')?></td>
			<td class="cellColor">
				<input type="text" name="max_notice_time" id="max_notice_time" class="textbox" size="3" value="<?php echo $maxNotice?>" /> <?php echo translate('hours from the current time') ?>
			</td>
		</tr>
		<tr style="display:none">
		  <td class="formNames"><?php echo translate('Maximum Participant Capacity')?></td>
		  <td class="cellColor"><input type="text" name="max_participants" size="3" class="textbox" value="<?php echo isset($rs['max_participants']) ? $rs['max_participants'] : ''?>"/>
		  * <?php echo translate('Leave blank for unlimited')?>
		  </td>
		</tr>
		<tr style="display:none">
		  <td class="formNames"><?php echo translate('Auto-assign permission')?></td>
		  <td class="cellColor"><input type="checkbox" name="autoassign" <?php echo (isset($rs['autoassign']) && ($rs['autoassign'] == 1)) ? 'checked="checked"' : ''?>/>
		  </td>
		</tr>

      </table>
    </td>
  </tr>
</table>
<br />
<?php
        // Print out correct buttons
		// echo ($edit || $duplicate);
        if (!$edit) {
            echo submit_button(translate('Add Resource'), 'machid') . hidden_fn('addResource')
			. ' <input type="reset" name="reset" value="' . translate('Clear') . '" class="button" />' . "\n";
        }
		else {
            echo submit_button(translate('Edit Resource'), 'machid') . cancel_button($pager) . hidden_fn('editResource')
				. '<input type="hidden" name="machid" value="' . $rs['machid'] . '" />' . "\n";
        	// Unset variables
			unset($rs);
		}
		echo "</form>\n";
}

/**  // addadditional scheduleid
* Prints out list of current additional resources
* @param Pager $pager pager object
* @param mixed $resources array of resource data
* @param string $err last database error
*/
function print_manage_additional_resources($pager, $resources, $err) {
	global $link;
	$util = new Utility();
?>	

<!-- form name="manageAdditionalResource" method="post" action="admin_update.php" onsubmit="return checkAdminForm();" -->
<!-- for additionals, no check, no consequenzas -->
<form name="manageAdditionalResource" method="post" action="admin_update.php">
<div class="tableTitle tableTitle_new"><?php echo translate('All Accessories')?></div>

<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td >
      <table width="100%" id="manageAdditionalResource" class="display responsive wrap manageAdditionalResource" width="100%" >
<?php
	if ( true || ($_SESSION['sessionScheduleAdmin'] == "Uitleen-2.42")) {
		// ss = show when/what screen settings for datatables js package // init in template.class
		// class defs, zie: https://datatables.net/extensions/responsive/classes
	 
		$ss[] = "all"; //nameedit",   
		$ss[] = "none"; //barcode",   
		$ss[] = "never"; //number",   
		$ss[] = "all"; //edit",   
		$ss[] = "all"; //delete",   
	}
 
	$i=0;
		
		echo "<thead>
        <tr class=\"rowHeaders\">
		<td class=\" childrow\"></td>
          <td class=\"".$ss[$i++]." name\">" .  translate('Accessory Name') . "</td>
		  <td class=\"".$ss[$i++]." barcode\">" . translate('Barcodekey') . "</td>
          <td class=\"".$ss[$i++]." number\" >" . translate('Number Available') . "</td>
          <td class=\"".$ss[$i++]." edit\" >" . translate('Edit') . "</td>
		  <td class=\"".$ss[$i++]." delete\" >" . translate('Delete') . "</td>
        </tr>
		</thead>";

	if (!$resources)
		echo '<tr class="cellColor0"><td colspan="4" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	if ($resources)
		echo '<tbody  id="tbody_list">'; // ivm jquery
		
    for ($i = 0; is_array($resources) && $i < count($resources); $i++) {
		$cur = $resources[$i];
		if ($cur['number_available'] == -1)  { $cur['number_available'] = translate('Unlimited'); }
		echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
			. '<td class=\"childrow\"></td>'	
            . '<td style="text-align:left">' . $cur['name'] . "</td>\n"
			. '<td style="text-align:left">' . $cur['resourceid'] . "</td>\n"
        	. '<td>' . $cur['number_available'] ."</td>\n"
            . '<td>' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&resourceid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;resourceid=' . $cur['resourceid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['name']))) . "</td>\n"
            . "<td><input type=\"checkbox\" name=\"resourceid[]\" value=\"" . $cur['resourceid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\" /></td>\n"
            . "</tr>\n";
    }

    // Close table
    ?>
					<!-- janr search -->
				</tbody>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
	echo submit_button(translate('Delete'), 'resourceid') . hidden_fn('delAddResource') . '</form>';
}

/**  // addadditional scheduleid
* Interface to add or edit resource information
* @param AdditionalResource $resource AdditionalResource object
* @param boolean $edit whether this is an edit or not
* @param Pager $pager Pager object
*/
function print_additional_resource_edit($resource, $edit, &$pager) {
	global $conf;
    ?>
<form name="addAdditionalResource" method="post" action="admin_update.php" <?php echo $edit ? "" : "onsubmit=\"return checkAddResource(this);\"";?>>
<table width="100%" class="responsive-one-item" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="200" class="formNames"><?php echo translate('Accessory Name');?></td>
          <td class="cellColor"><input type="text" size="50" name="name" class="textbox" value="<?php echo $resource->get_name() ?>" />
          <span class="star">*</span></td></td>
	  </tr>
        <tr>
          <td width="200" class="formNames"><?php echo translate('Schedule');?></td>
          <td class="cellColor">
		<?php  //janrschedulefilter
				if ($_SESSION['sessionScheduleAdmin']) {
				echo '<input type="hidden" name="scheduleid" class="textbox" value="';
				echo isset($_SESSION['sessionScheduleAdmin']) ? $_SESSION['sessionScheduleAdmin'] : '';
				echo '" />';
				echo isset($_SESSION['sessionScheduleAdmin']) ? $_SESSION['sessionScheduleAdmin'] : '';
				echo isset($_SESSION['sessionScheduleTitle']) ? $_SESSION['sessionScheduleTitle'] : '';
				}
		
		?>
           
	  </tr>

        <tr>
          <td class="formNames"><?php echo translate('Number Available');?></td>
          <!--td class="cellColor"><input type="hidden" name="number_available" class="textbox" size="5" value=" -->
        
		  <?php // echo ($resource->get_number_available() != -1) ? $resource->get_number_available() : ''; 
		 
		  ?>
		  <!--1" / -->
          <?php //echo translate('Leave blank for unlimited');?>
			<td class="cellColor"><input type="hidden" name="number_available" class="textbox" size="5" value="1"> 1</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
        // Print out correct buttons
        if (!$edit) {
            echo submit_button(translate('Add Additional Resource'), 'resourceid') . hidden_fn('addAdditionalResource')
			. ' <input type="reset" name="reset" value="' . translate('Clear') . '" class="button" />' . "\n";
        }
		else {
            echo submit_button(translate('Edit Additional Resource'), 'resourceid') . cancel_button($pager) . hidden_fn('editAdditionalResource')
				. '<input type="hidden" name="resourceid" value="' . $resource->get_id() . '" />' . "\n";
		}
		echo "</form>\n";
}

/**
* Interface for managing user training
* Provide interface for viewing and managing
*  user training information
* @param object $user User object of user to manage
* @param array $rs list of resources
*/
function print_manage_perms(&$user, $rs, $err) {
	global $link;

	if (!$user->is_valid()) {
		CmnFns::do_error_box($user->get_error() . '<br /><a href="' . $_SERVER['PHP_SELF'] . '?tool=users">' . translate('Back') . '</a>', '', false);
		return;
	}

	echo '<h3>' . $user->get_name() . '</h3>';
    ?>
<form name="train" method="post" action="admin_update.php">
  <table border="0" cellspacing="0" cellpadding="1">
    <tr>
      <td class="tableBorder">
        <table cellspacing="1" cellpadding="2" border="0" width="100%">
          <tr class="rowHeaders">
            <td width="240"><?php echo translate('Resource Name')?></td>
            <td width="60"><?php echo translate('Allowed')?></td>
          </tr>
		<?php
			if (!$rs) echo '<tr class="cellColor0" style="text-align: center;"><td colspan="2">' . $err . '</td></tr>';

			for ($i = 0; is_array($rs) && $i < count($rs); $i++) {
				echo '<tr class="cellColor"><td>' . $rs[$i]['name'] . '</td><td style="text-align: center;">'
					. '<input type="checkbox" name="machid[]" value="' . $rs[$i]['machid'] . '"';
				if ($user->has_perm($rs[$i]['machid']))
					echo ' checked="checked"';
				echo '/></td></tr>';
		  	}

		// Close off tables/forms.  Print buttons and hidden field
		?>
          <tr class="cellColor1">
            <td>&nbsp;</td>
            <td style="text-align: center;">
              <input type="checkbox" name="checkAll" onclick="checkAllBoxes(this);" />
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="memberid" value="<?php echo $user->get_id()?>" />
  <p style="padding-top: 5px; padding-bottom: 5px;"><input type="checkbox" name="notify_user" value="true" /><?php echo translate('Notify user')?></p>
  <?php echo submit_button(translate('Save')) . hidden_fn('editPerms')?>
  <input type="button" name="cancel" value="<?php echo translate('Manage Users')?>" class="button" onclick="document.location='<?php echo $_SERVER['PHP_SELF']?>?tool=users';" />
</form>
<?php
}

/**
* Interface for approving reservations
* Provide a table to allow admin to approve or delete reservations
* @param Object $pager pager object
* @param mixed $res reservation data
* @param string $err last database error
*/
function print_approve_reservations($pager, $res, $err) {
	global $link;
	$util = new Utility();

?>
<form name="approve" id="approve" method="post" action="reserve.php" style="margin: 0px;">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive pendingUserReservations" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="9" class="tableTitle">&middot; <?php echo translate('Pending User Reservations')?></td>
        </tr>
		<?php echo"
        <tr class=\"rowHeaders\">
          <td width=\"10%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'start_date'), translate('Start Date')) . "</td>
		  <td width=\"10%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'end_date'), translate('End Date')) . "</td>
          <td width=\"20%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'lname'), translate('User')) . "</td>
          <td width=\"19%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'name'), translate('Resource')) . "</td>
          <td width=\"10%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'starttime'), translate('Start Time')) . "</td>
          <td width=\"10%\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'endtime'), translate('End Time')) . "</td>
          <td width=\"7%\">" . translate('View') . "</td>
          <td width=\"7%\">" . translate('Approve') . "</td>
          <td width=\"7%\">" . translate('Delete') . "</td>
        </tr>";

	// Write message if they have no reservations
	if (!$res)
		echo '<tr class="cellColor"><td colspan="9" align="center">' . $err . '</td></tr>';

	// For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$cur = $res[$i];
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		// janr	
		$userstatustxt ='hoi';
		$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
			
		
		
        echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\">\n"
					. '<td>' . Time::formatDate($cur['start_date']) . '</td>'
					. '<td>' . Time::formatDate($cur['end_date']) . '</td>'
					. '<td style="text-align:left">' . $link->getLink("javascript: viewUser('" . $cur['memberid'] . "');", $fname . ' ' . $lname, '', '', translate('View information about', array($fname,$lname))) 
					
					. '&nbsp;' .$userstatustxt. '</td>'
								
					
                    . '<td style="text-align:left">' . $cur['name'] . "</td>"
					. '<td>' . Time::formatTime($cur['starttime']) . '</td>'
					. '<td>' . Time::formatTime($cur['endtime']) . '</td>'
                    . '<td>' . $link->getLink("javascript: reserve('v','','','" . $cur['resid']. "');", translate('IconView'), '', '', translate('View this reservation information')) . '</td>'
					. '<td>' . $link->getlink("javascript: reserve('a','','','" . $cur['resid'] ."');", translate('Approve'), '', '', translate('Approve this reservation')) . '</td>'
					. '<td>' . $link->getLink("javascript: deleteReservation('" . $cur['resid']. "');", translate('IconDelete'), '', '', translate('Delete this reservation')) . '<!-- deldel --></td>'
					. "</tr>\n";
	}
    ?>
      </table>
    </td>
  </tr>
</table>
</form>
<br />
<?php
}

/**
* Interface for managing reservations
* Provide a table to allow admin to modify or delete reservations
* @param Object $pager pager object
* @param mixed $res reservation data
* @param string $err last database error
*/
/**
* janr
* velden uit tabel toegevoegd
* 
* 	checkout_via		varchar(12) check out via ...
*	checkin_via			varchar(12) check in via ...
*	reservation_status	smallint status reservering ( funkties die de waarde reservation_status omzet naat text: fie translate_status_res();
* 	filter schedule
*
*$clusterstatus
*	0:clusterid:	null								AUTONOOM 1 artikel op deze res, edit status M
*	1:clusterid:	!null || clusterid == resid		 	MASTER of cluster, edit status V
*	2:clusterid:	!null || clusterid <> resid	 		SLAVE of cluster, edit status null,(grijs) DEL is permitted
*	
*/

function print_manage_reservations(&$pager, $res, $err, $toolate) {
	global $link;
	global $conf;
	$util = new Utility();
	$colorblock = array();


?>
<!-- janr search -->

<script type="text/javascript"> 
			$(function () {
				/*
				janr - jquery quicksearch.
				input#id_searchs - the id of the input textfield
				tbody#tbody_list - the id of the tbody, this is the range.
				tr - the subrange
				*/
				
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{'persist':false});
				
			});
			
			function deleteReservation(resid) {
				if (confirm('Verwijderen. Weet je zeker?')) {
					jQuery('#cbframe').show().attr('src','delete-reservation.php?resid='+resid);
				}
				void(0);   
			}
			
			function changeStatus(elm,resid,status) {
				blockStatusses();
				jQuery('#cbframe').show().attr('src','check-reservation-status.php?htmlid='+elm.id+'&resid='+resid+'&status='+status);
			}
			function blockStatusses() {
				jQuery(".statuscell input").attr("disabled","disabled");
			}
			function unblockStatusses() {
			}
			// tbv confirmmail
			function sendconfirmmail(elm,resid,status) {
				//alert ("confirmmail");
				blockmails(); 
				jQuery('#sendmailframe').show().attr('src','send-confirm-mail.php?htmlid='+elm.id+'&resid='+resid+'&status='+status); 
			}
			// tbv toolatemail
			function sendtoolatemail(elm,resid,status) {
				//alert ("sendtoolate");
				blockmails(); 
				jQuery('#sendmailframe').show().attr('src','send-toolate-mail.php?htmlid='+elm.id+'&resid='+resid+'&status='+status); 
			}
			function blockmails() {
				jQuery(".mailcell").attr("display","none"); //mailcell
			}
			
		</script>
	<p align="left"> 
	
	<table width="100%" border=0><tr><td >
	Zoek
<form action="#" onsubmit="return false">
  <fieldsetx>										
    <input type="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search -->
  </fieldsetx>
</form>
</td><td><td align="right" valign="bottom"><br><div class="button right">
<?php 			// janr afvangen archive
			    if ((isset($_GET['archive'])) && ($_GET['archive']=='on')) {
					$archive = $_GET['archive'];
					$qs=http_build_query(array_merge($_GET,array('archive'=>'off')));
					echo '<a href="'.$conf['app']['weburi'].'admin.php?'.$qs.'">'.translate("Hide Reservations Past").'</a>';
					
				}
				else { 
					$archive = 'off';
					$qs=http_build_query(array_merge($_GET,array('archive'=>'on')));
					echo '<a href="'.$conf['app']['weburi'].'admin.php?'.$qs.'">'.translate("Show Reservations Past").'</a>';
					
				}
?>
</div></td></tr></table>

</p><script type="text/javascript">$('input#id_searchs').focus();</script> 
					<!-- div voor reservation status update message-->

<iframe style="display:none; position:fixed" id="cbframe" width="420" height="600" frameborder="0" src="check-reservation-status.php#wait"></iframe>
<iframe style="display:none; position:fixed" id="sendmailframe" width="220" height="40" frameborder="0" src="send-toolate-mail.php#wait"></iframe>
<form onsubmit="alert(\'dit gaat ergens anders heen\');">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="22" class="responsive manageReservations" class="tableTitle">&middot; <?php echo translate('User Reservations')
			
		   ?></td>
        </tr>
		<?php

			
		/*
		if (isset($_GET['search']))	{ 		
			$searchstring = '&search='.$_GET['search'];
		}else{
			$searchstring = '';
		}
		*/
		// <td >" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'clusterid'), translate('Cluster')) . "cluster</td>
		// hier in header toevoegen qsclass enkel op sort koloms, qsclass)
		echo "
        <tr class=\"rowHeaders\">
		    <td style=\"display:none\"></td>
			<td style=\"display:none\"></td>
			<td style=\"display:none\"></td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'scheduleid'), translate('Schedule')) ."</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'name'), translate('Resource Name')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'start_date'), translate('Start Date')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'starttime'), translate('Start Time')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'checkout_via'), translate('checkout_via')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'end_date'), translate('End Date')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'endtime'), translate('End Time')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'checkin_via'), translate('checkin_via')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'lname'), translate('User')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'reservation_status'), translate('reservation_status')) . "</td>

			<td ><span title=\"&nbsp;&nbsp;" . translate('reservation_status0') . "&nbsp;&nbsp;\">".translate('r_status_short0')."</span></td>
			<td ><span title=\"&nbsp;&nbsp;" . translate('reservation_status1') . "&nbsp;&nbsp;\">".translate('r_status_short1')."</span></td>
			<td ><span title=\"&nbsp;&nbsp;" . translate('reservation_status2') . "&nbsp;&nbsp;\">".translate('r_status_short2')."</span></td>
			<td ><span title=\"&nbsp;&nbsp;" . translate('reservation_status3') . "&nbsp;&nbsp;\">".translate('r_status_short3')."</span></td>
			<td ><span title=\"&nbsp;&nbsp;" . translate('all resources this cluster status ready') . "&nbsp;&nbsp;\">".translate('r_status_short4')."</span></td>
			<td >" . translate('copy cluster') . "</td>
			<td >" . translate('View') . "</td>
			<td >" . translate('Modify') . "</td>
          <td >" . translate('Delete') . "</td>
		            <td >" . translate('Print') . "</td>
					<td >" . translate('ConfirmMail') . "</td>
					<td >" . translate('MailTooLate') . "</td>
        </tr>";

	// Write message if they have no reservations
	if (!$res) 
		echo '<tr class="cellColor"><td colspan="20" align="center">' . $err . '</td></tr>';
	// Write jquery-range if they have reservations
	if ($res) 
		echo '<tbody  id="tbody_list">'; 
		

	// For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$cur = $res[$i];
		//var_dump ($cur);
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		
		
		// radio button array, bepaal default checked
		$radio[0] = '';
		$radio[1] = '';
		$radio[2] = '';
		$radio[3] = '';
		$radio[4] = ''; // ready all in cluster
		
		$radio[$cur['reservation_status']] = 'checked'; // can be 0123
		
///////////////////toolate?
		$nowtime = Time::getAdjustedTime(mktime()); 	// serverdate and time unix
		$enddateDB = $cur['end_date'] + (60 * $cur['endtime']) ;
								
		$toolatetext=null;
	
		if ( ($enddateDB < ($nowtime - $conf['time']['servercorrect'])) && ($cur['reservation_status'] < 2))
				$toolatetext=' &raquo '. translate('Too late1');
			
///////////////////




				
			
		// janr	 check userstatus		
		$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
		// janr	 check usertype 'student' of 'Coworker'		
		$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
		
		
		
		
		
		
		
		
		// janr	 part of cluster?
		$clusterstatus  = CmnFns::get_cluster_status ($cur['resid'], $cur['clusterid']); // userstatustext
		// visual aids
		$showkey ='';		
		if ($clusterstatus==0) { // 1 art in deze res
			$clusterTRclass='' ;
			$clusterTDclass='' ; // grouping color block
			$showkey =$cur['resid'];
			$colorblock[$cur['clusterid']] = null;
			}
		if ($clusterstatus==1) { // master in cluster res
			$clusterTRclass='' ;
			if (!isset($colorblock[$cur['clusterid']])) {
					
					$color = CmnFns::random_number(5);
					$colorblock[$cur['clusterid']] = 'style=background-image:url(\'img/color'.$color.'.gif\');background-repeat:repeat-y;background-position:-17px;text-align:left;';
					
					$color = CmnFns::random_hexcolor();
					$colorblock[$cur['clusterid']] = 'style="border-right:5px solid '.$color.';"';
				}
			$mod='c';
			$showkey =$cur['clusterid'];
		}
		if ($clusterstatus==2) { // slave in cluster res
			$clusterTRclass='downcolor' ;
				if (!isset($colorblock[$cur['clusterid']])) {			
					$color = CmnFns::random_number(5);
					$colorblock[$cur['clusterid']] = 'style=background-image:url(\'img/color'.$color.'.gif\');background-repeat:repeat-y;background-position:-17px;text-align:left;';
										
					$color = CmnFns::random_hexcolor();
					$colorblock[$cur['clusterid']] = 'style="border-right:5px solid '.$color.';"';
					
				}
			$mod='notallow';
		}
		// end visual aids
		
		// . '<td>' . $cur['resid'] .' <br>'. $cur['clusterid'] .' - '. $clusterstatus . ' c '.$colorblock[$cur['clusterid']]. '</td>'
		// . '<td  style="text-align:left">' . $cur['clusterid'] . ' </td>'
		echo "<tr class=\"cellColor" . ($i%2) . " " . $clusterTRclass. "\" align=\"center\">\n";
		echo '<td style="display:none">' . $cur['clusterid'] . ' cluster</td>';		
		echo '<td style="display:none">' . $cur['resid'] . ' res</td>';
		echo '<td style="display:none">' . $cur['scheduleid'] . ' sched</td>'
														
										
					. '<td  style="text-align:left">' . $cur['scheduletitle'] . ' </td>'
                    . '<td ><div style="padding:0px 8px;text-align:left">' . $cur['name'] 
					. ' <span class="downcolor1">'. $showkey . '</span>'
					. '<span style="display:none">' .$cur['machid']. '</span></div></td>'
					. '<td>' . Time::formatDate($cur['start_date']) . '</td>'
					. '<td>' . Time::formatTime($cur['starttime']) . '</td>'
					. '<td>' . $cur['checkout_via'] .  '</td>'
					
					. '<td>' . Time::formatDate($cur['end_date']) . '</td>'
					. '<td>' . Time::formatTime($cur['endtime']) . '</td>'
					. '<td>'  . $cur['checkin_via']. ' </td>'
					
					. '<td '.$colorblock[$cur['clusterid']].' >' . $link->getLink("register.php?edit=true&amp;memberid=". $cur['memberid'] , $fname . ' ' . $lname, '', '', translate('View information about', array($fname,$lname))) 
					. '&nbsp;' . $userstatustxt
					. '</td>'

					. '<td style="text-align:left" id="statustext-'.$cur['resid'].'">' . translate_status_res($cur['reservation_status']). ' ' .$toolatetext. "</td>"
				
					. '<td  class="statuscell" ><input id="c0'.$cur['resid'].'" name="c'.$cur['resid'].'" type="radio" '.$radio[0].'
						onclick="changeStatus(this,\''.$cur['resid'].'\',0)" /></td>'
					. '<td class="statuscell" ><input id="c1'.$cur['resid'].'" name="c'.$cur['resid'].'" type="radio"  '.$radio[1].'
						onclick="changeStatus(this,\''.$cur['resid'].'\',1)" /></td>'
					. '<td class="statuscell" ><input id="c2'.$cur['resid'].'" name="c'.$cur['resid'].'" type="radio"  '.$radio[2].'
						onclick="changeStatus(this,\''.$cur['resid'].'\',2)" /></td>'
					. '<td class="statuscell" ><input id="c3'.$cur['resid'].'" name="c'.$cur['resid'].'" type="radio"  '.$radio[3].'
						onclick="changeStatus(this,\''.$cur['resid'].'\',3)" /></td>'							
					;
				// indien master van cluster dan wordt ready-all button meegegeven, anders leeg.
				if ($clusterstatus==1) { // master in cluster res	
					echo '<td class="statuscell" ><input id="c4'.$cur['resid'].'" name="c'.$cur['clusterid'].'" type="radio"  '.$radio[4].'
						onclick="changeStatus(this,\''.$cur['resid'].'\',4)" /></td>';
					echo '<td class="copyclustercell" >'. $link->getLink("javascript: reserve('copy','','','" . $cur['clusterid']. "');", translate('IconDuplicate')) .
					' </td>';
				} else {
					echo '<td class="statuscell" ></td><td class="copyclustercell" ></td>';
				}
			// $clusterstatus
			// 0 reservation for one resource - autonoom
			// 1 reservation multiple resources - master
			// 2 reservation multiple resources - slave
								
				if ($clusterstatus == 0) {
					echo '<td>' . $link->getLink("javascript: reserve('v','','','" . $cur['resid']. "');", translate('IconView')) . '</td>';
					echo '<td >' . $link->getlink("javascript: reserve('m','','','" . $cur['resid']. "');", translate('IconModify')) . '</td>';
					echo '<td>' . $link->getLink("javascript: deleteReservation('" . $cur['resid']. "');", translate('IconDelete')). '<!-- deldel --></td>';
					echo '<td>' . $link->getLink("javascript: prrrint('p','','','" . $cur['resid']. "');", translate('IconPrint')). '</td>'; 
					echo '<td class="mailcell"><A href="#" onclick="javascript:sendconfirmmail(this,\''.$cur['resid'].'\',0)">'. translate('IconConfirmMail'). '</td>';	echo '<td class="mailcell"><A href="#" onclick="javascript:sendtoolatemail(this,\''.$cur['resid'].'\',0)">'. translate('IconMailTooLate'). '</td>'; 			
				} elseif ($clusterstatus == 1) {
					echo '<td >' . $link->getLink("javascript: reserve('v','','','" . $cur['resid']. "');", translate('IconView')) . '</td>';
					echo '<td>' . $link->getlink("javascript: reserve('c','','','" . $cur['resid']. "');", translate('IconModify')) . '</td>';
					echo '<td>' . $link->getLink("javascript: deleteReservation('" . $cur['resid']. "');", translate('IconCross')). '<!-- deldel --></td>'; // delmaster = all
					echo '<td>' . $link->getLink("javascript: prrrint('p','','','" . $cur['resid']. "');", translate('IconPrint')). '</td>'; //print
					echo '<td class="mailcell"><A href="#" onclick="javascript:sendconfirmmail(this,\''.$cur['resid'].'\',0)">'. translate('IconConfirmMail'). '</td>';
					echo '<td class="mailcell"><A href="#" onclick="javascript:sendtoolatemail(this,\''.$cur['resid'].'\',0)">'. translate('IconMailTooLate'). '</td>';					
				} elseif ($clusterstatus == 2) {
					//echo '<td>' . $link->getLink("javascript: reserve('v','','','" . $cur['resid']. "');", translate('IconView')) . '</td>';
					//echo '<td>' . $link->getlink("javascript: reserve('c','','','" . $cur['clusterid']. "');", translate('IconModify')) . '</td>';
					echo '<td> </td>';
					echo '<td> </td>';
					echo '<td>' . $link->getLink("javascript: deleteReservation('" . $cur['resid']. "');", translate('IconDelete')). '<!-- deldel --></td>'; // delslave
					echo '<td>&nbsp;</td>';
					echo '<td>&nbsp;</td>';
					echo '<td>&nbsp;</td>';
				} 
					echo "</tr>\n";
	}
    ?>
					<!-- janr search -->
		</tbody>
      </table>
    </td>
  </tr>
</table></form>
<br />
<?php
}

//

function print_manage_archive(&$pager, $res, $err) {
	global $link;
	$util = new Utility();
	$colorblock = array();


?>
<!-- janr search -->
<script type="text/javascript">alert ('De pagina laden kan enige tijd duren. Wilt u doorgaan?');</script>
<script type="text/javascript"> 
			$(function () {
				/*
				janr - jquery quicksearch.
				input#id_searchs - the id of the input textfield
				tbody#tbody_list - the id of the tbody, this is the range.
				tr - the subrange
				*/
				
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{'persist':false});
				
			});
			</script>
	<p align="left"> 
	
	<table width="100%" border=0><tr><td >
	Zoek
<form action="#" onsubmit="return false">
  <fieldsetx>										
    <input type="search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search -->
  </fieldsetx>
</form>
</td><td><td align="right" valign="bottom"></td></tr></table>

</p><script type="text/javascript">$('input#id_searchs').focus();</script> 
					<!-- width="220" height="40"
					div voor reservation status update message-->

<iframe style="display:none; position:fixed" id="cbframe" width="420" height="600" frameborder="0" src="check-reservation-status.php#wait"></iframe>
<iframe style="display:none; position:fixed" id="sendmailframe" width="220" height="40" frameborder="0" src="send-toolate-mail.php#wait"></iframe>
<form onsubmit="alert(\'dit gaat ergens anders heen\');">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive manageArchive" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="22" class="tableTitle">&middot; <?php echo translate('Archive')
			
		   ?></td>
        </tr>
		<?php

			
		echo "
        <tr class=\"rowHeaders\">
		    <td style=\"display:none\"></td>
			<td style=\"display:none\"></td>
			<td style=\"display:none\"></td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'scheduleid'), translate('Schedule')) ."</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'name'), translate('Resource Name')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'start_date'), translate('Start Date')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'starttime'), translate('Start Time')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'checkout_via'), translate('checkout_via')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'end_date'), translate('End Date')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'endtime'), translate('End Time')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'checkin_via'), translate('checkin_via')) . "</td>
			
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'lname'), translate('User')) . "</td>
			<td class=\"qsclass\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'reservation_status'), translate('reservation_status')) . "</td>


        </tr>";

	// Write message if they have no reservations
	if (!$res) 
		echo '<tr class="cellColor"><td colspan="16" align="center">' . $err . '</td></tr>';
	// Write jquery-range if they have reservations
	if ($res) 
		echo '<tbody  id="tbody_list">'; 
		

	// For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$cur = $res[$i];
		//var_dump ($cur);
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		
		// for each reservation, check if it is not TOO LATE
		// @param boolean $TELAAT whether TOO LATE STUFF BROUGHT BACK
			
		$nowtime = Time::getAdjustedTime(mktime()); 	// serverdate and time unix
					// print ('res.start_date: '.res.start_date.'<br>');	
					// print ('nowtime FORMAT: ' .Time::formatDateTime($nowtime) . '<br />'); //NOW datum en tijd formatted
		$enddateDB = $cur['end_date'] + 60 * $cur['endtime'];
				// print ('DBvalue datumtijd: ' .Time::formatDateTime($enddateDB) . '<br />'); //DBvalue datumtijd formatted					
				// print ('this->end_date: '.$this->end_date.'<br>');
				//	print ('this->end: '.$this->end.'<br>');
				// print ('$enddateDB: '.$enddateDB.'<br>');
		

		
		$radio[$cur['reservation_status']] = 'checked'; // can be 0123
		
		// $cur['reservation_status']
		// janr	 te laat?
		$toolatetext=null;
			// TOOLATE (3600 is een 1 uur correctie (one.com))
		if ( ($enddateDB < ($nowtime-3600)) && ($cur['reservation_status'] < 2)) 
			$toolatetext=' &raquo '. translate('Too late1');
			
		// janr	 check userstatus		
		$userstatustxt = CmnFns::validate_user ($cur['osiris_ok_now'], $cur['demerit_punt']); // userstatustext
		// janr	 part of cluster?
		$clusterstatus  = CmnFns::get_cluster_status ($cur['resid'], $cur['clusterid']); // userstatustext
		// visual aids
		$showkey ='';		
		if ($clusterstatus==0) { // 1 art this res
			$clusterTRclass='' ;
			$clusterTDclass='' ; // grouping color block
			$showkey =$cur['resid'];
			$colorblock[$cur['clusterid']] = null;
			}
		if ($clusterstatus==1) { // meer art this res (master)
			$clusterTRclass='' ;
			if (!isset($colorblock[$cur['clusterid']])) {
					
					$color = CmnFns::random_number(5);
					$colorblock[$cur['clusterid']] = 'style=background-image:url(\'img/color'.$color.'.gif\');background-repeat:repeat-y;background-position:-17px;text-align:left;';
					
					$color = CmnFns::random_hexcolor();
					$colorblock[$cur['clusterid']] = 'style="border-right:5px solid '.$color.';"';
				}
			$mod='c';
			$showkey =$cur['clusterid'];
		}
		if ($clusterstatus==2) { // meer art this res (slave)
			$clusterTRclass='downcolor' ;
				if (!isset($colorblock[$cur['clusterid']])) {			
					$color = CmnFns::random_number(5);
					$colorblock[$cur['clusterid']] = 'style=background-image:url(\'img/color'.$color.'.gif\');background-repeat:repeat-y;background-position:-17px;text-align:left;';
										
					$color = CmnFns::random_hexcolor();
					$colorblock[$cur['clusterid']] = 'style="border-right:5px solid '.$color.';"';
					
				}
			$mod='notallow';
		}
		// end visual aids
		
		// . '<td>' . $cur['resid'] .' <br>'. $cur['clusterid'] .' - '. $clusterstatus . ' c '.$colorblock[$cur['clusterid']]. '</td>'
		// . '<td  style="text-align:left">' . $cur['clusterid'] . ' </td>'
		echo "<tr class=\"cellColor" . ($i%2) . " " . $clusterTRclass. "\" align=\"center\">\n";
		echo '<td style="display:none">' . $cur['clusterid'] . ' cluster</td>';		
		echo '<td style="display:none">' . $cur['resid'] . ' res</td>';
		echo '<td style="display:none">' . $cur['scheduleid'] . ' sched</td>'
														
										
					. '<td  style="text-align:left">' . $cur['scheduletitle'] . ' </td>'
                    . '<td ><div style="padding:0px 8px;text-align:left">' . $cur['name'] 
					. ' <span class="downcolor1">'. $showkey . '</span>'
					. '<span style="display:none">' .$cur['machid']. '</span></div></td>'
					. '<td>' . Time::formatDate($cur['start_date']) . '</td>'
					. '<td>' . Time::formatTime($cur['starttime']) . '</td>'
					. '<td>' . $cur['checkout_via'] .  '</td>'
					
					. '<td>' . Time::formatDate($cur['end_date']) . '</td>'
					. '<td>' . Time::formatTime($cur['endtime']) . '</td>'
					. '<td>'  . $cur['checkin_via']. ' </td>'
					
					. '<td '.$colorblock[$cur['clusterid']].' >' . $link->getLink("register.php?edit=true&amp;memberid=". $cur['memberid'] , $fname . ' ' . $lname, '', '', translate('View information about', array($fname,$lname))) 
					. '&nbsp;' . $userstatustxt
					. '</td>'

					. '<td style="text-align:left" id="statustext-'.$cur['resid'].'">' . translate_status_res($cur['reservation_status']). ' ' . "</td>"							
					;
					
					echo "</tr>\n";
	}
    ?>
					<!-- janr search -->
		</tbody>
      </table>
    </td>
  </tr>
</table></form>
<br />
<?php
}


//


/**
* Prints out list of current announcements
* @param Object $pager pager object
* @param mixed $announcements array of announcement data
* @param string $err last database error
*/
function print_manage_announcements(&$pager, $announcements, $err) {
	global $link;

?>
<form name="manageAnnouncement" method="post" action="admin_update.php" onsubmit="return checkAnnouncementForm();">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive manageAnouncement" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="4" class="tableTitle">&middot; <?php echo translate('All Announcements')?></td>
        </tr>
		<?php echo "
        <tr class=\"rowHeaders\">
          <td>" . translate('Announcement') . "</td>
          <td width=\"7%\">" .translate('Number') . "</td>
		  <td width=\"5%\">" .translate('Edit') . "</td>
          <td width=\"7%\">" .translate('Delete') . "</td>
        </tr>";

	if (!$announcements)
		echo '<tr class="cellColor0"><td colspan="4" style="text-align: center;">' . $err . '</td></tr>' . "\n";

    for ($i = 0; is_array($announcements) && $i < count($announcements); $i++) {
		$cur = $announcements[$i];
        echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
            . '<td style="text-align:left">' . htmlspecialchars($cur['announcement']) . "</td>\n"
            . '<td style="text-align:left">';
	    echo $cur['number'];
		echo "</td>\n"
            . '<td>' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&announcmentid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;announcementid=' . $cur['announcementid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['announcementid']))) . "</td>\n"
            . "<td><input type=\"checkbox\" name=\"announcementid[]\" value=\"" . $cur['announcementid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\" /></td>\n"
            . "</tr>\n";
    }

    // Close table
    ?>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
	echo submit_button(translate('Delete Announcements'), 'announcementid') . hidden_fn('delAnnouncement');
?>
</form>
<?php
}

/**
* Interface to add or edit announcement information
* @param mixed $rs array of schedule data
* @param boolean $edit whether this is an edit or not
* @param object $pager Pager object
*/
function print_announce_edit($rs, $edit, &$pager) {
	global $conf;
	$start_date_ok = (isset($rs['start_datetime']) && !empty($rs['start_datetime']));
	$end_date_ok = (isset($rs['end_datetime']) && !empty($rs['end_datetime']));

	$start_date = ($start_date_ok) ? $rs['start_datetime'] : mktime();
	$end_date = ($end_date_ok) ? $rs['end_datetime'] : mktime();
    ?>
<form name="addAnnouncement" method="post" action="admin_update.php" <?php echo $edit ? "" : "onsubmit=\"return checkAddAnnouncement();\"" ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive-one-item" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="formNames"><?php echo translate('Announcement'); ?></td>
          <td class="cellColor"><input type="text" name="announcement" class="textbox" size="50" maxlength="300" value="<?php echo isset($rs['announcement']) ? htmlspecialchars($rs['announcement']) : '' ?>" />
          </td>
        </tr>
        <tr>
          <td width="200" class="formNames"><?php echo translate('Number'); ?></td>
          <td class="cellColor"><input type="text" name="number" class="textbox" size="3" maxlength="3" value="<?php echo isset($rs['number']) ? $rs['number'] : '' ?>" />
          </td>
        </tr>
		<tr>
			<td class="formNames"><?php echo translate('Start Date'); ?></td>
			<td class="cellColor">
				<?php  echo '<div id="div_start_date" style="float:left;width:70px;">' . Time::formatDate($start_date) . '</div><input type="hidden" id="hdn_start_date" name="start_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $start_date) . '"/> <a href="javascript:void(0);"><img src="img/calendar.gif" border="0" id="img_start_date" alt="' . translate('Start') . '"/></a>';
					$s_hour = ($start_date_ok) ? date('h', $rs['start_datetime']) : '';
					$s_min = ($start_date_ok) ? date('i', $rs['start_datetime']) : '';
					$s_pm = ($start_date_ok) ? intval(date('H', $rs['start_datetime'])) >= 12 : false;
					echo ' @ <input type="text" maxlength="2" size="2" class="textbox" name="start_hour" value="' . $s_hour . '"/> : <input type="text" maxlength="2" size="2" class="textbox" name="start_min" value="' . $s_min . '"/>';
					echo ' <select name="start_ampm" class="textbox"><option value="am">' . translate('am') . '</option><option value="pm"' . (($s_pm) ? ' selected="selected"' : '') . '>' . translate('pm') . '</option></select>';
					echo ' <input type="checkbox" name="use_start_time"' . ($start_date_ok ? ' checked="checked"' : ''). '/> ' . translate('Use start date/time?');
				?>
			</td>
		</tr>
		<tr>
			<td class="formNames"><?php echo translate('End Date'); ?></td>
			<td class="cellColor">
				<?php  echo '<div id="div_end_date" style="float:left;width:70px;">' . Time::formatDate($end_date) . '</div><input type="hidden" id="hdn_end_date" name="end_date" value="' . date('m' . INTERNAL_DATE_SEPERATOR . 'd' . INTERNAL_DATE_SEPERATOR . 'Y', $end_date) . '"/> <a href="javascript:void(0);"><img src="img/calendar.gif" border="0" id="img_end_date" alt="' . translate('End') . '"/></a>';
					$s_hour = ($end_date_ok) ? date('h', $rs['end_datetime']) : '';
					$s_min = ($end_date_ok) ? date('i', $rs['end_datetime']) : '';
					$s_pm = ($end_date_ok) ? intval(date('H', $rs['end_datetime'])) >= 12 : false;
					echo ' @ <input type="text" maxlength="2" size="2" class="textbox" name="end_hour" value="' . $s_hour . '"/> : <input type="text" maxlength="2" size="2" class="textbox" name="end_min" value="' . $s_min . '"/>';
					echo ' <select name="end_ampm" class="textbox"><option value="am">' . translate('am') . '</option><option value="pm"' . (($s_pm) ? ' selected="selected"' : '') . '>' . translate('pm') . '</option></select>';
					echo ' <input type="checkbox" name="use_end_time"' . ($end_date_ok ? ' checked="checked"' : ''). '/> ' . translate('Use end date/time?');
				?>
			</td>
		</tr>
	  </table>
    </td>
  </tr>
</table>
<br />
<?php
        // Print out correct buttons
        if (!$edit) {
            echo submit_button(translate('Add Announcement'), 'announcementid') . hidden_fn('addAnnouncement')
			. ' <input type="reset" name="reset" value="' . translate('Clear') . '" class="button" />' . "\n";
        }
		else {
            echo submit_button(translate('Edit Announcement'), 'announcementid') . cancel_button($pager) . hidden_fn('editAnnouncement')
				. '<input type="hidden" name="announcementid" value="' . $rs['announcementid'] . '" />' . "\n";
		}
		echo "</form>\n";
		print_jscalendar_setup($start_date_ok ? $rs['start_datetime'] : null, $end_date_ok ? $rs['end_datetime'] : null);		// Set up the javascript calendars
		// Unset variables
		unset($rs);
}

function print_manage_groups(&$pager, $groups, $err) {
	global $link;

?>
<form name="manageGroups" method="post" action="admin_update.php">
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" class="responsive manageGroups" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="4" class="tableTitle">&middot; <?php echo translate('All Groups'); ?></td>
        </tr>
		<?php echo "
        <tr class=\"rowHeaders\">
          <td>" . translate('Group Name') . "</td>
          <td width=\"17%\">" . translate('Administrator') . "</td>
		  <td width=\"10%\">" . translate('Manage Users') . "</td>
		  <td width=\"5%\">" . translate('Edit') . "</td>
          <td width=\"7%\">" . translate('Delete') . "</td>
        </tr>";

	if (!$groups)
		echo '<tr class="cellColor0"><td colspan="5" style="text-align: center;">' . $err . '</td></tr>' . "\n";

    for ($i = 0; is_array($groups) && $i < count($groups); $i++) {
		$cur = $groups[$i];
        echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" id=\"tr$i\">\n"
            . '<td style="text-align:left">' . $cur['group_name'] . "</td>\n"
            . '<td style="text-align:left">' . ( !empty($cur['lname']) ? ($cur['lname'] . ', ' . $cur['fname']) : translate('None') ) . "</td>\n"
            . '<td>' . $link->getLink('admin.php?tool=users&amp;groupid=' . $cur['groupid'], (intval($cur['user_count']))) . '</td>'
			. '<td>' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&groupid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;groupid=' . $cur['groupid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['groupid']))) . "</td>\n"
            . "<td><input type=\"checkbox\" name=\"groupid[]\" value=\"" . $cur['groupid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\" /></td>\n"
            . "</tr>\n";
    }

    // Close table
    ?>
      </table>
    </td>
  </tr>
</table>
<br />
<?php
	echo submit_button(translate('Delete Groups'), 'groupid') . hidden_fn('delGroup');
?>
</form>
<?php
}

/**
* Interface to add or edit announcement information
* @param Group $group array of schedule data
* @param boolean $edit whether this is an edit or not
* @param object $pager Pager object
*/
function print_group_edit($group, $edit, &$pager, $group_users = array()) {
	global $conf;
    ?>
<form name="addGroup" method="post" action="admin_update.php">
<table width="100%" class="responsive-one-item" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="formNames"><?php echo translate('Group Name');?></td>
          <td class="cellColor"><input type="text" name="group_name" class="textbox" size="50" maxlength="50" value="<?php echo !empty($group->name) ? $group->name : ''; ?>" />
          </td>
        </tr>
        <tr>
          <td width="200" class="formNames"><?php echo translate('Administrator');?></td>
          <td class="cellColor"><select name="group_admin" class="textbox">
			<?php
				echo '<option value="">' . translate('None') . '</option>';
				for ($i = 0; $i < count($group_users); $i++) {
					echo "<option value=\"{$group_users[$i]['memberid']}\"";
					if ($group_users[$i]['memberid'] == $group->adminid) {
						echo ' selected="selected"';
					}
					echo ">{$group_users[$i]['lname']}, {$group_users[$i]['fname']}</option>\n";
				}
			?>
		  </select>
          </td>
        </tr>
	  </table>
    </td>
  </tr>
</table>
<br />
<?php
        // Print out correct buttons
        if (!$edit) {
            echo submit_button(translate('Save'), 'groupid') . hidden_fn('addGroup')
			. ' <input type="reset" name="reset" value="' . translate('Clear') . '" class="button" />' . "\n";
        }
		else {
            echo submit_button(translate('Edit'), 'groupid') . cancel_button($pager) . hidden_fn('editGroup')
				. '<input type="hidden" name="groupid" value="' . $group->id . '" />' . "\n";
		}
		echo "</form>\n";
}

/**
* Prints out GUI list to of email addresses
* Prints out a table with option to email users,
*  and prints form to enter subject and message of email
* @param array $users user data
* @param string $sub subject of email
* @param string $msg message of email
* @param array $usr users to send to
* @param string $err last database error
*/
function print_manage_email($users, $sub, $msg, $usr, $err) {
	?>
<form name="emailUsers" method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?tool=' . $_GET['tool']?>">
  <table width="60%" border="0" cellspacing="0" cellpadding="1">
    <tr>
      <td class="tableBorder">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td colspan="3" class="tableTitle">&middot; <?php echo translate('Email Users')?></td>
          </tr>
		  <?php echo "
          <tr class=\"rowHeaders\">
            <td width=\"15%\">&nbsp;</td>
            <td width=\"40%\">" . translate('User') . "</td>
            <td width=\"45%\">" . translate('Email') . "</td>
          </tr>";

	if (!$users)
		echo '<tr class="cellColor0" style="text-align: center;"><td colspan="3">' . $err . '</td></tr>';
    // Print users out in table
    for ($i = 0; is_array($users) && $i < count($users); $i++) {
		$cur = $users[$i];
        echo '<tr class="cellColor' . ($i%2) . "\">\n"
            . '<td style="text-align: center;"><input type="checkbox" ';
		if ( empty($usr) || in_array($cur['email'], $usr) )
			echo 'checked="checked" ';
		echo 'name="emailIDs[]" value="' . $cur['email'] . "\" /></td>\n"
            . '<td>&lt;' . $cur['lname'] . ', ' . $cur['fname'] . '&gt;</td>'
            . '<td>' . $cur['email'] . '</td>'
            . "</tr>\n";
    }
    ?>
          <tr>
            <td class="cellColor0" style="text-align: center;">
              <input type="checkbox" name="checkAll" checked="checked" onclick="checkAllBoxes(this);" />
            </td>
			<td colspan="2" class="cellColor0">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br />
  <table width="60%" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td width="15%"><p><?php echo translate('Subject')?></p>
      </td>
      <td><input type="text" name="subject" size="60" class="textbox" value="<?php echo $sub?>"/>
      </td>
    </tr>
    <tr>
      <td valign="top"><p><?php echo translate('Message')?></p>
      </td>
      <td><textarea rows="10" cols="60" name="message" class="textbox"><?php echo $msg?></textarea>
      </td>
    </tr>
  </table>
  <input type="submit" name="previewEmail" value="<?php echo translate('Next')?> &gt;" class="button" />
</form>
<?php
}

/**
* Prints out a preview of the email to be sent
* @param string $sub subject of email
* @param string $msg message of email
* @param array $usr array of users to send the email to
*/
function preview_email($sub, $msg, $usr) {
?>
<table width="60%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td bgcolor="#DEDEDE">
      <table width="100%" cellpadding="3" cellspacing="1" border="0">
        <tr class="cellColor0">
          <td><?php echo $sub?>
          </td>
        </tr>
        <tr class="cellColor0">
          <td><?php echo $msg?>
          </td>
        </tr>
		<tr class="cellColor0">
		  <td>
		  <?php
		  if (empty($usr)) echo translate('Please select users');
		  foreach ($usr as $email) { echo $email . '<br />'; }
		  ?>
		  </td>
		</tr>
      </table>
    </td>
  </tr>
</table>
<br />
<form action="<?php echo $_SERVER['PHP_SELF'] . '?tool=' . $_GET['tool']?>" method="post" name="send_email">
<input type="button" name="goback" value="&lt; <?php echo translate('Back')?>" class="button" onclick="history.back();" />
<input type="submit" name="sendEmail" value="<?php echo translate('Send Email')?>" class="button" />
</form>
<?php
}


/**
* Actually sends the email to all addresses in POST
* @param string $subject subject of email
* @param string $msg email message
* @param array $success array of users that email was successful for
*/
function print_email_results($subject, $msg, $success) {
    if (!$success)
		CmnFns::do_error_box(translate('problem sending email'), '', false);
	else {
		CmnFns::do_message_box(translate('The email sent successfully.'));
	}

    echo '<h4 align="center">' . translate('do not refresh page') . '<br/>'
        . '<a href="' . $_SERVER['PHP_SELF'] . '?tool=email">' . translate('Return to email management') . '</a></h4>';
}

/**
* Prints out a list of tables and all the fields in them
*  with an option to select which tables and fields should be exported
*  and in which format
* @param array $tables array of tables
* @param array $fields array of fields for each table
*/
function show_tables($tables, $fields) {
	echo '<h5>' . translate('Please select which tables and fields to export') . '</h5>'
		. '<form name="get_fields" action="' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] . '" method="post">' . "\n";
	for ($i = 0; $i < count($tables); $i++) {
		echo '<p><input type="checkbox" name="table[]" value="' . $tables[$i] . '"  checked="checked" onclick="javascript: toggle_fields(this);" />' . $tables[$i] . "</p>\n";

		echo '<select name="table,' . $tables[$i] . '[]" multiple="multiple" size="5" class="textbox">' . "\n";
		echo '<option value="all" selected="selected">' . translate('all fields') . "</option>\n";
		for ($k = 0; $k < count($fields[$tables[$i]]); $k++)
			echo  '<option value="' . $fields[$tables[$i]][$k] . '">' . $fields[$tables[$i]][$k] . '</option>' . "\n";

		echo "</select><br />\n";
	}
	echo '<p><input type="radio" name="type" value="xml" checked="checked" />' . translate('XML')
		. '<input type="radio" name="type" value="csv" />' . translate('CSV')
		. '</p><br /><input type="submit" name="submit" value="' . translate('Export Data') . '" class="button" /></form>';
}

/**
* Begins the line of table data
* @param boolean $xml if this is in XML or not
* @param string $table_name name of this table
*/
function start_exported_data($xml, $table_name) {
	echo '<pre>';
	echo ($xml) ? "&lt;$table_name&gt;\r\n" : '';
}

/**
* Prints out the exported data in XML or CSV format
* @param array $data array of data to print out
* @param boolean $xml whether to print XML or not
*/
function print_exported_data($data, $xml) {
	$first_row = true;
	for ($x = 0; $x < count($data); $x++) {
		echo ($xml) ? "\t&lt;record&gt;\r\n" : '';

		if (!$xml && $first_row) {				// Print out names of fields for first row of CSV
				$keys = array_keys($data[$x]);
				for ($i = 0; $i < count($keys); $i++) {
					echo '"' . $keys[$i] . '"';
					if ($i < count($keys)-1) echo ',';
				}
				echo "\r\n";
		}

		$first_row = false;

		$first_csv = '"';
		foreach ($data[$x] as $k => $v) {
			echo ($xml) ? "\t\t&lt;$k&gt;$v&lt;/$k&gt;\r\n" : $first_csv . addslashes($v) . '"';
			$first_csv = ',"';
		}
		echo ($xml) ? "\t&lt;/record&gt;\r\n" : "\r\n";
	}
}

/**
* Prints out an interface to manage blackout times for this resource
* @param array $resource array of resource data
* @param array $blackouts array of blackout data
*/
function print_blackouts($resource, $blackouts) {
	for ($i = 0; $i < count($resource); $i++)
		echo $resouce[$i] . '<br />';
}

/**
* Ends the line of table data
* @param boolean $xml if this is in XML or not
* @param string $table_name name of this table
*/
function end_exported_data($xml, $table_name) {
	echo ($xml) ? "&lt;/$table_name&gt;\r\n" : '';
	echo '</pre>';
}

/**
* Prints the form to reset a users password
* @param object $user user object
*/
function print_reset_password(&$user) {
?>
<form name="resetpw" method="post" action="admin_update.php">
  <table border="0" cellspacing="0" cellpadding="1" width="50%">
    <tr>
      <td class="tableBorder">
        <table cellspacing="1" cellpadding="2" border="0" width="100%">
          <tr class="rowHeaders">
		  	<td colspan="2"><?php echo translate('Reset Password for', array($user->get_name()))?></td>
		  </tr>
		  <tr class="cellColor">
            <td width="15%" valign="top"><?php echo translate('Password')?></td>
			<td><input type="password" value="" class="textbox" name="password" />
			<br />
			<i><?php echo translate('If no value is specified, the default password set in the config file will be used.')?></i>
			</td>
          </tr>
		  <tr class="cellColor">
		    <td colspan="2"><input type="checkbox" name="notify_user" value="true" checked="checked"/><?php echo translate('Notify user that password has been changed?')?></td>
		  </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="memberid" value="<?php echo $user->get_id()?>" />
  <br />
  <?php echo submit_button(translate('Save')) . hidden_fn('resetPass')?>
  <input type="button" name="cancel" value="<?php echo translate('Manage Users')?>" class="button" onclick="document.location='<?php echo $_SERVER['PHP_SELF']?>?tool=users';" />
</form>
<?php
}

/**
* Prints out a message that the current user cannot perform the function
* @param none
*/
function print_not_allowed() {
	echo translate('This is only accessable to the administrator');
}

/**
* Returns a button to cancel editing
* @param none
* @return string of html for a cancel button
*/
function cancel_button(&$pager) {
	return '<input type="button" name="cancel" value="' . translate('Cancel') . '" class="button" onclick="javascript: document.location=\'' . $_SERVER['PHP_SELF'] . '?tool=' . $_GET['tool'] . '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() . '&amp;' . $pager->getPageVar() . '=' . $pager->getPageNum() . '\';" />' . "\n";
}

/**
* Returns a submit button with $value value
* @param string $value value of button
* @param string $get_value value in the query string for editing an item (ie, to edit a resource its machid)
* @return string of html for a submit button
*/
function submit_button($value, $get_value = '') {
	return '<input type="submit" name="submit" value="' . $value . '" class="button" />' . "\n"
			. '<input type="hidden" name="get" value="' . $get_value  . '" />' . "\n";
}

/**
* Returns a hidden fn field
* @param string $value value of the hidden field
* @return string of html for hidden fn field
*/
function hidden_fn($value) {
	return '<input type="hidden" name="fn" value="'. $value . '" />' . "\n";
}

/**
* Prints out the javascript necessary to set up the calendars for choosing start/end dates
* @param int $start initial start date time
* @param int $end initial end date time
*/
function print_jscalendar_setup($start = null, $end = null) {
	global $dates;
	if ($start == null) { $start = mktime(); }
	if ($end == null) { $end = mktime(); }
	?>
	<script type="text/javascript">
	var start = new Date(<?php echo date('Y', $start) . ',' . (intval(date('m', $start))-1) . ',' . date('d', $start)?>);
	// Start date calendar
	Calendar.setup(
	{
	inputField : "hdn_start_date", // ID of the input field
	ifFormat : "<?php echo '%m' . INTERNAL_DATE_SEPERATOR . '%d' . INTERNAL_DATE_SEPERATOR . '%Y'?>", // the date format
	daFormat : "<?php echo $dates['general_date']?>", // the date format
	button : "img_start_date", // ID of the button
	date : start,
	displayArea : "div_start_date"
	}
	);
	var end = new Date(<?php echo date('Y', $end) . ',' . (intval(date('m', $end))-1) . ',' . date('d', $end)?>);
	// End date calendar
	Calendar.setup(
	{
	inputField : "hdn_end_date", // ID of the input field
	ifFormat : "<?php echo '%m' . INTERNAL_DATE_SEPERATOR . '%d' . INTERNAL_DATE_SEPERATOR . '%Y'?>", // the date format
	daFormat : "<?php echo $dates['general_date']?>", // the date format
	button : "img_end_date", // ID of the button
	date : end,
	displayArea : "div_end_date"
	}
	);
	</script>
<?php
}

function print_additional_tools_box($links) {
?>
<table border="0" cellspacing="0" cellpadding="2" class="additionalTools">
  <tr>
    <td class="additionalToolsHead"><h5 align="center"><?php echo translate('Additional Tools')?></h5></td>
  </tr>
  <tr>
<?php
	for ($i = 0; $i < count($links); $i++) {
    	echo " <td>- <a href=\"{$links[$i][1]}\">" . translate($links[$i][0]) . " </td>\n";
	}
?>
  </tr>
</table>
<?php
}
?>