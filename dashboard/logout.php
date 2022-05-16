<?php
session_start();
session_destroy();
session_unset();
session_destroy();
$_SESSION = array();
header("Location: http://localhost/project/systemtron/index.php");
exit();
die();
?>