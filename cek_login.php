<?php
session_start();

include "koneksi.php";

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi,($pass));
$level = mysqli_escape_string($koneksi, $_POST['level']);

$cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE (username = '$username' OR email = '$username')");
$user_valid = mysqli_fetch_array($cek_user);
if ($user_valid) {
    if ($password == $user_valid['password']){
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

         $uip=$_SERVER['REMOTE_ADDR']; // get the user ip
         // query for inser user log in to data base
         mysqli_query($koneksi,"INSERT INTO userlog (userId,username,userIp) values('".$_SESSION['username']."','".$_SESSION['nama_lengkap']."','$uip')");
$host=$_SERVER['HTTP_HOST'];
                                            $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        if ($level == "Pegawai") {
            header('location:home_pegawai.php');
        } elseif ($level == "Operator") {
            header('location:home_operator.php');
        } elseif ($level == "Administrator") {
            header('location:home_admin.php');
        }

    } else {
        echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!');document.location='index.php'</script>";
}
