<?php
 
$response = array();
	require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/PHPMailer/PHPMailerAutoload.php';
	
    $db = new DB_CONNECT();
    $UserID=$_GET['UserID'];
    //$Email=$_GET['Email'];
	$query=mysql_query("SELECT * FROM `User` where UserID=$UserID");
	$count = mysql_num_rows($query);
	if($count==1){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = '587';
		$mail->isHTML();
		$mail->Username = 'bharatia.ub@gmail.com';
		$mail->Password = 'sadony1910';
		$mail->SetFrom('bharatia.ub@gmail.com');
		$mail->Subject = 'Reset Password Code';
		$mail->Body = 'A test email';
		$mail->AddAddress('sadmanamin@gmail.com');
		$mail->Send();
		echo 'Done';
	}
	else echo "Username doesnt exist";
    print json_encode($response)

?>