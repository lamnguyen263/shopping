<div id="content">		

	<div id="content-header">
		<h1>Thuật toán gợi ý</h1>
	</div> <!-- #content-header -->	


	<div id="content-container">
		<div class="row">

			<div class="col-md-12">

				<div class="portlet">

					<div class="portlet-header">

						<h3>
							<i class="fa fa-hand-o-up"></i>
							Bảng luật kết hợp sản phẩm
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
							id = "apriori-table"
							>
							<thead>
								<tr>
									<th data-direction="asc" data-filterable="true" data-sortable="true">Sản phẩm A</th>
									<th data-direction="asc" data-filterable="true" data-sortable="true">Sản phẩm B</th>
									<th data-direction="asc" data-sortable="true">Độ tin tưởng</th>
								</tr>
							</thead>
							<tbody>

								<?php while ($row = mysqli_fetch_assoc($data['apriori'])) { ?>
									<tr>
										<td><?=$row['product_A']?></td>
										<td><?=$row['product_B']?></td>
										<td><?=$row['confidence']?></td>
									</tr>
								<?php } ?>
							</tbody>

						</table>
					</div> <!-- /.table-responsive -->


				</div> <!-- /.portlet-content -->

			</div> <!-- /.portlet -->


			<button class="btn btn-success" id = "apriori-update-btn">Update</button>
		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div> <!-- /#content-container -->

</div> <!-- #content -->

<script type="text/javascript">
	$('#apriori-table').DataTable();
</script>

<script type="text/javascript">
	$(document).ready(function (){
		$("#apriori-update-btn").click(function(){
			$.ajax({
				type: "POST",
				url: "http://localhost:8080/shopping/mvc/ajax/apriori-process.php",
				crossDomain: true,
				success: function (response) {
					console.log(response);
					var get_val = JSON.parse(response);
					if(get_val.status == 100){
						alert(get_val.msg);
						location.reload();
					}
					else{
						console.log(get_val.msg);
					}
				}
			});
		});
	});
</script>