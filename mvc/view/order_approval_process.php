<div id="content">		
	<div id="content-header">
		<h1>Đơn hàng chưa duyệt</h1>
	</div> <!-- #content-header -->	

	<div id="content-container">
		<div class="row">
			<div class="col-md-12">

				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Address</th>
							<th>City</th>
							<th>Phone</th>
							<th>Total</th>
							<th>Date Order</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody>
					<?php $count = 0; while ($row = mysqli_fetch_assoc($data['order'])) {  ?>
						<tr>
							<td><?= ++$count ?></td>
							<td><?= $row['customer_name'] ?></td>
							<td><?= $row['address'] ?></td>
							<td><?= $row['city'] ?></td>
							<td><?= $row['phone_number'] ?></td>
							<td><?= $row['total'] ?></td>
							<td><?= $row['date_order'] ?></td>
							<td>
								<a href="http://localhost:8080/shopping/Admin/OrderDetails/<?= $row['id']?>"><button class="btn btn-info"><i class="fa fa-search "></i></button></a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div> <!-- /#content-container -->			

</div> <!-- #content -->