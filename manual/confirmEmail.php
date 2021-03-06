<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = test_input($_POST['email']);
    $code = test_input($_POST['code']);

    if (!empty($email) && !empty($code)) {
        $sql = "SELECT code, email FROM users Where email = '$email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['code'] == $code  && $row['email'] == $email) {
                    $sql = "UPDATE users SET verified='yes' WHERE email= '$email'";
                    if ($con->query($sql) === TRUE) {

                        $subject = "Hey boss! Welcome";
                        $message = "You have successfully verified your account. Now we welcome you.";

                        sendEmail($email, $subject, $message);

                        $_SESSION['email'] = $email;
                        $_SESSION["username"] = $email;
                        $_SESSION["loggedin"] = true;
                        header("Location: ../dashboard/index.php");
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
    }
    mysqli_close($con);
}
