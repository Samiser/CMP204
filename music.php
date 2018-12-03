<?php
session_start();
?>

<!doctype html>

<html>
<head>
	<title>Samiser</title>
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="scripts/jquery.fittext.js"></script>
	<script src="scripts/player.js"></script>
	<script src="scripts/cookie.js"></script>
	<script src="scripts/randomTheme.js"></script>
</head>
<body>
	<!-- Header -->
	<?php include 'header.php';?>

	<!-- Page Contents -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h3>Music</h3>
				<p>Here is the music. Enjoy.</p>
			</div>
		</div>
		<div id="playerDiv" class="row collapse fade">
			<div class="col-sm-3">
				<img id="playerButton" src="images/play.png"></img>
			</div>
			<div class="col-sm-6" id="player">
				<div id="playerText" class="text-center">TEST</div>
				<div id="playerTime">2:35 / 3:54</div>
				<div id="playerProgressContainer">
					<div id="playerProgress"></div>
				</div>
			</div>
			<div class="col-sm-3">
				<img id="playerCover" src="images/BUNNY.png"></img>
			</div>
		</div>	
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-3">
				<img class="play" src="images/HENRY'S.png" data-songPath="music/HENRY'S.wav"></img>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-3">
				<img class="play"  src="images/PIRATEWAVE.png" data-songPath="music/PIRATEWAVE.wav"></img>
			</div>	
			<div class="col-xs-6 col-sm-6 col-md-3">
				<img class="play"  src="images/BUNNY.png" data-songPath="music/BUNNY.wav"></img>
			</div>	
			<div class="col-xs-6 col-sm-6 col-md-3">	
				<img class="play"  src="images/BEE.png" data-songPath="music/BEE.wav"></img>
			</div>
		</div>	
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-3">	
				<img class="play"  src="images/FIRE.png" data-songPath="music/FIRE.wav"></img>
			</div>	
			<div class="col-xs-6 col-sm-6 col-md-3">	
				<img class="play"  src="images/CLOUD.png" data-songPath="music/CLOUD.wav"></img>
			</div>	
			<div class="col-xs-6 col-sm-6 col-md-3">	
				<img class="play"  src="images/SPACE APPLES.png" data-songPath="music/SPACE APPLES.wav"></img>
			</div>	
			<div class="col-xs-6 col-sm-6 col-md-3">	
				<img class="play"  src="images/TUESDAY.png" data-songPath="music/TUESDAY.wav"></img>
			</div>	
		</div>
	</div>

</body>
</html>
