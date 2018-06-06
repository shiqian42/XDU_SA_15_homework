<!-- 删除特定orders 表中的uid 所在行-->

<?php
	require_once('../DB_info.php');
	$book_isbn=$_GET['book_isbn'];
	$book_name=$_GET['book_name'];
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "delete from books where book_isbn=$book_isbn"; //SQL Quire
    mysqli_query($link,"SET NAMES utf8");
    mysqli_query($link,$q); //Get data set
	echo "Book $book_name whose ISBN is $book_isbn has been successfully deleted."
?>
