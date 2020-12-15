<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();
    $uid = $_SESSION["id"];
    $inid=$_POST["inid"];
    $val= addslashes($_POST["commenttext"]);
    $num=$_POST["num"];
	$result = new stdClass();
    $i =addcomment($uid,$inid,$val,$num);
    
	if($i==1) 
	{
		header('Location:commentcase.php');
	}
	else{
 		return false;
	}
	
?>
