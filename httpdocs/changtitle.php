<?php
	
    $title = $_POST["title"];
    $id = $_POST["id"];
    $sort = $_POST["mysort"];
    
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
  //  $i=addquestion($title,$content);
      $i=editquespar($id,$title,$sort);
    if($i == 1 ){
    	header("Location: man_question.php");
        die();
    }

?>