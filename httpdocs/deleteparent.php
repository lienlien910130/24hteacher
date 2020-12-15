<?php 
include_once 'lib/core.php';
$id = $_POST["id"];

$result = new stdClass();

$i=deleteparent($id);

    if($i==1) //註冊成功
	{
		 die("{\"status\":\"1\",\"message\":\"刪除成功!\"}");
	}
?>