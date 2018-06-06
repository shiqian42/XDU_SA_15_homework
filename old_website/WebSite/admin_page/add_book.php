<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add New Book - Zuozuo Book Store</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.css">
<?php
session_start();
    //判断权限
    if($_SESSION['userflag'] == 1){
		
?>
</head>

<body>

	<div class="h1 text-center">Add new book info</div>
	<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Book</div>
                <div class="panel-body">
                    <form action="add_book_func.php" method="POST">
                    <div class="container">
                        <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <input type="text" name="new_book" class="form-control" placeholder="Type book name here" > 
                        </div>
                        <div class="form-group">
                            <label for="book_info">Book Infomation</label>
							<textarea type="text" name="book_info" class="form-control" placeholder="info" rows="3">Type the info here.</textarea>
                        </div>
                        <div class="form-group">
                            <label for="book_isbn">ISBN</label>
                            <input type="text" name="book_isbn" class="form-control" placeholder="ISBN"> 
                        </div>
                        <div class="form-group">
                            <label for="book_left">Book Left</label>
                            <input type="text" name="book_left" class="form-control" placeholder="Book Left"> 
                        </div>
                        <div class="form-group">
                            <label for="book_price">Book Price</label>
                            <input type="text" name="book_price" class="form-control" placeholder="Price"> 
                        </div>
                        <div class="form-group">
                            <label for="book_date">Move in DATE</label>
                            <input type="date" name="book_date" class="form-control" placeholder="date"> 
                        </div>
                        <input class="btn btn-default" type="submit" value="Add">
                        <a href="../index.php" class="btn btn-danger" role="button">Back to Home Page</a>
                </div>
                    </form>
            <div class="panel-footer">Zuozuo Book Store.</div>
        </div>
    </div>
	</div>

</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/bootstrap.js"></script>
</html>
<?php
    }else{
?>
     </head>

<body>

	<div class="h1 text-center">Your are not allowed to add a new book.</div>
	<div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Add New Book</div>
                <div class="panel-body">
                    
            <div class="panel-footer">Zuozuo Book Store.</div>
        </div>
    </div>
	</div>

</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../js/bootstrap.js"></script>
</html>
<?php
	}
?>