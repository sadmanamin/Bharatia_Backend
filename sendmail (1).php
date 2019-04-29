<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'bharatia.ub@gmail.com';
$mail->Password = 'sadony1910';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('upperbound_noreply@sadmanamin.com', 'Na');
$mail->addReplyTo('sadmanamin@gmail.com', 'Na');

$mail->addAddress("sadmanamin@gmail.com");// email here

$mail->addCC('');

$mail->Subject = 'Bharatia Forget Password';

$mail->isHTML(true);
$emailTextHtml = "<div><br><h3>Your recovered password is given in this mail <b>yrdrydrydy</b>.<br><br>Your Registration has been completed as a user.<br>These are the information delivered by you.<br><br>Name : $name <br> Contact : $contact <br> NID : $nid  <br> Location : $location <br> E-mail : $email <br> Password: $password [this is your log in password] <br><br>Thank You.</h3><br><br></div>";

$mail->Body = $emailTextHtml;

//$mail->msgHTML(file_get_contents('mail-content.php'), dirname(__FILE__));

//$mail->msgHTML(file_get_contents('mail-content.html'), dirname(__FILE__));

// Send email
if(!$mail->send()){
    echo "ERROR";
}else{
    echo "S-------";
}




?>