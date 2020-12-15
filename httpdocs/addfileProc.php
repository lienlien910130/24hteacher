<meta charset="utf-8">
<?php
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$mytitle = $_POST["mytitle"];
$myobj = $_POST["myobj"];
$content = $_POST["content"];

 if($_FILES['myfiles']['name'] != ""){
    if($_FILES['myfiles']['type'] == "image/png" || $_FILES['myfiles']['type'] == "image/jpg" || 
      $_FILES['myfiles']['type'] == "image/jpeg" || $_FILES['myfiles']['type'] == "image/gif"){
        header("Location: fileupload.php?msg=1");
        die();
    }else{
             $tmpFilePath = $_FILES['myfiles']['tmp_name'];

             if($tmpFilePath != ""){
             $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["myfiles"]["name"]);
             $shortname2 = $_FILES["myfiles"]["name"];   
             $filePath1 = "downfiles/" .date('d-m-Y-H-i-s').'-'.$shortname1;
             $filePath2 = "downfiles/" .date('d-m-Y-H-i-s').'-'.$shortname2;

            // if(move_uploaded_file($tmpFilePath, $filePath)){
             move_uploaded_file($tmpFilePath, $filePath1);
            switch ($myobj) {
                case 1:
                        $myo ="老師";
                        break;
                case 2:
                        $myo ="案主家長";
                        break;
                case 3:
                        $myo ="老師及案主家長";
                        break;
                default:
                break;
            }
            if($_FILES['myicon']['type'] == "image/png" || $_FILES['myicon']['type'] == "image/jpg" || 
                 $_FILES['myicon']['type'] == "image/jpeg" || $_FILES['myicon']['type'] == "image/gif"){
               
                 $tmpFilePath1 = $_FILES['myicon']['tmp_name'];
                 if($tmpFilePath != ""){
                 $shortname3 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["myicon"]["name"]);
                 $shortname4 = $_FILES["myicon"]["name"];   
                 $filePath3 = "downfiles/" .date('d-m-Y-H-i-s').'-'.$shortname3;
                 $filePath4 = "downfiles/" .date('d-m-Y-H-i-s').'-'.$shortname4;

                // if(move_uploaded_file($tmpFilePath, $filePath)){
                  move_uploaded_file($tmpFilePath1, $filePath3);
                }
            }else{
              header("Location: fileupload.php?msg=1");
              die();}

                $sql=" INSERT INTO downfiles(title,imgs,objects,content,name,paths,imgname) VALUES ('".$mytitle."','".$filePath4."','".$myo."','".$content."','".$shortname2."',N'".$filePath2."','".$shortname4."') ";
                $pdo -> query($sql);
                // $sql=" INSERT INTO picture(paths,types,name,description) VALUES (N'".$filePath2."',2,'".$shortname2."','".$des."') ";
                // $pdo -> query($sql);
             
           //  }
                 header("Location: fileupload.php");
                 die();

        }
    
    }

 }



?>