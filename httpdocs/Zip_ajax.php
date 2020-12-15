<?php
include_once 'lib/core.php';
$tid = $_POST["TNo"];
$sql = "SELECT * from area a LEFT JOIN city c on a.cid=c.id  where a.id='".$tid."'";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)) {
   echo  $row["code"].$row["cityvalue"].$row["value"];
}
else {
    echo "無資料";
}
?>