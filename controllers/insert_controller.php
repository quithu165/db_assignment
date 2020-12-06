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

    $sql .= "INSERT INTO `online_shopping`.`product` (`product_id`, `brand`, `product_name`, `product_model`, `msrp`, `availability`)
             VALUES ('$id', '$brand', '$name', '$model', '$price', '$avai');";

    $result = mysqli_multi_query($mysqli, $sql);  
    mysqli_close($mysqli);
    require_once("../views/login.html");

?>