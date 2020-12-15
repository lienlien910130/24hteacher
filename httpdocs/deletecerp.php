<?php
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$uid = $_SESSION["id"];
$sql="SELECT * FROM certification WHERE types = 0 AND uid='".$uid."' ";
$rs = $pdo -> query($sql);
foreach ($rs as $key => $row) {
    $i =explode("/",$row["paths"]);
    if(file_exists('certification/'.$i[1])){
        unlink('certification/'.$i[1]);
	}
}
$sql = "UPDATE certification SET names ='0' , paths='0',checks =0 WHERE types = 0 AND uid='".$uid."' ";
$pdo -> query($sql);
die("{\"status\":\"1\",\"message\":\"已更新\"}");


?>
