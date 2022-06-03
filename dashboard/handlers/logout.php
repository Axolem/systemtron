<?php
session_start();
session_destroy();
session_unset();
session_destroy();
$_SESSION["loggedin"] = Null;
header("Location: http://localhost/project/systemtron/index.php");
exit();
die();
