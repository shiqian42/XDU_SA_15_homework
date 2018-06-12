<?php require('process/navi_page.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
    <title>Login - Tool Warehouse System - FastRepair Inc.</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- 包括所有已编译的插件 -->
<script src="js/bootstrap.min.js"></script>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="page-header">
                        <h1>
                            Tool Warehouse System - FastRepair Inc.
                            <div><small>Login</small></div>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4 column">
                </div>
                <div class="col-md-4 column">
                    <!-- TODO: -->
                    <form role="form" action="process/check_permission.php" method="POST">
                        <div class="form-group">
                            <label for="Username">Employee ID</label><input type="Username" class="form-control" name="employee_id" />
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label><input type="password" class="form-control" name="password" />
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>