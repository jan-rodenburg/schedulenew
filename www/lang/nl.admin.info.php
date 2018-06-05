<?php
/**
* English (en) help translation file.
* This also serves as the base translation file from which to derive
*  all other translations.
*  
* @author Nick Korbel <lqqkout13@users.sourceforge.net>
* @translator Your Name <your@email.com>
* @version 01-08-05
* @package Languages
*
* Copyright (C) 2003 - 2007 phpScheduleIt
* License: GPL, see LICENSE
*/
///////////////////////////////////////////////////////////
// INSTRUCTIONS
///////////////////////////////////////////////////////////
// This file contains all the help file for phpScheduleit.  Please save the translated
//  file as '2 letter language code'.help.php.  For example, en.help.php.
// 
// To make phpScheduleIt help available in another language, simply translate this
//  file into your language.  If there is no direct translation, please provide the
//  closest translation.
//
// This will be included in the body of the help file.
//
// Please keep the HTML formatting unless you need to change it.  Also, please try
//  to keep the HTML XHTML 1.0 Transitional complaint.
///////////////////////////////////////////////////////////
?>
Admin help (lang/nl.admin.info.php)
<a name="barcode-coworker"></a>
<h4>barcode wijziging medewerker</h4>
<p>
Op ieder moment kun je een nieuwe medewerker registreren. Het wordt aanbevolen om op een later tijdstip/spoedig de juiste barcode van de medewerker op te geven.
<p>Bij ingave van de (nieuwe) barcode aan een medewerker die al in het systeem staat:<br>
- Alle bestaande reserveringen en passee reserveringen worden toegeschreven aan de nieuwe barcode.<br>
<br>

<p>Wat er gebeurt is dit:<br>
- Het medewerkerrecord met oude barcode blijft bestaan en wordt op NONACTIEF gezet.<br>
- Nieuw medewerker record met up to date barcode.<br>

<a name="set-coworker-nonactive"></a>
<h4>delete medewerker</h4>
<p>
Bij delete kan de medewerker niet meer lenen. De medewerker is nergens meer zichtbaar. Enkel in het archief kan deze nog voorkomen (oude leningen). Feitelijk wordt de medewerker op NONACTIEF gezet.<br>
<br>


<p>
<a name="barcode-resource"></a>
<h4>barcode wijziging artikel</h4>
<p>
Bij het toekennen van een nieuwe barcode aan een artikel worden alle bestaande en archiefreserveringen waarin dit artikel voorkomt aangepast.
<p>
<p>
<a name="uitleennivo"></a>
<h4>Uitleennivo</h4>
<p>
nivo 1, eenvoudig alledaags artikel, voor iedereen te lenen.<br />
nivo 2, enige ervaring vereist<br />
nivo 3, een specialistisch en duur apparaat<br />
nivo 4, bestemd voor studenten master opleiding
<p>
<p>
<a name="waardecat"></a>
<h4>Waardecategorie</h4>
<p>Vooralsnog wordt deze waarde niet gebruikt in het systeem, enkel informatief.</p>
<p>
 categorie 0 voor aanschafwaarde tot &euro;50<br />
 categorie 1 voor aanschafwaarde &euro;50 tot &euro;250 (default)<br />
 categorie 2 &euro;250 - 1500<br />
 categorie 3 groter dan &euro;1500<br />
<p>
<a name="uitleenperiode"></a>
<h4>Uitleenperiode</h4>

<p>Defaultwaarde = 0: Bij een nieuwe reservering wordt de einddatum/tijdstip op 1 uur later gezet</p>

<p>Uitleenperiode – bij een reservering heeft een artikel  een ideaal inlever tijdstip afhankelijk van de begintijd reservering. Het ideaal tijdstip wordt naar het reserveerscherm geschreven, alleen bij een nieuwe reserving met eerste artikel.

<p>Het veld uitleenperiode (engels: Reservation Period) staat default op 0. Wil je dit wijzigen 1, 2, 3 etcetera dan dien je op de hoogte te zijn van de periode-definities van jou werkplaats, deze zijn:
<p>
De periode-definities van <b>fotografiewerkplaats</b>:<br />
Type 0 – Tijdseenheid = 1 uur<br />
Type 1 – Tijdseenheid = dagdeel<br />
Type 2 - Tijdseenheid = weekdeel<br />
Type 3 - Tijdseenheid = week<br />
<p>

Type 1 – Tijdseenheid = dagdeel:<br />

Indien reserving starttijd is 9 of 10 of 11 of 12 uur dan IN = 13 uur<br />
Indien reserving starttijd is 13 of 14 of 15 of 16 uur dan IN = 17<br />
Indien reserving starttijd is 17 of 18 of 19 uur dan IN = 20<br />

<p>
Type 2 - Tijdseenheid = weekdeel<br />
(Student leent altijd van dinsdag tot vrijdag of vise versa).<br />
Indien UIT.dag  is DINSDAG (of de maandag of zondag of zaterdag ervoor), dan IN is eerste komende VRIJDAG<br />
Indien UIT.dag  is VRIJDAG (of de donderdag of woensdag ervoor), dan IN is eerste komende DINSDAG<br />
en het tijdstip IN hierbij:<br />
zoals bij type 1<br />

<p>
Type 3 - Tijdseenheid = week<br />
IN dag is UIT DAG plus 7 dagen<br />
en het tijdstip IN hierbij:<br />
zoals bij type 1<br />

<p>
De periode-definities van <b>uitleen 522</b>:<br />
Type 1<br />
INtijd wordt 13 uur de volgende dag, waarbij: <br />
- als volgende dag is woensdag, dan wordt het donderdag, als de volgende dag is zaterdag of zondag, dan wordt het maandag.<br />


===================================<br>
technisch contact: jan rodenburg<br>
larka.nl<br>
jan@larka.nl<br>
www.larka.nl<br>
010 477 1335 of 06 433 76 433<br>
===================================<br>
</div>
