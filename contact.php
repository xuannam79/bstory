<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/bstory/inc/header.php'; ?>
<style>
	.error {
		color: red;
	}
</style>
<?php
	$tab = $_GET['tab'];
	echo"<script>
			document.getElementById($tab).classList.add('active');
	</script>"
?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
      <h2>Form liên hệ</h2>
      <div class="clr"></div>
	<?php
		if(isset($_GET['msg'])) {
	?>
		<script type="text/javascript">
			alert("<?php echo $_GET['msg'] ?>");
		</script>
	<?php } ?>
      <form action="" method="post" class="contact">
        <ol>
          <li>
            <label for="name">Họ tên (required)</label>
            <input id="name" name="hoTen" class="text" />
          </li>
          <li>
            <label for="email">Email (required)</label>
            <input id="email" name="email" class="text" />
          </li>
          <li>
            <label for="website">Website</label>
            <input id="website" name="website" class="text" />
          </li>
          <li>
            <label for="message">Nội dung</label>
            <textarea id="message" name="message" rows="8" cols="50"></textarea>
          </li>
          <li>
            <input type="submit" name="submit" id="imageField" src="/templates/bstory/images/submit.gif" class="send" value="Gửi" />
            <div class="clr"></div>
          </li>
        </ol>
		<?php
			if(isset($_POST['submit'])) {
				$hoTen = $_POST['hoTen'];
				$email = $_POST['email'];
				$website = $_POST['website'];
				$message = $_POST['message'];
				$queryAdd = "INSERT INTO contact(name,email,website,content) VALUES ('{$hoTen}','{$email}','{$website}','{$message}')";
				$resultAdd = $mysqli->query($queryAdd);
				if ( $resultAdd ) {
				header("location:contact.php?tab=2&msg=Thêm thành công!");
				} else {  
				header("location:contact.php?tab=2&msg=Thêm thất bại!");
				}
			}
		?>
      </form>
    </div>
  </div>
  <div class="sidebar">
  <?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
  <script type="text/javascript" >
		$(document).ready(function (){
			$('.contact').validate({
				ignore: [],
				rules: {
					"hoTen": {
						required: true,
					},
					"email": {
						required: true,
						email: true,
					},			
				},
				messages: {
					"hoTen": {
						required: "Vui lòng không để trống họ tên",
					},
					"email": {
						required: "Vui lòng không để trống",
						email: "Nhập đúng định dạng",
					},
				},
			});
		});	
	</script>
</div>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/templates/bstory/inc/footer.php'; ?>
