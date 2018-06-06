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
    if($row['userflag'] == 0){
        $_SESSION['username'] = $row['username'];
        $_SESSION['userflag'] = $row['userflag'];
		?>
        Welcome back, <?php echo $_SESSION['username']?>.<a href="../index.php?name=<?php echo $username ?>">Click here to Continue</a><?php
    }else{
        echo "your account is not able to use here.";
    }

}else{
    echo "username or password is wrong.";
}
?>