<?php
require_once('../DB_info.php');
$link=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$link) echo "Connect Failed!";
//获取输入的信息
$username = $_POST['username'];
$passcode = $_POST['passcode'];
//获取session的值
$query = mysqli_query($link,"select username,userflag from users where username = '$username' and passcode = '$passcode'")
or die("SQL failed");
//判断用户以及密码
if($row = mysqli_fetch_array($query))
{
    session_start();
    //判断权限
    if($row['userflag'] == 1){
        $_SESSION['username'] = $row['username'];
        $_SESSION['userflag'] = $row['userflag'];
        echo "<a href='welcome_session_login.php'>Welcome back, my honred book store owner.</a>";
    }else{
        echo "your account is under matainance";
    }

}else{
    echo "username or password is wrong.";
}
?>