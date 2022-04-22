<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = test_input($_POST['email']);
    $code = test_input($_POST['code']);

    if (!empty($email) && !empty($code)) {
        $sql = "SELECT code FROM users Where email = '$email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['code'] == $code) {
                    $sql = "UPDATE users SET verified='yes' WHERE email= '$email'";
                    if ($con->query($sql) === TRUE) {
                        $_SESSION["email"] = $email;
                        header("Location: ../dashbord.php");
                    }
                } else {
                    $_SESSION["email"] = $email;
                    header("Location: index.php?codeErr=Wrong Code");
                    exit();
                }
            }
        } else {
            header("Location: index.php?codeErr=Input values");
            exit();
        }
    }
}
