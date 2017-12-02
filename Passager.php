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
	<title>Passager <?php echo ($reservation->GetLengthPass()+1); ?> </title>
</head>
<body>
	<h1>Passager <?php echo ($reservation->GetLengthPass()+1); ?> </h1>
</body>
<form action="index.php?page=Passager" method="post">
	<fieldset>
		<legend>Vos coordonnées</legend>
		<label>Nom</label>
			<input type="text" name="LastName" required autofocus > </br> </br>
		<label>Prénom</label>
			<input type="text" name="FirstName" required> </br> </br>
		<label>Age</label>
			<input type="number" name="Age" min="1" max="100" required> </br> </br>  <!--Penser à laisser un plus grand espace entre les label et les input pour que tout soit alligné-->
	</fieldset>

	<p> <font color="red"> <?php echo ($Msg_Error); ?> </font></p>

	<input type="submit" value="Etape suivante" name="button2">
	<input type="button" value="Retour à la page précédente" onclick="location.href='Reservation.php'" > 
	<input type="button" value="Annuler la réservation" onclick="location.href='Accueil.php'"> 

</form>
</html>