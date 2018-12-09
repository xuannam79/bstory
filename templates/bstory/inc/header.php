<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/DBConnectionUtil.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/ContentUlti.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/ulti/Utf8ToLatinUtil.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BStory | VinaEnter Edu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/templates/bstory/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/templates/bstory/css/coin-slider.css" />
<script type="text/javascript" src="/templates/bstory/js/jquery-3.3.1.min.js"></script>
<script src="/templates/admin/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/templates/bstory/js/script.js"></script>
<script type="text/javascript" src="/templates/bstory/js/coin-slider.min.js"></script>
<!-- Style CSS -->
<style>
	a {
		text-decoration: none;
	}
</style>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
            <li id="1"><a href="/index.php" ><span>Trang chủ</span></a></li>
            <li id="2"><a href="/lien-he"><span>Liên hệ</span></a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="/">BStory <small>Dự án khóa PHP tại VinaEnter Edu</small></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
		<?php
			$queryDM = "SELECT * FROM slide";
			$resultDM = $mysqli->query($queryDM);
			while($row = mysqli_fetch_assoc($resultDM)) {
				$id = $row['story_id'];
				$picture = $row['picture'];
		  ?>
        <div id="coin-slider"> 
			<a href="/detail.php?id=<?php echo $id ?>"><img src="/files/<?php echo $picture ?>" width="940" height="310" alt="" /> </a> 
		</div>
		<?php
			}
		?>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">