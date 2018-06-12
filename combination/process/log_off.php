<?php

function log_off(){
    unset($_SESSION['name']);
    unset($_SESSION['employee_id']);
    unset($_SESSION['sub_co']);
    unset($_SESSION['department']);
    unset($_SESSION['if_specialist']);
    unset($_SESSION['user_permission']);
    session_destroy();
}

session_start();
echo 'Logged off';
log_off();

?>