<?php
session_start();
require_once "../dashboard/google/vendor/autoload.php";
include "../config/db_connect.php";
include "../manual/functions.php";


//Google credentials to use the authentication API
$clientId = "232368183727-6k65oja7spelkrt3ebd34v1qcgus23i4.apps.googleusercontent.com";
$clientSecret = "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";
$redirectUrl = "http://localhost/project/systemtron/google/g_login.php";

//Create Google request
$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope('profile');
$client->addScope('email');



if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    $client->setAccessToken($token);

    //Get user information from google account
    $gauth = new Google_Service_Oauth2($client);
    $accountInfo = $gauth->userinfo->get();

    $email = $accountInfo->email;
    $fname = $accountInfo->given_name;
    $lname = $accountInfo->family_name;
    $id = $accountInfo->id;
    $email = $accountInfo->email;
    $gender = $accountInfo->gender;
    $pic = $accountInfo->picture;
    $password = $_SESSION['token'];
    //Random code for email id
    $email_id = uniqid();
    $date = date("l jS \of F Y h:i:s A");

    $sql = "SELECT id, email FROM users WHERE email = '$email' and oath_provider = 'google'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $query = "UPDATE user_details SET first_name = '$fname', last_name = '$lname',
       picture = '$pic' WHERE usersemail = '$email' ";

        if (mysqli_query($con, $query)) {
            $subject = "Hey boss! New login";
            $message = "There was a login into you account at $date";

            sendEmail($email, $subject, $message);

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $email;
            header('Location: ../dashboard/index.php');
        }
    } else {
        # save the user information database
        $query = "INSERT INTO users (`id`, `oath_provider`, `oath_id`, `email`, `created`, `verified`) 
        VALUES ('$id','google','$password', '$email', NULL , 'yes')";

        $query2 = "INSERT INTO user_details (`usersemail`, `first_name`, `last_name`, `gender`, `picture`) 
                                        VALUES ('$email','$fname','$lname','$gender','$pic')";

        //Insert user default settings
        $query3 = "INSERT INTO user_setting (`usersemail`) VALUES ('$email')";

        //isert user doe email notifications
        $query4 = "INSERT INTO newsletters (`id`, `email_id`, `name`, `email`) VALUES ('$id','$email_id','$fname','$email')";


        //Send  the query to the database
        if (
            mysqli_query($con, $query) &&
            mysqli_query($con, $query2) &&
            mysqli_query($con, $query3) &&
            mysqli_query($con, $query4)
        ) {

            $subject = "Hey boss! Welcome";
            $message = "Welcome to BOB $name";
            sendEmail($email, $subject, $message);

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $email;;
            header('Location: ../dashboard/index.php');
        }
    }
} else {
    header("Location: http://localhost/project/systemtron/login.php?massage=Something went wrong!");
}
