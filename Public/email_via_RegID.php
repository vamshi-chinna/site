<?php
    $url=explode("?message", $_SERVER['HTTP_REFERER'])[0];
    $url= $url."?message=1#contact";

      $emailto = 'kartikay@walkwithweb.org';
      $replyto= 'support@regid.ca';
      $toname = 'Walk With Web - CEO';
      $emailfrom = 'do-no-reply@regeneratedidentities.org';
      $fromname = 'Regenerated Identities - System Email';
      $subject = '[WWW] New Message';
      $messagebody = '
*** Here is new message sent you WWW via online web form ***

Name :  '.$_POST['Name'].'
Email : '.$_POST['email'].'
Phone Number : '.$_POST['Number'].'
Message : '.$_POST['Message'].'


Warm Regards,
Technical Team | System Emails
Walk With Web Inc.




P.S. Incoming messages to do-not-reply@regeneratedidentities.org will be blocked and you may never receive a reply! For any questions or concerns please select on reply-to or create a new email to support@regid.ca.



*********END OF MESSAGE*******

You are receiving this e-mail because you have access to one or more projects on the Regenerated Identities network. To unsubscribe all emails sent from our team, please email at admin@regid.ca with "Unsubscribe" in subject line.

This e-mail message is sent by or on behalf of:
Kartikay Chadha
regeneratedidentities.org


CONFIDENTIALITY NOTICE: This e-mail message, including any attachments, is for the sole use of the intended recipient(s) and may contain confidential and privileged information. Any unauthorized review, use, disclosure or distribution is prohibited. If you are not the intended recipient, please contact the sender by reply e-mail and destroy all copies of the original message.

AVIS DE CONFIDENTIALITÉ : Ce message électronique, ainsi que tout fichier qui y est joint, est reserve à l\'usage exclusif du destinatairevisé et peut contenir des renseignements confidentiels et privilégiés. Toute lecture, utilisation, divulgation ou distribution non autorisée estinterdite. Si vous n\'êtes pas le destinataire visé, veuillez en aviser l\'expéditeur par retour de courriel et détruire toutes les copies du message original.

*******---------END OF EMAIL--------*****';
      $headers =
        'Return-Path: ' . $emailfrom . "\r\n" .
        'From: ' . $fromname . ' <' . $emailfrom . '>' . "\r\n" .
        'X-Priority: 1' . "\r\n" .
        'X-Mailer: PHP ' . phpversion() .  "\r\n" .
        'Reply-To: RegID Support <' . $replyto . '>' . "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-Transfer-Encoding: 8bit' . "\r\n" .
        'Content-Type: text/plain; charset=UTF-8' . "\r\n";
      $params = '-f ' . $emailfrom;
      $test = mail($emailto, $subject, $messagebody, $headers, $params);
      // $test should be TRUE if the mail function is called correctly


        header( 'location: '.$url);


?>
