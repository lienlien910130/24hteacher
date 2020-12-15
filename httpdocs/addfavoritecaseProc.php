<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();

    $id=$_POST["id"];
	$uid = $_POST["uid"];
	$types = $_POST["types"];

	$result = new stdClass();
    $i =addfavoritecase($id,$uid,$types);
    
	if($i==1) 
	{
		 die("{\"status\":\"1\",\"message\":\"加入成功!請至會員中心查看!\"}");
	}
	else{
 		 die("{\"status\":\"0\",\"message\":\"已在我的最愛裡面!\"}");
	}
	
?>
