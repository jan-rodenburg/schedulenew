<?php
/**
* This file provides output functions for ctrlpnl.php
* No data manipulation is done in this file
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author Adam Moore
* @author David Poole <David.Poole@fccc.edu>
* @author Richard Cantzler <rmcii@users.sourceforge.net>
* @version 01-25-07
* @package Templates
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

// Get Link object
$link = CmnFns::getNewLink();

/**
* This function prints out the announcement table
*
* @param array announcements
* @global $conf
* @global $link
*/
function showAnnouncementTable($announcements) {
	global $link;
	global $conf;
    ?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="tableTitle">
		    <a href="javascript: void(0);" onclick="showHideCpanelTable('announcements');">&middot; <?php echo translate('My Announcements')?></a>
		  </td>
          <td class="tableTitle">
            <div align="right">
              <?php $link->doLink('javascript: help(\'my_announcements\');', '?', '', 'color: #FFFFFF;', translate('Help') . ' - ' . translate('My Announcements')) ?>
            </div>
          </td>
        </tr>
      </table>
      <div id="announcements" style="display: <?php echo getShowHide('announcements') ?>">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr class="cellColor">
          <td colspan="2"><b><?php echo translate('Announcements as of', array(Time::formatDate(mktime()))) ?></b>
            <ul style="margin-bottom: 0px; margin-left: 20px; margin-top: 5px">
              <?php
				// Cycle through and print out announcements
                if (!$announcements) {
                    echo "<li>".translate('There are no announcements').".</li>\n";
                } else {
                    // For each reservation, clean up the date/time and print it
                    for ($i = 0; is_array($announcements) && $i < count($announcements); $i++) {
                        $rs = $announcements[$i];
                        echo '<li>' . $rs['announcement'] . '</li>';
                    }
                    unset($announcements);
                }
				?>
            </ul>
          </td>
        </tr>
      </table>
	 </div>
    </td>
  </tr>
</table>
<?php
}


/**
* Print table listing upcoming reservations
* This function prints a table of all upcoming
* reservations for the current user.  It also
* provides a way for them to modify and delete
* their reservations
* @param mixed $res array of reservation data
* @param string $err last error message from database
*/
function showReservationTable($res, $err) {
	global $link;
	global $conf;
	$order = array('start_date', 'end_date', 'name', 'starttime', 'endtime', 'created', 'modified');
	$util = new Utility();
	$qs = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
	<tr class="cellColor"><td colspan="3" align="left"><div class="intro-help"><?php echo translate('Homepage Intro Student')?></div></td></tr>
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
	  
        <tr>
          <td class="tableTitle" width="120">
		  	<a href="javascript: void(0);" onclick="showHideCpanelTable('reservation');">&middot; <?php echo translate('My Reservations')?></a></div>
		  </td>
		  <td class="tableTitle" width="20">
		  	<?php $link->doImageLink('export.php', 'img/export.gif', 'Export Reservations'); ?>
		  </td>
          <td class="tableTitle">
            <div align="right">
              <?php $link->doLink('javascript: help(\'my_reservations\');', '?', '', 'color: #FFFFFF;', translate('Help') . ' - ' . translate('My Reservations')) ?>
			</div>
          </td>
        </tr>
      </table>
      <div id="reservation" style="display: <?php echo getShowHide('reservation') ?>">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr class="rowHeaders">
          <td width="10%">
		  	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'start_date'), translate('Start Date')); ?>
		  </td>
		  <td width="10%">
		 	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'end_date'), translate('End Date')); ?>
		  </td>
          <td width="23%">
		  	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'name'), translate('Resource')); ?>
		  </td>
          <td width="10%">
		  	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'starttime'), translate('Start Time')); ?>
		  </td>
          <td width="10%">
		  	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'endtime'), translate('End Time')); ?>
		  </td>
          <td width="20%">
		  	<?php $link->doLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($qs, 'created'), translate('Created')); ?>
		  </td>
          <td width="8%"><?php echo translate('Modify')?></td>
          <td width="8%"><?php echo translate('Delete')?></td>
        </tr>

        <?php

	// Write message if they have no reservations
	if (!$res)
		echo '        <tr class="cellColor"><td colspan="8" align="center">' . $err . '</td></tr>';

    // For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$bgcolor = '';
		$rs = $res[$i];
		$class = 'cellColor' . ($i%2);
		if ($res[$i]['is_pending']) {
			$class = 'cpanelCell';
			$bgcolor = '#' . $conf['ui']['pending'][0]['color'];
		}
        $modified = (isset($rs['modified']) && !empty($rs['modified'])) ?
		Time::formatDateTime($rs['modified']) : 'N/A';
        echo "        <tr class=\"$class\" align=\"center\" style=\"background-color:$bgcolor;\">"
					. "          <td>" . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['start_date'], $rs['starttime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td>' . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['end_date'], $rs['endtime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td style="text-align:left;">' . $rs['name'] . '</td>'
					. '          <td>' . Time::formatTime($rs['starttime']) . '</td>'
					. '          <td>' . Time::formatTime($rs['endtime']) . '</td>'
                    . '          <td>' . Time::formatDateTime($rs['created']) . '</td>'
					. '          <td>' . $link->getLink("javascript: reserve('m','','','" . $rs['resid'] . "');", translate('IconModify'), '', '', translate('Modify this reservation')) . '</td>'
					. '          <td>' . $link->getLink("javascript: reserve('d','','','" . $rs['resid'] . "');", translate('IconDelete'), '', '', translate('Delete this reservation')) . '</td>'
					. "        </tr>\n";
	}
?>
      </table>
	  </div>
    </td>
  </tr>
</table>
<?php
}


/**
* Print table with all user training information
* @param mixed $per permissions array
* @param string $err last database error
*/
function showTrainingTable($per, $err) {
	global $link;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td class="tableTitle" colspan="3">
		    <a href="javascript: void(0);" onclick="showHideCpanelTable('permissions');">&middot; <?php echo translate('My Permissions')?></a>
		  </td>
          <td class="tableTitle">
            <div align="right">
              <?php $link->doLink('javascript: help(\'my_training\');', '?', '', 'color: #FFFFFF', translate('Help') . ' - ' . translate('My Permissions')) ?>
            </div>
          </td>
        </tr>
      </table>
      <div id="permissions" style="display: <?php echo getShowHide('permissions') ?>;">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr class="rowHeaders">
          <td width="20%"><?php echo translate('Resource')?></td>
          <td width="25%"><?php echo translate('Location')?></td>
          <td width="15%"><?php echo translate('Phone')?></td>
          <td width="40%"><?php echo translate('Notes')?></td>
        </tr>
        <?php
	// If they have no training, inform them
	if (!$per)
		echo '<tr><td colspan="4" class="cellColor" align="center">' . $err . '</td></tr>';

	// Cycle through and print out machines
    for ($i = 0; is_array($per) && $i < count($per); $i++) {
		$rs = $per[$i];
		$class = 'cellColor' . ($i%2);
		echo "<tr class=\"$class\">\n"
            . '<td>' . $rs['name'] . '</td>'
			. '<td>' . $rs['location'] . '</td>'
			. '<td>' . $rs['rphone'] . '</td>'
            . '<td>' . $rs['notes'] . '</td>'
			. "</tr>\n";
	}
	unset($per);
    ?>
      </table>
	  </div>
    </td>
  </tr>
</table>
<?php
}

/**
* This function prints a table of all upcoming
* reservations that the current user has been invited to but not yet responded to.
* It also provides a way for them to accept/decline invitations
* @param mixed $res array of reservation data
* @param string $err last error message from database
*/
function showInvitesTable($res, $err) {
	global $link;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="7" class="tableTitle">
		    <a href="javascript: void(0);" onclick="showHideCpanelTable('invites');">&middot; <?php echo translate('My Invitations')?></a>
		  </td>
          <td class="tableTitle">
            <div align="right">
              <?php $link->doLink('javascript: help(\'my_invitations\');', '?', '', 'color: #FFFFFF;', translate('Help') . ' - ' . translate('My Invitations')) ?>
            </div>
          </td>
        </tr>
      </table>
      <div id="invites" style="display: <?php echo getShowHide('invites') ?>">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr class="rowHeaders">
          <td width="10%"><?php echo translate('Start Date')?></td>
		  <td width="10%"><?php echo translate('End Date')?></td>
          <td width="23%"><?php echo translate('Resource')?></td>
          <td width="10%"><?php echo translate('Start Time')?></td>
          <td width="10%"><?php echo translate('End Time')?></td>
          <td width="20%"><?php echo translate('Owner')?></td>
          <td width="8%"><?php echo translate('Accept')?></td>
          <td width="8%"><?php echo translate('Decline')?></td>
		</tr>
        <?php

	// Write message if they have no reservations
	if (!$res)
		echo '        <tr class="cellColor"><td colspan="8" align="center">' . $err . '</td></tr>';

    // For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$rs = $res[$i];
		$class = 'cellColor' . ($i%2);
		echo "        <tr class=\"$class\" align=\"center\">"
					. '          <td>' . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['start_date'], $rs['starttime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td>' . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['end_date'], $rs['endtime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td style="text-align:left;">' . $rs['name'] . '</td>'
					. '          <td>' . Time::formatTime($rs['starttime']) . '</td>'
					. '          <td>' . Time::formatTime($rs['endtime']) . '</td>'
                    . '          <td style="text-align:left;">' . $rs['fname'] . ' ' . $rs['lname'] . '</td>'
					. '          <td>' . $link->getLink("manage_invites.php?id={$rs['resid']}&amp;memberid={$rs['memberid']}&amp;accept_code={$rs['accept_code']}&amp;action=" . INVITE_ACCEPT, translate('Accept'), '', '', translate('Accept or decline this reservation')) . '</td>'
					. '          <td>' . $link->getLink("manage_invites.php?id={$rs['resid']}&amp;memberid={$rs['memberid']}&amp;accept_code={$rs['accept_code']}&amp;action=" . INVITE_DECLINE, translate('Decline'), '', '', translate('Accept or decline this reservation')) . '</td>'
					. "        </tr>\n";
	}
	unset($res);
?>
      </table>
	  </div>
    </td>
  </tr>
</table>
<?php
}

/**
* This function prints a table of all upcoming
* reservations that the current user has been invited to but not yet responded to.
* It also provides a way for them to accept/decline invitations
* @param mixed $res array of reservation data
* @param string $err last error message from database
*/
function showParticipatingTable($res, $err) {
	global $link;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="7" class="tableTitle">
		    <a href="javascript: void(0);" onclick="showHideCpanelTable('accepted');">&middot; <?php echo translate('My Reservation Participation')?></a>
		  </td>
          <td class="tableTitle">
            <div align="right">
              <?php $link->doLink('javascript: help(\'my_participation\');', '?', '', 'color: #FFFFFF;', translate('Help') . ' - ' . translate('My Reservation Participation')) ?>
            </div>
          </td>
        </tr>
      </table>
      <div id="accepted" style="display: <?php echo getShowHide('accepted') ?>">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr class="rowHeaders">
          <td width="10%"><?php echo translate('Start Date')?></td>
		  <td width="10%"><?php echo translate('End Date')?></td>
          <td width="23%"><?php echo translate('Resource')?></td>
          <td width="10%"><?php echo translate('Start Time')?></td>
          <td width="10%"><?php echo translate('End Time')?></td>
          <td width="20%"><?php echo translate('Owner')?></td>
          <td width="16%"><?php echo translate('End Participation')?></td>
		</tr>
     <?php

	// Write message if they have no reservations
	if (!$res)
		echo '        <tr class="cellColor"><td colspan="7" align="center">' . $err . '</td></tr>';

    // For each reservation, clean up the date/time and print it
	for ($i = 0; is_array($res) && $i < count($res); $i++) {
		$rs = $res[$i];
		$class = 'cellColor' . ($i%2);
		echo "        <tr class=\"$class\" align=\"center\">"
					. '          <td>' . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['start_date'], $rs['starttime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td>' . $link->getLink("javascript: reserve('v','','','" . $rs['resid']. "');", Time::formatReservationDate($rs['end_date'], $rs['endtime']), '', '', translate('View this reservation')) . '</td>'
					. '          <td style="text-align:left;">' . $rs['name'] . '</td>'
					. '          <td>' . Time::formatTime($rs['starttime']) . '</td>'
					. '          <td>' . Time::formatTime($rs['endtime']) . '</td>'
                    . '          <td style="text-align:left;">' . $rs['fname'] . ' ' . $rs['lname'] . '</td>'
					. '          <td>' . $link->getLink("manage_invites.php?id={$rs['resid']}&amp;memberid={$rs['memberid']}&amp;accept_code={$rs['accept_code']}&amp;action=" . INVITE_DECLINE, translate('End Participation'), '', '', translate('End Participation')) . '</td>'
					. "        </tr>\n";
	}
	unset($res);
?>
      </table>
	  </div>
    </td>
  </tr>
</table>
<?php
}
/**
* Print out a table of links for user or administrator
* This function prints out a table of links to
* other parts of the system.  If the user is an admin,
* it will print out links to administrative pages, also
* @param none
*/
//function offerScheduleSearch($is_admin = false, $is_group_admin = false) {
function linkScheduleSearch($is_admin = false, $is_group_admin = false, $is_schedule_admin = false) {
	global $conf;
	global $link;

// zoek in reserveringen...

}
/**
* Print out a table of links for user or administrator
* This function prints out a table of links to
* other parts of the system.  If the user is an admin,
* it will print out links to administrative pages, also
* @param none
*/
//function showQuickLinks zie template.class
/**
* Print out break to be used between tables
* @param none
*/
function printCpanelBr() {
	echo '<p>&nbsp;</p>';
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

function startQuickLinksCol() {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td style="vertical-align:top; width:16%; border:solid 2px #A2B5CD; background-color:#FFFFFF;">
<?php
}

function startDataDisplayCol() {
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<!--td style="vertical-align:top; width:16%; border:solid 2px #A2B5CD; background-color:#FFFFFF;">
</td -->
<td style="padding-left:5px; vertical-align:top;">
<?php
}

function endDataDisplayCol() {
?>
</td>
</tr>
</table>
<?php
}
?>