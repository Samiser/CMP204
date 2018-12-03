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
	
	<!-- Page Contents -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<?php
				include 'dbcreds.php';

				//Generate salted hash of password
				$hash = password_hash($_POST['Password'], PASSWORD_BCRYPT);

				// Create connection
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				
				// Check if user already exists
				$stmt = $conn->prepare("SELECT * FROM users WHERE username=:user");
				$stmt->bindParam(":user", $_POST['Username'], PDO::PARAM_STR);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				if (!$_POST['Username'] or !$_POST['Password'] or !$_POST['Email']) {
					echo("<p>You must enter something in every field</p>");
				} elseif ($row) {
					echo("<p>User already exists</p>");
				} elseif ($_POST['Password'] !== $_POST['passwordConfirm']) {
					echo("<p>Passwords don't match</p>");
				} elseif (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
					echo("<p>Not a valid email</p>");
				} else {

					// Prepare and execute statement
					$stmt = $conn->prepare("INSERT INTO users (email, username, passhash) VALUES (:email, :username, :passhash)");
					$stmt->bindParam(":email", $_POST['Email'], PDO::PARAM_STR);
					$stmt->bindParam(":username", $_POST['Username'], PDO::PARAM_STR);
					$stmt->bindParam(":passhash", $hash, PDO::PARAM_STR);
	
					// Execute statement
					$stmt->execute();

					echo '<p>Account successfully created!</p>';
				}
			?>

			</div>
		</div>
	</div>
</body>
</html>
