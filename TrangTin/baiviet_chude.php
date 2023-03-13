<div class="noidung"></div>
<table border="0" cellspacing="0" width="595" align="left" valign="top">
<?php

// Lấy mã lĩnh vực
$cd = $_GET["id"];


 // BƯỚC 2: TÌM TỔNG SỐ RECORDS
		$sql1 = "select count(mabaiviet) as total from tbl_noidungtin where MaChuDe= '" .$cd."'";
        $result1 = $connect->query($sql1);		
		$row1 = $result1->fetch_array(MYSQLI_ASSOC);
		
        $total_records = $row1['total'];		
		
 
        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 4;
 
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

$result = $connect->query($sql);
if (!$result) {
    die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
    exit();
}

	while ($row = $result->fetch_array(MYSQLI_ASSOC))  
	{
	
		
		echo "<div class=\"baiviet\"><h1 align=\"left\"><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</h1>";
		echo "<div class=\"vanban\"><div class=\"anhbaiviet\"><img width=\"150\" src=" . $row["HinhAnh"] . "></div>";
		echo "<div class=\"noidung\"><div align=\"left\">" . $row['TomTat'] . "...</div><br><div align=\"right\">" . $row["NgayDang"]."</div><div align=\"right\"><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>Chi tiết</a></div></div></div></div>";
			
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