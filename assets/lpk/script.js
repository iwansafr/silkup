$(document).ready(function(){
	function getLocation() {
	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(showPosition);
	  } else { 
	    alert("browser anda tidak mendukung untuk menangkap lokasi anda");
	  }
	}

	function showPosition(position) {
		$("#form_1").find(".panel-body").append("<label>LOKASI</label><br>Latitude: " + position.coords.latitude + 
	  "<br>Longitude: " + position.coords.longitude+"<input type='hidden' name='longitude' value='"+position.coords.longitude+"'><input type='hidden' name='latitude' value='"+position.coords.latitude+"'>");
	}
	getLocation();
});