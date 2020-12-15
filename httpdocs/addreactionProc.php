<?php

$myIdentity = addslashes($_POST["myIdentity"]);
$myReaction = addslashes($_POST["myReaction"]);
$texts = addslashes($_POST["texts"]);
$myname = addslashes($_POST["myname"]);
$myphone = addslashes($_POST["myphone"]);
$myemail = addslashes($_POST["myemail"]);
ob_start();
include_once 'lib/core.php';
$result = new stdClass();

$i = addreaction($myIdentity,$myReaction,$myname,$myphone,$myemail,$texts);


// if($i == 1 ){
//     header("Location: clouds.php");
//     die();
// }
mb_internal_encoding('UTF-8');
include("mailer/PHPMailerAutoload.php"); //匯入PHPMailer類別  
require 'mailer/class.phpmailer.php'; 
$pdo =DB_CONNECT();
$sql = "SELECT * FROM mailer WHERE id=1";
$rs = $pdo->query($sql);
foreach ($rs as $key => $row) {
	$a1 = $row["mailac"];
	$a2 = $row["mailpa"];
}
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
$subject = iconv('utf-8','big5//TRANSLIT//IGNORE', "Tutor意見反應");
$webmaster_email= $myemail ;
$text = iconv('utf-8','big5//TRANSLIT//IGNORE', $texts);
$mail->Subject = "意見反應"; //設定郵件標題   
$mail->Body = "姓名：".$myname."<br/>電話：".$myphone."<br/>身份：".$myid."<br/>反應類別：".$myre."<br/>反應內容：".$texts; //設定郵件內容 
$mail->IsHTML(true); //設定郵件內容為HTML   

$mail->setFrom($webmaster_email,$myname);
$mail->AddAddress("tutor@24hteacher.com", "意見反應"); //設定收件者郵件及名稱   
$mail->AddReplyTo($webmaster_email,$myname);
if(!$mail->Send()) {   
echo "Mailer Error: " . $mail->ErrorInfo;   
} else {   
header("Location: addreaction.php?msg=1");
die(); 
}

// $to = '';
// $from = '' ;
// $from_name = $username;
// //attachment files path array
// $files = array();
// $subject = 'Tutor 意見反應'; 
// $html_content = '<h1>'.$username.'</h1>
// 			<p><b>內容 : </b>'.$texts.'</p>
//             <p><b>Total Attachments : </b>'.count($files).' attachments</p>';

// //call multi_attach_mail() function and pass the required arguments
// $send_email = multi_attach_mail($to,$subject,$html_content,$from,$from_name,$files);

// //print message after email sent
// echo $send_email?"<h1> Mail Sent</h1>":"<h1> Mail not SEND</h1>";

?>

