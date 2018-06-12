<?php
require_once('../DB_info.php');
require_once('navi_page.php');

$link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$link) echo "Connect Failed!";
//获取输入的信息
$employee_id = $_POST['employee_id'];
$password = $_POST['password'];
//获取session的值
$query = mysqli_query($link,"select employee_id,name,sub_co,department,if_specialist,user_permission from employee where (employee_id = '$employee_id' and user_pass = '$password')")
or die("SQL Wrong");
//判断用户以及密码
//session start
session_start();
if($row = mysqli_fetch_array($query))
{
    //judge permission  u_p=1  ETMS
    if($row['user_permission'] == 1){
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['sub_co'] = $row['sub_co'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['if_specialist'] = $row['if_specialist'];
        $_SESSION['user_permission'] = 1;
        //TODO:enter etms.
        navito_etms_personal();
    //judge permission u_p=2 WMS
    }elseif($row['user_permission'] == 2){
        $_SESSION['employee_id'] = $row['employee_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['sub_co'] = $row['sub_co'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['if_specialist'] = $row['if_specialist'];
        $_SESSION['user_permission'] = 2;
        //TODO:enter wms.
        navito_wms_admin();

    }else{
        echo "账号处于维护状态，请联系系统管理员。";
    }

}else{
    echo "身份号或密码错误，您执行了非法操作。";
}
?>