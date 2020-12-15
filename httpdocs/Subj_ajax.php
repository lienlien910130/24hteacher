<?php
include_once 'lib/core.php';
$sid = $_POST["CNo"];
$sql = "SELECT * from lessions where sid='".$sid."'";
$pdo = DB_CONNECT();
$rs =$pdo->query($sql);

    echo "<option value='0'>科目</option>";
    
  	foreach ($rs as $key => $row) { 
        echo "<option value='" . $row["id"] . "'>" . $row["val"] . "</option>";
  }

?>