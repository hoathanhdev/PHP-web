
<form action="index.php?do=dangky_xuly" method="post">
<style>


body{
  font-family: 'Noto Sans JP', sans-serif;
}
h1, label{
  color: DodgerBlue;
}
/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 90%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  width:96%;
  resize: vertical;
  padding:15px;
  border-radius:15px;
  border:0;
  box-shadow:4px 4px 10px rgba(0,0,0,0.2);
}

input[type=text]:focus, input[type=password]:focus {

  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
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
.signupbtn {
  float: left;
  width: 100%;
  border-radius:15px;
  border:0;
  box-shadow:4px 4px 10px rgba(0,0,0,0.2);
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

</style>
  <html>
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>

   <div class="container">
     <h1>Form Đăng Ký</h1>
     <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
     <hr>
	
    <label><b>Họ và tên:</b></label>
     <input type="text"  name="HoVaTen" required>
	 
	 <label><b>Tên đăng nhập:</b></label>
     <input type="text"  name="TenDangNhap" required>
	 
    <label ><b>Mật Khẩu</b></label>
     <input type="password" placeholder="Nhập Mật Khẩu" name="MatKhau" required>
	 
    <label ><b>Nhập Lại Mật Khẩu</b></label>
     <input type="password" placeholder="Nhập Lại Mật Khẩu" name="XacNhanMatKhau" required>
	 
    <label>
       <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
     </label>
	  <label>
	  <?php
	 echo '<p>Bạn Đã Có Tài Khoản Đăng Nhập <a href="index.php?do=dangnhap">Đăng nhập</a></p>';
	 ?>
	  </label>
    <div class="clearfix">
       <button type="submit" class="signupbtn">Sign Up</button>
	   
     </div>
   </div>


 </html>

</form>
