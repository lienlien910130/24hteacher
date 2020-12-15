<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();

$account =$_POST["account"];
$password =$_POST["password"];
$type =$_POST["type"];

$result = new stdClass();

$i = addnews($account,$password,$type);

if($i == 1 ){
  die("{\"status\":\"1\",\"message\":\"訂閱成功!\"}");
}
if($i == 0 ){
  die("{\"status\":\"0\",\"message\":\"帳號或密碼錯誤!請重新輸入\"}");
}
?>