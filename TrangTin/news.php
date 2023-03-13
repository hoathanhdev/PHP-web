<table border="0" cellspacing="0" width="200" align="center" valign="top">
		
<?php

	$sql = "SELECT t.MaBaiViet, t.TieuDe, t.HinhAnh
	FROM tbl_noidungtin t
	LIMIT 0 , 5";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 	
	{
		
		
		echo "<tr>";
		echo "";
		echo "</tr>";
	   
		
		echo "<tr>";
		echo    "<td ><img width=\"70\" src=" . $row["HinhAnh"] . "></td>";
		echo " <td ><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</a></td>";
		echo "</tr>";
		
		
	}

?>
</table>