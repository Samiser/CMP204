<?php
	session_start();

	// Update session variable
	$_SESSION['cookieConsent'] = $_POST["choice"];
		
	include 'dbcreds.php';

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	
	// Dealing with the parameters
	$stmt = $conn->prepare("UPDATE users SET cookieconsent=:cookie WHERE username=:name");
	$stmt->bindParam(':cookie', $_POST["choice"], PDO::PARAM_INT);
	$stmt->bindParam(':name', $_SESSION["Username"], PDO::PARAM_STR);
	$stmt->execute();
?>
