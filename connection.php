<?php
 
	$connect = @mysqli_connect('localhost', 'root', '', 'POLI_KLINIK');

	if($connect->connect_error) {
		echo "Mampus Tuh Error =D". $connect_error;
		exit();
	}

?>