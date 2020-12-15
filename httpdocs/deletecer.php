<?php
include_once 'lib/core.php';
@session_start();

$id=$_POST["id"];


$result = new stdClass();
    
$i=deletemancer($id);

if($i==1)
{
	 die("{\"status\":\"1\",\"message\":\"已更新\"}");
}

?>
