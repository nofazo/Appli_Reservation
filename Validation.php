<?php
if(!isset($_SESSION))
{	
	session_start();

	
	if (isset($_POST['bouton2']))
	{
		$_SESSION['Nom'] = $_POST['Nom'];
		$_SESSION['Prénom'] = $_POST['Prénom'];
		$_SESSION['Age'] = $_POST['Age'];

	}
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
			<label> <?php echo htmlspecialchars($_SESSION['Nom']); ?> </label> </br>
		<label>Prénom: </label>
			<label> <?php echo htmlspecialchars($_SESSION['Prénom']); ?> </label> </br>
		<label>Age: </label>
			<label> <?php echo htmlspecialchars($_SESSION['Age']); ?> </label> </br>
		<label>Destination: </label>
			<label> <?php echo $_SESSION['destination']; ?> </label> </br>
		<label>Nombre de passager(s): </label>
			<label> <?php echo $_SESSION['place']; ?> </label> </br>
		<label>Assurance annulation: </label>
			<label>
				<?php 
				 	if ($_SESSION['assurance'] === "checked")
						echo "OUI";
					else
						echo "NON";
				   ?>
			</label>

		
	</fieldset>
	
</form>
</body>
</html>