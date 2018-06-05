<?php
/**
* 
* RUN ONCE,  DATACONVERSIE
* @author jan rodenburg - larka
* april 2015

doel:
waardecat bepalen aan de hand van aankoopprijs:
situatie nu:
categorie 1 voor aanschafwaarde tot €250 (default)
wordt:
categorie 0 voor aanschafwaarde tot € 50,—
categorie 1 voor aanschafwaarde tot van €50 - €250  (default)
categorie 2 €250 - 1500
categorie 3 groter dan 1500

velden nodig:
waardecat
aankoopbedrag

*/
print "start";
ini_set('default_charset','utf-8');
header('Content-Type: text/plain; charset=utf-8');
$basedir = dirname(__FILE__) . '/..';
error_reporting(E_ALL);
require_once($basedir . '/web/sites/rietveldacademie.nl/uitleen/www/schedule/lib/DBengine.class.php');
require_once($basedir . '/web/sites/rietveldacademie.nl/uitleen/www/schedule/lib/AdditionalResource.class.php');

global $conf;
$db = new DBengine();




/*
situatieS 
*/
$sql1 = 'SELECT * FROM  `db01_resources`';
// $sql2 = "INSERT INTO `larkadev_nl`.`db01_additional_resources` (`machid`, `scheduleid`, `name`, `status`, `number_available`) VALUES (\'VELD1\', \'schedid\', \'name\', \'a\', \'1\');";

		$result = mysql_query ($sql1) or die(mysql_error().' mislukt') ;
		while ($row=mysql_fetch_assoc($result)) {
			$oudwaardecat = $row[waardecat];
			$waardecat = $row[waardecat];
			if ($row[aankoopbedrag] <= 50 && $row[aankoopbedrag] <> 0) {$waardecat = 0;}			
			if ($row[aankoopbedrag] == 0) {$waardecat = 1;print "<br>defaultset<br>";} // default, bij geen bedrag ingevuld
			if ($row[aankoopbedrag] > 50 && $row[aankoopbedrag] <= 250) {$waardecat = 1;}
			if ($row[aankoopbedrag] > 250 && $row[aankoopbedrag] <= 1500) {$waardecat = 2;}
			if ($row[aankoopbedrag] > 1500) {$waardecat = 3;}
				
			print $row[scheduleid]." ".$row[name]." ".$row[uitleennivo]." ".$row[aankoopbedrag]." ".$row[waardecat];
			print "<br>";
			if ($waardecat <> $oudwaardecat) {
				update_into_resource ($row[machid],$waardecat);
				print  "<b>updated:".$row[machid]." ".$row[aankoopbedrag]." ".$waardecat."</b>" ;
			}
				
		}
	echo ('Finished! <br>');


function update_into_resource ($id,$waardecat)  {


		$sql2='UPDATE `gra_uitleen`.`db01_resources` SET waardecat="'.$waardecat.'" WHERE machid= "'.$id.'"';
	
	print $sql2;
	
	print "<br>";
	$result = mysql_query ($sql2) or die(__FILE__.__FUNCTION__.': '.mysql_error().' query error happened') ;
	
}
