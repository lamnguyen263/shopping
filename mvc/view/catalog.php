<div id="content">		
	<div id="content-header">
		<h1>Loại sản phẩm</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Tên loại</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 0; while ($row = mysqli_fetch_assoc($data['catalog'])) {  ?>
							<tr>
								<td><?= ++$count ?></td>
								<td><?= $row['id'] ?></td>
								<td><?= $row['catalog_name'] ?></td>
								<td><button type="button" class="btn btn-success catalog_edit" data-toggle="modal" data-target="#editModal" data-id="<?=$row['id']?>" data-name="<?=$row['catalog_name']?>" ><i class="fa fa-pencil "></i></button></td>
								<td><button type="button" class="btn btn-danger catalog_delete" data-toggle="modal" data-target="#deleteModal" data-id = "<?=$row['id']?>">
									<i class="fa fa-times"></i>
								</button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->

<!----------------------------- Edit Modal ----------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sửa loại sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="id" class="col-form-label">ID:</label>
						<input type="text" class="form-control" id="id" readonly="true">
					</div>
					<div class="form-group">
						<label for="name" class="col-form-label">Tên:</label>
						<input type="text" class="form-control" id="name">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id = "edit_catalog">Sửa</button>
			</div>
		</div>
	</div>
</div>
<!----------------------------- end Edit Modal ----------------------------->

<!----------------------------- Delete Modal ----------------------------->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Xóa loại SP</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Bạn có muốn xóa loại sản phẩm này
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id = "delete_catalog">Delete</button>
			</div>
		</div>
	</div>
</div>
<!----------------------------- End Delete Modal ----------------------------->



<script type="text/javascript">
	$(document).ready(function(){

		$('.catalog_edit').each(function () {
			var $this = $(this);

			$this.on('click',function(){
				var id = $(this).data('id');
				var name = $(this).data('name');

				$('#editModal').on('show.bs.modal', function (event) {
 					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  					var modal = $(this);
  					modal.find('.modal-title').text('Thương hiệu : ' + name);
  					modal.find('#id').val(id);
  					modal.find('#name').val(name);
  				});

				$('#edit_catalog').click(function(){
					var name_input = $('#name').val();
					$.ajax({
						type: "POST",
						crossDomain: true,
						url: "http://localhost:8080/shopping/Admin/EditCatalog",
						data: { 'id' : id, 'name' : name_input },
						dataType : 'text',
						success: function (response) {
							alert(response);
							location.reload();
						}
					});
				});
			});
		});

		$('.catalog_delete').each(function () {
			var $this = $(this);
			
			$this.on('click',function(){
				var id = $(this).data('id');

				$('#delete_catalog').click(function(){
					$.ajax({
						type: "POST",
						url: "http://localhost:8080/shopping/Admin/DeletCatalog",
						crossDomain: true,
						data: { 'id' : id},
						dataType : 'text',
						success: function (response) {
							alert(response);
							location.reload();
						}
					});
				});
			});
		});

	});
</script>