<?php
/**
/***
  EMAIL MESSAGES
  Please translate these email messages into your language.  You should keep the sprintf (%s) placeholders
   in their current position unless you know you need to move them.
  All email messages should be surrounded by double quotes "
  Each email message will be described below.
***/
// @since 1.1.0
// Email message that a user gets after they register
// janr , empty %s %s is position institution
$email['registernieuwunused'] = "%s, %s \r\n"
				. "You have successfully registered with the following information:\r\n"
				. "Logon: %s\r\n"
				. "Name: %s %s \r\n"
				. "Phone: %s \r\n\r\n"
				. "This means that you are registered as rietveld-coworker and you can reserve and borrow keys, tools and equipments at:\r\n"
				. "- loge\r\n"
				. "- Tool-o-theek\r\n"
				. "- Uitleen 2.42\r\n"
				. "- fotowerkplaats\r\n\r\n"
				. "Please direct any resource or reservation based questions to %s";
// Email message that a user gets after they register. overwrite
$email['register'] = "%s, %s \r\n"
				. "You have successfully registered with the following information:\r\n"
				. "Logon: %s\r\n"
				. "Name: %s %s \r\n"
				. "Phone: %s \r\n"
				. "Institution: %s \r\n"
				. "Position: %s \r\n\r\n"
				. "Please log into the scheduler at this location:\r\n"
				. "%s \r\n\r\n"
				. "You can find links to the online scheduler and to edit your profile at My Control Panel.\r\n\r\n"
				. "Please direct any resource or reservation based questions to %s";

// Email message the admin gets after a new user registers
$email['register_adminnieuwunused'] = "Administrator,\r\n\r\n"
					. "A new user has registered with the following information:\r\n"
					. "Email: %s \r\n"
					. "Name: %s %s \r\n"
					. "Phone: %s \r\n\r\n";
// @since 1.1.0
// Email message that a user gets after they register
$email['register'] = "%s, %s \r\n"
				. "You have successfully registered with the following information:\r\n"
				. "Logon: %s\r\n"
				. "Name: %s %s \r\n"
				. "Phone: %s \r\n"
				. " %s \r\n\r\n"
				. " %s \r\n\r\n"
				. "This means that you are registered as rietveld-coworker and you can reserve and borrow keys, tools and equipments at:\r\n"
				. "- loge\r\n"
				. "- Tool-o-theek\r\n"
				. "- Uitleen 2.42\r\n"
				. "- fotowerkplaats\r\n\r\n"
				. "%s \r\n\r\n"
				. "You can find links to the online scheduler and to edit your profile at My Control Panel.\r\n\r\n"
				. "xx %s";

// Email message the admin gets after a new user registers
$email['register_admin'] = "Administrator,\r\n\r\n"
					. "A new user has registered with the following information:\r\n"
					. "Email: %s \r\n"
					. "Name: %s %s \r\n"
					. "Phone: %s \r\n"
					. "Institution: %s \r\n"
					. "Position: %s \r\n\r\n";

// First part of the email that a user gets after they create/modify/delete a reservation
// 'reservation_activity_1' through 'reservation_activity_6' are all part of one email message
//  that needs to be assembled depending on different options.  Please translate all of them.
// @since 1.1.0
// First part of the email that a user gets after they create/modify/delete a reservation
// 'reservation_activity_1' through 'reservation_activity_6' are all part of one email message
//  that needs to be assembled depending on different options.  Please translate all of them.
// @since 1.1.0

// 10 naam werkplaats
$email['reservation_activity_10'] = "Dear %s,\r\n<br />"
. "The things you borrowed at the %s were not returned in time! \r\n\r\n<br/><br/>"
. "YOU SHOULD IMMEDIATELY RETURN THE FOLLOWING ITEM(S)!\r\n<br/>";
			
$email['reservation_activity_1'] = "Dear %s,\r\n<br />"
			. "This mail confirms a booking is %s with number %s.\r\n\r\n"
			. "Please use this booking number when contacting %s with any questions.\r\n\r\n<br/><br/>"
			. "Pick up your equipment/key on : %s %s <br/>Return time is : %s %s \r\n<br/><br/>";
$email['reservation_activity_2'] = "This booking has been repeated on the following dates:\r\n<br/>";
$email['reservation_activity_3'] = "All recurring bookings in this group were also %s.\r\n\r\n<br/><br/>";
$email['reservation_activity_4'] = "Note with this booking: %s\r\n\r\n<br/><br/>";

$email['reservation_activity_5'] = "Note that there is a penalty for returning things too late!\r\n<br/>If this booking is a mistake, please contact: %s \r\n\r\n<br/><br/>";
$email['reservation_activity_5_late'] = "If you do not take immediate action you will get one or more demerit points, which can result in not being able to lend anything.\r\n\r\n<br/><br/>" . "If this mail isn't for you please contact de manager:  %s \r\n\r\n<br/><br/>";			
// $email['reservation_activity_6'] = "Please direct all technical questions to <a href=\"mailto:%s\">%s</a>.\r\n\r\n<br/><br/>";
$email['reservation_activity_6'] = "<br/>";
// @since 1.1.0
$email['reservation_activity_7'] = "%s,\r\n<br />"
			. "Booking #%s has been approved.\r\n\r\n<br/><br/>"
			. "Please use this number when contacting the administrator with any questions.\r\n\r\n<br/><br/>"
			. "A booking between %s %s and %s %s for %s"
			. " located at %s has been %s.\r\n\r\n<br/><br/>";
// janr add package, vast_toebehoren
$email['reservation_activity_11'] = "  <tr class=\"valuesfirst\">"
    . "<td>%s </td>"
    . "<td>%s </td>"
	. "<td>%s </td>"
    . "<td><b>%s </b></td>"
    . "<td><b>%s </b></td>"
	. "<td>%s </td>"
    . "<td>%s </td>"
    . "<td>%s </td>"
    . "<td>%s </td>"
	    . "<td>%s </td>"
  . "</tr>\r\n\r\n";
  $email['reservation_activity_11b'] = "  <tr class=\"valueslast\">"
    . "<td colspan=4 align=right> </td>"
    . "<td colspan=5 align=left><a href=\"%s\">%s</a> &nbsp;</td>"
  . "</tr>\r\n\r\n";
     $email['reservation_activity_11bleeg'] = "  <tr class=\"valueslast\">"
    . "<td colspan=4 align=right>&nbsp; </td>"
    . "<td colspan=5 align=left> &nbsp;</td>"
  . "</tr>\r\n\r\n";
    $email['dottedline'] = "  <tr class=\"valuesfirst\">"
    . "<td colspan=10></td>"
  . "</tr>\r\n\r\n";
  // $email['reservation_activity_12'] = "Op deze uitlening is contract 1 van toepassing, de contract voorwaardes zijn te lezen op: ";
  $email['reservation_activity_12'] = "On the loan contract 1 is applicable, the contract conditions are here: ";
//janr
// Email that the user gets when the administrator changes their password
$email['password_reset'] = "Your %s password has been reset by the administrator.\r\n\r\n"
			. "Your temporary password is:\r\n\r\n %s \r\n\r\n"
			. "Please use this temporary password (copy and paste to be sure it is correct) to log into %s at %s";

// Email that the user gets when they change their lost password using the 'Password Reset' form
$email['new_password'] = "%s,\r\n"
            . "Your new password for your %s account is:\r\n\r\n"
            . "%s\r\n\r\n"
            . " %s  \r\n"
            . "Please note: If you are a student or coworker, you cannot use this system. "
            . "You are welcome to borrow equipment; Just go to the werkplaats. %s";

// @since 1.1.0
// Email that is sent to invite users to a reservation
$email['reservation_invite'] = "%s has invited you to participate in the following reservation:\r\n\r\n"
		. "Resource: %s\r\n"
		. "Start Date: %s\r\n"
		. "Start Time: %s\r\n"
		. "End Date: %s\r\n"
		. "End Time: %s\r\n"
		. "Summary: %s\r\n"
		. "Repeated Dates (if present): %s\r\n\r\n"
		. "To accept this invitation click this link (copy and paste if it is not highlighted) %s\r\n"
		. "To decline this invitation click this link (copy and paste if it is not highlighted) %s\r\n"
		. "To accept select dates or manage your invitations at a later time, please log into %s at %s";

// @since 1.1.0
// Email that is sent when a user is removed from a reservation
$email['reservation_removal'] = "You have been removed from the following reservation:\r\n\r\n"
		. "Resource: %s\r\n"
		. "Start Date: %s\r\n"
		. "Start Time: %s\r\n"
		. "End Date: %s\r\n"
		. "End Time: %s\r\n"
		. "Summary: %s\r\n"
		. "Repeated Dates (if present): %s\r\n\r\n";	
// @since 1.2.0
// Email body that is sent for reminders
$email['Reminder Body'] = "Your reservation for %s from %s %s to %s %s is approaching.";
// november 13 - special tool o theek te laat email

// 1 inittekst
// voornaam
// startdatum
// einddatum
// eindtijd
$email['tot-telaat_1'] = "Dear %s,\r\n<br /><br />"
. "On %s you have borrowed things from the Tool-O-Theek. We agreed you would return this on %s at %s, yet the items have not been returned.\r\n<br/><br />Please return these item(s) as soon as possible;\r\n<br/><br />";

// 2 iteratief
// artikel
// notitie, evt
$email['tot-telaat_2a'] = "<b>%s</b> - %s\r\n<br />";
$email['tot-telaat_2b'] = "<b>%s</b>\r\n<br />";

// 3 en 4 signature
/* toevoeging sept 2015
When things are not returned in time you have to pay a fine:

€ 0,50 per day for small, non-electrical tools
€ 1,00 per day for large and/or electrical tools

*/

$email['tot-telaat_3'] = "\r\n<br/>When things are not returned in time you have to pay a fine:"
." <br />"
. "\r\n<br/>&euro; 0,50 per day for small, non-electrical tools"
. "\r\n<br/>&euro; 1,00 per day for large and/or electrical tools"
." <br /><br />"
."Please be advised that not returning items in time can result in not being allowed to lend anything anymore."
." \r\n<br />"
."Read the agreement that applies upon lending tools and accessories from the Tool-O-Theek ";


$email['tot-signatuur'] = "<br /><br />Thank you.\r\n<br /><br />"
                . "Best regards,<br />"
                . "Tool-O-Theek Team<br /><br />"
                                . "     ---"
                                . "<br />"
                                . "     Tool-O-Theek <br />"
                                . "     Gerrit Rietveld Academie <br />"
                                . "<br />"
                                . "     Tel. 020 5711 680<br />"
                                . "<br />"
                                . "     Fred. Roeskestraat 96<br />"
                                . "     1076 ED Amsterdam<br />"
                                . "<br />"
                                . " <i> If this mail is not for you please contact the manager: toolotheek@rietveldacademie.nl</i>";
								
                // voornaam
                // startdatum
                // einddatum
                // eindtijd
                $email['tot-created_1'] = "Dear %s,\r\n<br /><br />"
                . "This mail confirms a reservation of the following articles at the Tool-O-Theek. \r\n<br/><br />";

				
                // 2 iteratief
                // artikel
                // notitie, evt
                $email['tot-created_2a'] = "<b>%s</b> - %s\r\n<br />";
                $email['tot-created_2b'] = "<b>%s</b>\r\n<br />";

										
                                // date and time                                        
                                $email['tot-created_start'] = "Please pick up your reservation on %s at %s.";
                                $email['tot-created_eind'] = "Return time is on %s at %s.";
                // 3 sign-off
                $email['tot-created_3'] = "\r\n<br/>Read the agreement that applies upon lending tools and accessories from the Tool-O-Theek ";

?>