<?php
	
    $id = $_POST["id"];
    //$content = $_POST["content"];
    
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
  
      $i=deletechiquestion($id);
    if($i == 1 ){
    	header("Location: man_question.php");
        die();
    }

?>