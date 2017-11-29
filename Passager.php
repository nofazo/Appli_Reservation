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
			<input type="text" name="LastName"> </br> </br>
		<label>Prénom</label>
			<input type="text" name="FirstName"> </br> </br>
		<label>Age</label>
			<input type="text" name="Age"> </br> </br>  <!--Penser à laisser un plus grand espace entre les label et les input pour que tout soit alligné-->
	</fieldset>

	<input type="submit" value="Etape suivante" name="button2">
	<input type="button" value="Retour à la page précédente" onclick="location.href='Reservation.php'" > 
	<input type="button" value="Annuler la réservation" onclick="location.href='Accueil.php'"> 

</form>


</html>