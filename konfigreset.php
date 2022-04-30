<?php
try {
	$pdo = new PDO("mysql:dbname=db;host=localhost", "root", "");
	

} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}