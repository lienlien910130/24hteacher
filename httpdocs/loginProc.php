<?php
	ob_start();
	include_once 'lib/core.php';

    $user =substr(strip_tags(addslashes(trim($_POST['username']))),0,40);
	//$user = $_POST["username"];
	$pass =substr(strip_tags(addslashes(trim($_POST['password']))),0,40);
	//$pass = $_POST["password"];

	$result = new stdClass();
    
    $i=login($user,$pass);

    if($i==1) //登入成功
	{
		header("Location: index.php?msg=1");
		die();
	}
	else //登入失敗
	{
		header("Location: index.php?msg=2");
		die();
	}
	
	
?>