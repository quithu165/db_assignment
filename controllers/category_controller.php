<?php 
	require_once('../models/category_model.php');
	$res = $_REQUEST['function'];
    $func = substr($res, 0, strripos($res, '_'));
	$category = substr($res, strripos($res, '_')+1);
	if ($func == "getProductList") {
		$categorymodel = new Category();
		$data = $categorymodel->queryProductList($category);
		echo ("_1_2");
	}
	else {
		$categorymodel = new Category();
		$data = $categorymodel->queryProduct($res);
		echo ("1_2_3_4_5_6");
	}