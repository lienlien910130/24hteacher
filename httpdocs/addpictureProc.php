<?php
include_once 'lib/core.php';
@session_start();
$pdo = DB_CONNECT();
$mytype = $_POST["mytype"];
 if($_FILES['pic']['name'] != ""){
    if($_FILES['pic']['type'] == "image/png" || $_FILES['pic']['type'] == "image/jpg" || 
      $_FILES['pic']['type'] == "image/jpeg" || $_FILES['pic']['type'] == "image/gif"){

             $tmpFilePath = $_FILES['pic']['tmp_name'];
             if($tmpFilePath != ""){
             $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["pic"]["name"]);
             $shortname2 = $_FILES["pic"]["name"];
             $filePath1 = "indexpic/" .date('d-m-Y-H-i-s').'-'.$shortname1;
             $filePath2 = "indexpic/" .date('d-m-Y-H-i-s').'-'.$shortname2;
             
            // if(move_uploaded_file($tmpFilePath, $filePath)){
             if($mytype == 1){
              move_uploaded_file($tmpFilePath, $filePath1);
               $sql="INSERT INTO picture(paths,types,name) VALUES ('".$filePath2."','".$mytype."','".$shortname2."') ";
               $pdo -> query($sql);
                header("Location: picture.php");
                die();
             }else{
                $sql=" SELECT * FROM  picture WHERE types=".$mytype;
                $rs=$pdo -> query($sql);
                if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
                    $sql1=" SELECT * FROM  picture WHERE types=".$mytype;
                    $rs1=$pdo -> query($sql1);
                    foreach ($rs1 as $key => $row1) {
                     $i =explode("/",$row1["paths"]);
                     if(file_exists('indexpic/'.$i[1])){
                          unlink('indexpic/'.$i[1]);
                      }
                    }
                    $sql2="UPDATE picture SET paths='".$filePath2."',name='".$shortname2."' WHERE types =".$mytype;
                    $pdo -> query($sql2);
                    move_uploaded_file($tmpFilePath, $filePath1);
                    header("Location: picture.php");
                    die();
                }else{
                    move_uploaded_file($tmpFilePath, $filePath1);
                      $sql3="INSERT INTO picture(paths,types,name) VALUES ('".$filePath2."','".$mytype."','".$shortname2."') ";
                    $pdo -> query($sql3);
                    header("Location: picture.php");
                    die();
                }
                
             }
               
           //  }
             }else{
              header("Location: picture.php?msg=1");
              die();
             }
        }else{
        header("Location: picture.php?msg=1");
        die();
    
        }

 }



?>