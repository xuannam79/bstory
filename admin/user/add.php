<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
							<?php
								if(isset($_GET['msg'])) {
							?>
							<h4> <?php echo $_GET['msg'] ?> </h4>
							<?php } ?>
                            <div class="col-md-12">
								
                                <form role="form" action="" method="post" id="frm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="username" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Fullname:</label>
                                        <input type="fullname" name="fullname" class="form-control" />
                                    </div>
									<div class="form-group">
                                        <label>Hình ảnh</label>
										<input type="file" name="hinhAnh">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
										<?php
											if(isset($_POST['submit'])) {
												$username = $_POST['username'];
												$password = $_POST['password'];
												$fullname = $_POST['fullname'];
												$hinhAnh = $_FILES['hinhAnh'];
												$tenHinhAnh = $hinhAnh['name'];
												if($hinhAnh != '') {
													$nametmp = explode('.',$tenHinhAnh);
													$duoifile = end($nametmp);
													$tenfile = 'HinhAnh-'.time().'.'.$duoifile;
													$tmp_name = $hinhAnh['tmp_name'];
													$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenfile;
													move_uploaded_file($tmp_name,$path_upload);
												}
												$queryCheck = "SELECT username FROM users WHERE username = '{$username}'";
												$resultCheck = $mysqli->query($queryCheck);
												$arCheck = mysqli_fetch_assoc($resultCheck);
												if(empty($username)) {
													echo "<h3 style='color:red'>Vui lòng nhập username!</h3>";
												} else if (empty($password)) {
													echo "<h3 style='color:red'>Vui lòng nhập password!</h3>";
												} else if (empty($fullname)) {
													echo "<h3 style='color:red'>Vui lòng nhập fullname!</h3>";
												} else if (count($arCheck) > 0) {
													echo "<h3 style='color:red'>Đã có username này rồi. Vui lòng chọn username khác</h3>";
												} else {
													$queryAdd = "INSERT INTO users(username,password,fullname,avatar) VALUES ('{$username}','{$password}','{$fullname}','{$tenfile}')";
													$resultAdd = $mysqli->query($queryAdd);
													if ( $resultAdd ) {
													header("location:index.php?tab=4&msg=Thêm thành công!");
													} else {  
													header("location:index.php?tab=4&msg=Thêm thất bại!");
													}
												}
											}
										?>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
<script type="text/javascript">
	validateAdd();
</script>