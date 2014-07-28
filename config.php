<?php
	define('HOST','localhost');
	define('DBNAME','DB_NAME');
	define('DBUSER','DB_USER');
	define('DBPASS','DB_PASS');
	$addresswallet = "WALLET_ADDRESS";
	$website = "WEBSITE_URL";
	$filename = "db.txt";		
	$pdo = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'', ''.DBUSER.'', ''.DBPASS.'');
?>              