<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm truyện</h2>
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
									if(isset($_POST['submit'])) {
										$tenTruyen = $_POST['tenTruyen'];
										$cat_id = $_POST['cat_id'];
										$hinhAnh = $_FILES['hinhAnh'];
										$moTa = $_POST['moTa'];
										$chiTiet = $_POST['chiTiet'];
										$tenHinhAnh = $hinhAnh['name'];
										if($hinhAnh != '') {
											$nametmp = explode('.',$tenHinhAnh);
											$duoifile = end($nametmp);
											$tenfile = 'HinhAnh-'.time().'.'.$duoifile;
											$tmp_name = $hinhAnh['tmp_name'];
											$path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenfile;
											move_uploaded_file($tmp_name,$path_upload);
										}
										// insert vao table story
										$queryAddTruyen = "INSERT INTO story(name,preview_text, detail_text, picture, cat_id)
															VALUES('{$tenTruyen}','{$moTa}','{$chiTiet}','{$tenfile}','{$cat_id}')";
										$resultAddTruyen = $mysqli->query($queryAddTruyen);
										if($resultAddTruyen) {
											header("location:index.php?tab=3&msg=Thêm thành công!");
										} else {
											header("location:index.php?tab=3&msg=Có lỗi trong quá trình xử lý!");
										}
									}
								?>
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="tenTruyen" value="" class="form-control" required="">
                                    </div>
									<div class="form-group">
                                        <label>Danh mục truyện</label>
										<select class="form-control" name="cat_id" required="">
										<?php
											$queryCombo = "SELECT * FROM cat ORDER BY cat_id DESC";
											$resultCombo = $mysqli->query($queryCombo);
											while($row = mysqli_fetch_assoc($resultCombo)) {
												$name = $row['name'];
												$cat_id_combo = $row['cat_id'];
										?>
											<option value="<?php echo $cat_id_combo ?>"><?php echo $name ?></option>
										<?php } ?>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label>Hình ảnh</label>
										<input type="file" name="hinhAnh">
                                    </div>
									<div class="form-group">
                                        <label>Mô tả</label>
										<textarea class="form-control" rows="3" name="moTa" required=""></textarea>
                                    </div>
									<div class="form-group">
                                        <label>Chi tiết</label>
										<textarea class="form-control ckeditor" rows="5" name="chiTiet"></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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