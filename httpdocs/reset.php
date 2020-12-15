<?php 
session_start();
include_once 'lib/core.php';

$pdo =DB_CONNECT();

$token = addslashes($_GET["token"]);
$email = addslashes($_GET["email"]);

$sql = "SELECT * FROM member WHERE account=:account "; 
$stmt = $pdo ->prepare($sql);
$stmt->execute(array(':account' => $email));

if ($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
 $tok = md5($row["account"].$row["password"].$row["id"]);
 if($token == $tok){
  if(time()-$row["getpasstime"] > 24*60*60){ 
    header('Location: index.php?msg=7');
    //echo time();
  }else{ 
    header('Location: resetpages.php?token='.$token.'&email='.$email);
  } 
 }else{
  header('Location: index.php?msg=8');
  //echo $token."<br>".$tok;
 }
}

?>
