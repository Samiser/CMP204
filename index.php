<?php
session_start();
?>

<!doctype html>

<html>
<head>
	<title>Samiser</title>
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="scripts/cookie.js"></script>
	<script src="scripts/randomTheme.js"></script>
</head>
<body>
	<!-- Header -->
	<?php include 'header.php';?>
	
	<!-- Page Contents -->
	<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h3>Welcome</h3>
			<p>Welcome to my website. Here you can find a few interesting things and some stuff</p>
			<p>You can also stream my music from here for free :)</p>
		</div>
		<div class="col-sm-4">
			<h3>New Release!</h3>
			<p>My latest song is HENRY'S</p>
			<p>The song cover is a coffee cup.</p>
			<p>Go check it out on the music page</p>
		</div>
	</div>
	</div>
	
</body>
</html>
