<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();

    $id=$_POST["id"];
	$status = $_POST["status"];
	$result = new stdClass();
    $i =changestatus($id,$status);
    
	if($i==1) 
	{
		return true;
	}
	else{
 		return false;
	}
	
?>
