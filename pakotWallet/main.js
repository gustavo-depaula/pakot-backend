var PATH = 'https://pakot-backend.herokuapp.com/public/';

function fillUser(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var user = document.getElementById("users"); 
			var options = JSON.parse(this.responseText);
			for(var i = 0; i < options.length; i++) {
				var opt = options[i];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = opt;
				user.appendChild(el);
			}
		}
	};
	xhttp.open("POST",PATH + "User/emails", true);
	xhttp.send();
}

function fillDeliveryMan(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var user = document.getElementById("deliveryMan"); 
			var options = JSON.parse(this.responseText);
			for(var i = 0; i < options.length; i++) {
				var opt = options[i];
				var el = document.createElement("option");
				el.textContent = opt;
				el.value = opt;
				user.appendChild(el);
			}
		}
	};
	xhttp.open("POST",PATH + "DeliveryMan/emails", true);
	xhttp.send();
}

function walletUser(){
	var value = document.getElementById('valueUser').value;
	var email = document.getElementById("users").options[document.getElementById("users").selectedIndex].value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xhttp.open("POST",PATH + "User/updateWallet", true);
	xhttp.setRequestHeader("Content-Type", "application/json");
	xhttp.send(JSON.stringify({email:email,value:value}));
}

function walletDeliveryMan(){
	var value = document.getElementById('valueDeliveryMan').value;
	var email = document.getElementById("deliveryMan").options[document.getElementById("deliveryMan").selectedIndex].value;

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xhttp.open("POST",PATH + "DeliveryMan/updateWallet", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("email=" + email + "&value=" + value);
}