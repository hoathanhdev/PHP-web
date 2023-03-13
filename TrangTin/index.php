<?php
	ob_start();

	session_start();
	
	include_once "cauhinh.php";
	
	include_once "thuvien.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  type="text/css" href="style.css"/>
	<link rel="stylesheet"  type="text/css" href="css/style.css"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<script type="text/javascript" src="scripts/jquery-1.4.1.js"></script>
	<script type="text/javascript" src="scripts/basic.js"></script>	
	<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="scripts/ckfinder/ckfinder.js"></script>
	
	<title>Trang Tin Trường Đại Học An Giang</title>
</head>

<body onload="htGio()">
	<div id="khungtrang">
		<header>
			<div class="phantren" id="phantren_logo">
				   <img src ="resourses/images/logo_en.png"  width: "804px" height: "100px" alt="logo_agu" />
			</div>
			<div class="phantren" id="phantren_thongtin">
				<div id="thongtin"><i class="fa-solid fa-envelope"></i><a href="tel:01234567890">01234567890
					</a></div>
				<div id="thongtin"><i class="fa-solid fa-phone"></i><a href="mailto:masteredu@agu.edu.vn">masteredu@agu.edu.vn</a></div>
			</div>
			
		</header>
		
		<font face ="Time New Roman" size ="5" color ="#cc3300">
	     <marquee onmouseover ="this.stop();"onmouseout ="this.start();"
		 behavior ="scroll" direction ="left"scrollamount=3>
		   Trường Đại học An Giang, Đại học Quốc gia Thành phố Hồ Chí Minh
		</marquee>
	   </font>
	  
	   			
	   
		<!-- Dữ liệu phần menu ngang -->
		<div id="phanmenungang">
		<a class="menungang" href="http://agu.edu.vn" target ="blank"> Trang chủ ĐHAG </a>
		 <a class="menungang" href="http://enews.agu.edu.vn"> Báo sinh viên</a>
		 <a class="menungang" href="#">Tin tuyển sinh</a>
		 <a class="menungang" href="#">Kết quả tuyển sinh</a>
		 <a class="menungang" href="http://mail.agu.edu.vn"> Thư điện tử</a>
		 <a class="menungang" href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+An+Giang+-+%C4%90HQG+TPHCM/@10.3716558,105.4323389,15z/data=!4m5!3m4!1s0x0:0x953539cd7673d9e5!8m2!3d10.3716558!4d105.4323389">Địa chỉ<a/>
		</div>
		<div>

			<div id="PhanMenu1">
					<a class = "menu" href="index.php?do=home">Trang chủ</a>  
					
			
				</div>
				<div id="PhanMenu2">
					
			
				</div>
				
				<div id="PhanMenu3">
					<form action="index.php?do=search_xuly" method="post">
						Tìm kiếm: <input type="text" name="search" />
						<input type="submit" name="ok" value="search" />
					</form>
				</div>
		</div>

		<div id="phantrai">
			<div class="khungmenu">
				
				<div class="tieudemenu">HỆ THỐNG</div>
				<div class="menudung">
				<ul>
			<?php
				if(!isset($_SESSION['QuyenHan']) ){
					echo "<li><a href=\"index.php\">Trang chủ</a></li>";
					echo "<li><a href=\"index.php?do=dangky\">Đăng ký</a></li>";
					echo "<li><a href=\"index.php?do=dangnhap\">Đăng nhập</a></li>";
				}
				else{
					echo "<li><a class=\"menu_trangchu\" href=\"index.php?do=dangxuat\">Đăng xuất</a></li>";
				}
			?>
				</ul>
				</div>
			</div>
			
			
<?php
	if(isset($_SESSION['QuyenHan']) && ($_SESSION['QuyenHan'] == 2) ){
		echo "<div class=\"khungmenu\">";
		echo "<div class=\"tieudemenu\">QUẢN TRỊ</div>";
		echo "<div class=\"menudung\"><ul>";
		echo "<li ><a href=\"../Admin\" class=\"quantri_link\">Quản trị bài viết</a> </li></ul></div></div>";
	}
	else if(isset($_SESSION['QuyenHan']) && ($_SESSION['QuyenHan'] == 1)){
		echo "<div class=\"khungmenu\">";
		echo "<div class=\"tieudemenu\">QUẢN TRỊ</div>";
		echo "<div class=\"menudung\"><ul>";
		echo "<li ><a href=\"../Admin\" class=\"quantri_link\">Quản trị hệ thống</a> </li></ul></div></div>";
	}

	
?>
				
			<div class="khungmenu">
			<div class="tieudemenu">CHỦ ĐỀ</div>
					
					<?php

						$sql = "SELECT * FROM `tbl_chude` WHERE 1";
						$danhsach = $connect->query($sql);
						//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
						if (!$danhsach) {
							die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
							exit();
						}
					?>
					<div id="menudung">
					  <ul>						
						
							<?php
							
								while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 
								{
    								echo "<li><a href='index.php?do=baiviet_chude&id=" . $row['MaChuDe'] . "'>" . $row['TenChuDe'] . "</a></li>";   
  								}
							?>  
						  
					   </ul>
						
					</div>	
			</div>
		  
			<div class="khungmenu">
			<p class="tieudemenu">CHẤT LƯỢNG ĐÀO TẠO</p>
			<ul>
	     <li><a class="menu" href="index.php?do=kdcldt">Kiểm định chất lượng đào tạo </a></li>
		 <li><a class="menu" href="index.php?do=doingugv">Đội ngủ giảng viên</a></li>
		 <li><a class="menu" href="index.php?do=cosovatchat">Cơ sở vật chất</a></li>
	</ul>
	      </div>
		  <div class="khungmenu">
			<p class="tieudemenu">HIỆU TRƯỞNG VÀ PHÓ HIỆU TRƯỞNG</p>
			<ul>
	     <li><a class="menu" href="index.php?do=gthieutruong">Hiệu trưởng qua các thời kì </a></li>
		 <li><a class="menu" href="index.php?do=nghiencuukh">Nghiên cứu khoa học</a></li>
		 <li><a class="menu" href="index.php?do=quanheqt">Quan hệ trong nước và quốc tế</a></li>
		 <li><a class="menu" href="https://tools.wmflabs.org/geohack/geohack.php?language=vi&pagename=%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Qu%E1%BB%91c_gia_Th%C3%A0nh_ph%E1%BB%91_H%E1%BB%93_Ch%C3%AD_Minh&params=10.868562_N_106.796312_E_">  Đại học quốc gia THPCM 10<sup>o</sup>52&#39 07&#39 106<sup>o</sup> 47&#39 47&#39 Đ </a></li>
		<li><a class="menu" href="index.php?do=video">Video</a></li>
	</ul>
	     </div>		
		 <div class="khungmenu">
		      <li><iframe width ="95%" height="150px"  src ="https://www.youtube.com/embed/nJX_YRRBLpo"></iframe></li>
		  <li><a class="menu" href="https://nld.com.vn/thoi-su-quoc-te.htm">Xem thêm tin tức về thời sự thế giới</a></li>
		
		  </div>	
		</div>
	
			
					
		<div id="phangiua">

			<?php
							
			$do = isset($_GET['do']) ? $_GET['do'] : "home";
			
			include $do . ".php";
			?>

		</div>
			
		<div id="phanphai">

			<div class="khungmenuphai">
			<!-- Dữ liệu phần menu dọc - Cột trái -->
			<div class="tieudemenu">TIN NỔI BẬT</div>
			
			<ul>

<?php

$sql = "select *  from tbl_noidungtin order by LuotXem desc limit 3";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
		{
			
			echo "<li>";
			echo "<img width=\"100\" height=\"100\" src=" . $row['HinhAnh'] . "></br>";   
			echo "<a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>".$row['TieuDe']."</a>";   
			echo "</li>";
		}
		ob_end_flush();

?>
		</ul>

		</div>

		<div class="khungmenuphai">
			<!-- Dữ liệu phần menu dọc - Cột trái -->
			<div class="tieudemenu">TIN MỚI</div>
			
			<ul>

<?php

$sql = "select *  from tbl_noidungtin order by NgayDang desc limit 3";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 		
		{
			
			echo "<li>";
			echo "<img width=\"100\" height=\"100\" src=" . $row['HinhAnh'] . "></br>";   
			echo "<a href='index.php?do=baiviet_chitiet&id=" . $row['MaBaiViet'] . "'>".$row['TieuDe']."</a>";   
			echo "</li>";
		}
		ob_end_flush();

?>
		</ul>

		</div>
	</div>
				
				
		
					

		<div id="phanduoi">
			<!-- Dữ liệu phần cuối trang -->
			<br/>Địa chỉ: số 18, đường Ung Văn Khiêm, phường Đông Xuyên, thành phố Long Xuyên, tỉnh An Giang<br/>
			<br/>Điện thoại: +84 296 6256565 ext 1900   Email: webmaster@agu.edu.vn  Fax: +84 296 3842560 <br/> 
			<br/>© Copyright 2017. Trường Đại học An Giang. | Phát triển bởi <a class="link" href="#">Nhóm 15 Học phần Lập trình web Trường Đại học An Giang</a><br/>
					
		</div>
	</div>
	<script src="main.js"></script>
</body>
</html>