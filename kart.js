//Javascript for øl-kart
var mymap = L.map('mapid').setView([59.91, 10.73], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	maxZoom: 18,
	attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
	'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
	'Imagery © <a href="http://mapbox.com">Mapbox</a>',
	id: 'mapbox.streets'
}).addTo(mymap);

//Deklarer stedTabell som henter data fra databasen
var stedTabell = [];
oppstart();

//Henter data
function oppstart(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			eval(xmlhttp.responseText);
			tegnMarkers();
		}
	}
	xmlhttp.open("GET", "hentSteder.php", true);
	xmlhttp.send();
}
function tegnMarkers(){
	for (var i = 0; i < stedTabell.length; i++){
		var marker = L.marker([stedTabell[i].lng, stedTabell[i].lat]).addTo(mymap);
		var info = "<h3><a href=sted.php?search="+stedTabell[i].navn+">" + stedTabell[i].navn +"</a></h3>" +
		"Pris: " + stedTabell[i].pris + "<br>" +
		"Beskrivelse: " + stedTabell[i].beskrivelse + "<br>" +
		"Epost: " + stedTabell[i].epost;
		marker.bindPopup(info);
	}
}
//Deklarerer marker utenfor så den kan fjernes hvis den allerede eksisterer
var marker;
function onMapClick(e) {
	if(marker != null){
		mymap.removeLayer(marker);
	}
	marker = L.marker(e.latlng).addTo(mymap);
	mymap.addLayer(marker);
}
// Lagrer valgt sted med navn, beskrivelse, pris osv..
function lagreSted(){
	if(marker == null){
		document.getElementById("feilmelding").innerHTML = "Du må velge et sted!"
		return;
	}
	var lat = marker._latlng.lat;
	var lng = marker._latlng.lng;
	var stednavn = document.getElementById("stednavn").value;
	var pris = document.getElementById("pris").value;
	var beskrivelse = document.getElementById("beskrivelse").value;

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			document.getElementById("feilmelding").innerHTML = this.responseText;
		}	
	}
	//Sender dataene til php-scriptet
	var adresse = "lat="+lat+"&lng="+lng+"&sted="+stednavn+"&pris="+pris+"&beskrivelse=" + beskrivelse;
	xmlhttp.open('POST', "lagreSted.php?"+adresse, true);
	xmlhttp.send();
	console.log("hei");
	oppstart();
}
mymap.on('click', onMapClick);