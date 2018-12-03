$(document).ready(function() {
	let playing = false;
	console.log("ready!");
	let currentSong = new Audio('music/BUNNY.wav');
	let currentSongName = "BUNNY";
	
	$(".play").click(function() {
		// If image clicked is of current song
		if ($(this).attr("data-songPath") === currentSongName) {
			if (playing) {
				stop();
				currentSong.pause();
				$("#playerDiv").collapse("hide");
				$('#playerButton').attr('src', 'images/play.png');
				playing = false;
			} else {
				stop();
				currentSong.play();
				$("#playerDiv").collapse("show");
				$('#playerButton').attr('src', 'images/pause.png');
				playing = true;
				move(currentSong, currentSongName);
			}
		// If image clicked is not of current song
		} else {
			if (playing) {
				currentSong.pause();
			} else {
				playing = true;
			}
			stop();
			$("#playerDiv").collapse("show");
			$("#playerCover").attr("src", $(this).attr("src"));
			$('#playerButton').attr('src', 'images/pause.png');
			currentSongName = $(this).attr("data-songPath");
			currentSong = new Audio($(this).attr("data-songPath"));
			currentSong.play();
			move(currentSong, currentSongName);
		}
	});
	
	$("#playerButton").click(function() {
		if ($('#playerButton').attr('src') == 'images/pause.png') {
			currentSong.pause();
			$('#playerButton').attr('src', 'images/play.png');
		} else {
			currentSong.play();
			$('#playerButton').attr('src', 'images/pause.png');
		}
	});
});

var interval;

function move(song, name) {
interval = setInterval(frame, 10);
	$('#player').css('color', '#000000');
	$('#playerProgress').css('background-color', '#FF6600');
	$('#playerCover').css('opacity', '1');
	$('#playerButton').css('opacity', '1');
	$('#playerProgressContainer').css('border-color', '#000000');
	jQuery("#playerText").fitText(0.8);
	function frame() {
		document.getElementById("playerText").innerHTML = name.slice(6, -4);
		document.getElementById("playerTime").innerHTML = toMinSec(song.currentTime)+" / "+toMinSec(song.duration);
		document.getElementById("playerProgress").style.width = song.currentTime/song.duration*100 + '%';
		if (song.currentTime == song.duration) {
			stop();
		}
	}
}

function stop() {
	clearInterval(interval);
	$('#player').css('color', '#FFFFFFFF');
	$('#playerProgress').css('background-color', '#FFFFFFFF');
	$('#playerCover').css('opacity', '0');
	$('#playerButton').css('opacity', '0');
	$('#playerProgressContainer').css('border-color', '#FFFFFFFF');
}

function toMinSec(seconds) {
	let mins = Math.floor(seconds/60);
	let secs = Math.floor(seconds)%60;
	let add = "";

	if (secs < 10) {
		add = "0";
	}

	return mins+":"+add+secs;
}
