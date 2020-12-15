<?php
$vititle = $_POST["vititle"];
$vihres = $_POST["vihres"];
$viopen = $_POST["viopen"];
ob_start();
include_once 'lib/core.php';
$result = new stdClass();

$i = editvideos($vititle,$vihres,$viopen);

if($i == 1 ){
    header("Location: clouds.php");
    die();
}

?>