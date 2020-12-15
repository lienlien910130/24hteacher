<?php
@session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '260072066496-hk430dv8rqe74lgsbnptkolqgkfskidr.apps.googleusercontent.com';
$clientSecret = 'uGjwN3HEe1VdeJKvdYlP43Kh';
$redirectURL = 'http://www.24hteacher.com/t1.php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>