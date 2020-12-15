<?php
	ob_start();
	include_once 'lib/core.php';
    @session_start();
    $id=$_SESSION["id"];
	  $username = addslashes($_POST["username"]);
	  $gender = addslashes($_POST["gender"]);
    $birthday = addslashes($_POST["birthday"]);
    $phone = addslashes($_POST["phone"]);
    $myZip = addslashes($_POST["myZip"]);
    $numb = addslashes($_POST["numb"]);
    
    $pdo = DB_CONNECT();
    if($_FILES['pic']['name'] != ""){
      if($_FILES['pic']['type'] == "image/png" || $_FILES['pic']['type'] == "image/jpg" || 
      $_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/gif"){
            $tmpFilePath = $_FILES['pic']['tmp_name'];
            if($tmpFilePath != ""){
            $shortname = $_FILES['pic']['name'];
            $filePath = "profile/" . date('d-m-Y-H-i-s').'-'.$_FILES['pic']['name'];

         //   $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["pic"]["name"]);
            $filePath1 = "profile/" .date('d-m-Y-H-i-s').'-'.$shortname1;
             //   if(move_uploaded_file($tmpFilePath, $filePath)){
              $sql = "SELECT * FROM member_list WHERE cid=5 AND uid ='".$id."' ";
              $rs = $pdo -> query($sql);
              foreach ($rs as $key => $row) {
                if($row["val"] != "profile/123.jpg"){
                  $o = explode("/", $row["val"]);
                  if(file_exists('profile/'.$o[1])){
                       unlink(iconv('utf-8','big5//TRANSLIT//IGNORE', 'profile/'.$o[1]));
                    }
                }
              }
              move_uploaded_file($tmpFilePath, $filePath);
              $sql="UPDATE member_list SET val='".$filePath."' WHERE cid=5 AND uid ='".$id."' ";
              $pdo -> query($sql);
               // }
              }
    }else{
      header("Location: account.php?msg=2");
        die();
    }
           

    }else{
        $sql="SELECT * FROM member_list WHERE cid=5 AND uid='".$id."' ";
        $rs = $pdo -> query($sql);
        foreach ($rs as $key => $row) {
            if($row["val"] == ""){
              $filePath = "profile/123.jpg";
              $sql="UPDATE member_list SET val='".$filePath."' WHERE cid=5 AND uid ='".$id."' ";
              $pdo -> query($sql); 
            }
        }
       
    }

	$result = new stdClass();
    $i =updateMember($id,$username,$birthday,$myZip,$phone,$gender,$numb);
    
	if($i==1) 
	{
		header("Location: account.php?msg=1");
		die();
	}
	
	
?>
