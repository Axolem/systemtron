<?php

require_once "../dashboard/google/vendor/autoload.php";


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
        $name = $accountInfo->given_name;

        echo $name.'<br>';
        echo $email.'<br>';
        echo $accountInfo->family_name.'<br>';
        echo $accountInfo->id.'<br>';
        echo $accountInfo->email.'<br>';
        echo $accountInfo->gender.'<br>';
        echo $accountInfo->picture.'<br>';
    } else {
        header("Location: http://localhost/project/systemtron/login.php?massage=Something went wrong!");
    }
