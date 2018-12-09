<?php
	require('LibraryString.php');
?>
<div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
	<?php
		$objLS = new LibraryString();
		$query = "SELECT * FROM cat WHERE status = 1";
		$ketqua = $mysqli->query($query);
		while($arCat = mysqli_fetch_assoc($ketqua)) {
		$urlSeo = '/cat/'.urlencode($objLS->getUrlRewrite($arCat['name'])).'-'.$arCat['cat_id'];
	?>
    <li>
	<a href="<?php echo $urlSeo; ?>"><?php echo $arCat['name']  ?></a>
	</li>
	<?php
		}
	?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
	<?php
		$query2 = "SELECT * FROM story ORDER BY story_id DESC LIMIT 3";
		$ketqua2 = $mysqli->query($query2);
		while($arStory = mysqli_fetch_assoc($ketqua2)) {
	?>
    <li><a href="/detail.php?id=<?php echo $arStory['story_id'] ?>"><?php echo $arStory['name'] ?></a><br />
      <?php echo $arStory['preview_text'] ?>
	</li>
	<?php
		}
	?>
  </ul>
</div>