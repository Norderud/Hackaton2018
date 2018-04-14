<?php

if (isset($_SESSION['epost'])) {

  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrering</title>
  <link rel="stylesheet" type="text/css" href="stiler/stil.css">
  <link rel="stylesheet" type="text/css" href="stiler/login_registrer.css">

</head>
<body>
  <?php include("header.php") ?>
  <div id="innhold">
    <div class="header">
      <h1>Registrering</h1>
    </div>

    <form method="post" id="login" action="registrering.php">
     <?php include('errors.php'); ?>
     <div class="input-group"><input placeholder="Fornavn.." class="form-design" type="text" name="fornavn"></div>
     <div class="input-group"><input placeholder="Etternavn.." class="form-design" type="text" name="etternavn"></div>
     <div class="input-group"><input placeholder="Email.." class="form-design" type="email" name="epost"></div>
     <div class="input-group"><input placeholder="Passord.." class="form-design" type="password" name="passord_1"></div>
     <div class="input-group"><input placeholder="Bekreft passord.." class="form-design" type="password" name="passord_2"></div>
     <div class="input-group"><button type="submit" class="btn" name="reg_bruker">Registrer</button></div>
     <p>Allerede medlem? <a href="login.php">Logg inn</a> </p>
   </form>
 </div>  
 <?php include("footer.php") ?>
</body>

</html>