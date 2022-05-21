<?php

use PHPMailer\PHPMailer\PHPMailer;

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


function sendEmail($email, $subject, $massage)
{
	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer();

	//SMTP Settings
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "beyourownbossdsw@gmail.com"; //enter you email address
	$mail->Password = 'connection.php'; //enter you email password
	$mail->Port = 587;
	$mail->SMTPSecure = "tls";

	//Email Settings
	$mail->isHTML(true);
	$mail->setFrom($email, "B.O.B");
	$mail->addAddress($email); //enter you email address
	$mail->Subject = ($subject);
	$mail->Body = $massage.'<br><p></p><strong>B.O.B</strong>.';

	if ($mail->send()) {
		$response = 1;
	} else {
		$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
	}
	return $response;
}
