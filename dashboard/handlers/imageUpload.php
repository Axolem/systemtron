<?php
session_start();

if (isset($_POST['uploadfile'])) {
    include("connection.php");
    include("functions.php");
    $user = $_SESSION['user_id'];
    $email = $_SESSION['username'];


    $filename = $_FILES["image"]["name"];

    $tempname = $_FILES["image"]["tmp_name"];
    $t = time();
    $newName = $t . $filename;
    $folder = "../profiles/" . $newName;
    $path = 'profiles/' . $newName;

    $sql = "UPDATE users SET picture = '$path' WHERE first_name = 'Axole' ";

    mysqli_query($con, $sql);

    if (move_uploaded_file($tempname, $folder)) {

        $msg = "Image uploaded successfully";
        $resp = 1;
    } else {
        $msg = "Failed to upload image";
        $resp = 0;
    }

    $subject = "Hey boss! You have a new update";
    $massage = "Good day,<br>we wanted to notify you that you have changed you profile picture.<br>If it was not you please reply to this email, otherwise take care. <br><p></p><strong>B.O.B</strong>.";

    sendEmail($email, $subject, $massage);
}
header('Location: ../index.php?response=' . $resp . '&msg=' . $msg);
