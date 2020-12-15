<?php 
include_once 'lib/core.php';

$id = $_POST["id"];
$title=$_POST["title"];
$descript = $_POST["descript"];
$content=$_POST["content"];
$contitle = $_POST["contitle"];
$types = $_POST["types"];
$result = new stdClass();

$i=editparent($id,$title,$descript,$content,$contitle,$types);

    if($i==1) 
	{
		header("Location: parents.php");
        die();
	}
?>