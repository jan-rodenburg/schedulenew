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
<br>Admin help (lang/nl.admin.help.php )<br>
<h4>Home ( = Zoek naar tijdslot)</h4>
Home is een goed beginpunt om een nieuwe reservering te maken. Het zoekveld vindt artikelen en bied timeslots naar het reserveerrooster voor dit artikel. Voorbeeld: je wilt iemand een beamer lenen, tiep in <em>beam</em>, en je ziet al jou beamers, klik week of dag voor roosteroverzicht. Je ziet de beschikbaarheid van dit artikel en kunt meteeen reserveren.
<h4>Rooster</h4>
Navigeer door het rooster via vandaag, volgende week etc. Het zoekveld filtert op artikelen. Een artikel wat op inactief staat wordt hier niet getoond.<br><br>

Klik op een artikel en begintijdstip vakje om reservering te starten.
<h4>Reservering</h4>
<ul>
	<li>Tabblad Basic = Standaard invoervelden voor reservering.</li>
	<li>Tabblad Accessoire = Standaard invoer accessoires.</li>
	<li>Notitie - notitie over deze reservering</li>
	<li>Gebruiker wijzig - klik hier om de lener te kiezen.</li>
	<li>verwijder - indien aangevinkt wordt de reservering verwijderd.</li>
	<li>Indien gekozen gebruiker demeritpunten heeft dan worden dit getoond in rode letters.</li>
	<li>Indien op deze reservering meerdere artikelen worden geleend, volg de buttons Opslaan, en Artikel toevoegen.</li>
</ul>
- location out, en location in , alleen invullen indien uitgifte en inname op andere locatie is.<br>
<br>
De status van ALLE artikelen kan worden geupdate indien een Vinkje wordt gezet bij 'Update voor ALLE artikelen'. (zie ook: G alle gereed  )<br>
<br>

<h4>Beheer Reserveringen</h4>
Dit is het overzichtscherm van actuele reserveringen.<br>
De button <strong>Toon Reserveringen Passe</strong> toont ook oudere reserveringen.<br>
Meerdere artikelen hebben meerdere regels in dit scherm. Horen de artikelen bij elkaar in 1 reservering dan zie je dat aan de vertikale kleurlijn. Het procesverloop van de reserveringen zien en wijzigen via status RUIG:
<ul>
	<li>R - reservering</li>
	<li>U - uitgifte</li>
	<li>I - inname</li>
	<li>G - gereed</li>
	<li>G alle gereed  - Hiermee zijn alle artikelen in een cluster in 1x gereed te melden. Ververs het scherm om de nieuwe status te zien. Deze cluster is meteen naar de reserveringen passee.</li>
</ul>
Het zoekveld filtert op vrijwel alles: je kunt bijvoorbeeld ingeven:
<ul>
	<li>Een datum</li>
	<li>Gebruiker</li>
	<li>Artikel</li>
	<li>Begintijd</li>
	<li>Eindtijd</li>
	<li>Uit via - In via</li>
	<li>Status Reservering</li>
</ul>
Het zoekveld vind ook reserveringen op nummer dat je in reserveer-emailkunt vinden, voorbeeld: pk14ddb86c392739.
<ul>
	<li>Een delete met cylinder-icoon verwijderd dit artikel op de reservering.</li>
	<li>Een delete met kruis-icoon verwijdert de gehele cluster reservering</li>
	<li>De mailtoolate-button verstuurd een email aan de gebruiker met 'te laat teruggebracht' boodschap.</li>
</ul>
<h4>Zoek naar tijdslot = Home</h4>
Dit scherm is een goed beginpunt om een nieuwe reservering te maken. Het zoekveld vindt artikelen en bied time-slot links naar het rooster voor dit artikel. Voorbeeld: je wilt iemand een beamer lenen, tiep in <em>beam</em>, en je ziet al jou beamers, klik week of dag voor roosteroverzicht. Je ziet de beschikbaarheid van dit artikel en kunt meteen reserveren.
<h4>Confirmatie</h4>
Het confirmeren van reserveringen die door gebruikers zijn gemaakt. Deze 'wachtende' (pending) reservering kan gewijzigd worden door zowel admin als door student. Akkoord geven leidt tot een automatische email naar de gebruiker. Een akkoord-reservering wordt automatich zichtbaar in het overzicht reserveringen.
<h4>Gebruikers en medewerkers</h4>
Gebruikers zijn alle studenden en komen uit de osiris administratie er zijn beperkte edit mogelijkheden. Medewerkers hebben uitgebreidere editmogelijkheden. Deze kunnen vrij worden toegevoegd en verwijderd in het persoonsbestand. De medewerker en student info wordt gedeeld tussen alle admins. Denk aan slecht gedrag (via demeritpunten), dit is zichtbaar voor alle admins.
<h4>Gebruikers</h4>
Het gebruikersbestand krijgt haar data uit het osiris studentenbestand. De waardes uit osiris zijn vast (osiris is master). <br>Een aantal velden zijn uitleen-specifiek, en kunnen wel gewijzigd worden:
<ul>
	<li>tel.2 - infoveld - vrij in te vullen. dit is recente informatie van de werkvloer. (andere telefoonnummers zijn uit osiris)</li>
	<li>emailadres2 - dit veld wordt gebruikt voor alle emails van uitleen, indien dit veld leeg is dan wordt het osisris emailadres gebruikt. voor inloggen dient de gebruiker altijd het osirisemailadres te gebruiken.</li>
	<li>notitie</li>
	<li>demerit - aantal strafpunten die een student heeft</li>
	<li>demerit - opmerkingen over slecht gedrag van deze gebruiker: noteer als volgt</li>
	<li>datum:afzender:opmerking</li>
	<li>leenpermissie - 1= propedeuse, 4= master</li>
	<li>wachtwoord - voorlopig niet van toepassing</li>
</ul>
<h4>Medewerkers</h4>
Medewerkers kunnen in het systeem ook als lener worden gekozen. De velden zijn uitleen-specifiek en kunnen vrij gewijzigd worden:
<ul>
	<li>emailadres</li>
	<li>naam en achternaam</li>
	<li>emailadres2 - dit veld wordt gebruikt voor alle emails van uitleen, indien dit veld leeg is dan wordt het osisris emailadres gebruikt.</li>
	<li>notitie - vrij in te vullen</li>
	<li>demerit - aantal strafpunten die een student heeft</li>
	<li>demerit - opmerkingen over slecht gedrag van deze gebruiker.</li>
	<li>leenpermissie: 1= propedeuse, 2= medewerker 4= master</li>
	<li>wachtwoord - voorlopig niet van toepassing</li>
</ul>
Bij medewerkers is het aanbevolen om de juiste barcode op te geven. Met name de loge wil de medewerker kiezen mbv. de barcodescanner.

<h4>Artikelen</h4>
Overzicht en beheer van alle artikelen van jou werkplaats. Als je een nieuwe barcode ingeeft voor een artikel dan wordt het reserveringsbestand ook bijgewerkt met deze barcode.
Een artikel kan inactief worden gezet, dan kan deze niet meer gereserveerd worden. Gebruik dit als en artikel in reparatie gaat.

Wordt een artikel verwijderd dan worden ook alle reserveringen van dit artikel verwijderd.
<ul>
	<li>Uitleennivo - 1=alledaags artikel, 3=duur en specialistisch, 4=bestemd voor masteropleiding. default=1</li>
	<li>Goedkeuring vereist - indien aangevinkt dan mag student (die inlogrechten heeft) zelf dit artikel reserveren. Standaard: UIT</li>
	<li>Meerdaagse reserveringen toelaten - indien niet gevuld, dan kan de min. en max. uitleenlengte in uren worden ingegeven. Standaard: AAN</li>
</ul>
Een artikel enkel dan verwijderen als deze niet is uitgeleend op dit moment.
<h4>Accessoires</h4>
Overzicht en beheer van de accessoires.
<ul>
	<li>Een accessoire heeft een eenvoudige beschrijving.</li>
	<li>Een accessoire gaat per 1 stuk, die inwisselbaar zijn met elkaar.</li>
	<li>Een zelfde accessoire kan met meerdere malen op 1 reservering.</li>
	<li>Een accessoire heeft geen barcode. een accessoire wordt enkel uitgeleend samen met minstens 1 artikel. Er is een DUMMY-artikel met naam -accessoire only-. Gebruik dit artikel als je enkel accessoires wilt uitlenen.</li>
	<li>Een accessoire wordt niet gecontroleerd op beschikbaarheid.</li>
	<li>Een accessoire wordt altijd vermeld op de reservering en het contract.</li>
</ul>
Een accessoire enkel dan verwijderen als deze niet is uitgeleend op dit moment.
<h4>Toon archief</h4>
Reserveringen van vorige jaargangen worden getoond (voor zover aanwezig). Hier kun je geen wijzigingen aanbrengen.<br>
<br>
===================================<br>
technisch contact: jan rodenburg<br>
larka.nl<br>
jan@larka.nl<br>
www.larka.nl<br>
010 477 1335 of 06 433 76 433<br>
===================================<br><br>

</div>
