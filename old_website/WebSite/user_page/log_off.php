<?php
session_start();
echo 'Logged off as '.$_GET['username'];
//$username=$_GET["username"];
//$username=$_GET["usercode"];
//$username=$_GET["userflag"];
unset($_SESSION['username']);
//unset($_SESSION['passcode']);
//unset($_SESSION['userflag']);
session_destroy();
?>
<a href="../index.php">Homepage</a>