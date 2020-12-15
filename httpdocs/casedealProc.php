<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();
    $uid = $_SESSION["id"];
    $inid=$_POST["inid"];
    $salary=addslashes($_POST["salary"]);

	$result = new stdClass();
    //$i =addcasedeal($uid,$inid,$salary);
    $i =addprice($uid,$inid,$salary);
	if($i==1) 
	{
		header('Location:interview_two.php');
	}
	else{
 		header('Location:interview_two.php');
	}
	
?>
