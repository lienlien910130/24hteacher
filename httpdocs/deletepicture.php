<?php 

include_once 'lib/core.php';
@session_start();
$id = $_POST["id"];
$result = new stdClass();
$i =deletepicture($id);
if($i==1) 
{
  return 1;
}
if($i==0){
	return 0;
}

?>