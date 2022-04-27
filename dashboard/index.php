<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
   header("location: ../login.php");
   exit;
} else {
   include('../config/db_connect.php');

   $sql = "SELECT  `first_name`, `last_name`, `email`, `picture`, `created_at`, `modified_at`, `ethnic_group`, 
   `emplopment_status`, `phone`, `gender`, `code`, `verified` FROM users WHERE email = '".$_SESSION['username']."'";
   $result = $con->query($sql);

   if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
         $name = $row['first_name'];
         $surname =$row['last_name'];
         $email = $row['email'];
         $picture = $row['picture'];
      }
   }
}
?>

<h1>Welcome! <?php echo $name;?></h1>
<p></p>

<a href="logout.php">Out!</a>