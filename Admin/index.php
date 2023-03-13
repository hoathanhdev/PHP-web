<?php
	session_start();
	
	include_once "cauhinh.php";
	
	include_once "thuvien.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Trang Tin Điện Tử</title>
		
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />

		<script src="scripts/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="TrangWeb">
		<a name ="dautrang"></a>
			<div id="PhanDau">	
				<?php
					if(isset($_SESSION['MaND']) && isset($_SESSION['HoTen']))
					{
					echo "<br><br><br><br><br>Xin chào ".$_SESSION['HoTen']." &nbsp;&nbsp;|| &nbsp;&nbsp;";
						echo '<a href="index.php?do=dangxuat">Đăng xuất</a>'."&nbsp;&nbsp;";
					}
				?>				
			</div>
			<div id="PhanGiua">
				<div id="BenTrai">
					<?php
					//hiện menu quản lý
					if(!isset($_SESSION['MaND']))
					{
						echo '<h3>Quản lý</h3>';
							echo '<ul>';
								echo '<li><a href="index.php?do=dangnhap">Đăng nhập</a></li>';
								echo '<li><a href="index.php?do=dangky">Đăng ký</a></li>';
							echo '</ul>';
					}
					else
					{
						echo '<h3>Quản lý</h3>';
						echo '<ul>';						
							echo '<li><a href="index.php?do=baiviet_them">Đăng bài viết</a></li>';
								
							if($_SESSION['QuyenHan'] == 1)
							{
								echo '<li><a href="index.php?do=chude">Danh sách chủ đề</a></li>';
								echo '<li><a href="index.php?do=baiviet">Danh sách bài viết</a></li>';
								echo '<li><a href="index.php?do=nguoidung">Danh sách người dùng</a></li>';
							}
						echo '</ul>';
					}


					//hiện menu hồ sơ cá nhân					
					if(isset($_SESSION['MaND']))
					{
						echo '<h3>Hồ sơ cá nhân</h3>';
						echo '<ul>';						
							echo '<li><a href="index.php?do=hosocanhan">Hồ sơ cá nhân</a></li>';
							echo '<li><a href="index.php?do=doimatkhau">Đổi mật khẩu</a></li>';
						echo '</ul>';
					}								
					?>
					<h3>Tùy Chọn</h3>
					<ul>
						<li><a href="../TrangTin/">Về Trang Tin</a></li>
					</ul>
					
					<h3>Các Khoa</h3>
					<ul>
						<li><a href=""><a class="menu" href="https://fit.agu.edu.vn/">Khoa công nghệ thông tin</a></a></li>
						<a href="https://fit.agu.edu.vn/" target ="_blank "><img src="images/khoa-hoc-va-cong-nghe.jpg" width="96%"/></a><br/>
						<li><a href=""><a class="menu" href="https://agri.agu.edu.vn/">Khoa Nông Nghiệp</a></a></li>
						<a href="https://agri.agu.edu.vn/" target ="_blank "><img src="images/tải xuống (1).jpg" width="96%"/></a><br/>
						<li><a href=""><a class="menu" href="https://feba.agu.edu.vn/">Khoa kinh tế </a></a></li>
						<a href="https://feba.agu.edu.vn/" target ="_blank "><img src="images/tải xuống (3).jpg" width="96%"/></a><br/>
						<li><a href=""><a class="menu" href="https://peda.agu.edu.vn/">Khoa sư phạm</a></a></li>
						<a href="https://peda.agu.edu.vn/" target ="_blank "><img src="images/images.jpg" width="96%"/></a><br/>
					</ul>
					
					
				</div>
				<div id="BenPhai">
					<?php
						$do = isset($_GET['do']) ? $_GET['do'] : "home";
						
						include $do . ".php";
					?>
				</div>
			</div>
			<div id="PhanCuoi">
				<div class="lienhe">Liên hệ: tva@agu.edu.vn || © Copyright 2017. Trường Đại học An Giang. | Phát triển bởi <a class="link" href="https://cict.agu.edu.vn/">Trung tâm Tin học Trường Đại học An Giang</a></div>
			</div>
		</div>
	</body>
</html>