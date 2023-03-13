<?php
	$MaND = $_POST['MaNguoiDung'];
	$MatKhau = $_POST['MatKhauCu'];
	$MatKhauMoi = $_POST['MatKhauMoi'];
	$XNMatKhauMoi = $_POST['XacNhanMatKhauMoi'];

		$MatKhauCheck = md5($MatKhau);
		$sql_them = "select * from `tbl_nguoidung` where MatKhau = '" . $MatKhauCheck . "' and MaNguoiDung = '" . $MaND  . "'";
		$isCorrect = $connect->query($sql_them);

		if($isCorrect){

		}
		else
		ThongBaoLoi("Tài khoản hoặc mật khẩu cũ không đúng");

	if(trim($MatKhau) == "")
		ThongBaoLoi("Mật khẩu cũ không được bỏ trống!");
	elseif(trim($MatKhauMoi) == "")
		ThongBaoLoi("Mật khẩu mới không được bỏ trống!");
	elseif(trim($XNMatKhauMoi) == "")
		ThongBaoLoi("Xác nhận mật khẩu mới không được bỏ trống!");
	elseif(strcmp(trim($XNMatKhauMoi),trim($MatKhauMoi)) != 0)
		ThongBaoLoi("Xác nhận mật khẩu mới phải trùng với mật khẩu mới!");
	else{
		$MatKhauMoi = md5($MatKhauMoi);

		$sql = "update tbl_nguoidung set MatKhau = '" . $MatKhauMoi . "' where MaNguoiDung = '" . $MaND . "'";
		// try {
		// 	$danhsach = $connect->query($sql);
		// }
		// catch(Exception $e){
		// 	echo "Có lỗi xảy ra ". $e;
		// 	exit();
		// }	             
		$danhsach = $connect->query($sql);
		if($danhsach)
			ThongBao("Cập nhật thành công");
		else
			ThongBaoLoi($connect->connect_error);
	}
?>