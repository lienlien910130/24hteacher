<?php
include_once 'lib/core.php';
@session_start();
$uid = $_POST["uid"];
$caid = $_POST["caid"];
$cauid = $_POST["cauid"];

 ob_start();
 $result = new stdClass();

 $i=addapply($uid,$caid,$cauid);
    
 if($i == 1 ){
       return 1;
  }else{
     return 0;
  }
?>