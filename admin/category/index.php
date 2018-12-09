<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
		<?php
		$tab = $_GET['tab'];
		echo"<script>
				document.getElementById($tab).classList.add('active-menu');
		</script>"?>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="inputName" class="form-control input-sm" placeholder="Nhập tên danh mục cần tìm" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
							<?php
								if(isset($_GET['msg'])) {
							?>
							<script type="text/javascript">
								alert("<?php echo $_GET['msg'] ?>");
							</script>
							<?php } ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
										<th>Trạng thái</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$queryDM = "";
										if(isset($_POST['search'])) {
											$tenDanhMuc = $_POST['inputName'];
											$queryDM = "SELECT * FROM cat WHERE name LIKE N'%{$tenDanhMuc}%'";
										} else {
											$queryDM = "SELECT * FROM cat";
										}
										$resultDM = $mysqli->query($queryDM);
										while($row = mysqli_fetch_assoc($resultDM)) {
											$id = $row['cat_id'];
											$name = $row['name'];
											$status = $row['status'];
									?>
                                    <tr class="gradeX">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $name ?></td>
										<td class="<?php echo $id?>">
											<a href="javascript:void(0)" onclick="return setStatus(<?php echo $status; ?>, '<?php echo $id?>')">
												<?php
												if ($status == 1) {
													$pic = 'active.gif';
												} else {
													$pic = 'deactive.gif';
												}
												?>
												<img src="/templates/admin/assets/img/<?php echo $pic?>" alt="" />
											</a>
										</td>
                                        <td class="center">
                                            <a href="update.php?idSua=<?php echo $id?>&tendm=<?php echo $name?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a onclick="ConfirmDelete(<?php echo $id?>)" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                        </td>
                                    </tr>
									<?php } ?>
                                </tbody>
                            </table>
							<script>
								function setStatus(status, cl){
									$.ajax({
										url: 'ajax/status.php',
										type: 'POST',
										cache: false,
										data: {astatus: status, acl:cl},
										success: function(data){
											$('.' + cl).html(data);
										},
										error: function (){
											alert('Có lỗi xảy ra');
										}
									});
									return false;
								}
							</script>
							<script type="text/javascript">
							  function ConfirmDelete(id)
							  {
									if (confirm("Bạn có chắc chắn muốn xóa tên danh mục này?"))
										location.href='delete.php?delID=' + id;
							  }
							</script>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>