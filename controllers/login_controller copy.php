<?php
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $server = "localhost";
    $mysqli = new mysqli($server, $username, $password);
    if (mysqli_multi_query($mysqli, $sql)) ;  
    // mysqli_close($mysqli);


?>