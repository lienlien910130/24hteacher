<?php 
include_once 'lib/core.php';

$content = $_POST["content"];
$title=$_POST["title"];
$mytype=$_POST["mytype"];

$result = new stdClass();

$i=addsur($title,$content,$mytype);

    if($i==1) //註冊成功
	{
		header("Location: art_newsletter.php");
        die();
	}
?>