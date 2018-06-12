<!--Start-->
<?php session_start(); 
require('process/get_personal_info.php');

if(isset($_SESSION['name']) && $_SESSION['user_permission']==1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
    <title>Tool Status - <?php name() ?> - ETMS of TWS - FastRepair Inc.</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入 Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <script src="js/createTable.js"></script>

<script>

var department = "<?php department(); ?>";

function showSite()
{
    str=document.getElementById("toolname").value;
    if (str=="")
    {
        document.getElementById("txtHint").innerHTML="";
        return;
    } 
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","process/get_tool_status.php?q="+str+"&department="+department,true);
    xmlhttp.send();
}
</script>

</head>
<body>
<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- 包括所有已编译的插件 -->
<script src="js/bootstrap.min.js"></script>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1>
                    Employ and Tool Management System    <small><?php sub_co(); ?> Sub Co.</small>
                    <div>
                        <small>Tools Status</small>
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <!-- TODO: describe what to do and what info to pull here.-->
                    <label for="toolname" class="col-sm-2 control-label">ToolName</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="toolname" />
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 column">
            <!-- TODO: describe what to do and what info to pull here.-->
            <button type="button" class="btn btn-default btn-info" id="querybtn" onclick="showSite()">查询</button>
        </div>
        <div class="col-md-4 column">
            <button type="button" class="btn btn-default btn-info" onclick="javascript:history.back(-1)">返回</button>

        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column" id="divtool">
            <table class="table table-hover table-striped" id="toolsTable">
                <thead>
                <tr>
                    <th>
                        Tool Type
                    </th>
                    <th>
                        Tool Name
                    </th>
                    <th>
                        Expensive?
                    </th>
                    <th>
                        Sub Co.
                    </th>
                </tr>
                </thead>
                <tbody id="txtHint">
                </tbody>
            </table>
        </div>
    </div>
    <div align="center">
        <form action="process/log_off.php" method="GET">
            <button type="submit" value="Submit" class="btn btn-default btn-danger">Log Out</button>
        </form>
    </div>
</div>
<!-- TODO: describe what to do and what info to pull here.-->
<script>
    function queryStatus() {
        var toolname=document.getElementById("toolname").value;
        //这里做查询

        //此处添表
        //var toolID=
        //var toolName=
        //var operationTime=
        //var status=
        //createTable(toolID, toolName, operationTime, status);

        //Following is Example
        //createTable(1, "CDR Tool 01", "2018/06/10", "Idle");
        //createTable(2, "CDR Tool 03", "2018/06/10", "In use");
    }
</script>


</body>
</html>

<?php
}else{
    echo "未授权访问，您执行了非法操作。";
}

?>