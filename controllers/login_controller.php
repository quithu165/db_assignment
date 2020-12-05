<?php
    
    $username = $_POST["loginUser"];
    $password = $_POST["loginPass"];
    $server = "localhost";
    $mysqli = new mysqli($server, $username, $password);
    if (!$mysqli) setcookie("failed", $username, time() + 100000, "/");
    else{
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "online_shopping";
        $mysqli = new mysqli($server, $username, $password);
        
        $sql = " SELECT user_type FROM user WHERE username = '.$username.'";
        

        $result = mysqli_query($mysqli, $sql);  
        $row = mysqli_fetch_assoc($result);
        setcookie("role",1, time() + 100000, "/");
        setcookie("username", $username, time() + 100000, "/");
    }
    header( "Location: ../index.php?page=home" );
?>