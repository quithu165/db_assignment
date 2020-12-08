<?php

    $name = $_POST["pname"];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_shopping";
    $mysqli = new mysqli($server, $username, $password);
    //SQL DELETE HERE
    $sql = "DROP USER ".$name.";";


    // $sql .= "DELETE FROM `online_shopping`.`user` WHERE `username` = '".$name."';";

    // $result = mysqli_multi_query($mysqli, $sql);  
    $stmt = $mysqli->prepare("DELETE FROM `online_shopping`.`product` WHERE `product_name` = ?;");
    $stmt->bind_param("s",$pname);
    $pname = $name;

    $stmt->execute();
    mysqli_close($mysqli);
    header( "Location: ../index.php?page=home" );

?>