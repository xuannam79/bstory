<?php
//khởi tạo đối tượng mysqli
$mysqli = new mysqli("localhost", "root", "", "bstory");
//$mysqli = new mysqli("sql203.byethost32.com", "b32_22310487", "quan12345", "b32_22310487_ttnq");
//thiết lập font chữ utf8
$mysqli->set_charset("utf8");
//thông báo lỗi nếu kết nối sai
if (mysqli_connect_errno()){
	echo "Lỗi kết nối database: " . mysqli_connect_error();
	exit();
}
?>
