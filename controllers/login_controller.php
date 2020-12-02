<?php
require_once('../models/user_model.php');
$res = $_REQUEST['info'];
// echo ($res);

$usermodel = new UserModel();
$data = $usermodel->login($res);
if ($data != "#fails") $_SESSION['username'] = $data;
echo($data);
