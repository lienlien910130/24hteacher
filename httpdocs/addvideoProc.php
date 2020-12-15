<?php
$vititle = $_POST["vititle"];
$vihres = $_POST["vihres"];
ob_start();
include_once 'lib/core.php';
$result = new stdClass();

$i = addvideos($vititle,$vihres);

if($i == 1 ){
    header("Location: clouds.php");
    die();
}

?>