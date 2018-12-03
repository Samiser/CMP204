<?php
	echo '
	<!-- Navbar -->
	<header class="navbar navbar-expand-md bg-dark navbar-dark">
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="info.php">Info</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="music.php">Music</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>';
				
	
	if (isset($_SESSION['Username']) && !empty($_SESSION['Username'])) {
		echo '<li class="nav-item" id="myaccountbutton">
					<a class="nav-link" href="myAccount.php">Account</a>
				</li>';
	} else {
		echo '<li class="nav-item" id="loginbutton">
					<a class="nav-link" href="loginPage.php">Log in</a>
				</li>';
	}
				
	echo 		'<li class="nav-item">
					<a class="nav-link" href="req.php">Requirements</a>
				</li>
			</ul>
		</div>
		
	</header>
	
	<!-- Banner -->
	<div class="jumbotron text-center">
	<h1 id="bannerTitle">Samiser</h1>
		<img id="bannerPic" style="width: 200px"></img>
	</div>';
?>