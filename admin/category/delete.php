<?php
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
?>
<?php
	$delID = $_GET['delID'];
	$queryDelete = "DELETE FROM cat WHERE cat_id = {$delID} ";
	$resultDelete = $mysqli->query($queryDelete);
	if ($resultDelete) {
		header("location:index.php?tab=2&msg=Xóa thành công!");
	} else {
		header("location:index.php?tab=2&msg=Xóa thất bại!");	
	}	
	
?>
<?php
	ob_end_flush();
?>
