function login(form) {
    var un = form.Username.value;
    var pw = form.Password.value;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("post", "Login", true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//php login with data
        }
    }
}