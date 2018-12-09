<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<?php
	// tổng số dòng
	$queryTSD = "SELECT COUNT(*) AS TSD FROM slide";
	$resultTSD = $mysqli->query($queryTSD);
	$arTmp = mysqli_fetch_assoc($resultTSD);
	$tongSoDong = $arTmp['TSD'];
	// số truyện trên 1 trang
	$row_count = ROW_COUNT;
	// Tổng số trang
	$tongSoTrang = ceil($tongSoDong/$row_count);
	// trang hiện tại
	$current_page = 1;
	if(isset($_GET['page'])) {
		$current_page = $_GET['page'];
	}
	// offset
	$offset = ($current_page - 1) * $row_count;
?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý Slide</h2>
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
                                        <br /> <br />
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
                                        <th>Slide ID</th>
                                        <th>Picture</th>
										<th>Story ID</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										$queryDM = "SELECT * FROM slide LIMIT {$offset},{$row_count}";
										$resultDM = $mysqli->query($queryDM);
										while($row = mysqli_fetch_assoc($resultDM)) {
											$id = $row['slide_id'];
											$picture = $row['picture'];
											$story_id = $row['story_id'];
									?>
                                    <tr class="gradeX">
                                        <td><?php echo $id ?></td>
										<td class="center">
											<img src="/files/<?php echo $picture ?>" alt="" height="80px" width="100px"/>
										</td>
										<td><?php echo $story_id ?></td>
                                        <td class="center">
                                            <a href="update.php?idSua=<?php echo $id?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
											<a onclick="ConfirmDelete(<?php echo $id?>)" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị trang <?php echo $current_page; ?> của <?php echo $tongSoTrang ?> của <?php echo $tongSoDong ?> slide</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
											<?php
											 for($i = 1; $i <= $tongSoTrang; $i++) {
												 $active = '';
												 if($i == $current_page) {
													 $active = 'active';
												 }
											?>
                                            <li class="paginate_button <?php echo $active ?>" ><a href="index.php?tab=5&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
											<?php
											 }
											?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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