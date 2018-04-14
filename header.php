
<?php include("server.php"); ?>
<?php  if (isset($_SESSION['epost'])) : ?>
	<nav>
		<ul>
			<li><a href='server.php?loggut=1'">Logg ut</a></li>
			<li><a href='index.php'">Hjem</a></li>
			<form class="example" action="sted.php">
				<input type="text" placeholder="Search.." name="search">
				<button type="submit"><i class="search">Søk</i></button>
			</form>
		</ul>
	</nav>
<?php endif ?>
<?php  if (!isset($_SESSION['epost'])) : ?>
	<nav>
		<ul>			
			<li><a href='registrering.php'">Registrer</a></li>
			<li><a href='login.php'">Logg inn</a></li>
			<li><a href='index.php'">Hjem</a></li>
			<form class="example" action="sted.php">
				<input type="text" placeholder="Search.." name="search">
				<button type="submit"><i class="search">Søk</i></button>
			</form>
		</ul>
	</nav>
<?php endif ?>


