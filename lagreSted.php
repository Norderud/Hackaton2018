<?php
session_start();
// koble opp database
$db = mysqli_connect('localhost', 'root', '', 'kart'); //legger til databasen
//Henter variabler
$sted = $_REQUEST["sted"];
$lat = $_REQUEST["lat"];
$lng = $_REQUEST["lng"];
$pris = $_REQUEST["pris"];
$beskrivelse = $_REQUEST["beskrivelse"];
$epost = $_SESSION['epost'];

//Lager SQL-spørring
$query = 	"INSERT INTO sted (navn, lengdegrad, breddegrad, pris, beskrivelse, epost) 
			VALUES ('$sted', '$lat', '$lng', '$pris', '$beskrivelse', '$epost')";
if(!mysqli_query($db, $query)){
	echo("Error: " . mysql_error($db));
} else {
	echo "Velykket!";
}

?>