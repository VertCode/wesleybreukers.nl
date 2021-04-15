<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once '../includes/PHPMailer/Exception.php';
require_once '../includes/PHPMailer/PHPMailer.php';
require_once '../includes/PHPMailer/SMTP.php';

function sendMail($from, $name, $company, $subject, $message) {
    $mail = new PhpMailer(true);
    try {
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = 'host';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'contact@vertcode.eu';
        $mail->Password = 'password';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $parsedCompany = null;
        if ($company !== null) {
            $parsedCompany = '<h3>Company: </h3><a>' . $company . '</a>';
        }

        $mail->setFrom($from, $name);
        $mail->addAddress('wesley@vertcode.eu', 'Wesley Breukers');
        $mail->addReplyTo($from, $name);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = getTemplate($from, $name, $parsedCompany, $subject, $message);
        $mail->AltBody = $message;
        $mail->send();

        header("Location: ../pages/contact.php?mailsend");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function getTemplate($from, $name, $company, $subject, $message) {
    return '
<html>
   <style>
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu+Mono:ital@0;1&display=swap");
        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
    </style>
    <div class="centered">
    <h3>From: </h3><a>' . $from . ' - ' . $name . '</a>
    '.$company.'
    <h3>Subject: </h3><a>' . $subject . '</a>
    <h3>Message:</h3>
    <p>
      ' . $message . '
    </p> 
    </div>   
            
</html>
    ';

}
header("Location: ../pages/contact.php");