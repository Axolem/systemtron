<!-- This page is used to connect to the database -->

<?php

   $db  = mysqli_connect('localhost','root','','database name here?');
   if(!$db)
   {
      echo "Database connection Error contact Admin";
   }

?>

