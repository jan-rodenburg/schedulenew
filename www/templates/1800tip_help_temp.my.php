<?php
/**
* Prints out list of current resources
* @param Pager $pager pager object
* @param mixed $resources array of resource data
* @param string $err last database error
*/
// function print_manage_resources(&$pager, $resources, $err) {
function x1800tip_help_print_table () {
?>
	<table width="100%" id="table_id_manage_resource" class="display dataTable" border="0" cellspacing="1" cellpadding="0">
        <thead>
		<!-- datatables removes this row   
		<tr>
          <td colspan="18" class="tableTitle"> · tip my All Resources</td>
        </tr>
		-->
        <tr class="rowHeaders">
          <td class="edit">0 Edit</td>
		  <td class="barcode">1 Barcode</td>
		  <td class="duplicate">2 Duplicate</td>
          <td class="status"><a href="/schedulenew/www/admin.php?tool=resourcesorder=statusvert=ASC">3Status</a>
</td>
		<td class="name"><a href="/schedulenew/www/admin.php?tool=resourcesorder=namevert=ASC">4 Resource Name</a>
</td>
          
		  <td class="schedule" style="display:none"><a href="/schedulenew/www/admin.php?tool=resourcesorder=scheduletitlevert=ASC">5 Schedule</a>
</td>
		  <td class="serial"><a href="/schedulenew/www/admin.php?tool=resourcesorder=serial_nrvert=ASC">6 Serial #</a>
</td>
          <td class="package">7 Package</td>
		  <td class="description">8 Description</td>
		  <td class="notes">9 Oddities</td>
		  <td class="accesoires">10 Fixed accesoires</td>
		  <td class="uitleennivo">11 Loan out level</td>
	  <td class="owner"><a href="/schedulenew/www/admin.php?tool=resourcesorder=rownervert=ASC">12 Owner</a>
</td>
	  	  <td class="uitleenperiode"><a href="/schedulenew/www/admin.php?tool=resourcesorder=uitleenperiodevert=ASC">13Reservation Period</a>
</td>
          <td class="delete">14 Delete</td>
          <td class="delete">15empty </td>
          <td class="maintenance">16  Maintenance</td>
          <td class="datum_aankoop">17 Date of purchase </td>
          <td class="aankoopbedrag">18 Purchase price </td>
        </tr>
		
		</thead><tbody id="tbody_list">
		
		<tr class="cellColor1" align="center" id="tr1">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1573dbc812003elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1573dbc812003e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1573dbc812003eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1573dbc812003estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 09 Sony FDR-AX53</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">3731006</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">4K / HD - XAVC - AVCHD Camcorder; lens Zeiss Vario-Sonnar T* 2.0/4.4-88; �55mm; 20x optische zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">(2x) battery; 64GB SDXC card; (HDMI-micro cable vermist),  USB-micro cable; Poweradapter; Powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1573dbc812003e" onclick="adminRowClick(this,'tr1',1);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV70, Replacement For NP-FV50
Power adapter: AC-L200D
SDXC card: 64 Lexar Professional 633x SDXC card 95MB/s</td>
						<td class="datum_aankoop">29-04-2016 </td>
						<td class="aankoopbedrag">1080 </td></tr>
<tr class="cellColor0" align="center" id="tr2">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1573ecd1965d66limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1573ecd1965d66</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1573ecd1965d66duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1573ecd1965d66status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 10 Sony FDR-AX53</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">3731007</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">4K / HD - XAVC - AVCHD Camcorder; lens Zeiss Vario-Sonnar T* 2.0/4.4-88; Ø55mm; 20x optische zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">(2x) battery; 64GB SDXC card; HDMI-micro cable,  USB-micro cable; Poweradapter; Powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1573ecd1965d66" onclick="adminRowClick(this,'tr2',2);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV70, Replacement For NP-FV50
Power adapter: AC-L200D
SDXC card: 64 Lexar Professional 633x SDXC card 95MB/s</td>
						<td class="datum_aankoop">29-04-2016 </td>
						<td class="aankoopbedrag">1080 </td></tr>
<tr class="cellColor1" align="center" id="tr3">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1573f09755bd49limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1573f09755bd49</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1573f09755bd49duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1573f09755bd49status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 11 Sony FDR-AX53</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">3731008</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">4K / HD - XAVC - AVCHD Camcorder; lens Zeiss Vario-Sonnar T* 2.0/4.4-88; Ø55mm; 20x optische zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">(2x) battery; 64GB SDXC card; HDMI-micro cable,  USB-micro cable; Poweradapter; Powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1573f09755bd49" onclick="adminRowClick(this,'tr3',3);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV70, Replacement For NP-FV50
Power adapter: AC-L200D
SDXC card: 64 Lexar Professional 633x SDXC card 95MB/s</td>
						<td class="datum_aankoop">29-04-2016 </td>
						<td class="aankoopbedrag">1080 </td></tr>
<tr class="cellColor0" align="center" id="tr4">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156ec1c7823a83limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156ec1c7823a83</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156ec1c7823a83duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156ec1c7823a83status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 15 Sony PXW-X70</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1611834</td>
<td class="package" style="text-align:left">Peli 1520 case</td>
<td class="description" style="text-align:left">4K/HD - XAVC Camcorder; Zeiss Vario Sonnar T* lens 2,8/9,3-111,6, �62mm;</td>
<td class="notes" style="text-align:left">record HD in AVCHD or XAVC format; 4K in XAVC QFHD format</td>
<td class="accesoires" style="text-align:left">lens cover, lens hood, (remote control missing), 2x battery, USB-USB micro cable, HDMI cable, power adapter/charger AC-VQV10; 2x SanDisk Extreme Pro SDXC</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156ec1c7823a83" onclick="adminRowClick(this,'tr4',4);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV70, Sony NP-FV100; 2x SanDisk Extreme Pro SDXC UHS1 Card, 64GB, tot 95 MB/s
afstandsbediening: RMT-845
22-11-2016 microplug USB kabel defect
3-10-2017 afstandsbediening vermist
02-11-2017 Lexar SDXC cards vervangen door Sandisk</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">2723 </td></tr>
<tr class="cellColor1" align="center" id="tr5">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156ec15abaf4e3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156ec15abaf4e3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156ec15abaf4e3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156ec15abaf4e3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 17 Sony PXW-X70</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1611526</td>
<td class="package" style="text-align:left">Peli 1520 case</td>
<td class="description" style="text-align:left">4K/HD - XAVC Camcorder; Zeiss Vario Sonnar T* lens 2,8/9,3-111,6, �62mm;</td>
<td class="notes" style="text-align:left">record HD in AVCHD or XAVC format; 4K in XAVC QFHD format</td>
<td class="accesoires" style="text-align:left">lens cover, lens hood, remote control, 2x battery, USB-USB micro cable, HDMI cable, power adapter/charger AC-VQV10; 2x SanDisk Extreme Pro SDXC</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156ec15abaf4e3" onclick="adminRowClick(this,'tr5',5);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV70, Sony NP-FV100
afstandsbediening: RMT-845; 2x SanDisk Extreme Pro SDXC UHS1 Card, 64GB, tot 95 MB/s; 
20-12-2016 vlekjes in beeld, hoogstwaarschijnlijk brandschade aan beeldchip door te lang tegen de zon in te filmen
19-1-2017 gelukkig geen schade</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">2723 </td></tr>
<tr class="cellColor0" align="center" id="tr6">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15718df51480dflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15718df51480df</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15718df51480dfduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15718df51480dfstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 18 Sony PXW-Z150</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1600240</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">4K / HD - XAVC Camcorder; G lens 1,6/4,1-82 mm, �72mm; 20x optical zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">2x battery; remote control; USB-cable; HDMI-cable; 2x 64 GB SDXC CARD; AC adaptor/charger AC-VQ1051D, AC-L100C Poweradapter; 2x powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15718df51480df" onclick="adminRowClick(this,'tr6',6);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-F770, Sony NP-F960;
2x SanDisk Extreme Pro SDXC UHS1 Card, 64GB, tot 95 MB/s;
20-12-2016 vlekjes in beeld, hoogstwaarschijnlijk brandschade aan beeldchip door te lang tegen de zon in te filmen
19-1-2017 gelukkig geen schade

30-10-2017 Lexar SDXC cards vervangen door 
SanDisk Extreme Pro</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">3700 </td></tr>
<tr class="cellColor1" align="center" id="tr7">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15734582e61339limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15734582e61339</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15734582e61339duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15734582e61339status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 19 Sony PXW-Z150</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1600235</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">4K / HD - XAVC Camcorder; G lens 1,6/4,1-82 mm, �72mm; 20x optical zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">2x battery; remote control; USB-cable; HDMI-cable; 2x 64 GB SDXC CARD; AC adaptor/charger AC-VQ1051D, AC-L100C Poweradapter; 2x powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15734582e61339" onclick="adminRowClick(this,'tr7',7);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-F770, Sony NP-F960; 2x SanDisk Extreme Pro SDXC UHS1 Card, 64GB, tot 95 MB/s; 

30-10-2017 Lexar SDXC cards vervangen door SanDisk Extreme Pro</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">3700 </td></tr>
<tr class="cellColor0" align="center" id="tr8">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157d6673ec0e76limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157d6673ec0e76</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157d6673ec0e76duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157d6673ec0e76status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">4K/HD camcorder 20 Sony PXW-Z150</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1600222</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">4K / HD - XAVC Camcorder; G lens 1,6/4,1-82 mm, �72mm; 20x optical zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">2x battery; remote control; USB-cable; HDMI-cable; 2x 64 GB SDXC CARD; AC adaptor/charger AC-VQ1051D, AC-L100C Poweradapter; 2x powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157d6673ec0e76" onclick="adminRowClick(this,'tr8',8);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-F770, Sony NP-F960; 2x SanDisk Extreme Pro SDXC UHS1 Card, 64GB, tot 95 MB/s</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">3700 </td></tr>
<tr class="cellColor0" align="center" id="tr10">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157766ecaa689flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157766ecaa689f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157766ecaa689fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157766ecaa689fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 01 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1411969976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157766ecaa689f" onclick="adminRowClick(this,'tr10',10);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 20-10-2017 nagekeken na melding defect. Geen storing kunnen vinden</td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor1" align="center" id="tr11">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157766f0a6132flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157766f0a6132f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157766f0a6132fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157766f0a6132fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 02 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1411973976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157766f0a6132f" onclick="adminRowClick(this,'tr11',11);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor0" align="center" id="tr12">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a9540271b0flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a9540271b0f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a9540271b0fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a9540271b0fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 03 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1311729976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a9540271b0f" onclick="adminRowClick(this,'tr12',12);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 3-6-2016 gemeld dat middentonen niet goed door komen. Testen
6-6-2016 kan het niet objectiveren, hoor het verschil met andere speakers niet</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor1" align="center" id="tr13">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a954fde0c6blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a954fde0c6b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a954fde0c6bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a954fde0c6bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 04 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1312915976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a954fde0c6b" onclick="adminRowClick(this,'tr13',13);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor0" align="center" id="tr14">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ac0df5dc234limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ac0df5dc234</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ac0df5dc234duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ac0df5dc234status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 05 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1402172976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ac0df5dc234" onclick="adminRowClick(this,'tr14',14);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor1" align="center" id="tr15">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ac0f10d5ca7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ac0f10d5ca7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ac0f10d5ca7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ac0f10d5ca7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 06 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1402050976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ac0f10d5ca7" onclick="adminRowClick(this,'tr15',15);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor0" align="center" id="tr16">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157767068c7020limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157767068c7020</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157767068c7020duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157767068c7020status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 07 Behringer B210D EU</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S14119981976</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">200W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157767068c7020" onclick="adminRowClick(this,'tr16',16);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">191 </td></tr>
<tr class="cellColor1" align="center" id="tr17">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577670de04ea5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577670de04ea5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577670de04ea5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577670de04ea5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 08 JBSystems PSA-10</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">BGL-14050025</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">160W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577670de04ea5" onclick="adminRowClick(this,'tr17',17);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">236 </td></tr>
<tr class="cellColor0" align="center" id="tr18">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577672a186110limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577672a186110</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577672a186110duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577672a186110status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 09 JBSystems PSA-10</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">BGL-16020582-00374</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">160W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577672a186110" onclick="adminRowClick(this,'tr18',18);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">236 </td></tr>
<tr class="cellColor1" align="center" id="tr19">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577674c41a667limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577674c41a667</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577674c41a667duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577674c41a667status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 10 JBSystems PSA-10</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">BGL-16020586-00374</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">160W</td>
<td class="notes" style="text-align:left">enkele speaker, line in en mic. in via XLR/jack; line out XLR-male</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577674c41a667" onclick="adminRowClick(this,'tr19',19);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2016 </td>
						<td class="aankoopbedrag">236 </td></tr>
<tr class="cellColor0" align="center" id="tr20">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157713ea7d9ce0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157713ea7d9ce0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157713ea7d9ce0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157713ea7d9ce0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 11 Yamaha HS 50M</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">(21)MP01321</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">45 W nearfield monitor</td>
<td class="notes" style="text-align:left">enkele speaker, line in XLR of jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157713ea7d9ce0" onclick="adminRowClick(this,'tr20',20);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">180 </td></tr>
<tr class="cellColor1" align="center" id="tr21">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157713f1510e10limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157713f1510e10</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157713f1510e10duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157713f1510e10status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 12 Yamaha HS 50M</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">(21)MP03286</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">45 W nearfield monitor</td>
<td class="notes" style="text-align:left">enkele speaker, line in XLR of jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157713f1510e10" onclick="adminRowClick(this,'tr21',21);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">180 </td></tr>
<tr class="cellColor0" align="center" id="tr22">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15773ecab27d3flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15773ecab27d3f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15773ecab27d3fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15773ecab27d3fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 13 Yamaha HS5</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">EFW101794</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">45 W nearfield monitor</td>
<td class="notes" style="text-align:left">enkele speaker, line in XLR of jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15773ecab27d3f" onclick="adminRowClick(this,'tr22',22);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">194 </td></tr>
<tr class="cellColor1" align="center" id="tr23">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15773ee2e87c67limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15773ee2e87c67</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15773ee2e87c67duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15773ee2e87c67status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker 14 Yamaha HS5</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">EFW102162</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">45 W nearfield monitor</td>
<td class="notes" style="text-align:left">enkele speaker, line in XLR of jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15773ee2e87c67" onclick="adminRowClick(this,'tr23',23);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">194 </td></tr>
<tr class="cellColor1" align="center" id="tr25">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15773920c0f2b7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15773920c0f2b7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15773920c0f2b7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15773920c0f2b7status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 13 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1413072222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15773920c0f2b7" onclick="adminRowClick(this,'tr25',25);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 27-1-2017 blijkt beschadigd. waarschijnlijk gevallen. Gedeeltelijk met tape geplakt</td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor0" align="center" id="tr26">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577394f72562flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577394f72562f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577394f72562fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577394f72562fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 14 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1413070222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577394f72562f" onclick="adminRowClick(this,'tr26',26);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor1" align="center" id="tr27">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577395dd9e3c5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577395dd9e3c5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577395dd9e3c5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577395dd9e3c5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 15 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1413071222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577395dd9e3c5" onclick="adminRowClick(this,'tr27',27);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor0" align="center" id="tr28">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1577399c61c59elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1577399c61c59e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1577399c61c59eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1577399c61c59estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 16 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1410124222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1577399c61c59e" onclick="adminRowClick(this,'tr28',28);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor1" align="center" id="tr29">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157739aebf1bb7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157739aebf1bb7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157739aebf1bb7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157739aebf1bb7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 17 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1500319222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157739aebf1bb7" onclick="adminRowClick(this,'tr29',29);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor0" align="center" id="tr30">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157739c4e37f0flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157739c4e37f0f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157739c4e37f0fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157739c4e37f0fstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 18 Behringer MS16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S1413069222</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 8W</td>
<td class="notes" style="text-align:left">vast netsnoer; audio in: RCA of mini-jack, jack (mic); audio out: mini-jack (headphones)</td>
<td class="accesoires" style="text-align:left">losse audiokabels</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157739c4e37f0f" onclick="adminRowClick(this,'tr30',30);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 5-10-2017 permanent in gebruik bij BK Overschiestraat</td>
						<td class="datum_aankoop">29-6-2016 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor1" align="center" id="tr31">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea5ff91e6aalimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea5ff91e6aa</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea5ff91e6aaduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea5ff91e6aastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 21 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300203</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea5ff91e6aa" onclick="adminRowClick(this,'tr31',31);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr32">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea622954dbflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea622954dbf</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea622954dbfduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea622954dbfstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 22 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300120</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea622954dbf" onclick="adminRowClick(this,'tr32',32);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor1" align="center" id="tr33">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea6118d3cfclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea6118d3cfc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea6118d3cfcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea6118d3cfcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 23 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300032</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea6118d3cfc" onclick="adminRowClick(this,'tr33',33);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr34">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea6027b9b0elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea6027b9b0e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea6027b9b0eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea6027b9b0estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 24 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300189</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea6027b9b0e" onclick="adminRowClick(this,'tr34',34);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor1" align="center" id="tr35">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15331a115363cdlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15331a115363cd</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15331a115363cdduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15331a115363cdstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 25 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300276</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15331a115363cd" onclick="adminRowClick(this,'tr35',35);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 29-06-2016 vh Actieve speaker set 16</td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr36">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15331a64debe05limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15331a64debe05</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15331a64debe05duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15331a64debe05status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 26 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300168</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15331a64debe05" onclick="adminRowClick(this,'tr36',36);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 29-06-2016 vh Actieve speaker set 18</td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor1" align="center" id="tr37">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15331a1ea34c5climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15331a1ea34c5c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15331a1ea34c5cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15331a1ea34c5cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 29 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508081300273</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15331a1ea34c5c" onclick="adminRowClick(this,'tr37',37);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> vh Actieve speaker set 17</td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr38">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a9585d34699limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a9585d34699</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a9585d34699duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a9585d34699status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 30 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811W101300024</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR; onderdeel van Presentatieset 01, vh set 41</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a9585d34699" onclick="adminRowClick(this,'tr38',38);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 29-08-2014 gevallen bij oppbouw voor introductie.
Huis van één deel is rondom beschadigd, verwacht dat er ook interne schade zal zijn.
15-01-2015 Werkt nog naar behoren, vastgeschroefd aan presentatiekar Presentatieset 01</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor1" align="center" id="tr39">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a960f3b7462limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a960f3b7462</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a960f3b7462duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a960f3b7462status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 31 DAP PMA-62-zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811B021300000</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a960f3b7462" onclick="adminRowClick(this,'tr39',39);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 16-9-2016 vh Actieve speaker set 43</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor0" align="center" id="tr40">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a9637247b37limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a9637247b37</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a9637247b37duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a9637247b37status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 32 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811W101300049</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a9637247b37" onclick="adminRowClick(this,'tr40',40);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 16-9-2016 vh Actieve speaker set 44</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor1" align="center" id="tr41">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154ca2848ce771limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154ca2848ce771</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154ca2848ce771duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154ca2848ce771status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 33 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811B021300024</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154ca2848ce771" onclick="adminRowClick(this,'tr41',41);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 16-9-2016 vh Actieve speaker set 45</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor0" align="center" id="tr42">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156a9f92096fc4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156a9f92096fc4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156a9f92096fc4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156a9f92096fc4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 34 DAP PMA-62-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811B021300080</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156a9f92096fc4" onclick="adminRowClick(this,'tr42',42);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 19-9-2016 vh Actieve speaker set 46 DAP PMA-62-z</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor1" align="center" id="tr43">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1576d0f2750995limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1576d0f2750995</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1576d0f2750995duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1576d0f2750995status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 36 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811W101300048</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1576d0f2750995" onclick="adminRowClick(this,'tr43',43);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 19-9-2016 vh Actieve speaker set 48</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor0" align="center" id="tr44">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157763e9803735limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157763e9803735</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157763e9803735duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157763e9803735status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 37 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811W101300035</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157763e9803735" onclick="adminRowClick(this,'tr44',44);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 19-9-2016 vh Actieve speaker set 49</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor1" align="center" id="tr45">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157e12157d8d46limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157e12157d8d46</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157e12157d8d46duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157e12157d8d46status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 38 DAP PMA-62-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811W101300025</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157e12157d8d46" onclick="adminRowClick(this,'tr45',45);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor0" align="center" id="tr46">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a95c7aec7eflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a95c7aec7ef</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a95c7aec7efduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a95c7aec7efstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 39 DAP PMA-62-zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3811B021300008</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: XLR; audio out: XLR</td>
<td class="accesoires" style="text-align:left">2x los Euro netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a95c7aec7ef" onclick="adminRowClick(this,'tr46',46);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> één van beide speakers bromt, uit de roulatie
2-5-2017 nog eens getest, geen brom kunnen constateren. Wellicht met defecte aansluitkabel getest?
Opnieuw in roulatie
2-5-2017 vh Actieve speaker set 42</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">165 </td></tr>
<tr class="cellColor1" align="center" id="tr47">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595371649f3b2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595371649f3b2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595371649f3b2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595371649f3b2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 40 DAP PRA-62-zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3507021600094</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595371649f3b2" onclick="adminRowClick(this,'tr47',47);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr48">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159537680daa8elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159537680daa8e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159537680daa8eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159537680daa8estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 41 DAP PRA-62-zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3507011600014</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159537680daa8e" onclick="adminRowClick(this,'tr48',48);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor1" align="center" id="tr49">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595377fb10dfflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595377fb10dff</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595377fb10dffduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595377fb10dffstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 42 DAP PRA-62-zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3507011600015</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595377fb10dff" onclick="adminRowClick(this,'tr49',49);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr50">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595373d6ec3aclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595373d6ec3ac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595373d6ec3acduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595373d6ec3acstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 43 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508111600093</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595373d6ec3ac" onclick="adminRowClick(this,'tr50',50);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor1" align="center" id="tr51">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159537b069a359limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159537b069a359</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159537b069a359duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159537b069a359status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Actieve speaker set 44 DAP PRA-62</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">303804D3508111600087</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">2x 25W</td>
<td class="notes" style="text-align:left">audio in: RCA</td>
<td class="accesoires" style="text-align:left">los Euro netsnoer, losse audiokabels, open speakersnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159537b069a359" onclick="adminRowClick(this,'tr51',51);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">110 </td></tr>
<tr class="cellColor0" align="center" id="tr64">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c25f4f3bbcelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c25f4f3bbce</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c25f4f3bbceduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c25f4f3bbcestatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Apple iMac 27 inch quad-core i5 3.2Ghz</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DGKNR09JF8J9</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">iMac 27" quad-core i5 3.2Ghz/8GB/256GBSSD/GeForce GT 755M 1GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple alu toetsenbord, Magic Mouse, netsnoer; permanent in gebruik bij uitleen</td>
<td class="uitleennivo" style="text-align:left">0</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">0</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c25f4f3bbce" onclick="adminRowClick(this,'tr64',64);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-01-2015 </td>
						<td class="aankoopbedrag">1590 </td></tr>
<tr class="cellColor1" align="center" id="tr65">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c263b2b030blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c263b2b030b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c263b2b030bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c263b2b030bstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Apple iMac 27 inch quad-core i5 3.2Ghz</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DGKP207PF8J9</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">iMac 27" quad-core i5 3.2Ghz/8GB/256GBSSD/GeForce GT 755M 1GB; permanent in gebruik bij uitleen</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple alu toetsenbord, Magic Mouse, netsnoer</td>
<td class="uitleennivo" style="text-align:left">0</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">0</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c263b2b030b" onclick="adminRowClick(this,'tr65',65);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-01-2015 </td>
						<td class="aankoopbedrag">1590 </td></tr>
<tr class="cellColor0" align="center" id="tr66">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15889cb740a5f4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15889cb740a5f4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15889cb740a5f4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15889cb740a5f4status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Apple iMac 27 inch quad-core i5 3.4Ghz</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C02PC07GF8J5</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iMac 27" quad-core i5 3.2Ghz/8GB/256GBSSD/GeForce GTX 755M 2GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple alu toetsenbord, Magic Mouse, netsnoer</td>
<td class="uitleennivo" style="text-align:left">0</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15889cb740a5f4" onclick="adminRowClick(this,'tr66',66);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-01-2015 </td>
						<td class="aankoopbedrag">1590 </td></tr>
<tr class="cellColor1" align="center" id="tr67">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155928f5924b43limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155928f5924b43</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155928f5924b43duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155928f5924b43status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Apple Mac mini 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C07PV11GG1J2</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">Apple Mac mini A1347 dual core i7 3.0GHz/16GB/256GB Flash/BEL/IEA</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">netsnoer, MB110N/B Apple Keyboard, MB112ZM/C Apple Mouse</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155928f5924b43" onclick="adminRowClick(this,'tr67',67);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr68">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15592905e90e12limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15592905e90e12</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15592905e90e12duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15592905e90e12status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Apple Mac mini 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C07PV11HG1J2</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">Apple Mac mini A1347 dual core i7 3.0GHz/16GB/256GB Flash/BEL/IEA</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">netsnoer, MB110N/B Apple Keyboard, MB112ZM/C Apple Mouse</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15592905e90e12" onclick="adminRowClick(this,'tr68',68);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr76">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15775087149847limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15775087149847</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15775087149847duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15775087149847status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Apple Uitleen-iMac 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">VM8453AAZE3</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">iMac A1224 20" (early 2008); 2,66GHz Intl Core 2 Duo; 2GB 800MHz DDR2 SDRAM; 256 MB HD</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple keyboard A1234 EMC NO.:2171, Apple Mouse A1152 EMC NO.:2058</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15775087149847" onclick="adminRowClick(this,'tr76',76);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr77">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158c7faeaa1fc9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158c7faeaa1fc9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158c7faeaa1fc9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158c7faeaa1fc9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Apple Uitleen-iMac 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">W8733EKTX86</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">iMac A1224 20" (MID 2007); 2,4GHz Intl Core 2 Duo; 4GB 667MHZ DDR2 SDRAM; 256 MB HD</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple keyboard A1234 EMC NO.:2171, HP Mouse MOAFUO</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158c7faeaa1fc9" onclick="adminRowClick(this,'tr77',77);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr78">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158cbf80f78b9alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158cbf80f78b9a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158cbf80f78b9aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158cbf80f78b9astatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Apple Uitleen-iMac 03</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">W87320ZZX86</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">iMac A1224 20" (mid 2007); 2,4GHz Intl Core 2 Duo; 4GB 677MHz DDR2 SDRAM; 256 MB HD</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Apple keyboard A1234 EMC NO.:2171, Apple Mouse A1152 EMC NO.:2058</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158cbf80f78b9a" onclick="adminRowClick(this,'tr78',78);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr79">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15656e08fd731elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15656e08fd731e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15656e08fd731eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15656e08fd731estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Apple USB Superdrive</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C0QL2HPF4GW</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15656e08fd731e" onclick="adminRowClick(this,'tr79',79);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-11-2015 </td>
						<td class="aankoopbedrag">90 </td></tr>
<tr class="cellColor0" align="center" id="tr80">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15343bfde7ebf5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15343bfde7ebf5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15343bfde7ebf5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15343bfde7ebf5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Battery pack 12 Dynacore DS-150S!</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DY-1305A303</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">14,8V, 150Wh self charging Li-ion Battery, for Vlaklicht 11 LED Panel LITH/DSTTL/Dynacore</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">power cable Euro</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15343bfde7ebf5" onclick="adminRowClick(this,'tr80',80);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">360 </td></tr>
<tr class="cellColor1" align="center" id="tr81">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15343c0139d826limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15343c0139d826</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15343c0139d826duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15343c0139d826status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Battery pack 13 Dynacore DS-150S!</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DY-1308A433</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">14,8V, 150Wh self charging Li-ion Battery, for Vlaklicht 11 LED Panel LITH/DSTTL/Dynacore</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">power cable Euro</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15343c0139d826" onclick="adminRowClick(this,'tr81',81);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">360 </td></tr>
<tr class="cellColor0" align="center" id="tr82">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1537f52c34774elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1537f52c34774e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1537f52c34774eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1537f52c34774estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Battery Pack set 22 Dedolight DT4.0-BAT-AB - Lith 95Sl</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0114-2711</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">Battery powersupply en accu voor Dedolight DLED4.1-D</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Battery Power supply DT4.0-BAT-AB, 10.2 - 18 V DC, max power 45W, Sn 0713-1227; 
Battery pack Lith 95Sl, 14,8V, 95Wh self charging Li-ion Battery, Sn 13010811</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1537f52c34774e" onclick="adminRowClick(this,'tr82',82);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 11-04-2014 hoek van accu blijkt beschadigd, bij verplaatsen van statieven met spot is de adapter met accu van het statief gevallen.
Is nu in gebruik bij volgende gebruiker, daarna opnieuw evelueren</td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr83">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1537f55425b3b9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1537f55425b3b9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1537f55425b3b9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1537f55425b3b9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Battery Pack set 23 Dedolight DT4.0-BAT-AB - Lith 95Sl</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0913-2414</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">Battery powersupply en accu voor Dedolight DLED4.1-D</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Battery Power supply DT4.0-BAT-AB, 10.2 - 18 V DC, max power 45W, Sn 0713-1217; 
Battery pack Lith 95Sl, 14,8V, 95Wh self charging Li-ion Battery, Sn 13011411;</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1537f55425b3b9" onclick="adminRowClick(this,'tr83',83);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr84">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594bb9e3c32aflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594bb9e3c32af</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594bb9e3c32afduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594bb9e3c32afstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 03 Epson EH-TW6700</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">X37P6Z00955</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594bb9e3c32af" onclick="adminRowClick(this,'tr84',84);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 217531300
20-11-2017 omgenummerd van 19 - 03</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">2000 </td></tr>
<tr class="cellColor1" align="center" id="tr85">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594bc5eb2b4bdlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594bc5eb2b4bd</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594bc5eb2b4bdduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594bc5eb2b4bdstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 04 Epson EH-TW6700</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">X37P7300362</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594bc5eb2b4bd" onclick="adminRowClick(this,'tr85',85);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 217531300
20-11-2017 omgenummerd van 20 naar 04</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">2000 </td></tr>
<tr class="cellColor0" align="center" id="tr86">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159525389e2241limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159525389e2241</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159525389e2241duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159525389e2241status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 05 Epson EH-TW6700</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">X37P7300557</td>
<td class="package" style="text-align:left">Peli Case 1560</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159525389e2241" onclick="adminRowClick(this,'tr86',86);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 217531300
20-11-2017 omgenummerd van 21 naar 05</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">2000 </td></tr>
<tr class="cellColor1" align="center" id="tr87">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594bb10a98b8elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594bb10a98b8e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594bb10a98b8eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594bb10a98b8estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 09 JVC LX-FH50</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">LX-FH50 151Q0076</td>
<td class="package" style="text-align:left">Storm case iM2600</td>
<td class="description" style="text-align:left">5000l, 1.920 x 1.080 px; DLP projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594bb10a98b8e" onclick="adminRowClick(this,'tr87',87);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">2040 </td></tr>
<tr class="cellColor0" align="center" id="tr88">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594bc5c7935f4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594bc5c7935f4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594bc5c7935f4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594bc5c7935f4status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 10 JVC LX-FH50</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">LX-FH50 151Q0191</td>
<td class="package" style="text-align:left">Peli Storm case iM2600</td>
<td class="description" style="text-align:left">5000l, 1.920 x 1.080 px; DLP projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594bc5c7935f4" onclick="adminRowClick(this,'tr88',88);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">2040 </td></tr>
<tr class="cellColor1" align="center" id="tr89">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524dad20680limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524dad20680</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524dad20680duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524dad20680status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 11 Optoma GT1080e</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Q8ZF645AAAAAC0067</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; DLP Short throw projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, lens cover, remote control, HDMI cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524dad20680" onclick="adminRowClick(this,'tr89',89);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type L-027-5KEY</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">750 </td></tr>
<tr class="cellColor0" align="center" id="tr90">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524e4ac9f00limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524e4ac9f00</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524e4ac9f00duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524e4ac9f00status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 12 Optoma GT1080e</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Q8ZF645AAAAAC0088</td>
<td class="package" style="text-align:left">Peli 1500 case</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; DLP Short throw projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, lens cover, remote control, HDMI cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524e4ac9f00" onclick="adminRowClick(this,'tr90',90);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type L-027-5KEY</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">750 </td></tr>
<tr class="cellColor1" align="center" id="tr91">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594bc62f20581limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594bc62f20581</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594bc62f20581duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594bc62f20581status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 13 Optoma GT1080e</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Q8ZF610AAAAAC0125</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; DLP Short throw projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, lens cover, remote control, HDMI cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594bc62f20581" onclick="adminRowClick(this,'tr91',91);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type L-027-5KEY</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">750 </td></tr>
<tr class="cellColor0" align="center" id="tr92">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524e82cf948limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524e82cf948</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524e82cf948duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524e82cf948status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 14 Optoma GT1080e</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Q8ZF645AAAAAC0064</td>
<td class="package" style="text-align:left">Stormcase iM2300</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; DLP Short throw projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, lens cover, remote control, HDMI cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524e82cf948" onclick="adminRowClick(this,'tr92',92);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type L-027-5KEY</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">750 </td></tr>
<tr class="cellColor1" align="center" id="tr93">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524ec2d65balimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524ec2d65ba</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524ec2d65baduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524ec2d65bastatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 15 Optoma GT1080e</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Q8ZF645AAAAAC0089</td>
<td class="package" style="text-align:left">Peli 1500 case</td>
<td class="description" style="text-align:left">3000l, 1.920 x 1.080 px; DLP Short throw projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, lens cover, remote control, HDMI cable</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524ec2d65ba" onclick="adminRowClick(this,'tr93',93);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 13-10-2017:  126h

hdmi poort 1 in de gaten houden, gaf kleine storing als kabel niet perfect erin zat.</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">750 </td></tr>
<tr class="cellColor0" align="center" id="tr94">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524f9c5091climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524f9c5091c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524f9c5091cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524f9c5091cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 16 Epson EH-TW5350</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">WL8K7100185</td>
<td class="package" style="text-align:left">Stormcase iM2400</td>
<td class="description" style="text-align:left">2200l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524f9c5091c" onclick="adminRowClick(this,'tr94',94);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 165025100</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">700 </td></tr>
<tr class="cellColor1" align="center" id="tr95">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594d0ca182ee2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594d0ca182ee2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594d0ca182ee2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594d0ca182ee2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 17 Epson EH-TW5350</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">WL8K7100632</td>
<td class="package" style="text-align:left">Stormcase iM2400</td>
<td class="description" style="text-align:left">2200l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594d0ca182ee2" onclick="adminRowClick(this,'tr95',95);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 165025100</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">700 </td></tr>
<tr class="cellColor0" align="center" id="tr96">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952500464ee0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952500464ee0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952500464ee0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952500464ee0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Beamer 18 Epson EH-TW5350</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">WL8K7100116</td>
<td class="package" style="text-align:left">Stormcase iM2400</td>
<td class="description" style="text-align:left">2200l, 1.920 x 1.080 px; 3LCD projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Power cable, remote control, HDMI cable, VGA cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952500464ee0" onclick="adminRowClick(this,'tr96',96);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type 165025100</td>
						<td class="datum_aankoop">20-06-2017 </td>
						<td class="aankoopbedrag">700 </td></tr>
<tr class="cellColor0" align="center" id="tr112">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159f740c7b2f7elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159f740c7b2f7e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159f740c7b2f7eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159f740c7b2f7estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Breedstraler LED 07 VETEC Accu Powered 20W Cool white</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">120� - 20W chip LED; color temp. 6500 Cool white</td>
<td class="notes" style="text-align:left">Not allowed to remove from frame!</td>
<td class="accesoires" style="text-align:left">net power adapter/charger VETEC 55.106.92</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159f740c7b2f7e" onclick="adminRowClick(this,'tr112',112);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-10-2017 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor1" align="center" id="tr113">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159f7421e96046limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159f7421e96046</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159f7421e96046duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159f7421e96046status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Breedstraler LED 08 VETEC Accu Powered 20W Cool white</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">120� - 20W chip LED; color temp. 6500 Cool white</td>
<td class="notes" style="text-align:left">Not allowed to remove from frame!</td>
<td class="accesoires" style="text-align:left">net power adapter/charger VETEC 55.106.92</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159f7421e96046" onclick="adminRowClick(this,'tr113',113);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-10-2017 </td>
						<td class="aankoopbedrag">69 </td></tr>
<tr class="cellColor0" align="center" id="tr114">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15a0440d572a76limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15a0440d572a76</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15a0440d572a76duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15a0440d572a76status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Dekzeil/Raincover 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Green 2x3m tarp to be used with Uitleen trolley</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15a0440d572a76" onclick="adminRowClick(this,'tr114',114);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr115">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15a0440de45ebelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15a0440de45ebe</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15a0440de45ebeduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15a0440de45ebestatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Dekzeil/Raincover 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">White 2x3m tarp to be used with Uitleen trolley</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15a0440de45ebe" onclick="adminRowClick(this,'tr115',115);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr116">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154abdcff8ccaclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154abdcff8ccac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154abdcff8ccacduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154abdcff8ccacstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Digitale audio recorder 10 Marantz PMD661 MK2/N1B</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">55001444000884</td>
<td class="package" style="text-align:left">originele verpakking</td>
<td class="description" style="text-align:left">no batteries included!</td>
<td class="notes" style="text-align:left">manual (Eng)</td>
<td class="accesoires" style="text-align:left">netadapter en netsnoer, 
analoge audiokabel, USB-kabel, pistol grip, 8GB Toshiba SDHC-card</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154abdcff8ccac" onclick="adminRowClick(this,'tr116',116);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">740 </td></tr>
<tr class="cellColor1" align="center" id="tr117">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154fdb87951771limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154fdb87951771</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154fdb87951771duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154fdb87951771status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Draadloze HoofdMic Set 01 Sennheiser XSW 52</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">Z8WCMBB4FB</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">True Diversity Receiver EM10 Sn 0244000592; 
Bodypack Transmitter SK 20 Sn 0244000246; 
ME 3-ew Headset; Power adapter NT 2-3</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154fdb87951771" onclick="adminRowClick(this,'tr117',117);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr118">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154fdbad9ec7e5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154fdbad9ec7e5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154fdbad9ec7e5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154fdbad9ec7e5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Draadloze HoofdMic Set 02 Sennheiser XSW 52</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0DFP8HKTT3</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">True Diversity Receiver EM10 Sn 0244000359; 
Bodypack Transmitter SK 20 Sn 0244000328; 
ME 3-ew Headset; Power adapter NT 2-3</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154fdbad9ec7e5" onclick="adminRowClick(this,'tr118',118);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr121">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1575e72ba87c67limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1575e72ba87c67</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1575e72ba87c67duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1575e72ba87c67status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">DSLR camera 05 Canon EOS 760D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">083032000151</td>
<td class="package" style="text-align:left">Peli 1450 Case</td>
<td class="description" style="text-align:left">Digitale spiegelreflex camera; Canon Zoomlens EF-S 18-135mm 1:3.5-5.6 IS STM; Sn: 3342013303</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">lensdop, draagriem, USB-kabel, 2x accu, acculader, 64GB SD card, manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1575e72ba87c67" onclick="adminRowClick(this,'tr121',121);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Canon Battery Pack LP-E17

Aanschafwaarde body (10-06-2016) €590; ; objectief EF (16-12-2014) €363

26-9-2016 vh DSLR camera 04</td>
						<td class="datum_aankoop">10-06-2016 </td>
						<td class="aankoopbedrag">950 </td></tr>
<tr class="cellColor0" align="center" id="tr122">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548ea62ff3936limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548ea62ff3936</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548ea62ff3936duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548ea62ff3936status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">DSLR camera 06 Canon EOS 70D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">133026012817</td>
<td class="package" style="text-align:left">Peli 1450 Case</td>
<td class="description" style="text-align:left">Digitale spiegelreflex camera; Canon Zoomlens EF-S 18-135mm 1:3.5-5.6 IS STM; Sn: 1712010571</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">lensdop, draagriem, USB-kabel, 2x accu, acculader, HDMI-HDMI-mini kabel; 16GB 60 MB/s SDHC card</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548ea62ff3936" onclick="adminRowClick(this,'tr122',122);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Canon Battery Pack LP-E6; digibuddy For LP-E6/2 PQ048
Acculader: LC-E6E
SanDisk Extreme SDHC UHS-I Card 16GB 60 MB/s
Aanschafwaarde body (15-12-2014) €785; objectief EF (16-12-2014) €363</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">1150 </td></tr>
<tr class="cellColor1" align="center" id="tr123">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548ff6c614eadlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548ff6c614ead</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548ff6c614eadduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548ff6c614eadstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">DSLR camera 07 Canon EOS 70D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">133026012818</td>
<td class="package" style="text-align:left">Peli 1450 Case</td>
<td class="description" style="text-align:left">Digitale spiegelreflex camera; Canon Zoomlens EF-S 18-135mm 1:3.5-5.6 IS STM; Sn: 1512024473</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">lensdop, draagriem, USB-kabel, 2x accu, acculader, HDMI-HDMI-mini kabel; 16GB 60 MB/s SDHC card</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548ff6c614ead" onclick="adminRowClick(this,'tr123',123);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Canon Battery Pack LP-E6; digibuddy For LP-E6/2 PQ048
Acculader: LC-E6E
SanDisk Extreme SDHC UHS-I Card 16GB 60 MB/s
Aanschafwaarde body (15-12-2014) €785; objectief EF (16-12-2014) €363

4-11-2016 defect, doet helemaal niets meer. Na laten kijken
16-12-2016 gerepareerd</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">1150 </td></tr>
<tr class="cellColor0" align="center" id="tr124">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154788a5ad29dclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154788a5ad29dc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154788a5ad29dcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154788a5ad29dcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">DVD-Sync set voor Sony DVD - Kees Reedijk</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">DVD-sync-starter set: DVD-Sync starter 01 v7.6 voor Sony DVD - Kees Reedijk; DVD-spelers 27, 28, 29  30 Sony DVP-NS355</td>
<td class="notes" style="text-align:left">Scart, coaxial; Video-out; stereo RCA</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154788a5ad29dc" onclick="adminRowClick(this,'tr124',124);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr125">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548ee00268a84limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548ee00268a84</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548ee00268a84duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548ee00268a84status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 01 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036700QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548ee00268a84" onclick="adminRowClick(this,'tr125',125);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 12-1-2017 gestolen gemeld</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr126">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548eb03d048fclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548eb03d048fc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548eb03d048fcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548eb03d048fcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 02 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036714QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548eb03d048fc" onclick="adminRowClick(this,'tr126',126);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> USB kabel vermist
22-2-2016 vervangende USB kabel</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor1" align="center" id="tr127">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548ee2b58f7a2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548ee2b58f7a2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548ee2b58f7a2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548ee2b58f7a2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 03 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036976QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548ee2b58f7a2" onclick="adminRowClick(this,'tr127',127);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr128">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1548ee2f486b00limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1548ee2f486b00</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1548ee2f486b00duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1548ee2f486b00status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 04 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036747QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1548ee2f486b00" onclick="adminRowClick(this,'tr128',128);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor1" align="center" id="tr129">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1556c4dac59474limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1556c4dac59474</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1556c4dac59474duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1556c4dac59474status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 05 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409037055QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1556c4dac59474" onclick="adminRowClick(this,'tr129',129);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 1-9-2017 terug met incomplete verpakking, even uit roulatie</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr130">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1556c4db46193blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1556c4db46193b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1556c4db46193bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1556c4db46193bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 06 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036881QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1556c4db46193b" onclick="adminRowClick(this,'tr130',130);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor1" align="center" id="tr131">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155704554997cflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155704554997cf</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155704554997cfduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155704554997cfstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 07 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036885QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155704554997cf" onclick="adminRowClick(this,'tr131',131);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 28-11-2016 gebruiker meldt dat halverwege downloaden de melding verscheen dat de disk was 'ejected'. Nakijken,
15-12-2016 fout niet kunnen reproduceren, weer in gebruik</td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr132">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15575544336da3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15575544336da3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15575544336da3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15575544336da3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 09 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036795QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15575544336da3" onclick="adminRowClick(this,'tr132',132);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor1" align="center" id="tr133">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154f580f688a45limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154f580f688a45</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154f580f688a45duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154f580f688a45status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 10 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036877QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154f580f688a45" onclick="adminRowClick(this,'tr133',133);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr134">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1557554792a290limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1557554792a290</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1557554792a290duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1557554792a290status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 11 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409036918QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1557554792a290" onclick="adminRowClick(this,'tr134',134);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor1" align="center" id="tr135">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1557554a5dfcc8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1557554a5dfcc8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1557554a5dfcc8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1557554a5dfcc8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 12 LaCie 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">99991409037374QR</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">LaCie Rugged Thunderbolt hard drive, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1557554a5dfcc8" onclick="adminRowClick(this,'tr135',135);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-12-2014 </td>
						<td class="aankoopbedrag">250 </td></tr>
<tr class="cellColor0" align="center" id="tr136">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1574313fae5482limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1574313fae5482</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1574313fae5482duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1574313fae5482status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 13 G/Drive ev ATC 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6P1W8K6N</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">G/Drive ev RaW Thunderbolt hard drive in All-Terrain Case, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1574313fae5482" onclick="adminRowClick(this,'tr136',136);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-05-2016 </td>
						<td class="aankoopbedrag">240 </td></tr>
<tr class="cellColor1" align="center" id="tr137">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15878b1b3e1764limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15878b1b3e1764</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15878b1b3e1764duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15878b1b3e1764status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 14 G/Drive ev ATC 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6P1VGDDE</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">G/Drive ev RaW Thunderbolt hard drive in All-Terrain Case, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15878b1b3e1764" onclick="adminRowClick(this,'tr137',137);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-05-2016 </td>
						<td class="aankoopbedrag">240 </td></tr>
<tr class="cellColor0" align="center" id="tr138">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15878b409f2104limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15878b409f2104</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15878b409f2104duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15878b409f2104status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 15 G/Drive ev ATC 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6P1TB94N</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">G/Drive ev RaW Thunderbolt hard drive in All-Terrain Case, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15878b409f2104" onclick="adminRowClick(this,'tr138',138);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-05-2016 </td>
						<td class="aankoopbedrag">240 </td></tr>
<tr class="cellColor1" align="center" id="tr139">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15878c0cd5d234limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15878c0cd5d234</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15878c0cd5d234duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15878c0cd5d234status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 16 G/Drive ev ATC 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6P1VZLBE</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">G/Drive ev RaW Thunderbolt hard drive in All-Terrain Case, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15878c0cd5d234" onclick="adminRowClick(this,'tr139',139);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-05-2016 </td>
						<td class="aankoopbedrag">240 </td></tr>
<tr class="cellColor0" align="center" id="tr140">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15878cad6220d9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15878cad6220d9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15878cad6220d9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15878cad6220d9status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">External hard drive Thunderbolt 17 G/Drive ev ATC 1TB</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6P1VXDKE</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">G/Drive ev RaW Thunderbolt hard drive in All-Terrain Case, fixed Thunderbolt cable, USB 3.0 poort</td>
<td class="notes" style="text-align:left">Maximum period to borrow is one month.</td>
<td class="accesoires" style="text-align:left">USB 3.0 cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15878cad6220d9" onclick="adminRowClick(this,'tr140',140);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-05-2016 </td>
						<td class="aankoopbedrag">240 </td></tr>
<tr class="cellColor1" align="center" id="tr141">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c8c7131c3dclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c8c7131c3dc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c8c7131c3dcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c8c7131c3dcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 11</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c8c7131c3dc" onclick="adminRowClick(this,'tr141',141);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr142">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c8c722b977flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c8c722b977f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c8c722b977fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c8c722b977fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 12</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c8c722b977f" onclick="adminRowClick(this,'tr142',142);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr143">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c8c83dbd5f9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c8c83dbd5f9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c8c83dbd5f9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c8c83dbd5f9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 13</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c8c83dbd5f9" onclick="adminRowClick(this,'tr143',143);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr144">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c8c7fa7b36dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c8c7fa7b36d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c8c7fa7b36dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c8c7fa7b36dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 14</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c8c7fa7b36d" onclick="adminRowClick(this,'tr144',144);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr145">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c8c72cb2634limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c8c72cb2634</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c8c72cb2634duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c8c72cb2634status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 15</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c8c72cb2634" onclick="adminRowClick(this,'tr145',145);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr146">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1588897409ecf0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1588897409ecf0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1588897409ecf0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1588897409ecf0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1588897409ecf0" onclick="adminRowClick(this,'tr146',146);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr147">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158889760b8ef4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158889760b8ef4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158889760b8ef4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158889760b8ef4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 17</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158889760b8ef4" onclick="adminRowClick(this,'tr147',147);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr148">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888978069d52limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888978069d52</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888978069d52duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888978069d52status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 18</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888978069d52" onclick="adminRowClick(this,'tr148',148);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr149">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888979af24e3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888979af24e3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888979af24e3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888979af24e3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 19</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888979af24e3" onclick="adminRowClick(this,'tr149',149);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr150">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1588897b6c1f7alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1588897b6c1f7a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1588897b6c1f7aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1588897b6c1f7astatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 20</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1588897b6c1f7a" onclick="adminRowClick(this,'tr150',150);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr151">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1588897ce541aclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1588897ce541ac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1588897ce541acduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1588897ce541acstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 21</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1588897ce541ac" onclick="adminRowClick(this,'tr151',151);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr152">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888c1db009balimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888c1db009ba</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888c1db009baduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888c1db009bastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 22</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888c1db009ba" onclick="adminRowClick(this,'tr152',152);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr153">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888c1f3ef223limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888c1f3ef223</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888c1f3ef223duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888c1f3ef223status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 23</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888c1f3ef223" onclick="adminRowClick(this,'tr153',153);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr154">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888c20c1de7dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888c20c1de7d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888c20c1de7dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888c20c1de7dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 24</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888c20c1de7d" onclick="adminRowClick(this,'tr154',154);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr155">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15888c2248acaclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15888c2248acac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15888c2248acacduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15888c2248acacstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Groep/Event 25</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Combined reservation for assessments, group-presentations and events.</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15888c2248acac" onclick="adminRowClick(this,'tr155',155);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr156">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1535a2a0785d3elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1535a2a0785d3e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1535a2a0785d3eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1535a2a0785d3estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 02 Canon XA20</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">703702200078</td>
<td class="package" style="text-align:left">Storm Case</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 Ø58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Cards, capture and delete!</td>
<td class="accesoires" style="text-align:left">2x 64 GB SDXC Card; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1535a2a0785d3e" onclick="adminRowClick(this,'tr156',156);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-828; 64 GB SDXC Card Lexar Pro 633x, 95 MB/s;</td>
						<td class="datum_aankoop">21-04-2014 </td>
						<td class="aankoopbedrag">1845 </td></tr>
<tr class="cellColor1" align="center" id="tr157">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159d622fe8995blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159d622fe8995b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159d622fe8995bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159d622fe8995bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 03 Canon Legria HF G40</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">033412200257</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 ?58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Card, capture and delete!</td>
<td class="accesoires" style="text-align:left">2x 64 GB SDXC Card Lexar Pro 633x, 95 MB/s; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159d622fe8995b" onclick="adminRowClick(this,'tr157',157);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-820, BP-828; SD card: SanDisk 32GB SDHC UHS-I class 10;
5-10-2017</td>
						<td class="datum_aankoop">05-10-2017 </td>
						<td class="aankoopbedrag">1720 </td></tr>
<tr class="cellColor0" align="center" id="tr158">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156ec01ce3115blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156ec01ce3115b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156ec01ce3115bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156ec01ce3115bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 04 Canon Legria HF G40</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">033122000252</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 Ø58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Card, capture and delete!</td>
<td class="accesoires" style="text-align:left">64 GB SDXC Card Lexar Pro 633x, 95 MB/s; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156ec01ce3115b" onclick="adminRowClick(this,'tr158',158);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-820, BP-828; SD card: SanDisk 32GB SDHC UHS-I class 10;</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">1720 </td></tr>
<tr class="cellColor1" align="center" id="tr159">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156efbdc2d5696limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156efbdc2d5696</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156efbdc2d5696duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156efbdc2d5696status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 05 Canon XA30</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">023122000889</td>
<td class="package" style="text-align:left">Storm Case</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 Ø58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Cards, capture and delete!</td>
<td class="accesoires" style="text-align:left">2x 64 GB SDXC Card; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156efbdc2d5696" onclick="adminRowClick(this,'tr159',159);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-820, BP-828; 64 GB SDXC Card Lexar Pro 633x, 95 MB/s;</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">2002 </td></tr>
<tr class="cellColor0" align="center" id="tr160">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1570792515bd41limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1570792515bd41</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1570792515bd41duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1570792515bd41status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 06 Canon XA30</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">023122000888</td>
<td class="package" style="text-align:left">Peli 1520 case</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 �58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Cards, capture and delete!</td>
<td class="accesoires" style="text-align:left">2x 64 GB SDXC Card; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800, Power adapter CA-571</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1570792515bd41" onclick="adminRowClick(this,'tr160',160);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-820, BP-828; 64 GB SDXC Card Lexar Pro 633x, 95 MB/s;</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">2002 </td></tr>
<tr class="cellColor0" align="center" id="tr162">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15492d7deac0a4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15492d7deac0a4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15492d7deac0a4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15492d7deac0a4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 12 Sony HDR-CX900E</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">4736121</td>
<td class="package" style="text-align:left">originele verpakking</td>
<td class="description" style="text-align:left">HD - XAVC Camcorder; Zeiss Vario Sonnar T* lens 2,8/9,3-111,6, Ø62mm;</td>
<td class="notes" style="text-align:left">record in AVCHD or XAVC format</td>
<td class="accesoires" style="text-align:left">lens cover, lens hood, remote control, 2x battery, HDMI - HDMI-mini cable, USB-extensioncable, power adapter AC-L200D; class 10 64GB SDXC card</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15492d7deac0a4" onclick="adminRowClick(this,'tr162',162);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50, Sony NP-FV100A
afstandsbediening: RMT-835

18-3-2016 omgenummerd van 16 naar 12</td>
						<td class="datum_aankoop">18-12-2014 </td>
						<td class="aankoopbedrag">1657 </td></tr>
<tr class="cellColor1" align="center" id="tr163">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b7a52465ba3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b7a52465ba3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b7a52465ba3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b7a52465ba3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 13 Sony HDR-CX900E</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">4736091</td>
<td class="package" style="text-align:left">Peli case 1500</td>
<td class="description" style="text-align:left">HD - XAVC Camcorder; Zeiss Vario Sonnar T* lens 2,8/9,3-111,6, Ø62mm;</td>
<td class="notes" style="text-align:left">record in AVCHD or XAVC format</td>
<td class="accesoires" style="text-align:left">lens cover, lens hood, remote control, 2x battery, HDMI - HDMI-mini cable, USB-extensioncable, power adapter AC-L200D; class 10 64GB SDXC card</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b7a52465ba3" onclick="adminRowClick(this,'tr163',163);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50, Sony NP-FV100A
afstandsbediening: RMT-835

18-3-2016 omgenummerd van 19 naar 13</td>
						<td class="datum_aankoop">18-12-2014 </td>
						<td class="aankoopbedrag">1657 </td></tr>
<tr class="cellColor0" align="center" id="tr164">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b7a7a8211fflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b7a7a8211ff</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b7a7a8211ffduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b7a7a8211ffstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder 14 Sony HDR-CX900E</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">4736105</td>
<td class="package" style="text-align:left">originele verpakking</td>
<td class="description" style="text-align:left">HD - XAVC Camcorder; Zeiss Vario Sonnar T* lens 2,8/9,3-111,6, Ø62mm;</td>
<td class="notes" style="text-align:left">record in AVCHD or XAVC format</td>
<td class="accesoires" style="text-align:left">lens cover, lens hood, remote control, 2x battery, HDMI - HDMI-mini cable, USB-extensioncable, power adapter AC-L200D; class 10 64GB SDXC card</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b7a7a8211ff" onclick="adminRowClick(this,'tr164',164);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50, replacement Sony NP-FV100
afstandsbediening: RMT-835

18-3-2016 omgenummerd van 20 naar 14
1-4-2016 'replacement' accu vervangen door nieuwe 'replacement' accu
1-11-2016 FV50 vervangen door 'replacement' FV100</td>
						<td class="datum_aankoop">18-12-2014 </td>
						<td class="aankoopbedrag">1657 </td></tr>
<tr class="cellColor1" align="center" id="tr165">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156952c5a2ebcelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156952c5a2ebce</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156952c5a2ebceduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156952c5a2ebcestatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder O/VO 01 Sony HDR-CX740VE</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">345298</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD - XD Camcorder; Sony lens G; 1,8/3,8-38; Ø26,3mm; 10x optische zoom</td>
<td class="notes" style="text-align:left">32GB internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the internal memory, capture and delete!</td>
<td class="accesoires" style="text-align:left">remote control, 2x battery, HDMI - HDMI-mini cable, AV-cable, USB-extensioncable, power adapter AC-L200D</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156952c5a2ebce" onclick="adminRowClick(this,'tr165',165);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50
afstandsbediening: RMT-835
tot 18-12-2014 HD camcorder 18
tot 24-09-2015 HD camcorder 08</td>
						<td class="datum_aankoop">10-01-2013 </td>
						<td class="aankoopbedrag">999 </td></tr>
<tr class="cellColor0" align="center" id="tr166">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156952dfe2c4bblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156952dfe2c4bb</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156952dfe2c4bbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156952dfe2c4bbstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder O/VO 02 Sony HDR-CX740VE</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">345269</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD - XD Camcorder; Sony lens G; 1,8/3,8-38; Ø26,3mm; 10x optische zoom</td>
<td class="notes" style="text-align:left">32GB internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the internal memory, capture and delete!</td>
<td class="accesoires" style="text-align:left">remote control, 2x battery, HDMI - HDMI-mini cable, AV-cable, USB-extensioncable, power adapter AC-L200D</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156952dfe2c4bb" onclick="adminRowClick(this,'tr166',166);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50
afstandsbediening: RMT-835
tot 18-12-2014 HD camcorder 19
tot 30-09-2015 HD camcorder 09</td>
						<td class="datum_aankoop">10-01-2013 </td>
						<td class="aankoopbedrag">999 </td></tr>
<tr class="cellColor1" align="center" id="tr167">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156952eb67ba49limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156952eb67ba49</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156952eb67ba49duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156952eb67ba49status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder O/VO 03 Sony HDR-CX740VE</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">347114</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD - XD Camcorder; Sony lens G; 1,8/3,8-38; Ø26,3mm; 10x optische zoom</td>
<td class="notes" style="text-align:left">32GB internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the internal memory, capture and delete!</td>
<td class="accesoires" style="text-align:left">remote control, 2x battery, HDMI - HDMI-mini cable, AV-cable, USB-extensioncable, power adapter AC-L200D</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156952eb67ba49" onclick="adminRowClick(this,'tr167',167);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50
afstandsbediening: RMT-835
04-11-2014 accu vervangen
tot 06-01-2015 HD camcorder 16
16-03-2015 scharnier LED panel zit te los, 23-03-2015 uit voor reparatie
23-04-2015 gerepareerd retour
tot 30-09-2015 HD camcorder 10</td>
						<td class="datum_aankoop">10-01-2013 </td>
						<td class="aankoopbedrag">999 </td></tr>
<tr class="cellColor0" align="center" id="tr168">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15603b67eede65limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15603b67eede65</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15603b67eede65duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15603b67eede65status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">HD camcorder O/VO 04 Sony HDR-CX740VE</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">345297</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">HD - XD Camcorder; Sony lens G; 1,8/3,8-38; Ø26,3mm; 10x optische zoom</td>
<td class="notes" style="text-align:left">32GB internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the internal memory, capture and delete!</td>
<td class="accesoires" style="text-align:left">remote control, 2x battery, HDMI - HDMI-mini cable, AV-cable, USB-extensioncable, power adapter AC-L200D</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15603b67eede65" onclick="adminRowClick(this,'tr168',168);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-FV50
afstandsbediening: RMT-835
tot 19-12-2014 HD camcorder 17
tot 30-09-2015 HD camcorder 11</td>
						<td class="datum_aankoop">10-01-2013 </td>
						<td class="aankoopbedrag">999 </td></tr>
<tr class="cellColor1" align="center" id="tr169">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159539ab73e10elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159539ab73e10e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159539ab73e10eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159539ab73e10estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 01 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X200416002634</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159539ab73e10e" onclick="adminRowClick(this,'tr169',169);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor0" align="center" id="tr170">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158eb780c72ddalimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158eb780c72dda</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158eb780c72ddaduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158eb780c72ddastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 02 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X261215001280</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158eb780c72dda" onclick="adminRowClick(this,'tr170',170);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">31-01-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor1" align="center" id="tr171">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952637b78b3flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952637b78b3f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952637b78b3fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952637b78b3fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 03 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X200416002633</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952637b78b3f" onclick="adminRowClick(this,'tr171',171);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor0" align="center" id="tr172">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595267d129fbalimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595267d129fba</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595267d129fbaduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595267d129fbastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 04 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X200416002637</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595267d129fba" onclick="adminRowClick(this,'tr172',172);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor1" align="center" id="tr173">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595269e27a1e9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595269e27a1e9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595269e27a1e9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595269e27a1e9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 05 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X200416002872</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595269e27a1e9" onclick="adminRowClick(this,'tr173',173);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor0" align="center" id="tr174">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953e7e39cc12limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953e7e39cc12</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953e7e39cc12duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953e7e39cc12status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler 06 mede8er MED600X3D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">6X200416002638</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">2X USB in, SD-slot, LAN; output: HDMI, AV, Component, Optical</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Intertek HONOR ADS-24RD-12 1224G, max 0,7A; HDMI kabel, analoge AV kabel; manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953e7e39cc12" onclick="adminRowClick(this,'tr174',174);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">139 </td></tr>
<tr class="cellColor1" align="center" id="tr175">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158e243dfb257blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158e243dfb257b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158e243dfb257bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158e243dfb257bstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">HD multimediaspeler vh 01 Sitecom MD-626</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">CMK11202688</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32GB Transcend SSD drive</td>
<td class="notes" style="text-align:left">AV-out, HDMI-out</td>
<td class="accesoires" style="text-align:left">afstandsbediening, AC adapter Union East ACE024A-05. USB-2x USB kabel, analoge AV kabel; 2x manual</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158e243dfb257b" onclick="adminRowClick(this,'tr175',175);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> speler: €45, SSD drive: €31
28-06-2017 te vaak opstart problemen, (voorlopig) uit de roulatie</td>
						<td class="datum_aankoop">31-01-2017 </td>
						<td class="aankoopbedrag">71 </td></tr>
<tr class="cellColor1" align="center" id="tr185">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954a966df922limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954a966df922</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954a966df922duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954a966df922status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 03 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954a966df922" onclick="adminRowClick(this,'tr185',185);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-04-2013 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr186">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953d7e30d2a4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953d7e30d2a4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953d7e30d2a4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953d7e30d2a4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 04 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953d7e30d2a4" onclick="adminRowClick(this,'tr186',186);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr187">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953d7a4f3b81limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953d7a4f3b81</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953d7a4f3b81duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953d7a4f3b81status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 05 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953d7a4f3b81" onclick="adminRowClick(this,'tr187',187);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr188">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea4cf76ff57limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea4cf76ff57</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea4cf76ff57duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea4cf76ff57status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 22 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea4cf76ff57" onclick="adminRowClick(this,'tr188',188);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr189">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152ea4d15a721climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152ea4d15a721c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152ea4d15a721cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152ea4d15a721cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 23 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152ea4d15a721c" onclick="adminRowClick(this,'tr189',189);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr190">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1532c2dd53e0d2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1532c2dd53e0d2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1532c2dd53e0d2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1532c2dd53e0d2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 24 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1532c2dd53e0d2" onclick="adminRowClick(this,'tr190',190);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr191">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1532c2defc54ddlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1532c2defc54dd</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1532c2defc54ddduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1532c2defc54ddstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 25 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1532c2defc54dd" onclick="adminRowClick(this,'tr191',191);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">30-01-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr192">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a9845ed31a7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a9845ed31a7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a9845ed31a7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a9845ed31a7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 26 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a9845ed31a7" onclick="adminRowClick(this,'tr192',192);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr193">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a98489f25aflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a98489f25af</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a98489f25afduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a98489f25afstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 27 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a98489f25af" onclick="adminRowClick(this,'tr193',193);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr194">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a984a6c62a2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a984a6c62a2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a984a6c62a2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a984a6c62a2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 28 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a984a6c62a2" onclick="adminRowClick(this,'tr194',194);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr195">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a984d2ee344limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a984d2ee344</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a984d2ee344duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a984d2ee344status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 30 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a984d2ee344" onclick="adminRowClick(this,'tr195',195);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr196">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a984ed44870limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a984ed44870</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a984ed44870duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a984ed44870status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 31 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a984ed44870" onclick="adminRowClick(this,'tr196',196);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr197">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a98505aad29limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a98505aad29</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a98505aad29duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a98505aad29status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 32 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a98505aad29" onclick="adminRowClick(this,'tr197',197);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr198">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a9851c78489limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a9851c78489</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a9851c78489duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a9851c78489status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 33 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a9851c78489" onclick="adminRowClick(this,'tr198',198);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor1" align="center" id="tr199">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153a98552215f0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153a98552215f0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153a98552215f0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153a98552215f0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 35 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153a98552215f0" onclick="adminRowClick(this,'tr199',199);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">27 </td></tr>
<tr class="cellColor0" align="center" id="tr200">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d14712e3f3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d14712e3f3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d14712e3f3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d14712e3f3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 36 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d14712e3f3" onclick="adminRowClick(this,'tr200',200);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr201">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d14eb9f491limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d14eb9f491</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d14eb9f491duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d14eb9f491status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 37 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d14eb9f491" onclick="adminRowClick(this,'tr201',201);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr202">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d1525d404blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d1525d404b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d1525d404bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d1525d404bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 38 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d1525d404b" onclick="adminRowClick(this,'tr202',202);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr203">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d1538d9a29limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d1538d9a29</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d1538d9a29duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d1538d9a29status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 39 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d1538d9a29" onclick="adminRowClick(this,'tr203',203);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr204">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d154d04be7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d154d04be7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d154d04be7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d154d04be7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 40 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d154d04be7" onclick="adminRowClick(this,'tr204',204);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr205">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15592793d7f4d8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15592793d7f4d8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15592793d7f4d8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15592793d7f4d8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 41 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15592793d7f4d8" onclick="adminRowClick(this,'tr205',205);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr206">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15592795ad9e11limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15592795ad9e11</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15592795ad9e11duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15592795ad9e11status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 42 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15592795ad9e11" onclick="adminRowClick(this,'tr206',206);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr207">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d150d5d1f4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d150d5d1f4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d150d5d1f4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d150d5d1f4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 43 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d150d5d1f4" onclick="adminRowClick(this,'tr207',207);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr208">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953cce5f0d80limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953cce5f0d80</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953cce5f0d80duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953cce5f0d80status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 44 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953cce5f0d80" onclick="adminRowClick(this,'tr208',208);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr209">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953ce5cdc1eelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953ce5cdc1ee</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953ce5cdc1eeduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953ce5cdc1eestatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 45 DAP HP-280 Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953ce5cdc1ee" onclick="adminRowClick(this,'tr209',209);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr210">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15953d860a37f9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15953d860a37f9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15953d860a37f9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15953d860a37f9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 46 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15953d860a37f9" onclick="adminRowClick(this,'tr210',210);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr211">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e4030e35alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e4030e35a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e4030e35aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e4030e35astatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 47 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e4030e35a" onclick="adminRowClick(this,'tr211',211);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr212">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e4373da82limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e4373da82</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e4373da82duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e4373da82status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 48 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e4373da82" onclick="adminRowClick(this,'tr212',212);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr213">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e448d995blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e448d995b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e448d995bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e448d995bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 49 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e448d995b" onclick="adminRowClick(this,'tr213',213);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr214">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e45e27f72limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e45e27f72</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e45e27f72duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e45e27f72status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 50 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e45e27f72" onclick="adminRowClick(this,'tr214',214);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr215">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e4ad2c835limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e4ad2c835</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e4ad2c835duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e4ad2c835status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 51 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e4ad2c835" onclick="adminRowClick(this,'tr215',215);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr216">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e5222dfb8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e5222dfb8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e5222dfb8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e5222dfb8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 52 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e5222dfb8" onclick="adminRowClick(this,'tr216',216);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr217">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e53623b0blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e53623b0b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e53623b0bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e53623b0bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 53 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e53623b0b" onclick="adminRowClick(this,'tr217',217);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr218">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e54dd3e60limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e54dd3e60</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e54dd3e60duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e54dd3e60status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 54 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e54dd3e60" onclick="adminRowClick(this,'tr218',218);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr219">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e580de30dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e580de30d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e580de30dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e580de30dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 55 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e580de30d" onclick="adminRowClick(this,'tr219',219);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor0" align="center" id="tr220">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954e494d75eelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954e494d75ee</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954e494d75eeduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954e494d75eestatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Hoofdtelefoon 56 PreSonus HD7</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954e494d75ee" onclick="adminRowClick(this,'tr220',220);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">35 </td></tr>
<tr class="cellColor1" align="center" id="tr221">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15769457c5ec26limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15769457c5ec26</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15769457c5ec26duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15769457c5ec26status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">iPad 21 Apple ML0N2NF/A</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DLXRD21HGMLL</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iPad Pro Wi-Fi 128GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">USB-kabel, netadapter</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15769457c5ec26" onclick="adminRowClick(this,'tr221',221);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">14-06-2016 </td>
						<td class="aankoopbedrag">1100 </td></tr>
<tr class="cellColor0" align="center" id="tr222">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15770e2f1a2dfflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15770e2f1a2dff</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15770e2f1a2dffduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15770e2f1a2dffstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">iPad 22 Apple ML0N2NF/A</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DLXQTEGHGMLL</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iPad Pro Wi-Fi 128GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">USB-kabel, netadapter</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15770e2f1a2dff" onclick="adminRowClick(this,'tr222',222);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">14-06-2016 </td>
						<td class="aankoopbedrag">1100 </td></tr>
<tr class="cellColor1" align="center" id="tr223">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15770e5fe501c4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15770e5fe501c4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15770e5fe501c4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15770e5fe501c4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">iPad 23 Apple ML0N2NF/A</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DLXQV54ZGMLL</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iPad Pro Wi-Fi 128GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">USB-kabel, netadapter</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15770e5fe501c4" onclick="adminRowClick(this,'tr223',223);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">14-06-2016 </td>
						<td class="aankoopbedrag">1100 </td></tr>
<tr class="cellColor0" align="center" id="tr224">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594ce36cd877flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594ce36cd877f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594ce36cd877fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594ce36cd877fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">iPad 24 Apple ML0N2NF/A</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DLXQV182GMLL</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iPad Pro Wi-Fi 128GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">USB-kabel, netadapter</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594ce36cd877f" onclick="adminRowClick(this,'tr224',224);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">14-06-2016 </td>
						<td class="aankoopbedrag">1100 </td></tr>
<tr class="cellColor1" align="center" id="tr225">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1594ceaab1cb1blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1594ceaab1cb1b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1594ceaab1cb1bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1594ceaab1cb1bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">iPad 25 Apple ML0N2NF/A</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">DLXQV55CGMLL</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">iPad Pro Wi-Fi 128GB</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">USB-kabel, netadapter</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1594ceaab1cb1b" onclick="adminRowClick(this,'tr225',225);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">14-06-2016 </td>
						<td class="aankoopbedrag">1100 </td></tr>
<tr class="cellColor1" align="center" id="tr229">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1531db9d00b44dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1531db9d00b44d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1531db9d00b44dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1531db9d00b44dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot 21 Dedolight DL-DLED4.1-T/D + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0114-2710</td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">40W spot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">DT4.1 Power Supply 90-260VAC - Sn 0713-1992; (Dedolight Super 8-leaf Rotatable Barndoor missing); Shield ring; Statief Lamp 21 Kupo Mini Kit</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1531db9d00b44d" onclick="adminRowClick(this,'tr229',229);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 03-06-2014 aansluiting adapterkabel zit los
20-10-2014 gerepareerd</td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">443 </td></tr>
<tr class="cellColor0" align="center" id="tr230">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1531dbdc817b84limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1531dbdc817b84</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1531dbdc817b84duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1531dbdc817b84status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot 22 Dedolight DL-DLED4.1-T/D + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0114-2711</td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">40W spot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">DT4.1 Power Supply 90-260VAC - Sn 0713-1648; (Dedolight Super 8-leaf Rotatable Barndoor); Shield ring; Statief Lamp 22 Kupo Mini Kit</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1531dbdc817b84" onclick="adminRowClick(this,'tr230',230);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 23-05-2014 power supply toegevoegd, battery power set wordt apart gebruikt
17-2-2017 Super 8 leaf Barndoor vermist</td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">443 </td></tr>
<tr class="cellColor1" align="center" id="tr231">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1531dc401261fclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1531dc401261fc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1531dc401261fcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1531dc401261fcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot 23 Dedolight DL-DLED4.1-T/D + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0913-2414</td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">40W spot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">DT4.1 Power Supply 90-260VAC - Sn 0114-1931; Dedolight Super 8-leaf Rotatable Barndoor; Shield ring; Statief Lamp 23 Kupo Mini Kit</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1531dc401261fc" onclick="adminRowClick(this,'tr231',231);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 23-05-2014 power supply toegevoegd, battery power set wordt apart gebruikt
22-3-2016 ring voor focus gaat zwaar</td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">443 </td></tr>
<tr class="cellColor0" align="center" id="tr232">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1584001fba5a57limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1584001fba5a57</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1584001fba5a57duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1584001fba5a57status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 01 Showtec spectral 260</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">10W spot</td>
<td class="notes" style="text-align:left">35� LED beam</td>
<td class="accesoires" style="text-align:left">met klem op 16mm spigot</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1584001fba5a57" onclick="adminRowClick(this,'tr232',232);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">78 </td></tr>
<tr class="cellColor1" align="center" id="tr233">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1584002737c639limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1584002737c639</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1584002737c639duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1584002737c639status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 05 Showtec spectral 260</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">10W spot</td>
<td class="notes" style="text-align:left">35� LED beam</td>
<td class="accesoires" style="text-align:left">met klem op 16mm spigot</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1584002737c639" onclick="adminRowClick(this,'tr233',233);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">78 </td></tr>
<tr class="cellColor0" align="center" id="tr234">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156aa045b09240limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156aa045b09240</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156aa045b09240duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156aa045b09240status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 19 Showtec spectral 260</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">10W spot</td>
<td class="notes" style="text-align:left">35� LED beam</td>
<td class="accesoires" style="text-align:left">met klem op 16mm spigot</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156aa045b09240" onclick="adminRowClick(this,'tr234',234);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">78 </td></tr>
<tr class="cellColor1" align="center" id="tr235">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15840022bbc988limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15840022bbc988</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15840022bbc988duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15840022bbc988status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 20 Showtec spectral 260</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">10W spot</td>
<td class="notes" style="text-align:left">35� LED beam</td>
<td class="accesoires" style="text-align:left">met klem op 16mm spigot</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15840022bbc988" onclick="adminRowClick(this,'tr235',235);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">20-12-2013 </td>
						<td class="aankoopbedrag">78 </td></tr>
<tr class="cellColor0" align="center" id="tr236">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159523d5bea064limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159523d5bea064</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159523d5bea064duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159523d5bea064status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 21 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159523d5bea064" onclick="adminRowClick(this,'tr236',236);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor1" align="center" id="tr237">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952419e776falimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952419e776fa</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952419e776faduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952419e776fastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 22 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952419e776fa" onclick="adminRowClick(this,'tr237',237);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor0" align="center" id="tr238">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595246060d27elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595246060d27e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595246060d27eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595246060d27estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 23 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595246060d27e" onclick="adminRowClick(this,'tr238',238);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor1" align="center" id="tr239">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952461f847a2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952461f847a2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952461f847a2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952461f847a2status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 24 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952461f847a2" onclick="adminRowClick(this,'tr239',239);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor0" align="center" id="tr240">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524638d8b63limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524638d8b63</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524638d8b63duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524638d8b63status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 25 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524638d8b63" onclick="adminRowClick(this,'tr240',240);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor1" align="center" id="tr241">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952465d8b465limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952465d8b465</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952465d8b465duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952465d8b465status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED spot white 26 Showtec Compact Studiobeam 42498</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">30W spot, 7 5W tri-leds (warm white, cool wit and amber)</td>
<td class="notes" style="text-align:left">10� LED beam</td>
<td class="accesoires" style="text-align:left">16mm spigot adapter, powercon power cable</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952465d8b465" onclick="adminRowClick(this,'tr241',241);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">365 </td></tr>
<tr class="cellColor0" align="center" id="tr242">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1531edabd455fblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1531edabd455fb</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1531edabd455fbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1531edabd455fbstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED Videolamp 01 Dedolight Ledzilla DLOBML</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0513-9145</td>
<td class="package" style="text-align:left">TAS</td>
<td class="description" style="text-align:left">LED batterylight</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">soft light filter, Amber conversion filter, barn doors; 
Battery OTB for F5507.4V 2200mAh 16.3Wh; battery charger DLCH-NPF</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1531edabd455fb" onclick="adminRowClick(this,'tr242',242);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-12-2013 </td>
						<td class="aankoopbedrag">420 </td></tr>
<tr class="cellColor1" align="center" id="tr243">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1531eda7c3b5d4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1531eda7c3b5d4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1531eda7c3b5d4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1531eda7c3b5d4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED Videolamp 02 Dedolight Ledzilla DLOBML</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0113-8216</td>
<td class="package" style="text-align:left">TAS</td>
<td class="description" style="text-align:left">LED batterylight</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">soft light filter, Amber conversion filter, barn doors; 
Battery OTB for F5507.4V 2200mAh 16.3Wh; battery charger DLCH-NPF</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1531eda7c3b5d4" onclick="adminRowClick(this,'tr243',243);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-12-2013 </td>
						<td class="aankoopbedrag">420 </td></tr>
<tr class="cellColor0" align="center" id="tr244">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk152f361653d2d5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk152f361653d2d5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk152f361653d2d5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk152f361653d2d5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED Videolamp 03 Dedolight Ledzilla DLOBML</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0113-8229</td>
<td class="package" style="text-align:left">TAS</td>
<td class="description" style="text-align:left">LED batterylight</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">soft light filter, Amber conversion filter, barn doors; 
Battery OTB for F5507.4V 2200mAh 16.3Wh; battery charger DLCH-NPF</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk152f361653d2d5" onclick="adminRowClick(this,'tr244',244);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-12-2013 </td>
						<td class="aankoopbedrag">420 </td></tr>
<tr class="cellColor1" align="center" id="tr245">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1570f5c9c309ddlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1570f5c9c309dd</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1570f5c9c309ddduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1570f5c9c309ddstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">LED Videolamp 03 Dedolight Ledzilla DLOBML Copy</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0113-8229</td>
<td class="package" style="text-align:left">TAS</td>
<td class="description" style="text-align:left">LED batterylight</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">soft light filter, Amber conversion filter, barn doors; 
Battery OTB for F5507.4V 2200mAh 16.3Wh; battery charger DLCH-NPF</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1570f5c9c309dd" onclick="adminRowClick(this,'tr245',245);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-12-2013 </td>
						<td class="aankoopbedrag">420 </td></tr>
<tr class="cellColor0" align="center" id="tr246">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1570f5d7a64215limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1570f5d7a64215</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1570f5d7a64215duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1570f5d7a64215status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">LED videolamp 15 PRO-X XP-H56P</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">acculader, accu</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1570f5d7a64215" onclick="adminRowClick(this,'tr246',246);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr247">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd3eb1690flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd3eb1690f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd3eb1690fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd3eb1690fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker for trolley, next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd3eb1690f" onclick="adminRowClick(this,'tr247',247);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr248">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd41e721e3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd41e721e3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd41e721e3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd41e721e3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker for trolley, next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd41e721e3" onclick="adminRowClick(this,'tr248',248);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr249">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd43d6e366limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd43d6e366</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd43d6e366duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd43d6e366status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 03</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd43d6e366" onclick="adminRowClick(this,'tr249',249);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr250">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd452a2b3flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd452a2b3f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd452a2b3fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd452a2b3fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 04</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd452a2b3f" onclick="adminRowClick(this,'tr250',250);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr251">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd468ede5elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd468ede5e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd468ede5eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd468ede5estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 05</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd468ede5e" onclick="adminRowClick(this,'tr251',251);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr252">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd47ed01cdlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd47ed01cd</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd47ed01cdduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd47ed01cdstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 06</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd47ed01cd" onclick="adminRowClick(this,'tr252',252);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr253">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd49aaf278limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd49aaf278</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd49aaf278duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd49aaf278status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 10</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd49aaf278" onclick="adminRowClick(this,'tr253',253);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr254">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1561b892123fe7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1561b892123fe7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1561b892123fe7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1561b892123fe7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 11</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1561b892123fe7" onclick="adminRowClick(this,'tr254',254);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr255">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd4b092970limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd4b092970</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd4b092970duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd4b092970status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 12</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd4b092970" onclick="adminRowClick(this,'tr255',255);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr256">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd4cec0bb9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd4cec0bb9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd4cec0bb9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd4cec0bb9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 13</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd4cec0bb9" onclick="adminRowClick(this,'tr256',256);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr257">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd4e4bc17elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd4e4bc17e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd4e4bc17eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd4e4bc17estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 14</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd4e4bc17e" onclick="adminRowClick(this,'tr257',257);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr258">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd4fd2bceelimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd4fd2bcee</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd4fd2bceeduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd4fd2bceestatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Locker 15</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd4fd2bcee" onclick="adminRowClick(this,'tr258',258);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr259">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564dd51682f6flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564dd51682f6f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564dd51682f6fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564dd51682f6fstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Locker 16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564dd51682f6f" onclick="adminRowClick(this,'tr259',259);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr260">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abfdf55f238limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abfdf55f238</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abfdf55f238duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abfdf55f238status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 21</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abfdf55f238" onclick="adminRowClick(this,'tr260',260);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr261">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abfe0945427limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abfe0945427</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abfe0945427duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abfe0945427status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Locker 22</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Locker next to Uitleen 5.22, 5th floor Benthem  Crouwel building</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abfe0945427" onclick="adminRowClick(this,'tr261',261);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr262">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abfd9c72ab3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abfd9c72ab3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abfd9c72ab3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abfd9c72ab3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 07</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abfd9c72ab3" onclick="adminRowClick(this,'tr262',262);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr263">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abfd7d30438limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abfd7d30438</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abfd7d30438duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abfd7d30438status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 08</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abfd7d30438" onclick="adminRowClick(this,'tr263',263);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr264">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abf417c04e5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abf417c04e5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abf417c04e5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abf417c04e5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 09</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abf417c04e5" onclick="adminRowClick(this,'tr264',264);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr265">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abf00bd2dc1limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abf00bd2dc1</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abf00bd2dc1duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abf00bd2dc1status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 10</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abf00bd2dc1" onclick="adminRowClick(this,'tr265',265);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr266">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153abffbecb4aflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153abffbecb4af</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153abffbecb4afduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153abffbecb4afstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 17</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153abffbecb4af" onclick="adminRowClick(this,'tr266',266);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr267">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558d501468d7elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558d501468d7e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558d501468d7eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558d501468d7estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 18 zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558d501468d7e" onclick="adminRowClick(this,'tr267',267);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr268">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15954d709a9205limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15954d709a9205</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15954d709a9205duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15954d709a9205status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 19 zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15954d709a9205" onclick="adminRowClick(this,'tr268',268);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr269">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15956486b767calimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15956486b767ca</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15956486b767caduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15956486b767castatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 20 zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15956486b767ca" onclick="adminRowClick(this,'tr269',269);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr270">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595a268cac6aclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595a268cac6ac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595a268cac6acduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595a268cac6acstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 21 zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595a268cac6ac" onclick="adminRowClick(this,'tr270',270);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr271">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595a26a940897limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595a26a940897</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595a26a940897duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595a26a940897status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Lockit iPad 22 zw</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">SecuPlus Lockit kabel met cableclip en ABUS 65/30 hangslot</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595a26a940897" onclick="adminRowClick(this,'tr271',271);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr272">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1565707f4ae6c5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1565707f4ae6c5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1565707f4ae6c5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1565707f4ae6c5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 04 Mackie Onyx-1220</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">(21)JP18674</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">output: 4 mic/ 12 line;
Input: jack; all jacks balanced</td>
<td class="accesoires" style="text-align:left">netsnoer Euro</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1565707f4ae6c5" onclick="adminRowClick(this,'tr272',272);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">350 </td>
						<td class="aankoopbedrag">350 </td></tr>
<tr class="cellColor1" align="center" id="tr273">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1565730e5e0f5elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1565730e5e0f5e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1565730e5e0f5eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1565730e5e0f5estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 05 Mackie CFX 16</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">(21)BY51676</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">output: 12 mic/ 16 line
Input: jack; all jacks balanced</td>
<td class="accesoires" style="text-align:left">netsnoer Euro</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1565730e5e0f5e" onclick="adminRowClick(this,'tr273',273);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">550 </td>
						<td class="aankoopbedrag">350 </td></tr>
<tr class="cellColor0" align="center" id="tr274">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156a8e79d90a37limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156a8e79d90a37</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156a8e79d90a37duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156a8e79d90a37status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 06 Mackie 402VLZ4</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">002551000CPHC0423</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">4 channel mic/line mixer; output: 2x mic, 2x line; tape-in, tape-out</td>
<td class="accesoires" style="text-align:left">netsnoer-adapter MODEL:HA48N7476-4R</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156a8e79d90a37" onclick="adminRowClick(this,'tr274',274);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-01-2016 </td>
						<td class="aankoopbedrag">120 </td></tr>
<tr class="cellColor1" align="center" id="tr275">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156a8ea0b2f39elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156a8ea0b2f39e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156a8ea0b2f39eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156a8ea0b2f39estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 07 Mackie 402VLZ4</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">002551000CPHC0383</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">4 channel mic/line mixer; output: 2x mic, 2x line; tape-in, tape-out</td>
<td class="accesoires" style="text-align:left">netsnoer-adapter MODEL:HA48N7476-4R</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156a8ea0b2f39e" onclick="adminRowClick(this,'tr275',275);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-01-2016 </td>
						<td class="aankoopbedrag">120 </td></tr>
<tr class="cellColor0" align="center" id="tr276">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156a8ee58b1d70limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156a8ee58b1d70</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156a8ee58b1d70duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156a8ee58b1d70status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 08 Mackie 402VLZ4</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">002551000CPHC0148</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">4 channel mic/line mixer; output: 2x mic, 2x line; tape-in, tape-out</td>
<td class="accesoires" style="text-align:left">netsnoer-adapter MODEL:HA48N7476-4R</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156a8ee58b1d70" onclick="adminRowClick(this,'tr276',276);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-01-2016 </td>
						<td class="aankoopbedrag">120 </td></tr>
<tr class="cellColor1" align="center" id="tr277">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157e8e30ae44dblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157e8e30ae44db</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157e8e30ae44dbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157e8e30ae44dbstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 09 Mackie 402VLZ4</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">002551000CPHC0424</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">4 channel mic/line mixer; output: 2x mic, 2x line; tape-in, tape-out</td>
<td class="accesoires" style="text-align:left">netsnoer-adapter MODEL:HA48N7476-4R</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157e8e30ae44db" onclick="adminRowClick(this,'tr277',277);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-01-2016 </td>
						<td class="aankoopbedrag">120 </td></tr>
<tr class="cellColor0" align="center" id="tr278">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157e8e68d70950limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157e8e68d70950</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157e8e68d70950duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157e8e68d70950status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mengpaneel 10 Mackie 402VLZ4</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">002551000CPHC0376</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">4 channel mic/line mixer; output: 2x mic, 2x line; tape-in, tape-out</td>
<td class="accesoires" style="text-align:left">netsnoer-adapter MODEL:HA48N7476-4R</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157e8e68d70950" onclick="adminRowClick(this,'tr278',278);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">27-01-2016 </td>
						<td class="aankoopbedrag">120 </td></tr>
<tr class="cellColor0" align="center" id="tr280">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156c308fd887cblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156c308fd887cb</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156c308fd887cbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156c308fd887cbstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Microfoon 18 Sennheiser 835S evolution</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left">Cardioid dynamische microfoon. Goede spreek-microfoon</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156c308fd887cb" onclick="adminRowClick(this,'tr280',280);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> vh mic 33, vanaf 2011 in bruikleen geweest bij Rietveld TV</td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">95 </td></tr>
<tr class="cellColor1" align="center" id="tr281">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153c50973b512elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153c50973b512e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153c50973b512eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153c50973b512estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Mobile Amplifier 02 Mipro MA-202</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">858211693A</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Freq: 5NB</td>
<td class="accesoires" style="text-align:left">microfoon: ACT-30H (Sn 858204362A), afstandsbediening 2MD007, lader SSA-0501D-19 (Sn PSSA1S5001961 Rev:A1W) en netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153c50973b512e" onclick="adminRowClick(this,'tr281',281);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-07-2014 </td>
						<td class="aankoopbedrag">800 </td></tr>
<tr class="cellColor0" align="center" id="tr282">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159688b04ee7c3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159688b04ee7c3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159688b04ee7c3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159688b04ee7c3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Netwerk hub 3Com 3CGSU08</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">AB/9XRQAC0024D0F</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">3C12VME 12V, 1A Power Adapter</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">0</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159688b04ee7c3" onclick="adminRowClick(this,'tr282',282);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr283">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156615bf3e3e3dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156615bf3e3e3d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156615bf3e3e3dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156615bf3e3e3dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Overhead projector 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S171026512</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">3M 1720 Overhead projector</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156615bf3e3e3d" onclick="adminRowClick(this,'tr283',283);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> EHJ 24V 250W
24-5-2016 temp beveiliging kapot, door Kees vervangen. Werkt weer</td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr284">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159b28480d77b7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159b28480d77b7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159b28480d77b7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159b28480d77b7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Presentatieset 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Presentatiekar met Actieve speakerset 30</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">audiokabel 2xXLR-2xRCA, splitter mini-jack(m)-2xRCA(f)</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">2</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159b28480d77b7" onclick="adminRowClick(this,'tr284',284);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr285">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155155f97974a7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155155f97974a7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155155f97974a7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155155f97974a7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Richtmicrofoon 03 R�de NTG-3</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0017309</td>
<td class="package" style="text-align:left">Stormcase iM2100</td>
<td class="description" style="text-align:left">Richtmicrofoon</td>
<td class="notes" style="text-align:left">alleen met Phantom voeding</td>
<td class="accesoires" style="text-align:left">statief-adapter, windshield R�de WS7</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155155f97974a7" onclick="adminRowClick(this,'tr285',285);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> R�de NTG-3: €411 (09-12-2013)</td>
						<td class="datum_aankoop">09-12-2013 </td>
						<td class="aankoopbedrag">500 </td></tr>
<tr class="cellColor0" align="center" id="tr286">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154de1d862d555limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154de1d862d555</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154de1d862d555duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154de1d862d555status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Richtmicrofoon 04 R�de NTG-3</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0024431</td>
<td class="package" style="text-align:left">Stormcase iM2100</td>
<td class="description" style="text-align:left">Richtmicrofoon</td>
<td class="notes" style="text-align:left">alleen met Phantom voeding</td>
<td class="accesoires" style="text-align:left">statief-adapter, windshield R�de WS7</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154de1d862d555" onclick="adminRowClick(this,'tr286',286);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">09-12-2014 </td>
						<td class="aankoopbedrag">510 </td></tr>
<tr class="cellColor1" align="center" id="tr287">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154de1e9ec5304limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154de1e9ec5304</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154de1e9ec5304duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154de1e9ec5304status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Richtmicrofoon 05 R�de NTG-3</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0024236</td>
<td class="package" style="text-align:left">Stormcase iM2100</td>
<td class="description" style="text-align:left">Richtmicrofoon</td>
<td class="notes" style="text-align:left">alleen met Phantom voeding</td>
<td class="accesoires" style="text-align:left">statief-adapter, windshield R�de WS7</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154de1e9ec5304" onclick="adminRowClick(this,'tr287',287);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">09-12-2014 </td>
						<td class="aankoopbedrag">510 </td></tr>
<tr class="cellColor0" align="center" id="tr288">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15527cc1ab2a26limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15527cc1ab2a26</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15527cc1ab2a26duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15527cc1ab2a26status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Richtmicrofoon 06 R�de NTG-3</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0015189</td>
<td class="package" style="text-align:left">Stormcase iM2100</td>
<td class="description" style="text-align:left">Richtmicrofoon</td>
<td class="notes" style="text-align:left">alleen met Phantom voeding</td>
<td class="accesoires" style="text-align:left">statief-adapter, windshield R�de WS7</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15527cc1ab2a26" onclick="adminRowClick(this,'tr288',288);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> R�de NTG-3: €411 (09-12-2013)</td>
						<td class="datum_aankoop">09-12-2013 </td>
						<td class="aankoopbedrag">500 </td></tr>
<tr class="cellColor1" align="center" id="tr289">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15457788314ac7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15457788314ac7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15457788314ac7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15457788314ac7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Richtmicrofoon 10 R�de Videomic Pro</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0167631</td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left">Richtmicrofoon voor DSLR camera's</td>
<td class="notes" style="text-align:left">9V batterij, mini-jack aansluiting</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15457788314ac7" onclick="adminRowClick(this,'tr289',289);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 14-3-2016 nakijken, ws batterij vervangen
17-3-2016 batterij vervangen</td>
						<td class="datum_aankoop">03-11-2014 </td>
						<td class="aankoopbedrag">154 </td></tr>
<tr class="cellColor0" align="center" id="tr290">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153b6734b171dflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153b6734b171df</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153b6734b171dfduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153b6734b171dfstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153b6734b171df" onclick="adminRowClick(this,'tr290',290);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr291">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155895006462d0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155895006462d0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155895006462d0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155895006462d0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155895006462d0" onclick="adminRowClick(this,'tr291',291);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr292">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15589502123816limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15589502123816</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15589502123816duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15589502123816status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 03</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15589502123816" onclick="adminRowClick(this,'tr292',292);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr293">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15589503d053b8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15589503d053b8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15589503d053b8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15589503d053b8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 04</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15589503d053b8" onclick="adminRowClick(this,'tr293',293);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr294">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15589505674516limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15589505674516</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15589505674516duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15589505674516status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 05</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15589505674516" onclick="adminRowClick(this,'tr294',294);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr295">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558950754b0ealimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558950754b0ea</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558950754b0eaduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558950754b0eastatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 06</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558950754b0ea" onclick="adminRowClick(this,'tr295',295);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr296">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15589509152230limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15589509152230</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15589509152230duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15589509152230status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 07</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15589509152230" onclick="adminRowClick(this,'tr296',296);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr297">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558950addd4c1limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558950addd4c1</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558950addd4c1duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558950addd4c1status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 08</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558950addd4c1" onclick="adminRowClick(this,'tr297',297);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr298">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558950c7a469flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558950c7a469f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558950c7a469fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558950c7a469fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset 09</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558950c7a469f" onclick="adminRowClick(this,'tr298',298);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr299">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157768d848f966limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157768d848f966</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157768d848f966duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157768d848f966status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">SecuPlus kabelset new</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">kabel, slot, Secu clip en toebehoren</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157768d848f966" onclick="adminRowClick(this,'tr299',299);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr304">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15721dbe66171flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15721dbe66171f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15721dbe66171fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15721dbe66171fstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Splitter ZOTAC Mini-DisplayPort to Dual HDMI no 02</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">splitter Mini-DisplayPort/Thunderbolt - 2x HDMI 19-polig (W) (ZT-MDP2HD)</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15721dbe66171f" onclick="adminRowClick(this,'tr304',304);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-06-2015 </td>
						<td class="aankoopbedrag">54 </td></tr>
<tr class="cellColor1" align="center" id="tr305">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1576d130592c2flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1576d130592c2f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1576d130592c2fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1576d130592c2fstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Splitter ZOTAC Mini-DisplayPort to Dual HDMI no 03</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">splitter Mini-DisplayPort/Thunderbolt - 2x HDMI 19-polig (W) (ZT-MDP2HD)</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1576d130592c2f" onclick="adminRowClick(this,'tr305',305);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">15-06-2015 </td>
						<td class="aankoopbedrag">54 </td></tr>
<tr class="cellColor0" align="center" id="tr306">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154bd071180956limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154bd071180956</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154bd071180956duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154bd071180956status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Foto 05 Manfrotto 055XPRO3-3W</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">WMV010505981</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left">3W head Sn 0752284</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">adapter plate 200PL-14 1/4"</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154bd071180956" onclick="adminRowClick(this,'tr306',306);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">05-01-2015 </td>
						<td class="aankoopbedrag">297 </td></tr>
<tr class="cellColor1" align="center" id="tr307">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158777f587f8fblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158777f587f8fb</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158777f587f8fbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158777f587f8fbstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp 01 Siem AL 280 custom</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Siem FL220W04 Vlaklicht 1</td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158777f587f8fb" onclick="adminRowClick(this,'tr307',307);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr308">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1587780dac42a2limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1587780dac42a2</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1587780dac42a2duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1587780dac42a2status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp 02 Siem AL 280 custom</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Siem FL220W04 Vlaklicht 2</td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1587780dac42a2" onclick="adminRowClick(this,'tr308',308);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr309">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1587780ea97f9alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1587780ea97f9a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1587780ea97f9aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1587780ea97f9astatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp 03 Siem AL 280 custom</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Siem FL220W04 Vlaklicht 3</td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1587780ea97f9a" onclick="adminRowClick(this,'tr309',309);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr310">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1587780f41711climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1587780f41711c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1587780f41711cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1587780f41711cstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp 04 Siem AL 280 custom</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Siem FL220W04 Vlaklicht 4</td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1587780f41711c" onclick="adminRowClick(this,'tr310',310);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr311">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15458dba06b970limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15458dba06b970</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15458dba06b970duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15458dba06b970status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 26 Falcon Eyes W805</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15458dba06b970" onclick="adminRowClick(this,'tr311',311);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">04-11-2014 </td>
						<td class="aankoopbedrag">22 </td></tr>
<tr class="cellColor0" align="center" id="tr312">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15458db3fc1c58limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15458db3fc1c58</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15458db3fc1c58duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15458db3fc1c58status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 27 Falcon Eyes W805</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15458db3fc1c58" onclick="adminRowClick(this,'tr312',312);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">04-11-2014 </td>
						<td class="aankoopbedrag">22 </td></tr>
<tr class="cellColor1" align="center" id="tr313">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15458dbcf07bc0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15458dbcf07bc0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15458dbcf07bc0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15458dbcf07bc0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 28 Falcon Eyes W805</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15458dbcf07bc0" onclick="adminRowClick(this,'tr313',313);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">04-11-2014 </td>
						<td class="aankoopbedrag">22 </td></tr>
<tr class="cellColor0" align="center" id="tr314">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15458dc0d0971flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15458dc0d0971f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15458dc0d0971fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15458dc0d0971fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 29 Falcon Eyes W805</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15458dc0d0971f" onclick="adminRowClick(this,'tr314',314);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">04-11-2014 </td>
						<td class="aankoopbedrag">22 </td></tr>
<tr class="cellColor1" align="center" id="tr315">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15473481d9e5edlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15473481d9e5ed</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15473481d9e5edduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15473481d9e5edstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 30 Falcon Eyes Light Stand L-3900GA</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15473481d9e5ed" onclick="adminRowClick(this,'tr315',315);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-11-2014 </td>
						<td class="aankoopbedrag">60 </td></tr>
<tr class="cellColor0" align="center" id="tr316">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154734a44a5736limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154734a44a5736</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154734a44a5736duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154734a44a5736status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 31 Falcon Eyes Light Stand L-3900GA</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154734a44a5736" onclick="adminRowClick(this,'tr316',316);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-11-2014 </td>
						<td class="aankoopbedrag">60 </td></tr>
<tr class="cellColor1" align="center" id="tr317">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154734a5cc917blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154734a5cc917b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154734a5cc917bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154734a5cc917bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 32 Falcon Eyes Light Stand L-3900GA</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154734a5cc917b" onclick="adminRowClick(this,'tr317',317);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-11-2014 </td>
						<td class="aankoopbedrag">60 </td></tr>
<tr class="cellColor0" align="center" id="tr318">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154734a779611elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154734a779611e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154734a779611eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154734a779611estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp li 33 Falcon Eyes Light Stand L-3900GA</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">statief-adapter 16mm</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154734a779611e" onclick="adminRowClick(this,'tr318',318);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">24-11-2014 </td>
						<td class="aankoopbedrag">60 </td></tr>
<tr class="cellColor1" align="center" id="tr319">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524b87330fclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524b87330fc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524b87330fcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524b87330fcstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 09 Showtec MKII 70103</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">voor 28mm adapter</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524b87330fc" onclick="adminRowClick(this,'tr319',319);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">276 </td></tr>
<tr class="cellColor0" align="center" id="tr320">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524bae03211limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524bae03211</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524bae03211duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524bae03211status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 10 Showtec MKII 70103</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">voor 28mm adapter</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524bae03211" onclick="adminRowClick(this,'tr320',320);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">26-06-2017 </td>
						<td class="aankoopbedrag">276 </td></tr>
<tr class="cellColor1" align="center" id="tr321">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b926a93b3f3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b926a93b3f3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b926a93b3f3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b926a93b3f3status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 14 DSTTL</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Vlaklicht 14 DSTTL Studio 554</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b926a93b3f3" onclick="adminRowClick(this,'tr321',321);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 04-12-2014 onderdeel van set vlaklicht en statief</td>
						<td class="datum_aankoop">55 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr322">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b927221817elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b927221817e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b927221817eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b927221817estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 15 DSTTL</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Vlaklicht 15 DSTTL Studio 554</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b927221817e" onclick="adminRowClick(this,'tr322',322);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 04-12-2014 onderdeel van set vlaklicht en statief</td>
						<td class="datum_aankoop">55 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr323">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155ded9b3e80a1limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155ded9b3e80a1</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155ded9b3e80a1duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155ded9b3e80a1status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 16 DSTTL</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Vlaklicht 16 DSTTL Studio 554</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155ded9b3e80a1" onclick="adminRowClick(this,'tr323',323);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 04-12-2014 onderdeel van set vlaklicht en statief</td>
						<td class="datum_aankoop">55 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor0" align="center" id="tr324">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155ded9cc0e05elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155ded9cc0e05e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155ded9cc0e05eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155ded9cc0e05estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Statief Lamp zw 17 DSTTL</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">geen</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">Behorend bij Vlaklicht 17 DSTTL Studio 554</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155ded9cc0e05e" onclick="adminRowClick(this,'tr324',324);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 04-12-2014 onderdeel van set vlaklicht en statief</td>
						<td class="datum_aankoop">55 </td>
						<td class="aankoopbedrag">0 </td></tr>
<tr class="cellColor1" align="center" id="tr325">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15370d4ddc50f5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15370d4ddc50f5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15370d4ddc50f5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15370d4ddc50f5status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Speakers 03 KM</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Geschikt voor Speakersets 1, 2, 7 en 8 en voor Actieve speakers 1 t/m 6</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15370d4ddc50f5" onclick="adminRowClick(this,'tr325',325);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">80 </td></tr>
<tr class="cellColor0" align="center" id="tr326">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15370d53fddb7climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15370d53fddb7c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15370d53fddb7cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15370d53fddb7cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Speakers 04 KM</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Geschikt voor Speakersets 1, 2, 7 en 8 en voor Actieve speakers 1 t/m 6</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15370d53fddb7c" onclick="adminRowClick(this,'tr326',326);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">80 </td></tr>
<tr class="cellColor1" align="center" id="tr327">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157ea36eadac87limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157ea36eadac87</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157ea36eadac87duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157ea36eadac87status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Speakers 05 Innox Studio Monito Stand MON-01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Geschikt voor Actieve Speakers Yamaha 11-14</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157ea36eadac87" onclick="adminRowClick(this,'tr327',327);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">30 </td></tr>
<tr class="cellColor0" align="center" id="tr328">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158340ee5f3874limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158340ee5f3874</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158340ee5f3874duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158340ee5f3874status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Speakers 06 Innox Studio Monito Stand MON-01</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">Geschikt voor Actieve Speakers Yamaha 11-14</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158340ee5f3874" onclick="adminRowClick(this,'tr328',328);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop"> </td>
						<td class="aankoopbedrag">30 </td></tr>
<tr class="cellColor1" align="center" id="tr331">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564af82111327limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564af82111327</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564af82111327duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564af82111327status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 11 Sachtler 1002 System ACE M GS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S2150M15034469</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564af82111327" onclick="adminRowClick(this,'tr331',331);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 24-10-2016 adapter plate zit vast, verkeerd om...
25-10-2016 gerepareerd</td>
						<td class="datum_aankoop">01-11-2015 </td>
						<td class="aankoopbedrag">715 </td></tr>
<tr class="cellColor0" align="center" id="tr332">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564b3a22ab3fflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564b3a22ab3ff</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564b3a22ab3ffduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564b3a22ab3ffstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 12 Sachtler 1002 System ACE M GS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S2150M15034458</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564b3a22ab3ff" onclick="adminRowClick(this,'tr332',332);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">01-11-2015 </td>
						<td class="aankoopbedrag">715 </td></tr>
<tr class="cellColor1" align="center" id="tr333">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1564de8a865aablimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1564de8a865aab</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1564de8a865aabduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1564de8a865aabstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 13 Sachtler 1002 System ACE M GS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">S2150M15034449</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1564de8a865aab" onclick="adminRowClick(this,'tr333',333);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 23-5-2017 adapter verkeerd om geplaatst. Kop moet gedemonteerd worden
8-9-2017 gedaan</td>
						<td class="datum_aankoop">01-11-2015 </td>
						<td class="aankoopbedrag">715 </td></tr>
<tr class="cellColor0" align="center" id="tr334">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15492e02e4d8eflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15492e02e4d8ef</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15492e02e4d8efduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15492e02e4d8efstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 16 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046114</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15492e02e4d8ef" onclick="adminRowClick(this,'tr334',334);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 30-10-2015 vervuilde kop, wachten op verklaring gebruiker en vervolg
6-11-2015 waarschijnlijk niet meer dan schilfers droge verf. Door gebruikers schoongemaakt
18-9-2017 adapterplate verkeerd om (zelf gedaan :-( ) Bleek flink wat vuil/zand in de houder. Schoon gemaakt.</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor1" align="center" id="tr335">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b91b7f04517limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b91b7f04517</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b91b7f04517duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b91b7f04517status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 17 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046112</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b91b7f04517" onclick="adminRowClick(this,'tr335',335);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 22-11-2016, zwaar vervuild met fijn stof. ook tussen draaiende delen
19-12-2016 kop professioneel schoongemaakt, statief zelf gereinigd,</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor0" align="center" id="tr336">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b91dd3c2fdflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b91dd3c2fdf</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b91dd3c2fdfduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b91dd3c2fdfstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 18 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046119</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b91dd3c2fdf" onclick="adminRowClick(this,'tr336',336);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor1" align="center" id="tr337">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154dcc34b0fca4limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154dcc34b0fca4</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154dcc34b0fca4duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154dcc34b0fca4status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 19 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046113</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154dcc34b0fca4" onclick="adminRowClick(this,'tr337',337);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor0" align="center" id="tr338">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1552398281b824limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1552398281b824</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1552398281b824duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1552398281b824status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 20 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046118</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1552398281b824" onclick="adminRowClick(this,'tr338',338);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor1" align="center" id="tr339">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1552bb68b5f22climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1552bb68b5f22c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1552bb68b5f22cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1552bb68b5f22cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 21 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046115</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1552bb68b5f22c" onclick="adminRowClick(this,'tr339',339);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor0" align="center" id="tr340">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1552bb6b70162flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1552bb6b70162f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1552bb6b70162fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1552bb6b70162fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 22 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046117</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1552bb6b70162f" onclick="adminRowClick(this,'tr340',340);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor1" align="center" id="tr341">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c248055d2f9limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c248055d2f9</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c248055d2f9duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c248055d2f9status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 23 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046120</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c248055d2f9" onclick="adminRowClick(this,'tr341',341);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> 21-11-2016 kop vol zand,
19-12-2016 kop professioneel schoongemaakt, statief zelf gereinigd,</td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor0" align="center" id="tr342">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c2454621201limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c2454621201</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c2454621201duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c2454621201status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Statief Video 24 Sachtler 1001 System ACE M MS</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">046116</td>
<td class="package" style="text-align:left">foudraal</td>
<td class="description" style="text-align:left"></td>
<td class="notes" style="text-align:left">ACE Tripod, ACE mid-level spreader</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c2454621201" onclick="adminRowClick(this,'tr342',342);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">21-04-2016 </td>
						<td class="aankoopbedrag">855 </td></tr>
<tr class="cellColor1" align="center" id="tr351">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559677055ba86limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559677055ba86</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559677055ba86duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559677055ba86status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 01 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LREHTSG300173</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559677055ba86" onclick="adminRowClick(this,'tr351',351);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400719ASE38G1DY2ZX</td>
						<td class="datum_aankoop">24-06-2015 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor0" align="center" id="tr352">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15596770bef5d6limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15596770bef5d6</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15596770bef5d6duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15596770bef5d6status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 02 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LREHTSG300159</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15596770bef5d6" onclick="adminRowClick(this,'tr352',352);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400719ASE38G1DY30T</td>
						<td class="datum_aankoop">24-06-2014 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor1" align="center" id="tr353">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15760073dd7da6limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15760073dd7da6</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15760073dd7da6duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15760073dd7da6status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 03 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LQHHTSFB00041B</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15760073dd7da6" onclick="adminRowClick(this,'tr353',353);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400719ASE38FBFY4QT</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor1" align="center" id="tr355">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1576007f81c5a7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1576007f81c5a7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1576007f81c5a7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1576007f81c5a7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 04 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LREHTSGC02345J</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1576007f81c5a7" onclick="adminRowClick(this,'tr355',355);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400797ASK28GCET015</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor0" align="center" id="tr356">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158d3ced24c892limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158d3ced24c892</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158d3ced24c892duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158d3ced24c892status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 05 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LQHHTSFB00610R</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158d3ced24c892" onclick="adminRowClick(this,'tr356',356);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400797ASK28GCET015</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor1" align="center" id="tr357">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159562053e5cf7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159562053e5cf7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159562053e5cf7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159562053e5cf7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 06 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LQHHTSFB00633K</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159562053e5cf7" onclick="adminRowClick(this,'tr357',357);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400797ASK28GCET015</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor0" align="center" id="tr358">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595b690c755a6limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595b690c755a6</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595b690c755a6duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595b690c755a6status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 07 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LQHHTSFB00568A</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595b690c755a6" onclick="adminRowClick(this,'tr358',358);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400797ASK28GCET015</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor1" align="center" id="tr359">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595b6bf34dc31limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595b6bf34dc31</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595b6bf34dc31duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595b6bf34dc31status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/10+ 08 LED Samsung DB10D</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0LQHHTSFB00816R</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">10" professional display. Audio: internal speaker. Connection for audio-out only fit for special protocol, not for headphones or line-out</td>
<td class="notes" style="text-align:left">HDMI, USB, LAN, min-jack-in</td>
<td class="accesoires" style="text-align:left">Power supply A2514_DSM, power cord, remote control; (optional: RS232C-stereo cable; stand bar)</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595b6bf34dc31" onclick="adminRowClick(this,'tr359',359);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Afstandsbediening type: BN59-01180A
Net adapter type: Samsung A2514_DSM; DC14V - 1,786A; Sn CN07BN4400797ASK28GCET015</td>
						<td class="datum_aankoop">01-06-2016 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor0" align="center" id="tr360">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153fb232d2c1c8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153fb232d2c1c8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153fb232d2c1c8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153fb232d2c1c8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 09 LED Samsung UE19H4000-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C08E3HJF600015K</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153fb232d2c1c8" onclick="adminRowClick(this,'tr360',360);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;
18-09-2015: vh TV/Monitor LED 37 Samsung UE19H4000</td>
						<td class="datum_aankoop">26-06-2014 </td>
						<td class="aankoopbedrag">181 </td></tr>
<tr class="cellColor1" align="center" id="tr361">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ac10b8317c0limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ac10b8317c0</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ac10b8317c0duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ac10b8317c0status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 10 LED Samsung UE19H4000</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C08E3HJF600321L</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ac10b8317c0" onclick="adminRowClick(this,'tr361',361);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;
18-09-2015: vh TV/Monitor LED 68 Samsung UE19H4000</td>
						<td class="datum_aankoop">26-06-2014 </td>
						<td class="aankoopbedrag">181 </td></tr>
<tr class="cellColor0" align="center" id="tr362">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ad29969e207limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ad29969e207</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ad29969e207duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ad29969e207status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 11 LED Samsung UE19H4000</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C08E3HJF600319D</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ad29969e207" onclick="adminRowClick(this,'tr362',362);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;
18-09-2015: vh TV/Monitor LED 64 Samsung UE19H4000</td>
						<td class="datum_aankoop">26-06-2014 </td>
						<td class="aankoopbedrag">181 </td></tr>
<tr class="cellColor1" align="center" id="tr363">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ad2af1e1c0elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ad2af1e1c0e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ad2af1e1c0eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ad2af1e1c0estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 12 LED Samsung UE19H4000</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C08E3HJF600330Z</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ad2af1e1c0e" onclick="adminRowClick(this,'tr363',363);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;
18-09-2015: vh TV/Monitor LED 65 Samsung UE19H4000</td>
						<td class="datum_aankoop">26-06-2014 </td>
						<td class="aankoopbedrag">181 </td></tr>
<tr class="cellColor0" align="center" id="tr364">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk153ad2b6d555edlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk153ad2b6d555ed</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk153ad2b6d555edduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk153ad2b6d555edstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 13 LED Samsung UE19H4000</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C08E3HJF600006V</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk153ad2b6d555ed" onclick="adminRowClick(this,'tr364',364);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;
18-09-2015: vh TV/Monitor LED 66 Samsung UE19H4000</td>
						<td class="datum_aankoop">26-06-2014 </td>
						<td class="aankoopbedrag">181 </td></tr>
<tr class="cellColor1" align="center" id="tr365">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15774e3b0db44elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15774e3b0db44e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15774e3b0db44eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15774e3b0db44estatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 18 LED Samsung UE19H4000AWXXN-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">062934HH400056E</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15774e3b0db44e" onclick="adminRowClick(this,'tr365',365);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">217 </td></tr>
<tr class="cellColor0" align="center" id="tr366">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk157750d8618728limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk157750d8618728</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk157750d8618728duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk157750d8618728status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 19 LED Samsung UE19H4000AWXXN-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">062934HH400081H</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk157750d8618728" onclick="adminRowClick(this,'tr366',366);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">217 </td></tr>
<tr class="cellColor1" align="center" id="tr367">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15784a8982e6b8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15784a8982e6b8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15784a8982e6b8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15784a8982e6b8status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 20 LED Samsung UE19H4000AWXXN</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">062934HH400062</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15784a8982e6b8" onclick="adminRowClick(this,'tr367',367);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">217 </td></tr>
<tr class="cellColor0" align="center" id="tr368">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15784a91df2b58limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15784a91df2b58</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15784a91df2b58duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15784a91df2b58status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/19+ 21 LED Samsung UE19H4000AWXXN</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">062934HH400064</td>
<td class="package" style="text-align:left"></td>
<td class="description" style="text-align:left">19" LED TV</td>
<td class="notes" style="text-align:left">2X HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI; 
audio out: Optical, (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">los netsnoer</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15784a91df2b58" onclick="adminRowClick(this,'tr368',368);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A;</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">217 </td></tr>
<tr class="cellColor1" align="center" id="tr369">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155912851cee4flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155912851cee4f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155912851cee4fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155912851cee4fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 23 LED Samsung LT27D390EW-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0400H4MG400529</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer, losse voet; Wandsteun LCD-scherm 23-32" EWF 6205</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155912851cee4f" onclick="adminRowClick(this,'tr369',369);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">315 </td></tr>
<tr class="cellColor0" align="center" id="tr370">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bcb265ca21limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bcb265ca21</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bcb265ca21duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bcb265ca21status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 24 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500584J</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bcb265ca21" onclick="adminRowClick(this,'tr370',370);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor1" align="center" id="tr371">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bcb447606dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bcb447606d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bcb447606dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bcb447606dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 25 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500672</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, (USB-poort defect); 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bcb447606d" onclick="adminRowClick(this,'tr371',371);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type
22-5-2017 'lipje' USB aansluiting losgeraakt. USB poort defect
8-6-2017 provisorische doch nette en bruikbare reparatie door Kees!</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor0" align="center" id="tr372">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155912c9331aaclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155912c9331aac</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155912c9331aacduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155912c9331aacstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 26 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0405H4MG400425</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC Adapter Model A4514_DSM; los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155912c9331aac" onclick="adminRowClick(this,'tr372',372);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01189A</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor1" align="center" id="tr373">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk155912ec682f70limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk155912ec682f70</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk155912ec682f70duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk155912ec682f70status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 27 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0405H4MG400365</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk155912ec682f70" onclick="adminRowClick(this,'tr373',373);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor0" align="center" id="tr374">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bc56723c07limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bc56723c07</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bc56723c07duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bc56723c07status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 28 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500569</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bc56723c07" onclick="adminRowClick(this,'tr374',374);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01189A</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor1" align="center" id="tr375">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bc5f823046limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bc5f823046</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bc5f823046duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bc5f823046status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 29 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500566</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bc5f823046" onclick="adminRowClick(this,'tr375',375);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor0" align="center" id="tr376">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bc98dccb2alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bc98dccb2a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bc98dccb2aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bc98dccb2astatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 30 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500582</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bc98dccb2a" onclick="adminRowClick(this,'tr376',376);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor1" align="center" id="tr377">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bc9d970694limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bc9d970694</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bc9d970694duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bc9d970694status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 31 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500787</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bc9d970694" onclick="adminRowClick(this,'tr377',377);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor0" align="center" id="tr378">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bca558817elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bca558817e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bca558817eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bca558817estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 32 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500790</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bca558817e" onclick="adminRowClick(this,'tr378',378);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor1" align="center" id="tr379">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1559bcad6178aflimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1559bcad6178af</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1559bcad6178afduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1559bcad6178afstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/26+ 33 LED Samsung LT27D590EW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">C06XHHMF500586</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">27" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">AC/DC adapter Model A4514_DSM, los netsnoer</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1559bcad6178af" onclick="adminRowClick(this,'tr379',379);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type</td>
						<td class="datum_aankoop">27-06-2015 </td>
						<td class="aankoopbedrag">340 </td></tr>
<tr class="cellColor0" align="center" id="tr380">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15952231ed30d7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15952231ed30d7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15952231ed30d7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15952231ed30d7status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/30+ 01 LED Samsung UE32J5100AW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0CTT3HEHC00101Z</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15952231ed30d7" onclick="adminRowClick(this,'tr380',380);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">330 </td></tr>
<tr class="cellColor1" align="center" id="tr381">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159522a38032e5limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159522a38032e5</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159522a38032e5duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159522a38032e5status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/30+ 02 LED Samsung UE32J5100AW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0CTT3HEHC00019P</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159522a38032e5" onclick="adminRowClick(this,'tr381',381);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">330 </td></tr>
<tr class="cellColor0" align="center" id="tr382">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159522ffa671b1limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159522ffa671b1</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159522ffa671b1duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159522ffa671b1status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/30+ 03 LED Samsung UE32J5100AW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0CTT3HEHC00097B</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159522ffa671b1" onclick="adminRowClick(this,'tr382',382);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">330 </td></tr>
<tr class="cellColor1" align="center" id="tr383">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1595243446b2f8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1595243446b2f8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1595243446b2f8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1595243446b2f8status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/30+ 04 LED Samsung UE32J5100AW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0CTT3HEHC00018X</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1595243446b2f8" onclick="adminRowClick(this,'tr383',383);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">330 </td></tr>
<tr class="cellColor0" align="center" id="tr384">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk159524354e9ddclimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk159524354e9ddc</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk159524354e9ddcduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk159524354e9ddcstatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/30+ 05 LED Samsung UE32J5100AW</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0CTT3HEHC00097B</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">32" HD LED TV</td>
<td class="notes" style="text-align:left">2x HDMI, Scart, USB; 
video: Component/video in (green!), VGA; 
audio in: RCA-stereo, PC/DVI, Optical; 
audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk159524354e9ddc" onclick="adminRowClick(this,'tr384',384);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type AA59-00741A</td>
						<td class="datum_aankoop">27-06-2017 </td>
						<td class="aankoopbedrag">330 </td></tr>
<tr class="cellColor1" align="center" id="tr385">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558bbb47eab9dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558bbb47eab9d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558bbb47eab9dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558bbb47eab9dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 26 LED Samsung UE48HU7500L-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">H0XF3SGG201576</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558bbb47eab9d" onclick="adminRowClick(this,'tr385',385);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01175N
vh TV/Monitor 24 LED Samsung UE48HU7500L; 12-2-2016 vh TV/Monitor/46+ 06 LED Samsung UE48HU7500L</td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">1425 </td></tr>
<tr class="cellColor0" align="center" id="tr386">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558bedb57e924limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558bedb57e924</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558bedb57e924duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558bedb57e924status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 27 LED Samsung UE48HU7500L</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">H0XF3SIG600132</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558bedb57e924" onclick="adminRowClick(this,'tr386',386);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01175N
sept 2015 vh TV/Monitor 25 LED Samsung UE48HU7500L; 12-2-2016 vh TV/Monitor/46+ 07 LED Samsung UE48HU7500L</td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">1425 </td></tr>
<tr class="cellColor1" align="center" id="tr387">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558bf546339e7limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558bf546339e7</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558bf546339e7duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558bf546339e7status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 28 LED Samsung UE48HU7500L-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">H0XF3SIG600133</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558bf546339e7" onclick="adminRowClick(this,'tr387',387);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01175N
TV/Monitor 26 LED Samsung UE48HU7500L; 12-2-2016 vh TV/Monitor/46+ 08 LED Samsung UE48HU7500L</td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">1425 </td></tr>
<tr class="cellColor0" align="center" id="tr388">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558bf6198f2c6limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558bf6198f2c6</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558bf6198f2c6duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558bf6198f2c6status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 29 LED Samsung UE48HU7500L-z</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">H0XF3SGG201577</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558bf6198f2c6" onclick="adminRowClick(this,'tr388',388);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01175N
TV/Monitor 27 LED Samsung UE48HU7500L; 12-2-2016 vh TV/Monitor/46+ 09 LED Samsung UE48HU7500L</td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">1425 </td></tr>
<tr class="cellColor1" align="center" id="tr389">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1558bf97d75c7dlimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1558bf97d75c7d</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1558bf97d75c7dduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1558bf97d75c7dstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 30 LED Samsung UE48HU7500L</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">H0XF3SIG600131</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1558bf97d75c7d" onclick="adminRowClick(this,'tr389',389);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01175N
24-09-2015: vh TV/Monitor 28 LED Samsung UE48HU7500L
01-02-2016 met lichte schade terug van Open Dag; 15-2-2016 vh TV/Monitor/46+ 10 LED Samsung UE48HU7500L</td>
						<td class="datum_aankoop">25-06-2015 </td>
						<td class="aankoopbedrag">1425 </td></tr>
<tr class="cellColor0" align="center" id="tr390">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15774d4ade1600limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15774d4ade1600</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15774d4ade1600duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15774d4ade1600status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 32 LED Samsung UE48JU6445WXXN-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0BYT3HIH400001</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15774d4ade1600" onclick="adminRowClick(this,'tr390',390);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01198Q</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">797 </td></tr>
<tr class="cellColor1" align="center" id="tr391">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15774d4d8288f8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15774d4d8288f8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15774d4d8288f8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15774d4d8288f8status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 33 LED Samsung UE48JU6445WXXN-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0BYT3HIH400003</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left">Wandsteun LCD-scherm 32-55" Thin 305</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15774d4d8288f8" onclick="adminRowClick(this,'tr391',391);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01198Q</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">797 </td></tr>
<tr class="cellColor0" align="center" id="tr392">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15774d5671545flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15774d5671545f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15774d5671545fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15774d5671545fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 34 LED Samsung UE48JU6445WXXN-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0BYT3HIH400014</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15774d5671545f" onclick="adminRowClick(this,'tr392',392);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01198Q</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">797 </td></tr>
<tr class="cellColor1" align="center" id="tr393">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15774d5fbe15felimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15774d5fbe15fe</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15774d5fbe15feduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15774d5fbe15festatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">TV/Monitor/40+ 35 LED Samsung UE48JU6445WXXN-w</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">0BYT3HIH400013</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">48" UHD LED TV</td>
<td class="notes" style="text-align:left">3x HDMI,2x USB; video: Component/video in (green!), VGA; audio in: RCA-stereo, PC/DVI, Optical; audio out (headphones): mini-jack</td>
<td class="accesoires" style="text-align:left"></td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15774d5fbe15fe" onclick="adminRowClick(this,'tr393',393);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> afstandsbediening type BN59-01198Q</td>
						<td class="datum_aankoop">29-06-2016 </td>
						<td class="aankoopbedrag">797 </td></tr>
<tr class="cellColor0" align="center" id="tr394">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15763b7c424694limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15763b7c424694</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15763b7c424694duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15763b7c424694status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">USB-Audio interface 01 Focusrite Scarlet 2i2 (2nd gen)</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">V466074006877</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2-in/2-out USB interface</td>
<td class="notes" style="text-align:left">2x XLR/Jack in, 2x jack out</td>
<td class="accesoires" style="text-align:left">USB apparaat kabel</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15763b7c424694" onclick="adminRowClick(this,'tr394',394);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">16-6-2016 </td>
						<td class="aankoopbedrag">149 </td></tr>
<tr class="cellColor1" align="center" id="tr395">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15763b8264cb15limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15763b8264cb15</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15763b8264cb15duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15763b8264cb15status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">USB-Audio interface 02 Focusrite Scarlet 2i2 (2nd gen)</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">V466074006714</td>
<td class="package" style="text-align:left">originele doos</td>
<td class="description" style="text-align:left">2-in/2-out USB interface</td>
<td class="notes" style="text-align:left">2x XLR/Jack in, 2x jack out</td>
<td class="accesoires" style="text-align:left">USB apparaat kabel</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15763b8264cb15" onclick="adminRowClick(this,'tr395',395);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">16-6-2016 </td>
						<td class="aankoopbedrag">149 </td></tr>
<tr class="cellColor0" align="center" id="tr396">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15763eeb655b9climit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15763eeb655b9c</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15763eeb655b9cduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15763eeb655b9cstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">USB-Microfoon 02 Blue Snowball</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">120626</td>
<td class="package" style="text-align:left">Stagg case SCF-241815</td>
<td class="description" style="text-align:left">Cardioid / Omnidirectional USB microfoon</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">tafelstatief, USB-kabel</td>
<td class="uitleennivo" style="text-align:left">1</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15763eeb655b9c" onclick="adminRowClick(this,'tr396',396);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> </td>
						<td class="datum_aankoop">16-06-2016 </td>
						<td class="aankoopbedrag">89 </td></tr>
<tr class="cellColor0" align="center" id="tr402">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk156ebfe1db79b3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk156ebfe1db79b3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk156ebfe1db79b3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk156ebfe1db79b3status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">vh HD camcorder 03 Canon Legria HF G40</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">033122000253</td>
<td class="package" style="text-align:left">Storm Case iM2300</td>
<td class="description" style="text-align:left">HD Camcorder; Canon HD video lens; 3.67-73.4mm; 1:1.8 ?58; 20x optische zoom</td>
<td class="notes" style="text-align:left">no internal memory; Manual (EN); USB, HDMI-out; Do not leave material on the SD Card, capture and delete!</td>
<td class="accesoires" style="text-align:left">2x 64 GB SDXC Card Lexar Pro 633x, 95 MB/s; remote control, 2 batteries, A/V-kabel, USB-cable, Battery charger CG-800</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk156ebfe1db79b3" onclick="adminRowClick(this,'tr402',402);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu's BP-820, BP-828; SD card: SanDisk 32GB SDHC UHS-I class 10;
10-11 sept 2017 vermist na inbraak</td>
						<td class="datum_aankoop">18-03-2016 </td>
						<td class="aankoopbedrag">1720 </td></tr>
<tr class="cellColor0" align="center" id="tr410">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158777fd2f1163limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158777fd2f1163</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158777fd2f1163duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158777fd2f1163status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 01 CFL Siem FL220W04DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 01 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158777fd2f1163" onclick="adminRowClick(this,'tr410',410);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">470 </td></tr>
<tr class="cellColor0" align="center" id="tr412">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158789c1be2316limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158789c1be2316</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158789c1be2316duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158789c1be2316status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 02 CFL Siem FL220W04DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 02 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158789c1be2316" onclick="adminRowClick(this,'tr412',412);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">470 </td></tr>
<tr class="cellColor0" align="center" id="tr414">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158789c51787b3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158789c51787b3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158789c51787b3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158789c51787b3status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 03 CFL Siem FL220W04DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 03 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158789c51787b3" onclick="adminRowClick(this,'tr414',414);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">470 </td></tr>
<tr class="cellColor0" align="center" id="tr416">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158789c77cac1blimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158789c77cac1b</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158789c77cac1bduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158789c77cac1bstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 04 CFL Siem FL220W04DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 04 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158789c77cac1b" onclick="adminRowClick(this,'tr416',416);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">470 </td></tr>
<tr class="cellColor1" align="center" id="tr417">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154880725c5ebblimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154880725c5ebb</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154880725c5ebbduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154880725c5ebbstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 14 CFL DSTTL Studio 554 + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp zw 14 DSTTL; statief-adapter 28mm; power cable euro; Statief Lamp zw 14 DSTTL;</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154880725c5ebb" onclick="adminRowClick(this,'tr417',417);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram Studioline 954 5400K 55W</td>
						<td class="datum_aankoop">04-12-2014 </td>
						<td class="aankoopbedrag">485 </td></tr>
<tr class="cellColor0" align="center" id="tr418">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154b92232f2d7flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154b92232f2d7f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154b92232f2d7fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154b92232f2d7fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 15 CFL DSTTL Studio 554 + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K;</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp zw 15 DSTTL; statief-adapter 28mm; power cable euro; Statief Lamp zw 15 DSTTL;</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154b92232f2d7f" onclick="adminRowClick(this,'tr418',418);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">04-12-2015 </td>
						<td class="aankoopbedrag">500 </td></tr>
<tr class="cellColor1" align="center" id="tr419">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c24c87ac48flimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c24c87ac48f</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c24c87ac48fduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c24c87ac48fstatus=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 16 CFL DSTTL Studio 554 + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K;</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp zw 16 DSTTL; statief-adapter 28mm; power cable euro; Statief Lamp zw 16 DSTTL;</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c24c87ac48f" onclick="adminRowClick(this,'tr419',419);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">04-12-2015 </td>
						<td class="aankoopbedrag">500 </td></tr>
<tr class="cellColor0" align="center" id="tr420">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk154c24cae25c36limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk154c24cae25c36</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk154c24cae25c36duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk154c24cae25c36status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 17 CFL DSTTL Studio 554 + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K;</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp zw 17 DSTTL; statief-adapter 28mm; power cable euro; Statief Lamp zw 17 DSTTL;</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk154c24cae25c36" onclick="adminRowClick(this,'tr420',420);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 4x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">04-12-2015 </td>
						<td class="aankoopbedrag">500 </td></tr>
<tr class="cellColor1" align="center" id="tr421">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk1587df836c7950limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk1587df836c7950</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk1587df836c7950duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk1587df836c7950status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 18 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk1587df836c7950" onclick="adminRowClick(this,'tr421',421);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor0" align="center" id="tr422">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158a57a0594504limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158a57a0594504</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158a57a0594504duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158a57a0594504status=a">YesActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 19 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Cool white light; 4 CFL tubes 55W; color temp. 5400K, dimmer/DMX</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158a57a0594504" onclick="adminRowClick(this,'tr422',422);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/954 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor1" align="center" id="tr423">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158c131b4593b3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158c131b4593b3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158c131b4593b3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158c131b4593b3status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 20 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Warm white light; 2 CFL tubes 55W; color temp. 3000K</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158c131b4593b3" onclick="adminRowClick(this,'tr423',423);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/930 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor0" align="center" id="tr424">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158c13218a6de3limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158c13218a6de3</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158c13218a6de3duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158c13218a6de3status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 21 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Warm white light; 2 CFL tubes 55W; color temp. 3000K</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158c13218a6de3" onclick="adminRowClick(this,'tr424',424);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/930 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor1" align="center" id="tr425">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158c132308144elimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158c132308144e</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158c132308144eduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158c132308144estatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 22 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Warm white light; 2 CFL tubes 55W; color temp. 3000K</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158c132308144e" onclick="adminRowClick(this,'tr425',425);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/930 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor0" align="center" id="tr426">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk158c132d29605alimit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk158c132d29605a</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk158c132d29605aduplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk158c132d29605astatus=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">Vlaklicht 23 CFL SIEM FL110W02DMX + statief</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left"></td>
<td class="package" style="text-align:left">tas</td>
<td class="description" style="text-align:left">Warm white light; 2 CFL tubes 55W; color temp. 3000K</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">Statief Lamp 18 Siem AL 280 custom; power cable euro; available: softlight filter</td>
<td class="uitleennivo" style="text-align:left">2</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk158c132d29605a" onclick="adminRowClick(this,'tr426',426);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> lamp: 2x Osram DULUX L 55 W/930 2G11</td>
						<td class="datum_aankoop">10-01-2017 </td>
						<td class="aankoopbedrag">385 </td></tr>
<tr class="cellColor1" align="center" id="tr451">
<td class="edit"><a href="/schedulenew/www/admin.php?tool=resourcesmachid=pk15523ec878c4d8limit=10000"><span class="ss_sprite ss_database_edit "> &nbsp; </span></a>
</td>
<td class="barcode" style="text-align:left">pk15523ec878c4d8</td>
<td class="duplicate"><a href="admin_update.php?fn=dupResourcemachid=pk15523ec878c4d8duplicate=yes">Duplicate</a>
</td>
<td class="status"><a href="admin_update.php?fn=togResourcemachid=pk15523ec878c4d8status=u">NoActive</a>
 </td>
<td class="name" style="text-align:left">___TEST ARTIKEL</td>
<td class="schedule" style="text-align:left;display:none">Uitleen 2.42</td>
<td class="serial" style="text-align:left">1210482</td>
<td class="package" style="text-align:left">Storm Case iM2720</td>
<td class="description" style="text-align:left">4K / HD - XAVC Camcorder; G lens 1,6/4,1-82 mm, Ø72mm; 20x optical zoom</td>
<td class="notes" style="text-align:left"></td>
<td class="accesoires" style="text-align:left">1x battery Sony NP-F970, ECM-XM1 microphone with wind-shield; 3x Sony 128GB/400MB/s XQD cards, USB card reader; HDMI-cable, USB-cable, USB extension-cable; AC adaptor/charger AC-VL1, AC-NB12A Poweradapter; 2x powercable euro; Manual</td>
<td class="uitleennivo" style="text-align:left">3</td>
<td class="owner" style="text-align:left">GRA</td>
<td class="uitleenperiode" style="text-align:left">1</td>
<td class="checkbox"><input type="checkbox" name="machid[]" value="pk15523ec878c4d8" onclick="adminRowClick(this,'tr451',451);"></td>
<td class="delete" style="text-align:left"><input type="submit" name="submit" value="Delete" class="button">
<input type="hidden" name="get" value="machid">
<input type="hidden" name="fn" value="delResource">
</td>
      	<td class="maintenance"> Accu: Sony NP-F970</td>
						<td class="datum_aankoop">05-01-2015 </td>
						<td class="aankoopbedrag">25 </td></tr>
					<!-- janr search -->
				</tbody>
      </table>
<?php

}
?>
