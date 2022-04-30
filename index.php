<?php

if (isset($_POST['submit'])) {
  $secret = "YOUR_SECRET_KEY";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data = file_get_contents($url);
  $row = json_decode($data, true);

  if ($row['success'] == "true") {
    echo "<script>alert('Wow you are not a robot 😲');</script>";
  } else {
    echo "<script>alert('Oops you are a robot 😡');</script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Login Multi User/VENICA(032)</title>
  
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dist/css/floating-labels.css" rel="stylesheet">

</head>

<body>
<div class="card mx-auto" style="width: 500px;">
	<form class="form-signin" method="POST" action="cek_login.php">
		<div class="text-center mb-4">
			<h1>Form Login</h1>
			<p>Masukkan Username dan Password Anda <br> dengan Benar!</p>
		</div>

		<div class="form-label-group">
			<input type="text" class="form-control" name="username" placeholder="Masukkan Username Anda!" required autofocus>
			<label>Masukkan Username Anda!</label>
		</div>
		
		<div class="form-label-group">
			<input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda!" required>
			<label>Masukkan Password Anda!</label>
		</div>

		<div class="form-label-group">
			<select class="form-control" name="level">
				<option value="Pegawai">Pegawai</option>
				<option value="Operator">Operator</option>
				<option value="Administrator">Administrator</option>
			</select>
		</div>
		
		<div class="row" style="padding:10px; margin-left:1px" >
			<div class="g-recaptcha" data-sitekey="6Lfeda4fAAAAADtqYEoo134NO9hyQTzcU7WK0Hkk"></div>
		</div>
	
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
		<a href="forgot.php" class="button">Lupa Password ?</a>
	</form>
</div>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
</body>
</html>