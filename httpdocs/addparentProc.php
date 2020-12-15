<meta charset="utf-8">
<?php
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$title = $_POST["title"];
$descript = $_POST["descript"];
$content = $_POST["content"];
$contitle = $_POST["contitle"];
$types = $_POST["types"];

 if($_FILES['pic']['name'] != ""){
    if($_FILES['pic']['type'] == "image/png" || $_FILES['pic']['type'] == "image/jpg" || 
      $_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/gif"){
        
        $tmpFilePath = $_FILES['pic']['tmp_name'];

             if($tmpFilePath != ""){
             $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["pic"]["name"]);
             $shortname2 = $_FILES["pic"]["name"];   
             $filePath1 = "article/" .date('d-m-Y-H-i-s').'-'.$shortname1;
             $filePath2 = "article/" .date('d-m-Y-H-i-s').'-'.$shortname2;

             move_uploaded_file($tmpFilePath, $filePath1);
             $sql=" INSERT INTO parents(name,paths,title,description,val,addtime,contitle,types) VALUES ('".$shortname2."','".$filePath2."','".$title."','".$descript."','".$content."','".date("Y-m-d H:i:s")."','".$contitle."','".$types."') ";
             $pdo -> query($sql);
          header("Location: parents.php");
          die();

    }else{
          header("Location: parents.php?msg=1");
          die(); 
        }
    
    }

 }



?>