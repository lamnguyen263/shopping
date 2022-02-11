<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

    <title>Login - Canvas Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
	<meta name="author" content="" />

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800" type="text/css">
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/css/font-awesome.min.css" type="text/css" />		
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/css/bootstrap.min.css" type="text/css" />	
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/js/libs/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />	
	
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/css/App.css" type="text/css" />
	<link rel="stylesheet" href="http://localhost:8080/shopping/public/css/Login.css" type="text/css" />

	<link rel="stylesheet" href="http://localhost:8080/shopping/public/css/custom.css" type="text/css" />
	
</head>

<body>

<div id="login-container">

	<div id="logo">
		<a href="./login.html">
			<img src="http://localhost:8080/shopping/public/image/logos/logo-login.png" alt="Logo" />
		</a>
	</div>

	<div id="login">

		<h3>Welcome to TheBell Admin.</h3>

		<h5>Please sign in to get access.</h5>

		<form id="login-form" action="http://localhost:8080/shopping/Admin/Login" class="form" method="POST">

			<div class="form-group">
				<label for="login-username">Username</label>
				<input type="text" class="form-control" id="login-username" placeholder="Username" name = "username">
			</div>

			<div class="form-group">
				<label for="login-password">Password</label>
				<input type="password" class="form-control" id="login-password" placeholder="Password" name = "password">
			</div>

			<div class="form-group">

				<input type="submit" id="login-btn" class="btn btn-primary btn-block" name="login" value="Sign in">

			</div>
		</form>


</div> <!-- /#login-container -->

<script src="http://localhost:8080/shopping/public/js/libs/jquery-1.9.1.min.js"></script>
<script src="http://localhost:8080/shopping/public/js/libs/jquery-ui-1.9.2.custom.min.js"></script>
<script src="http://localhost:8080/shopping/public/js/libs/bootstrap.min.js"></script>

<script src="http://localhost:8080/shopping/public/js/App.js"></script>

<script src="http://localhost:8080/shopping/public/js/Login.js"></script>

</body>
</html>