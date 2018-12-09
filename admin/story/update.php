<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa truyện</h2>
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
									$queryTemp = "SELECT * FROM story WHERE story_id = {$idSua}";
									$resultTemp = $mysqli->query($queryTemp);
									$temp = mysqli_fetch_assoc($resultTemp);
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
										if(empty($tenTruyen)){
											echo '<script>alert("Vui lòng điền vào tên truyện !")</script>';
										}
										else if(empty($moTa)){
											echo '<script>alert("Vui lòng điền vào mô tả !")</script>';
										}
										else if(empty($chiTiet)){
											echo '<script>alert("Không lòng điền vào chi tiết")</script>';
										}
										else{
											if($_FILES['hinhAnh']['error'] <= 0){
												$queryDelete = "SELECT * FROM story WHERE story_id = {$idSua}";
												$resultDelete = $mysqli->query($queryDelete);
												$rowDelete = mysqli_fetch_assoc($resultDelete);
												unlink($_SERVER['DOCUMENT_ROOT']."/files/" . $rowDelete['picture']);
												$queryUpdate = "UPDATE story SET name = '{$tenTruyen}', preview_text = '{$moTa}', detail_text = '{$chiTiet}', picture = '{$tenfile}', cat_id = {$cat_id} WHERE story_id = {$idSua}";
												$resultUpdate = $mysqli->query($queryUpdate);
												if($resultUpdate){
													header("location:index.php?tab=3&msg=Sửa thành Công !");
												}else {
													header("location:update.php?tab=3&msg=Sửa thất bại !");
												}
											}
											else{
												$queryUpdate = "UPDATE story SET name = '{$tenTruyen}', preview_text = '{$moTa}', detail_text = '{$chiTiet}', cat_id = {$cat_id} WHERE story_id = {$idSua}";
												$resultUpdate = $mysqli->query($queryUpdate);
												if($resultUpdate){
													header("location:index.php?tab=3&msg=Sửa thành Công !");
												}else {
													header("location:update.php?tab=3&msg=Sửa thất bại !");
												}
											}
										}
										
									}
								?>
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="tenTruyen" value="<?php echo $temp['name'] ?>" class="form-control">
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
												if($cat_id_combo == $temp['cat_id']) {
												?>
												<option selected value="<?php echo $cat_id_combo ?>"><?php echo $name ?></option>
												<?php
												} else {
										?>
											<option value="<?php echo $cat_id_combo ?>"><?php echo $name ?></option>
												<?php }
											} ?>
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label>Hình ảnh</label> <br />
										<img src="/files/<?php echo $temp['picture']?>" alt="" width="200px" height="200px"/> 
										<input type="file" name="hinhAnh">
                                    </div>
									<div class="form-group">
                                        <label>Mô tả</label>
										<textarea class="form-control" rows="3" name="moTa" required=""><?php echo $temp['preview_text']?></textarea>
                                    </div>
									<div class="form-group">
                                        <label>Chi tiết</label>
										<textarea class="form-control ckeditor" rows="5" name="chiTiet"><?php echo $temp['detail_text']?></textarea>
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