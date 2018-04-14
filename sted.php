<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stiler/stil.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
	integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
	crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
	integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
	crossorigin=""></script>
</head>
<body>
	<?php include("header.php");

	$sted = $_REQUEST['search'];
	$query = "SELECT * FROM sted WHERE navn = '$sted'";
	$resultat = mysqli_query($db, $query);
	$sted = mysqli_fetch_assoc($resultat);

	$navn =$sted['navn'];
	$pris =$sted['pris'];
	$beskrivelse =$sted['beskrivelse'];
	$epost = $sted['epost'];
	?>
	<main>
		<div id="hoved-container">
			<div id="mapid"></div>
			<div class="info"> 
				<form>
					<table>
						<?php if(mysqli_num_rows($resultat) == 1) : ?> 
							<tr><th><?php echo "$navn" ?></th></tr>
							<tr><td><?php echo "Pris for øl:"?></td><td><?php echo "$pris" ?></td></tr>
							<tr><td><?php echo "Beskrivelse:"?></td><td><?php echo "$beskrivelse" ?></td></tr>
							<tr><td><?php echo "Epost:"?></td><td><?php echo "$epost" ?></td></tr>
						<?php endif ?>
						<?php if(mysqli_num_rows($resultat) == 0) : ?>
							<?php echo "fant ikke utested" ?>
						<?php endif ?>
					</table>
				</form>
			</div>
		</div>
	</main>
	<?php include("footer.php"); ?>
	<script src="kart.js"></script>
</body>
</html>

