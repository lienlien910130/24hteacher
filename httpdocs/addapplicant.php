<?php
ob_start();
include_once 'lib/core.php';
@session_start();
$uid = $_SESSION["id"];
$reid=$_POST["reid"];
$rid=$_POST["rid"];
$cid=$_POST["cid"];
$caid=$_POST["caid"];

$result = new stdClass();

$i =teacherinterview($reid,$rid,$cid,$caid);
if($i==1) 
{
   die("{\"status\":\"1\",\"message\":\"系統已幫您通知!請靜待回覆，謝謝。\"}");
}
else{
   die("{\"status\":\"0\",\"message\":\"已應徵過，若尚無回覆請靜待通知，謝謝。\"}");
}

?>