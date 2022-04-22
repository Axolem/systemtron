<?php

session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$email =  test_input($_POST['email']);
	$password =  test_input(md5($_POST['password']));

	if (!empty($email) && !empty($password)) {

		//read from database
		$query = "select * from users where email = '$email' limit 1";
		$result = mysqli_query($con, $query);

		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);

				if ($user_data['oauth_provider'] == "manual") {
					if ($user_data['oauth_id'] === $password) {
						$_SESSION['email'] = $email;
						header("Location: ../dashboard/index.php");
						die;
					} else {
						header("Location: http://localhost/project/systemtron/login.php?loginErr=Incorrect password or email.");
						die;
					}
				} else {
					header("Location: http://localhost/project/systemtron/login.php?loginErr=Try to login with Google or Facebook");
					die;
				}
			}
		} else {
			header("Location: http://localhost/project/systemtron/login.php?loginErr=User not registers");
			die;
		}
	} else {
		header("Location: http://localhost/project/systemtron/login.php?loginErr=Please input all fields");
		die;
	}
}
