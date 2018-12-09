<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa danh mục</h2>
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
								<?php
									$idSua = $_GET['idSua'];
									$queryTrung = "SELECT * From users WHERE id = {$idSua}";
									$resultTrung = $mysqli->query($queryTrung);
									$temp = mysqli_fetch_assoc($resultTrung);
									if($temp['username'] == 'admin' && $_SESSION['userinfo']['username'] != 'admin') {
										header("location:index.php?msg=Bạn không có quyền sửa admin");
									}
									if(isset($_POST['submit'])) {
										$username = $_POST['username'];
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
										if ($_FILES['hinhAnh']['error'] <= 0) {
											$queryDelete = "SELECT * FROM users WHERE id = {$idSua}";
											$resultDelete = $mysqli->query($queryDelete);
											$rowDelete = mysqli_fetch_assoc($resultDelete);
											unlink($_SERVER['DOCUMENT_ROOT']."/files/" . $rowDelete['avatar']);
											$queryUpdate = "UPDATE users SET username = '{$username}', fullname='{$fullname}', avatar='{$tenfile}' WHERE id = '{$idSua}' ";
											$resultUpdate = $mysqli->query($queryUpdate);
											if( $resultUpdate ) {
												header("location:index.php?tab=4&msg=Sửa thành công!");
											} else {  
												header("location:index.php?tab=4&msg=Sửa thất bại!");
											}
										}
										else {
											$queryUpdate = "UPDATE users SET username = '{$username}',fullname='{$fullname}', avatar='{$tenfile}' WHERE id = '{$idSua}' ";
											$resultUpdate = $mysqli->query($queryUpdate);
											if( $resultUpdate ) {
												header("location:index.php?tab=4&msg=Sửa thành công!");
											} else {  
												header("location:index.php?tab=4&msg=Sửa thất bại!");
											}
										}
									}
								?>
                                <form role="form" action="" method="post" id="frm" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="username" class="form-control" readonly value="<?php echo $temp['username'] ?>" />
                                    </div>
									<div class="form-group">
                                        <label>Fullname:</label>
                                        <input type="fullname" name="fullname" class="form-control" value="<?php echo $temp['fullname']?>" />
                                    </div>
									<div class="form-group">
                                        <label>Hình ảnh</label> <br />
										<img src="/files/<?php echo $temp['picture']?>" alt="" width="200px" height="200px"/> 
										<input type="file" name="hinhAnh">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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