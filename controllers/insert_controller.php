<?php
$id = $_POST["pid"];
$brand = $_POST["pbrand"];
$name = $_POST["pname"];
$model = $_POST["pmodel"];
$price = $_POST["pprice"];
$avai = $_POST["pavai"];

$server = "localhost";
$username = "root";
$password = "";
$database = "online_shopping";
$mysqli = new mysqli($server, $username, $password);

$stmt = $mysqli->prepare("INSERT INTO `online_shopping`.`product` (`product_id`, `brand`, `product_name`, `product_model`, `msrp`, `availability`)
VALUES (?,?,?,?,?,?);");
$stmt->bind_param("isssii", $pid, $pbrand, $pname, $pmodel, $pprice, $pavai);
$pid = $id ;
$pbrand = $brand;
$pname = $name;
$pmodel = $model;
$pprice = $price;
$pavai = $avai;
$stmt->execute();
mysqli_close($mysqli);
    header( "Location: ../index.php?page=home" );
