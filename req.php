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
	
	<!-- Info -->
	<div class="container">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h3>Requirements</h3>
				<ul class="reqs">
					<li>A clear use of HTML5</li>
						<p>HTML5 is clearly used on every page, as can be seen by the doctype declarations.</p>
					<li>Use of the Bootstrap framework providing a responsive layout</li>
						<p>Bootstrap is also used throughout but can be seen especially on the music page with the images resizing dynamically.</p>
					<li>Use of JavaScript to manipulate the DOM based on an event</li>
						<p>In scripts/player.js on line 64:</p>
						<code>document.getElementById("playerText").innerHTML = name.slice(6, -4);</code>
						<p>Here the DOM is updated with the name of the currently playing song when a song is played by the user.</p>
					<li>JavaScript loading of dynamically changing information</li>
						<p>In scripts/player.js on line 65:</p>
						<code>document.getElementById("playerProgress").style.width = song.currentTime/song.duration*100 + '%';</code>
						<p>Here the progress bar (a div) has it's width repeatedly updated with the progress through the currently playing song.</p>
					<li>Use of jQuery in conjunction with the DOM</li>
						<p>In scripts/player.js on lines 19 and 20:</p>
						<code>$("#playerDiv").collapse("show");</code>
						<code>$('#playerButton').attr('src', 'images/pause.png');</code>
						<p>Here jQuery is used to toggle the collapsing of the music player interface and change the play/pause image.</p>
					<li>Use of a jQuery plugin to enhance your application</li>
						<p>A few jQuery plugins were used but the most useful was fitText</p>
						<p>In scripts/player.js on line 62:</p>
						<code>jQuery("#playerText").fitText(0.8);</code>
						<p>Plugin at scripts/jquery.fittext.js.</p>
						<p>This plugin was used to set the title text of the music player correctly so that it's fluid and responsive. An unexpectedly difficult task.</p>
					<li>Use of AJAX (pure JavaScript i.e. without the use of a library)</li>
						<p>Pure javascript AJAX was used to update the database when the user enters new account information using the buttons on the myAccount.php page</p>
						<p>The most interesting instance is probably when the user updates their username</p>
						<p>The users username is updated in the database and in the <code>$_SESSION['Username']</code> variable and the new username is immediately displayed on the page all using AJAX</p>
						<p>The AJAX code for this is on lines 47 to 64 in scripts/buttons.js</p>
						<p>You can see there's some jQuery in amongst the AJAX code but that's only to reference DOM elements, all of the AJAX is pure Javascript</p>
					<li>Use of the jQuery AJAX function</li>
						<p>jQuery's AJAX function is used when the user chooses to accept cookies or not on the myAccount.php page</p>
						<p>The code is in scripts/buttons.js from line 3 to line 21</p>
					<li>Use of cookies</li>
						<p>Cookies are used to store the user's theme preference</p>
						<p>Cookie is set in scripts/button.js on line 29</p>	
						<code>setCookie("themePref", this.id.slice(-1));</code>
						<p>And then retrieved in scripts/randomTheme.js on line 14</p>
						<code>theme = getCookie("themePref");</code>
					<li>User login functionality (PHP/MySQL)</li>
						<p>Logging in implemented in loginPage.php and login.php ("Log In" on navbar) which is only visible if logged out.</p>
						<p>Users may also log out from the myAccount.php page ("Account" on navbar) which is only visible if logged in.</p>
					<li>Admin section of the website (PHP/MySQL)</li>
						<p>The database has a boolean column <code>isadmin</code> which keeps track of whether a user is an admin or not</p>
						<p>The admin section of the website is on the myAccount page but is only shown if the user is an admin</p>
						<p>I have emailed you (Lynsay) some admin credentials so you can log in and see the admin section</p>
						<p>The code for this is in a few places</p>
						<p>Firstly in login.php on line 45:</p> 
						<code>$_SESSION["isadmin"] = $data["isadmin"]</code>
						<p>The user's admin status is stored in an enviroment variable when they log in</p>
						<p>Then there's lines 111 to 127 of myAccount.php which contain the actual section, the crucial lines being line 111:</p>
						<code>if($_SESSION["isadmin"]) {</code>
						<p>(so that it only is present if the current user is an admin) and line 122:</p>
						<code>include("scripts/getAllAccounts.php");</code>
						<p>scripts/getAllAccounts.php just returns a list of usernames and their admin statuses in html table rows</p>
					<li>Ability to select, add, edit and delete information from a database (PHP/MySQL)</li>
						<p>Selecting from a database is used in the admin section of the website</p>
						<p>The code for this is in scripts/getAllAccounts.php</p>
						<p>For adding to a database, anyone is able to create an account which adds a row to the database</p>
						<p>The code for creating an account is in registerPage.php and register.php which can be reached through the sign up link in loginPage.php.</p>
						<p>The user is able to edit their account information from the myAccount.php page</p>
						<p>The code for this is in two files:</p>
						<p>scripts/buttons.js from line 47 to 64, the key line being line 58:</p>
						<code>xhttp.open("GET", "scripts/dbupdate.php?col="+accountChangeCol+"&val="+$(modalValue).val(), true);</code>
						<p>And scripts/dbupdate.php where the whole file is relevant so line numbers aren't necessary</p>
						<p>Finally, the user may also delete their account, demonstrating deleting information from a database</p>
						<p>The code for this is in accountDelete.php</p>
					<li>Appropriate consideration of relevant laws</li>
						<p>EU's cookie law compliance:</p>
						<p>The user is able to consent to or refuse advertising cookies.</p>
						<p>There are no adverts running on the site but this would allow there to be ads for consenting users</p>
						<p>GDPR compliance:</p>
						<p>The only piece of personal information stored on the site is the user's email</p>
						<p>The reason for storing the user's email is clearly stated on the registration page</p>
						<p>The user may choose to delete their account which will also remove all of their personal information (their email) from the database</p>
					<li>Security measures</li>
					<ul class="reqs">
						<li>SQL queries should be written as prepared statements</li>
							<p>All of the queries with user input are prepared statements</p>
							<p>I used PDO for all of the sql</p>
							<p>Here's an example of a prepared statement from register.php on line 41</p>
							<code>$stmt = $conn->prepare("SELECT * FROM users WHERE username=:user");</code>
							<p>And then here the parameters are bound on line 42</p>
							<code>$stmt->bindParam(":user", $_POST['Username'], PDO::PARAM_STR);</code>
						<li>Passwords should be salted and hashed</li>
							<p>The php function password_hash generates a salted and hashed password</p>
							<p>It is implemented in register.php on line 35:</p>
							<code>$hash = password_hash($_POST['Password'], PASSWORD_BCRYPT);</code>
							<p>The hash is then stored in the users database</p>
						<li>Validation of user input</li>
							<p>User input is validated most when a user signs up for a new account</p>
							<p>The relevant code for this is in register.php from line 46 to line 54</p>
						<li>Any other relevant security features</li>
							<p>Using php sessions to keep track of a user's username and admin status is an important security decision</p>
							<p>It makes it very difficult to spoof another user from the client side since the session tracking is done server side</p>
					</ul>
				</ul>
			</div>
			<div class="col-sm-1">
			</div>
		</div>
	</div>
</body>
</html>
