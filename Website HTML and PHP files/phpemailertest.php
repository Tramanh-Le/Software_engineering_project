<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\STMP;

require 'libs/phpmailer/src/Exception.php';
require 'libs/phpmailer/src/PHPMailer.php';
require 'libs/phpmailer/src/SMTP.php';

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "9621312@gmail.com";
$mail->Password = "2BlueTankJumped!";
$mail->SetFrom("9621312@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("nico@rodester.com");
$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
?>
