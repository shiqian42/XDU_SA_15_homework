<?php
$book_isbn = $_GET["isbn"];
$book_name = $_GET["name"];
$book_price = $_GET["price"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo "$name is checking!"?>;</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">
<?php 
	session_start();
	$u_name = $_SESSION['username'];
	
	require_once('../DB_info.php');
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "select * from users where username = '$u_name'"; //SQL Quire
    mysqli_query($link,"SET NAMES utf8");
    $rs = mysqli_query($link,$q); //Get data set
    if(!$rs){die("Valid result!");}
    
	$row = mysqli_fetch_array($rs);
	$user_name = $row[3];
	$user_mail = $row[4];
	$user_address = $row[5];
?>
</head>

<body>

<?php
	if(isset($_SESSION['username'])){?>
	<div class="h1 text-center">Below is the detail of your order this time.</div>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>ISBN</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
			<tr>
    			<td><?php echo $book_name?></td>
   			 	<td><?php echo $book_isbn?></td>
   				<td><?php echo $book_price?></td>
    		</tr>
    		</tbody>
		</table>
	<div class="h3 text-center">Below is your personal information.</div>
	<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Mail</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
			<tr>
    			<td><?php echo $user_name?></td>
   			 	<td><?php echo $user_mail?></td>
   				<td><?php echo $user_address?></td>
    		</tr>
    		</tbody>
		</table>
	<?php
		
		$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (!$con)
    {
        die('Could not connect:'.mysqli_connect_error());
    }


$sql="INSERT INTO orders (book_name, book_isbn, book_price, user_name, user_mail, user_address)
VALUES ('$book_name','$book_isbn', '$book_price' ,
'$user_name','$user_mail','$user_address')";

mysqli_query($con,"SET NAMES utf8");

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
	
	}else{?>
		You are not logged in.
	<?php
	}
?>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <p>Copyright © 2017 Zuozuo Book Store. All rights reserved. </p>
      </div>
    </div>
  </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/bootstrap.js"></script>
</body>
</html>