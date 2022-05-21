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
		$select = mysqli_query($con, "SELECT * FROM users  WHERE email = '$email' ");
		if (mysqli_num_rows($select) > 0) {
			header("Location: ../login.php?inputErr=User already exists!");
			die;
		} else {
			// Hash the password
			$password = md5($password);
			//Get today datetime
			$date = date('Y-m-d');
			//Random code for email validation
			$code = rand(1000, 9999);
			//Random code for id
			$id = rand(1111111111, 9999999999);
			//Random code for email id
			$email_id = uniqid();

			//Isert logind details
			$query = "INSERT INTO `users`(`id`, `oath_provider`, `oath_id`, `email`, `created`, `updated`, `code`, `verified`)
			VALUES('$id','manual','$password','$email', NULL, NULL,'$code','no')";

			//inseting user information
			$query2 = "INSERT INTO `user_details`(`usersemail`, `first_name`, `last_name`, `gender`, `ethinicity`) 
			VALUES ('$email','$fname','$lname','$gender','$color')";

			//Insert user default settings
			$query3 = "INSERT INTO `user_setting`(`usersemail`) VALUES ('$email')";

			//isert user doe email notifications
			$query4 = "INSERT INTO `newsletters`(`id`, `email_id`, `name`, `email`) VALUES ('$id','$email_id','$fname','$email')";

			//Send  the queries to the database
			mysqli_query($con, $query);
			mysqli_query($con, $query2);
			mysqli_query($con, $query3);
			mysqli_query($con, $query4);

			//Sending the code to the user
			$subject = "Hey boss! You are one-step away";
			$massage = "Your OTP is: $code";

			sendEmail($email, $subject, $massage);
			$_SESSION['email'] = $email;
			header("Location: index.php");
		}
	} else {
		header("Location: http://localhost/project/systemtron/login.php?inputErr=Please enter some valid information!");
	}
}
