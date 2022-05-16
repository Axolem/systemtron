<?php

use Google\Service\ServiceControl\CheckRequest;

session_start();

if (isset($_POST['updatePerson'])) {
    include("connection.php");
    include("functions.php");

    $fname = test_input($_POST['fname']);
    $lname = test_input($_POST['lname']);
    $phone = test_input($_POST['phone']);
    $empStatus = test_input($_POST['empStatus']);
    $email = $_SESSION["username"];

    if (empty(test_input($_POST['gender']))) {
        $gender = "";
    } else {
        $gender = test_input($_POST['gender']);
    }
    if (empty(test_input($_POST['color']))) {
        $color = "";
    } else {
        $color = test_input($_POST['color']);
    }

    //Check if user unticked the checkbox
    if (empty($_POST['emailN'])) {
        $emailNotificatiopns = 'off';
    } else {
        $emailNotificatiopns = $_POST['emailN'];
    }
    if (empty($_POST['phoneN'])) {
        $phoneNotifications = 'off';
    } else {
        $phoneNotifications = $_POST['phoneN'];
    }
    $date = date('Y-m-d');

    $sql =  "UPDATE user_details SET first_name='$fname',last_name='$lname',gender='$gender',ethinicity='$color',phone='$phone',emp_status='$empStatus' WHERE usersemail = '$email'";



    $sql2 = "UPDATE user_setting SET phone_notifications ='$phoneNotifications', email_notifications='$emailNotificatiopns' WHERE usersemail='$email'";


    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {
        $resp = 1;
        $msg = 'Successfully updated!';

        $subject = "Hey boss! You have a new update";
        $massage = "Good day,<br>we wanted to notify you that you have updated your profile details.<br>If it was not you please reply to this email, otherwise take care. <br><p></p><strong>B.O.B</strong>.";

        sendEmail($email, $subject, $massage);
    } else {
        $resp = 0;
        $msg = 'Failed to update!';
    }
    header('Location: ../index.php?response=' . $resp . '&msg=' . $msg);
}
