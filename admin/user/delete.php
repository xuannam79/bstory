<?php
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
?>
<?php
	$delID = $_GET['delID'];
	$queryTrung = "SELECT * From users WHERE id = {$delID}";
	$resultTrung = $mysqli->query($queryTrung);
	$temp = mysqli_fetch_assoc($resultTrung);
	if($temp['username'] == 'admin' && $_SESSION['userinfo']['username'] != 'admin') {
		header("location:index.php?msg=Bạn không có quyền xóa admin");
		die();
	}
	$queryDelete = "DELETE FROM users WHERE id = {$delID} ";
	$resultDelete = $mysqli->query($queryDelete);
	if ($resultDelete) {
		header("location:index.php?tab=4&msg=Xóa thành công!");
	} else {
		header("location:index.php?tab=4&msg=Xóa thất bại!");	
	}	
	
?>
<?php
	ob_end_flush();
?>
