<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();
    
    $id = $_SESSION["id"];
    
	$password = addslashes($_POST["pas1"]);
	$password1 = addslashes($_POST["pas"]);

	$result = new stdClass();
    $i =updatePassword($id,$password,$password1);
    
	if($i==1) 
	{
		header("Location: change_password.php?msg=1");
		die();
	}
	if($i==2) 
	{
		header("Location: change_password.php?msg=2");
		die();
	}
	if($i==3) 
	{
		header("Location: change_password.php?msg=3");
		die();
	}
	
	
?>
