<div id="content">		
	<div id="content-header">
		<h1>Thêm thương hiệu</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="http://localhost:8080/shopping/Admin/AddBrand">

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="name">Tên thương hiệu</label>
							<input type="text" class="form-control" id="name" name = "brand_name">
						</div>
					</div>
					
					<div class="form-group col-md-12 text-right">
						<input type="submit" class="btn btn-primary" name ="add_brand" value="Thêm thương hiệu">
					</div>
				</form>


			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->