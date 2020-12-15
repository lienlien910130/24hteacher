<?php
	$id = $_POST["id"];
	$deal = $_POST["deal"];   


    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
    $i=changeapply($id,$deal);
    
    if($i == 1 ){
    	return 1;
    }

?>