<?php
include_once 'lib/core.php';
$pdo = DB_CONNECT();
@session_start();
$titles = $_POST["titles"];
$texttype = $_POST["texttype"];
$prices = $_POST["price"];
date_default_timezone_set('Asia/Taipei');
ob_start();


$id = $_SESSION["id"];

if(count($_FILES['hres']['name']) > 0 ){
for($i=0; $i<count($_FILES['hres']['name']); $i++) {
    if($_FILES['hres']['type'][$i] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['hres']['type'][$i]  == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || 
      $_FILES['hres']['type'][$i]  == "application/vnd.openxmlformats-officedocument.presentationml.presentation" || $_FILES['hres']['type'][$i]  == "application/pdf" || 
	   $_FILES['all']['type'][$i] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $_FILES['all']['type'][$i]  == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" || 
      $_FILES['all']['type'][$i]  == "application/vnd.openxmlformats-officedocument.presentationml.presentation" || $_FILES['all']['type'][$i]  == "application/pdf" )
	{
	       $tmpFilePath = $_FILES['hres']['tmp_name'][$i];
             $tmpFilePath1 = $_FILES['all']['tmp_name'][$i];
             if($tmpFilePath != "" ){
            $shortname1 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["hres"]["name"][$i]);
             $shortname2 = $_FILES["hres"]["name"][$i];
             $filePath1 = "notes/" .date('d-m-Y-H-i-s').'-'.$shortname1;
             $filePath2 = "notes/" .date('d-m-Y-H-i-s').'-'.$shortname2;
             $shortname3 = iconv('utf-8','big5//TRANSLIT//IGNORE', $_FILES["all"]["name"][$i]);
             $shortname4 = $_FILES["all"]["name"][$i];
             $filePath3 = "notes/" .date('d-m-Y-H-i-s').'-'.$shortname3;
             $filePath4 = "notes/" .date('d-m-Y-H-i-s').'-'.$shortname4;
             if($texttype[$i] == 0){
                $t = 0;
             }else{
                $t = 2;
             }
            // if(move_uploaded_file($tmpFilePath, $filePath)){
              move_uploaded_file($tmpFilePath, $filePath2);
              move_uploaded_file($tmpFilePath1, $filePath4);
              $sql="INSERT INTO  clouds(uid,titles,hre,types,names,names_all,hre_all,prices,checks,addtime) VALUES ('".$id."','".$titles[$i]."','".$filePath2."','".$t."','".$shortname2."','".$shortname4."','".$filePath4."','".$prices[$i]."',0,'".date("Y-m-d H:i:s")."')";
              $pdo -> query($sql);
              $sql="SELECT * FROM resume WHERE uid=".$id;
              $rs = $pdo->query($sql);
              if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
                    $xt = getOther($id);
                    $sql="UPDATE search_teacher SET other='".$xt."' WHERE resumeid=".$row["id"];
                    $pdo -> query($sql);
                }
                $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 5 WHERE uid ='".$id."' ";
                $pdo -> query($sql);
               
           //  } 
           header("Location: clouds.php");
       }
    }else{
		echo $_FILES['hres']['type'][$i];
		 // header("Location: clouds.php?msg=1");
		 // die();
     }
    }
  //  header("Location: clouds.php");
 }
else{
     echo count($_FILES['hres']['name']);
	echo count($prices);
	echo $prices;
	echo $prices . "****";
}
// //if(count($_FILES['hres']['name']) > 0){
//         for($i=0; $i<count($_FILES['hres']['name']); $i++) {
//             $tmpFilePath = $_FILES['hres']['tmp_name'][$i];
//           //  if($tmpFilePath != ""){
//               $shortname = $_FILES['hres']['name'][$i];
//               $filePath = "/notes/" . date('d-m-Y-H-i-s').'-'.$_FILES['hres']['name'][$i];
//            //   if(move_uploaded_file($tmpFilePath, $filePath)){
//                   if($texttype[$i] == 0){
//                     $t = 0;
//                   }else{
//                     $t = 2;
//                   }
//               $file = $filePath; 
//               $sql="INSERT INTO  clouds(uid,titles,hre,types,open) VALUES ('".$id."','".$titles[$i]."','".$filePath."','".$t."','".$open[$i]."')";
//               $pdo -> query($sql);
//             //  }
//             }
//        // }

 //   }

// header("Location: clouds.php");
//     die();
?>
