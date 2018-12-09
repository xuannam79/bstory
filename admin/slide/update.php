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
									$queryTemp = "SELECT * FROM slide WHERE slide_id = {$idSua}";
									$resultTemp = $mysqli->query($queryTemp);
									$temp = mysqli_fetch_assoc($resultTemp);
									if(isset($_POST['submit'])) {
										$story_id = $_POST['story_id'];
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
										if($_FILES['hinhAnh']['error'] <= 0){
											$queryDelete = "SELECT * FROM slide WHERE slide_id = {$idSua}";
											$resultDelete = $mysqli->query($queryDelete);
											$rowDelete = mysqli_fetch_assoc($resultDelete);
											unlink($_SERVER['DOCUMENT_ROOT']."/files/".$rowDelete['picture']);
											$queryUpdate = "UPDATE slide SET picture = '{$tenfile}', story_id = {$story_id} WHERE slide_id = {$idSua}";
											$resultUpdate = $mysqli->query($queryUpdate);
											if($resultUpdate){
												header("location:index.php?tab=5&msg=Sửa thành Công !");
											}else {
												header("location:update.php?tab=5&msg=Sửa thất bại !");
											}
										}
										else{
											$queryUpdate = "UPDATE slide SET story_id = {$story_id}, picture = '{$tenfile}'  WHERE slide_id = {$idSua}";
											$resultUpdate = $mysqli->query($queryUpdate);
											if($resultUpdate){
												header("location:index.php?tab=5&msg=Sửa thành Công !");
											}else {
												header("location:update.php?tab=5&msg=Sửa thất bại !");
											}
										}
									}
								?>
                                <form role="form" action="" method="post" enctype="multipart/form-data">
									<div class="form-group">
                                        <label>Hình ảnh</label> <br />
										<img src="/files/<?php echo $temp['picture']?>" alt="" width="200px" height="200px"/> 
										<input type="file" name="hinhAnh">
                                    </div>
									<div class="form-group">
                                        <label>Danh mục truyện</label>
										<select class="form-control" name="story_id" required="">
										<?php
											$queryCombo = "SELECT * FROM story";
											$resultCombo = $mysqli->query($queryCombo);
											while($row = mysqli_fetch_assoc($resultCombo)) {
												$name = $row['name'];
												$story_id_combo = $row['story_id'];
												if($story_id_combo == $temp['story_id']) {
												?>
												<option selected value="<?php echo $story_id_combo ?>"><?php echo $name ?></option>
												<?php
												} else {
										?>
											<option value="<?php echo $story_id_combo ?>"><?php echo $name ?></option>
												<?php }
											} ?>
                                        </select>
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