<?php
    $myName = $_POST["myName"]; // []
    $myGender = $_POST["myGender"]; // []
    $myIdentity = $_POST["myIdentity"]; // []
    $mySchool = $_POST["mySchool"]; // []
    $extent = $_POST["extent"]; // t
    $goal = $_POST["goal"]; // s
	$myCourse = $_POST["myCourse"]; // []
	$way = $_POST["way"]; // s
	$person = $_POST["person"];   // s
	$location = $_POST["location"]; // s
	$rang = $_POST["rang"]; // s
	$myWeek = $_POST["myWeek"]; // []
	$myStartTime = $_POST["myStartTime"]; // []
	$myEndTime = $_POST["myEndTime"]; // []
	$time = $_POST["time"]; // r
	$datetext = $_POST["datetext"]; // t
	$experience = $_POST["experience"]; // s
	$identity = $_POST["identity"]; // s
	$school = $_POST["school"]; // r
	$schooltext = $_POST["schooltext"]; // t
	$department = $_POST["department"]; // r
	$departmenttext = $_POST["departmenttext"]; // t
	$low = $_POST["low"]; // t
	$high = $_POST["high"]; // t
	$other = $_POST["other"]; // t
	$load = $_POST["load"];
    $connectionName = $_POST["connectionName"];
    $connectionPhone = $_POST["connectionPhone"];
    $myZip = $_POST["myZip"];
    $cid = $_POST["cid"];
    $open = $_POST["open"];

    $myLession = $_POST["myLession"];
    $myTown=$_POST["myTown"];
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();

    $i=editcase($myName,$myGender,$myIdentity,$mySchool,$extent,$goal,$myCourse,$way,$person,$location,$rang,$myWeek,$myStartTime,$myEndTime,$time,$datetext,$experience,$identity,$school,$schooltext,$department,$departmenttext,$low,$high,$other,$load,$connectionName,$connectionPhone,$myZip,$cid,$open,$myLession,$myTown);
    
    if($i == 1 ){
        header("Location: casedetail.php?id=".$cid);
		die();
    }

?>