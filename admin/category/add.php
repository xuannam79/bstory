<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm danh mục</h2>
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
										$nameAdd = $_POST['tendm'];
									$queryAdd = "INSERT INTO cat(name) VALUES ('{$nameAdd}')";
									$resultAdd = $mysqli->query($queryAdd);
									if ( $resultAdd ) {
										header("location:index.php?tab=2&msg=Thêm thành công!");
									 } else {  
										header("location:index.php?tab=2&msg=Thêm thất bại!");
										}
									}
								?>
                                <form role="form" action="" method="post" id="frm">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="tendm" class="form-control" />
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
<script type="text/javascript">
	validateAdd();
</script>