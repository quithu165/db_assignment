<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = '';
}
include 'views/header.html';

// define('STAFF', '2');
// define('ADMIN', '3');

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = '';
}
$username = $_SESSION['username'];

 
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