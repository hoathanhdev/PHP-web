<!DOCTYPE html>
<html>
	<head>
		<title>Trang Tin Điện Tử</title>
		<meta charset="utf-8" />
	</head>
	<body>
<div class="baiviet">
<?php
		
			echo "<li><iframe width =\"95%\" height=\"200px\"  src =\"https://www.youtube.com/embed/YCf3SRytWNY\"></iframe></li>";

        $sql = "select t.MaBaiViet, t.TieuDe, t.NgayDang, t.TomTat, t.MaChuDe, t.HinhAnh, t.ChuThichAnh, l.MaChuDe, l.TenChuDe
        from (tbl_chude l inner join tbl_noidungtin t on t.MaChuDe=l.MaChuDe)
        group by t.MaChuDe, t.MaBaiViet, t.TieuDe, t.NgayDang, t.TomTat
        having (t.NgayDang >= all (select NgayDang from tbl_noidungtin where MaChuDe=l.MaChuDe))";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
		{
			// echo "<tr>";
			// echo "<td colspan = 2 ><a href='index.php?do=baiviet_chude&id=" . $row['MaChuDe'] . "'>" . $row['TenChuDe'] . "</a></td>";   
			// echo "</tr>";
			// echo "<tr>";
			// echo "<td colspan = 2 ><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</a></td>";
			// echo "</tr>";
			// echo "<tr>";
			// echo    "<td colspan=\"2\" class=\"ngay\">" . $row["NgayDang"] . "</td>";
			// echo "</tr>";
			
			// echo "<tr>";
			// echo    "<td colspan=\"2\"><img width=\"100\" src=" . $row["HinhAnh"] . "></br>" . $row['ChuThichAnh'] . "</td>";
			// echo "</tr>";
			
			// echo "<tr>";
			// echo    "<td colspan=2>" . $row["TomTat"] . "</td>";
			// echo "</tr>";
			// echo "<tr>";
			// echo    "<td colspan=\"2\" align=\"right\">
			// 		<a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>Chi tiết</a></td>";
			// echo "<tr>";
			echo "<h1 align=\"left\"><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</h1>";
			echo "<div class=\"vanban\"><div class=\"anhbaiviet\"><img width=\"150\" height=\"150\"src=" . $row["HinhAnh"] . "></div>";
			echo "<div class=\"noidung\"><div align=\"left\">" . $row['TomTat'] . "...</div><br><div align=\"right\">" . $row["NgayDang"]."</div><div align=\"right\"><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>Chi tiết</a></div></div></div>";
			
		
		
		}

?>
</div>

		
	</body>
</html>