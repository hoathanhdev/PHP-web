 <?php
        if (isset($_REQUEST['ok'])) {
 
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_POST['search']);
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php 
			//để tìm kiếm dữ liệu chính xác hơn.
            $sql = "select * from tbl_noidungtin where TieuDe like '%$search%' or NoiDung like '%$search%'";
 
           
 
            // Thực thi câu truy vấn
            $danhsach = $connect->query($sql);
			//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
			if (!$danhsach) {
				die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
				exit();
			}
            // Đếm số dòng trả về trong sql.
            $num = mysqli_num_rows($danhsach);
 
            // Nếu $search rỗng thì báo lỗi tức là người dùng chưa
			//nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Hãy nhập dữ liệu vào ô tìm kiếm";
            } else {
                // Ngược lại nếu người dùng nhập liệu thì tiến hành xứ lý show dữ liệu.
                // Nếu $num > 0 hoặc $search khác rỗng tức 
				//là có dữ liệu mối show ra nhé, ngược lại thì báo lỗi.
                if ($num > 0 && $search != "") {
 
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num kết quả trả về với từ khóa <b>$search</b>";
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ 
					//dữ liệu có trong table và trả về dữ liệu ở dạng array.
					echo "<table>";
                    while ($row = $danhsach->fetch_array(MYSQLI_ASSOC))
					{						
						echo "<tr>";
						echo "<td colspan = 2 ><a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>" . $row['TieuDe'] . "</a></td>";
						echo "</tr>";
						echo "<tr>";
						echo    "<td colspan=\"2\" class=\"ngay\">" . $row["NgayDang"] . "</td>";
						echo "</tr>";
						echo "<tr>";
						echo    "<td colspan=2>" . $row["TomTat"] . "</td>";
						echo "</tr>";
						
						echo "<tr>";
						echo    "<td colspan=\"2\" align=\"right\">
								<a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>Chi tiết</a></td>";
						echo "</tr>";	 
 
                        
                    }
					echo "</table>";
                } else 
                    echo "Không tìm thấy kết quả!";
				}
			}
        ?>   