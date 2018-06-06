<?php
require_once('../DB_info.php');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$con)
    {
        die('Could not connect:'.mysqli_connect_error());
    }

//mysql_select_db("kewei_shuju",$con);


$sql="INSERT INTO users (username, passcode, userflag, name, mail, address, account)
VALUES ('$_POST[username]','$_POST[passcode]', '0' ,
'$_POST[name]','$_POST[mail]','$_POST[address]','$_POST[account]')";

mysqli_query($con,"SET NAMES utf8");

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

echo "<h1> Added! </h1>";
echo "<p>Your personal infomation:</p><br/>
	  <p>Username: $_POST[username] </p><br/>
	  <p>Password: $_POST[passcode] </p><br/>
	  <p>Name: $_POST[name] </p><br/>
	  <p>Mail: $_POST[mail] </p><br/>
	  <p>Address: $_POST[address] </p><br/>
	  <p>Account Card Number: $_POST[account] </p><br/>
	  "
?>

<a href="../index.php">Back to Homepage</a>

<?php


mysqli_close($con);
?>