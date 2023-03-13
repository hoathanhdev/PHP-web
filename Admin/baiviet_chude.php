
<table border="0" cellspacing="0" width="595" align="left" valign="top">
<?php

// Lấy mã lĩnh vực
$cd = $_GET["id"];


 // BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$sql1 = "select count(mabaiviet) as total from tbl_noidungtin where MaChuDe= '" .$cd."'";
        $result1 = mysql_query($sql1);		
		$row1 = mysql_fetch_array($result1);
		
        $total_records = $row1['total'];		
		
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
 
        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
        // tổng số trang
        $total_page = ceil($total_records / $limit);
 
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        // Tìm Start
        $start = ($current_page - 1) * $limit;
 
        // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
        // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
        $sql =  "select * from tbl_noidungtin where MaChuDe='" . $cd . "' LIMIT $start, $limit"; 

$result = mysql_query($sql)
    or die("Không truy vấn được.");

	while ($row = mysql_fetch_array($result))  
	{
	
		
		echo "<tr>";
		echo "<td colspan = 2 ><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</a></td>";
		echo "</tr>";
		echo "<tr>";
		echo    "<td colspan=\"2\" class=\"ngay\">" . $row["NgayDang"] . "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo    "<td colspan=\"2\"><img width=\"100\" src=" . $row["HinhAnh"] . "></br>" . $row['ChuThichAnh'] . "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo    "<td colspan=2>" . $row["TomTat"] . "</td>";
		echo "</tr>";
		echo "<tr>";
		echo    "<td colspan=\"2\" align=\"right\">
				<a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>Chi tiết</a></td>";
		echo "<tr>";
	}
?>
	<tr>
	<td>
	<?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){			
                echo '<a href="index.php?do=baiviet_chude&id= '. $cd . ' &  page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="index.php?do=baiviet_chude&id= '. $cd . ' &  page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?do=baiviet_chude&id= '. $cd . ' &  page='.($current_page+1).'">Next</a> | ';
            }
           ?>
		   </td>
        </tr>
</table>