<?php
    $id = $_POST["pid"];
    $brand = $_POST["pbrand"];
    $name = $_POST["pname"];
    $model = $_POST["pmodel"];
    $price = $_POST["pprice"];
    $avai = $_POST["pavai"];
    // $address = $_POST["address"];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_shopping";
    $mysqli = new mysqli($server, $username, $password);
    //SQL EDIT HERE
    // $sql = "CREATE USER ".$new_username." IDENTIFIED VIA mysql_native_password USING PASSWORD('".$new_password."');";
    // $sql .= "GRANT `customer` TO '$new_username';";
    // $sql .= "SET DEFAULT ROLE `customer` FOR '$new_username';";
    // $sql .= "INSERT INTO `online_shopping`.`user` VALUES ('$new_username', '$email', '$address', '$first_name', '$last_name', '$national_id', 'customer');";

    $result = mysqli_multi_query($mysqli, $sql);  
    mysqli_close($mysqli);
    require_once("../views/login.html");

?>