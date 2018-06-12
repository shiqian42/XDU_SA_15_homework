<!--Start-->
<?php session_start(); 
require('process/get_personal_info.php');
if(isset($_SESSION['name']) && $_SESSION['user_permission']==1){
?>
<!--这个应该算作是查询个人借还状态-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="UTF-8">
    <title>Personal Panel - <?php name() ?> - ETMS of TWS - FastRepair Inc.</title>
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
                    Employ and Tool Management System
                        <small><?php sub_co(); ?> Sub Co.</small>
                    <div>
                        <small>Personal Panel</small>
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
                <dd id="employeePos">
                    <?php if_specialist(); ?>
                </dd>
            </dl>
        </div>
        <div class="col-md-6 column" style="text-align:left;margin-left: 250px;">
            <a href="etms_tool_status.php"><Strong><font size="4">Tools Status</font></Strong></a>
        </div>
        <div class="col-md-6 column" style="text-align:left;margin-left: 250px;">
            <a href="etms_borrow_tool.php"><Strong><font size="4">Borrow Tools</font></Strong></a>
        </div>
        <div class="col-md-4 column">
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <p class="text-left lead text-success">
                <strong>Personal Borrowed and Returned Record</strong>
            </p>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-striped table-hover" id="toolsTable">
                <thead>
                <!-- class=warning => Borrowed, class=info => Returned-->
                <tr>
                    <th>
                        编号
                    </th>
                    <th>
                        工具
                    </th>
                    <th>
                        交付时间
                    </th>
                    <th>
                        状态
                    </th>
                </tr>
                </thead>
                <tbody>
        <?php
            require_once('DB_info.php');
            $link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if(!$link) echo "SQL Connect Failed!";
            $e_id=$_SESSION['employee_id'];
            $q = "SELECT
                personal_bo_re.employee_id,
                personal_bo_re.`no`, 
                personal_bo_re.tool, 
                personal_bo_re.hand_time, 
                personal_bo_re.`status` 
                FROM
                personal_bo_re
                WHERE
                personal_bo_re.employee_id = '$e_id'";
                mysqli_query($link,"SET NAMES utf8");
                $rs = mysqli_query($link,$q); //Get data set
                if(!$rs){die("Valid result!");}

                while($row = mysqli_fetch_array($rs))
                echo "<tr>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                </tr>";

                mysqli_close($link);
        ?>
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
    function queryStatus() {
        var startdate=document.getElementById("startDate");
        var enddate=document.getElementById("endDate");

        var VstartDate=startdate.value;
        var VendDate=enddate.value;
        var myDate=new Date();

        //默认近一个月日期，轻度处理日期格式
        if(VstartDate.length < 10 || VendDate.length < 10 || VstartDate.substr(4, 1) != "/" || VstartDate.substr(7, 1) != "/" || VendDate.substr(4, 1) != "/" || VendDate.substr(7, 1) != "/")
        {
            VstartDate=GetMonthStr(-1);
            VendDate=GetMonthStr(0);
        }

        //转换成数字的年月日数据
        var startyear=parseInt(VstartDate.substr(0, 4));
        var startmonth=parseInt(VstartDate.substr(5, 2));
        var startday=parseInt(VstartDate.substr(8, 2));
        var endyear=parseInt(VendDate.substr(0, 4));
        var endmonth=parseInt(VendDate.substr(5, 2));
        var endday=parseInt(VendDate.substr(8, 2));

        //根据日期进行判断

        //此处添表
        //var toolID=
        //var toolName=
        //var operationTime=
        //var status=
        //createTable(toolID, toolName, operationTime, status);

        //The following is Example
        //createTable(100021, "CDR Tool 01", "2018/06/12", "Borrowed");
        //createTable(100023, "CDR Tool 03", "2018/06/06", "Returned");
        //createTable(100045, "CDR Tool 02", "2018/06/04", "Returned");

        

    }

    function GetMonthStr(AddMonthCount) {
        var dd = new Date();
        dd.setMonth(dd.getMonth()+AddMonthCount);//获取AddMonthCount月后的日期
        var y = dd.getFullYear();
        var m = dd.getMonth()+1;//获取当前月份的日期
        var d = dd.getDate();
        //判断 月
        if(m < 10){
            m = "0" + m;
        }else{
            m = m;
        }
        //判断 日n
        if(d < 10){//如果天数<10
            d = "0" + d;
        }else{
            d = d;
        }
        return y+"/"+m+"/"+d;
    }
    window.onload=queryStatus;
</script>
</body>
</html>

<?php
}else{
    echo "未授权访问，您执行了非法操作。";
}

?>