<?php

/**
* ADDING DATA FOR LOGE // MARCH 2013

Naam: 					Loge
Email: 					loge@rietveldacademie.nl
Tijdsinterval: 			1 uur
Openingstijden: 		ma-vr 7:30–22:00 uur, za 09:00-18:00 uur, zo gesloten 
						020-5711.600
/*/


/**
* This file sets all the configuration options
* All configuration options, such as colors,
*  text sizes, email addresses, etc.
*  are set in this file.
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @author Richard Cantzler <rmcii@users.sourceforge.net>
* @version 05-18-06
* @package phpScheduleIt
*/
/***************************************
* phpScheduleIt                        *
* Version 1.2.12                       *
* http://phpscheduleit.sourceforge.net *
*                                      *
* Nick Korbel                          *
* lqqkout13@users.sourceforge.net      *
/***************************************/
/**
* Please refer to readme.html and LICENSE for any additional information
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* This program is free software; you can redistribute it and/or modify it
* under the terms of the GNU General Public License as published by the
* Free Software Foundation; either version 2 of the License, or (at your option)
* any later version.
*
* This program is distributed in the hope that it will be useful, but WITHOUT
* ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with
* this program; if not, write to the
* Free Software Foundation, Inc.
* 59 Temple Place
* Suite 330
* Boston, MA
* 02111-1307
* USA
*/

/////////////////////////////
// Define common variables //
/////////////////////////////

/*************************************************/
/*                Instructions                   *
**************************************************
* + This section will allow you to change        *
*  common settings such as the timeformat        *
*  and database settings                         *
*                                                *
* + All words (string values) must               *
*  be enclosed in quotation marks                *
*  Numbers must not                              *
*                                                *
* + Default values are                           *
*  given in square brackets []                   *
/*************************************************/


// The default language code.  This must be included in the language list in langs.php
$conf['app']['defaultLanguage'] = 'nl_NL';

// If you are running PHP in safe mode, set this value to 1.  Otherwise keep the default. [0]
$conf['app']['safeMode'] = 1;

// This will hide all personal data from normal users.  Admins will still see full data. [0]
$conf['app']['privacyMode'] = 0;

// Make this a unique string if you have conflicting sessions, or multiple copies of phpScheduleIt on the same server.  Otherwise leave it be. ['PHPSESSID']
$conf['app']['sessionName'] = 'PHPSESSID';

// View time in 12 or 24 hour format [12]
// Only acceptable values are 12 and 24 (if an invalid number is set, 12 hour time will be used)
$conf['app']['timeFormat'] = 24;

// First day of the week for the small navigational calendars [0]
// Must be a value between 0 - 6 (0 = Sunday 6 = Saturday)
$conf['app']['calFirstDay'] = 1;

// Email address of technical support []
$conf['app']['techEmail'] = 'post@larka.nl';

// Email addresses of additional people to email []
// Multiple addresses must be seperated by a comma
$conf['app']['ccEmail'] = '';

// Whether to send email notifications of reservation and registration activity to administrator [0]
// can be 0 (for no) or 1 (for yes)
$conf['app']['emailAdmin'] = 1;

// How to send email ['mail']
/* Options are:
    'mail' for PHP default mail
    'smtp' for SMTP
    'sendmail' for sendmail
    'qmail' for qmail MTA
*/
$conf['app']['emailType'] = 'mail';

// SMTP email host address []
// This is only required if emailType is SMTP
$conf['app']['smtpHost'] = '';

// SMTP port [25]
// This is only required if emailType is SMTP
$conf['app']['smtpPort'] = 25;

// Path to sendmail ['/usr/sbin/sendmail']
// This only needs to be set if the emailType is 'sendmail'
$conf['app']['sendmailPath'] = '/usr/sbin/sendmail';

// Path to qmail ['/var/qmail/bin/sendmail']
// This only needs to be set if the emailType is 'qmail'
$conf['app']['qmailPath'] = '/var/qmail/bin/sendmail';

// The default password to use when the admin resets a user's password ['password']
$conf['app']['defaultPassword'] = '000';

// Title of application ['phpScheduleIt']
// Will be used for page titles and in 'From' field of email responses
$conf['app']['title'] = 'Rietveld Uitleen Systeem';

// If we should use the resource permission system or not [1]
// Without permissions, everyone can use any resource
// Can be 0 (for no) or 1 (for yes)
$conf['app']['use_perms'] = 1;

// If we should show the schedule summaries on the read only schedule [0]
// Can be 0 (for no) and 1 (for yes)
$conf['app']['readOnlySummary'] = 1; //janr

// If we should allow guests to view reservation descriptions by clicking on the reservation [0]
// Can be 0 (for no) and 1 (for yes)
$conf['app']['readOnlyDetails'] = 0; // janr

// If we should log system activity or not [0]
// Can be 0 (for no) and 1 (for yes)
$conf['app']['use_log'] = 1;

// Directory/file for log ['/var/log/phpscheduleitlog.txt']
// Specify as /directory/filename.extension
$conf['app']['logfile'] = 'var/log/log.txt';

// If we should let the user choose a logon name instead of using their email address [0]
// Can be 0 (to use email as logon) and 1 (to use logon name as logon)
$conf['app']['useLogonName'] = 0;

// Minimum password length required [6]
$conf['app']['minPasswordLength'] = 3;

// Database type to be used by PEAR [mysql]
/* Options are:
    mysql  -> MySQL
    pgsql  -> PostgreSQL
    ibase  -> InterBase
    msql   -> Mini SQL
    mssql  -> Microsoft SQL Server
    oci8   -> Oracle 7/8/8i
    odbc   -> ODBC (Open Database Connectivity)
    sybase -> SyBase
    ifx    -> Informix
    fbsql  -> FrontBase
*/
$conf['db']['dbType'] = 'mysql';



// If we should drop (or overwrite) an existing database with the same name during installation [0]
// Can be 0 (for no) or 1 (for yes)
$conf['db']['drop_old'] = 0;

// Prefix to attach to all program-generated primary keys [sc1]
// This will be used to create unique primary keys when multiple databases are being used
// * 3 characterss or less.  Anything over 3 chars will be cut down
$conf['db']['pk_prefix'] = 'pk1';

// Image to appear at the top of each page ['img/phpScheduleIt.gif']
// Leave this string empty if you are not going to use an image
// Specifiy link as 'directory/filename.gif'
$conf['ui']['logoImage'] = 'img/rietveldlogo.gif';

// Welcome message show at login page ['Welcome to phpScheduleIt!']
$conf['ui']['welcome'] = 'Rietveld Uitleen.';

// Init txt msg to user about status site
$conf['ui']['msg-to-user'] = '';
/*
Configure this section to customize the color of reserved time blocks
Set 'color' to be the color when the mouse is not over the reseravtion
Set 'hover' to be the color when the mouse is moved over the reservation
Set 'text' to be the color of any text that is written on the reservation span
Please DO NOT put the hash mark (#) before the colors

'my_res' is the colors that will be used for all the upcoming reservations that the current user owns
'other_res' is the colors that will be used for all the upcoming reservations on the schedule that the current user does not own
'my_past_res' is the colors that will be used for all past reservations that the current user owns
'other_past_res' is the colors that will be used for all past reservations that the current user does not own
'blackout' is the colors that will be used for blacked out times (hover is only relative to the admin)

$conf['ui']['my_res'][]         = array ('color' => '5E7FB1', 'hover' => '799DD3', 'text' => 'FFFFFF');
$conf['ui']['other_res'][]      = array ('color' => 'D2DDEC', 'hover' => 'AFBED3', 'text' => 'FFFFFF');
$conf['ui']['my_past_res'][]    = array ('color' => 'A0A1A1', 'hover' => '6F7070', 'text' => 'FFFFFF');
$conf['ui']['other_past_res'][] = array ('color' => 'CFCFCF', 'hover' => 'ABABAB', 'text' => 'FFFFFF');
$conf['ui']['pending'][]        = array ('color' => 'E4DC04', 'hover' => 'F7F386', 'text' => 'FFFFFF');
$conf['ui']['blackout'][]       = array ('color' => '6F292D', 'hover' => '99353A', 'text' => 'FFFFFF');
*/
/* janr
admin rules, ander aankijkkleuren
my res en other res omdraaien
my past res en other past res omdraaien
*/
$conf['ui']['other_res'][]         = array ('color' => '5E7FB1', 'hover' => '799DD3', 'text' => 'FFFFFF');
$conf['ui']['my_res'][]            = array ('color' => 'EE4F11', 'hover' => 'AFBED3', 'text' => 'FFFFFF');
$conf['ui']['other_past_res'][]    = array ('color' => 'A0A1A1', 'hover' => '6F7070', 'text' => 'FFFFFF');
$conf['ui']['my_past_res'][]       = array ('color' => 'CFCFCF', 'hover' => 'ABABAB', 'text' => 'FFFFFF');
$conf['ui']['pending'][]           = array ('color' => 'E4DC04', 'hover' => 'F7F386', 'text' => 'FFFFFF');
$conf['ui']['blackout'][]          = array ('color' => '6F292D', 'hover' => '99353A', 'text' => 'FFFFFF');
// If we should print out the reservation owner's name in the summary box [1]
// Can be 0 (for no) and 1 (for yes)
$conf['app']['prefixNameOnSummary'] = 1;

// Available positions to select when registering
// If you add values to this variable, they will appear in a pull down menu.  If you do not add values
//  then the position field will be a text box instead of a pull down menu
// Comment out (add // before all $conf['ui']['positions'][]) to display a text box instead of a select menu
// Add $conf['ui']['positions'][3] //values to add positions
$conf['ui']['positions'] = array();            // DO NOT CHANGE THIS LINE
$conf['ui']['positions'][] = "positie 1";
$conf['ui']['positions'][] = "positie 2";
$conf['ui']['positions'][] = "positie 3";

// Available institutions to select when registering
// If you add values to this variable, they will appear in a pull down menu.  If you do not add values
//  then the institution field will be a text box instead of a pull down menu
// Comment out (add // before all $conf['ui']['institutions'][]) to display a text box instead of a select menu
// Add $conf['ui']['institutions'][] values to add institutions
$conf['ui']['institutions'] = array();            // DO NOT CHANGE THIS LINE
$conf['ui']['institutions'][] = "instituut 1";
$conf['ui']['institutions'][] = "instituut 2";

// LDAP Settings
// Should we use LDAP for authentication and enable transparent user registration.
//  User registration data(mail, phone, etc.) is pulled from LDAP.
//  If true the user will have to login with their LDAP uid instead of email address.
$conf['ldap']['authentication'] = false;
$conf['ldap']['host'] = 'ldap.host.com';
$conf['ldap']['port'] = 389;
// LDAP people search base. Set this to where people in your organization are stored in LDAP,
// typically ou=people,o=domain.com.
$conf['ldap']['basedn'] = "ou=people,o=domain.com";

/// START COPY FOR VERSION 1.2.0 ///

// This will allow or disable user self-registration.  If this is disabled, the admin will only be able to create users [1]
$conf['app']['allowSelfRegistration'] = 0;

// This will allow or disable the generation of RSS feeds for users to view their reservation data [1]
$conf['app']['allowRss'] = 1;

// The GMT hour difference for the server [0]
$conf['app']['timezone'] = -1;

// The amount of minutes before a reservation that a user can get a reminder [array()]
// Add minutes in as integers ie) array(5,10,15,30)
// The reminder email job must be scheduled for emails to be sent (see readme)
$conf['app']['allowed_reminder_times'] = array(30, 1440);

// reservation_status : zie nl.lang.php r850 voor tekstwaardes
// reservation_status : zie /config/ langs.php r230 voor special translate method -janr
$conf['app']['allowed_reservation_status'] = array(0,1,2,3); 


// See time block customization above
$conf['ui']['participant_res'][]		= array ('color' => 'CE56D6', 'hover' => 'E174E8', 'text' => 'FFFFFF');
$conf['ui']['participant_past_res'][]	= array ('color' => '641293', 'hover' => '7B25AC', 'text' => 'FFFFFF');

// Account for lookup on LDAP server
$conf['ldap']['lookupid'] = 'jwt-unique=userName,ou=internal,ou=people,dc=domain,dc=com';
// LDAP password
$conf['ldap']['lookuppwd'] = 'userPassword';

/// END COPY FOR VERSION 1.2.0 ///
/// START JANR MODS ///

// janr new setting (analogie allowed_reminder_times ! allowed_checkout_via en allowed_checkin_via)
// checkin via ... and checkout via... The allowed locations 
$conf['app']['allowed_checkout'] = array("","Uitleen 2.42","Tool-o-Theek","Computerwerkplaats NB","Werkplaats Videomontage NB","Loge","NB 216","NB 218-1","NB 218-2","NB 218-3","NB 218-4","NB 218-5","NB 218-6");
$conf['app']['allowed_checkin'] = array("","Uitleen 2.42","Tool-o-Theek","Computerwerkplaats NB","Werkplaats Videomontage NB","Loge","NB 216","NB 218-1","NB 218-2","NB 218-3","NB 218-4","NB 218-5","NB 218-6");

// status gebruiker
$conf['userstatus']['0'] = 'oke&nbsp;'; //Deze gebruiker is oke
$conf['userstatus']['1'] = '<span class="valop1">demerit 1</span>';
$conf['userstatus']['2'] = '<span class="valop2">demerit 2</span>';
$conf['userstatus']['3'] = '<span class="valop">demerit 3</span>';
$conf['userstatus']['99'] = '<span class="valop">osiris not oke</span>';
$conf['userstatus']['100'] = '<span class="valop">osiris not oke</span>';

// naw werkplaatsen

$conf['loge@rietveldacademie.nl']['adres']= 'Rietveld Academie<br />
Loge<br />
Fred Roeskestraat 96<br />
AMSTERDAM<br />
020 5711 600<br />';

$conf['schedulenew@larka.nl']['adres']= 'Rietveld Academie<br />
Uitleen-2.42<br />
Fred Roeskestraat 96<br />
AMSTERDAM<br />
020 5711 659<br />';

$conf['uitleen@rietveldwerkplaats.nl']['adres']= 'Rietveld Academie<br />
Photography Department<br />
Fred Roeskestraat 96<br />
AMSTERDAM<br />
020 5711 627<br />';

$conf['christiaan@rietvelddigital.nl']['adres']= 'Rietveld Academie<br />
computerwerkplaats lokaal 204<br />
Fred Roeskestraat 96<br />
AMSTERDAM<br />
<br />';

// naam werkplaatsen
// ongebruikt
// $conf['schedule']['Werkplaats-foto']['naam'] = 'werkplaats fotografie';
// $conf['schedule']['Uitleen-2.42']['naam'] = 'uitleen 2.42';
// $conf['schedule']['Computer-Werkpla']['naam'] = 'computerwerkplaats lokaal 204';
// $conf['schedule']['loge']['naam'] = 'loge';

// print contract headers werkplaatsen

$conf['schedulenew@larka.nl']['contractheader'] = '<table class="contract" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="cellColor1 w50" colspan="2"><br>Gerrit Rietveld Academie &nbsp;&middot;&nbsp; uitleen 2.42<br>
schedulenew@larka.nl<br>
020 5711659<br>
or leave a message at<br>
020 5711600<br>
</td>
<td class="cellColor1 w20" align="right">open<br>
Monday<br>
Tuesday<br>
Wednesday<br>
Thursday<br>
Friday<br>
</td>
<td class="cellColor1 w30"><br>11:00 &ndash; 13:00 &nbsp;&nbsp;&nbsp;   17:00 &ndash; 19:00<br>
11:00 &ndash; 13:00<br>
closed<br>
11:00 &ndash; 13:00<br>
11:00 &ndash; 13:00<br>
</td></tr>
<tr><td  align="right" colspan="4">&nbsp;</td></tr>';


$conf['loge@rietveldacademie.nl']['contractheader'] = '<table class="contract" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="cellColor1 w50" colspan="2"><br>Gerrit Rietveld Academie &nbsp;&middot;&nbsp; Loge<br>
loge@rietveldacademie.nl<br>
020 5711680
</td>
<td class="cellColor1 w20" align="right">open<br>
Monday<br>
Tuesday<br>
Wednesday<br>
Thursday<br>
Friday<br>
Saturday<br>
</td>
<td class="cellColor1 w30"><br>
7:30 – 22:00 uur<br>
7:30 – 22:00 uur<br>
7:30 – 22:00 uur<br>
7:30 – 22:00 uur<br>
7:30 – 22:00 uur<br>
09:00 - 18:00 uur<br>
</td></tr>
<tr><td  align="right" colspan="4">&nbsp;</td></tr>';

$conf['toolotheek@rietveldacademie.nl']['contractheader'] = '<table class="contract" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="cellColor1 w50" colspan="2"><br>Gerrit Rietveld Academie &nbsp;&middot;&nbsp; Tool-o-Theek<br>
toolotheek@rietveldacademie.nl<br>
020 5711680
</td>
<td class="cellColor1 w20" align="right">open<br>
Monday<br>
Tuesday<br>
Wednesday<br>
Thursday<br>
Friday<br>
Saturday<br>
</td>
<td class="cellColor1 w30"><br>
8:45 &ndash; 14:00 &nbsp;&nbsp;&nbsp;   18:00 &ndash; 21:45<br>
8:45 &ndash; 14:00 &nbsp;&nbsp;&nbsp;   18:00 &ndash; 21:45<br>
8:45 &ndash; 14:00 &nbsp;&nbsp;&nbsp;   18:00 &ndash; 21:45<br>
8:45 &ndash; 14:00 &nbsp;&nbsp;&nbsp;   18:00 &ndash; 21:45<br>
8:45 &ndash; 14:00<br>
12:00 &ndash; 16:00<br>
</td></tr>
<tr><td  align="right" colspan="4">&nbsp;</td></tr>';



$conf['uitleen@rietveldwerkplaats.nl']['contractheader'] = '<table class="contract" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="cellColor1 w50" colspan="2"><br>Gerrit Rietveld Academie &nbsp;&middot;&nbsp; fotografie werkplaats<br>

</td>
<td class="cellColor1 w20" align="right">
</td>
<td class="cellColor1 w30">
</td></tr>
<tr><td  align="right" colspan="4">&nbsp;</td></tr>';



$conf['christiaan@rietvelddigital.nl']['contractheader'] = '<table class="contract" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="cellColor1 w50" colspan="2"><br>Gerrit Rietveld Academie &nbsp;&middot;&nbsp; computerwerkplaats<br>
</td>
<td class="cellColor1 w20" align="right">
</td>
<td class="cellColor1 w30">
</td></tr>
<tr><td  align="right" colspan="4">&nbsp;</td></tr>';


// pdf link contract voorwaardes
// LET OP: sept13, contract-au-2 vervalt, vervangen door 1 en dezelfde
// per 19 sept 2013: Voorwaarden-Uitleen-130919-contract1  .pdf
// per 14 jan 2014: Voorwaarden-Uitleen-140114-contract1   .pdf
// per 1 sept 2014: Voorwaarden Uitleen 140826-contract1.pdf

$conf['schedulenew@larka.nl']['linkcontract1']= "<a  href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";
$conf['schedulenew@larka.nl']['linkcontract2']= "<a href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";

$conf['uitleen@rietveldwerkplaats.nl']['linkcontract1']= "<a  href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";
$conf['uitleen@rietveldwerkplaats.nl']['linkcontract2']= "<a href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";

$conf['christiaan@rietvelddigital.nl']['linkcontract1']= "<a  href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";
$conf['christiaan@rietvelddigital.nl']['linkcontract2']= "<a href=//uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf>uitleen.rietveldacademie.nl/Voorwaarden-Uitleen-140826-contract1.pdf</a>";

$conf['toolotheek@rietveldacademie.nl']['linkcontract1']= "<a href=//uitleen.rietveldacademie.nl/contract-Tool-o-Theek-1.pdf>uitleen.rietveldacademie.nl/contract-Tool-o-Theek-1.pdf</a>";
$conf['toolotheek@rietveldacademie.nl']['linkcontract2']= "<a href=//uitleen.rietveldacademie.nl/contract-Tool-o-Theek-2.pdf>uitleen.rietveldacademie.nl/contract-Tool-o-Theek-2.pdf</a>";

$conf['toolotheek@rietveldacademie.nl']['linkcontract1here']= "<a href=//uitleen.rietveldacademie.nl/contract-Tool-o-Theek-1.pdf>here.</a>";
$conf['toolotheek@rietveldacademie.nl']['linkcontract2here']= "<a href=//uitleen.rietveldacademie.nl/contract-Tool-o-Theek-2.pdf>here.</a>";


$conf['loge@rietveldacademie.nl']['linkcontract1']= "<a href=//uitleen.rietveldacademie.nl/Algemene-voorwaarden-uitlenen-Loge.pdf>uitleen.rietveldacademie.nl/Algemene-voorwaarden-uitlenen-Loge.pdf</a>";
$conf['loge@rietveldacademie.nl']['linkcontract2']= "<a href=//uitleen.rietveldacademie.nl/Algemene-voorwaarden-uitlenen-Loge.pdf>uitleen.rietveldacademie.nl/Algemene-voorwaarden-uitlenen-Loge.pdf</a>";

// schedulenew@larka.nl
// uitleen@rietveldwerkplaats.nl
// christiaan@rietvelddigital.nl
// toolotheek@rietveldacademie.nl
// loge@rietveldacademie.nl
$conf['toolotheek@rietveldacademie.nl']['schedulename'] = "Tool-O-Theek";
$conf['schedulenew@larka.nl']['schedulename'] = "Uitleen 242";
$conf['christiaan@rietvelddigital.nl']['schedulename'] = "schedulename";
$conf['uitleen@rietveldwerkplaats.nl']['schedulename'] = "Werkplaats Fotografie";
$conf['loge@rietveldacademie.nl']['schedulename'] = "Loge";
/// 1.2.9 ///
$conf['ldap']['ssl'] = false;
/// END 1.2.9 ///
?>