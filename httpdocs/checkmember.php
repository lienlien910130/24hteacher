<?php
include_once 'lib/core.php';
@session_start();

$username=addslashes($_POST["username"]);

$result = new stdClass();
    
$i=checkmemb($username);

if($i==0)
{
	die("{\"status\":\"0\",\"message\":\"最高權限者\"}");	
}else if($i == 1){
   $x=sendpassword($username);
	if($x == 1){
	 die("{\"status\":\"1\",\"message\":\"寄件成功!\"}");	
	}else{
	 die("{\"status\":\"2\",\"message\":\"寄件失敗!\"}");	
	}
}else if($i == 2){
    die("{\"status\":\"3\",\"message\":\"fb登入\"}");	
}else if($i == 3){
    die("{\"status\":\"4\",\"message\":\"gmail登入\"}");	
}else{
	die("{\"status\":\"5\",\"message\":\"查無此人!\"}");
}

?>
