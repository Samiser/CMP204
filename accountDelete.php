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
	<script src="scripts/buttons.js"></script>
	<script src="scripts/randomTheme.js"></script>
</head>
<body>
	<!-- Header -->
	<?php include 'header.php';?>
	
	<!-- Info -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<?php
				session_start();
	
				include 'dbcreds.php';
	
				// Create connection
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
				$stmt = $conn->prepare("DELETE FROM users WHERE username=:name");
				$stmt->bindParam(':name', $_SESSION["Username"], PDO::PARAM_STR);
				$stmt->execute();
				$_SESSION["Username"] = "";
				// remove all session variables
				session_unset();
		
				// destroy the session
				session_destroy(); 

				echo "You have been signed out and your account has been deleted.";
			?>
			</div>
		</div>
	</div>
</body>
</html>
