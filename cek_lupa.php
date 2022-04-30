<?php
include "koneksi.php"; 

$req = $_POST; 
$username = $req['username'];
session_start();
if($req['object'] == 'forgot'){ 
if($req['newpassword'] == $req['confirmpassword']) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE tuser SET password = '$hash' WHERE username = '$username' ";
        $result = mysqli_query($koneksi, $update);
        $_SESSION['msg'] = 'Your new password has reset successfully, you can now login.';
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = 'Password does not match';
        header("Location: index.php");
    }
}
?>