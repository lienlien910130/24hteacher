<?php 
include_once 'lib/core.php';
$id = $_POST["id"];
$title=$_POST["title"];
$mytype=$_POST["mytype"];
$content=$_POST["content"];

$result = new stdClass();

$i=editsub($id,$title,$mytype,$content);

    if($i==1) 
	{
		header("Location: art_newsletter.php");
        die();
	}
?>