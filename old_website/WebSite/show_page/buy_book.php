<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">
<title>Zuozuo Book Store</title>
<?php
session_start();
?>
</head>

<body>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Zuozuo Book Store</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							 <a href="../index.php">Homepage</a>
						</li>
						<li class="active">
							 <a href="../show_page/buy_book.php">Buy Book</a>
						</li>
						<li>
							 <a href="../about_us.html">About Us</a>
						</li>
						<li>
							 <a href="../admin_page/sign_in.html">Admin</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php
						if(isset($_SESSION['username'])){
						?>
						<li>
							 	<a>Welcome,<?php echo $_SESSION['username']?>.</a>
						</li>
						<li>
								 <a href="../user_page/log_off.php?username=<?php echo $_SESSION['username']?>">Log off</a>
						<?php
						}else{
						?>
						<li>
							 <a href="../user_page/sign_in.html">Sign in</a>
						</li>
						<li>
							 <a href="../user_page/reg.html">Sign up</a>
						</li>
						<?php
						}
						?>
					</ul>
				</div>
				
			</nav>
<br/>
<br/>
			<div class="h1 text-center">Come and Buy Latest Books!</div>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>Introduction</th>
					<th>ISBN</th>
					<th>Reservation</th>
					<th>Price</th>
					<th>One-Click Buy</th>
				</tr>
			</thead>
			<tbody>
<?php
	require_once('../DB_info.php');
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "SELECT * FROM books ORDER BY uid DESC LIMIT 10"; //SQL Quire
    mysqli_query($link,"SET NAMES utf8");
    $rs = mysqli_query($link,$q); //Get data set
    if(!$rs){die("Valid result!");}
    
    while($row = mysqli_fetch_array($rs)) 
    echo "<tr>
    <td>$row[0]</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
	<td><a class='btn btn-primary' href='../order/confirm_order.php?isbn=$row[2]&name=$row[0]&price=$row[3]'>Buy</a></td>
    </tr>";

?>
			</tbody>
		</table>
	
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
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