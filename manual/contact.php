<?php

session_start();

include("functions.php");

//something was posted
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email =  test_input($_POST['email']);
    $name =  test_input($_POST['name']);
    $massage =  test_input($_POST['msg']);
    $ticket = rand(11111111, 99999999);

    $subject = "Hey boss! Your message has been received | Ticket :" . $ticket;
    $userMassage = "Good day $name, <br> Please allow up to 24 hours for us to respond. If you want to add more massages, please respond to this email.";

    $userMali = sendEmail($email, $subject, $userMassage);

    $bobMail = sendEmail('beyourownbossdsw@gmail.com', 'New Contact form : ' . $ticket, "Name: $name <br> Massage: $massage");

    if ($userMali && $bobMail) {
        header('Location: http://localhost/project/systemtron/contact.php?massage=Massage recieved successfully');
    } else {
        header('Location: http://localhost/project/systemtron/contact.php?massage=Error sending massage. Please try again.');
    }
} else {
    header('Location: http://localhost/project/systemtron/contact.php');
}
