<?php
include_once 'lib/core.php';
$cid = $_POST["CNo"];
$sql = "SELECT * from area where cid='".$cid."'";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)) {
    echo "<option value='0'>鄉鎮</option>";
    $rs1 =$pdo->query($sql);
  	foreach ($rs1 as $key => $row1) { 
        echo "<option value='" . $row1["id"] . "'>" . $row1["value"] . "</option>";
  }
}
else {//縣市編號帶入後如果有資料存在顯示底下內容回傳
    echo "<option value='0'>鄉鎮</option>";
}
?>