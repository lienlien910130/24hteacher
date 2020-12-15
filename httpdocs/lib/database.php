<?php
include_once("config.php");

function DB_CONNECT()
{
	try {
     $pdo = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
		$pdo->exec("set names utf8");
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $pe) {
		die("Could not connect to the database: " . $pe->getMessage());
	}
}
function DB_CONNECT_ex()
{
	try {
     $pdo = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
		$pdo->exec("set names utf8");
		return $pdo;
	} catch (PDOException $pe) {
		die("Could not connect to the database: ex " . $pe->getMessage());
	}
}
?>
