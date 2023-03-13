<?php
	$MaBV = $_GET['id'];
	
	$sql = "DELETE FROM `tbl_noidungtin` WHERE MaBaiViet = $MaBV";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	else
	{
		header("Location: index.php?do=baiviet");
	}	
	
?>

