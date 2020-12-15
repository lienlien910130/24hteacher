<?php 
include_once 'lib/core.php';
$content = $_POST["content"];
$id=$_POST["id"];
$title=$_POST["title"];

$result = new stdClass();

$i=editchipage($id,$content,$title);

if($i==1)
{
	header("Location: man_question.php");
    die();
}
?>