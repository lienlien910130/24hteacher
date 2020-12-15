<?php 
@session_start();
include_once 'lib/core.php';
$pdo = DB_CONNECT();

$account =addslashes($_POST["account"]);
$password =addslashes($_POST["password"]);

$result = new stdClass();

$i = deletenews_a($account,$password);

if($i == 1 ){
    die("{\"status\":\"1\",\"message\":\"感謝您這段期間的訂閱!歡迎您隨時再訂閱!謝謝\"}");
    die();
}
if($i == 0 ){
    die("{\"status\":\"0\",\"message\":\"查無此訂閱者!請重新輸入帳號密碼\"}");
   die();
}
?>