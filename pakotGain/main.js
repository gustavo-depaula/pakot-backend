var PATH = 'https://pakot-backend.herokuapp.com/public/';


function animate(val){
	$('#money').each(function () {
	  var $this = $(this);
	  jQuery({ Counter: 0 }).animate({ Counter: val }, {
	    duration: 3500,
	    easing: 'swing',
	    step: function () {
	      $this.text("R$" + Math.ceil(this.Counter));
	    }
	  });
	});
}
function getAmount(){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(parseInt(this.responseText));
			animate(parseInt(this.responseText));
		}
	};
	xhttp.open("GET",PATH + "pakotGains", true);
	xhttp.send();
}