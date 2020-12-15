<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();

$uid =$_POST["uid"];
$cid =$_POST["cid"];
$cuid =$_POST["cuid"];

$result = new stdClass();

$i = addnote($uid,$cid,$cuid);

if($i == 1 ){
  die("{\"status\":\"1\",\"message\":\"我們將為您處理!感謝您的購買\"}");
}
if($i == 0 ){
  die("{\"status\":\"0\",\"message\":\"已通知老師，請靜待回復，謝謝。\"}");
}
?>