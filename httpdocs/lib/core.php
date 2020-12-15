<?php
include_once("database.php");
include_once("config.php");
date_default_timezone_set('Asia/Taipei');
// session_start();

//已經擁有的功能，請善用Ctrl+F來尋找以下的功能進行調整
//登入  註冊  取得會員資料 更改會員資料 更改密碼

//取得照片
function getPicture(){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM picture";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute();
  $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // $sql = "SELECT * FROM picture";
  // $rs = $pdo -> query($sql);
  $pic = array();
  foreach ($rs as $key => $row) {
    $pic[$row["types"]] = $row["paths"] ;
  }
  return $pic;
}



//登入
function login($username,$password){
  $pdo = DB_CONNECT();
  @session_start();
  $password = md5($password);
  $sql = "SELECT * FROM member WHERE account = :account AND  password = :password ";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute(array(':account' => $username,':password' => $password) );
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
      $_SESSION["id"] = $rs["id"];
      $_SESSION["login"] = true;
      $_SESSION["account"]  = $rs["account"];
      $_SESSION["type"] = $rs["type"];
      return 1;
    
  }else{
    return 2;
  }
}

// 註冊
function register($username,$password){
  $pdo = DB_CONNECT();
  @session_start();
  // $sql = "SELECT * FROM member WHERE account='".$username."' ";
  $sql = "SELECT * FROM member WHERE account=:account ";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute(array(':account' => $username ));
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC))
  {
     return 2;
  }
  else
  {
	 $passwords = md5($password);
    $sql = "INSERT INTO member(numbers,account,password,type,lastlogin) VALUES (:numbers,:account,:password,:type,:lastlogin)";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute(array(
      ':numbers' => '0',
      ':account' =>$username,
      ':password' =>$passwords,
      ':type' =>1,
      ':lastlogin' =>date("Y-m-d H:i:s")));
    $uid = $pdo ->lastInsertId();
    $dd = date('d');
    $yy=str_pad($uid, 3, "0", STR_PAD_LEFT);
    $xx = substr(uniqid(rand(),true),0,3);
    $numb=$dd.$xx.$yy;
    $sql = "UPDATE member SET numbers=:numbers WHERE id =:uid ";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute(array(':numbers' => $numb ,':uid' =>$uid));
    $sql1 = "INSERT INTO 
                member_list(uid,cid) 
            VALUES 
              ('".$uid."',1),
              ('".$uid."',2),
              ('".$uid."',3),
              ('".$uid."',4),
              ('".$uid."',5),
              ('".$uid."',6),
              ('".$uid."',8)";
    $pdo -> query($sql1); 
    $sql2 = "INSERT INTO 
                member_list(uid,cid,val) 
            VALUES 
              ('".$uid."',7,'".$username."')";
    $pdo -> query($sql2); 
    $sql3 = "INSERT INTO 
                power(uid,cases,resumes,invite,application,updatetime,certification) 
            VALUES 
              ('".$uid."',1,1,1,1,'".date("Y-m-d H:i:s")."',0)";
    $pdo -> query($sql3); 
	  return 1;
  }
}

//取得履歷資料
function getResume($id){
  $pdo = DB_CONNECT();
  @session_start();
  $resume = array();

  $sql = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' ";
  $rs = $pdo -> query($sql);
  foreach ($rs as $key => $row) {
      $resume[0][$row["rid"]] = $row["val"] ;
  }
  $sql1 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=1";
  $rs1 = $pdo -> query($sql1);
  $io = 0;
  foreach ($rs1 as $key => $row1) {
      $resume[1][$io] = $row1["val"] ;
      $io ++ ;
  }
  $sql2 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=2";
  $rs2 = $pdo -> query($sql2);
  $it = 0;
  foreach ($rs2 as $key => $row2) {
      $resume[2][$it] = $row2["val"] ;
      $it ++ ;
  }
  $sql3 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=3";
  $rs3 = $pdo -> query($sql3);
  $ih = 0;
  foreach ($rs3 as $key => $row3) {
      $resume[3][$ih] = $row3["val"] ;
      $ih ++ ;
  }
  $sql4 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=13";
  $rs4 = $pdo -> query($sql4);
  $if = 0;
  foreach ($rs4 as $key => $row4) {
      $resume[13][$if] = $row4["val"] ;
      $if ++ ;
  }
  $sql5 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=15";
  $rs5 = $pdo -> query($sql5);
  $ii = 0;
  foreach ($rs5 as $key => $row5) {
      $resume[15][$ii] = $row5["val"] ;
      $ii ++ ;
  }
  $sql6 = "SELECT r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE m.uid='".$id."' AND r.rid=19";
  $rs6 = $pdo -> query($sql6);
  $is = 0;
  foreach ($rs6 as $key => $row6) {
      $resume[19][$is] = $row6["val"] ;
      $is ++ ;
  }
  return $resume;
}
//取得所有履歷資料
function getResumes(){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id,r.rid,r.val FROM resume_list r LEFT JOIN resume m on m.id=r.reid";
  $rs = $pdo -> query($sql);
  $r = array();
  foreach ($rs as $key => $row) {
    $r[$row["id"]][$row["rid"]] = $row["val"] ;
  }
  return $r;
}
//取得證照證明資料
function getCertification($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM certification WHERE uid = '".$id."'";
  $rs = $pdo -> query($sql);
  $r = array();
  foreach ($rs as $key => $row) {
    $r[$row["uid"]][$row["id"]][$row["types"]][1] = $row["names"] ;
    $r[$row["uid"]][$row["id"]][$row["types"]][2] = $row["paths"] ;
    $r[$row["uid"]][$row["id"]][$row["types"]][3] = $row["types"] ;
    $r[$row["uid"]][$row["id"]][$row["types"]][4] = $row["checks"] ;
    $r[$row["uid"]][$row["id"]][$row["types"]][5] = $row["languages"] ;
    $r[$row["uid"]][$row["id"]][$row["types"]][6] = $row["levels"] ;
  }
  return $r;
}
//取得履歷科目
function gettsub($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 1 ";
  $rs = $pdo -> query($sql);
  $sub = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $sub[$id][$i] = $row["val"];
     $i++;
  }
  return $sub;
}
//取得履歷地點
function gettloc($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 2 ";
  $rs = $pdo -> query($sql);
  $loc = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $loc[$id][$i] = $row["val"];
     $i++;
  }
  return $loc;
}
//取得履歷對象價錢
function gettobj($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 3 ";
  $rs = $pdo -> query($sql);
  $obj = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $obj[$id][$i] = $row["val"];
     $i++;
  }
  return $obj;
}
//取得履歷留學時間
function gettabr($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 13 ";
  $rs = $pdo -> query($sql);
  $abr = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $abr[$id][$i] = $row["val"];
     $i++;
  }
  return $abr;
}
//取得履歷證照
function gettlic($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 19 ";
  $rs = $pdo -> query($sql);
  $lic = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $lic[$id][$i] = $row["val"];
     $i++;
  }
  return $lic;
}
function gettlic15($id){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id as mid,r.rid as rid,r.val as val , r.id as reid FROM resume_list r LEFT JOIN resume m on m.id=r.reid WHERE reid = '".$id."' AND rid = 15 ";
  $rs = $pdo -> query($sql);
  $lic = array();
  $i= 0 ;
  foreach ($rs as $key => $row) {
     $lic[$id][$i] = $row["val"];
     $i++;
  }
  return $lic;
}
//取得會員資料
function getProfile($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.cid,l.val,m.id FROM member_list l LEFT JOIN member m on m.id=l.uid WHERE m.id=".$id;
  $account = array();
  $rs = $pdo -> query($sql);
  foreach ($rs as $key => $row) {
      $account[$row["cid"]] = $row["val"] ;
  }
  return $account;
}
function getProfiles(){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT m.id,l.cid,l.val,m.id FROM member_list l LEFT JOIN member m on m.id=l.uid ";
  $a = array();
  $rs = $pdo -> query($sql);
  foreach ($rs as $key => $row) {
      $a[$row["id"]][$row["cid"]] = $row["val"] ;
  }
  return $a;
}
//取得案件資料
function getCases($uid){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.caid,l.val,c.id,c.uid FROM case_list l LEFT JOIN cases c on c.id=l.cid WHERE c.uid=".$uid;
  $cases = array();
  $rs = $pdo -> query($sql);
  $c = 0; 
  $s = 0;
  $x = 0;
  foreach ($rs as $key => $row) {
    if($row["caid"] == 1 ){
       $cases[$row["id"]][1][$s] = $row["val"] ;
       $s ++ ;
    }else if($row["caid"] == 4){
       $cases[$row["id"]][4][$c] = $row["val"] ;
       $c ++ ;
    }else if($row["caid"] == 9){
       $cases[$row["id"]][9][$x] = $row["val"] ;
       $x ++ ;
    }else{
       $cases[$row["id"]][$row["caid"]] = $row["val"] ;
    }
  }
  return $cases;
}
//取得所有案件
function getCase(){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.caid,l.val,c.id,c.uid FROM case_list l LEFT JOIN cases c on c.id=l.cid ";
  $rs = $pdo -> query($sql);
  $c = array();
  foreach ($rs as $key => $row) {
    $c[$row["id"]][$row["caid"]] = $row["val"] ;
  }
  return $c;
}
//取得學生資料
function getStudent($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.caid,l.val,c.id,c.uid FROM case_list l LEFT JOIN cases c on c.id=l.cid WHERE c.id='".$id."' AND caid = 1";
  $student = array();
  $rs = $pdo -> query($sql);
  $i=0;
  foreach ($rs as $key => $row) {
     $student[$id][$i] = $row["val"];
     $i++;
  }
  return $student ; 
}
//取得科目資料
function getCourse($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.caid,l.val,c.id,c.uid FROM case_list l LEFT JOIN cases c on c.id=l.cid WHERE c.id='".$id."' AND caid = 4";
  $course = array();
  $rs = $pdo -> query($sql);
  $i=0;
  foreach ($rs as $key => $row) {
     $course[$id][$i] = $row["val"];
     $i++;
  }
  return $course ; 
}
//取得時間資料
function getTime($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT l.caid,l.val,c.id,c.uid FROM case_list l LEFT JOIN cases c on c.id=l.cid WHERE c.id='".$id."' AND caid = 9";
  $time = array();
  $rs = $pdo -> query($sql);
  $i=0;
  foreach ($rs as $key => $row) {
     $time[$id][$i] = $row["val"];
     $i++;
  }
  return $time ; 
}
//更新會員資料
function updateMember($id,$username,$birthday,$myZip,$phone,$gender,$numb){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "UPDATE member_list SET val=:username WHERE cid=1 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':username' => $username,':id' => $id) );
  $sql = "UPDATE member_list SET val=:birthday WHERE cid=3 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':birthday' => $birthday,':id' => $id) );
  $sql = "UPDATE member_list SET val=:myZip WHERE cid=4 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':myZip' => $myZip,':id' => $id) );
  $sql = "UPDATE member_list SET val=:phone WHERE cid=6 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':phone' => $phone,':id' => $id) );
  $sql = "UPDATE member_list SET val=:numb WHERE cid=8 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':numb' => $numb,':id' => $id) );
  // $sql1="UPDATE member_list SET val='".$username."' WHERE cid=1 AND uid ='".$id."' ";
  // $sql3="UPDATE member_list SET val='".$birthday."' WHERE cid=3 AND uid ='".$id."' ";
  // $sql4="UPDATE member_list SET val='".$myZip."' WHERE cid=4 AND uid ='".$id."' ";
  // $sql6="UPDATE member_list SET val='".$phone."' WHERE cid=6 AND uid ='".$id."' ";
  // $sql7="UPDATE member_list SET val='".$numb."' WHERE cid=8 AND uid ='".$id."' ";
  if($gender == '1'){
    $gend = "女";
  }else{
    $gend = "男";
  }
  $sql = "UPDATE member_list SET val=:gend WHERE cid=2 AND uid =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':gend' => $gend,':id' => $id) );
  // $sql2="UPDATE member_list SET val='".$gend."' WHERE cid=2 AND uid ='".$id."' ";
  // $pdo -> query($sql1);
  // $pdo -> query($sql2);
  // $pdo -> query($sql3);
  // $pdo -> query($sql4);
  // $pdo -> query($sql6);
  // $pdo -> query($sql7);
  return 1;

}

//更改密碼
function updatePassword($id,$password,$password1){
  $pdo = DB_CONNECT();
  @session_start();
  // $password = md5($password);
  $sql = "SELECT * FROM member WHERE id =:id ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':id' => $id ) );
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
    if($password1 != $rs["password"]){
      return 2;
    }else if($password  == $rs["password"]){
      return 3;
    }else{
	  $sql = "UPDATE member SET password=:password WHERE  id =:id ";
	  $stmt = $pdo ->prepare($sql);
	  $rs = $stmt->execute(array(':password' => $password,':id' => $id) );
	  // $sql="UPDATE member SET password='".$password."' WHERE id ='".$id."' ";
	  // $pdo -> query($sql);
	  return 1;
	}
  }
 
}

//新增履歷
function addresume($reid,$mySubject,$myLession,$myCity,$myTown,$myObject,$myPrice,$year,$experience,$way,$will,$education,$situation,$school,$start,$end,$myCountry,$myTime,$identity,$myLanguages,$myLevel,$other,$department){
  $pdo = DB_CONNECT();
  @session_start();
  $id= $_SESSION["id"];
  $myLe ="";
  $myPr ="";
  $mySu ="";
  $myAr ="";
  $myOb ="";
  $wi = "";
  $myp =array();
  // $sql = "SELECT * FROM member WHERE id=".$id;
  // $rs = $pdo->query($sql);
  // foreach ($rs as $key => $row) {
  //   $num = $row["numbers"];
  // }
  // $sql = "INSERT INTO resume(numbers,uid,addtime,lastedit,views,deal,status) VALUES ('".$num."','".$id."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."',0,0,0)";
  //   $pdo -> query($sql);
  //   $reid = $pdo ->lastInsertId();
  for ($i=0; $i < count($mySubject) ; $i++) { 
     $sql = "SELECT * FROM subjects WHERE id=".$mySubject[$i];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myS = $row["val"];
     }
     $sql = "SELECT * FROM lessions WHERE id=".$myLession[$i];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myL = $row["val"];
     }  
     if($mySu == ""){ $mySu = $myLession[$i];
     }else{$mySu = $mySu.",".$myLession[$i];}
     $one = $myS.",".$myL;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',1,'".$one."')";
     $pdo -> query($sql);
  }
  for ($r=0; $r < count($myCity) ; $r++) { 
     $sql = "SELECT * FROM city WHERE id=".$myCity[$r];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myC = $row["cityvalue"];
     }
     $sql = "SELECT * FROM area WHERE id=".$myTown[$r];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myT = $row["value"];
     }  
     if($myAr == ""){ $myAr = $myTown[$r];
     }else{$myAr = $myAr.",".$myTown[$r];}
     $two = $myC.",".$myT;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',2,'".$two."')";
     $pdo -> query($sql);
  }
  for ($g=0; $g < count($myObject) ; $g++) { 
     switch ($myObject[$g]) {
                    case 1:
                      $val = "學齡前兒童";
                      break;
                    case 2:
                      $val = "國小生";
                      break;
                    case 3:
                      $val = "國中生";
                      break;
                    case 4:
                      $val = "高中生";
                      break;
                    case 5:
                      $val = "大學生";
                      break;
                    case 6:
                      $val = "社會人士";
                      break;
                    default:
                      break;
      }
      switch ($myPrice[$g]) {
                    case 1:
                      $valS = "NT200以下";
                      break;
                    case 2:
                      $valS = "NT201~NT500";
                      break;
                    case 3:
                      $valS = "NT501~NT800";
                      break;
                    case 4:
                      $valS = "NT801~NT1000";
                      break;
                    case 5:
                      $valS = "NT1001以上";
                      break;
                    default:
                      break;
                  }
     $te = $val.",".$valS;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',3,'".$te."')";
     $pdo -> query($sql);
     if($myOb == ""){ $myOb =$myObject[$g];
    }else{$myOb = $myOb.",".$myObject[$g];}

    // if( 201 > $myPrice[$g] && $myPrice[$g] > 0 ){$myp[$g] = 1;}
    // if( 501 > $myPrice[$g] && $myPrice[$g] > 200 ){$myp[$g] = 2;}
    // if( 801 > $myPrice[$g] && $myPrice[$g] > 500 ){$myp[$g] = 3;}
    // if( 1001 > $myPrice[$g] && $myPrice[$g] > 800 ){$myp[$g] = 4;}
    // if( $myPrice[$g] > 1000 ){$myp[$g] = 5;}

     if($myPr == ""){ $myPr = $myPrice[$g];
    }else{$myPr = $myPr.",".$myPrice[$g];}

  }
 
  for ($h=0; $h < count($myCountry) ; $h++) { 
     $sql = "SELECT * FROM country WHERE id=".$myCountry[$h];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myCo = $row["val"];
     }
     switch ($myTime[$h]) {
                    case 1:
                      $myTi = "兩年以內";
                      break;
                    case 2:
                      $myTi = "二~四年";
                      break;
                    case 3:
                      $myTi = "四年以上";
                      break;
			        case 4:
                      $myTi = "無";
                      break;
                    default:
                      break;
      }
     // $sql = "SELECT * FROM timees WHERE id=".$myTime[$h];
     // $rs = $pdo->query($sql);
     // foreach ($rs as $key => $row) {
     //   $myTi = $row["val"];
     // }  

     $three = $myCo.",".$myTi;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',13,'".$three."')";
     $pdo -> query($sql);
  }
  // for ($k=0; $k < count($myLanguages) ; $k++) { 
  //    $sql = "SELECT * FROM languages WHERE id=".$myLanguages[$k];
  //    $rs = $pdo->query($sql);
  //    foreach ($rs as $key => $row) {
  //      $myLs = $row["val"];
  //    }
  //    $sql = "SELECT * FROM level WHERE id=".$myLevel[$k];
  //    $rs = $pdo->query($sql);
  //    foreach ($rs as $key => $row) {
  //      $myLes = $row["val"];
  //    }  
  //    $four = $myLs.",".$myLes;
  //    $sql="INSERT INTO  resume_list(reid ,rid,val) VALUES ('".$reid."',15,'".$four."')";
  //    $pdo -> query($sql);
  // }
  if($school != -1){
   $sql1 = " SELECT * FROM schools WHERE id='".$school."' ";
    $rs1 = $pdo->query($sql1);
    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
      $sql="INSERT INTO resume_list(reid,rid,val) VALUES ('".$reid."',10,'".$row1["name"]."'),('".$reid."',18,'".$row1["num"]."')";
      $pdo -> query($sql);
      
    }
  }
   
  $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',5,'".$experience."'),('".$reid."',11,'".$start."'),('".$reid."',12,'".$end."'),('".$reid."',16,'".$other."'),('".$reid."',17,'".$department."')";
  $pdo -> query($sql);

  
  switch ($year) {
    case 1:
      $yearval = "無經驗";
      break;
    case 2:
      $yearval = "一年以下";
      break;
    case 3:
      $yearval = "一~三年";
      break;
    case 4:
      $yearval = "三~五年";
      break;
    case 5:
      $yearval = "五年以上";
      break;
    default:
      break;
  }
  switch ($way) {
    case 1:
      $wayval = "面對面上課";
      break;
    case 2:
      $wayval = "視訊上課";
      break;
    case 3:
      $wayval = "函授";
      break;
    default:
      break;
  }
  switch ($will) {
    case 1:
      $willval = "願意";
      $wi = 1;
      break;
    case 2:
      $willval = "不願意";
      
      break; 
    default:
      break;
  }
  switch ($education) {
    case 1:
      $eduval = "高中(職)以下";
      break;
    case 2:
      $eduval = "高中(職)";
      break;
    case 3:
      $eduval = "專科";
      break;
    case 4:
      $eduval = "大學學院";
      break;
    case 5:
      $eduval = "碩士";
      break;
    case 6:
      $eduval = "博士";
      break;
    default:
      break;
  }
  switch ($situation) {
    case 1:
      $sitval = "畢業";
      break;
    case 2:
      $sitval = "肄業";
      break; 
    case 3:
      $sitval = "在學中";
      break;
    default:
      break;
  }
  switch ($identity) {
    case 1:
      $ideval = "無工作";
      break;
    case 2:
      $ideval = "上班族";
      break; 
    case 3:
      $ideval = "在校生";
      break;
    case 4:
      $ideval = "教師";
      break;
    case 5:
      $ideval = "補習班老師/專職家教";
      break;
    default:
      break;
  }
  
  $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',4,'".$yearval."'),('".$reid."',6,'".$wayval."'),('".$reid."',7,'".$willval."'),('".$reid."',8,'".$eduval."'),('".$reid."',9,'".$sitval."'),('".$reid."',14,'".$ideval."')";
  $pdo -> query($sql);
  $xt = getOther($id);
  $sql="INSERT INTO  
  search_teacher(resumeid,obj,sub,area,exper,sala,other) 
  VALUES 
  ('".$reid."','".$myOb."','".$mySu."','".$myAr."','".$year."','".$myPr."','".$xt."')";
  $pdo -> query($sql);
  return 1 ;
}
//更新會員活動
function getOther($id){
  $pdo = DB_CONNECT();
  @session_start();
  $id= $_SESSION["id"];
  $sql="SELECT * FROM resume WHERE uid=".$id;
  $rs = $pdo->query($sql);
  $xt = "";
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    $sql1="SELECT * FROM resume_list WHERE rid=7 AND reid=".$row["id"];
    $rs1 = $pdo->query($sql1);
    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
     if($row1["val"] == "願意"){
       if($xt == ""){
        $xt = "1";
       }else{
        $xt .=",1";
      }
     }
    }
  }
  $sql2 = "SELECT * FROM clouds WHERE types = 0 AND uid=".$id;
  $rs2 = $pdo->query($sql2);
  if ($row2 = $rs2 -> fetch(PDO::FETCH_BOTH)){
    if($xt == ""){
        $xt = "2";
       }else{
        $xt .=",2";
      } 
  }
  $sql3 = "SELECT * FROM clouds WHERE types = 2 AND uid=".$id;
  $rs3 = $pdo->query($sql3);
  if ($row3 = $rs3 -> fetch(PDO::FETCH_BOTH)){
    if($xt == ""){
        $xt = "3";
       }else{
        $xt .=",3";
      } 
  }
  $sql4 = "SELECT * FROM clouds WHERE types = 1 AND uid=".$id;
  $rs4 = $pdo->query($sql4);
  if ($row4 = $rs4 -> fetch(PDO::FETCH_BOTH)){
    if($xt == ""){
        $xt = "4";
       }else{
        $xt .=",4";
      } 
  }
  return $xt;
}
//更新履歷
function editresume($reid,$mySubject,$myLession,$myCity,$myTown,$myObject,$myPrice,$year,$experience,$way,$will,$education,$situation,$school,$start,$end,$myCountry,$myTime,$identity,$other,$department){
  $pdo = DB_CONNECT();
  @session_start();
  $id= $_SESSION["id"];
  $myLe ="";
  $myPr ="";
  $mySu ="";
  $myAr ="";
  $myOb ="";
  $wi = "";
  $myp =array();

  $sql="DELETE FROM  resume_list WHERE rid=1 AND reid =".$reid;
  $pdo -> query($sql);
  $sql="DELETE FROM  resume_list WHERE rid=2 AND reid =".$reid;
  $pdo -> query($sql);
  $sql="DELETE FROM  resume_list WHERE rid=3 AND reid =".$reid;
  $pdo -> query($sql);
  $sql="DELETE FROM  resume_list WHERE rid=13 AND reid =".$reid;
  $pdo -> query($sql);
 
  for ($i=0; $i < count($mySubject) ; $i++) { 
     $sql = "SELECT * FROM subjects WHERE id=".$mySubject[$i];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myS = $row["val"];
     }
     $sql = "SELECT * FROM lessions WHERE id=".$myLession[$i];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myL = $row["val"];
     }  
     if($mySu == ""){ $mySu = $myLession[$i];
     }else{$mySu = $mySu.",".$myLession[$i];}
     $one = $myS.",".$myL;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',1,'".$one."')";
     $pdo -> query($sql);
  }
  for ($r=0; $r < count($myCity) ; $r++) { 
     $sql = "SELECT * FROM city WHERE id=".$myCity[$r];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myC = $row["cityvalue"];
     }
     $sql = "SELECT * FROM area WHERE id=".$myTown[$r];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myT = $row["value"];
     }  
     if($myAr == ""){ $myAr =$myTown[$r];
     }else{$myAr = $myAr.",".$myTown[$r];}
     $two = $myC.",".$myT;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',2,'".$two."')";
     $pdo -> query($sql);
  }
  for ($g=0; $g < count($myObject) ; $g++) { 
     switch ($myObject[$g]) {
                    case 1:
                      $val = "學齡前兒童";
                      break;
                    case 2:
                      $val = "國小生";
                      break;
                    case 3:
                      $val = "國中生";
                      break;
                    case 4:
                      $val = "高中生";
                      break;
                    case 5:
                      $val = "大學生";
                      break;
                    case 6:
                      $val = "社會人士";
                      break;
                    default:
                      break;
                  }
       switch ($myPrice[$g]) {
                    case 1:
                      $valS = "NT200以下";
                      break;
                    case 2:
                      $valS = "NT201~NT500";
                      break;
                    case 3:
                      $valS = "NT501~NT800";
                      break;
                    case 4:
                      $valS = "NT801~NT1000";
                      break;
                    case 5:
                      $valS = "NT1001以上";
                      break;
                    default:
                      break;
                  }
     $te = $val.",".$valS;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',3,'".$te."')";
     $pdo -> query($sql);
     if($myOb == ""){ $myOb = $myObject[$g];
    }else{$myOb = $myOb.",".$myObject[$g];}

    // if( 201 > $myPrice[$g] && $myPrice[$g] > 0 ){$myp[$g] = 1;}
    // if( 501 > $myPrice[$g] && $myPrice[$g] > 200 ){$myp[$g] = 2;}
    // if( 801 > $myPrice[$g] && $myPrice[$g] > 500 ){$myp[$g] = 3;}
    // if( 1001 > $myPrice[$g] && $myPrice[$g] > 800 ){$myp[$g] = 4;}
    // if( $myPrice[$g] > 1000 ){$myp[$g] = 5;}

     if($myPr == ""){ $myPr = $myPrice[$g];
    }else{$myPr = $myPr.",".$myPrice[$g];}

  }
 
  for ($h=0; $h < count($myCountry) ; $h++) { 
     $sql = "SELECT * FROM country WHERE id=".$myCountry[$h];
     $rs = $pdo->query($sql);
     foreach ($rs as $key => $row) {
       $myCo = $row["val"];
     }
     // $sql = "SELECT * FROM timees WHERE id=".$myTime[$h];
     // $rs = $pdo->query($sql);
     // foreach ($rs as $key => $row) {
     //   $myTi = $row["val"];
     // }  
     switch ($myTime[$h]) {
                    case 1:
                      $myTi = "兩年以內";
                      break;
                    case 2:
                      $myTi = "二~四年";
                      break;
                    case 3:
                      $myTi = "四年以上";
                      break;
			        case 4:
                      $myTi = "無";
                      break;
                    default:
                      break;
      }
     $three = $myCo.",".$myTi;
     $sql="INSERT INTO  resume_list(reid,rid,val) VALUES ('".$reid."',13,'".$three."')";
     $pdo -> query($sql);
  }
 
  $sql="UPDATE resume_list SET val='".$experience."' WHERE reid ='".$reid."' AND rid=5 ";
  $pdo -> query($sql);

  // $sql="UPDATE resume_list SET val='".$school."' WHERE reid ='".$reid."' AND rid=10 ";
  // $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$start."' WHERE reid ='".$reid."' AND rid=11 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$end."' WHERE reid ='".$reid."' AND rid=12 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$other."' WHERE reid ='".$reid."' AND rid=16 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$department."' WHERE reid ='".$reid."' AND rid=17 ";
  $pdo -> query($sql);

  if($school != -1){
   $sql1 = " SELECT * FROM schools WHERE id='".$school."' ";
    $rs1 = $pdo->query($sql1);
    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
      $sql="UPDATE resume_list SET val='".$row1["num"]."' WHERE reid ='".$reid."' AND rid=18 ";
      $pdo -> query($sql);
      $sql="UPDATE resume_list SET val='".$row1["name"]."' WHERE reid ='".$reid."' AND rid=10 ";
      $pdo -> query($sql);
    }
  }
  
  switch ($year) {
    case 1:
      $yearval = "無經驗";
      break;
    case 2:
      $yearval = "一年以下";
      break;
    case 3:
      $yearval = "一~三年";
      break;
    case 4:
      $yearval = "三~五年";
      break;
    case 5:
      $yearval = "五年以上";
      break;
    default:
      break;
  }
  switch ($way) {
    case 1:
      $wayval = "面對面上課";
      break;
    case 2:
      $wayval = "視訊上課";
      break;
    case 3:
      $wayval = "函授";
      break;
    default:
      break;
  }
  switch ($will) {
    case 1:
      $willval = "願意";
      $wi = 1;
      break;
    case 2:
      $willval = "不願意";
      break; 
    default:
      break;
  }
  switch ($education) {
    case 1:
      $eduval = "高中(職)以下";
      break;
    case 2:
      $eduval = "高中(職)";
      break;
    case 3:
      $eduval = "專科";
      break;
    case 4:
      $eduval = "大學學院";
      break;
    case 5:
      $eduval = "碩士";
      break;
    case 6:
      $eduval = "博士";
      break;
    default:
      break;
  }
  switch ($situation) {
    case 1:
      $sitval = "畢業";
      break;
    case 2:
      $sitval = "肄業";
      break; 
    case 3:
      $sitval = "在學中";
      break;
    default:
      break;
  }
  switch ($identity) {
    case 1:
      $ideval = "無工作";
      break;
    case 2:
      $ideval = "上班族";
      break; 
    case 3:
      $ideval = "在校生";
      break;
    case 4:
      $ideval = "教師";
      break;
    case 5:
      $ideval = "補習班老師/專職家教";
      break;
    default:
      break;
  }
  
  $sql="UPDATE resume_list SET val='".$yearval."' WHERE reid ='".$reid."' AND rid=4 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$wayval."' WHERE reid ='".$reid."' AND rid=6 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$willval."' WHERE reid ='".$reid."' AND rid=7 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$eduval."' WHERE reid ='".$reid."' AND rid=8 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$sitval."' WHERE reid ='".$reid."' AND rid=9 ";
  $pdo -> query($sql);
  $sql="UPDATE resume_list SET val='".$ideval."' WHERE reid ='".$reid."' AND rid=14 ";
  $pdo -> query($sql);

  
    $sql1 = " SELECT * FROM school s LEFT JOIN resume_list r on s.val LIKE r.val WHERE r.val LIKE '%".$school."%' ";
    $rs1 = $pdo->query($sql1);
    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
      $sql2="UPDATE resume_list SET val='".$row1["num"]."' WHERE reid ='".$reid."' AND rid=18 ";
      $pdo -> query($sql2);
    }else{
      $sql2="UPDATE resume_list SET val='17' WHERE reid ='".$reid."' AND rid=18 ";
      $pdo -> query($sql2);
    }
  
  $sql="UPDATE resume SET lastedit='".date("Y-m-d H:i:s")."' WHERE uid ='".$id."' ";
  $pdo -> query($sql);

  $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 1 WHERE uid ='".$id."' ";
  $pdo -> query($sql);

  $xt = getOther($id);
  $sql="UPDATE search_teacher SET  obj='".$myOb."',sub='".$mySu."',area='".$myAr."',exper='".$year."',sala='".$myPr."',other='".$xt."' WHERE resumeid=".$reid;
  $pdo -> query($sql);
  return 1 ;
}

//新增案件
function addcase($myName,$myGender,$myIdentity,$mySchool,$extent,$goal,$mySubject,$myLession,$way,$person,$connectionName,$connectionPhone,$myCity,$myTown,$location,$load,$rang,$myWeek,$myStartTime,$myEndTime,$time,$datetext,$experience,$identity,$schooltext,$departmenttext,$low,$high,$other){
  $pdo = DB_CONNECT();
  @session_start();
  $id= $_SESSION["id"];
  // $y=date("Y");
  // $m=date("m");
  // $yy=substr($y,strlen($y)-1,1);
  // $n = sprintf($d.$m.$yy."%04d",$id);
  $xx = substr(uniqid(rand(),true),0,3);
  $yy = date("d");
  $sql = "INSERT INTO cases(numbers,uid,name,phone,addtime,lastedit,applicants,views,status,apply) VALUES ('".$yy."','".$id."','".$connectionName."','".$connectionPhone."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."',0,0,0,0)";
  $pdo -> query($sql);
  $cid = $pdo ->lastInsertId();
  $zz=str_pad($cid, 4, "0", STR_PAD_LEFT);
  $n = $xx.$yy.$zz;
  $sql="UPDATE cases SET numbers='".$n."' WHERE id ='".$cid."'";
  $pdo -> query($sql);

  for ($i=0; $i < count($myWeek) ; $i++) { 
      switch ($myWeek[$i]){
        case 1:
        $weeks = "週一";
        break;
        case 2:
        $weeks = "週二";
        break;
        case 3:
        $weeks = "週三";
        break;
        case 4:
        $weeks = "週四";
        break;
        case 5:
        $weeks = "週五";
        break;
        case 6:
        $weeks = "週六";
        break;
        case 7:
        $weeks = "週七";
        break;
        default:
        break;
     }
     $week = $weeks.",".$myStartTime[$i].",".$myEndTime[$i];
     $sql="INSERT INTO  case_list(cid,caid,val) VALUES ('".$cid."',9,'".$week."')";
     $pdo -> query($sql);
  }
  switch ($goal) {
    case 1:
      $goals = "升學考試";
      break;
    case 2:
      $goals = "課業輔導";
      break;
    case 3:
      $goals = "個人進修";
      break;
    case 4:
      $goals = "興趣培養";
      break;
    default:
      break;
  }
  switch ($myIdentity) {
        case 1:
        $myIdentitys = "學齡前兒童";
        $idx = 1;
        break;
        case 2:
        $myIdentitys = "國小一年級";
        $idx = 2;
        break;
        case 3:
        $myIdentitys = "國小二年級";
        $idx = 2;
        break;
        case 4:
        $myIdentitys = "國小三年級";
        $idx = 2;
        break;
        case 5:
        $myIdentitys = "國小四年級";
        $idx = 2;
        break;
        case 6:
        $myIdentitys = "國小五年級";
        $idx = 2;
        break;
        case 7:
        $myIdentitys = "國小六年級";
        $idx = 2;
        break;
        case 8:
        $myIdentitys = "國中一年級";
        $idx = 3;
        break;
        case 9:
        $myIdentitys = "國中二年級";
        $idx = 3;
        break;
        case 10:
        $myIdentitys = "國中三年級";
        $idx = 3;
        break;
        case 11:
        $myIdentitys = "高中一年級";
        $idx = 4;
        break;
        case 12:
        $myIdentitys = "高中二年級";
        $idx = 4;
        break;
        case 13:
        $myIdentitys = "高中三年級";
        $idx = 4;
        break;
        case 14:
        $myIdentitys = "大專生";
        $idx = 5;
        break;
        case 15:
        $myIdentitys = "社會人士";
        $idx = 6;
        break;
        default:
        break;
     }
  switch ($myGender) {
    case 1:
      $myGenders = "女";
      break;
    case 2:
      $myGenders = "男";
      break;
    default:
      break;
  }
  switch ($way) {
    case 1:
      $ways = "面對面上課";
      break;
    case 2:
      $ways = "視訊上課";
      break;
      case 3:
      $ways = "函授";
      break;
    default:
      break;
  }
  switch ($location) {
    case 1:
      $locations = "家裡上課";
      break;
    case 2:
      $locations = "外面上課";
      break;
    case 3:
      $locations = "老師家上課";
      break;
    default:
      break;
  }
  switch ($rang) {
    case 1:
      $rangs = "上短期(2個月以內)";
      break;
    case 2:
      $rangs = "希望上長期";
      break;
    default:
      break;
  }
  switch ($experience) {
    case 1:
      $experiences = "無經驗";
      break;
    case 2:
      $experiences = "一年以下";
      break;
    case 3:
      $experiences = "一~三年";
      break;
    case 4:
      $experiences = "三~五年";
      break;
    case 5:
      $experiences = "五年以上";
      break;
    default:
      break;
  }
  switch ($identity) {
    case 1:
      $identitys = "不拘";
      break;
    case 2:
      $identitys = "上班族";
      break; 
    case 3:
      $identitys = "在校生";
      break;
    case 4:
      $identitys = "教師";
      break;
    case 5:
      $identitys = "補習班老師/專職家教";
      break;
    default:
      break;
  }
  switch ($time) {
    case 1:
      $times = "立即";
      break;
    case 2:
      $times = $datetext;
      break;
    default:
      break;
  }
  
  if( 201 > $low && $low > 0 ){$lows = 1;}
  if( 501 > $low && $low > 200 ){$lows = 2;}
  if( 801 > $low && $low > 500 ){$lows = 3;}
  if( 1001 > $low && $low > 800 ){$lows = 4;}
  if( $low > 1000 ){$lows = 5;}

  $sql = "SELECT * FROM subjects WHERE id=".$mySubject;
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
    $mySubjects =$row["val"];
  }
  $sql = "SELECT * FROM lessions WHERE id=".$myLession;
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
    $myLessions =$row["val"];
  }
  $sql = "SELECT * FROM city WHERE id=".$myCity;
   $rs = $pdo->query($sql);
   foreach ($rs as $key => $row) {
    $myCitys =$row["cityvalue"];
  }
  $sql = "SELECT * FROM area WHERE id=".$myTown;
   $rs = $pdo->query($sql);
   foreach ($rs as $key => $row) {
    $myTowns =$row["value"];
  }
  $Subject =$mySubjects.$myLessions;
  $City = $myCitys.$myTowns;
  $mywe="";
  for ($g=0; $g < count($myWeek) ; $g++) { 
    if($mywe == ""){ 
      $mywe = $myWeek[$g];
    }else{
      $mywe = $mywe.",".$myWeek[$g];
    }
  }
  if($schooltext != -1){
    $sql1 = " SELECT * FROM schools WHERE id='".$schooltext."' ";
    $rs1 = $pdo->query($sql1);
    if ($row1 = $rs1 -> fetch(PDO::FETCH_BOTH)){
      $sql2="INSERT INTO  case_list(cid,caid,val) VALUES ('".$cid."',13,'".$row1["name"]."')";
      $pdo -> query($sql2);
    }
  }else{
    $sql2="INSERT INTO  case_list(cid,caid,val) VALUES ('".$cid."',13,'不拘')";
    $pdo -> query($sql2);
  }
  
  $sql="INSERT INTO  case_list(cid,caid,val) VALUES
   ('".$cid."',1,'".$myName."'),
   ('".$cid."',2,'".$extent."'),
   ('".$cid."',3,'".$goals."'),
   ('".$cid."',4,'".$Subject."'), 
   ('".$cid."',5,'".$ways."'),
   ('".$cid."',6,'".$person."'),
   ('".$cid."',7,'".$locations."'),
   ('".$cid."',8,'".$rangs."'),
   ('".$cid."',10,'".$times."'),
   ('".$cid."',11,'".$experiences."'),
   ('".$cid."',12,'".$identitys."'),
   ('".$cid."',14,'".$departmenttext."'),
   ('".$cid."',15,'".$low."'),
   ('".$cid."',16,'".$high."'),
   ('".$cid."',17,'".$other."'),
   ('".$cid."',18,'".$load."'),
   ('".$cid."',19,'".$City."'),
   ('".$cid."',20,'".$myIdentitys."'),
   ('".$cid."',21,'".$myGenders."'),
   ('".$cid."',22,'".$mySchool."')";
   $pdo -> query($sql);

  $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 2 WHERE uid ='".$id."' ";
  $pdo -> query($sql);
  $sql="INSERT INTO  
  search_case(caseid,obj,sub,area,exper,sala,timess) 
  VALUES 
  ('".$cid."','".$idx."','".$myLession."','".$myTown."','".$experience."','".$lows."','".$mywe."')";
  $pdo -> query($sql);
  return 1 ;
 }

//加入我的最愛案件
function addfavoritecase($id,$uid,$types){
   $pdo = DB_CONNECT();
   @session_start();
  $sql = "SELECT * FROM favorite WHERE uid='".$uid."' AND tid = '".$id."' AND types ='".$types."' ";
  $rs = $pdo -> query($sql);
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
      return 0 ;
  }else{
   $sql = "INSERT INTO favorite(tid,uid,types) VALUES ('".$id."','".$uid."','".$types."')";
   $pdo -> query($sql);
   return 1 ;
  }

}
//移除我的最愛案件
function removefavoritecase($fid)
{
   $pdo = DB_CONNECT();
   @session_start();
   $sql = "DELETE FROM favorite WHERE id='".$fid."' ";
   $pdo -> query($sql);
   return 1 ;
}
//新增案件面試
function caseinterview($reid,$rid,$cid,$caid)
{
  $pdo = DB_CONNECT();
  @session_start();
  $userid = $_SESSION["id"];
  $sql = "SELECT * FROM interview WHERE uid='".$userid."' AND cid = '".$cid."' AND rid = '".$rid."' AND reid = '".$reid."' AND caid = '".$caid."'  AND source = 0";
  $rs = $pdo -> query($sql);
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){

  }else{
  $sql1= "INSERT INTO interview(uid,reid,rid,caid,cid,source,status,type,edittime,addtime) VALUES ('".$userid."','".$reid."','".$rid."','".$caid."','".$cid."',0,0,0,0,'".date("Y-m-d H:i:s")."' )";
  $pdo->query($sql1);

  $sql2 = "SELECT * FROM cases WHERE id = '".$cid."' ";
  $rs1 = $pdo->query($sql2);
  foreach ($rs1 as $key => $row1) {
    $x = $row1["applicants"];
    $x++;
    $sql3 = "UPDATE cases SET applicants='".$x."' WHERE id = '".$cid."' ";
    $pdo->query($sql3);
    }
    $sql1 = "SELECT * FROM power WHERE uid = ".$userid;
    $rs2 = $pdo ->query($sql1);
    foreach ($rs2 as $key => $row2) {
       $xyz = $row2["invitenum"];
    }
    $xyz++;
    $sql3 = "UPDATE power SET invitenum =".$xyz." WHERE uid=".$userid;
    $pdo ->query($sql3);

    $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 3 WHERE uid ='".$userid."' ";
    $pdo -> query($sql);
    }
}
//新增老師面試
function teacherinterview($reid,$rid,$cid,$caid)
{
  $pdo = DB_CONNECT();
  @session_start();
  $userid = $_SESSION["id"];
  $sql = "SELECT * FROM interview WHERE uid='".$userid."' AND cid='".$cid."' AND rid='".$rid."' AND reid='".$reid."' AND caid='".$caid."' AND source = 1";
  $rs = $pdo -> query($sql);
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
   return 0;
  }else{
  $sql1= "INSERT INTO interview(uid,reid,rid,caid,cid,source,status,type,edittime,addtime) VALUES ('".$userid."','".$reid."','".$rid."','".$caid."','".$cid."',1,0,0,0,'".date("Y-m-d H:i:s")."')";
  $pdo->query($sql1);
  $sql1 = "SELECT * FROM cases WHERE id = ".$cid;
  $rs1 = $pdo ->query($sql1);
  foreach ($rs1 as $key => $row1) {
     $x = $row1["applicants"];
  }
  $x++;
  $sql3 = "UPDATE cases SET applicants ='".$x."' WHERE id=".$cid;
  $pdo ->query($sql3);

  $sql1 = "SELECT * FROM power WHERE uid = ".$id;
  $rs1 = $pdo ->query($sql1);
  foreach ($rs1 as $key => $row1) {
     $x = $row1["applicnum"];
  }
  $x++;
  $sql3 = "UPDATE power SET applicnum ='".$x."' WHERE uid=".$id;
  $pdo ->query($sql3);

  $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 4 WHERE uid ='".$id."' ";
  $pdo -> query($sql);
  return 1;
  }
}
//修改案件面試管理狀態
function changestatus($id,$status){
  $pdo =DB_CONNECT();
  $sql="UPDATE interview SET edittime='".date("Y-m-d H:i:s")."' ,status = '".$status."'  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  return 1 ;
}
//案主修改面試記錄
function changetype($id,$status){
  $pdo =DB_CONNECT();
  $sql="UPDATE interview SET typeedit='".date("Y-m-d H:i:s")."' ,type = '".$status."'  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  return 1 ;
}
//修改案件管理狀態
function casestatus($id,$status){
  $pdo =DB_CONNECT();
  $sql="UPDATE cases SET status = '".$status."'  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  return 1 ;
}
//報價
function addprice($uid,$id,$salary){
  $pdo =DB_CONNECT();  
  $sql="UPDATE interview SET typeedit='".date("Y-m-d H:i:s")."',salary='".$salary."',type = 1  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  return 1;
}
//新增案件成交回報
function addcasedeal($uid,$id,$salary){
  $pdo =DB_CONNECT();  
  $sql="UPDATE interview SET typeedit='".date("Y-m-d H:i:s")."' ,type = 1  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  $sql1="INSERT INTO casedeal(uid,inid,salary) VALUES ('".$uid."','".$id."','".$salary."')";
  $pdo -> query($sql1);
  return 1;
  // $sql2="SELECT * FROM  interview WHERE id=".$id;
  // $rs = $pdo->query($sql2);
  // foreach ($rs as $key => $row) {
  //   $sql3="SELECT * FROM  resume WHERE id=".$row["rid"];
  //   $rs1 = $pdo->query($sql3);
  //   foreach ($rs1 as $key => $row1) {
  //       $x = $row1["deal"];
  //       $x++;
  //       $sql4 = "UPDATE resume SET deal ='".$x."' WHERE id=".$row["rid"];
  //       $pdo->query($sql4);
  //   }
  // }
}
//回報成交回報
function changeaccept($id,$status){
 $pdo =DB_CONNECT();
  $sql="UPDATE interview SET accepttime='".date("Y-m-d H:i:s")."' ,accept = '".$status."'  WHERE id ='".$id."' ";
  // $sql="UPDATE casedeal SET edittime='".date("Y-m-d H:i:s")."' ,accept = '".$status."'  WHERE id ='".$id."' ";
  $pdo -> query($sql);
  if($status == 1){
      $sql2="SELECT * FROM  interview WHERE id=".$id;
      $rs = $pdo->query($sql2);
      foreach ($rs as $key => $row) {
        $sql3="SELECT * FROM  resume WHERE id=".$row["rid"];
        $rs1 = $pdo->query($sql3);
        foreach ($rs1 as $key => $row1) {
            $x = $row1["deal"];
            $x++;
            $sql4 = "UPDATE resume SET deal ='".$x."' WHERE id=".$row["rid"];
            $pdo->query($sql4);
        }
      }
  }
 
  return 1 ;
}
//刪除筆記/教材
function deleteclouds($id){
   $pdo = DB_CONNECT();
   @session_start();
   $uid= $_SESSION["id"];
   $sql="SELECT * FROM  clouds WHERE id=".$id;
   $rs = $pdo->query($sql);
   foreach ($rs as $key => $row) {
    $i =explode("/",$row["hre"]);
    $i1 =explode("/",$row["hre_all"]);
    
    if(file_exists('notes/'.$i[1])){
    //  unlink(iconv('utf-8','big5//TRANSLIT//IGNORE', 'notes/'.$i[1]));
    //  unlink(iconv('utf-8','big5//TRANSLIT//IGNORE', 'notes/'.$i1[1]));
           unlink('notes/'.$i[1]);
           unlink('notes/'.$i1[1]);
      }
      $sql1= "DELETE FROM  clouds WHERE id ='".$id."' ";
      $pdo ->query($sql1);    
     //  }else{
     //   $sql1= "DELETE FROM  clouds WHERE id ='".$id."' ";
     //   $pdo ->query($sql1);
     // }
   }
    $sql="SELECT * FROM resume WHERE uid=".$uid;
    $rs = $pdo->query($sql);
    if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
     $xt = getOther($uid);
     $sql="UPDATE search_teacher SET other='".$xt."' WHERE resumeid=".$row["id"];
     $pdo -> query($sql);
    }
    return 1;
}
//修改教材&筆記
// function editclouds($titles,$texttype,$ids){
// $pdo = DB_CONNECT();
// @session_start();
// $id= $_SESSION["id"];
// $sql = "SELECT * FROM clouds WHERE uid ='".$id."' AND types <> 3";
// $pdo ->query($sql);
// foreach ($rs as $key => $row) {
//   for ($i=0; $i < count($ids); $i++) { 
//     if($ids[$i] == $row["id"]){
//     $sql="UPDATE  clouds SET titles='".$titles[$i]."',types='".$texttype[$i]."' WHERE  id=".$row["id"];
//     $pdo -> query($sql);
//     }
//   $sql="INSERT INTO  clouds(uid,titles,hre,types,open) VALUES ('".$id."','".$titles[$i]."','".$hres[$i]."',0,'".$open[$i]."')";
//   $pdo -> query($sql);
//   }
// }

// return 1 ;
// }
//新增youtube影片
function addvideos($vititle,$vihres){
$pdo = DB_CONNECT();
@session_start();
$id= $_SESSION["id"];
for ($i=0; $i < count($vititle); $i++) { 
  $sql="INSERT INTO  clouds(uid,titles,hre,types,names,names_all,hre_all,prices,checks,addtime) VALUES ('".$id."','".$vititle[$i]."','".$vihres[$i]."',1,0,0,0,0,0,'".date("Y-m-d H:i:s")."')";
  $pdo -> query($sql);
}
$sql="SELECT * FROM resume WHERE uid=".$id;
$rs = $pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
  $xt = getOther($id);
  $sql="UPDATE search_teacher SET other='".$xt."' WHERE resumeid=".$row["id"];
  $pdo -> query($sql);
}
$sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 5 WHERE uid ='".$id."' ";
$pdo -> query($sql);
return 1 ;
}
//修改youtube影片
function deletevideos($id){
$pdo = DB_CONNECT();
@session_start();
$uid= $_SESSION["id"];
$sql = "DELETE FROM clouds WHERE id ='".$id."' ";
$pdo ->query($sql);
$sql="SELECT * FROM resume WHERE uid=".$uid;
$rs = $pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
  $xt = getOther($uid);
  $sql="UPDATE search_teacher SET other='".$xt."' WHERE resumeid=".$row["id"];
  $pdo -> query($sql);
}
return 1 ;
}
//新增評價
function addcomment($uid,$inid,$val,$num){
$pdo = DB_CONNECT();
@session_start();
$sql="INSERT INTO  comments(uid,inid,val,edittime,num) VALUES ('".$uid."','".$inid."','".$val."','".date("Y-m-d H:i:s")."','".$num."')";
$pdo -> query($sql);
$sql="UPDATE interview SET comment=1 WHERE id =".$inid;
$pdo -> query($sql);
$sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 7 WHERE uid ='".$uid."' ";
$pdo -> query($sql);
return 1 ;
}


//新增意見反應
function addreaction($myIdentity,$myReaction,$myname,$myphone,$myemail,$texts){
   $pdo = DB_CONNECT();
   @session_start();
   switch ($myIdentity) {
     case 1:
       $myid = "老師";
       break;
     case 2:
       $myid = "家長";
       break;
     default:
       break;
   }
   switch ($myReaction) {
       case 1:
       $myre = "費用相關";
       break;
       case 2:
       $myre = "成交回報";
       break;
       case 3:
       $myre = "功能操作問題";
       break;
       case 4:
       $myre = "案件刊登";
       break;
       case 5:
       $myre = "履歷刊登";
       break;
       case 6:
       $myre = "接案權益";
       break;
       case 7:
       $myre = "訂閱問題";
       break;
       case 8:
       $myre = "下載檔案問題";
       break;
       case 9:
       $myre = "其他";
       break;
     default:
       break;
   }
   $sql = "INSERT INTO reaction(name,phone,email,addtime,texts,isread,reactions,identity) VALUES(:myname,:myphone,:myemail,'".date("Y-m-d H:i:s")."',:texts,0,:myre,:myid)";
   $stmt = $pdo ->prepare($sql);
   $rs = $stmt->execute(array(
    ':myname' => $myname,
    ':myphone' => $myphone,
    ':myemail' => $myemail,
    ':texts' => $texts,
    ':myre' => $myre,
    ':myid' => $myid  ) );

   // $sql="INSERT INTO reaction(name,phone,email,addtime,texts,isread,reactions,identity) VALUES('".$myname."','".$myphone."','".$myemail."','".date("Y-m-d H:i:s")."','".$texts."',0,'".$myre."','".$myid."')";
   // $pdo->query($sql);
   return 1 ;
}

//fb登入
function fblogin($fbid,$fbname,$fbemail,$fbgender){
      $pdo = DB_CONNECT();
      @session_start();
      //Check whether user data already exists in database
      $prevQuery = "SELECT * FROM member WHERE account='".$fbemail."' AND type != 2";
      $prevResult =$pdo->query($prevQuery);
      if($row = $prevResult -> fetch(PDO::FETCH_BOTH)){
	  	 header("Location:index.php?msg=10");
		  die();
	  }else{
		 $prevQuery1 = "SELECT * FROM member WHERE  getid = '".$fbid."' ";
      $prevResult1 =$pdo->query($prevQuery1);
      if($row1 = $prevResult1 -> fetch(PDO::FETCH_BOTH)){
	   $query = "UPDATE member SET lastlogin='".date("Y-m-d H:i:s")."'  WHERE getid = '".$fbid."' ";
        $update = $pdo->query($query);
        $_SESSION["id"]=$row1["id"];
        $_SESSION["account"]=$fbemail;
        $_SESSION["login"] = true;
        $_SESSION["type"] = $row1["type"];
	  }else{
        //Insert user data
        $sql = "INSERT INTO member(numbers,account,password,type,lastlogin,getid) VALUES ('".$fbid."','".$fbemail."','0qjsdpfb0',2,'".date("Y-m-d H:i:s")."','".$fbid."') ";
        $rs = $pdo->query($sql);
        $uid = $pdo ->lastInsertId();
        $yy=str_pad($uid, 3, "0", STR_PAD_LEFT);
        $xx = substr(uniqid(rand(),true),0,4);
        $dd = date('d');
        $nn =$dd.$xx.$yy;
        $sql="UPDATE member SET numbers='".$nn."' WHERE id ='".$uid."'";
        $pdo -> query($sql);
        $sql1 = "INSERT INTO 
                      member_list(uid,cid) 
                  VALUES 
                    ('".$uid."',3),
                    ('".$uid."',4),
                    ('".$uid."',5),
                    ('".$uid."',6),
                    ('".$uid."',8)";

        $pdo -> query($sql1); 
        if($fbgender == 'female'){$gen = "女";}else{$gen="男";}
        $sql2 = "INSERT INTO 
                      member_list(uid,cid,val) 
                  VALUES 
                    ('".$uid."',1,'".$fbname."'),
                    ('".$uid."',2,'".$gen."'),
                    ('".$uid."',7,'".$fbemail."') ";
        $pdo -> query($sql2); 
        $_SESSION["id"]=$uid;
        $_SESSION["account"]=$fbemail;
        $_SESSION["login"] = true;
        $sql4 = "INSERT INTO 
                power(uid,cases,resumes,invite,application,certification) 
            VALUES 
              ('".$uid."',1,1,1,1,0)";
        $pdo -> query($sql4); 
        $sql3 = "SELECT * FROM member WHERE id=".$uid;
        $rs1 = $pdo->query($sql3);
        foreach ($rs1 as $key => $row1) {
          $_SESSION["type"]=$row1["type"];
        }

      }
     }
      return 1 ;
}
//更改會員權限
function powerstatus($id,$certi,$cases,$resumes,$invite,$application){
   $pdo = DB_CONNECT();
   @session_start();
   $sql1="UPDATE power SET cases='".$cases."' , resumes='".$resumes."' , invite='".$invite."' , application='".$application."'  WHERE uid=".$id;
   $pdo->query($sql1);
   return 1 ;
}

//更改文章
function editpage($id,$data){
  $pdo = DB_CONNECT();
   @session_start();
   switch ($id) {
     case 1:
       $myfile = fopen("page/about.html", "w");
       fwrite($myfile, $data);
       fclose($myfile);
       break;
     case 2:
       $myfile = fopen("page/privacy.html", "w");
       fwrite($myfile, $data);
       fclose($myfile);
       break;
     case 3:
        $myfile = fopen("page/teacher.html", "w");
      fwrite($myfile, $data);
      fclose($myfile);
       break;
     case 4:
        $myfile = fopen("page/cases.html", "w");
      fwrite($myfile, $data);
      fclose($myfile);
       break;
      case 5:
        $myfile = fopen("page/qa.html", "w");
      fwrite($myfile, $data);
      fclose($myfile);
       break;
      case 6:
        $myfile = fopen("page/regi.html", "w");
      fwrite($myfile, $data);
      fclose($myfile);
       break; 
      case 7:
        $myfile = fopen("page/aboutus.html", "w");
      fwrite($myfile, $data);
      fclose($myfile);
       break;    
     default:
       break;
   }
   // $sql="UPDATE page SET val='".$data."' WHERE id=".$id;
   // $pdo->query($sql);
   return  1;
}
//更改首頁圖片
function deletepicture($id){

   $pdo = DB_CONNECT();
   @session_start();
    $sql ="SELECT * FROM picture WHERE id=".$id;
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
        $i =explode("/",$row["paths"]);
         if(file_exists('indexpic/'.$i[1])){
              unlink('indexpic/'.$i[1]);
          }else{
             
          }
    }
   $sql = "DELETE FROM picture WHERE id =".$id;
   $pdo ->query($sql);
   return 1 ;
}
//刪除檔案
function deletefile($id)
 {
   $pdo = DB_CONNECT();
   @session_start();
    $sql ="SELECT * FROM downfiles WHERE id=".$id;
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
        $i =explode("/",$row["paths"]);
        if(file_exists('downfiles/'.$i[1])){
              unlink('downfiles/'.$i[1]);
        }
        $u =explode("/",$row["imgs"]);
        if(file_exists('downfiles/'.$u[1])){
              unlink('downfiles/'.$u[1]);
        }
    }
   $sql = "DELETE FROM downfiles WHERE id =".$id;
   $pdo ->query($sql);
   return 1 ;
}
//修改下載檔案資料
function editfiledes($myid,$mytitle,$myobj,$content){
  $pdo = DB_CONNECT();
  @session_start();
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
  $sql ="UPDATE downfiles SET title='".$mytitle."',objects='".$myo."',content='".$content."' WHERE id=".$myid;
  $pdo ->query($sql);
  return 1;
}

//新增訂閱
function addnews($account,$password,$type){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM newsletter WHERE email = :email ";
  $stmt = $pdo ->prepare($sql);
  $rs = $stmt->execute(array(':email' => $account ) );
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
    $sql2 = "SELECT * FROM newsletter WHERE email = :email ";
    $stmt2 = $pdo ->prepare($sql2);
    $stmt2->execute(array(':email' => $account ) );
    $rs2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rs2 as $key => $row2) {
      if($row2["password"] == $password){
        if($type == 1){
          $sql3 = "UPDATE newsletter SET casespa=1 WHERE email = :email ";
          $stmt3 = $pdo ->prepare($sql3);
          $stmt3->execute(array(':email' => $account ) );
        }else if($type == 2){
          $sql3 = "UPDATE newsletter SET teachpa=1 WHERE email = :email ";
          $stmt3 = $pdo ->prepare($sql3);
          $stmt3->execute(array(':email' => $account ) );
        }else{
          $sql3 = "UPDATE newsletter SET webpa=1 WHERE email = :email ";
          $stmt3 = $pdo ->prepare($sql3);
          $stmt3->execute(array(':email' => $account ) );
        } 
     }else{
      return 0;
     }
    }
  }else{
      if($type == 1){
        $sql1 = "INSERT INTO newsletter(email,casespa,teachpa,webpa,password) VALUES (:account,:casespa,:teachpa,:webpa,:password) ";
        $stmt1 = $pdo ->prepare($sql1);
        $stmt1->execute(array(
          ':account' => $account,
          ':casespa' => 1,
          ':teachpa' => 0,
          ':webpa' => 0,
          ':password' => $password ) );
      }else if($type == 2){
        $sql1 = "INSERT INTO newsletter(email,casespa,teachpa,webpa,password) VALUES (:account,:casespa,:teachpa,:webpa,:password) ";
        $stmt1 = $pdo ->prepare($sql1);
        $stmt1->execute(array(
          ':account' => $account,
          ':casespa' => 0,
          ':teachpa' => 1,
          ':webpa' => 0,
          ':password' => $password ) );
      }else{
        $sql1 = "INSERT INTO newsletter(email,casespa,teachpa,webpa,password) VALUES (:account,:casespa,:teachpa,:webpa,:password) ";
        $stmt1 = $pdo ->prepare($sql1);
        $stmt1->execute(array(
          ':account' => $account,
          ':casespa' => 0,
          ':teachpa' => 0,
          ':webpa' => 1,
          ':password' => $password ) );
      } 
  }
  return 1;
}
//刪除訂閱
function deletenews_a($account,$password){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM newsletter WHERE email = :email AND  password = :password ";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute(array(':email' => $account,':password' => $password) );
  if ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $sql1 = "DELETE FROM newsletter WHERE email = :email AND  password = :password ";
    $stmt1 = $pdo ->prepare($sql1);
    $stmt1->execute(array(':email' => $account,':password' => $password) );
    return 1; 
  }else{
    return 0;
  }
   
}


//email
function multi_attach_mail($to, $subject, $message, $senderMail, $senderName, $files){

    $from = $senderName." <".$senderMail.">"; 
    $headers = "From: $from";
    // boundary 
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    // headers for attachment 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    // multipart boundary 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
    // preparing attachments
  if(count($files) > 0){
    for($i=0;$i<count($files);$i++){
      if(is_file($files[$i])){
        $message .= "--{$mime_boundary}\n";
        $fp =    @fopen($files[$i],"rb");
        $data =  @fread($fp,filesize($files[$i]));
        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name=\"".basename($files[$i])."\"\n" . 
        "Content-Description: ".basename($files[$i])."\n" .
        "Content-Disposition: attachment;\n" . " filename=\"".basename($files[$i])."\"; size=".filesize($files[$i]).";\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
      }
    }
  }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $senderMail;
  //send email
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 
  //function return true, if email sent, otherwise return fasle
    if($mail){ return TRUE; } else { return FALSE; }
}
//管理人刪除案件
function deletecases($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="DELETE FROM cases  WHERE id=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM case_list  WHERE cid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM search_case  WHERE caseid=".$id;
  $pdo->query($sql);
  return 1 ;
}
//管理人修改訂閱
function editnews_man($id,$cases,$teacher,$web){
   $pdo = DB_CONNECT();
   @session_start();
   $sql1="UPDATE newsletter SET casespa='".$cases."',teachpa='".$teacher."',webpa='".$web."'  WHERE id=".$id;
   $pdo->query($sql1);
   return 1 ;
}
//刪除訂閱人
function deletenews($id){
  $pdo = DB_CONNECT();
   @session_start();
   $sql1="DELETE FROM newsletter WHERE id=".$id;
   $pdo->query($sql1);
   return 1 ;
}
//購買筆記
function addnote($uid,$cid,$cuid){
   $pdo = DB_CONNECT();
   @session_start();
   $id = $_SESSION["id"];
   $sql="SELECT *  FROM notes WHERE uid='".$uid."' AND cid='".$cid."' AND cuid ='".$cuid."'  ";
   $rs =  $pdo->query($sql);
   if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    return 0;
   }else{
    $sql="INSERT INTO  notes(uid,cid,cuid,addtime,status)  VALUES ('".$uid."','".$cid."','".$cuid."','".date("Y-m-d H:i:s")."',0)  ";
    $pdo->query($sql);
    $sql="UPDATE power SET updatetime='".date("Y-m-d H:i:s")."' , lasttype = 6 WHERE uid ='".$id."' ";
    $pdo -> query($sql);
    return 1 ;
   }  
}
//修改購買筆記
function editnote($id,$status){
   $pdo = DB_CONNECT();
   @session_start();
   $sql="UPDATE notes SET status = '".$status."' WHERE id=".$id;
   $rs =  $pdo->query($sql);
   return 1 ;
}
//刪除購買筆記
function deletenote($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="DELETE FROM notes  WHERE id=".$id;
  $pdo->query($sql);
  return 1 ;
}
//刪除使用者
function deleteuser($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="SELECT * FROM  clouds WHERE uid=".$id;
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
   $i =explode("/",$row["hre"]);
   $i1 =explode("/",$row["hre_all"]);
   if(file_exists('notes/'.$i[1])){
       unlink('notes/'.$i[1]);
       unlink('notes/'.$i1[1]);
   }
  }
  $sql="DELETE FROM clouds  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM comments  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM favorite  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM interview  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="SELECT * FROM  member_list  WHERE cid=5 AND uid =".$id;
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    if($row["val"] != ""){
      $out = explode("/", $row["val"]);
      if($out[1]!="123.jpg"){
        if(file_exists('profile/'.$out[1])){
         unlink('profile/'.$out[1]);
        }
      }
    }
  }
  $sql="DELETE FROM member_list  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="SELECT * FROM  certification  WHERE uid =".$id;
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    if($row["paths"] != "0"){
      $out = explode("/", $row["paths"]);
       if(file_exists('certification/'.$out[1])){
       unlink('certification/'.$out[1]);
       }
    }
  }
  $sql="DELETE FROM certification WHERE uid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM notes  WHERE uid='".$id."' OR cuid=".$id;
  $pdo->query($sql);
  $sql="DELETE FROM power  WHERE uid=".$id;
  $pdo->query($sql);
  $sql="SELECT * FROM  cases  WHERE uid =".$id;
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    $x = $row["id"];
    $sql="DELETE FROM case_list  WHERE cid=".$x;
    $pdo->query($sql);
    $sql="DELETE FROM search_case  WHERE caseid=".$x;
    $pdo->query($sql);
    $sql="DELETE FROM favorite  WHERE tid='".$x."' AND types = 1";
    $pdo->query($sql);
  }
  $sql="DELETE FROM cases  WHERE uid=".$id;
  $pdo->query($sql);
  
  $sql="SELECT * FROM  resume  WHERE uid =".$id;
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    $reid = $row["id"];
    $sql1="SELECT * FROM  resume_list  WHERE rid=19 AND reid=".$reid;
    $rs1 = $pdo->query($sql1);
    foreach ($rs1 as $key => $row1) {
       $out = explode(",", $row1["val"]);
       if($out[2] != "0"){
        $out1 = explode("/", $out[2]);
        if(file_exists('certification/'.$out1[1])){
        unlink('certification/'.$out1[1]);
        }
      }
    }
    $sql="DELETE FROM resume_list  WHERE reid=".$reid;
    $pdo->query($sql);
    $sql="DELETE FROM search_teacher  WHERE resumeid=".$reid;
    $pdo->query($sql);
    $sql="DELETE FROM favorite  WHERE tid='".$reid."' AND types = 2";
    $pdo->query($sql);
  }
  $sql="DELETE FROM resume  WHERE uid=".$id;
    $pdo->query($sql);
  $sql="SELECT * FROM  interview  WHERE uid ='".$id."' OR caid = '".$id."' OR reid= '".$id."'";
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    $sql="DELETE FROM comments  WHERE inid=".$row["id"];
    $pdo->query($sql);
  }
  $sql="SELECT * FROM  interview  WHERE uid ='".$id."' OR caid = '".$id."' OR reid= '".$id."' ";
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    $sql="DELETE FROM comments  WHERE inid=".$row["id"];
    $pdo->query($sql);
  }
  $sql="DELETE FROM interview WHERE uid ='".$id."' OR caid = '".$id."' OR reid= '".$id."' ";
  $pdo->query($sql);
  $sql="DELETE FROM member  WHERE id=".$id;
  $pdo->query($sql);
  return 1;
}
//新增問題
function addquestion($title){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT count(*) as n FROM question WHERE parid=0 ";
  $rs = $pdo ->query($sql);
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    $xxx = $row["n"];
  }
  $xxx++;
  $sql="INSERT INTO  question(val,title,parid,sort)  VALUES ('0','".$title."',0,'".$xxx."')  ";
  $pdo->query($sql);
  return 1;
}
//編輯問題的母標題
function editquespar($id,$title,$sort){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="SELECT * FROM question WHERE id=".$id;
  $rs = $pdo->query($sql);
  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    $old = $row["sort"];
  }
  if($old > $sort){
    $sql="SELECT * FROM question WHERE parid=0 AND sort >= '".$sort."' AND sort <= '".$old."' ";
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
      $old_so = $row["sort"];
      $old_so++;
      $sql1="UPDATE question SET sort = '".$old_so."' WHERE id=".$row["id"];
      $pdo->query($sql1);
    }
  }else{
    $sql="SELECT * FROM question WHERE parid=0 AND sort >= '".$old."' AND sort <= '".$sort."' ";
    $rs = $pdo->query($sql);
    foreach ($rs as $key => $row) {
      $old_so = $row["sort"];
      $old_so--;
      $sql1="UPDATE question SET sort = '".$old_so."' WHERE id=".$row["id"];
      $pdo->query($sql1);
    }
  }
  $sql1="UPDATE question SET title='".$title."',sort = '".$sort."' WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
//新增問題的子標題及檔案
function addqueschi($id,$title,$content){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="INSERT INTO  question(val,title,parid)  VALUES ('".$id."','".$title."','".$id."')  ";
  $pdo->query($sql);
  $id = $pdo ->lastInsertId();
  $x = $id.".html";
  $sql1="UPDATE question SET val='".$x."' WHERE id=".$id;
  $pdo->query($sql1);
  $myfile = fopen("question/".$x ,"w");
  fwrite($myfile, $content);
  fclose($myfile);
  return 1;
}
//修改子分類標題/內容
function editchipage($id,$content,$title){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="UPDATE question SET title='".$title."' WHERE id=".$id;
  $pdo->query($sql);
  $x = $id.".html";
  $myfile = fopen("question/".$x ,"w");
  fwrite($myfile, $content);
  fclose($myfile);
  return 1;
}
//刪除常見問題
function deletequestion($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM question WHERE parid =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    if(file_exists('question/'.$row["val"])){
     unlink('question/'.$row["val"]);
    }
  }
  $sql1="DELETE FROM question WHERE parid=".$id;
  $pdo->query($sql1);
  $sql1="DELETE FROM question WHERE id=".$id;
  $pdo->query($sql1);
  return 1 ;
}
//刪除子常見問題
function deletechiquestion($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM question WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    if(file_exists('question/'.$row["val"])){
     unlink('question/'.$row["val"]);
    }
  }
  $sql1="DELETE FROM question WHERE id=".$id;
  $pdo->query($sql1);
  return 1 ;
}
//新增訂閱文章
function addsur($title,$content,$mytype){
  $pdo = DB_CONNECT();
  @session_start();
  $sql="INSERT INTO  news(val,title,types,issend,sendtime)  VALUES ('".$title."','".$title."','".$mytype."',0,0)  ";
  $pdo->query($sql);
  $id = $pdo ->lastInsertId();
  $x = $id.".html";
  $sql1="UPDATE news SET val='".$x."' WHERE id=".$id;
  $pdo->query($sql1);
  $myfile = fopen("news/".$x ,"w");
  fwrite($myfile, $content);
  fclose($myfile);
  return 1;
}
//修改訂閱文章
function editsub($id,$title,$mytype,$content){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="UPDATE news SET title='".$title."',types='".$mytype."' WHERE id=".$id;
  $pdo->query($sql1);
  $x = $id.".html";
  $myfile = fopen("news/".$x ,"w");
  fwrite($myfile, $content);
  fclose($myfile);
  return 1;
}
//刪除訂閱文章
function deletesub($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM news WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    if(file_exists('news/'.$row["val"])){
     unlink('news/'.$row["val"]);
    }
  }
  $sql1="DELETE FROM news WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}

//更新訂閱文章狀態
function updateSend($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="UPDATE news SET issend=1 ,sendtime='".date("Y-m-d H:i:s")."' WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}

//刪除面試記錄
function deleteinter($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="DELETE FROM casedeal WHERE inid=".$id;
  $pdo->query($sql1);
  $sql1="DELETE FROM interview WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}

//更新面試記錄
function editinter($id,$status){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="UPDATE interview SET edittime='".date("Y-m-d H:i:s")."' , status = '".$status."' WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
//管理員刪除成交紀錄
function deletedeal($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="DELETE FROM interview WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
//編輯文章
function editparent($id,$title,$descript,$content,$contitle,$types){
   $pdo = DB_CONNECT();
  @session_start();
  $sql1="UPDATE parents SET title='".$title."' , description = '".$descript."' , val = '".$content."',contitle='".$contitle."',types ='".$types."' WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}

//刪除文章
function deleteparent($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM parents WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    $out = explode("/", $row["paths"]);
    if(file_exists('article/'.$out[1])){
     unlink('article/'.$out[1]);
    }
  }
  $sql1="DELETE FROM parents WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
//忘記密碼確認使用者
function checkmemb($username){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM member WHERE account = :account ";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute(array(':account' => $username));
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
  // $sql = "SELECT * FROM member WHERE account ='".$username."' ";
  // $rs = $pdo ->query($sql);
//  if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    return $rs["type"];
  }else{
    return 4;
  }
}
//忘記密碼寄信
function sendpassword($username){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM member WHERE account = :account ";
  $stmt = $pdo ->prepare($sql);
  $stmt->execute(array(':account' => $username));
  if($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
  // $sql = "SELECT * FROM member WHERE account ='".$username."' ";
  // $rs = $pdo ->query($sql);
  // if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
    $getpasstime = time();
    $email =$rs["account"];
    $password = $rs["password"];
    $id = $rs["id"];
  }
  $token = md5($email.$password.$id);
  $url = "http://www.24hteacher.com/reset.php?email=".$username."&token=".$token;
  $time = date('Y-m-d H:i'); 
  $result = sendpassmail($time,$email,$url); 
  if($result==1){
      $sql = "UPDATE member SET getpasstime=:getpasstime WHERE id = :id ";
      $stmt = $pdo ->prepare($sql);
      $stmt->execute(array(
        ':getpasstime' => $getpasstime,
        ':id' => $id ));
      // $sql= "UPDATE member SET getpasstime='".$getpasstime."' WHERE id=".$id; 
      // $pdo->query($sql); 
      return 1;
    }else{ 
      return 0;
    } 

}
//寄送忘記密碼的郵件
function sendpassmail($time,$email,$url){
  include("mailer/PHPMailerAutoload.php"); //匯入PHPMailer類別  
  require 'mailer/class.phpmailer.php'; 
  $pdo =DB_CONNECT();
  $sql = "SELECT * FROM mailer WHERE id=1";
  $rs = $pdo->query($sql);
  foreach ($rs as $key => $row) {
    $a1 = $row["mailac"];
    $a2 = $row["mailpa"];
  }
  try
        {
	  			$mail= new PHPMailer(); //建立新物件   
				$mail->IsSMTP(); //設定使用SMTP方式寄信   
				$mail->CharSet = "UTF-8";
				$mail->SMTPAuth = true; //設定SMTP需要驗證   
				$mail->SMTPDebug = 2;
				$mail->SMTPSecure = "tls"; 
				$mail->Host = "mail.24hteacher.com"; //設定SMTP主機   
				$mail->Port = 25; //設定SMTP埠位，預設為25埠  
				$mail->Username = "tutor@24hteacher.com"; //設定驗證帳號   
				$mail->Password = "Uiuirigteacher"; //設定驗證密碼   
				//$mail->From = 'n982406005@gmail.com' ; //設定寄件者信箱   
				$mail->Subject = "24hteacher - 找回密碼"; //設定郵件標題   
				$mail->Body = "親愛的".$email."：<br/>您在".$time."提交了找回密碼請求。請在24小時內點擊下面的連結重設密碼。<br/><a href='".$url."' target='_blank'>".$url."</a>"; 
				$mail->IsHTML(true); //設定郵件內容為HTML   
				$mail->setFrom("tutor@24hteacher.com","系統發送請勿回覆");
				$mail->AddAddress($email , $email); //設定收件者郵件及名稱   
				$mail->Send();
	         return 1;
        } catch(phpmailerException $e) {
            echo "exception 1 : ".$e->errorMessage();
            return 0;
        } catch(Exception $e) {
            echo "exception 2".$e->errorMessage();
            return 0;
        }
        
}
//重設密碼
function resetPassword($email,$password){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "UPDATE member SET password=:password WHERE account=:account ";
  $stmt = $pdo ->prepare($sql);
	$passw = md5($password);
  $rs = $stmt->execute(array(
    ':password' => $passw,':account' => $email) );
  // $sql= "UPDATE member SET password='".$password."' WHERE account='".$email."' "; 
  //  $pdo->query($sql); 
  return 1;
}

//管理員審核筆記
function editnote_man($id,$checks){
  $pdo = DB_CONNECT();
  @session_start();
  $sql= "UPDATE clouds SET checks='".$checks."' WHERE id='".$id."' "; 
  $pdo->query($sql); 
  return 1;
}

//管理員審核畢業證書
function editmancer($id,$checks){
   $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM certification WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    $sql1= "UPDATE power SET certification='".$checks."' WHERE uid='".$row["uid"]."' "; 
    $pdo->query($sql1);
  }
  $sql= "UPDATE certification SET checks='".$checks."' WHERE id='".$id."' "; 
   $pdo->query($sql); 
  return 1;
}

//管理員刪除畢業證書
function deletemancer($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM certification WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    $out = explode("/", $row["paths"]);
    if(file_exists('certification/'.$out[1])){
       //unlink(iconv('utf-8','big5//TRANSLIT//IGNORE', 'certification/'.$out[1]));
		 unlink('certification/'.$out[1]);
    }
  }
  $sql1="DELETE FROM certification WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}

//管理員審核證書
function editmancard($id,$checks){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM resume_list WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    $u = explode(",", $row["val"]);
    $text = $u[0].",".$u[1].",".$u[2].",1";
  }
  $sql= "UPDATE resume_list SET val='".$text."' WHERE id='".$id."' "; 
  $pdo->query($sql); 
  return 1;
}
//管理員刪除證照
function deletecard($id){
  $pdo = DB_CONNECT();
  @session_start();
  $sql = "SELECT * FROM resume_list WHERE id =".$id;
  $rs = $pdo ->query($sql);
  foreach ($rs as $key => $row) {
    $out = explode(",", $row["val"]);
    if($out[2] != "0"){
      $o = explode("/", $out[2]);
      if(file_exists('certification/'.$o[1])){
      // unlink(iconv('utf-8','big5//TRANSLIT//IGNORE', 'certification/'.$o[1]));
		  unlink('certification/'.$o[1]);
      }
    }
  }
  $sql1="DELETE FROM resume_list WHERE id=".$out[0];
  $pdo->query($sql1);
  $sql1="DELETE FROM resume_list WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
//審核教學影片
function editmanvideo($id,$checks){
  $pdo = DB_CONNECT();
  @session_start();
  $sql= "UPDATE clouds SET checks='".$checks."' WHERE id='".$id."' "; 
   $pdo->query($sql); 
  return 1;
}
//更改付費
function editpay($id,$status){
  $pdo = DB_CONNECT();
  @session_start();
  $sql1="UPDATE interview SET paytime='".date("Y-m-d H:i:s")."' , pay = '".$status."' WHERE id=".$id;
  $pdo->query($sql1);
  return 1;
}
?>


