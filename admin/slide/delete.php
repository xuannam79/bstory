<?php
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
	require 'LibraryFile.php';
?>
<?php
	$objFL = new LibraryFile();
	$delID = $_GET['delID'];
	$queryOldTruyen = "SELECT * FROM slide WHERE slide_id = {$delID}";
	$resultOldTruyen = $mysqli->query($queryOldTruyen);
	$arOldTruyen = mysqli_fetch_assoc($resultOldTruyen);
	$fileName = $arOldTruyen['picture'];
	$objFL->delete($fileName,'/files/');
	$queryDelete = "DELETE FROM slide WHERE slide_id = {$delID} ";
	$resultDelete = $mysqli->query($queryDelete);
	if ($resultDelete) {
		header("location:index.php?tab=3&msg=Xóa thành công!");
	} else {
		header("location:index.php?tab=3&msg=Xóa thất bại!");
	}

?>
<?php
	ob_end_flush();
?>
