<?php

$username = $_POST["loginUser"];
$password = $_POST["loginPass"];
$server = "localhost";
$mysqli = new mysqli($server, $username, $password);
if (!$mysqli) setcookie("failed", $username, time() + 100000, "/");
else {
    $sql = " SELECT user_type FROM online_shopping.user WHERE username = '$username'";

    if ($result = mysqli_query($mysqli, $sql)) {
        $row = mysqli_fetch_assoc($result);
        echo $sql;
        echo $row;
        setcookie("role", $row["user_type"], time() + 100000, "/");
        setcookie("username", $username, time() + 100000, "/");
    }
    else echo "query false";
}
    // header( "Location: ../index.php?page=home" );
?>