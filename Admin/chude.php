<?php
	$sql = "SELECT * FROM `tbl_chude` WHERE 1";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
?>
<h3>Danh sách chủ đề</h3>
<table class="DanhSach">
	<tr>
		<th width="15%">Mã chủ đề</th>
		<th width="70%">Tên chủ đề</th>
		<th width="15%" colspan="2">Hành động</th>
	</tr>
	<?php
		while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) {		
			echo "<tr  bgcolor='#ffffff' onmouseover='this.style.background=\"#dee3e7\"' onmouseout='this.style.background=\"#ffffff\"'>";
				echo "<td>" . $dong["MaChuDe"] . "</td>";
				echo "<td>" . $dong["TenChuDe"] . "</td>";
				echo "<td align='center'><a href='index.php?do=chude_sua&id=" . $dong["MaChuDe"] . "'><img src='images/edit.png' /></a></td>";
				echo "<td align='center'><a href='index.php?do=chude_xoa&id=" . $dong["MaChuDe"] . "' onclick='return confirm(\"Bạn có muốn xóa chủ đề " . $dong['TenChuDe'] . " không?\")'><img src='images/delete.png' /></a></td>";
			echo "</tr>";
		}
	?>
</table>
	
<a href="index.php?do=chude_them">Thêm mới chủ đề</a>
</form>