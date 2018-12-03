function randomTheme() {
	picNames = ["BUNNY.png", "CLOUD.png", "FIRE.png", "HENRY'S.png", "PIRATEWAVE.png", "BEE.png", "SPACE APPLES.png", "TUESDAY.png"]
	
	themes = [["#7ad6c7","#46bda9", "black"], // BUNNY
		 ["#79cce5","#2b94b5", "black"], // CLOUD
		 ["#301616","#521716", "white"], // FIRE
		 ["#e5b585","#8c5e31", "black"], // HENRY'S
		 ["#2be5ef","#dd28e0", "black"], // PIRATEWAVE
		 ["#e8dc04","#560a31", "black"], // BEE
		 ["#223377","#071138", "white"], // SPACE APPLES
		 ["#f9ad09","#f47709", "black"]] // TUESDAY
	
	if (getCookie("themePref")) {
		theme = getCookie("themePref");
	} else {
		theme = Math.floor(Math.random() * picNames.length);
	}

	document.getElementById("bannerPic").src = "images/" + picNames[theme];
	document.getElementById("bannerTitle").style = "color: " + themes[theme][2];
	document.getElementsByClassName("jumbotron")[0].style = "background-color: " + themes[theme][0];
	document.getElementsByTagName("body")[0].style = "background-color: " + themes[theme][1];
}

window.onload = function() {
	randomTheme();
}
