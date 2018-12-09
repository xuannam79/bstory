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
									$tendm = $_GET['tendm'];
									if(isset($_POST['submit'])) {
										$nameUpdate = $_POST['tendm'];
										$queryUpdate = "UPDATE cat SET name = '{$nameUpdate}' WHERE cat_id = '{$idSua}' ";
										$resultUpdate = $mysqli->query($queryUpdate);
										if ( $resultUpdate ) {
											header("location:index.php?tab=2&msg=Sửa thành công!");
										} else {  
											header("location:index.php?tab=2&msg=Sửa thất bại!");
										}
									}
								?>
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="tendm" class="form-control" value="<?php echo $tendm ?>" />
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