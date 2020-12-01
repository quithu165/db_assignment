<?php 
	require_once('../models/category_model.php');
	$res = $_REQUEST['function'];
    $func = substr($res, 0, strripos($res, '_'));
	$category = substr($res, strripos($res, '_')+1);
	if ($func == "getProductList") {
		$usermodel = new Category();
		$data = $usermodel->queryProductList($category);
	}
	else {
		
		
	}