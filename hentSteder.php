<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'kart'); //legger til databasen
$i=0; 
$query = mysqli_query($db, "SELECT navn, lengdegrad, breddegrad, pris , beskrivelse, epost FROM sted; ");

//Lager en javascript string som skal evalueres i kart.js
while($rad=mysqli_fetch_array($query)){               
    echo "stedTabell[".$i."]={navn:'".$rad['navn']."', pris: ".$rad['pris'].", lat: ".$rad['breddegrad'].", lng: ".$rad['lengdegrad'].", beskrivelse: '".$rad['beskrivelse']."', epost: '".$rad['epost']."'}; ";
    $i++;  
}
?>