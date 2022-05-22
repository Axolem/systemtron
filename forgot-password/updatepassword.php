<?php
session_start();

include("../config/db_connect.php");
include("../manual/functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_SESSION['email'];
    $code = test_input($_POST['code']);
    $password = test_input($_POST['pass']);
    $cpassword = test_input($_POST['cpass']);

    if (!empty($email) && !empty($code) && !empty($password) && !empty($cpassword)) {
        if ($password == $cpassword) {
            $sql = "SELECT code, email FROM users Where email = '$email'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['code'] == $code  && $row['email'] == $email) {
                        $password = md5($password);
                        $sql = "UPDATE users SET oath_id='$password' WHERE email= '$email'";
                        if ($con->query($sql) === TRUE) {

                            $subject = "Hey boss! Your are in again'";
                            $message = "You have successfully reseted your password. Please go ahead and login";

                            sendEmail($email, $subject, $message);
                            header("Location: ../login.php?loginErr=Password Reset Success!");
                        }
                    } else {
                        $_SESSION["email"] = $email;
                        header("Location: index.php?codeErr=Wrong Code");
                        exit();
                    }
                }
            } else {
                header("Location: index.php?codeErr=Input a value");
                exit();
            }
        } else {
            header("Location: index.php?codeErr=Passwords do not match");
        }
    }
}
