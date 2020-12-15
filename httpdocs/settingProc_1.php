<?php
	$myCourse = $_POST["myCourse"]; // []
	$myZip = $_POST["myZip"];   // []
	$myObject = $_POST["myObject"]; // []
	$myPrice = $_POST["myPrice"]; // []
	$year = $_POST["year"]; // s
	$myLession=$_POST["myLession"];
	$myTown=$_POST["myTown"];
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
    $i=editsetting($myCourse,$myZip,$myObject,$myPrice,$year,$myLession,$myTown);
    
    if($i == 1 ){
        header("Location: setting.php");
		die();
    }

?>