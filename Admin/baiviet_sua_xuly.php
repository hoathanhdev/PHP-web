<?php
	// Lấy thông tin từ FORM
	$MaBaiViet = $_POST['MaBaiViet'];
	$ChuDe = $_POST['ChuDe'];
	$TieuDe = $_POST['TieuDe'];
	$TomTat = $_POST['TomTat'];
	$NoiDung = $_POST['NoiDung'];	
	// Kiểm tra
	if(trim($ChuDe) == "")
		ThongBaoLoi("Chưa chọn chủ đề!");
	elseif(trim($TieuDe) == "")
		ThongBaoLoi("Tiêu đề bài viết không được bỏ trống!");
	elseif(trim($TomTat) == "")
		ThongBaoLoi("Tóm tắt bài viết không được bỏ trống!");
	elseif(trim($NoiDung) == "")
		ThongBaoLoi("Nội dung bài viết không được bỏ trống!");
	else
	{	
		$sql = "UPDATE	tbl_noidungtin
				SET		TieuDe = '$TieuDe',
						MaChuDe = $ChuDe,
						TomTat = '$TomTat',
						NoiDung = '$NoiDung'
				WHERE	MaBaiViet = $MaBaiViet";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			ThongBao("Chỉnh sửa bài viết thành công!");
		}		
		
	}
?>