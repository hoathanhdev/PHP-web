<?php
	$MaND = $_POST['MaNguoiDung'];
	$TenND = $_POST['HoVaTen'];
	
	if(trim($TenND) == "")
		ThongBaoLoi("Tên người dùng không được bỏ trống!");
	else{
		$sql = "update tbl_nguoidung set TenNguoiDung = '" . $TenND . "' where MaNguoiDung = '". $MaND . "'";
		$danhsach = $connect->query($sql);
		if($danhsach)
			ThongBao("Cập nhật thành công");
		else
			ThongBaoLoi($connect->connect_error);	
	}
?>