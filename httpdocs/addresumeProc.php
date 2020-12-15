<?php
	$mySubject = $_POST["mySubject"]; // []
	$myLession =$_POST["myLession"]; 
	$myCity = $_POST["myCity"]; // []
	$myTown = $_POST["myTown"];   // []
	$myObject = $_POST["myObject"]; // []
	$myPrice = $_POST["myPrice"]; // []
	$year = addslashes($_POST["year"]); // s
	$experience = addslashes($_POST["experience"]);
	$way = addslashes($_POST["way"]); // s
	$will = addslashes($_POST["will"]); // s
	$education = addslashes($_POST["education"]); // s
	$situation = addslashes($_POST["situation"]); // s
	$school = addslashes($_POST["school"]); // t
	$start = addslashes($_POST["start"]); // t
	$end = addslashes($_POST["end"]); // t
	$identity = addslashes($_POST["identity"]); // s
	$other = addslashes($_POST["other"]); // t
    $department = addslashes($_POST["department"]);
  	$myCountry = $_POST["myCountry"]; // []
	$myTime = $_POST["myTime"]; // []
	$myLanguages = $_POST["myLanguages"]; // []
	$myLevel = $_POST["myLevel"]; // []
    ob_start();
    date_default_timezone_set('Asia/Taipei');
	include_once 'lib/core.php';
    $result = new stdClass();
    @session_start();
    $uid = $_SESSION["id"];
    $pdo = DB_CONNECT();
    $sql = "SELECT * FROM member WHERE id=".$uid;
	$rs = $pdo->query($sql);
	foreach ($rs as $key => $row) {
	    $num = $row["numbers"];
	}
    $sql = "INSERT INTO resume(numbers,uid,addtime,lastedit,views,deal,status) VALUES ('".$num."','".$uid."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."',0,0,0)";
    $pdo -> query($sql);
    $reid = $pdo ->lastInsertId();

    if($_FILES['pic']['name'] != ""){
    	$tmpFilePath = $_FILES['pic']['tmp_name'];
    	if($_FILES['pic']['type'] == "image/png" || $_FILES['pic']['type'] == "image/jpg" || 
         $_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/gif"){
	        if($tmpFilePath != ""){
	            $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["pic"]["name"]);
	            $shortname2 = $_FILES["pic"]["name"];
	            $filePath1 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname1;
	            $filePath2 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname2;
	            move_uploaded_file($tmpFilePath, $filePath2);
	            $sql="INSERT INTO certification(names,paths,types,checks,uid,addtime) VALUES ('".$shortname2."','".$filePath2."',0,0,'".$uid."','".date("Y-m-d H:i:s")."') ";
	            $pdo -> query($sql);
	        }
	    }else{
	    	header("Location: resume.php?msg=2");
	        die();
	    }
    }else{
    	$sql="INSERT INTO certification(names,paths,types,checks,uid,addtime) VALUES ('0','0',0,0,'".$uid."','".date("Y-m-d H:i:s")."') ";
        $pdo -> query($sql);
    }
     for ($k=0; $k < count($myLanguages) ; $k++) { 
     	if($_FILES['card']['name'][$k] != ""){
			$sql = "SELECT * FROM languages WHERE id=".$myLanguages[$k];
			$rs = $pdo->query($sql);
			if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
				$myLs = $row["val"];
			}
			$sql = "SELECT * FROM level WHERE id=".$myLevel[$k];
			$rs = $pdo->query($sql);
			if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
				$myLes = $row["val"];
			}  
			$four = $myLs.",".$myLes;
		    $tmpFilePath = $_FILES['card']['tmp_name'][$k];
            if($tmpFilePath != ""){
            	if($_FILES['card']['type'][$k] == "image/png" || $_FILES['card']['type'][$k] == "image/jpg" || 
			      $_FILES['card']['type'][$k] == "image/jpeg" || $_FILES['card']['type'][$k] == "image/gif"){
			          $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["card"]["name"][$k]);
			            $shortname2 = $_FILES["card"]["name"][$k];
			            $filePath1 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname1;
			            $filePath2 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname2;
			            move_uploaded_file($tmpFilePath, $filePath2);

					    $sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',15,'".$four."')";
					    $pdo -> query($sql);
					    $rlid = $pdo ->lastInsertId();
					    $text = $rlid.",".$shortname2.",".$filePath2.",0";
					    $sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',19,'".$text."')";
					    $pdo -> query($sql);
			    }else{
			    	header("Location: resume.php?msg=2");
			        die();
			    }
          
            // $sql="INSERT INTO certification(names,paths,types,checks,uid,languages,levels) VALUES ('".$shortname2."','".$filePath2."','".$myLanguages[$k]."',0,'".$uid."','".$myLs."','".$myLes."') ";
            // $pdo -> query($sql);
          }
		}else{
			$sql = "SELECT * FROM languages WHERE id=".$myLanguages[$k];
			$rs = $pdo->query($sql);
			if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
				$myLs = $row["val"];
			}
			$sql = "SELECT * FROM level WHERE id=".$myLevel[$k];
			$rs = $pdo->query($sql);
			if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
				$myLes = $row["val"];
			}
			$four = $myLs.",".$myLes;
			$sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',15,'".$four."')";
		    $pdo -> query($sql);
		    $rlid = $pdo ->lastInsertId();
		    $text = $rlid.",0,0,0";
		    $sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',19,'".$text."')";
		    $pdo -> query($sql);
		}
	}

    $i=addresume($reid,$mySubject,$myLession,$myCity,$myTown,$myObject,$myPrice,$year,$experience,$way,$will,$education,$situation,$school,$start,$end,$myCountry,$myTime,$identity,$myLanguages,$myLevel,$other,$department);
    
    if($i == 1 ){
        header("Location: resume.php");
		die();
    }

?>