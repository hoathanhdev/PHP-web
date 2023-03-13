<?php
	// Lấy thông tin từ FORM
	$TieuDe = $_POST['TieuDe'];
	
	
	// Kiểm tra
	if(trim($TieuDe) == "")
		ThongBaoLoi("Tiêu đề không được bỏ trống!");
	
	else
	{
		//Lưu tập tin upload vào thư mục hinhanh
		$target_path = "files/";
		$target_path = $target_path . basename($_FILES['link_file']['name']);
		if (move_uploaded_file($_FILES['link_file']['tmp_name'], $target_path))
			echo "";
			//echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";
		else
			echo "Tập tin upload không thành công.<br/>";		
	


		
		
		$sql = "INSERT INTO `file`(`Ten_file`, `Ngay_Dang`, `Link_file`)
				VALUES ('$TieuDe', now(), '$target_path')";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			ThongBao("Đăng bài viết thành công!");
		}		
		
	}
?>