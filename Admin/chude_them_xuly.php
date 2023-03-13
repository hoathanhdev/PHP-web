<?php
	// Lấy thông tin từ FORM
	$TenChuDe = $_POST['TenChuDe'];
	
	// Kiểm tra
	if(trim($TenChuDe) == "")
		ThongBaoLoi("Tên chủ đề không được bỏ trống!");
	else
	{
		$sql = "INSERT INTO `tbl_chude`(`TenChuDe`) VALUES ('$TenChuDe')";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			header("Location: index.php?do=chude");
		}	
		
	}
?>