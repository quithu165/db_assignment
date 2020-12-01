<?php
session_start();
include 'views/header.html';

// define('STAFF', '2');
// define('ADMIN', '3');

// if (!isset($_SESSION['role'])) {
//     $_SESSION['role'] = '';
// }
// $role = $_SESSION['role'];

 
 if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "") {
        include "views/exception.html";
    } 
    elseif ($page == "home") {
        include "views/home.html";
    } 
    elseif ($page == "login") {
        include "views/login_view.html";
    } 
 }
 else include "views/home.html";
//require_once 'views/footer.html';
?>