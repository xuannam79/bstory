<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>TRANG QUẢN TRỊ VIÊN</h2>
            </div>
        </div>
		<?php
		echo"<script>
				document.getElementById('1').classList.add('active-menu');
		</script>"?>
        <!-- /. ROW  -->
		<?php
			// Đếm cat
			$queryDemCat = "SELECT COUNT(*) as 'COUNT' FROM cat";
			$resultDemCat = $mysqli->query($queryDemCat);
			$arDemCat = mysqli_fetch_assoc($resultDemCat);
			// Đếm story
			$queryDemStory = "SELECT COUNT(*) as 'COUNT' FROM story";
			$resultDemStory = $mysqli->query($queryDemStory);
			$arDemStory = mysqli_fetch_assoc($resultDemStory);
			// Đếm user
			$queryDemUser = "SELECT COUNT(*) as 'COUNT' FROM users";
			$resultDemUser = $mysqli->query($queryDemUser);
			$arDemUser = mysqli_fetch_assoc($resultDemUser);
			// Đêm slide
			$queryDemSlide = "SELECT COUNT(*) as 'COUNT' FROM slide";
			$resultDemSlide = $mysqli->query($queryDemSlide);
			$arDemSlide = mysqli_fetch_assoc($resultDemSlide);
			// Đếm liên hệ
			$queryDemLH = "SELECT COUNT(*) as 'COUNT' FROM contact";
			$resultDemLH = $mysqli->query($queryDemLH);
			$arDemLH = mysqli_fetch_assoc($resultDemLH);
		?>
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="category/index.php?tab=2" title="">Quản lý danh mục</a></p>
                        <p class="text-muted">Có <?php echo $arDemCat['COUNT'] ?> danh mục</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="story/index.php?tab=3" title="">Quản lý truyện</a></p>
                        <p class="text-muted">Có <?php echo $arDemStory['COUNT'] ?> truyện</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-user"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="user/index.php?tab=4" title="">Quản lý người dùng</a></p>
                        <p class="text-muted">Có <?php echo $arDemUser['COUNT'] ?> người dùng</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-picture-o"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="slide/index.php?tab=5" title="">Quản lý slide</a></p>
                        <p class="text-muted">Có <?php echo $arDemSlide['COUNT'] ?> slide</p>
                    </div>
                </div>
            </div>
			<div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-comment"></i>
                </span>
                    <div class="text-box">
                        <p class="main-text"><a href="contact/index.php?tab=6" title="">Danh sách liên hệ</a></p>
                        <p class="text-muted">Có <?php echo $arDemLH['COUNT'] ?> liên hệ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>