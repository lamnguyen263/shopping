<?php

global $cart_data;
if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])){
    $cart_data = $_SESSION['shopping_cart'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SHOPPING SRORE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta charset="utf-8"/>
	<meta name="description" content="tmdt,shopping"/>
	<meta name="keyword" content="tmdt,abc,xyz"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://localhost:8080/shopping/public/js/jquery.nice-number.css" rel="stylesheet">
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/js/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/js/owlcarousel/assetsowlcarousel/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:8080/shopping/public/css/style.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	<script src="./public/js/owlcarousel/owl.carousel.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="http://localhost:8080/shopping/public/js/jquery.nice-number.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
</head>
<body>
	<header class="sticky-top">
		<div class="container">
			<div class="row header-top-2 sticky-top ">
				<div class="col-12">
					<div class="row tablet">
						<div class="col-12 col-lg-2 col-md-2 logo">
							<a href="../view/masterlayout.php"><img src="http://localhost:8080/shopping/public/image/logo.png"></a>
						</div>
						<div class="col-12 col-lg-10 col-md-10">
							<div class="menu-product mean-bar">
								<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-light">
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarSupportedContent">
										<ul class="navbar-nav mr-auto">
											<li class="nav-item"><a href="http://localhost:8080/shopping/Home">Trang chủ</a></li>
											<li class="nav-item"><a href="http://localhost:8080/shopping/Product/Laptop">Laptop</a></li>
											<li class="nav-item"><a href="http://localhost:8080/shopping/Product/SmartPhone">Điện thoại</a></li>		
											<li class="nav-item"><a href="http://localhost:8080/shopping/Product/Gear">Phụ kiện</a></li>
											<li class="nav-item"><a href="http://localhost:8080/shopping/Cart"><i class="fa fa-shopping-cart cart-icon"></i><div id="number-cart"><?php echo @count($cart_data); ?></div></a></li>
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="container">
		<div class="row header-top">
			<div class="col-12">
				<div class="row header-top-child">
					<div class="col-12">
						<div class="address">
							<a href="#" class="email"><i class="fa fa-envelope"></i> shopping@gmail.com</a>
							<a href="tel:0982824398" class="phone"><i class="fa fa-phone"></i> 0982 8243 98</a>
							<ul class="menu-icon">
								<li><a href="http://facebook.com" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								<li class="search-form-2">
									<form class="search-form" method="POST" action="http://localhost:8080/shopping/Product/Search" autocomplete="off"> 
										<label>
											<input type="text" name="search-text" placeholder="Tìm kiếm" value=""/>
										</label>
										<label>
											<button type="submit" class="fa fa-search" name ="search-btn"></button>
										</label>
									</form>
								</li>
							</ul>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
</html>