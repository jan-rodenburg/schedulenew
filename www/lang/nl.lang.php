<?php
/**
* Nederlands (nl) vertaalbestand
*
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @translator <gerbreand@teomech.ugent.be>
* @translator <erwin.vandenbunder@e-ware.be>
* @version 05-14-06
* @package Languages
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
///////////////////////////////////////////////////////////
// INSTRUCTIONS
///////////////////////////////////////////////////////////
// This file contains all of the strings that are used throughout phpScheduleit.
//
// To make phpScheduleIt available in another language, simply translate each
//  of the following strings into the appropriate one for the language.  Please be sure
//  to make the proper additions the /config/langs.php file (instructions are in the file).
//
// You will probably keep all sprintf (%s) tags in their current place.  These tags
//  are there as a substitution placeholder.  Please check the output after translating
//  to be sure that the sentences make sense.
//
// + Please use single quotes ' around all $strings.  If you need to use the ' character, please enter it as \'
// + Please use double quotes " around all $email.  If you need to use the " character, please enter it as \"
//
// + For all $dates please use the PHP strftime() syntax
//    http://us2.php.net/manual/en/function.strftime.php
//
// + Non-intuitive parts of this file will be explained with comments.  If you
//    have any questions, please email lqqkout13@users.sourceforge.net
//    or post questions in the Developers forum on SourceForge
//    http://sourceforge.net/forum/forum.php?forum_id=331297
///////////////////////////////////////////////////////////

////////////////////////////////
/* Do not modify this section */
////////////////////////////////
global $strings;			  //
global $email;				  //
global $dates;				  //
global $charset;			  //
global $letters;			  //
global $days_full;			  //
global $days_abbr;			  //
global $days_two;			  //
global $days_letter;		  //
global $months_full;		  //
global $months_abbr;		  //
global $days_letter;		  //
/******************************/

// Charset for this language
// 'iso-8859-1' will work for most languages
//$charset = 'iso-8859-1';
$charset = 'UTF-8'; //janr

/***
  DAY NAMES
  All of these arrays MUST start with Sunday as the first element
   and go through the seven day week, ending on Saturday
***/
// The full day name
$days_full = array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
// The three letter abbreviation
$days_abbr = array('Zon', 'Maa', 'Din', 'Woe', 'Don', 'Vri', 'Zat');
// The two letter abbreviation
$days_two  = array('Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za');
// The one letter abbreviation
$days_letter = array('Z', 'M', 'D', 'W', 'D', 'V', 'Z');

/***
  MONTH NAMES
  All of these arrays MUST start with January as the first element
   and go through the twelve months of the year, ending on December
***/
// The full month name
$months_full = array('Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
// The three letter month name
$months_abbr = array('Jan', 'Feb', 'Mrt', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');

// All letters of the alphabet starting with A and ending with Z
$letters = array ('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

/***
  DATE FORMATTING
  All of the date formatting must use the PHP strftime() syntax
  You can include any text/HTML formatting in the translation
***/
// General date formatting used for all date display unless otherwise noted, JANR with name of day
$dates['general_date_named'] = '%a %d-%m-%Y';
// General date formatting used for all date display unless otherwise noted
$dates['general_date'] = '%d-%m-%Y';
// General datetime formatting used for all datetime display unless otherwise noted
// The hour:minute:second will always follow this format
$dates['general_datetime'] = '%d-%m-%Y &nbsp;-&nbsp;';
// Date in the reservation notification popup and email
$dates['res_check'] = '%A %d-%m-%Y';
// Date on the scheduler that appears above the resource links
$dates['schedule_daily'] = '%A,<br/>%d-%m-%Y';
// Date on top-right of each page
$dates['header'] = '%A, %d %B, %Y';
// Jump box format on bottom of the schedule page
// This must only include %m %d %Y in the proper order,
//  other specifiers will be ignored and will corrupt the jump box
$dates['jumpbox'] = '%d %m %Y';

/***
  STRING TRANSLATIONS
  All of these strings should be translated from the English value (right side of the equals sign) to the new language.
  - Please keep the keys (between the [] brackets) as they are.  The keys will not always be the same as the value.
  - Please keep the sprintf formatting (%s) placeholders where they are unless you are sure it needs to be moved.
  - Please keep the HTML and punctuation as-is unless you know that you want to change it.
***/
$strings['hours'] = 'uren';
$strings['minutes'] = 'minuten';
// The common abbreviation to hint that a user should enter the month as 2 digits
$strings['mm'] = 'mm';
// The common abbreviation to hint that a user should enter the day as 2 digits
$strings['dd'] = 'dd';
// The common abbreviation to hint that a user should enter the year as 4 digits
$strings['yyyy'] = 'jjjj';
$strings['am'] = 'am';
$strings['pm'] = 'pm';

$strings['Administrator'] = 'Admin';
$strings['Welcome Back'] = 'Hallo, %s %s';
$strings['Log Out'] = 'Uitloggen';
$strings['My Control Panel'] = 'Home';
$strings['Help'] = 'Help';
$strings['More'] = 'Meer...';
$strings['Manage Schedules'] = 'Werkplaatsen';
$strings['Manage Users'] ='Gebruikers';
$strings['Manage Coworkers'] ='Medewerkers';

$strings['Delete Coworker'] ='Delete deze medewerker';
$strings['Manage Resources'] = 'Artikelen';
$strings['Manage User Training'] ='Gebruikersopleiding';
$strings['Manage Reservations'] ='Reserveringen';
$strings['Email Users'] ='Email gebruikers';
$strings['Export Database Data'] = 'Exporteer databasegegevens';
$strings['Reset Password'] = 'Wijzig wachtwoord';
$strings['System Administration'] = 'Beheer';
$strings['Successful update'] = 'Update gelukt';
$strings['Update failed!'] = 'Update mislukt!';
$strings['Manage Blackout Times'] = 'Blackout tijden';
$strings['Forgot Password'] = 'Wachtwoord vergeten';
$strings['Manage My Email Contacts'] = 'Mijn email gegevens';
$strings['Choose Date'] = 'Kies datum';
$strings['Modify My Profile'] = 'Wijzig mijn profiel';
$strings['Register'] = 'Registreer';
$strings['Processing Blackout'] = 'Bezig met verwerken blackout';
$strings['Processing Reservation'] = 'Bezig met verwerken reservering';
$strings['Online Scheduler [Read-only Mode]'] = 'Online Planner [Alleen-lezen modus]';
$strings['Online Scheduler'] = 'Online Planner';
$strings['phpScheduleIt Statistics'] = 'Statistieken';
$strings['User Info'] = 'Gebruikersinfo:';

$strings['Could not determine tool'] = 'Kan tool niet vinden. Ga terug naar Home en probeer later opnieuw.';
$strings['This is only accessable to the administrator'] = 'Dit is enkel toegankelijk voor de beheerder';
$strings['Back to My Control Panel'] = 'Terug naar Home';
$strings['That schedule is not available.'] = 'Deze werkplaats is niet toegankelijk.';
$strings['You did not select any schedules to delete.'] = 'Je hebt geen werkplaats gekozen om te verwijderen.';
$strings['You did not select any members to delete.'] = 'Je hebt geen gebruikers gekozen om te verwijderen.';
$strings['You did not select any resources to delete.'] = 'Je hebt geen artikelen gekozen om te verwijderen.';
$strings['Schedule title is required.'] = 'Werkplaats is vereist.';
$strings['Invalid start/end times'] = 'Ongeldige begin/eindtijden';
$strings['View days is required'] = 'Toon dagen is vereist';
$strings['Day offset is required'] = 'Offset dag is vereist';
$strings['Admin email is required'] = 'Email van beheerder is vereist';
$strings['Resource name is required.'] = 'Naam van de bron is vereist.';
$strings['Valid schedule must be selected'] = 'Selecteer een geldige plannning';
$strings['Minimum reservation length must be less than or equal to maximum reservation length.'] = 'Minimale reserveringsduur dient kleiner of gelijk te zijn aan de maximale reserveringsduur.';
$strings['Your request was processed successfully.'] = 'Je aanvraag is met succes verwerkt.';
$strings['Go back to system administration'] = 'Ga terug naar het home';
$strings['Or wait to be automatically redirected there.'] = 'Of wacht tot je automatisch wordt doorgestuurd.';
$strings['There were problems processing your request.'] = 'Er was een probleem om je aanvraag te verwerken.';
$strings['Please go back and correct any errors.'] = 'Ga terug en corrigeer de fouten.';
$strings['Please go back and correct any warnings.'] = 'Ga terug indien nodig.';
$strings['Login to view details and place reservations'] = 'Log in om de details te bekijken en reserveringen te plaatsen';
$strings['Memberid is not available.'] = 'Gebruiker-id: %s is niet beschikbaar.';

$strings['Schedule Title'] = 'Naam werkplaats';
$strings['Start Time'] = 'Begintijd';
$strings['End Time'] = 'Eindtijd';
$strings['Time Span'] = 'Tijdsspanne';
$strings['Weekday Start'] = 'Weekdag begin';
$strings['Admin Email'] = 'Email beheerder';

$strings['Default'] = 'Standaard';
$strings['Reset'] = 'Wijzig';
$strings['Edit'] = 'Bewerk';
$strings['Duplicate'] = 'Dupliceer';
$strings['Make instant COPY of this resource'] = 'Maak een COPY van dit artikel';

$strings['Delete'] = 'Delete';
$strings['Print'] = 'Print';
$strings['Cancel'] = 'Annuleer';
$strings['View'] = 'Bekijk';
$strings['Modify'] = 'Wijzig';
$strings['Save'] = 'Bewaar';
$strings['Back'] = 'Terug';
$strings['Next'] = 'Volgende';
$strings['Close Window'] = 'Sluit venster';
$strings['Search'] = 'Zoeken';
$strings['Clear'] = 'Leeg maken';
$strings['copy cluster'] = 'Copy Cluster';

// use icons from silksprite

$strings['IconModify'] = '<span class="ss_sprite ss_database_edit "> &nbsp; </span>';		//  bewerk wijzig
$strings['IconEdit'] = '<span class="ss_sprite ss_database_edit "> &nbsp; </span>';		//  bewerk wijzig
$strings['IconActive'] = '<span class="ss_sprite ss_accept "> &nbsp; </span>'; 			// oke, actief
$strings['IconDelete'] = '<span class="ss_sprite ss_database_delete "> &nbsp; </span>'; 	// delete
$strings['IconView']   = '<span class="ss_sprite ss_application_view_detail  "> &nbsp; </span>'; // view detail
$strings['IconNotes']  = '<span class="ss_sprite ss_note "> &nbsp; </span>'; 					// note notities
$strings['IconCross'] = '<span class="ss_sprite ss_cross "> &nbsp; </span>'; 			// niet oke, cross/kill
$strings['IconPrint'] = '<span class="ss_sprite ss_printer "> &nbsp; </span>'; 			// niet oke, inactief
$strings['IconMailTooLate'] = '<span class="ss_sprite ss_email_error "> &nbsp; </span>';
$strings['IconConfirmMail'] = '<span class="ss_sprite ss_email_add "> &nbsp; </span>'; 
$strings['IconDuplicate'] = '<span class="ss_sprite ss_page_copy"> &nbsp; </span>';		//  bewerk duplicate  
$strings['MailTooLate'] = 'TelaatMail';			
$strings['ConfirmMail'] = 'ConfirmMail';	

$strings['Days to Show'] = 'Aantal dagen te tonen';
$strings['Reservation Offset'] = 'Reservering Offset';
$strings['Hidden'] = 'Verborgen';
$strings['Show Summary'] = 'Toon samenvatting';
$strings['Add Schedule'] = 'Voeg werkplaats toe';
$strings['Edit Schedule'] = 'Bewerk werkplaats';
$strings['No'] = 'Nee';
$strings['Yes'] = 'Ja';
$strings['Name'] = 'Naam';
$strings['First Name'] = 'Voornaam';
$strings['Last Name'] = 'Achternaam';
$strings['Resource Name'] = 'Artikel';
$strings['Email'] = 'Email';
$strings['Institution'] = 'Organisaties';
$strings['Phone'] = 'Telefoon';
$strings['Password'] = 'Wachtwoord';
$strings['Permissions'] = 'Toegangsrechten';
$strings['View information about'] = 'Bekijk informatie over %s %s';
$strings['Send email to'] = 'Verzend email naar %s %s';
$strings['Reset password for'] = 'Wijzig wachtwoord voor %s %s';
$strings['Edit permissions for'] = 'Bewerk toegangsrechten voor %s %s';
$strings['Position'] = 'Positie';
$strings['Password (6 char min)'] = 'Wachtwoord (min. %s tekens)';
$strings['Re-Enter Password'] = 'Bevestig je wachtwoord';

$strings['Sort by descending last name'] = 'Sorteer volgens naam (aflopend)';
$strings['Sort by descending email address'] = 'Sorteer volgens emailadres (aflopend)';
$strings['Sort by descending institution'] = 'Sorteer volgens organisatie (aflopend)';
$strings['Sort by ascending last name'] = 'Sorteer volgens naam (oplopend)';
$strings['Sort by ascending email address'] = 'Sorteer volgens emailadres (oplopend)';
$strings['Sort by ascending institution'] = 'Sorteer volgens organisatie (oplopend)';
$strings['Sort by descending resource name'] = 'Sorteer volgens artikel (aflopend)';
$strings['Sort by descending location'] = 'Sorteer volgens plaats (aflopend)';
$strings['Sort by descending schedule title'] = 'Sorteer volgens werkplaats (aflopend)';
$strings['Sort by ascending resource name'] = 'Sorteer volgens artikel (oplopend)';
$strings['Sort by ascending location'] = 'Sorteer volgens plaats (oplopend)';
$strings['Sort by ascending schedule title'] = 'Sorteer volgens werkplaats (oplopend)';
$strings['Sort by descending date'] = 'Sorteer volgens datum (aflopend)';
$strings['Sort by descending user name'] = 'Sorteer volgens gebruikersnaam (aflopend)';
$strings['Sort by descending start time'] = 'Sorteer volgens begintijd (aflopend)';
$strings['Sort by descending end time'] = 'Sorteer volgens eindtijd (aflopend)';
$strings['Sort by ascending date'] = 'Sorteer volgens datum (oplopend)';
$strings['Sort by ascending user name'] = 'Sorteer volgens gebruikersnaam (oplopend)';
$strings['Sort by ascending start time'] = 'Sorteer volgens begintijd (oplopend)';
$strings['Sort by ascending end time'] = 'Sorteer volgens begintijd (aflopend)';
$strings['Sort by descending created time'] = 'Sorteer volgens datum van aanmaken (aflopend)';
$strings['Sort by ascending created time'] = 'Sorteer volgens datum van aanmaken (oplopend)';
$strings['Sort by descending last modified time'] = 'Sorteer volgens wijzigingsdatum (aflopend)';
$strings['Sort by ascending last modified time'] = 'Sorteer volgens wijzigingsdatum (oplopend)';

$strings['Search Users'] = 'Zoek gebruikers';
$strings['Location'] = 'Locatie';
$strings['Schedule'] = 'Werkplaats';
$strings['Phone'] = 'Telefoon';
$strings['Notes'] = 'Bijzonderheden'; // over artikel dit exemplaar: bijv krassen of breuk
$strings['Status'] = 'Status';
$strings['All Schedules'] = 'Alle werkplaatsen';
$strings['All Resources'] = 'Alle reserveringsartikelen';
$strings['All Users'] = 'Alle gebruikers';
$strings['All Coworkers'] = 'Alle medewerkers'; // janr
$strings['Coworker'] = 'medewerker'; // janr
$strings['Edit data for'] = 'Bewerk gegevens voor %s';
$strings['Active'] = 'YesActive'; // do not change this, value is used in filter
$strings['Inactive'] = 'NoActive'; // do not change this, value is used in filter
$strings['Toggle this resource active/inactive'] = 'Wissel dit artikel actief/inactief';
$strings['Minimum Reservation Time'] = 'Minimale Reserveringstijd';
$strings['Maximum Reservation Time'] = 'Maximale Reserveringstijd';
$strings['Auto-assign permission'] = 'Nieuw geregistreerde gebruiker krijgt toegang?'; //
$strings['Add Resource'] = 'Voeg een artikel toe';
$strings['Edit Resource'] = 'Bewerk de artikel';
$strings['Allowed'] = 'Toegestaan';
$strings['Notify user'] = 'Verwittig de gebruiker';
$strings['User Reservations'] = 'Alle reserveringen';
$strings['Date'] = 'Datum';
$strings['User'] = 'Gebruiker';
$strings['Email Users'] = 'Email gebruikers';
$strings['Subject'] = 'Onderwerp';
$strings['Message'] = 'Bericht';
$strings['Please select users'] = 'Gelieve de gebruikers te selecteren';
$strings['Send Email'] = 'Verzend email';
$strings['problem sending email'] = 'Sorry, een probleem deed zich voor bij het verzenden van de mail. Probeer later opnieuw.';
$strings['The email sent successfully.'] = 'De email is succesvol verzonden.';
$strings['do not refresh page'] = 'Gelieve deze pagina <u>niet</u> te herladen. De email zal in dat geval opnieuw verzonden worden.';
$strings['Return to email management'] = 'Terugkeren naar emailbeheer';
$strings['Please select which tables and fields to export'] = 'Gelieve de tabellen en velden te selecteren die je wil uitvoeren:';
$strings['all fields'] = '- alle velden -';
$strings['HTML'] = 'HTML';
$strings['Plain text'] = 'Plain text';
$strings['XML'] = 'XML';
$strings['CSV'] = 'CSV';
$strings['Export Data'] = 'Uitvoer data';
$strings['Reset Password for'] = 'Wijzig wachtwoord voor %s';
$strings['Please edit your profile'] = 'Gebruiker'; // change your profile auth
$strings['Please register'] = 'Medewerker toevoegen'; // was 'Gelieve te registreren';
$strings['Email address (this will be your login)'] = 'emailadres';
$strings['Keep me logged in'] = 'Laat me ingelogd blijven <br/>(vereist cookies)';
$strings['Edit Profile'] = 'Bewerk profiel';
$strings['Register'] = 'Registreer';
$strings['Please Log In'] = 'Gelieve aan te melden';
$strings['Email address'] = 'emailadres';
$strings['Password'] = 'Wachtwoord';
$strings['First time user'] = 'Nieuwe gebruiker?';
$strings['Click here to register'] = 'Klik hier om je te registreren';
$strings['Register for phpScheduleIt'] = 'Registreer voor phpScheduleIt';
$strings['Log In'] = 'Aanmelden';
$strings['View Schedule'] = 'Werkplaats';
$strings['View a read-only version of the schedule'] = 'Bekijk een alleen-lezen versie van de werkplaats';
$strings['I Forgot My Password'] = 'Wachtwoord vergeten?';
$strings['Retreive lost password'] = 'Vergeten wachtwoord ophalen';
$strings['Get online help'] = 'Vraag online help';
$strings['Language'] = 'Taal';
$strings['(Default)'] = '(Standaard)';

$strings['My Announcements'] = 'Mijn Aankondigingen';
$strings['My Reservations'] = 'Mijn Reserveringen';
$strings['My Permissions'] = 'Mijn Toegangsrechten';
$strings['My Quick Links'] = 'Links';
$strings['Announcements as of'] = 'Aankondigingen sinds %s';
$strings['There are no announcements.'] = 'Geen aankondigingen.';
$strings['Resource'] = 'Artikel';
$strings['Created'] = 'Aangemaakt';
$strings['Last Modified'] = 'Laatst gewijzigd';
$strings['View this reservation'] = 'Bekijk deze reservering';
$strings['Modify this reservation'] = 'Wijzig deze reservering';
$strings['Delete this reservation'] = 'Verwijder deze reservering';
$strings['Bookings'] = 'Rooster';
$strings['Change My Profile Information/Password'] = '<span class="eruit">Wijzig mijn profielinformatie / wachtwoord</span>';		// @since 1.2.0
$strings['Manage My Email Preferences'] = '<span class="eruit">Mijn email voorkeuren</span>';				// @since 1.2.0
$strings['Manage Blackout Times'] = 'Blackouts';
$strings['Mass Email Users'] = '<span class="eruit">Email de gebruikers</span>';
$strings['Search Scheduled Resource Usage'] = 'Zoeken';		// @since 1.2.0
$strings['Export Database Content'] = 'Exporteer de inhoud van de gegevensbank';
$strings['View System Stats'] = 'Systeemstatistieken bekijken';
$strings['Email Administrator'] = '<span class="eruit">Beheerder emailen</span>';

$strings['Email me when'] = 'Stuur me een email wanneer:';
$strings['I place a reservation'] = 'Ik maak een reservering';
$strings['My reservation is modified'] = 'Mijn reservering wordt gewijzigd';
$strings['My reservation is deleted'] = 'Mijn reservering wordt verwijderd';
$strings['I prefer'] = 'Ik kies:';
$strings['Your email preferences were successfully saved'] = 'Je emailvoorkeuren zijn bewaard!';
$strings['Return to My Control Panel'] = 'Terugkeren naar Home';

$strings['Please select the starting and ending times'] = 'Kies begine en eindtijd:';
$strings['Please change the starting and ending times'] = 'Begin- en eindtijd';
$strings['Reserved time'] = 'Gereserveerde tijd:';
$strings['Minimum Reservation Length'] = 'Minimale reserveringstijd:';
$strings['Maximum Reservation Length'] = 'Maximale reserveringstijd:';
$strings['Reserved for'] = 'Gereserveerd voor:';
$strings['Will be reserved for'] = 'Gereserveerd voor:';
$strings['N/A'] = 'N/A';
$strings['Update all recurring records in group'] = 'Alle herhaal-reserveringen in deze groep actualiseren?';
$strings['Delete?'] = 'Verwijder?';
$strings['Never'] = '-- Nooit --';
$strings['Days'] = 'Dagen';
$strings['Weeks'] = 'Weken';
$strings['Months (date)'] = 'Maanden (datum)';
$strings['Months (day)'] = 'Maanden (dag)';
$strings['First Days'] = 'Eerste dagen';
$strings['Second Days'] = 'Tweede dagen';
$strings['Third Days'] = 'Derde dagen';
$strings['Fourth Days'] = 'Vierde dagen';
$strings['Last Days'] = 'Laatste dagen';
$strings['Repeat every'] = 'Herhaal elke:';
$strings['Repeat on'] = 'Herhaal op:';
$strings['Repeat until date'] = 'Herhaal tot datum:';
$strings['Choose Date'] = 'Kies datum';
$strings['Summary'] = 'Notitie'; // bij reservering

$strings['View schedule'] = 'Kies Werkplaats:';
$strings['My Reservations'] = 'Mijn Reserveringen';
$strings['My Past Reservations'] = 'Mijn voorbije reserveringen';
$strings['Other Reservations'] = 'Reserveringen';
$strings['Other Past Reservations'] = 'Voorbije reserveringen';
$strings['Blacked Out Time'] = 'Black out';
$strings['Set blackout times'] = 'Blackouts instellen voor %s op %s';
$strings['Reserve on'] = 'Reserveer %s op %s';
$strings['Prev Week'] = '&laquo; Vorige week';
$strings['Jump 1 week back'] = 'Keer 1 week terug';
$strings['Prev days'] = '&#8249; Vorige %d dagen';
$strings['Previous days'] = '&#8249; Vorige %d dagen';
$strings['This Week'] = 'Deze week';
$strings['Jump to this week'] = 'Ga naar deze week';
$strings['Next days'] = 'Volgende %d dagen &middot;';
$strings['Next Week'] = 'Volgende week &raquo;';
$strings['Jump To Date'] = 'Ga naar datum';
$strings['View Monthly Calendar'] = 'Maandkalender';
$strings['Open up a navigational calendar'] = 'Navigeer kalender';

$strings['View stats for schedule'] = 'Statistieken voor werkplaats:';
$strings['At A Glance'] = 'In een oogopslag';
$strings['Total Users'] = 'Aantal gebruikers:';
$strings['Total Resources'] = 'Aantal reserveringsartikelen:';
$strings['Total Reservations'] = 'Aantal reserveringen:';
$strings['Max Reservation'] = 'Max reservering:';
$strings['Min Reservation'] = 'Min reservering:';
$strings['Avg Reservation'] = 'Gemiddelde reservering:';
$strings['Most Active Resource'] = 'Meest gebruikte artikel:';
$strings['Most Active User'] = 'Meest actieve gebruiker:';
$strings['System Stats'] = 'Systeemstatistieken';
$strings['phpScheduleIt version'] = 'phpScheduleIt versie:';
$strings['Database backend'] = 'Gegevensbank backend:';
$strings['Database name'] = 'Naam gegevensbank:';
$strings['PHP version'] = 'PHP versie:';
$strings['Server OS'] = 'Server OS:';
$strings['Server name'] = 'Servernaam:';
$strings['phpScheduleIt root directory'] = 'phpScheduleIt hoofdmap:';
$strings['Using permissions'] = 'Toegangsrechten gebruiken:';
$strings['Using logging'] = 'Logbestanden aanmaken:';
$strings['Log file'] = 'Logbestand:';
$strings['Admin email address'] = 'Emailadres beheerder:';
$strings['Tech email address'] = 'Emailadres technicus:';
$strings['CC email addresses'] = 'CC emailadressen:';
$strings['Reservation start time'] = 'Begintijd reservering:';
$strings['Reservation end time'] = 'Eindtijd reservering:';
$strings['Days shown at a time'] = 'Aantal dagen weergeven:';
$strings['Reservations'] = 'Reserveringen';
$strings['Return to top'] = 'Naar boven';
$strings['for'] = 'voor';

$strings['Select Search Criteria'] = 'Selecteer zoekcriteria';
$strings['Schedules'] = 'Werkplaatsen:';
$strings['All Schedules'] = 'Alle werkplaatsen';
$strings['Hold CTRL to select multiple'] = 'Druk CTRL-toets in om meerdere te selecteren';
$strings['Users'] = 'Gebruikers:';
$strings['All Users'] = 'Alle gebruikers';
$strings['Resources'] = 'Reserveringsartikelen';
$strings['All Resources'] = 'Alle reserveringsartikelen';
$strings['Starting Date'] = 'Begindatum:';
$strings['Ending Date'] = 'Einddatum:';
$strings['Starting Time'] = 'Begintijd:';
$strings['Ending Time'] = 'Eindtijd:';
$strings['Output Type'] = 'Type uitvoer:';
$strings['Manage'] = 'Beheer';
$strings['Total Time'] = 'Totale tijd';
$strings['Total hours'] = 'Aantal uren:';
$strings['% of total resource time'] = '% van de totale reserveringstijd';
$strings['View these results as'] = 'Bekijk de resultaten als:';
$strings['Edit this reservation'] = 'Bewerk deze reservering';
$strings['Search Results'] = 'Zoekresultaten';
$strings['Search Resource Usage'] = 'Zoek het gebruik van een artikel';
$strings['Search Results found'] = 'Zoekresultaten: %d reserveringen gevonden';
$strings['Try a different search'] = 'Probeer een andere zoekopdracht';
$strings['Search Run On'] = 'Zoeken op:';
$strings['Member ID'] = 'Lid ID';
$strings['Previous User'] = '&laquo; Vorige gebruiker';
$strings['Next User'] = 'Volgende gebruiker &raquo;';

$strings['No results'] = 'Geen resultaten';
$strings['That record could not be found.'] = 'Dit record kon niet gevonden worden.';
$strings['This blackout is not recurring.'] = 'Deze blackout wordt niet herhaald.';
$strings['This reservation is not recurring.'] = 'Deze reservering wordt niet herhaald.';
$strings['There are no records in the table.'] = 'Er zijn geen records in de %s tabel.';
$strings['You do not have any reservations scheduled.'] = 'Je hebt geen reserveringen gepland.';
$strings['You do not have permission to use any resources.'] = 'Je hebt geen toestemming om een artikel te gebruiken.';
$strings['No resources in the database.'] = 'Geen reserveringsartikelen in de gegevensbank.';
$strings['There was an error executing your query'] = 'Er is een fout opgetreden bij het uitvoeren van je zoekopdracht:';

$strings['That cookie seems to be invalid'] = 'Deze cookie lijkt ongeldig';
$strings['We could not find that logon in our database.'] = 'Deze login komt niet voor in de database.';	// @since 1.1.0
$strings['That password did not match the one in our database.'] = 'Het wachtwoord is onjuist.';
$strings['You can try'] = '<br />Je kan proberen nogmaals aan te melden, als je admin bent.';
$strings['You can try but you are not admin'] = '<br />Je kan proberen nogmaals aan te melden, als je admin bent. Ben je student of medewerker, dan heb je geen toegang tot dit systeem (heden: september 2013). Wil je materialen of gereedschappen lenen, ga dan naar de betreffende werkplaats.';
$strings['A new user has been added'] = 'Een nieuwe gebruiker is toegevoegd';
$strings['You have successfully registered'] = 'Je bent met succes geregistreerd!';
$strings['Continue'] = 'Ga verder...';
$strings['Your profile has been successfully updated!'] = 'Het profiel is met succes geactualiseerd!';
$strings['Please return to My Control Panel'] = '- Keer terug naar Home';
$strings['Valid email address is required.'] = 'Een geldig emailadres is vereist.';
$strings['First name is required.'] = '- Voornaam is vereist.';
$strings['Last name is required.'] = '- Naam is vereist.';
$strings['Phone number is required.'] = '- Telefoonnummer is vereist.';
$strings['That email is taken already.'] = '- Dit emailadres is reeds in gebruik.<br />Probeer nogmaals met een ander emailadres.';
$strings['Min 6 character password is required.'] = '- Wachtwoord van minimaal %s tekens is vereist.';
$strings['Passwords do not match.'] = '- Wachtwoorden zijn niet gelijk.';

$strings['Per page'] = 'Per pagina:';
$strings['Page'] = 'Pagina:';

$strings['Your reservation was successfully created'] = 'Je reservering is met succes aangemaakt';
$strings['Your reservation was successfully modified'] = 'Je reservering is met succes gewijzigd';
$strings['Your reservation was successfully deleted'] = 'Je reservering is met succes verwijderd';
$strings['Your blackout was successfully created'] = 'Je blackout is met succes aangemaakt';
$strings['Your blackout was successfully modified'] = 'Je blackout is met succes gewijzigd';
$strings['Your blackout was successfully deleted'] = 'Je blackout is met succes verwijderd';
$strings['for the follwing dates'] = 'voor de volgende data:';
$strings['Start time must be less than end time'] = 'Begintijd dient voor de eindtijd te komen.';
$strings['Current start time is'] = 'Huidige begintijd is:';
$strings['Current end time is'] = 'Huidige eindtijd is:';
$strings['Reservation length does not fall within this resource\'s allowed length.'] = 'Duur van de reservering valt buiten de toegestane termijn voor deze artikel.';
$strings['Your reservation is'] = 'Je reservering is:';
$strings['Minimum reservation length'] = 'Minimale reserveringstijd:';
$strings['Maximum reservation length'] = 'Maximale reserveringstijd:';
$strings['You do not have permission to use this resource.'] = 'Je hebt geen toegang tot deze artikel.';
$strings['reserved or unavailable'] = '%s tot %s is gereserveerd of onbeschikbaar.';	// @since 1.1.0
$strings['Reservation created for'] = '[uitleen] Reservering aangemaakt voor %s';
$strings['Reservation modified for'] = '[uitleen] Reservering gewijzigd voor %s';
$strings['Reservation toolate for'] = '[uitleen] Reservering te laat voor %s';
$strings['Reservation deleted for'] = '[uitleen] Reservering verwijderd voor %s';
$strings['created'] = 'aangemaakt';
$strings['modified'] = 'gewijzigd';
$strings['deleted'] = 'verwijderd';
$strings['Reservation #'] = 'Reservering #';
$strings['Contact'] = 'Contact';
$strings['Reservation created'] = 'Reservering aangemaakt';
$strings['Reservation modified'] = 'Reservering gewijzigd';
$strings['Reservation deleted'] = 'Reservering verwijderd';

$strings['Reservations by month'] = 'Reserveringen volgens maand';
$strings['Reservations by day of the week'] = 'Reserveringen volgens dag van de week';
$strings['Reservations per month'] = 'Reserveringen per maand';
$strings['Reservations per user'] = 'Reserveringen per gebruiker';
$strings['Reservations per resource'] = 'Reserveringen per bron';
$strings['Reservations per start time'] = 'Reserveringen per begintijd';
$strings['Reservations per end time'] = 'Reserveringen per eindtijd';
$strings['[All Reservations]'] = '[Alle reserveringen]';

$strings['Permissions Updated'] = 'Toegangsrechten aangepast';
$strings['Your permissions have been updated'] = 'Je %s toegangsrechten werden aangepast';
$strings['You now do not have permission to use any resources.'] = 'Nu heb je geen rechten om een artikel te gebruiken.';
$strings['You now have permission to use the following resources'] = 'Nu heb je toegang tot de volgende reserveringsartikelen:';
$strings['Please contact with any questions.'] = 'Contacteer me voor %s vragen.';
$strings['Password Reset'] = 'Wachtwoord wijzigen';

$strings['This will change your password to a new, randomly generated one.'] = 'Dit zal je wachtwoord wijzigen in een nieuw en willekeurig gekozen.';
$strings['your new password will be set'] = 'Als je emailadres is ingevuld en je op  "Wijzig wachtwoord" klikt, zal je wachtwoord meteen gewijzigd en via email toegestuurd worden.';
$strings['Change Password'] = 'Wijzig wachtwoord';
$strings['Sorry, we could not find that user in the database.'] = 'Sorry, deze gebruiker komt niet voor in de database.';
$strings['Your New Password'] = 'Je nieuwe %s wachtwoord';
$strings['Your new passsword has been emailed to you.'] = 'Success!<br />
    			Je nieuwe wachtwoord werd je toegestuurd.<br />
    			Gelieve je mailbox te checken voor je nieuwe wachtwoord, <a href="index.php">meld je aan</a>
    			met dit nieuwe wachtwoord en wijzig het meteen via de link &quot;Wijzig mijn profiel/Wachtwoord&quot;
    			in Home.';

$strings['You are not logged in!'] = 'Je bent niet aangemeld!';

$strings['Setup'] = 'Instellen';
$strings['Please log into your database'] = 'Meld je aan bij je gegevensbank';
$strings['Enter database root username'] = 'Vul de gebruikersnaam voor je gegevensbank in:';
$strings['Enter database root password'] = 'Vul het wachtwoord voor de gegevensbank in:';
$strings['Login to database'] = 'Meld je aan bij de gegevensbank';
$strings['Root user is not required. Any database user who has permission to create tables is acceptable.'] = 'Root gebruiker is <b>niet</b> vereist. Elke gebruiker die tabellen kan aanmaken in de gegevensbank wordt aanvaard.';
$strings['This will set up all the necessary databases and tables for phpScheduleIt.'] = 'Dit zal de nodige gegevensbank en tabellen voor phpScheduleIt instellen.';
$strings['It also populates any required tables.'] = 'Het vult ook alle vereiste tabellen in.';
$strings['Warning: THIS WILL ERASE ALL DATA IN PREVIOUS phpScheduleIt DATABASES!'] = 'Waarschuwing: DIT ZAL ALLE GEGEVENS VERWIJDEREN UIT EERDER GEINSTALLEERDE phpScheduleIt GEGEVENSBANKEN !';
$strings['Not a valid database type in the config.php file.'] = 'Geen geldig type gegevensbank in het config.php bestand.';
$strings['Database user password is not set in the config.php file.'] = 'Wachtwoord gebruiker gegevensbank is noet opgegeven in het config.php bestand.';
$strings['Database name not set in the config.php file.'] = 'Naam gegevensbank niet opgegeven in het config.php bestand.';
$strings['Successfully connected as'] = 'Succesvol verbonden als';
$strings['Create tables'] = 'Creeer tabellen &gt;';
$strings['There were errors during the install.'] = 'Er zijn fouten opgetreden tijdens de installatie. Mogelijk zal phpScheduleIt werken als het kleine fouten betreft.<br/><br/>'
	. 'Meld je vragen op het forun van <a href="http://sourceforge.net/forum/?group_id=95547">SourceForge</a>.';
$strings['You have successfully finished setting up phpScheduleIt and are ready to begin using it.'] = 'Je hebt phpScheduleIt met succes geinstalleerd en kan het nu beginnen gebruiken.';
$strings['Thank you for using phpScheduleIt'] = 'Vergeet zeker niet de MAP \'install\' VOLLEDIG TE VERWIJDEREN.'
	. ' Dit is cruciaal omdat je wachtwoord van de gegevensbank en andere gevoelige informatie in dit bestand staan.'
	. ' Wie dit nalaat riskeert de deur van je gegevensbank voor inbrekers op een kier te laten staan!'
	. '<br /><br />'
	. 'Bedankt om phpScheduleIt te gebruiken!';
$strings['This will update your version of phpScheduleIt from 0.9.3 to 1.0.0.'] = 'Dit zal het programma phpScheduleIt actualiseren van versie 0.9.3 naar 1.0.0.';
$strings['There is no way to undo this action'] = 'Je kan deze actie niet ongedaan maken!';
$strings['Click to proceed'] = 'Klik om verder te gaan';
$strings['This version has already been upgraded to 1.0.0.'] = 'Deze versie is reeds geupdatet naar 1.0.0.';
$strings['Please delete this file.'] = 'Gelieve dit bestand te verwijderen.';
$strings['Successful update'] = 'De update is gelukt';
$strings['Patch completed successfully'] = 'De installatie van de patch is gelukt';
$strings['This will populate the required fields for phpScheduleIt 1.0.0 and patch a data bug in 0.9.9.'] = 'Dit zal de vereiste velden voor phpScheduleIt 1.0.0 invullen en een gegevenslek in versie 0.9.9. dichten'
		. '<br />Dit is enkel vereist als je een manuele SQL update uitvoerde of wil upgraden van versie 0.9.9';

// @since 1.0.0 RC1
$strings['If no value is specified, the default password set in the config file will be used.'] = 'Als geen waarde wordt opgegeven, wordt het standaard paswoord uit het configuratiebestand gebruikt.';
$strings['Notify user that password has been changed?'] = 'Verwittig de gebruiker dat het paswoord is gewijzigd?';

// @since 1.1.0
$strings['This system requires that you have an email address.'] = 'Dit systeem vereist dat u over een emailadres beschikt.';
$strings['Invalid User Name/Password.'] = 'Ongeldige gebruikersnaam/paswoord.';
$strings['Pending User Reservations'] = 'Wachtende Gebruikersreserveringen';
$strings['toolate'] = 'not yet returned, and it is TOO LATE';
$strings['Approve'] = 'Goedkeuren';
$strings['Approve this reservation'] = 'Keur deze reservering goed';
$strings['Approve Reservations'] ='Confirmatie';

$strings['Announcement'] = 'Aankondiging';
$strings['Number'] = 'Nummer';
$strings['Add Announcement'] = 'Aankondiging toevoegen';
$strings['Edit Announcement'] = 'Aankondiging wijzigen';
$strings['All Announcements'] = 'Alle aankondigingen';
$strings['Delete Announcements'] = 'Aankondiging verwijderen';
$strings['Use start date/time?'] = 'Gebruik starttijd/-datum?';
$strings['Use end date/time?'] = 'Gebruik stoptijd/-datum?';
$strings['Announcement text is required.'] = 'Aankondigingstekst is vereist.';
$strings['Announcement number is required.'] = 'Aankondigingsnummer is vereist.';

$strings['Pending Approval'] = 'Wachtend op goedkeuring';
$strings['My reservation is approved'] = 'Mijn reservering is goedgekeurd';
$strings['This reservation must be approved by the administrator.'] = 'Deze reservering moet door de administrator goedgekeurd worden.';
$strings['Approval Required'] = 'Goedkeuring vereist, student mag dit zelf reserveren';
$strings['No reservations requiring approval'] = 'Geen reserveringen die goedkeuring vereisen';
$strings['Your reservation was successfully approved'] = 'Uw reservering werd goedgekeurd.';
$strings['Reservation approved for'] = 'Reservering goedgekeurd voor %s';
$strings['approved'] = 'Goedgekeurd';
$strings['Reservation approved'] = 'Reservering goedgekeurd';

$strings['Valid username is required'] = 'Geldige gebruikersnaam is vereist';
$strings['That logon name is taken already.'] = 'Die login is reeds in gebruik.';
$strings['this will be your login'] = ' '; // dit voorlopig niet
$strings['Logon name'] = 'Login naam';
$strings['Your logon name is'] = 'Uw login naam is %s';

$strings['Start'] = 'Afhalen';
$strings['End'] = 'Retour';
$strings['Start date must be less than or equal to end date'] = 'Startdatum moet kleiner of gelijk aan de einddatum zijn';
$strings['That starting date has already passed'] = 'Die startdatum is reeds voorbij';
$strings['Basic'] = 'Standaard';
$strings['Participants'] = 'Deelnemers';
$strings['Close'] = 'Sluiten';
$strings['Start Date'] = 'Startdatum';
$strings['End Date'] = 'Einddatum';
$strings['Minimum'] = 'Minimum';
$strings['Maximum'] = 'Maximum';
$strings['Allow Multiple Day Reservations'] = 'Meerdaagse reserveringen toelaten';
$strings['Invited Users'] = 'Uitgenodigde gebruikers';
$strings['Invite Users'] = 'Gebruikers uitnodigen';
$strings['Remove Participants'] = 'Deelnemers verwijderen';
$strings['Reservation Invitation'] = 'Uitnodiging voor reservering';
$strings['Manage Invites'] = 'Genodigden beheren';
$strings['No invite was selected'] = 'Er was geen genodigde geselecteerd';
$strings['reservation accepted'] = '%s heeft uw uitnodiging aanvaard op %s';
$strings['reservation declined'] = '%s heeft uw uitnodiging geweigerd op %s';
$strings['Login to manage all of your invitiations'] = 'Log in om al uw uitnodigingen te beheren';
$strings['Reservation Participation Change'] = 'Deelname aan de reservering is gewijzigd';
$strings['My Invitations'] = 'Mijn uitnodigingen';
$strings['Accept'] = 'Accepteer';
$strings['Decline'] = 'Weigeren';
$strings['Accept or decline this reservation'] = 'Deze uitnodiging aanvaarden of weigeren';
$strings['My Reservation Participation'] = 'Mijn reserveringsdeelname';
$strings['End Participation'] = 'Beeindig deelname';
$strings['Owner'] = 'Eigenaar';
$strings['Particpating Users'] = 'Deelnemende gebruikers';
$strings['No advanced options available'] = 'Geen geavanceerde opties beschikbaar';
$strings['Confirm reservation participation'] = 'Reservering deelname bevestigen';
$strings['Confirm'] = 'Bevestig';
$strings['Do for all reservations in the group?'] = 'Toepassen voor alle reserveringen in de groep?';

$strings['My Calendar'] = '<span class="eruit">Mijn kalender</span>';
$strings['View My Calendar'] = 'Mijn kalender bekijken';
$strings['Participant'] = 'Deelnemer';
$strings['Recurring'] = 'Herhaling';
$strings['Multiple Day'] = 'Meerdere dagen';

$strings['Day View'] = 'Dag weergave';
$strings['Week View'] = 'Week weergave';
$strings['Month View'] = 'Maand weergave';
$strings['Resource Calendar'] = 'Bron kalender';
$strings['View Resource Calendar'] = 'Kalender';	// @since 1.2.0
$strings['Signup View'] = 'Weergave Inschrijving';

$strings['Select User'] = 'Selecteer gebruiker';
$strings['Select Resource'] = 'Selecteer artikel';
$strings['Search Resources'] = 'Zoek artikel';
$strings['Change'] = 'Wijzig';

$strings['Update'] = 'Actualiseren';
$strings['phpScheduleIt Update is only available for versions 1.0.0 or later'] = 'phpScheduleIt Actualisatie is alleen beschikbaar voor versies 1.0.0 of later';
$strings['phpScheduleIt is already up to date'] = 'phpScheduleIt is reeds geactualiseerd';
$strings['Migrating reservations'] = 'Reserveringen aan het migreren.';

$strings['Admin'] = 'Admin';
$strings['Manage Announcements'] = '<span class="eruit">Aankondigingen</span>';
$strings['There are no announcements'] = 'Er zijn geen aankondigingen';
// end since 1.1.0

// @since 1.2.0
$strings['Maximum Participant Capacity'] = 'Maximale deelnemerscapaciteit';
$strings['Leave blank for unlimited'] = 'Blanco laten indien onbeperkt';
$strings['Maximum of participants'] = 'Deze bron heeft maximaal  %s deelnemers';
$strings['That reservation is at full capacity.'] = 'Deze reservering is volzet.';
$strings['Allow registered users to join?'] = 'Geregistreerde gebruikers toelaten voor deelname ?';
$strings['Allow non-registered users to join?'] = 'Niet-geregistreerde gebruikers toelaten voor deelname?';
$strings['Join'] = 'Deelnemen';
$strings['My Participation Options'] = 'Mijn deelname opties';
$strings['Join Reservation'] = 'Reservering Meedoen';
$strings['Join All Recurring'] = 'Alle herhaal Reserveringen meedoen';
$strings['You are not participating on the following reservation dates because they are at full capacity.'] = 'Je neemt geen deel aan de volgende reserveringsdata omdat deze volzet zijn.';
$strings['You are already invited to this reservation. Please follow participation instructions previously sent to your email.'] = 'Je bent reeds uitgenodigd voor deze reservering. Gelieve de richtlijnen voor deelname die je eerder werden gemaild te volgen.';
$strings['Additional Tools'] = 'Bijkomende Tools';
$strings['Create User'] = 'Gebruiker aanmaken';
$strings['Check Availability'] = 'Beschikbaarheid verifi&euml;ren';
$strings['Manage Additional Resources'] = 'Accessoires';
$strings['Number Available'] = 'Beschikbaar nummer';
$strings['Unlimited'] = 'Onbeperkt';
$strings['Add Additional Resource'] = 'Accessoires toevoegen';
$strings['Edit Additional Resource'] = 'Wijzig accessoires';
$strings['Checking'] = 'Bezig met verifi&euml;ren';
$strings['You did not select anything to delete.'] = 'Je hebt niets geselecteerd om te verwijderen.';
$strings['Added Resources'] = 'Toegevoegde artikelen';
$strings['Additional resource is reserved'] = 'De accessoire %s is beschikbaar in %s stuks. Die zijn allen uitgeleend.';
$strings['All Groups'] = 'Alle groepen';
$strings['Group Name'] = 'Groepnaam';
$strings['Delete Groups'] = 'Groepen verwijderen';
$strings['Manage Groups'] = '<span class="eruit">Groepen beheren</span>';
$strings['None'] = 'geen';
$strings['Group name is required.'] = 'Groepnaam is vereist.';
$strings['Groups'] = 'Groepen';
$strings['Current Groups'] = 'Huidige groepen';
$strings['Group Administration'] = 'Groepadministratie';
$strings['Reminder Subject'] = '[uitleen] Herinnering reservering - %s, %s %s';
$strings['Reminder'] = 'Herinnering';
$strings['before reservation'] = 'voor reservering';
$strings['My Participation'] = 'Mijn deelname';
$strings['My Past Participation'] = 'Mijn voorbije deelnames';
$strings['Timezone'] = 'Tijdszone';
$strings['Export'] = 'Uitvoeren';
$strings['Select reservations to export'] = 'Kies reserveringen voor uitvoer';
$strings['Export Format'] = 'Export Format';
$strings['This resource cannot be reserved less than x hours in advance'] = 'Deze bron kan niet minder dan %s uren op voorhand gereserveerd worden';
$strings['This resource cannot be reserved more than x hours in advance'] = 'Deze bron kan niet meer dan %s uren op voorhand gerserveerd worden';
$strings['Minimum Booking Notice'] = 'Minimum Booking Notice';
$strings['Maximum Booking Notice'] = 'Maximum Booking Notice';
$strings['hours prior to the start time'] = 'uren voor de starttijd';
$strings['hours from the current time'] = 'uren van de huidige tijd';
$strings['Contains'] = 'Bevat';
$strings['Begins with'] = 'Begint met';
$strings['Minimum booking notice is required.'] = 'Minimum reserveringsnotitie is vereist.';
$strings['Maximum booking notice is required.'] = 'Maximum reserveringsnotitie is vereist.';
$strings['Accessory Name'] = 'Naam accessoires';
$strings['Accessories'] = 'Accessoires';
$strings['All Accessories'] = 'Alle accessoires';
$strings['Added Accessories'] = 'Toegevoegde accessoires';
$strings['Description-Manual'] = 'Description / Manual';
// end since 1.2.0

$strings['checkout_via'] = 'Location out';
$strings['checkin_via'] = 'Location in';
$strings['reservation_status'] = 'Status Reservering'; // 0 res gemaakt, 1 res spullen opgehaald, 2 res spullen terug.

// letop: verwarrend :
// additional Resources = accessoires
// accesory = accessoires
// resources = artikelen
// ivm meer artikelen op reservering:


$strings['Add Resource'] = 'Artikel toevoegen';
$strings['Edit Resource'] = 'Wijzig artikelen';
// since 1.2
$strings['Resources Name'] = 'Naam artikelen';
$strings['Resources'] = 'Artikelen';
$strings['All Resources'] = 'Alle artikelen';
$strings['Added Resources'] = 'Toegevoegde artikelen';
$strings['Resources_Add'] = 'Artikelen toegevoegd'; 
$strings['Zelf'] = ' '; //dit is de admin - de admin vd werkplaats - deze default is opzettelijk 1 spatie

$strings['reservation_status'] = 'Status Reservering'; // 
 
$strings['reservation_status0']  = 'Reservering';
$strings['reservation_status1']  = 'Uitgifte';
$strings['reservation_status2']  = 'Inname';
$strings['reservation_status3']  = 'Gereed';
$strings['reservation_status4']  = 'Alle Gereed';

$strings['r_status_short0']  = 'R'; // reservering
$strings['r_status_short1']  = 'U'; // uit
$strings['r_status_short2']  = 'I'; // in
$strings['r_status_short3']  = 'G'; // gereed
$strings['r_status_short4']  = 'G all'; // gereed Alle (in this cluster)
$strings['all resources this cluster status ready']  = 'Alle artikelen in deze cluster Gereed'; // gereed Alle (in this cluster)

$strings['With Selected']  = 'met geselecteerde';
$strings['Status for this reservation']  = 'Status voor deze reservering';
$strings['Brand']  = 'Merk';
$strings['Package']  = 'Verpakking';
$strings['Description']  = 'Beschijving'; // 
$strings['Maintenance']  = 'Onderhoud'; // 
$strings['Owner']  = 'Eigenaar'; // 
$strings['Serial_nr']  = 'Serienummer'; // 
$strings['Fixed accesoires']  = 'Vast Toebehoren'; // Fixed accesoires= vast_toebehoren
$strings['aankoopbedrag']  = 'Aankoopbedrag'; 
$strings['datum_aankoop']  = 'Datum aankoop'; 
$strings['uitleennivo']  = 'Uitleennivo'; 
$strings['waardecat']  = 'Waardecategorie'; 
$strings['uitleenperiode']  = 'Uitleen periode'; 

$strings['Mobile phone']  = 'Tel. Mobiel';
$strings['osiris_ok_last']  = 'Osiris_ok_last';
$strings['osiris_ok_now']  = 'Osiris_ok_now';
$strings['demerit_text']  = 'Demerit';
$strings['demerit_punt']  = 'Demerit Punt';
$strings['last_modify_osiris']  = 'Last modify osiris';
$strings['lnotes']  = 'Notitie';
$strings['croho']  = 'Croho';
$strings['opleiding']  = 'Opleiding';
$strings['klas']  = 'Klas';
$strings['collegejaar_in']  = 'Collegejaar_in';
$strings['instellingstatus']  = 'Instellingstatus';
$strings['Email address 2']  = 'Email 2';
$strings['phone2']  = 'Tel. 2';
$strings['leenpermissie']  = 'Leenpermissie';

$strings['Today']  = 'Vandaag';

$strings['Too late']  = '<span class="valop">Te laat!</span>';
$strings['Too late1']  = '<span class="valop">laat.</span>';
$strings['Choose this for reservation']  = 'Kies deze voor reservering';
$strings['Time Slots']  = 'Time Slots';
$strings['Day']  = 'Dag';
$strings['Week']  = 'Week';
$strings['New Reservation']  = 'Nieuwe Reservation';
$strings['Print Contract']  = 'Print Contract';
$strings['Contractform']  = 'Contract soort';
$strings['Contract1']  = 'Contract 1';
$strings['Contract2']  = 'Contract 2';
$strings['Barcodekey']  = 'Sleutel';
$strings['Userstatus'] = 'Gebruiker Status';
$strings['Add resource'] = 'Artikel toevoegen'; // artikel toevoegen aan deze reservering, met zelfde gebruiker, zelfde begin en eindtijd
$strings['Savetocluster'] = 'Save Cluster';// save multires

$strings['You: ScheduleAdmin make this reservation for yourself. Not permitted, use blackout if you want to do this.'] = 'Als scheduleAdmin reserveer je voor jezelf. Wil je dit doen?';
$strings['Please change the enddate of this reservation to TODAY, because the resources are checked in.'] = 'Einddatum dient veranderd te worden in VANDAAG. Reden: de artikelen zijn checked in.';
$strings['Startdate is in the future, and reservation is checked in. better you DELETE this reservation'] = 'Begindatum ligt in de toekomst, en artikelen worden al check-in. Beter DELETE u deze reservering.';
$strings['Homepage Intro Student'] = 'Welkom op de uitleenpagina. Hieronder zie je jou reserveringen. Reserveringen met een witte achtergrond zijn akkoord. Een reservering met gele achtergrond moet nog akkoord gegeven worden door de werkplaatsbeheerder.<br />Wil je een nieuwe reservering maken klik dan op Rooster. Daar kun je een werkplaats en artikel kiezen, een beschikbaar artikel kun je reserveren voor een ochtend, een middag of een dag.';
$strings['Resource timeslot'] = 'Zoek naar Tijdslot';
$strings['Contract'] = 'Uitleen Contract';
$strings['contract1print'] = 'Op deze uitlening is contract 1 van toepassing, de contract voorwaardes zijn te lezen op <a href=//uitleen.rietveldacademie.nl/contract-au-1.pdf>uitleen.rietveldacademie.nl/contract-au-1.pdf</a> ';
$strings['contract2print'] = 'Op deze uitlening is contract 2 van toepassing, de contract voorwaardes zijn te lezen op <a href=//uitleen.rietveldacademie.nl/contract-au-2.pdf>uitleen.rietveldacademie.nl/contract-au-2.pdf</a> ';
$strings['contract1mail'] = 'Op deze uitlening is contract 1 van toepassing, de contract voorwaardes zijn te lezen op <a href=//uitleen.rietveldacademie.nl/contract-au-1.pdf>uitleen.rietveldacademie.nl/contract-au-1.pdf</a> ';
$strings['contract1mail'] = 'Op deze uitlening is contract 2 van toepassing, de contract voorwaardes zijn te lezen op <a href=//uitleen.rietveldacademie.nl/contract-au-2.pdf>uitleen.rietveldacademie.nl/contract-au-2.pdf</a> ';
$strings['contractslot1'] = 'Ik ga akkoord met de het contract.  ';
$strings['contractslot2'] = ', handtekening ';
$strings['Barcode'] = 'Barcode';
$strings['New Barcode'] = 'Nieuwe Barcode';
$strings['Do not touch this field UNLESS you scan a unique barcode'] = 'Doe niets met dit veld, tenzij je een unieke barcode inscand(EDIT mode).';
$strings['Do not touch this field UNLESS you scan a unique barcodeADD'] = 'Scan hier een unieke barcode, of laat dit veld leeg. (ADD mode).';
$strings['Do not touch this field UNLESS you scan a unique barcodeADDEDIT'] = 'Scan hier een unieke barcode, of laat dit veld leeg.';
$strings['Given barcode already exists'] = 'Opgegeven barcode bestaat al in bestand, mag NIET gebruikt worden';

$strings['Summary this reservation'] = 'Overzicht deze reservering';
$strings['add article'] = 'Art toevoegen';
$strings['Archive'] = 'Toon Archief Vorige Jaargangen';
$strings['Hide Reservations Past'] = 'Verberg Reserveringen Pass&eacute;';
$strings['Show Reservations Past'] = 'Toon Reserveringen Pass&eacute;';

$strings['Update voor ALLE artikelen'] = 'Update voor ALLE artikelen';
?>