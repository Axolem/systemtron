<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	//something was posted
	$fname = test_input($_POST['fname']);
	$lname = test_input($_POST['lname']);
	$email = test_input($_POST['email']);
	$confirmEmail = test_input($_POST['confirmEmail']);
	$gender = test_input($_POST['gender']);
	$color = test_input($_POST['color']);
	$password = test_input($_POST['password']);
	$confirmPassword = test_input($_POST['confirmPassword']);

	//Making sure ther is some input in the form
	if (!empty($fname) && !empty($password) && !empty($email)) {

		//check if email is valid
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../login.php?inputErr=Invalid email format&name=" . $fname . "&email=" . $email . "&cemail=" . $confirmEmail . "&color=" . $color . "&lname=" . $lname . "&gender=" . $gender);
		}


		//check if email is match
		elseif ($email != $confirmEmail) {
			header("Location: ../login.php?inputErr=Emails do not match");
		}

		//Check if passwords match
		elseif ($password != $confirmPassword) {
			header("Location: ../login.php?inputErr=Passwords do not match");
		}

		//chech password strength
		elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
			header("Location: ../login.php?inputErr=The password does not meet the requirements!&name=" . $fname . "&email=" . $email . "&cemail=" . $confirmEmail . "&color=" . $color . "&lname=" . $lname . "&gender=" . $gender);
		}

		//Check if the user already exist
		$select = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email . "'");
		if (mysqli_num_rows($select)) {
			header("Location: ../login.php?inputErr=User already exists!");
		} else {
			// Hash the password
			$password = md5($password);
			//Get today datetime
			$date = date('Y-m-d');
			//Random code for email validation
			$code = rand(1000, 9999);

			//Prepare the user information for the database
			$query = "INSERT INTO `users`(`id`, `oauth_provider`, `oauth_id`, `first_name`, `last_name`, `email`, `created_at`, `ethnic_group`, `gender`, `code`, `verified`) 
				VALUES ('5','manual','$password','$fname','$lname','$email','$date','$color','$gender', '$code','no')";
			//Send  the query to the database
			mysqli_query($con, $query);
		}

		sendEmail($email, $code);
		$_SESSION['email'] = $email;
		header("Location: confirmAccount.php");

		die;
	} else {
		echo "Please enter some valid information!";
	}
}
