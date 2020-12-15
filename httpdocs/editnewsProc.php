<?php
include_once 'lib/core.php';
@session_start();

$id=$_POST["id"];
$cases=$_POST["casespa"];
$teacher=$_POST["teachpa"];
$web=$_POST["webpa"];


$result = new stdClass();
    
$i=editnews_man($id,$cases,$teacher,$web);

if($i==1)
{
	 die("{\"status\":\"1\",\"message\":\"已更新\"}");
}

?>
