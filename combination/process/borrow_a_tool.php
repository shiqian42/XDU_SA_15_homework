<?php
//TODO:finish those 3 functions.
session_start();
require_once('../DB_info.php');
$id=$_GET['id'];
$admin=$_GET['admin'];
$employee_id=$_SESSION['employee_id'];

if($admin='Yes'){
    actionNeededForAdmin($id);
}elseif($admin='No'){
    directWithdraw($id);
    logThatBorrowed($id,$employee_id);
}

function DBExecute($sql_phase){
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if (!$link)
    {
        die('Could not connect: ' . mysqli_error($link));
    }
 
    mysqli_query($link,"SET NAMES utf8");
    mysqli_query($link,$sql_phase);

    mysqli_close($link);
}

function actionNeededForAdmin($id){
    //1. change id based tool status to onLock
    //2. update id to emp id
    $juzi="UPDATE tool
    SET tool_status = 'onLock', employee_id = '$employee_id'
    WHERE
	tool_id = '$id';";

    DBExecute($juzi);
}

function directWithdraw($id){
    //1. change tool status to lent
    //2. update id to emp id
    $juzi="UPDATE tool
    SET tool_status = 'lent',
    employee_id = '$employee_id'
    WHERE
	tool_id = '$id';";

    DBExecute($juzi);
}

function logThatBorrowed($id,$employee_id){
    //1. write table "personal_bo_re" that
    // from tool id find name then write time, status, employee  id
    $juzi="INSERT INTO personal_bo_re (
	tool,
	hand_time,
	status_,
	employee_id
)
VALUES
	(
		(
			SELECT
				*
			FROM
				tool
			WHERE
				tool_id = $id
		),
		CURDATE(),
		'Borrowed',
		'$employee_id'
	);";

    DBExecute($juzi);
}


?>