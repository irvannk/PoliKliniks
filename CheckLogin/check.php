<?php

include '../connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$select = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
$check = mysqli_num_rows($select);
if($check > 0)
	{
	  session_start();
	  $_SESSION['username'] = $row['username'];
	  $_SESSION['password'] = $row['password'];
	  header('location:home.php');
	}
	else
	{
	  echo "<center><br><br><br><br><br><br><b>LOGIN GAGAL! </b><br>
	        Username atau Password Anda tidak benar.<br>";
	    echo "<br>";
	  echo "<input class='btn btn-blue' type=button value='ULANGI LAGI' onclick=location.href='login.php'></a></center>";

	}
?>