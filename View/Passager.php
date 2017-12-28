<?php
$reservation = unserialize($_SESSION['reservation']);
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
			<input type="number" name="Age" value="<?php echo $Age; ?>" min="1" max="100" required> </br> </br>
	</fieldset>

	<p> <font color="red"> <?php echo ($Msg_Error); ?> </font></p>

	<input type="submit" value="Etape suivante" name="button2">
</form>
<form action="index.php?page=Accueil" method="post">
	<input type="submit" value="Annuler la réservation" name="Nouvelle_Reservation">
</form>
<form action="index.php?page=Reservation" method="post">
	<input type="submit" value="Retour à la page précédente" name="precedent" >
</form>
</html>