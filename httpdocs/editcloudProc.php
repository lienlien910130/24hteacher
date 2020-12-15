<?php
$titles = $_POST["titles"];
$texttype = $_POST["texttype"];

$ids = $_POST["id"];

ob_start();
include_once 'lib/core.php';
$result = new stdClass();

$i = editclouds($titles,$texttype,$ids);

if($i == 1 ){
    header("Location: clouds.php");
    die();
}

?>