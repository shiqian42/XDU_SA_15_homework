<!-- 删除特定orders 表中的uid 所在行-->

<?php
	require_once('../DB_info.php');
	$uid=$_GET['uid'];
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "delete from orders where uid=$uid"; //SQL Quire
    mysqli_query($link,"SET NAMES utf8");
    mysqli_query($link,$q); //Get data set
	echo "Order $uid is successfully finished."
?>
