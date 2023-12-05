<?php

/*
Send email using PHPMailer and SMTP.
This file uses the PHPMailer library to send emails via SMTP with authentication.
Requires the prior installation of the PHPMailer library via Composer.
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuration for the Gmail SMTP server
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jagermeisterstisch@gmail.com';
    $mail->Password = 'gonk vxqf vrpb raga';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Email configuration
    $mail->setFrom('jagermeisterstisch@gmail.com', 'Jägermeisters Tisch');
    $mail->addAddress($to);

    // Email content configuration
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>