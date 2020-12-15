<?php
    $myName = $_POST["myName"]; 
    $myGender = $_POST["myGender"]; 
    $myIdentity = $_POST["myIdentity"]; 
    $mySchool = $_POST["mySchool"]; 
    $extent = $_POST["extent"]; 
    $goal = $_POST["goal"]; 
    $mySubject = $_POST["mySubject"]; 
	$myLession = $_POST["myLession"]; 
	$way = $_POST["way"]; 
	$person = $_POST["person"]; 
	$connectionName = $_POST["connectionName"];
    $connectionPhone = $_POST["connectionPhone"];
    $myCity = $_POST["myCity"]; 
    $myTown = $_POST["myTown"]; 
	$location = $_POST["location"]; 
	$load = $_POST["load"];
	$rang = $_POST["rang"]; 
	$myWeek = $_POST["myWeek"];
	$myStartTime = $_POST["myStartTime"]; 
	$myEndTime = $_POST["myEndTime"]; 
	$time = $_POST["time"]; 
	$datetext = $_POST["datetext"];
	$experience = $_POST["experience"]; 
	$identity = $_POST["identity"]; 
	$schooltext = $_POST["schooltext"]; 
	$departmenttext = $_POST["departmenttext"]; 
	$low = $_POST["low"]; 
	$high = $_POST["high"]; 
	$other = $_POST["other"]; 
   
    
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();

    $i=addcase($myName,$myGender,$myIdentity,$mySchool,$extent,$goal,$mySubject,$myLession,$way,$person,$connectionName,$connectionPhone,$myCity,$myTown,$location,$load,$rang,$myWeek,$myStartTime,$myEndTime,$time,$datetext,$experience,$identity,$schooltext,$departmenttext,$low,$high,$other);
    
    if($i == 1 ){
        header("Location: history.php?msg=1");
		die();
    }

?>