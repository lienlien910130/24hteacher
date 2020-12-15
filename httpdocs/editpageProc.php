<?php 
include_once 'lib/core.php';
$content = $_POST["content"];
$pageid=$_POST["pageid"];

$result = new stdClass();

$i=editpage($pageid,$content);

    if($i==1) //註冊成功
	{
		header("Location: article.php");
        die();
	}
?>