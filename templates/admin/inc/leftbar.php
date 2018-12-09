<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/CheckUserUlti.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/ContentUlti.php';
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
			<?php
				if(isset($_SESSION['userinfo'])) {
				$arUserInfo = $_SESSION['userinfo'];
				$avatar = $arUserInfo['avatar'];
			?>
            <li class="text-center">
                <img src="/files/<?php echo $avatar; ?>" class="user-image img-responsive" />
            </li>
			<?php 
				}
			?>
            <li>
                <a href="/admin/index.php?tab=1" id="1" style="<?php ?>"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a href="/admin/category/index.php?tab=2" id="2"><i class="fa fa-bar-chart-o fa-3x"></i> Quản lý danh mục</a>
            </li>
            <li>
                <a href="/admin/story/index.php?tab=3" id="3"><i class="fa fa-qrcode fa-3x"></i> Quản lý truyện</a>
            </li>
            <li>
                <a href="/admin/user/index.php?tab=4" id="4"><i class="fa fa-sitemap fa-3x"></i> Quản lý người dùng</a>
            </li>
			<li>
                <a href="/admin/slide/index.php?tab=5" id="5"><i class="fa fa-picture-o fa-3x"></i> Quản lý slide</a>
            </li>
			<li>
                <a href="/admin/contact/index.php?tab=6" id="6"><i class="fa fa-comment fa-3x"></i> Danh sách liên hệ </a>
            </li>
        </ul>
    </div>

</nav>
<!-- /. NAV SIDE  -->