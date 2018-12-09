<?php include_once 'templates/bstory/inc/header.php'; ?>
<?php
	$cat_id = $_GET['id'];
	$query = "SELECT * FROM cat WHERE cat_id = {$cat_id}";
	$ketqua = $mysqli->query($query);
	$arCat = mysqli_fetch_assoc($ketqua);
	// tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM story WHERE cat_id = {$cat_id}";
	$resultTSD = $mysqli->query($queryTSD);
	$arTmp = mysqli_fetch_assoc($resultTSD);
	$tongSoDong = $arTmp['TSD'];
	// số truyện trên 1 trang
	$row_count = ROW_COUNT;
	// Tổng số trang
	$tongSoTrang = ceil($tongSoDong/$row_count);
	// trang hiện tại
	$current_page = 1;
	if(isset($_GET['page'])) {
		$current_page = $_GET['page'];
	}
	// offset
	$offset = ($current_page - 1) * $row_count;
?>
<div class="content_resize">
  <div class="mainbar">
	<h1><?php echo $arCat['name'] ?></h1>
    <?php
		$query2 = "SELECT * FROM story WHERE cat_id = {$cat_id} ORDER BY story_id DESC LIMIT {$offset}, {$row_count}";
		$ketqua2 = $mysqli->query($query2);
		while($arStory = mysqli_fetch_assoc($ketqua2) ) {
			$story_id = $arStory['story_id'];
			$name = $arStory['name'];
			$created_at = $arStory['created_at'];
			$counter = $arStory['counter'];
			$picture = $arStory['picture'];
			$preview_text = $arStory['preview_text'];
	?>
    <div class="article">
      <h2><a href="/detail.php?id=<?php echo $story_id ?>"><?php echo $name; ?></a></h2>
      <p class="infopost">Ngày đăng: <?php echo $created_at; ?>. Lượt đọc: <?php echo $counter; ?></p>
      <div class="clr"></div>
      <div class="img">
		<?php
			if($picture != '') {
		?>
		<a href="detail.php?id=<?php echo $story_id; ?>">
			<img src="/files/<?php echo $picture; ?>" style="width: 161px; height: 192px;" alt="" class="fl" />
		</a>
		<?php
			}
		?>
	  </div>
      <div class="post_content">
        <p><?php echo $preview_text; ?></p>
        <p class="spec"><a href="/detail.php?id=<?php echo $story_id ?>" class="rm">Chi tiết</a></p>
      </div>
      <div class="clr"></div>
    </div>
	<?php
		} 
	?>
	
    <p class="pages"><small>Trang <?php echo $current_page; ?> / <?php echo $tongSoTrang; ?></small> 
	<?php
		for($i=1; $i <= $tongSoTrang; $i++) {
			// /cat/the-thao-2/page/2
			$urlSeo = '/cat/'.utf8ToLatin($arCat['name']).'-'.$cat_id.'/page/'.$i;
	?>
		<?php
			if($i == $current_page) {
		?>
				<span><?php echo $current_page; ?></span> 
		<?php
			} else {
		?>
			<a href="<?php echo$urlSeo?>"><?php echo $i; ?></a>
		<?php
			}
		?>
	<?php
		}
	?>
	</p>
  </div>
  <div class="sidebar">
  <?php include_once 'templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/bstory/inc/footer.php'; ?>
