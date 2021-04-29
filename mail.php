<?php
// PHPMailer classes into the global namespace
use phpmailer\phpmailer\PHPMailer; 
use phpmailer\phpmailer\Exception;
// Base files 
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// create object of PHPMailer class with boolean parameter which sets/unsets exception.
function sendOPT($email, $otp){

    $mail = new PHPMailer(true);                              
    try {
        //$mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = 'dhavvu6@gmail.com';  // sender gmail host              
        $mail->Password = 'googledhavvu6'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 587;   // port for SMTP     

        $mail->setFrom('dhavvu6@gmail.com', "Deal-A-Wheel"); // sender's email and name
        $mail->addAddress($email, "Receiver");  // receiver's email and name

        $mail->Subject = 'OTP For Deal-A-Wheel';
        $mail->Body    = 'Hey there, enter this otp in Deal-A-Wheel application :'. $otp;

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

function sendMail($email, $msg){

    $mail = new PHPMailer(true);                              
    try {
        $mail->isSMTP(); // using SMTP protocol                                     
        $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
        $mail->SMTPAuth = true;  // enable smtp authentication                             
        $mail->Username = 'dhavvu6@gmail.com';  // sender gmail host              
        $mail->Password = 'googledhavvu6'; // sender gmail host password                          
        $mail->SMTPSecure = 'tls';  // for encrypted connection                           
        $mail->Port = 587;   // port for SMTP     

        $mail->setFrom('dhavvu6@gmail.com', "Deal-A-Wheel"); // sender's email and name
        $mail->addAddress($email, "Receiver");  // receiver's email and name

        $mail->Subject = 'Booking Details For Deal-A-Wheel';
        $mail->Body    = $msg;

        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) { // handle error.
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}



?>
