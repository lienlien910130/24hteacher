<?php
include_once 'lib/core.php';
@session_start();

$id=$_POST["id"];
$checks=$_POST["checks"];



$result = new stdClass();
    
$i=editmancard($id,$checks);

if($i==1)
{
	 die("{\"status\":\"1\",\"message\":\"已更新\"}");
}

?>
