
$(document).ready(function() {
	$('#cookieYes').click(function() {
		$.post('scripts/cookieChoice.php',
		{
            		choice: 1
		},
        	function(data, status){
			console.log(status);
		});
	});

	$('#cookieNo').click(function() {
		$.post('scripts/cookieChoice.php',
		{
            		choice: 0
		},
		function(data, status){
			console.log(status);
		});
	});

	$('#themeClearButton').click(function() {
		$('#themeAlert').collapse('show');
		deleteCookie("themePref");
	});

	$('.themeButton').click(function() {
		$('#themeAlert').collapse('show');
		setCookie("themePref", this.id.slice(-1));
	});

	var accountChangeCol = "";
	
	$('.accountButton').click(function() {
		$('#accountModal').modal("show");
		$('#modalSave').attr("style","");
		if ($(this).attr("id") == "deleteAccount") {	
			$('.modal-body').html("<p>Are you sure you want to delete your account?</p>");	
		} else {
			$('.modal-body').html("<p>Enter new value.</p><input id='modalValue'></input>");
		}
		$('.modal-title').html($(this).html());
		accountChangeCol = $(this).attr("id");
	})

	$('#modalSave').click(function() {
		if (accountChangeCol === "deleteAccount") {
			window.location = "accountDelete.php";
		} else {
			$(this).attr('style','display: none');
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('modalContent')[0].innerHTML = this.responseText;
				}
			};
  			xhttp.open("GET", "scripts/dbupdate.php?col="+accountChangeCol+"&val="+$(modalValue).val(), true);
  			xhttp.send();
			if (accountChangeCol == "username") {
				$('#welcomeHeader').html("Welcome " + $(modalValue).val());
			}
		}
	});
});
