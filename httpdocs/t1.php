<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {

    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'account'         => $gpUserProfile['email'],
        'numbers'         => $gpUserProfile['id']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    header("Location:index.php?msg=1");
    //Render facebook profile data
    // if(!empty($userData)){
    //     $output = '<h1>Google+ Profile Details </h1>';
    //     $output .= '<br/>Google ID : ' . $userData['numbers'];
        
    // }else{
    //     $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    // }
} 

// else {
//     $authUrl = $gClient->createAuthUrl();
//     $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">Google+ 登入</a>';
// }
?>

<!-- <div><?php echo $output; ?></div> -->