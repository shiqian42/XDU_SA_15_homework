<!--Start-->
<?php session_start(); 
require('process/get_personal_info.php');

if(isset($_SESSION['name']) && $_SESSION['user_permission']==2){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
    <title>Admin Panel - <?php name() ?> -  WMS of TWS - FastRepair Inc.</title>

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
<script src="js/createTable.js"></script>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1>
                    Warehouse Management System <small><?php sub_co(); ?> Sub Co.</small>
                    <div>
                        <small>Admin Panel</small>
                    </div>
                </h1>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-2 column">
            <!-- TODO: describe what to do and what info to pull here.-->
            <!-- 登录后根据登录信息修改这三个ID的信息 -->
            <dl>
                <dt>
                    Name
                </dt>
                <dd id="employeeName">
                    <?php name(); ?>
                </dd>
                <dt id="subCompany">
                    Sub Company
                </dt>
                <dd>
                    <?php sub_co(); ?>
                </dd>
                <dt>
                    Department
                </dt>
                <dd id="employeeDep">
                    <?php department(); ?>
                </dd>
                <dt>
                    Position
                </dt>
                <dd>
                    <?php sub_co(); ?> Admin
                </dd>
            </dl>
        </div>
        <!--
        <div class="col-md-6 column" style="text-align:left;margin-left: 250px;">
            <a href="RequestToolsStatus.html"><Strong><font size="4">Tools Status</font></Strong></a>
        </div>
        -->
        <div class="col-md-4 column">
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <p class="text-left lead text-success">
                <strong>Request Status</strong>
            </p>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-striped table-hover" id="RequestTable">
                <thead>
                <!-- class=danger => Malfunction, class=info => Normal-->
                <tr>
                    <th>
                        请求编号
                    </th>
                    <th>
                        请求工具
                    </th>
                    <th>
                        请求者
                    </th>
                    <th>
                        请求时间
                    </th>
                    <th>
                        操作
                    </th>
                    <th>

                    </th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <p class="text-left lead text-success">
                <strong>Robot Status</strong>
            </p>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-striped table-hover" id="RobotTable">
                <thead>
                <!-- class=danger => Malfunction, class=info => Normal-->
                <tr>
                    <th>
                        机器人编号
                    </th>
                    <th>
                        所属仓库
                    </th>
                    <th>
                        状态
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
        </div>
    </div>
    <div align="center">
        <form action="process/log_off.php" method="GET">
            <button type="submit" value="Submit" class="btn btn-default btn-danger">Log Out</button>
        </form>
    </div>
</div>

<script>
    function queryStatus()
    {
        //var ReqID=
        //var ReqTool=
        //var ReqPerson=
        //var ReqTime=
        //createTable4(ReqID, ReqTool, ReqPerson, ReqTime);
        createTable4("1CF97G", "DCR Tool 04", "Marcus.Smith", "2018/06/06");
    }

    function robotStatus()
    {
        //var robotTable=document.getElementById("RobotTable");
        //这里做查询
        //var RobotID=
        //var Warehouse=
        //var RobotStatus=
        //循环建表
        //for(
        //createTable3(RobotID, Warehouse, RobotStatus);
        createTable3("A00094", "California", "Malfunction");
        createTable3("A00021", "California", "Normal");
    }


    function repairRobot(btnId)
    {
        //传入的参数是按钮的id，
        var robotTbl=document.getElementById("RobotTable");
        var rows=robotTbl.rows.length;

        //第一行应该是表头
        for(var i = 1; i < rows; i++)
        {
            var cells=robotTbl.rows[i].cells;
            var btnInfo=cells[3].innerHTML;
            var btnID=btnInfo.substr(btnInfo.indexOf("repairbtn"), 10);
            if(btnInfo.indexOf(btnId) > 0)
            {
                var robotID=cells[0].innerText;
                var Location=cells[1].innerText;
                //Note: alert can be delete
                cells[3].innerHTML="<button class=" + '"' + "btn btn-info disabled" + '"' + " id=" + btnID + "+" + ">等待维修中</button>";
                alert(robotID + " Reserved");
                break;
            }
        }
    }

    function requestResove(btnId)
    {
        //传入的参数是按钮的id，
        var reqTbl=document.getElementById("RequestTable");
        var rows=reqTbl.rows.length;

        //第一行应该是表头
        for(var i = 1; i < rows; i++)
        {
            var cells=reqTbl.rows[i].cells;
            var apprInfo=cells[4].innerHTML;
            var denyInfo=cells[5].innerHTML;

            var apprID=resolveBtnID(apprInfo.substr(apprInfo.indexOf("apprbtn")));
            var denyID=resolveBtnID(denyInfo.substr(denyInfo.indexOf("denybtn")));
            if(apprInfo.indexOf(btnId) > 0 || denyInfo.indexOf(btnId) > 0)
            {
                var RequestID=cells[0].innerText;
                var Location=cells[1].innerText;
                //Note: alert can be delete
                //alert(btnId+" "+apprID+" "+denyID);
                if(btnId == apprID)
                {
                    cells[4].innerHTML="<button class=" + '"' + "btn btn-info disabled" + '"' + " id=" + apprID + "+" + ">Approved</button>";
                    cells[5].innerHTML="<button class=" + '"' + "btn btn-danger disabled" + '"' + " id=" + denyID + "+" + ">deny</button>";
                }
                else if(btnId == denyID)
                {
                    cells[4].innerHTML="<button class=" + '"' + "btn btn-info disabled" + '"' + " id=" + apprID + "+" + ">Approve</button>";
                    cells[5].innerHTML="<button class=" + '"' + "btn btn-danger disabled" + '"' + " id=" + denyID + "+" + ">denied</button>";
                }
                alert(RequestID + " Solved");
                break;
            }
        }
    }

    function resolveBtnID(parameter)
    {
        var idx=parameter.indexOf('"');
        return parameter.substr(0, idx);
    }
    window.onload=function () {
        queryStatus();
        robotStatus();
    };
</script>

</body>
</html>

<?php
}else{
    echo "未授权访问，您执行了非法操作。";
}

?>