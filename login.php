<?
if (isset($_SESSION['epost'])) {

  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>logg inn</title>
  <link rel="stylesheet" type="text/css" href="stiler/login_registrer.css">
  <link rel="stylesheet" type="text/css" href="stiler/stil.css">
</head>
<body>
 <?php include('header.php'); ?>
 <div id="innhold">
  <div class="header">
    <h1>Logg inn</h1>
  </div>
  <form id="login" method="post" action="login.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Epost</label>
      <input type="email" name="epost" >
    </div>
    <div class="input-group">
      <label>Passord</label>
      <input type="password" name="passord">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_bruker">Logg inn</button>
    </div>
    <p>
      Ikke medlem? <a href="registrering.php">Registrer her</a>
    </p>
  </form>
</div>
<?php include('footer.php'); ?>
</body>

</html>