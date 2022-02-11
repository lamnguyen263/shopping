<?php include('./mvc/view/include/header.php');
if (isset($_SESSION['messenge']) && !empty(trim($_SESSION['messenge'])) ) {
	$messenge = $_SESSION['messenge'];
	echo "<script> alert ('$messenge') </script>";
	unset($_SESSION['messenge']);
}
?>
<div class="row slider">
	<div class="col-12 col-lg-9">
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<a href=""><img src="http://localhost:8080/shopping/public/image/A51_banner.png" class="d-block w-100" alt="..."></a>
				</div>
				<div class="carousel-item">
					<a href=""><img src="http://localhost:8080/shopping/public/image/logo2.png" class="d-block w-100" alt="..."></a>
				</div>
				<div class="carousel-item">
					<a href=""><img src="http://localhost:8080/shopping/public/image/logo3.png" class="d-block w-100" alt="..."></a>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>

	<div class="col-12 col-lg-3">
		<div class="row">
			<div class="col-12 col-md-4 col-lg-12">

				<div class="img-box">
					<a href="#">
						<div class="box-img">
							<img src="http://localhost:8080/shopping/public/image/lenovo_banner.jpg"/>
						</div>
					</a>
					<a href="#">
						<div class="box-img" style="margin-top: 5px ">
							<img src="http://localhost:8080/shopping/public/image/A51_banner.png"/>
						</div>
					</a>
					<a href="#">
						<div class="box-img" style="margin-top: 5px ">
							<img src="http://localhost:8080/shopping/public/image/Apple_banner.png"/>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------- show product ---------Dùng plugin owl-Carousel để thực hiện, số item được thể hiện riêng cho từng kích thước màn hình------------------------>
<div class="container">
	<div class="row row-slide-news-phone desktop">
		<div class="col-12 title-hot">
			<h5>
				<i class="fa fa-laptop fa-2x"></i> LAPTOP NỔI BẬT
			</h5>
		</div>
	</div>

	<div class="owl-carousel owl-theme mobile-product laptop owl-loaded owl-drag ">
		
		<?php while ($row = mysqli_fetch_array($data['laptop'])) {  ?>
			<div class="item">
				<div class="card" style="">
					<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><img src="http://localhost:8080/shopping/public/image/<?=$row['image']?>" class="card-img-top" alt="..."></a>
					<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><div class="card-body">
						<h5 class="card-title"><?=$row['name']?></h5>
						<div class="price">
							<h5><a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>" class="news"><?=number_format($row["price"] - $row["discount"],0,',','.').' VND'?></a></h5>
						</div>		
					</div></a>
				</div>
			</div>
		<?php } ?>
		
	</div>

	<!------------------------------------------ End laptop hot --------------------->
	<div class="row row-slide-news-phone desktop">
		<div class="col-12 title-hot">
			<h5>
				<i class="fa fa-mobile fa-2x"></i>	Điện thoại nổi bật nhất
			</h5>
		</div>
	</div>

	<div class="owl-carousel owl-theme mobile-product owl-loaded owl-drag">
		<?php while ($row = mysqli_fetch_array($data['smartphone'])) {  ?>
		<div class="item">
			<div class="card" style="">
				<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><img src="http://localhost:8080/shopping/public/image/<?=$row['image']?>" class="card-img-top" alt="..."></a>	
				<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><div class="card-body">
					<h5 class="card-title"><?=$row['name']?></h5>
					<div class="price">
						<h5><a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>" class="news"><?=number_format($row["price"] - $row["discount"],0,',','.').' VND'?></a></h5>
					</div>
				</div></a>
			</div>
		</div>
		<?php } ?>
	</div>

	<!------------------------------- End mobile --------------------------->

	<div class="row row-slide-news-phone desktop">
		<div class="col-12 title-hot">
			<h5>
				<i class="fa fa-headphones fa-2x"></i>	Phụ kiện nổi bật
			</h5>
		</div>
	</div>

	<div class="owl-carousel owl-theme mobile-product gear-carousel">

		<?php while ($gear = mysqli_fetch_array($data['gear'])) { ?>
			<div class="item">
				<div class="card" style="">
					<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><img src="http://localhost:8080/shopping/public/image/<?=$gear['image']?>" class="card-img-top" alt="..."></a>	
					<a href="http://localhost:8080/shopping/Product/Detail/<?=$row['id']?>"><div class="card-body">
						<h5 class="card-title"><?=$gear['name']?></h5>
						<div class="price">
							<h5><a href="http://localhost:8080/shopping/Product/Detail/<?=$gear['id']?>" class="news"><?= number_format($gear["price"] - $gear["discount"],0,',','.').' VND'?></a></h5>
						</div>
					</div></a>
				</div>
			</div>
		<?php } ?>

	</div>

	<!--------------------------------END SHOW GEAR------------------------------->
</div>
<!------------------------------------------------------- start footer ----------------------------->
</div>
<?php include('./mvc/view/include/footer.php')?>
<script>
	$(document).ready(function(){
		$('.owl-carousel').owlCarousel({
			loop:true,
			center:true,
			margin:10,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:5
				}
			}
		});
	});
</script>