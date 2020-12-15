<?php 
@session_start();
include_once 'lib/core.php';
$pdo=DB_CONNECT();

if(!isset($_GET['id']) || empty($_GET['id']) ){
   $id = 0;
   $sql="SELECT * FROM question WHERE val <> 0 LIMIT 0,1";
   $rs = $pdo->query($sql);
   foreach ($rs as $key => $row) {
   	 include_once 'question/'.$row["val"];
   }
}else{
   $id = addslashes($_GET['id']);
   include_once 'question/'.$id.'.html';
}

?>
