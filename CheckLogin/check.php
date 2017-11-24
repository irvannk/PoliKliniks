<?php

include '../connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$select = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
$check = mysqli_num_rows($select);
if($check > 0)
{
	$ch = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' ");
	session_start();
	$user = mysqli_fetch_array($select);
	$_SESSION['username'] = $user['username'];
	$nama = $_SESSION['username'];
	$qwere = "SELECT nama as nama from users where username='$nama' ";
	$hah = mysqli_query($connect, $qwere);
	$qq = mysqli_fetch_assoc($hah);
	$pilih = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' ");
	$row = mysqli_fetch_array($pilih);
	$nomo = $row['nama'];
	$_SESSION['nama'] = $qq['nama'];
	if($user['role'] == 'Admin'){
		header("location: ../Admin/home.php");
	}
	else if ($user['role'] == 'Dokter') {
		header("location: ../Dokter/home.php");
	}
}
else
{
	echo "<script>alert('Username atau password salah')</script>";
	echo "<script>window.location=history.go(-1)</script>";
}
?>