<?php
/**
* Provide the output functions for the SelectUser class
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-07-09
* @package Templates
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/

$link = CmnFns::getNewLink();	// Get Link object

/**
* Prints out the user management table
* @param Object $pager pager object
* @param mixed $users array of user data
* @param string $err last database error
*/
function print_user_list(&$pager, $users, $err, $javascript) 
{
	global $link;
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
				// $('input#id_searchs').quicksearch('table tbody tr');
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{'persist':false});
				
			});
		</script>
<br /> 
	<p align="left"> 
	Zoek <form action="#" onsubmit="return false"><input type="search" name="search" value="" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search --></form><script type="text/javascript">$('input#id_searchs').focus();</script> 
	</p>
<!-- janr search end-->

<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="7" class="tableTitle">&middot; <?php echo translate('All Users')?> </td>
        </tr>
        <tr class="rowHeaders">
          <td ><?php echo translate('Name')?></td>
          <td ><?php echo translate('Email')?></td>
		  <td ><?php echo translate('klas').' '.translate('leenpermissie') ?></td>
		  <td ><?php echo translate('Userstatus')?></td>
        </tr>
        <?php
	
	if (!$users)
	{
		echo '<tr class="cellColor0"><td colspan="2" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	}else {
		echo '<tbody  id="tbody_list">'; // ivm jquery
	}
	
	for ($i = 0; is_array($users) && $i < count($users); $i++) 
	{
		$cur = $users[$i];
		$fname = $cur['fname'];
		$lname = $cur['lname'];
		$email = $cur['email'];
		$klas = $cur['klas']; //janr
		$phone = $cur['phone']; //janr
		$leenpermissie = $cur['leenpermissie']; //janr
		
		$osiris_ok_now = $cur['osiris_ok_now'];				// janr user status: 'osiris_ok_now','demerit_punt'
		$demerit_punt = $cur['demerit_punt'];
		$userstatustxt = CmnFns::validate_user ($osiris_ok_now, $demerit_punt); // userstatustext
		
		if ($osiris_ok_now == '1')  // userstatus = oke
		{
			$fname_lname = array($fname, $lname);
			// jaro, toevoegen aan selectUserForReservation:  phone, klas, leenpermissie, demerit_text 
			echo "<tr class=\"cellColor" . ($i%2) . "\" align=\"center\" onmouseover=\"this.className='SelectUserRowOver';\" onmouseout=\"this.className='cellColor" . ($i%2) . "';\" onclick=\"" . sprintf("$javascript('%s','%s','%s','%s','%s','%s','%s','%s');", $cur['memberid'], addslashes($fname), addslashes($lname), addslashes($email),addslashes($phone), addslashes($klas), addslashes($leenpermissie), addslashes($demerit_punt) ) . "\">\n"
				   . "<td style=\"text-align:left;\">$fname $lname</td>\n"
				   . "<td style=\"text-align:left;\">$email</td>\n"
				   . "<td style=\"text-align:left;\">$klas $leenpermissie</td>\n"
				   . "<td style=\"text-align:left;\">$userstatustxt</td>\n"
				   . "<td style=\"display:none\">" .$cur['memberid'] . "</td>\n"
				   . "</tr>\n";
		   }
    }
    // Close users table
    ?>	
		</tbody> <!-- janr search -->
      </table>
    </td>
  </tr>
</table>
<br />

<?php
}


function print_lname_links() {
	global $letters;
	echo '<a href="javascript: search_user_lname(\'\');">' . translate('All Users') . '</a>';
	foreach($letters as $letter) {
		echo '<a href="javascript: search_user_lname(\''. $letter . '\');" style="padding-left: 10px; font-size: 12px;">' . $letter . '</a>';
	}
}
?>