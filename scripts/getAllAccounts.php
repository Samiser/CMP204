<?php
	session_start();
	
	include 'dbcreds.php';

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// Prepare and execute statement
	$stmt = $conn->prepare("SELECT username, isadmin FROM users");
	$stmt->execute();

	$userList = $stmt->fetchAll(PDO::FETCH_ASSOC);

	foreach ($userList as $row => $link) {
		if ($link['isadmin']) {
			$isadmin = "Yes";
		} else {
			$isadmin = "No";
		}
		echo '<tr><td>'.$link['username'].'</td><td>'.$isadmin.'</td></tr>';	
	}
?>
