
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
      
	  <table width="100%" id="manageUser" class="display responsive wrap  coworkers" width="100%" >
        
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
          <td  class=\"".$ss[$i++]." fname\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'fname'), translate('First Name')) . " </td>
		  <td  class=\"".$ss[$i++]." lname\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'lname'), translate('Last Name')) . " (edit)</td>
		  <td  class=\"".$ss[$i++]." coworker\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'klas'), translate('Coworker')). "</td>
		  <td  class=\"".$ss[$i++]." klas\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'klas'), translate('leenpermissie')). "</td>
          <td  class=\"".$ss[$i++]." email\">" . translate('Email'). "</td>
          <td  class=\"".$ss[$i++]." phone\">" . translate('Phone') . "</td>
		  <td  class=\"".$ss[$i++]." mobile\">" . translate('Mobile phone') . "</td>
		  <td  class=\"".$ss[$i++]." email2\">" . translate('Email address 2') . "</td>
		  <td  class=\"".$ss[$i++]." lnotes\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'lnotes'), translate('lnotes')). "</td>
		  <td  class=\"".$ss[$i++]." demp\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'demerit_punt'), translate('demerit_punt')). "</td>
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