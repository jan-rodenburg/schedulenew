<?php
/**
* 
* RUN ONCE,  DATACONVERSIE
* @author jan rodenburg - larka

doel:
x	=	numbers_available 
omzetten naar  x records met 1 available.
reden: wens om bepaald accessoire meer exemplaren mee te geven op 1 lening

*/
ini_set('default_charset','utf-8');
header('Content-Type: text/plain; charset=utf-8');
$basedir = dirname(__FILE__) . '/..';

require_once($basedir . '/lib/DBengine.class.php');
require_once($basedir . '/lib/AdditionalResource.class.php');

global $conf;
$db = new DBengine();


//get_infile ($additional_resources_helper);
$random = mt_rand();

// $filein ='db01_additional_resources_helper';
// $fileout = 'db01_additional_resources';
/**

/*
situatieS 
*/
$sql1 = 'SELECT * FROM  `db01_additional_resources_helper`';
// $sql2 = "INSERT INTO `larkadev_nl`.`db01_additional_resources` (`resourceid`, `scheduleid`, `name`, `status`, `number_available`) VALUES (\'VELD1\', \'schedid\', \'name\', \'a\', \'1\');";

		$result = mysql_query ($sql1) or die(mysql_error().' mislukt') ;
		while ($row=mysql_fetch_assoc($result)) {
		//	var_dump ($row);
		//	print $row["number_available"];
		//	insert_into_scheduleuser ($row); 
			for ($i = 1; $i <= $row['number_available']; $i++) {
				insert_into_scheduleuser ($row,$i);
				}
			print "<br>";
				
		}
	echo ('Finished! <br>');


function insert_into_scheduleuser ($row,$counter)  {

			$aresource = new AdditionalResource();
			$aresource->id = $aresource->db->get_new_id();
			$aresource->is_created = false;
	$number_available=1;
	$sql2 = 'INSERT INTO `larkadev_nl`.`db01_additional_resources` (`resourceid`, `scheduleid`, `name`, `status`, `number_available`) 
	VALUES ("'.$aresource->id.'","'.$row['scheduleid'].'","'.$row['name'].'","'.$row['status'].'","'.$number_available.'");';
	
	print  $counter.'  '.$row['number_available'].'  '.$aresource->id;
	print "<br>";
	$result = mysql_query ($sql2) or die(__FILE__.__FUNCTION__.': '.mysql_error().' query error happened') ;
	
}
