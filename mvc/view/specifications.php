<div id="content">		
	<div id="content-header">
		<h1>Thông số kỹ thuật</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Thông số</th>
							<th>Giá trị</th>
							<th>Sửa</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 0; while ($row = mysqli_fetch_assoc($data['specifications'])) {  ?>
							<tr>
								<td><?= ++$count ?></td>
								<td><?= $row['specifications_name'] ?></td>
								<td><?= $row['specifications_value'] ?></td>
								<td><button type="button" class="btn btn-success specifications_edit" data-toggle="modal" data-target="#editModal" data-name="<?=$row['specifications_name']?>" data-value="<?=$row['specifications_value']?>" data-id="<?=$row['id']?>"><i class="fa fa-pencil "></i></button></td>
								<td><button type="button" class="btn btn-danger delete_specifications" data-toggle="modal" data-target="#deleteModal" data-id = "<?=$row['id']?>">
									<i class="fa fa-times"></i>
								</button></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<div class="form-group col-md-12 text-right">
				<a href="http://localhost:8080/shopping/Admin/AddSpecifications/<?=$data['id']?>"><button type="submit" class="btn btn-primary">Thêm thông số</button></a>
			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->

<!----------------------------- Modal ----------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sửa thông số</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Thông số:</label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="message-text" class="col-form-label">Giá trị:</label>
					<input type="text" class="form-control" id="value">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id = "edit_specifications" name = "">Sửa</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Xóa thông số</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Bạn có muốn xóa thông số này
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id ="delet_specifications">Delete</button>
			</div>
		</div>
	</div>
</div>
<!----------------------------- End Delete Modal ----------------------------->

<script type="text/javascript">

	$('.specifications_edit').each(function () {
		var $this = $(this);

		$this.on('click',function(){
			var name = $(this).data('name');
			var value = $(this).data('value');
			var id = $(this).data('id');

			$('#editModal').on('show.bs.modal', function (event) {
 					// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  					// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  					var modal = $(this);
  					modal.find('.modal-title').text('Thông số ID : ' + id);
  					modal.find('#name').val(name);
  					modal.find('#value').val(value);
  				});

			$('#edit_specifications').click(function(){
				var input_name = $('#name').val();
				var input_value = $('#value').val();

				$.ajax({
					type: "POST",
					crossDomain: true,
					url: "http://localhost:8080/shopping/Admin/EditSpecifications",
					data: { 'id' : id, 'name' : input_name, 'value' : input_value },
					dataType : 'text',
					success: function (response) {
						alert(response);
						location.reload();
					}
				});
			});
		});
	});

	$('.delete_specifications').each(function () {
		var $this = $(this);

		$this.on('click',function(){
			var id = $(this).data('id');

			$('#delet_specifications').click(function(){
				$.ajax({
					type: "POST",
					url: "http://localhost:8080/shopping/Admin/DeletSpecifications",
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

</script>