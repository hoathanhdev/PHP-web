<?php
	
	$session=session_id();
	$time=time();
	$time_check=$time-600; //Ấn định thời gian là 10 phút
	
	$sql="SELECT * FROM user_online WHERE session='$session'";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL 1: " . $connect->connect_error);
		exit();
	}
	
	
	$count=mysqli_num_rows($danhsach);
	if($count=="0"){
		$sql="INSERT INTO user_online(session, time)VALUES('$session', '$time')";
		
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL 2: " . $connect->connect_error);
			exit();
		}
	
	}
	else{
	$sql="UPDATE user_online SET time='$time' WHERE session = '$session'";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL 3: " . $connect->connect_error);
		exit();
	}
	
	}
	$sql="SELECT * FROM user_online";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL 4: " . $connect->connect_error);
		exit();
	}
	
	$count_user_online=mysqli_num_rows($danhsach);
	echo "Số người đang online: $count_user_online ";
	//Nếu quá 10 phút, xóa bỏ session
	$sql="DELETE FROM user_online WHERE time<$time_check";
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL 5: " . $connect->connect_error);
		exit();
	}
	
	
?>

