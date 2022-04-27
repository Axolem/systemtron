<?php
// // Initialize the session
// session_start();

// // Check if the user is logged in, if not then redirect him to login page
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//    header("location: ../login.php");
//    exit;
// } else {
//    include('../config/db_connect.php');

//    $sql = "SELECT  `first_name`, `last_name`, `email`, `picture`, `created_at`, `modified_at`, `ethnic_group`, 
//    `emplopment_status`, `phone`, `gender`, `code`, `verified` FROM users WHERE email = '".$_SESSION['username']."'";
//    $result = $con->query($sql);

//    if ($result->num_rows > 0) {
//       // output data of each row
//       while ($row = $result->fetch_assoc()) {
//          $name = $row['first_name'];
//          $surname =$row['last_name'];
//          $email = $row['email'];
//          $picture = $row['picture'];
//       }
//    }
// }
include('../config/header.php')
?>

<main class="dash">
   
   <button class="tablink" onclick="openPage('Home', this, 'red')">Home</button>
   <button class="tablink" onclick="openPage('News', this, 'green')" id="defaultOpen">News</button>
   <button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
   <button class="tablink" onclick="openPage('About', this, 'orange')">About</button>

   <div id="Home" class="tabcontent">
      <h3>Home</h3>
      <p>Home is where the heart is..</p>
   </div>

   <div id="News" class="tabcontent">
      <h3>News</h3>
      <p>Some news this fine day!</p>
   </div>

   <div id="Contact" class="tabcontent">
      <h3>Contact</h3>
      <p>Get in touch, or swing by for a cup of coffee.</p>
   </div>

   <div id="About" class="tabcontent">
      <h3>About</h3>
      <p>Who we are and what we do.</p>
   </div>
</main>
<script src="dash.js"></script>



<?php include('../config/footer.php'); ?>