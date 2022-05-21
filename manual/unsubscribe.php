<?php
session_start();
include 'connection.php';
include("functions.php");

$email = $_GET['email'];

// sql to delete a record
$sql = "DELETE FROM newsletters WHERE 	email_id = '$email'";

if (mysqli_query($con, $sql)) {

    $subject = "Hey boss! This is sad for us";
    $massage = "Good day,<br>we wanted to notify you that you have successfully unsubscribed,<br> Mistake? <a href='http://localhost/project/systemtron/index.php#newaletter'></a>.";

    sendEmail($email, $subject, $massage);

    echo "<center><p>You have successfully unsubscribed</p></center>";
}
mysqli_close($con);
die();
