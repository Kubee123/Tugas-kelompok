
<?php

use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function formatTime($date)
{



    // Contoh tanggal
    $rawDate = '2023-10-12';

    // Buat objek Carbon dari tanggal
    $date = Carbon::parse($rawDate);

    // Format tanggal sesuai dengan format yang diinginkan
    $formattedDate = $date->format('d F Y');

    // Tampilkan hasil
    return $formattedDate;
}
function randomChar($length = 8)
{
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
function mailer($to, $name, $body)
{
    $mail = new PHPMailer();
    //Enable SMTP debugging.
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name                      
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = "Andhikaarnes62@gmail.com";
    $mail->Password = "eyzsersicrnbjmvv";
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to
    $mail->Port = 587;
    $mail->From = "Andhikaarnes62@gmail.com";
    $mail->FromName = "Administrator";
    $mail->addAddress($to, $name);
    $mail->isHTML(true);
    $mail->Subject = "Docona School";
    $mail->Body = $body;
    $mail->AltBody = "This is the plain text version of the email content";
    $mail->send();
    return true;
}
