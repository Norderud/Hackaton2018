<?php
session_start();
if (isset($_GET['loggut'])) {
	session_destroy();
	unset($_SESSION['epost']);
	header("location: index.php");
}

// variabler
$epost = "";
$errors = array();

// koble opp database
$db = mysqli_connect('localhost', 'root', '', 'kart'); //legger til databasen

// registrer bruker
if (isset($_POST['reg_bruker'])) {
  // hent tekst fra skjema
	$fornavn = mysqli_real_escape_string($db, $_POST['fornavn']);
	$etternavn = mysqli_real_escape_string($db, $_POST['etternavn']);
	$epost = mysqli_real_escape_string($db, $_POST['epost']);
	$passord_1 = mysqli_real_escape_string($db, $_POST['passord_1']);
	$passord_2 = mysqli_real_escape_string($db, $_POST['passord_2']);
	$stedsnavn = mysqli_real_escape_string($db, $_post['search']);

	if (empty($fornavn)) {
		array_push($errors, "*Fornavn må fylles ut");
	}
	if (empty($etternavn)) {
		array_push($errors, "*Etternavn må fylles ut");
	}
	if (empty($epost)) {
		array_push($errors, "*Epost må fylles ut");
	}
	if (empty($passord_1)) {
		array_push($errors, "*Passord må fylles ut");
	}

	if ($passord_1 != $passord_2) {
		array_push($errors, "*Passordene er ikke like ");
	}

	$bruker_sjekk = "SELECT * FROM bruker WHERE epost='$epost' LIMIT 1";
	$resultat = mysqli_query($db, $bruker_sjekk);
	$bruker = mysqli_fetch_assoc($resultat);

  if ($bruker) { // hvis bruker finnes
  	if ($bruker['epost'] === $epost) { 
  		array_push($errors, "*Epost finnes allerede");
  	}

  }

  if (count($errors) == 0) { //Hvis det ikke er noen feil
    $passord = md5($passord_1); // krypter passord
    $query = "INSERT INTO bruker (fornavn, etternavn,epost,passord )
    VALUES('$fornavn','$etternavn','$epost','$passord')";
    mysqli_query($db, $query);
    $_SESSION['epost'] = $epost;
    header('location: index.php');
}
}
  // Logg inn
if (isset($_POST['login_bruker'])) {
	$epost = mysqli_real_escape_string($db, $_POST['epost']);
	$passord = mysqli_real_escape_string($db, $_POST['passord']);

	if (empty($epost)) {
		array_push($errors, "*Oppgi epost");
	}
	if (empty($passord)) {
		array_push($errors, "*Oppgi passord");
	}

	if (count($errors) == 0) {
    $passord = md5($passord); // krypterer passord før den sjekker med databasen
    $query = "SELECT * FROM bruker WHERE epost='$epost' AND passord='$passord'";
    $results = mysqli_query($db, $query);
    $bruker = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
    	$_SESSION['epost'] = $epost;
    	$_SESSION['success'] = "Du er nå logget inn";
    	header('location: index.php');
    }else{
    	array_push($errors, "*Feil Brukernavn/passord");
    }
}
	//søk
	$query = "SELECT navn FROM sted WHERE navn='$sted'";
    $results = mysqli_query($db, $query);
    $sted = mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
    	header('location: stedsnavn.php');
}
}
