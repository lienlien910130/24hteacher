<?php
include_once 'lib/core.php';
@session_start();
$id=$_POST["id"];
$status=$_POST["status"];

$result = new stdClass();
    
$i=editnote($id,$status);

if($i==1)
{
	  die("{\"status\":\"1\",\"message\":\"更新成功!\"}");
}

?>
