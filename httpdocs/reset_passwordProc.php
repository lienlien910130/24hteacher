<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();
    $email = addslashes($_POST["email"]);
	$password = addslashes($_POST["pas1"]);

	$result = new stdClass();
    $i =resetPassword($email,$password);
    
	if($i==1) 
	{
		header("Location: index.php?msg=9");
		die();
	}
	
	
?>
