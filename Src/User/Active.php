<?php
	$conn = mysqli_connect("localhost","root","","a_huy");
	mysqli_set_charset($conn,'utf8');
if(isset($_GET["taikhoan"])&&isset($_GET["ma"])){
	$taikhoan = $_GET["taikhoan"];
	$ma = $_GET["ma"];
	$result = mysqli_query($conn,"SELECT * FROM user WHERE Username='$taikhoan' AND Status='$ma'");
	if(mysqli_num_rows($result) > 0){
		mysqli_query($conn,"UPDATE user SET Username=1 WHERE Username='$taikhoan'");
		echo "Chúc mừng bạn kích hoạt thành công! Bây giờ bạn đã có thể đăng nhập!";
	}
	else{
		echo "Mã kích hoạt không đúng!";
	}
}
?>