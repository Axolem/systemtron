<?php

use PHPMailer\PHPMailer\PHPMailer;

function check_login($con)
{

	if (isset($_SESSION['user_id'])) {

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con, $query);
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
	header("Location: login.php");
	die;
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function sendEmail($email, $subject, $massage)
{
	require_once "../../manual/PHPMailer/PHPMailer.php";
	require_once "../../manual/PHPMailer/SMTP.php";
	require_once "../../manual/PHPMailer/Exception.php";

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
	$mail->Body = $massage;

	if ($mail->send()) {
		$response = "Email is sent!";
	} else {
		$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
	}
	return $response;
}
