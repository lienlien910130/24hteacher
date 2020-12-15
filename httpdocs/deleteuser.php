<?php
	$id = $_POST["id"]; // []
	
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
    $i=deleteuser($id);
    
   if($i == 1 ){
  die("{\"status\":\"1\",\"message\":\"已刪除該名使用者!\"}");
}
if($i == 0 ){
  die("{\"status\":\"0\",\"message\":\"刪除失敗，請詢問開發人員\"}");
}

?>