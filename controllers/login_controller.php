<?php
require_once('../models/user_model.php');
$res = $_REQUEST['info'];
$username = substr($res, 0, strripos($res, '_'));
$password = substr($res, strripos($res, '_') + 1);
echo ($username);

$usermodel = new UserModel();
$data = $usermodel->login($username, $password);
echo($data);
