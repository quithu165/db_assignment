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
    $sql = "UPDATE `online_shopping`.`product` 
            SET `brand` = '".$brand."', `product_name` = '".$name."', 
                `product_model` = '".$model."', `mrsp` = '".$price."', `availability` = '".$avai."'
            WHERE `product_id` = '".$id."';";




    $result = mysqli_multi_query($mysqli, $sql);  
    mysqli_close($mysqli);
    header( "Location: ../index.php?page=home" );

?>