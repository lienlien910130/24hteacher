<?php
@session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '270122590058402'; //Facebook App ID
$appSecret = '5523db68c989af6e6027cd0895dbcd9f'; // Facebook App Secret
$redirectURL = 'http://220.130.160.63/105tutor/fbloginProc.php'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>