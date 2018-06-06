<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">

<?php
session_start();
if(isset($_SESSION['username']))
{
    if($_SESSION['userflag'] == 1)
        echo "欢迎管理员".$_SESSION['username']."登陆";
    if($_SESSION['userflag'] == 0)
        echo "欢迎用户".$_SESSION['username']."登陆";
?>
<title>Logged as <?php echo $_SESSION['username']?></title>
</head>
<div class="h1 text-center">Please select the function youwant to execute.</div>
<a class="btn btn-primary" href="add_book.php">Add new book</a>
<a class="btn btn-primary" href="book_manage.php">Manage books</a>
<a class="btn btn-default" href="../order/orders_manage.php">Manage User Orders</a>
<a class="btn btn-default" href="../user_page/users_manage.php">Manage Users</a>
<a class="btn btn-danger" href="log_off.php?<?php echo 'username='.$_SESSION['username']?>">Log off</a>
<?php
}
else
{
    echo "您没有权限访问此页面";
}
?>
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