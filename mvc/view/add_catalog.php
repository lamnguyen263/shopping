<div id="content">		
	<div id="content-header">
		<h1>Thêm loại sản phẩm</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">
				<form action="http://localhost:8080/shopping/Admin/AddCatalog" method="POST">

					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="name">Loại sản phẩm</label>
							<input type="text" class="form-control" id="name" name = "catalog_name">
						</div>
					</div>

					<div class="form-group col-md-12 text-right">
						<input type="submit" class="btn btn-primary" name ="add_catalog" value="Thêm loại sản phẩm">
					</div>
				</form>


			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->