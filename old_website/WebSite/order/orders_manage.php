<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">
<title>Manage Orders - Zuozuo Book Store</title>
</head>

<?php
require_once('../DB_info.php');
session_start();
    //判断权限
    if($_SESSION['userflag'] == 1){?>
      
      <div class="h1 text-center">Manage Orders</div>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Order ID</th>
					<th>Book Name</th>
					<th>ISBN</th>
					<th>Book Price</th>
					<th>Name</th>
					<th>Mail</th>
					<th>Address</th>
					<th>Finished?</th>
				</tr>
			</thead>
			<tbody>
<?php
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$link) echo "Connect Failed!";
    $q = "SELECT * FROM orders"; //SQL Quire
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
	<td>$row[5]</td>
	<td>$row[6]</td>
	<td><a class='btn btn-default' href='delete_uid.php?uid=$row[0]'>Finished</a> </td>
    </tr>";

?>
			</tbody>
		</table>
      
     <?php
       
    }else{
        echo "Your dont have permission to do so.";
    }?>

<body>
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
