<?php
session_start();
require_once('../DB_info.php');
$borrow_id=$_GET['id'];
$admin=$_GET['admin'];
$employee_id=$_SESSION['employee_id'];

if($admin='Yes'){
    actionNeededForAdmin($id);
}elseif($admin='No'){
    directWithdraw($id);
    logThatBorrowed($id,$employee_id);
}


function actionNeededForAdmin($id){

}

function directWithdraw($id){

}

function logThatBorrowed($id,$employee_id){
    
}


?>