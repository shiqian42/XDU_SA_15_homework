<?php
require_once('../DB_info.php');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$con)
    {
        die('Could not connect:'.mysqli_connect_error());
    }

//mysql_select_db("kewei_shuju",$con);


$sql="INSERT INTO books (book_name, book_info, book_isbn, book_left, price, time_stamp)
VALUES ('$_POST[new_book]','$_POST[book_info]','$_POST[book_isbn]',
'$_POST[book_left]','$_POST[book_price]','$_POST[book_date]')";

mysqli_query($con,"SET NAMES utf8");

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

echo "<h1> Added! </h1>";
?>

<a href="../index.php">Back to Homepage</a>

<?php


mysqli_close($con);
?>