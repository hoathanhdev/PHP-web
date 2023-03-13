<h3>Đăng bài viết</h3>
<form enctype="multipart/form-data"  action="index.php?do=baiviet_them_xuly" method="post">
	<table class="FormDangBaiViet">
		<tr>
			<td>
				<span class="MyFormLabel">Tiêu đề:</span>
				<input type="text" name="TieuDe" size = " 60" />
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

						
						while ($dong = $danhsach->fetch_array(MYSQLI_ASSOC)) 
						{
							echo "<option value='" . $dong['MaChuDe'] . "'>" 
							.$dong['TenChuDe'] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Tóm tắt:</span>
				<textarea name="TomTat" cols="50"></textarea>
			</td>
		</tr>
		<tr>
        
			<td>Hình ảnh<input type="file" name="HinhAnh"></td>
		</tr>
		<tr>
       
			<td>Chú thích ảnh<input type="text" name="ChuThichAnh" size="50"></td>
		</tr>
		<tr>
			<td>
				<span class="MyFormLabel">Nội dung bài viết:</span>
				
				<textarea name="NoiDung" id="NoiDung"></textarea>				
				<script>CKEDITOR.replace('NoiDung');</script>
				
			</td>
		</tr>
		    

	</table>
	
	<input type="submit" value="Đăng bài" />
</form>