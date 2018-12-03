<?php
	session_start();
	
	include 'dbcreds.php';
	
	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$new = $_GET['val'];
	$col = $_GET['col'];

	if ($col === "password") {
		$col = "passhash";
		$new = password_hash($_GET['val'], PASSWORD_BCRYPT);
	}

	if ($col === "email" and !filter_var($new, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid Email";
	} else {
		// Prepare and execute statement
		$stmt = $conn->prepare("UPDATE users SET ".$col."=:val WHERE username=:name");
		$stmt->bindParam(':val', $new, PDO::PARAM_STR);
		echo "Successfully changed your ".$_GET['col'];
		$stmt->bindParam(':name', $_SESSION["Username"], PDO::PARAM_STR);
		$stmt->execute();
		if ($col === "username") {
			$_SESSION["Username"] = $new;
		}
	}
?>
