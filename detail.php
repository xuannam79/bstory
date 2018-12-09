<?php include_once 'templates/bstory/inc/header.php'; ?>  
<?php 
	$story_id = $_GET['id'];
	$queryCount = "UPDATE story SET counter = counter + 1 WHERE story_id = {$story_id}";
	$resultCount = $mysqli->query($queryCount);
	$query = "SELECT * FROM story WHERE story_id = {$story_id}";
	$ketqua = $mysqli->query($query);
	$arStory = mysqli_fetch_assoc($ketqua);
?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h1><?php echo $arStory['name']; ?></h1>
      <div class="clr"></div>
      <p>Ngày đăng: <?php echo $arStory['created_at']; ?>. Lượt đọc: <?php echo $arStory['counter']; ?></p>
      <div class="vnecontent">
          <p><?php echo $arStory['detail_text']; ?></p>
      </div>
    </div>
    
    <div class="article">
      <h2><span>3</span> Truyện liên quan</h2>
      <div class="clr"></div>
      <?php
		$queryLQ = "SELECT * FROM story WHERE story_id != {$story_id} AND cat_id = {$arStory['cat_id']} ORDER BY RAND() LIMIT 3";
		$ketquaLQ = $mysqli->query($queryLQ);
		while($arStoryLQ = mysqli_fetch_assoc($ketquaLQ)) {
	  ?>
      <div class="comment"> 
		<?php if($arStoryLQ['picture'] != '') {
		?>
		<a href="/detail.php?id=<?php echo $arStoryLQ['story_id']; ?>"><img src="/files/<?php echo $arStoryLQ['picture'] ?>" width="40" height="40" alt="" class="userpic" />
		</a>
		<?php
			}
		?>
        <h3><a href="/detail.php?id=<?php echo $arStoryLQ['story_id']; ?>" title=""><?php echo $arStoryLQ['name']; ?></a></h3>
        <p><?php echo $arStoryLQ['preview_text']; ?></p>
      </div>
		<?php
			}	
		?>
    </div>
  </div>
  <div class="sidebar">
    <?php include_once 'templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templates/bstory/inc/footer.php'; ?>
  
