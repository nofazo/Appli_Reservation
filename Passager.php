<?php
if(!isset($_SESSION))
{
	session_start();
	$reservation = unserialize($_SESSION['reservation']);
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Passager <?php echo ($_SESSION['LengthPass']); ?> </title>
</head>
<body>
	<h1>Passager <?php echo ($_SESSION['LengthPass']); ?> </h1>
</body>
<form action="index.php?page=Passager" method="post">
	<fieldset>
		<legend>Vos coordonnées</legend>
		<label>Nom</label>
			<input type="text" name="LastName" value="<?php echo $LastName; ?>" required autofocus > </br> </br>
		<label>Prénom</label>
			<input type="text" name="FirstName" value="<?php echo $FirstName; ?>" required> </br> </br>
		<label>Age</label>
			<input type="number" name="Age" value="<?php echo $Age; ?>" min="1" max="100" required> </br> </br>  <!--Penser à laisser un plus grand espace entre les label et les input pour que tout soit alligné-->
	</fieldset>

	<p> <font color="red"> <?php echo ($Msg_Error); ?> </font></p>

	<input type="submit" value="Etape suivante" name="button2">
	<input type="button" value="Annuler la réservation" onclick="location.href='Accueil.php'">
</form>
<form action="index.php?page=Reservation" method="post">
	<input type="submit" value="Retour à la page précédente" name="precedent" > 
</form>
</html>