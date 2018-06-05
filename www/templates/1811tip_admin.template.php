<?php
/**
* Prints out list of current resources
* @param Pager $pager pager object
* @param mixed $resources array of resource data
* @param string $err last database error
*/
function print_manage_resources(&$pager, $resources, $err) {
	global $link;
	$util = new Utility();
 //print_additional_tools_box( array(
 //									array(
//										'Manage Additional Resources', $_SERVER['PHP_SELF'] . '?tool=additional_resources') )
//							);
							
// Janr Jquery search.
// echo ('Janr Jquery search:<br>');
?>
<!-- janr search -->
<?php // echo $link->getLink('admin.php?tool=resources&add=1', translate('Add Resource')) . "</p><br/>\n"; ?>
<?php 
// het is een link, niet een button
				// echo ('<input type="button" name="noname" value="' . translate('Add Resource') . '" class="button" ');
				// echo ("onclick=\"window.open('admin.php?tool=resources&add=1' , 'addart');\"/>");
?>
<?php 
// jaro dit zijn de links bovenaan het scherm op list resource page
//echo $link->getLink('admin.php?tool=resources&add=1', translate('Add Resource')) . "</p><br/>\n"; 
//echo $link->getLink('admin.php?tool=resources&add=1', "ADD AND RETURN TO THIS SCREEN") . "</p><br/>\n"; 
//echo $link->getLink('admin.php?tool=resources&add=1', "ADD AND GO TO LIST") . "</p><br/>\n"; 



?>
<?php // echo $link->getLink('admin.php?tool=resources&search=1', ' Show Not Active Only ') . "</p><br/>\n"; ?>
<script type="text/javascript"> 
			$(function () {
				$('input#id_searchs').quicksearch('tbody#tbody_list tr',{'persist':false});
			});
		</script>

	
	<table width="100%" border=0><tr><td >
	Zoek 	
<form action="#" onsubmit="return false">
   <input type="search" name="search" value="" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search -->
</form></p>
<script type="text/javascript">$('input#id_searchs').focus();</script> 
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
<table class="admin resources" width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%"  id="table_id_manage_resource display" class="responsive manageResource" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="18" class="tableTitle" &middot; <?php echo translate('All Resources')?></td>
        </tr>
		<?php echo "
        <tr class=\"rowHeaders\">
          <td class=\"edit\">" . translate('Edit') . "</td>
		  <td class=\"barcode\">" . translate('Barcode') . "</td>
		  <td class=\"duplicate\">" . translate('Duplicate') . "</td>
          <td class=\"status\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'status'), translate('Status')) . "</td>
		<td class=\"name\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'name'), translate('Resource Name')) . "</td>
          
		  <td class=\"schedule\" style=\"display:none\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'scheduletitle'), translate('Schedule')) . "</td>
		  <td class=\"serial\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'serial_nr'), translate('Serial_nr')) . "</td>
          <td class=\"package\">" . translate('Package') . "</td>
		  <td class=\"description\">" . translate('Description') . "</td>
		  <td class=\"notes\">" . translate('Notes') . "</td>
		  <td class=\"accesoires\">" . translate('Fixed accesoires') . "</td>
		  <td class=\"uitleennivo\">" . translate('uitleennivo') . "</td>
	  <td class=\"owner\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'rowner'), translate('Owner')) . "</td>
	  	  <td class=\"uitleenperiode\">" . $link->getLink($_SERVER['PHP_SELF'] . $util->getSortingUrl($_SERVER['QUERY_STRING'], 'uitleenperiode'), translate('uitleenperiode')) . "</td>
          <td class=\"delete\">" . translate('Delete') . "</td>
          <td class=\"delete\"> </td>
          <td class=\"maintenance\"> " . translate('Maintenance') . "</td>
          <td class=\"datum_aankoop\">" . translate('datum_aankoop') . " </td>
          <td class=\"aankoopbedrag\">" . translate('aankoopbedrag') . " </td>
        </tr>";

	if (!$resources)
		echo '<tr class="cellColor0"><td colspan="15" style="text-align: center;">' . $err . '</td></tr>' . "\n";
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
				. '<td class="edit">' . $link->getLink($_SERVER['PHP_SELF'] . '?' . preg_replace("/&machid=[\d\w]*/", "", $_SERVER['QUERY_STRING']) . '&amp;machid=' . $cur['machid'] . ((strpos($_SERVER['QUERY_STRING'], $pager->getLimitVar())===false) ? '&amp;' . $pager->getLimitVar() . '=' . $pager->getLimit() : ''), translate('IconEdit'), '', '', translate('Edit data for', array($cur['name']))) . "</td>\n"

			. '<td class="barcode" style="text-align:left">' . $cur['machid'] . "</td>\n"
				. '<td class="duplicate">' . $link->getLink("admin_update.php?fn=dupResource&amp;machid=" . $cur['machid'] . "&amp;duplicate=yes", translate('Duplicate'), '', '', translate('Make instant COPY of this resource')) . "</td>\n"
				
				. $togglestring 
				
			. '<td class="name" style="text-align:left">' . $cur['name'] . "</td>\n"
			   
				. '<td class="schedule" style="text-align:left;display:none">' . $cur['scheduletitle'] . "</td>\n"
				
				. '<td class="serial" style="text-align:left">' . $cur['serial_nr'] . "</td>\n"
				. '<td class="package" style="text-align:left">'. (isset($cur['package']) ?  $cur['package'] : '') . "</td>\n"
				// . '<td style="text-align:left">'.$thedescription.' '. (isset($cur['description']) ?  $cur['description'] : '&nbsp;') . "</td>\n"
				. '<td class="description" style="text-align:left">'.$thedescription."</td>\n"
				. '<td class="notes" style="text-align:left">'. (isset($cur['notes']) ?  $cur['notes'] : '&nbsp;') . "</td>\n"
				. '<td class="accesoires" style="text-align:left">'. (isset($cur['vast_toebehoren']) ?  $cur['vast_toebehoren'] : '&nbsp;') . "</td>\n"
				. '<td class="uitleennivo" style="text-align:left">'. (isset($cur['uitleennivo']) ?  $cur['uitleennivo'] : '&nbsp;') . "</td>\n"
				. '<td class="owner" style="text-align:left">'. (isset($cur['rowner']) ?  $cur['rowner'] : '&nbsp;') . "</td>\n"
				. '<td class="uitleenperiode" style="text-align:left">'. (isset($cur['uitleenperiode']) ?  $cur['uitleenperiode'] : '&nbsp;') . "</td>\n"
				. "<td class=\"checkbox\" ><input type=\"checkbox\" name=\"machid[]\" value=\"" . $cur['machid'] . "\" onclick=\"adminRowClick(this,'tr$i',$i);\" /></td>\n";
			echo 			 '<td class="delete" style="text-align:left">';
			echo submit_button(translate('Delete'), 'machid') . hidden_fn('delResource');
			echo 			 "</td>\n";
			echo'      	<td class="maintenance"> '. (isset($cur['maintenance']) ?  $cur['maintenance'] : '&nbsp;') . '</td>
						<td class="datum_aankoop">'. (isset($cur['datum_aankoop']) ?  $cur['datum_aankoop'] : '&nbsp;') . ' </td>
						<td class="aankoopbedrag">'. (isset($cur['aankoopbedrag']) ?  $cur['aankoopbedrag'] : '&nbsp;') . ' </td>';			
			echo 			 "</tr>\n";
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
?>
