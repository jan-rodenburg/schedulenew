<?php
/**
november 2014
voor studenten voor een leenpermissie toegevoegd:
 	leenpermissie 	tinyint(2) 			1 // welke waarde *
	mutbyadmin 		tinyint(1) 			0 // default, wordet niet gebruikt

⦁	VOBJ, DZBJ, VOOROP en ORC krijgt als default permissie 		1 
⦁	overige VO en DZ en medewerker krijgt als default permissie 2 
⦁	T (TAUT,TVRIJ,TMIA) krijgt als default permissie 			4

coworkers met de hand = 2
	
-----------------------------------------------------------------------------
sept 2013 
als email is leeg dan gebruik email2
	
maart 2013

add niet verwijderen LOGIN veld klas = coworker, DONE rond regel 189
add janr laatste veld LOGIN nonactive = n, zie $sql3
(Bij delete medewerker: Het medewerkerrecord met oude barcode blijft bestaan en wordt op NONACTIEF gezet.)

rel okt. 2011
voorwaardes. 
- osirisinfile moet bestaan, 
- osirisinfile moet leeg zijn, deze file kan kopie zijn van DB_login, met toegevoegd velden: voorvoegsels, x-voorletters.
- fresh csv needed

LET OP
  - tussenvoegsel in lname plakken. test dit goed! Soms bij second-run komt voorvoegsel er twee keer in. zie regel 240
  let op
  - osiris not oke. op gegeven moment verwijderen. WAT TE DOEN MET DELETE
  - utf8 gezeik

* @author jan rodenburg - larka
* @version sept-13
* @package phpScheduleIt Command Line
		* Working with
		* wat van osiris komt : C:\xampp\ksidue89ie5367ejdkns98\Lenersbestand+werkplaatsen.csv
		* wordt CLEANED geschreven naar osirisinfile in de database
* 
* status : alles werkt, ditinstellen:
* set path and names voor de infile
* set path and names voor de outfile = db01_login
* tussenvoegsel
* backup last infile
*/
ini_set('default_charset','utf-8');
header('Content-Type: text/plain; charset=utf-8');

$basedir = dirname(__FILE__) . '/..';
//echo $basedir;
require_once($basedir . '/lib/DBEngine.class.php');
require_once($basedir . '/lib/User.class.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// save the xls as tab delimited text (.txt) and use the mysql query:
// 'load data infile "file.txt" into table whatever_table;'?
// txt of csv komt in:
global $conf;
//$db = new DBengine();
$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
if (!$conn) {
    die('Could not connect1: ' . mysqli_error());
}
echo '<pre>' . var_dump($conn) . '</pre>';
//echo ($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
//echo("<br>db->connection:".$db->connection);
//echo("<br>connection:".$connection);
//var_dump ($db);
/* sept 2017, since php 7.0 */
//print mysql_client_encoding();
//print mysqli_character_set_name ( mysqli $link );
print "<br>using mysqli encoding:"; 
print mysqli_character_set_name ($conn);
print "<br/>";


//	$path = 'd:uitleen.nl/var/';
//	$osirisinfile = $path.'users.csv'; //  wat van osiris komt
// 	/usr/web/sites/rietveldacademie.nl/uitleen/www/schedule

//$path = '/web/sites/rietveldacademie.nl/uitleen/www/schedule/var/ksidue89ie5367ejdkns98'; //remote
$path = '/web/sites/rietveldacademie.nl/uitleen/www/schedule/var/ksidue89ie5367ejdkns98'; //remote
$osirisinfile = $path.'/Lenersbestand+werkplaatsen.csv'; //  wat van osiris komt  //remote

// $path = 'C:\xampp15\htdocs\schedule\var\ksidue89ie5367ejdkns98'; 						// local
// $osirisinfile = $path.'\Lenersbestand+werkplaatsen.csv'; 									// local

print "Working with<br>";
print  "wat van osiris komt : ".$osirisinfile."<br>";
print  "wordt CLEANED geschreven naar osirisinfile in de database.<br>";
print  "DAN UPDATE de db01_login, save the admins, save the coworkers.<br>";

if (!is_file($osirisinfile)) {
	print "$osirisinfile is not a valid file";
	exit();

}

if (osiris_clear_table()) {
	print "osiris cleaned<br>";
	if (osiris_load_file($osirisinfile)) {
		print " osiris loaded.<br>";
	}
}
print "<br>hier eindigt de cleanup en vullen osirisinline";
//print "<br>exit1";
//exit();
//print "<br>exit2";
//exit(); // hier eindigt de cleanup

// hier start vullen db01_login

//get_infile ($osirisinfile);
$random = mt_rand();

$osirisfile = $path.'osirisinfile';
$users = $conf['db']['tbl_prefix'].'osirislast'; 
print $users."<br>";
//$osirisfile = $conf['db']['tbl_prefix'].'osiris'.$date.$random; //tijdelijke osiris file in My Database
//$osirislast = $conf['db']['tbl_prefix'].'osirislast'; //savename als alles klaar is
//$sql = 'load data infile '.$osirisinfile.' into table'.$osirisfile; // of gebruik get_infile
/**

	/*
	*
	*/
	function osiris_load_file($file) {
		$success=true;//optimist
		$rows	= array();
		$row	= array();
		$handle = fopen( $file, "r" );
		while (
			$success &&
			list(
				$row["memberid"],
				$row["lname"],
				$row["voorvoegsels"],
				$row["x-voorletters"],
				$row["fname"],
				$row["email"],
				$row["phone_mob"],
				$row["phone"],
				$row["collegejaar_in"],
				$row["croho"],
				$row["opleiding"],
				$row["klas"],
				$row["email2"],
				$row["instellingstatus"]
			) = fgetcsv($handle, 1000, ",")
		) {
			foreach ($row as $key=>$val) {
				if (strpos($key,"x-")===0) {
					//print "unsetting $key";
					unset($row[$key]);
				}
			}
				$success = insert_into_osirisinfile($row);
		}
		return $success;
	}

	function osiris_clear_table() {

		global $conf;
		$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
		if (!$conn) {
			die('Could not connect2: ' . mysqli_error());
		}
		$q = "DELETE FROM osirisinfile";
		echo "<br>";
		$result = mysqli_query ($conn,$q) or die(mysqli_error().'DELETE FROM osirisinfile IS MISLUKT via mysqli_query ($conn,$q)<br>') ;
		return $result;
	}

	function insert_into_osirisinfile ($row)  {
		
		global $conf;
		$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
		if (!$conn) {
			die('Could not connect2: ' . mysqli_error());
		}
		
		$q = "INSERT IGNORE INTO osirisinfile ( ";
		$q .= "`".implode("`,`",array_keys($row))."`";
		$q .= ") VALUES (";
		$comma = "";
		foreach ($row as $key=>$val) { 
							$q .= "$comma \"".mysqli_real_escape_string($conn,$val)."\""; 
							// vanaf okt 15, dit werkt op de server
							//$q .= "$comma \"".mysql_real_escape_string(iconv('ISO-8859-1','latin1//TRANSLIT//IGNORE',$val))."\""; 
							// FOUT FOUT tot okt 2015, na okt 2015 is dit goed (local only).
							//$q .= "$comma \"".mysql_real_escape_string(iconv('ISO-8859-1','UTF-8//TRANSLIT//IGNORE',$val))."\""; 
							// deze osirisinfile=goed tot okt 2015, na okt 2015 is dit fout (local only).
			$comma = ",";
		}
		$q .= ") "; 
		// print $q; //test
		// echo "<br>";
		$result = mysqli_query ($conn,$q) or die(mysqli_error().'mysqli_error  INSERT IN OSIRIS IS MISLUKT') ;
		$rescheck = mysqli_query ($conn,"select lname from osirisinfile where memberid='".$row['memberid']."'");
		$rowcheck = mysqli_fetch_assoc($rescheck);
		//print "check lname: ".$rowcheck['lname']."<br/>";
		//print "INSERT IGNORE INTO osirisinfile - check lname: ".$rowcheck['lname']."<br/>";
		return $result;
	}
	function setLeenpermissie($klas) {
		

		
	// rules
	// 1	VOBJ, DZBJ, VOOROP en ORC krijgt als default permissie 		1 
	// 2	overige VO en DZ en medewerker krijgt als default permissie 2 
	// 3	T (TAUT,TVRIJ,TMIA) krijgt als default permissie 			4
	// coworker met de hand

	// coworkers met de hand = 2
	//echo "<br><br>in setleenklas:".$klas."<br><br>";
		$result=9;  // default, IS ERR
		if ( (preg_match("/VO/i", $klas))   ||   (preg_match("/DZ/i", $klas)) ) {$result=2;}
		if ( (preg_match("/VOBJ/i", $klas))   ||   (preg_match("/DZBJ/i", $klas)) ) {$result=1;}
		if ( (preg_match("/VOOROP/i", $klas))   ||   (preg_match("/ORC/i", $klas)) ) {$result=1;}
		if ( (preg_match("/EXCHANGE/i", $klas)) ) {$result=2;}
		if ( (preg_match("/T/i", substr($klas,0,1)   )) ) {$result=4;}  // first character is T
		if ( (preg_match("/TAUT/i", $klas))  ||   (preg_match("/TVRIJ/i", $klas))   ||   (preg_match("/TMIA/i", $klas)) ) {$result=4;}
		return $result;
	}

/*

situatieS 
+----------+-------------+---------------------------------------------------+------------------------------------------------------------------------------------------------+
| OSIRIS | SCHEDULE | ACTIE                                                         | code                                                                                                                          |
+----------+-------------+---------------------------------------------------+------------------------------------------------------------------------------------------------+
|  1          |  0              | VOEG NIEUW TOE IN SCHEDULE                | SELECT * FROM osirisinfile LEFT OUTER JOIN db01_login ON osirisinfile.memberid=db01_login.memberid WHERE db01_login.memberid IS NULL;                                                                                      
|  1          |  1              | WIJZIG IN SCHEDULE                               | SELECT * FROM osirisinfile INNER JOIN B ON osirisinfile.memberid=db01_login.memberid;                                                 
|  0          |  1              | VERWIJDER IN SCHEDULE                         | 	SELECT barcode from osirisinfile
|              |                   |                                                                   | 	RIGHT OUTER JOIN db01_login
|              |                   |                                                                   | 	ON osirisinfile.barcode=db01_login.barcode
|              |                   |                                                                   | 	WHERE osiris_people.barcode IS NULL                                                                  
|  0          |  0              | NIKS					                    | NULL                                                                                                                        
+----------+-------------+---------------------------------------------------+------------------------------------------------------------------------------------------------+
*/
// doe voor alle records etc, allerlei dingen
//new user
$sql1 = 'SELECT osirisinfile.* FROM osirisinfile LEFT OUTER JOIN db01_login ON osirisinfile.memberid=db01_login.memberid WHERE db01_login.memberid IS NULL';
//edit user
// $sql2 = 'SELECT * FROM osirisinfile INNER JOIN db01_login ON osirisinfile.memberid=db01_login.memberid';
// NOTE: If two or more columns of the result have the same field names, the last column will take precedence.
$sql2 = 'SELECT * FROM db01_login INNER JOIN osirisinfile ON db01_login.memberid=osirisinfile.memberid';
// 'del' user
//janr jan 2012: `is_admin` =1, user blijft
//$sql3 = 'SELECT db01_login.* FROM db01_login LEFT OUTER JOIN osirisinfile ON db01_login.memberid = osirisinfile.memberid WHERE osirisinfile.memberid IS NULL AND db01_login.email NOT LIKE \'%@uitleen.nl\'';
// $sql3 = 'SELECT db01_login.* FROM db01_login LEFT OUTER JOIN osirisinfile ON db01_login.memberid = osirisinfile.memberid WHERE osirisinfile.memberid IS NULL AND db01_login.is_admin NOT LIKE \'1\'';
// toevoeging maart 2013: AND db01_login.klas NOT LIKE \'Coworker\'
$sql3 = 'SELECT db01_login.* FROM db01_login LEFT OUTER JOIN osirisinfile ON db01_login.memberid = osirisinfile.memberid WHERE osirisinfile.memberid IS NULL AND db01_login.is_admin NOT LIKE \'1\' AND db01_login.klas NOT LIKE \'Coworker\'';


		$result = mysqli_query ($conn,$sql1) or die(mysqli_error().' ADD IN SCHEDULE IS MISLUKT') ;
		while ($row=mysqli_fetch_assoc($result)) {
			//var_dump ($row);
			insert_into_scheduleuser ($row)	; // 		VOEG NIEUW TOE IN SCHEDULE 
				print "insert_into<br>";
				
		}
			
		// nummer 2
		$result = mysqli_query ($conn,$sql2) or die(mysqli_error().' WIJZIG IN SCHEDULE IS MISLUKT') ;
		while ($row=mysqli_fetch_assoc($result)) {

			//var_dump ($row);
			update_into_scheduleuser ($row)	; // 		WIJZIG IN SCHEDULE
				print "update_into<br>";
				
		}	
		// nummer 3
		$result = mysqli_query ($conn,$sql3) or die(mysqli_error().' VERWIJDER IN SCHEDULE IS MISLUKT') ;
		echo ($sql3);
		while ($row=mysqli_fetch_assoc($result)) {
			//var_dump ($row);
			delete_into_scheduleuser ($row)	; // 		VERWIJDER IN SCHEDULE 
				print "delete_into<br>";
			
		}
	echo ('Users update: Finished! <br>');

	//$sql="DROP TABLE IF EXISTS osirisinfilelast";
	//$result = mysqli_query ($conn,$sql) or die(__FILE__.__FUNCTION__.': '.mysqli_error().' del last failed') ;
	//$sql= "SELECT * INTO osirisinfilelast FROM osirisinfile";
	//$result = mysqli_query ($conn,$sql) or die(__FILE__.__FUNCTION__.': '.mysqli_error().' copy into last failed') ;
	//echo ('Backup infile: Finished! ');
	
//if fileexist ($osirislast) delete ($osirislast);
//renamefile ($osirisfile,$osirislast)



function insert_into_scheduleuser ($row)  {
	global $conf;
	$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
	if (!$conn) {
		die('Could not connect2: ' . mysqli_error());
	}
	$datum = date("D M j G:i Y");

	// voorvoegsels aan achternaam plakken, dit gebeurd enkel bij NEW USER
	if ((isset ($row['voorvoegsels'])) && ($row['voorvoegsels'] <> ''));  {// do action
		$lname = trim ($row['voorvoegsels'].' '.$row['lname']);
		echo $lname.'<br>';		
	}
	
	// sept 2013 als email is leeg dan gebruik email2
	if ((isset ($row['email'])) && ($row['email'] <> ''));  {// do action
		$row['email'] = trim ($row['email2']);
		echo ' email2 wordt gebruikt: '.$row['email'].'<br>';		
	}	//else {
		//	echo ' email1 wordt gebruikt: '.$row['email'].'<br>';		
		//}
	
	// add janr laatste veld nonactive = n
	
	// bepaal leenpermissie
	if ((isset ($row['klas'])) && ($row['klas'] <> '')) {// do action
		$row['klas'] = trim ($row['klas']);
		$leenpermissie = setLeenpermissie($row['klas']); 	// toekennen permissie op basis van klas
	}else{
		$leenpermissie = 0;  // voor klas is niets ingevuld 
	}
	
	echo 'sql100-Student in deze klas: '.$row['klas'].' leenpermissie:'.$leenpermissie.'<br>' ;		
	
	$sql100='INSERT INTO db01_login (memberid,email,fname,lname,phone,lang,phone_mob,osiris_ok_now,last_modify_osiris,croho,opleiding,klas,collegejaar_in,instellingstatus,nonactive,leenpermissie,mutbyadmin) VALUES ("'.$row['memberid'].'","'.$row['email'].'","'.$row['fname'].'","'.$lname.'","'.$row['phone'].'","nl","'.$row['phone_mob'].'","1","a '.$datum.'","'.$row['croho'].'","'.$row['opleiding'].'","'.$row['klas'].'","'.$row['collegejaar_in'].'","'.$row['instellingstatus'].'","n","'.$leenpermissie.'",0)';
	
	echo $sql100.'<br>';
	$result = mysqli_query ($conn,$sql100) or die(__FILE__.__FUNCTION__.': '.mysqli_error().' INSERT deze user is mislukt') ;
	
	
	// $email = 				// waarde uit osiris
	// $email2 =				//do not change, if empty default=empty
	// $password =				//do not change, if empty default=empty
	// $fname =				// waarde uit osiris
	// $lname =				// waarde uit osiris
	// $phone =				// waarde uit osiris
	// $institution =			// waarde uit osiris
	// $position =				// waarde uit osiris
	// $e_add ='';
	// $e_mod =
	// $e_del =
	// $e_app =
	// $e_html =
	// $logon_name =			//do not change, if empty default=empty
	// $is_admin =				//do not change, if empty default=empty
	// $lang =					//do not change, if empty default=nl
	// $timezone =				//do not change, if empty default=empty
	// $phone_mob =			//do not change, if empty default=empty
	// $osiris_ok_last =	
	// $osiris_ok_now = '1';
	// $demerit_text =			//do not change, if empty default=empty
	// $demerit_punt =			//do not change, if empty default=empty
	// $last_modify_osiris = // $date;
	// $lnotes =				//do not change, if empty default=empty
	// $croho =				// waarde uit osiris
	// $opleiding =			// waarde uit osiris
	// $klas =					// waarde uit osiris
	// $collegejaar_in =		// waarde uit osiris
	// $instellingstatus = ;	// waarde uit osiris
	// $instellingstatus = ;	default = n
}

function update_into_scheduleuser ($row) {
	
		global $conf;
	$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
	if (!$conn) {
		die('Could not connect2: ' . mysqli_error());
	}
	
	// zie ook: debug_print_backtrace() - Prints a backtrace
	// $row['osiris_ok_now'] = '1';
	// $demerit_punt = '99'; // do not update
	//var_dump ($row); echo "<br><br>";
	$datum = date("D M j G:i Y");

	// voorvoegsels aan achternaam plakken, dit gebeurd enkel bij NEW USER, tenzij...
	if ((isset ($row['voorvoegsels'])) && ($row['voorvoegsels'] <> ''));  {// do action
		$lname = trim ($row['voorvoegsels'].' '.$row['lname']);
		echo $lname.'<br>';		
	}
	// niet update: demerit_punt, demerit_text, email2, nonactive
	// sept 2013 als email is leeg dan gebruik email2
	if ((isset ($row['email'])) && ($row['email'] <> ''));  {// do action
		$row['email'] = trim ($row['email2']);
		echo ' email2 wordt gebruikt: '.$row['email'].'<br>';		
	} 
	
	// bepaal leenpermissie
	if ((isset ($row['klas'])) && ($row['klas'] <> '')) {// do action
		$row['klas'] = trim ($row['klas']);
		$leenpermissie = setLeenpermissie($row['klas']); 	// toekennen permissie op basis van klas
	}else{
		$leenpermissie = 1;
	}
	
	echo 'sql200-Student in deze klas: '.$row['klas'].' leenpermissie:'.$leenpermissie.'<br>' ;		
	
	$sql200='UPDATE db01_login SET email="'.$row['email'].'",fname="'.$row['fname'].'",lname="'.$lname.'",phone="'.$row['phone'].'",phone_mob="'.$row['phone_mob'].'",last_modify_osiris="u '.$datum.'",croho="'.$row['croho'].'",opleiding="'.$row['opleiding'].'",klas="'.$row['klas'].'",collegejaar_in="'.$row['collegejaar_in'].'",osiris_ok_now="1",instellingstatus="'.$row['instellingstatus'].'",leenpermissie="'.$leenpermissie.'",mutbyadmin=0 WHERE memberid= "'.$row['memberid'].'"';
	
	echo $sql200.'<br>';
	
	$result = mysqli_query ($conn,$sql200) or die(__FILE__.__FUNCTION__.': '.mysqli_error().' UPDATE deze user is mislukt') ;

}
function delete_into_scheduleuser ($row) {
	
		global $conf;
	$conn = mysqli_connect($conf['db']['hostSpec'],$conf['db']['dbUser'],$conf['db']['dbPass'],$conf['db']['dbName']);
	if (!$conn) {
		die('Could not connect2: ' . mysqli_error());
	}
	// $sql300='UPDATE db01_login SET osiris_ok_now=0,demerit_punt = 99	WHERE memberid= "'.$row['memberid'].'"';
	// indien de user is admin, dan is het geen student en blijft user bestaan: `is_admin` =1
	
	
	$sql300='DELETE FROM db01_login WHERE memberid= "'.$row['memberid'].'"';
	$result = mysqli_query ($conn,$sql300) or die(__FILE__.__FUNCTION__.': '.mysqli_error().' DELETE deze user is mislukt') ;
	
		echo $sql300.'<br>';
	// zie ook: debug_print_backtrace() - Prints a backtrace
	// $row['osiris_ok_now'] = '0';
	// $demerit_punt = '99';
}





?>