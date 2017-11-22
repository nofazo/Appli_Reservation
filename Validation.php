<?php
if(!isset($_SESSION))
{	
	session_start();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
</head>
<body>
<form action="Confirmation.php" method="post">
	<fieldset>
		<legend>informations</legend>
		<label>Nom: </label>
			<label> <?php echo htmlspecialchars($_SESSION['LastName']); ?> </label> </br>
		<label>Prénom: </label>
			<label> <?php echo htmlspecialchars($_SESSION['FirstName']); ?> </label> </br>
		<label>Age: </label>
			<label> <?php echo htmlspecialchars($_SESSION['Age']); ?> </label> </br>
		<label>Destination: </label>
			<label> <?php echo $_SESSION['destination']; ?> </label> </br>
		<label>Nombre de passager(s): </label>
			<label> <?php echo $_SESSION['place']; ?> </label> </br>
		<label>Assurance annulation: </label>
			<label>
				<?php 
				 	if ($_SESSION['insurance'] === "checked")
						echo "OUI";
					else
						echo "NON";
				   ?>
			</label>

		
	</fieldset>

	<input type="submit" value="Etape suivante">
	<input type="button" value = "Modifier ma réservation" name="modification" onclick="history.go(-1)">
</form>
</body>
</html>