<?php
include_once 'lib/core.php';
@session_start();
$pdo=DB_CONNECT();
$pas1 = $_POST["pas1"];
$pas2 = $_POST["pas2"];

$sql = "UPDATE mailer SET mailac = '".$pas1."',mailpa='".$pas2."' WHERE id=1 ";
$pdo ->query($sql);

header("Location: mail.php?msg=1");
die();

?>