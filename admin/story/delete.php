<?php
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
?>
<?php
	$delID = $_GET['delID'];
	$queryOldTruyen = "SELECT * FROM story WHERE story_id = {$delID}";
	$resultOldTruyen = $mysqli->query($queryOldTruyen);
	$arOldTruyen = mysqli_fetch_assoc($resultOldTruyen);
	$fileName = $arOldTruyen['picture'];
	if($fileName != ''){
		
		$filePath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileName;
		unlink($filePath);
	}
	$queryDelete = "DELETE FROM story WHERE story_id = {$delID} ";
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
