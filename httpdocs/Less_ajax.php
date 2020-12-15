<?php
include_once 'lib/core.php';
$tid = $_POST["TNo"];
$sql = "SELECT s.val as sv,l.val as lv  from lessions l LEFT JOIN subjects s on s.id=l.sid  where l.id='".$tid."'";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)) {
   echo  $row["sv"].$row["lv"];
}
else {
    echo "無資料";
}
?>