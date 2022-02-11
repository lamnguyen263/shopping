<div id="content">		
	<div id="content-header">
		<h1>Thêm thông số sản phẩm</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">
				<form action="http://localhost:8080/shopping/Admin/AddSpecifications/<?=$data['product'][0]['id']?>" autocomplete="off" method="POST">
					<fieldset disabled>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="disabledTextInput">Sản phẩm</label>
							<input type="text" id="disabledTextInput" class="form-control" placeholder="<?=$data['product'][0]['name']?>">
						</div>
					</div>
					</fieldset>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">Thông số</label>
							<input  type="text" class="form-control" id="name" name="name">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="value">Giá trị</label>
							<input type="text" class="form-control" id="value" name="value">
						</div>
					</div>

					<div class="form-group col-md-12 text-right">
						<button type="submit" class="btn btn-primary" name = "add_specifications" >Thêm thông số sản phẩm</button>
					</div>
				</form>


			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->