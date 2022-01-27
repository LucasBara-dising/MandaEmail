<?php
//library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//requisitions
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

/*
before using it is necessary to activate access to less secure apps on the account that will send the email in
Google Account->Security->Enable less secure apps to access Gmail
*/
try {
	$mail->SMTPDebug = 0;
	$mail->isSMTP();
	//server of gmail
	$mail->Host = 'smtp.gmail.com';
	//security  gmail
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	//gmail of sender 
	$mail->Username = 'sende@gmail.com';
	//password of the sender
	$mail->Password = 'Your PassWord';
	// security port
	$mail->Port = 465;

	//---------------body of gmail---------------
	//sender 
	$mail->setFrom('sender@gmail.com');
	//recipient
	$mail->addAddress('recipient@Gmail.com');
	//gmail accept tag Html
	$mail->isHTML(true);
	//subjet og gmail
	$mail->Subject = 'Title';
	//body of gmail
	$mail->Body = 'text of the body';
	$mail->AltBody = 'text of the body';

	if($mail->send()) {
		echo 'Email send with success';
	} else {
		echo 'Email was not sent';
	}
} catch (Exception $e) {
	echo "error message: {$mail->ErrorInfo}";
}
?>