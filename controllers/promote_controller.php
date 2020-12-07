<?php

    $name = $_POST["pname"];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "online_shopping";
    $mysqli = new mysqli($server, $username, $password);
    //SQL DELETE HERE
    $sql = "CALL promote_to_admin('$name');";

    $result = mysqli_query($mysqli, $sql);  
    mysqli_close($mysqli);
    header( "Location: ../index.php?page=home" );

?>