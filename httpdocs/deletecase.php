<?php 
include_once 'lib/core.php';
@session_start();
$id=$_GET["id"];
$sql = "DELETE FROM case_list WHERE cid =".$id;
$pdo = DB_CONNECT();
$pdo ->query($sql);
$sql = "DELETE FROM cases WHERE id =".$id;
$pdo ->query($sql);

 header("Location: history.php");
?>