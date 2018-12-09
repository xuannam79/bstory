<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
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
                                        <input type="search" name="inputName" class="form-control input-sm" placeholder="Nhập tên người dùng" style="float:right; width: 300px;" />
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
                                        <th>Username</th>
										<th>Fullname</th>
										<th>Avatar</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$queryDM = "";
										if(isset($_POST['search'])) {
											$tenNguoiDung = $_POST['inputName'];
											$queryDM = "SELECT * FROM users WHERE fullname LIKE N'%{$tenNguoiDung}%'";
										} else {
											$queryDM = "SELECT * FROM users";
										}
										$resultDM = $mysqli->query($queryDM);
										while($row = mysqli_fetch_assoc($resultDM)) {
											$id = $row['id'];
											$username = $row['username'];
											$fullname = $row['fullname'];
											$avatar = $row['avatar'];
									?>
                                    <tr class="gradeX">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $username ?></td>
										<td><?php echo $fullname ?></td>
										<td class="center">
											<img src="/files/<?php echo $avatar ?>" alt="" height="80px" width="100px"/>
										</td>
                                        <td class="center">
											<?php if($username != 'admin' || $_SESSION['userinfo']['username'] == 'admin' ) { ?>
                                            <a href="update.php?idSua=<?php echo $id?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
											<?php } ?>
											<?php
												if($username != 'admin') {
											?>
											<a onclick="ConfirmDelete(<?php echo $id?>)" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
											<?php } ?>
										</td>
                                    </tr>
									<?php } ?>
                                </tbody>
                            </table>
							<script type="text/javascript">
							  function ConfirmDelete(id)
							  {
									if (confirm("Bạn có chắc chắn muốn xóa người dùng này?"))
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