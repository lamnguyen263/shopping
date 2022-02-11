<div id="content">		
	<div id="content-header">
		<h1>Chi tiết đơn hàng</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 0; while ($row = mysqli_fetch_assoc($data['orderDetails'])) {  ?>
							<tr>
								<td><?= ++$count ?></td>
								<td><?= $row['name'] ?></td>
								<td><?= $row['price'] ?></td>
								<td><?= $row['quantity'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->