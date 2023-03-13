<?php
	// Lấy thông tin từ FORM
	$TieuDe = $_POST['TieuDe'];
	$ChuDe = $_POST['ChuDe'];
	$TomTat = $_POST['TomTat'];
	$NoiDung = $_POST['NoiDung'];
	$ChuThichAnh = $_POST['ChuThichAnh'];
	
	// Kiểm tra
	if(trim($TieuDe) == "")
		ThongBaoLoi("Tiêu đề không được bỏ trống!");
	elseif(trim($ChuDe) == "")
		ThongBaoLoi("Chưa chọn chủ đề!");
	elseif(trim($TomTat) == "")
		ThongBaoLoi("Tóm tắt bài viết không được bỏ trống!");
	elseif(trim($NoiDung) == "")
		ThongBaoLoi("Nội dung bài viết không được bỏ trống!");
	else
	{
		//Lưu tập tin upload vào thư mục hinhanh
		$target_path = "images/";
		$target_path = $target_path . basename($_FILES['HinhAnh']['name']);
		if (move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $target_path))
			echo "";
			//echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";
		else
			echo "Tập tin upload không thành công.<br/>";		
	


		$MaNguoiDung = $_SESSION['MaND'];
		
		if($_SESSION['QuyenHan'] == 1)
			$KiemDuyet = 1;
		else
			$KiemDuyet = 0;
		
		$sql = "INSERT INTO `tbl_noidungtin`(`MaChuDe`, `MaNguoiDung`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDang`, `HinhAnh`, `ChuThichAnh`, `LuotXem`, `KiemDuyet`)
				VALUES ($ChuDe, $MaNguoiDung, '$TieuDe', '$TomTat', '$NoiDung', now(), '$target_path', '$ChuThichAnh', 0, $KiemDuyet)";
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