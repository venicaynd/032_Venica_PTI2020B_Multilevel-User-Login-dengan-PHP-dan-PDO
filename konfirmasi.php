<?php
require_once'konfigreset.php';

$h = $_GET['h'];

if(!empty($h)){
	$pdo->query("UPDATE tuser SET status = '1' WHERE MD5(id) = '$h'");

	echo '<h2>Cadastro Confirmado com Sucesso! </h2>';

	

}

?>