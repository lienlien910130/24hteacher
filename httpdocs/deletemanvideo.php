<?php 
ob_start();
include_once 'lib/core.php';
$result = new stdClass();
$id = $_POST["id"];
$i = deletevideos($id);

if($i == 1 ){
  die("{\"status\":\"1\",\"message\":\"已更新\"}");
}

?>