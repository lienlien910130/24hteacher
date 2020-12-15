
<?php 
include_once '../lib/core.php';

$to = 'lily@dgsense.com';
$from = 'info@codexworld.com';
$from_name = 'lily';

//attachment files path array
$files = array();
$subject = 'PHP Email with multiple attachments by CodexWorld'; 
$html_content = '<h1>PHP Email with multiple attachments by CodexWorld</h1>
            <p><b>Total Attachments : </b>'.count($files).' attachments</p>';

//call multi_attach_mail() function and pass the required arguments
$send_email = multi_attach_mail($to,$subject,$html_content,$from,$from_name,$files);

//print message after email sent
echo $send_email?"<h1> Mail Sent</h1>":"<h1> Mail not SEND</h1>";
?>