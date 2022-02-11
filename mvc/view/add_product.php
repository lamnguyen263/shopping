<div id="content">		
	<div id="content-header">
		<h1>Thêm sản phẩm</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">

				<form action="http://localhost:8080/shopping/Admin/AddProduct" method="POST">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Tên sản phẩm</label>
							<input type="text" class="form-control" id="inputEmail1" name="name">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Giá</label>
							<input type="text" class="form-control" id="inputEmail4" name="price">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputState">Loại sản phẩm</label>
							<select id="inputState" class="form-control" name="catalog">
								<option selected>...</option>
								<?php while ($row = mysqli_fetch_assoc($data['catalog'])){ ?>
									<option value="<?=$row['id']?>"><?=$row['catalog_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputState">Thương hiệu</label>
							<select id="inputState" class="form-control" name="brand">
								<option>...</option>
								<?php while ($row = mysqli_fetch_assoc($data['brand'])){ ?>
									<option value="<?=$row['id']?>"><?=$row['brand_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="inputEmail4">Số lượng</label>
							<input type="number" value="1" class="form-control" id="inputEmail4" min="1" name ="quantity">
						</div>
					</div>

					
					<div class="form-group col-md-12">
						<div class="custom-file">
							<label class="custom-file-label" for="customFile">Chọn file ảnh</label>
							<input type="file" class="custom-file-input" id="imageUpload" name ="imageUpload">
						</div>
					</div>
					
					<div class="form-group col-md-12">
						<textarea name="description" id="editor" rows="40" cols="143">
						</textarea>
					</div>

					<div class="form-group col-md-12 text-right">
						<button type="submit" name = "add_product" class="btn btn-primary">Thêm sản phẩm</button>
					</div>
				</form>


			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->

<script type="text/javascript">

	CKEDITOR.config.pasteFromWordPromptCleanup = true;
	CKEDITOR.config.pasteFromWordRemoveFontStyles = false;
	CKEDITOR.config.pasteFromWordRemoveStyles = false;
	CKEDITOR.config.ProcessHTMLEntities = false;
	CKEDITOR.config.htmlEncodeOutput = false;
	CKEDITOR.config.entities = false;
	CKEDITOR.config.entities_latin = false
	CKEDITOR.config.ForceSimpleAmpersand = true;
	CKEDITOR.config.language = "vi";
	CKEDITOR.replace('editor');
	
</script>