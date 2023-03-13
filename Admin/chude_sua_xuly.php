<?php
	// Lấy thông tin từ FORM
	$MaChuDe = $_POST['MaChuDe'];
	$TenChuDe = $_POST['TenChuDe'];
	
	// Kiểm tra
	if(trim($TenChuDe) == "")
		ThongBaoLoi("Tên chủ đề không được bỏ trống!");
	else
	{
		$sql = "UPDATE `tbl_chude` SET `TenChuDe` = '$TenChuDe' WHERE `MaChuDe` = $MaChuDe";
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