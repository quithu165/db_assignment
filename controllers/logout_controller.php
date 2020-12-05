<?php
    
    $command = $_POST["info"];
    // $server = "localhost";
    // $mysqli = new mysqli($server, $username, $password);
    echo ($command);
    if ($command == "logout") setcookie("username", $username, time() - 100000, "/");
    header( "Location: ../index.php?page=home" );
?>