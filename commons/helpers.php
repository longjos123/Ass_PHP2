<?php

const BASE_URL = "http://localhost/PHP2/asm1/";
const PUBLIC_URL = BASE_URL . 'public/';
const ADMIN_ROLE = 1;
const STUDENT_ROLE = 2;
function checkRole($roleId){
    if(!isset($_SESSION['auth']) || $_SESSION['auth']['role_id'] != $roleId){
        header('location: ' . BASE_URL . 'login?msg=Bạn không có quyền truy cập vào đường dẫn này');
        die;
    }
}

?>