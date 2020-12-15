<?php
	ob_start();
	include_once 'lib/core.php';
    $user =substr(strip_tags(addslashes(trim( $_POST["username"]))),0,40);
    $pass =substr(strip_tags(addslashes(trim($_POST["password1"]))),0,40);
	// $user = $_POST["username"];
	// $pass = $_POST["password1"];

	$result = new stdClass();
    
    $i=register($user,$pass);

    if($i==1) //註冊成功
	{
		header("Location: index.php?msg=3");
		die();
	}
	else //註冊失敗
	{
		header("Location: index.php?msg=4");
		die();
	}
	
	
?>