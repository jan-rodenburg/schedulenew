<?php
// debug aan of uit
// $conf['debug'] = '0'; // debug = on remote
$conf['debug'] = '0'; // debug = on local, show webmaster test box
$conf['unused_menu'] = '0'; // unused menu items


if ($conf['debug'] == '1' ) {
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}

$conf['time']['servercorrect'] = 7200; //servertime // janrtimings
// +3600
$conf['time']['servercorrect'] = 10800; //servertime // janrtimings
/**
* connect stuff
*/
$conf['db']['dbType'] = 'mysqli';

// Database /////////////////////////  uitleen.rietveldacademie.nl

$conf['db']['hostSpec'] = 'localhost';
$conf['db']['dbName'] = 'gra_uitleen_newdev';
$conf['db']['dbUser'] = 'root';
$conf['db']['dbPass'] = 'janjan';

// Prefix to attach to all table names []
$conf['db']['tbl_prefix'] = 'db01_';
//$conf['app']['weburi'] = '//uitleen.rietveldacademie.nl/schedulex';
$conf['app']['weburi'] = '//localhost:7777/schedulenew/www';
/**
* END SERVER SPECIFIC connect stuff
/*/

?>
