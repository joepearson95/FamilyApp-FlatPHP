<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Family App</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>

		<!--bootstrap -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div id="nav-wrapper"> 
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href="index.php">Homepage</a></li>
						<li><a href="blog.php">Blog</a></li>
						<li><a href="calorieCount.php">Calorie Counter</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php
							if (isset($_SESSION['username'])) {
								echo "
									<li><a href='#'>Hello, " . $_SESSION['username'] . "</a></li>
									<li><a href='logout.php'>logout</a></li>
								" ;
							} else {
								echo '
									<li><a href="register.php">Register</a></li>
									<li><a href="login.php">Login</a></li>
								' ;
							}
						?>
					</ul>
				</nav>
			</div>
			<div class="container"> 
				
				<!-- Logo -->
				<div id="logo">
					<h1><a href="#">Family App</a></h1>
					<span class="tag">By Joe Pearson</span>
				</div>
			</div>
		</div>