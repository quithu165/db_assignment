<?php

    $name = $_POST["pname"];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_shopping";
    $mysqli = new mysqli($server, $username, $password);
    //SQL DELETE HERE
    $sql = "DROP USER ".$name.";";


    $sql .= "DELETE FROM `online_shopping`.`user` WHERE `username` = '".$name."';";

    $result = mysqli_multi_query($mysqli, $sql);  
    mysqli_close($mysqli);
    require_once("../views/login.html");

?>