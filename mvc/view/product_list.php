<div id="content">		

	<div id="content-header">
		<h1>Danh sách sản phẩm</h1>
	</div> <!-- #content-header -->	


	<div id="content-container">
		<div class="row">

			<div class="col-md-12">

				<div class="portlet">

					<div class="portlet-header">

						<h3>
							Bảng sản phẩm
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">						

						<div class="table-responsive">

							<table 
								class="table table-striped table-bordered table-hover table-highlight table-checkable" 
								data-provide="datatable" 
								data-display-rows="10"
								data-info="true"
								data-search="true"
								data-length-change="true"
								data-paginate="true"
							>
									<thead>
										<tr>
											<th data-direction="asc" data-filterable="true" data-sortable="true">Tên sản phẩm</th>
											<th data-direction="asc" data-filterable="true" data-sortable="true">Giá</th>
											<th data-direction="asc" data-filterable="true" data-sortable="true">Loại sản phẩm</th>
											<th data-direction="asc" data-filterable="true" data-sortable="true">Hãng</th>
											<th data-direction="asc" data-filterable="true" data-sortable="true">Số lượng</th>
											<th data-filterable="true" data-sortable="true">Đã bán</th>
											<th data-filterable="false" class="hidden-xs hidden-sm">Thông số</th>
											<th data-filterable="false" class="hidden-xs hidden-sm">Sửa</th>
											<th data-filterable="false" class="hidden-xs hidden-sm">Xóa</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($row = mysqli_fetch_array($data['product'])) { ?>
										<tr>
											<td><?=$row['name']?></td>
											<td><?=$row['price']?></td>
											<td><?=$row['catalog']?></td>
											<td><?=$row['brand']?></td>
											<td><?php if ($row['inventory'] == null) {echo 1;} else {echo $row['inventory'];} ?></td>
											<td><?php if ($row['sold'] == null) {echo 0;} else {echo $row['sold'];} ?></td>
											<td><a href="http://localhost:8080/shopping/Admin/Specifications/<?= $row['id']?>"><button class="btn btn-info"><i class="fa fa-search "></i></button></a></td>
											<td><a href="http://localhost:8080/shopping/Admin/EditProduct/<?= $row['id']?>"><button class="btn btn-success"><i class="fa fa-pencil "></i></button></a></td>
											<td><a href="http://localhost:8080/shopping/Admin/DeletProduct/<?= $row['id']?>"><button class="btn btn-danger"><i class="fa fa-times "></i></button></a></td>
										</tr>
								<?php } ?>  
									</tbody>
								</table>
							</div>
						</div>
					</div> <!-- /.portlet-content -->

				</div> <!-- /.portlet -->


			</div> <!-- /.col -->

		</div> <!-- /.row -->

	</div> <!-- /#content-container -->

</div> <!-- #content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Bạn có muốn xóa sản phẩm này?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id = "delete-product">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

	$(document).ready(function() {
		$('#table_id').DataTable();
	});
</script>