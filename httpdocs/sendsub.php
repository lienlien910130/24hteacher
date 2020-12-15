<?php

include("mailer/PHPMailerAutoload.php"); //匯入PHPMailer類別  
require 'mailer/class.phpmailer.php'; 
include_once 'lib/core.php';

$id = $_POST["id"];

ob_start();
$pdo = DB_CONNECT();
$result = new stdClass();

$sql = "SELECT * FROM news WHERE id =".$id;
$rs = $pdo->query($sql);
if ($row = $rs -> fetch(PDO::FETCH_BOTH)){
  $myfile = fopen("news/".$row["val"], "r");
  $body = fread($myfile,filesize('news/'.$row["val"]));
  fclose($myfile);
  $subject = $row["title"];
  $types = $row["types"];
  $id = $row["id"];
}
$sql = "SELECT * FROM mailer WHERE id=1";
$rs = $pdo->query($sql);
foreach ($rs as $key => $row) {
  $a1 = $row["mailac"];
  $a2 = $row["mailpa"];
}
$x = sendMail($subject,$body,$types,$a1,$a2);
if($x == 1){
	//updateSend($id);
	 die("{\"status\":\"1\",\"message\":\"寄件成功!\"}");
}else{
   die("{\"status\":\"2\",\"message\":\"寄件失敗!\"}");
}

function sendMail($subject,$body,$types,$a1,$a2)
  {
        try
        {
			$mail= new PHPMailer(true); //建立新物件   
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
				$mail->Subject = $subject; //設定郵件標題   
				$mail->Body = $body;
				$mail->IsHTML(true); //設定郵件內容為HTML   
				$mail->setFrom("tutor@24hteacher.com","24hteacher訂閱內容");    
			   $pdo = DB_CONNECT();
            if($types == 1){
               $sql = "SELECT * FROM newsletter WHERE casespa = 1";
               $rs = $pdo->query($sql);
              foreach ($rs as $key => $row) {
                $mail->AddAddress($row["email"],"測試中");
              }
            }else if($types ==2){
              $sql = "SELECT * FROM newsletter WHERE teachpa = 1";
               $rs = $pdo->query($sql);
              foreach ($rs as $key => $row) {
                $mail->AddAddress($row["email"],"測試中");
              }
            }else{
              $sql = "SELECT * FROM newsletter WHERE webpa = 1";
               $rs = $pdo->query($sql);
              foreach ($rs as $key => $row) {
                $mail->AddAddress($row["email"],"測試中");
              }
            }
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

// if($i == 1 ){
//     header("Location: clouds.php");
//     die();
// }


?>

