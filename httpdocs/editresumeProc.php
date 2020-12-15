<?php
	$reid = $_POST["reid"];
	$cerid = $_POST["cerid"];
	$mySubject = $_POST["mySubject"]; // []
	$myLession = $_POST["myLession"];   // []
	$myCity = $_POST["myCity"]; // []
	$myTown = $_POST["myTown"];   // []
	$myObject = $_POST["myObject"]; // []
	$myPrice = $_POST["myPrice"]; // []
	$year = $_POST["year"]; // s
	$experience = $_POST["experience"]; // t
	$way = $_POST["way"]; // s
	$will = $_POST["will"]; // s
	$education = $_POST["education"]; // s
	$situation = $_POST["situation"]; // s
	$school = $_POST["school"]; // t
	$start = $_POST["start"]; // t
	$end = $_POST["end"]; // t
	$identity = $_POST["identity"]; // s
	$other = $_POST["other"]; // t
    $department = $_POST["department"];
  	$myCountry = $_POST["myCountry"]; // []
	$myTime = $_POST["myTime"]; // []
	$myLanguages = $_POST["myLanguages"]; // []
	$myLevel = $_POST["myLevel"]; // []
    ob_start();
	include_once 'lib/core.php';
    $result = new stdClass();
    date_default_timezone_set('Asia/Taipei');
    @session_start();
    $uid = $_SESSION["id"];
    $pdo = DB_CONNECT();
    
    if($_FILES['pic']['name'] != ""){
    	$tmpFilePath = $_FILES['pic']['tmp_name'];
        if($tmpFilePath != ""){
        	if($_FILES['pic']['type'] == "image/png" || $_FILES['pic']['type'] == "image/jpg" || 
		        $_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/gif"){
		        $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["pic"]["name"]);
		        $shortname2 = $_FILES["pic"]["name"];
		        $filePath1 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname1;
		        $filePath2 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname2;
		        move_uploaded_file($tmpFilePath, $filePath2);
		        $sql = "UPDATE certification SET names ='".$shortname2."' , paths='".$filePath2."',checks =0 , addtime='".date("Y-m-d H:i:s")."' WHERE types = 0 AND uid='".$uid."' ";
		        $pdo -> query($sql);
		    }else{
		    	 header("Location: resume.php?msg=2");
		        die();
		    }
        }
    }
    $a = array();
    for ($k=0; $k < count($cerid) ; $k++) { 
    	array_push($a, $cerid[$k]);
    }
    $sql = "SELECT * FROM resume_list WHERE  reid='".$reid."' AND rid = 15 ";
	$rs = $pdo->query($sql);
	foreach ($rs as $key => $row) {
	    if(array_search($row["id"],$a) === false ){
	    	// if(array_search($row["id"],$a) === false){
	    	// }else{
	    	$sql2 = "DELETE FROM resume_list WHERE id = '".$row["id"]."' ";
          $pdo->query($sql2);
          $row["id"]++;
          $sql4 = "SELECT * FROM resume_list WHERE id=".$row["id"];
			  $rs4 = $pdo->query($sql4);
				foreach ($rs4 as $key => $row4) {
					$paths = $row4["val"];
				}
				   $u =explode(",",$paths);
				   if($u[2] != "0"){
					$u1 =explode("/",$u[2]);
					if(file_exists('certification/'.$u1[1])){
					   unlink('certification/'.$u1[1]);
					  }
				   }
				   $sql3 = "DELETE FROM resume_list WHERE id = '".$row["id"]."' ";
					  $pdo->query($sql3);
	    	//}
	    }
	}
    for ($k=0; $k < count($cerid) ; $k++) { 
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
    	
    	if($cerid[$k] != "000"){
    		if($_FILES['card']['name'][$k] != ""){
    		  $cerid[$k]++;
    	      $sql = "SELECT * FROM resume_list WHERE id=".$cerid[$k];
			  $rs = $pdo->query($sql);
			  foreach ($rs as $key => $row) {
			       $paths = $row["val"];
			  }
			  $cerid[$k]--;
		      $u =explode(",",$paths);
			  if($u[2] != "0"){
			    	$u1 =explode("/",$u[2]);
			    	if(file_exists('certification/'.$u1[1])){
			        unlink('certification/'.$u1[1]);
			       }
			   }
		      $tmpFilePath = $_FILES['card']['tmp_name'][$k];
	          if($tmpFilePath != ""){
	          	if($_FILES['card']['type'][$k] == "image/png" || $_FILES['card']['type'][$k] == "image/jpg" || 
     			 $_FILES['card']['type'][$k] == "image/jpeg" || $_FILES['card']['type'][$k] == "image/gif"){
			        $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["card"]["name"][$k]);
				            $shortname2 = $_FILES["card"]["name"][$k];
				            $filePath1 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname1;
				            $filePath2 = "certification/" .date('d-m-Y-H-i-s').'-'.$shortname2;
				            move_uploaded_file($tmpFilePath, $filePath2);
							$sql="UPDATE resume_list SET val = '".$four."' WHERE id ='".$cerid[$k]."' ";
						    $pdo -> query($sql);
					       $text = $cerid[$k].",".$shortname2.",".$filePath2.",0";
						    $cerid[$k]++;
						    $sql1="UPDATE  resume_list SET val = '".$text."' WHERE id ='".$cerid[$k]."'";
						    $pdo -> query($sql1);
				    }else{
				    	header("Location: resume.php?msg=2");
				        die();
				    }       
	          }
			}else{
                $sql="UPDATE resume_list SET val = '".$four."' WHERE id ='".$cerid[$k]."' ";
			    $pdo -> query($sql);
			}
    	}else{
    		if($_FILES['card']['name'][$k] != ""){
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
	          }
	         
			}else{
				$sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',15,'".$four."')";
			    $pdo -> query($sql);
			    $rlid = $pdo ->lastInsertId();
			    $text = $rlid.",0,0,0";
			    $sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',19,'".$text."')";
			    $pdo -> query($sql);
			}
    	}
     	
	}

    $i=editresume($reid,$mySubject,$myLession,$myCity,$myTown,$myObject,$myPrice,$year,$experience,$way,$will,$education,$situation,$school,$start,$end,$myCountry,$myTime,$identity,$other,$department);
    
    if($i == 1 ){
        header("Location: resume.php?msg=1");
		die();
    }

?>