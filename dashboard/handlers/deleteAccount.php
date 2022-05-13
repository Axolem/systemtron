<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

if (isset($_POST['delete'])) {
    include("connection.php");
    include("functions.php");
    $email = $_SESSION["username"];
    $confirmEmail = $_POST['email'];
    $id = $_SESSION["user_id"];

    if ($email === $confirmEmail) {
        // sql to delete a record
        $sql = "DELETE FROM users WHERE email = '$email' And id ='$id' ";
        $sql2 = "DELETE FROM users_details WHERE email = '$email' ";

        if (mysqli_query($con, $sql)) {
            //if (mysqli_query($conn, $sql2)) { {
            header('Location: ../../index.php');
            // }
            //} else {
            //   header('Location: ../index.php?response=' . $resp . '&msg=' . $msg);
            //}
            $subject = "Hey boss! This is sad for us";
            $massage = "Good day,<br>we wanted to notify you that you have deleted your account.<br>If it was not you please reply to this email, otherwise take care. <br><p></p><strong>B.O.B</strong>.";

            sendEmail($email, $subject, $massage);
        } else {
            mysqli_close($con);
            header('Location: ../index.php?response=' . $resp . '&msg=' . $msg);
        }
        exit();
    }
}
