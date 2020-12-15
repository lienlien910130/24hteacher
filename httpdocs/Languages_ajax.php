<?php
include_once 'lib/core.php';
$lid = $_POST["CNo"];
$sql = "SELECT * from level where lid='".$lid."'";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);

    echo "<option value=''>選擇程度</option>";
  	foreach ($rs as $key => $row) { 
        echo "<option value='" . $row["id"] . "'>" . $row["val"] . "</option>";
  }

?>