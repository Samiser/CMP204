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
	<script src="scripts/cookie.js"></script>
	<script src="scripts/randomTheme.js"></script>
</head>
<body>
	<!-- Header -->
	<?php include 'header.php';?>
	
	<!-- Page Contents -->
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<h3 id="welcomeHeader">Welcome <?php echo $_SESSION["Username"]?>!</h3>
			</div>
			<div class="col-sm-2">
				<button onclick="window.location.href='logOut.php'" type="button" class="btn btn-primary">Log Out</button>
			</div>
		</div>
		<div id="cookieAlert" class="alert alert-success alert-dismissible fade collapse cookie" role="alert">
			Cookie consent updated!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div id="themeAlert" class="alert alert-success alert-dismissible fade collapse" role="alert">
			Theme updated!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div id="accountModal" class="modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div id="modalContent" class="modal-body">
			<p>Enter new value.</p>
			<input id="modalValue"></input>
		      </div>
		      <div class="modal-footer">
		        <button id="modalSave" type="button" class="btn btn-primary">Confirm</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>		
		<?php
			if ($_SESSION["cookieConsent"] == -1) {
				echo '<div id="cookieQuestion" class="row cookie collapse show">
					<div class="col-sm-12">
						<p>Do you consent to usage of cookies?</p>
						<button id="cookieYes" data-toggle="collapse" data-target=".cookie" type="button" class="btn btn-primary">Yes</button>
						<button id="cookieNo" data-toggle="collapse" data-target=".cookie" type="button" class="btn btn-primary">No</button>
					</div>
			</div>';} elseif ($_SESSION["cookieConsent"] == 0) {
				echo '<div class="row">
				<div class="col-sm-12">
				<p>Account Options:</p>
				<button id="username" type="button" class="btn btn-primary">Change Username</button>
				<button id="password" type="button" class="btn btn-primary">Change Password</button>
				<button id="email" type="button" class="btn btn-primary">Change Email</button>
				<button id="deleteAccount" type="button" class="btn btn-primary">Delete account</button>
				</div>
				</div>';
			} elseif ($_SESSION["cookieConsent"] == 1) {
				echo '<div class="row">
				<div class=col-sm-6>
					<p>Theme Selection:</p>
					<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Select
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a id="themeClearButton" class="dropdown-item" href="#">Random</a>
						<a id="theme0" class="dropdown-item themeButton" href="#">BUNNY</a>
						<a id="theme1" class="dropdown-item themeButton" href="#">CLOUD</a>
						<a id="theme2" class="dropdown-item themeButton" href="#">FIRE</a>
						<a id="theme3" class="dropdown-item themeButton" href="#">HENRY\'S</a>
						<a id="theme4" class="dropdown-item themeButton" href="#">PIRATEWAVE</a>
						<a id="theme5" class="dropdown-item themeButton" href="#">BEE</a>
					</div>
				</div>
				<div class="col-sm-6">
					<p>Account Options:</p>
					<button id="username" type="button" class="btn btn-primary accountButton">Change Username</button>
					<button id="password" type="button" class="btn btn-primary accountButton">Change Password</button>
					<button id="email" type="button" class="btn btn-primary accountButton">Change Email</button>
					<button id="deleteAccount" type="button" class="btn btn-primary accountButton">Delete account</button>
				</div>
				</div>';
			}
			
			if($_SESSION["isadmin"]) {
				echo '<div class="row">
					<div class="col-sm-12">
						<hr>
						<h3>Super Secret Admin Section:</h3>
						<h4>List of all users:</h4>
						<table>
							<tr>
								<th>Username</th>
								<th>Is an Admin</th>
							</tr>';
				include("scripts/getAllAccounts.php");		
						// Output a table of all users
				echo		'</table>
					</div>
				</div>';
			}
		?>
		
	</div>
</body>
</html>
