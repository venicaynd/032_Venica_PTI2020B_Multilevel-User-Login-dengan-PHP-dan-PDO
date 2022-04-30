<?php
require 'konfigreset.php';

if(!empty($_GET['token'])) {
	$token = $_GET['token'];

	$sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
	$sql = $pdo->prepare($sql);
	$sql->bindValue(":hash", $token);
	$sql->execute();

	if($sql->rowCount() > 0) {
		$sql = $sql->fetch();
		$id = $sql['id_usuario'];

		if(!empty($_POST['password'])) {
			$senha = $_POST['password'];

			$sql = "UPDATE tuser SET password = :password WHERE id = :id";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":password", md5($senha));
			$sql->bindValue(":id", $id);
			$sql->execute();

			$sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
			$sql = $pdo->prepare($sql);
			$sql->bindValue(":hash", $token);
			$sql->execute();

			echo "<script>alert('Password Telah Diganti!');document.location='index.php'</script>";
			exit;
		}

		?>
		
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Konfirmasi Password</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dist/css/floating-labels.css" rel="stylesheet">
  
</head>

<body>	

<div class="card mx-auto" style="width: 500px;">
	<form method="POST" style="padding:40px">
		<div class="text-center mb-4">
			<h1>Form Konfirmasi Password</h1>
			<p>Masukkan Password Baru Anda dengan Benar!</p>
		</div>	
		
		<div class="form-label-group">
			<input type="password" class="form-control" name="password" placeholder="Tulis Password Baru!">
			<label>Tulis Password Baru!</label>
		</div>
		
		<div class="form-group">
			<input type="submit" class="btn btn-primary"  value="Konfirmasi Password" />
		</div>
	</form>
</div>
			
		
</body>
</html>		
		
		<?php



	} else {
		echo "Token Tidak Valid";
		exit;
	}
}