<?php
	// Lấy chủ đề cần sửa "đổ" vào form
	$sql = "SELECT * FROM `tbl_chude` WHERE MaChuDe = " . $_GET['id'];
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>
<h3>Sửa chủ đề</h3>
<form action="index.php?do=chude_sua_xuly" method="post">
	<table class="Form">
		<input type="hidden" name="MaChuDe" value="<?php echo $dong['MaChuDe']; ?>" />
		<tr>
			<td>Tên chủ đề:</td>
			<td><input type="text" name="TenChuDe" value="<?php echo $dong['TenChuDe']; ?>" /></td>
		</tr>
	</table>
	
	<input type="submit" value="Cập nhật" />
</form>