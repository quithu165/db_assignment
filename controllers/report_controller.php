<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "online_shopping";
$mysqli = new mysqli($server, $username, $password);

$sql = "SELECT category_name, COUNT(product_id) FROM online_shopping.product NATURAL JOIN online_shopping.category GROUP BY category_id";
$result = mysqli_query($mysqli, $sql);
$report = "";
while ($row = mysqli_fetch_assoc($result)){
	$report = $report . '_' . $row["category_name"] . '_' . $row["COUNT(product_id)"];
}

echo $report;
mysqli_close($mysqli);
// header("Location: ../index.php?page=home");
