<?php
session_start();
include 'connection.php';
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = test_input($_POST['email']);
    $name = test_input($_POST['name']);
    $email_id = uniqid();
    $id = rand(1111111111, 9999999999);

    // sql to delete a record
    $sql = "INSERT INTO newsletters (`id`, `email_id`, `name`, `email`) VALUES ('$id','$email_id','$name','$email')";

    if (mysqli_query($con, $sql)) {

        $subject = "Hey boss! You are awesome!";
        $massage = "Good day,<br>we wanted to notify you that you have successfully subscribed,<br> Mistake? <a href='http://localhost/project/systemtron/manual/unsubscribe?email=$email_id'></a>.";

        sendEmail($email, $subject, $massage);

        header("Location: http://localhost/project/systemtron/index.php?submassage=You are subscribed");
    } else {
        $sql = "SELECT email_id FROM newsletters WHERE email = '$email'";
        $email_id = mysqli_query($con, $sql);
        if ($email_id) {

            $subject = "Hey boss! You are awesome!";
            $massage = "Good day,<br>we wanted to notify you that you have successfully subscribed,<br> Mistake? <a href='http://localhost/project/systemtron/manual/unsubscribe?email=$email_id'></a>.";

            sendEmail($email, $subject, $massage);

            header("Location: http://localhost/project/systemtron/index.php?submassage=You are subscribed");
        } else {

            $subject = "Hey boss! You are awesome!";
            $massage = "Good day,<br>we wanted to notify you that you have successfully subscribed,<br> Mistake? <a href='http://localhost/project/systemtron/manual/unsubscribe?email=$email_id'></a>.";

            sendEmail($email, $subject, $massage);

            header("Location: http://localhost/project/systemtron/index.php?submassage=You are subscribed");
        }
    }
    mysqli_close($con);
    die();
}
