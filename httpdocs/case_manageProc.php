<?php
include_once 'lib/core.php';
@session_start();
$cid=$_POST["cid"];
$status=$_POST["status"];

$result = new stdClass();
    
$i=casestatus($cid,$status);

if($i==1)
{
	die("{\"status\":\"1\",\"message\":\"更新成功!\"}");
}

?>
