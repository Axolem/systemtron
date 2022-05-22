<?php
session_start();

include("../config/db_connect.php");
include("../manual/functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = test_input($_POST['email']);
    $code = rand(1000, 9999);

    $select = mysqli_query($con, "SELECT email FROM users  WHERE email = '$email'");
    if (mysqli_num_rows($select) > 0) {
        $select2 = mysqli_query($con, "SELECT oath_provider FROM users  WHERE email = '$email' && oath_provider = 'manual'");
        if (mysqli_num_rows($select) == 0) {
            header("Location: ../forgot-password.php?inputErr=Try logging in with Facebook/Google");
            die;
        } else {

            $sql = "UPDATE users SET code = '$code' WHERE  email = '$email'";
            if (mysqli_query($con, $sql)) {
                //Sending the code to the user
                $subject = "Hey boss! You are one-step away";
                $massage = "Your OTP is: $code";

                sendEmail($email, $subject, $massage);
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
        }
    } else {
        header("Location: ../forgot-password.php?inputErr=User doesn't exists!");
        die;
    }
    mysqli_close($con);
}
