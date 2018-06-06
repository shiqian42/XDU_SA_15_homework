<!-- 删除特定orders 表中的uid 所在行-->

<?php
	require_once('../DB_info.php');
	$u_name=$_GET['username'];
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "delete from users where username=$u_name"; //SQL Quire
    mysqli_query($link,"SET NAMES utf8");
    mysqli_query($link,$q); //Get data set
	echo "User $u_name is successfully deleted."
?>
