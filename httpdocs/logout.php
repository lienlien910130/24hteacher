<?php
@session_start();
require_once 'facebook_login/fbConfig.php';


unset($_SESSION["login"]);
unset($_SESSION["id"]);
unset($_SESSION["account"]);
unset($_SESSION["pay"]);
unset($_SESSION["type"]);

$facebook->destroySession();

header("location:index.php");

?>