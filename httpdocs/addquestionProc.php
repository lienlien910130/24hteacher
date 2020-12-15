<?php
	
    $title = $_POST["title"];
    //$content = $_POST["content"];
    
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
  //  $i=addquestion($title,$content);
      $i=addquestion($title);
    if($i == 1 ){
    	header("Location: man_question.php");
        die();
    }

?>