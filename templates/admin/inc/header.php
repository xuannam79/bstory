<?php
	session_start();
	ob_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/CheckUserUlti.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/ContentUlti.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/templates/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="/templates/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/templates/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- STYLES -->
	<style>
		.error {
			color:red;
		}
	</style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.php">VinaEnter Edu</a>
            </div>
            <div style="color: white;
				padding: 15px 50px 5px 50px;
				float: right;
				font-size: 16px;">
				<?php
					if(isset($_SESSION['userinfo'])) {
						$arUserInfo = $_SESSION['userinfo'];
						$fullName = $arUserInfo['fullname'];
				?>
				Xin chào, <b><?php echo $fullName; ?></b>
				&nbsp; <a href="/admin/auth/logout.php" class="btn btn-danger square-btn-adjust">Đăng xuất</a> </div>
				<?php 
					}
				?>
        </nav>
        <!-- /. NAV TOP  -->