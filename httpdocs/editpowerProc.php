<?php
include_once 'lib/core.php';
@session_start();

$id=$_POST["id"];
$certi=$_POST["certi"];
$cases=$_POST["cases"];
$resumes=$_POST["resumes"];
$invite=$_POST["invite"];
$application=$_POST["application"];

$result = new stdClass();

$i=powerstatus($id,$certi,$cases,$resumes,$invite,$application);

if($i==1)
{
	return 1;
}

?>
