<!-- This page is used to connect to the database -->

<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "beyourownboss";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
?>
