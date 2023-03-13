<?php
	$sql = "SELECT *
			FROM tbl_noidungtin A, tbl_chude B, tbl_nguoidung C
			WHERE A.MaChuDe = B.MaChuDe AND A.maNguoiDung = C.MaNguoiDung ORDER by `NgayDang` DESC";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
?>
<h3>Danh sách bài viết</h3>
<table class="DanhSach">
	<tr>
		<th>Mã BV</th>
		<th>Tiêu đề</th>
		<th>Chủ đề</th>
		<th>Người đăng</th>
		<th colspan="3">Hành động</th>
	</tr>
	<?php
		while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) {	
			echo "<tr>";
				echo "<td>" . $dong['MaBaiViet'] . "</td>";
				echo "<td><a href='index.php?do=baiviet_chitiet&id=" . $dong['MaBaiViet'] . "'>" . $dong['TieuDe'] . "</a></td>";
				echo "<td>" . $dong['TenChuDe'] . "</td>";
				echo "<td>" . $dong['TenNguoiDung'] . "</td>";
				
				echo "<td align='center'>"; 
					if($dong['KiemDuyet'] == 0)
						echo "<a href='index.php?do=baiviet_kiemduyet&k=1&id=" . $dong['MaBaiViet'] . "'><img src='images/ban.png' /></a>";
					else
						echo "<a href='index.php?do=baiviet_kiemduyet&k=0&id=" . $dong['MaBaiViet'] . "'><img src='images/active.png' /></a>";
				echo "</td>";
				
				echo "<td align='center'><a href='index.php?do=baiviet_sua&id=" . $dong['MaBaiViet'] . "'><img src='images/edit.png' /></a></td>";
				echo "<td align='center'><a href='index.php?do=baiviet_xoa&id=" . $dong['MaBaiViet'] . "' onclick='return confirm(\"Bạn có muốn xóa bài viết " . $dong['TieuDe'] . " không?\")'><img src='images/delete.png' /></a></td>";
			echo "</tr>";
		}
	?>
</table>

<a href="index.php?do=baiviet_them">Đăng bài viết</a>