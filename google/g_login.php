<?php
session_start();
require_once "../dashboard/google/vendor/autoload.php";
include "../config/db_connect.php";


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
    $date = date('Y-m-d');

    $sql = "SELECT id, email FROM users WHERE email = '$email' and oauth_provider = 'google'";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        $query = "UPDATE users SET oauth_id = '$id' , first_name = '$fname', last_name = '$lname',
       picture= '$pic', modified_at =  '$date' WHERE email = '$email' ";

        mysqli_query($con, $query);

        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $email;
        header('Location: ../dashboard/index.php');
    } else {
        # save the user nformation database
        $query = "INSERT INTO `users`(`id`, `oauth_provider`, `oauth_id`, `first_name`, `last_name`, `email`, `picture`, `created_at`, `gender`, `verified`) 
        VALUES ('$id','google','$id','$fname','$lname','$email', '$pic' ,'$date','$gender','yes')";
        //Send  the query to the database
        mysqli_query($con, $query);

        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $email;
        header('Location: ../dashboard/index.php');
    }
} else {
    header("Location: http://localhost/project/systemtron/login.php?massage=Something went wrong!");
}
