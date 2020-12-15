<?php
	$id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();

    $i=addqueschi($id,$title,$content);
    
    if($i == 1 ){
    	header("Location: man_question.php");
        die();
    }

?>