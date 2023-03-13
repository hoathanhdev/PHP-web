<?php
	$MaBV = $_GET['id'];
	
	$sql = "SELECT * FROM `tbl_noidungtin` WHERE MaBaiViet = $MaBV";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC)
?>
<h3>Sửa bài viết</h3>
<form action="index.php?do=baiviet_sua_xuly" method="post">
	<table class="FormDangBaiViet">
		
		<input type="hidden" name="MaBaiViet" value="<?php echo $dong['MaBaiViet']; ?>" />
		
		<tr>
			<td>
				<span class="MyFormLabel">Tiêu đề:</span>
				<input type="text" name="TieuDe" value="<?php echo $dong['TieuDe']; ?>" />
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Chủ đề:</span>
				<select name="ChuDe">
					<option value="">-- Chọn --</option>
					<?php
						$sql = "SELECT * FROM `tbl_chude` WHERE 1 ORDER BY TenChuDe";
						$danhsach = $connect->query($sql);
						//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
						if (!$danhsach) {
							die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
							exit();
						}
						
						while($dong_dscd = $danhsach->fetch_array(MYSQLI_ASSOC))
						{
							if($dong['MaChuDe'] == $dong_dscd['MaChuDe'])
								echo "<option value='" . $dong_dscd['MaChuDe'] . "' selected='selected'>" . $dong_dscd['TenChuDe'] . "</option>";
							else
								echo "<option value='" . $dong_dscd['MaChuDe'] . "'>" . $dong_dscd['TenChuDe'] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Tóm tắt:</span>
				<textarea name="TomTat"><?php echo $dong['TomTat']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Nội dung bài viết:</span>
				<textarea name="NoiDung" id="NoiDung"><?php echo $dong['NoiDung']; ?></textarea>
				<script type="text/javascript">
					var editor = CKEDITOR.replace('NoiDung');
					
					CKFinder.setupCKEditor(editor, '/trangtin_v0.6/scripts/ckfinder/');
				</script>
			</td>
		</tr>
	</table>
	
	<input type="submit" value="Cập nhật" />
</form>