<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();

	$fid = $_POST["fid"];
	

	$result = new stdClass();
    $i =removefavoritecase($fid);
    
	if($i==1) 
	{
		 die("{\"status\":\"1\",\"message\":\"成功\"}");
		
	}
	else{
		 die("{\"status\":\"0\",\"message\":\"失敗\"}");
		
	}
	
?>
