<!DOCTYPE html>
<html>
<head>
	<title>Øl kart</title>
	<link rel="stylesheet" type="text/css" href="stiler/stil.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
	integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
</head>
<body>
	<?php include("header.php"); ?>
	<main>
		<div id="hoved-container">
			<div id="mapid"></div>
			<?php if(isset($_SESSION['epost'])) : ?>
				<div class="info">
					<form>
						<table>
							<th>Legg til sted:</th> 
							<tr><td>Stedsnavn: </td><td><input type="text" name="" id="stednavn"></td></tr>
							<tr><td>Pris for øl: </td><td><input type="text" name="" id="pris"></td></tr>
							<tr><td>Beskrivelse: </td><td><input type="text" name="" id="beskrivelse"></td></tr>
							<tr><td><button type="button" onclick="lagreSted()">Legg til Sted</button></td></tr>
							<td><i id="feilmelding"></i></td>
						</table>
					</form>
				</div>
			<?php endif ?>
			<?php if(!isset($_SESSION['epost'])) : ?>
				<h3> Logg inn for å legge til steder!</h3>
			<?php endif ?>
		</div>
	</main>
	<?php include("footer.php"); ?>
	<script src="kart.js"></script>
</body>
</html>