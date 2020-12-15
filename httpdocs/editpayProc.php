<?php 
include_once 'lib/core.php';

$id = $_POST["id"];
$status = $_POST["status"];

$result = new stdClass();

$i=editpay($id,$status);

    if($i==1) //註冊成功
	{
		 die("{\"status\":\"1\",\"message\":\"更新成功!\"}");
	}
?>