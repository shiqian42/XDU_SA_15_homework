<?php
function navito_etms_personal(){
    //重定向浏览器   
    header("Location: ../etms_personal.php");   
    //确保重定向后，后续代码不会被执行   
    exit;  
}

function navito_login(){  
    header("Location: ../index.php");   
exit;  
}

function navito_wms_admin(){ 
    header("Location: ../wms_admin.php");   
exit;  
}

function navito_etms_borrow_tool(){  
    header("Location: ../etms_borrow_tool.php");   
exit;  
}

function navito_tool_status(){ 
    header("Location: ../tool_status.php");   
exit;  
}

?>