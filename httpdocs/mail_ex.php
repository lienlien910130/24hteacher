<?php
	require_once("libs/mail/class.phpmailer.php");
    require_once("libs/database.php");

	sendMail($_POST["title"], $_POST["body"]);
	
	function sendMail($subject, $body)
    {
        /*
        ini_set("SMTP", "dgsense.com");
        $headers = array(
            "MIME-Version: 1.0",
            "Content-type: text/plain; charset=utf-8",
            "From: $from_name <$from_mail>",
            "Subject: {$subject}",
            "X-Mailer: PHP/".phpversion()
        );
        $rr = mail( $to_mail, $subject, $body, implode("\r\n", $headers));
        error_log("mail to $to_mail, ".($rr?"True":"False"));
        */
        try
        {
            $mail= new PHPMailer(true); //建立新物件
            $mail->MailerDebug = true;
            $mail->IsSMTP(); //設定使用SMTP方式寄信
			$mail->SMTPDebug  = 2;
            $mail->SMTPAuth = true; //設定SMTP需要驗證     
            $mail->SMTPSecure = "tls"; 
            $mail->Host = "smtp-mail.outlook.com"; //Gamil的SMTP主機
            $mail->Port = 587;  //Gamil的SMTP主機的SMTP埠位為465埠。
            $mail->Username = "goldenms013@hotmail.com";  // GMAIL username
			$mail->Password = "golden-ms25036262";  
            $mail->CharSet = "utf-8"; //設定郵件編碼
            $mail->From = "goldenms013@hotmail.com"; //設定寄件者信箱
            $mail->FromName = "系統發送請勿回覆"; //設定寄件者姓名        
            $mail->Subject = $subject; //設定郵件標題   
            $mail->Body = $body;
            $mail->IsHTML(true); //設定郵件內容為HTML
            $mail->AddAddress("golden.ms@msa.hinet.net","系統接收端"); //設定收件者郵件及名稱
            $mail->AddAddress("dawson@dgsense.com","數位基因-Debug"); //設定收件者郵件及名稱
            $mail->Send();
        } catch(phpmailerException $e) {
            echo "exception 1 : ".$e->errorMessage();
            return false;
        } catch(Exception $e) {
            echo "exception 2".$e->errorMessage();
            return false;
        }
        return true;
    }
?>