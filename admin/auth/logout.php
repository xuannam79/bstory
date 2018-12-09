<?php
	session_start();
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
	if(isset($_SESSION['userinfo'])){
		unset($_SESSION['userinfo']);
		header("location:/admin/auth/login.php");
	}
	ob_end_flush();
?>
