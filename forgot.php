<?php
require 'konfigreset.php';
if(!empty($_POST['email'])) {

	$email = $_POST['email'];

	$sql = "SELECT * FROM tuser WHERE email = :email";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->execute();

	if($sql->rowCount() > 0) {

		$sql = $sql->fetch();
		$id = $sql['id'];

		$token = md5(time().rand(0, 99999).rand(0, 99999));

		$sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_usuario", $id);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
		$sql->execute();

		$link = "http://localhost/login/ulang.php?token=".$token;

		$mensagem = "Copas Link Berikut:<br/>".$link;

		$assunto = "Redefinição de senha";

		$headers = 'From: seuemail@seusite.com.br'."\r\n" .
				   'X-Mailer: PHP/'.phpversion();

		//mail($email, $assunto, $mensagem, $headers);

		echo $mensagem;
		
		exit;

	}

}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Forgot Password</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
</head>

<body>
<div class="card mx-auto" style="width: 500px;">
	<form method="POST" style="padding:40px">
		<div class="text-center mb-4">
			<h1>Form Lupa Password</h1>
			<p>Masukkan Email Address Anda dengan Benar!</p>
		</div>
		
		<div class="form-label-group">
			<input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda!">
			<label>Masukkan Email Anda!</label>
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Submit"/>
		</div>
	</form>
</div>

</body>
</html>