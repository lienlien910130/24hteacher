
<?php
	@ob_start();
	include_once 'lib/core.php';
	require_once 'facebook_login/fbConfig.php';
	require_once 'facebook_login/User.php';

    $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	
    echo "Name: " . $fbUserProfile['name'];


	//Initialize User class
	$user = new User();
    
	
	//Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['data']['url'],
		'link' 			=> $fbUserProfile['link'],
		'phone'         => $fbUserProfile['phone']
	);
	
	$result = new stdClass();
    
	$userData = $user->checkUser($fbUserData);
	
	//Put user data into session
    @session_start();
	// $_SESSION['userData'] = $userData;
	

	if($userData == 1 ){
	   header("Location: index.php");
	   die();
	}
	
?>