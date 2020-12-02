<?php
require_once('../models/user_model.php');
$res = $_REQUEST['confirm'];
// echo ($res);

if (isset($_SESSION['username'])) echo $_SESSION['username'];
else echo "error";