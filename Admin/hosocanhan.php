<?php
	$sql = "SELECT * FROM `tbl_nguoidung` WHERE MaNguoiDung = " . $_SESSION['MaND'];
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
?>

<form action="index.php?do=hosocanhan_xuly" method="post">
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Hồ Sơ Cá Nhân</h1>
    <p>Sơ yếu lý lịch của bạn, Bạn có thể cập nhật !!!</p>
    <hr>
	<input type="hidden" value="<?php echo $dong['MaNguoiDung']; ?>" name="MaNguoiDung" />
		
    <label><b>Họ và tên:</b></label>
    <input type="text" value="<?php echo $dong['TenNguoiDung']; ?>" name="HoVaTen" required>

    <label><b>Tên đăng nhập:</b></label>
    <input type="text" value="<?php echo $dong['TenDangNhap']; ?>" name="TenDangNhap" disabled="disabled" required>

   
    <div class="clearfix">
      
      <button type="submit" class="signupbtn" >Cập Nhật Hồ Sơ</button>
    </div>
  </div>
</form>

</body>
</html>
</form>