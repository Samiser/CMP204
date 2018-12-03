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
	<div class="container" style="text-align: center;">
		<form id="LoginForm" action="login.php" method="post">
			<h1>Log in</h1>
	
			<div class="FormRow">
				<label for="Username">Username:</label>
			</div>
			<div class="FormRow">
				<input type="text" size="15" id="Username" name="Username"></input>
			</div>
	
			<div class="FormRow">
				<label for="Password">Password:</label>
			</div>
			<div class="FormRow">
				<input type="password" size="15" id="Password" name="Password"></input>
			</div>
	
			<div class="FormRow" id="LoginButtonDiv">
				<input type="submit" value="Login"></input>
			</div>
			
			<div>
				<a href="registerPage.php">Or click here to sign up!</a>
			</div>
			
		</form>
	</div>
</body>
</html>
