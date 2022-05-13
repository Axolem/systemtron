<?php


session_start();

if (isset($_POST['updatePerson'])) {
    include("connection.php");
    include("functions.php");

    $fname = test_input($_POST['fname']);
    $lname = test_input($_POST['lname']);
    $gender = test_input($_POST['gender']);
    $color = test_input($_POST['color']);
    $phone = test_input($_POST['phone']);
    $empStatus = test_input($_POST['empStatus']);
    $email = $_SESSION["username"];
    //notifications
    $newsletters = $_POST['newsletters'];
    $phoneNotifications = $_POST['phoneN'];
    $emailNotificatiopns = $_POST['emailN'];
    if (empty($_POST['newsletters'])){
        $newsletters = 'off';
    }
    if (empty($_POST['emailN'])){
        $emailNotificatiopns = 'off';
    }
    if (empty($_POST['phoneN'])){
        $phoneNotifications = 'off';
    }
    $date = date('Y-m-d');

    $sql = "UPDATE users SET first_name='$fname', last_name = '$lname' , modified_at = '$date', ethnic_group = '$color',
    emplopment_status = '$empStatus', phone = '$phone', gender = '$gender' WHERE email = '$email'";

    if (mysqli_query($con, $sql)){
        $resp = 1;
        $msg = 'Successfully updated!';

        $subject = "Hey boss! You have a new update";
        $massage = "Good day,<br>we wanted to notify you that you have updated your profile details.<br>If it was not you please reply to this email, otherwise take care. <br><p></p><strong>B.O.B</strong>.";
    
        sendEmail($email, $subject, $massage);
    }
    else {
        $resp = 0;
        $msg = 'Failed to update!';
    }
    header('Location: ../index.php?response=' . $resp . '&msg=' . $msg);
}
