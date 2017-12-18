<?php

$reservation = unserialize($_SESSION['reservation']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
</head>
<body>
<form action="index.php?page=Confirmation" method="post">
	<fieldset>
		<legend>informations</legend>
		<label>Destination: </label>
			<label> <?php echo $reservation->GetDestination(); ?> </label> </br>
		<label>Nombre de passager(s): </label>
			<label> <?php echo $reservation->GetPlace(); ?> </label> </br>
		<label>Assurance annulation: </label>
			<label> <?php echo $reservation->GetInsurance(); ?> </label>

		<?php 
		echo $_SESSION['dataPass']; 
		?>

	</fieldset>

	<input type="submit" value="Etape suivante">
	<input type="button" value = "annuler la réservation" name="annulation" onclick="location.href='Accueil.php'">
</form>

<form action ="index.php?page=Passager" method="post"> 
	<input type="submit" value = "retour à la page précédente" name="precedent" >
</form>

</body>
</html>