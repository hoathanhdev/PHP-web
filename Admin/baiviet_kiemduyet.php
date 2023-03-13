<?php
	if(isset($_GET['k']))
	{
		$k = $_GET['k'];
		$id = $_GET['id'];
		
		$sql = "UPDATE tbl_noidungtin SET KiemDuyet = $k WHERE MaBaiViet = $id";
		$baiviet_kiemduyet = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$baiviet_kiemduyet) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			header("Location: index.php?do=baiviet");
		}		
	}
	else
	{
		header("Location: index.php?do=baiviet");
	}
?>