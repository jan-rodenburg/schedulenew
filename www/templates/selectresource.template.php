<?php
/**
* new janr
*
* Provide the output functions for the Selectresource class
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @version 02-07-09
* @package Templates
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
require_once('lib/Reservation.class.php');
include_once('lib/helpers/ReservationHelper.class.php');
require_once('lib/db/ResDB.class.php');

$link = CmnFns::getNewLink();	// Get Link object

/**
* Prints out the resource management table
* @param Object $pager pager object
* @param mixed $resources array of resources data
* @param string $err last database error
*/
function print_resource_list(&$pager, $resources, $err, $javascript, $resid, $available, $uitleennivo) 
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
	<p align="left"> <?php //var_dump  ($pager) ?>
	Zoek <form action="#" onsubmit="return false"><input type="search" name="search" value="" id="id_searchs" placeholder="Search" autofocus /> <!-- janr search --></form><script type="text/javascript">$('input#id_searchs').focus();</script> 
	</p>
<!-- janr search end-->


<table width="100%" border="0" cellspacing="0" cellpadding="1" align="center">
  <tr>
    <td class="tableBorder">
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td colspan="7" class="tableTitle">&middot; <?php echo translate('All Resources')?> </td>
        </tr>
        <tr class="rowHeaders">
          <td ><?php echo translate('Name') ?></td>
          <td ><?php echo translate('Notes')?></td>
		  <td ><?php echo translate('Barcodekey')?></td>
		  <td ><?php echo (translate('Status')." ".translate('Uitleennivo'))?></td>
        </tr>
        <?php
	
	if (!$resources)
	{
		echo '<tr class="cellColor0" ><td colspan="2" style="text-align: center;">' . $err . '</td></tr>' . "\n";
	}else {
		echo '<tbody  id="tbody_list">'; // ivm jquery
	}
// FILTER	
		// jaro, test op available
		// input $resid
		// input current machid = $machid 
		// haal de reservering
		// test tegen de current machid
		
			$res = new Reservation($resid); //haal de res
			//echo ('resid: '.$resid ); //test
			// echo ('resid: '.$resid ); //test
			
			
			
	for ($i = 0; is_array($resources) && $i < count($resources); $i++) 
	{
		$cur = $resources[$i];
		$name = $cur['name'];
		$notes = $cur['notes'];
		$machid = $cur['machid']; 
		$status = $cur['status'];
		$uitleennivo = $cur['uitleennivo'];
		
//						FILTER				//

			//echo (' machid: '.$machid .'<br>'); //test
			$availtekst='';
			//if (($res->machid == $machid) || ($res->clusterid == $resid) ) { $availtekst='this';}// is master or child itself
			if (($res->machid == $machid)  ) { // is master or child itself
				$availtekst.='<span id=my'.$machid.' class="valop">not available (this)</span>';				
			}else{
				$res->machid = $machid; //deze machid willen we testen
				if ($res->check_res_resource_verlenging()) {
					//$availtekst='';
					$availtekst.='<span id=my'.$machid.' class="valopgroen"></span>';				
				}else{
			//		echo (' NONO machid: '.$machid .'<br>'); //test
					$availtekst.='<span id=my'.$machid.' class="valop">not available</span>';	
				}
			}
//		END				FILTER				//	

		
		if ($status=='a') {	

				echo "<tr class=\" cellColor" . ($i%2) . "\" align=\"center\" onmouseover=\"this.className='SelectUserRowOver';\" 
					. onmouseout=\"this.className='cellColor" . ($i%2) . "';\" onclick=\"" 
					. sprintf("$javascript('%s','%s','%s');", $cur['machid'], addslashes($name), addslashes($uitleennivo)) . "\">\n"
				   . "<td style=\"text-align:left;\">$name </td>\n"
				   . "<td style=\"text-align:left;\">$availtekst $notes</td>\n"
				   . "<td style=\"text-align:left;\">$machid</td>\n"
				   . "<td style=\"text-align:left;\">actief $uitleennivo</td>\n"
				   . "</tr>\n";
		}
    }
    // Close resources table
    ?>	
		</tbody> <!-- janr search -->
      </table>
    </td>
  </tr>
</table>
<br />

<?php
}


function print_name_links() {
	global $letters;
	echo '<a href="javascript: search_resource_name(\'\');">' . translate('All Resources') . '</a>';
	foreach($letters as $letter) {
		echo '<a href="javascript: search_resource_name(\''. $letter . '\');" style="padding-left: 10px; font-size: 12px;">' . $letter . '</a>';
	}
}
?>