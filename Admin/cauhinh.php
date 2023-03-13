<?php
	$servername = "localhost";
	$username = "root";
	$password = "vertrigo";
	$dbname = "trangtin_baiviet_thamkhao";	
	
	
	$connect = new mysqli($servername, $username, $password, $dbname);	

	//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
	if ($connect->connect_error) {
		    die("Không kết nối :" . $conn->connect_error);
		    exit();
	}	
		
	
	
?>