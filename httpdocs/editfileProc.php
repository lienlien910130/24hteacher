<?php
	
    $myid = $_POST["myid"];
    $mytitle = $_POST["mytitle"];
    $myobj = $_POST["myobj"];
    $content = $_POST["content"];
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
    $i=editfiledes($myid,$mytitle,$myobj,$content);
    
    if($i == 1 ){
    	header("Location: fileupload.php");
        die();
    }

?>