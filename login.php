<?php
	session_start();
	
	include 'dbcreds.php';

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	// Prepare and execute statement
	$stmt = $conn->prepare("SELECT passhash, isadmin, cookieconsent FROM users WHERE username = ?");
	$stmt->execute(array($_POST["Username"]));
	$data = $stmt->fetch(PDO::FETCH_ASSOC);

	if (password_verify($_POST["Password"], $data["passhash"])) {
		$_SESSION["Username"] = $_POST["Username"];
		$_SESSION["cookieConsent"] = $data["cookieconsent"];
		$_SESSION["isadmin"] = $data["isadmin"];

		$loginMessage = "Login Successful!";
	} else {
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy(); 
		
		$loginMessage = "Incorrect Username or Password";
	}
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
	
	<!-- Page Contents -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php echo $loginMessage; ?>
			</div>
		</div>
	</div>
</body>
</html>
