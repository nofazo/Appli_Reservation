<?php
if(!isset($_SESSION)) 
{
	session_start();
}
?>

<html>
	<head>
	<title>Réservation</title>
	</head>
	<body>
	 <h1> Nouvelle réservation </h1>
 	 <p>Réduction de -50% pour les voyageurs de moins de 12 ans. </br> Le prix de l'assurance annulation est de 30 euros quel que soit le nombre de voyageurs.</p>
	</body>
	<FORM action ="index.php?page=Reservation" method="post" >
		<fieldset>
			<legend>Veuillez saisir les informations</legend>
			<label>Destination</label>
				<select name= "destination">
					<option value = ""> ----Choisir---- </option>
					<option value = "Marrakech"> Marrakech </option>
					<option value = "Tanger"> Tanger </option>
					<option value ="Londres"> Londres </option>
					<option value = "Malaisie"> Malaisie </option>
					<option value ="Chine"> Chine </option>
					<option value = "Canada"> Canada </option>
					<option value ="Hawaï"> Hawaï </option>
				</select></br>
			<label>Nombre de places</label>
				<input type="text" name="place" > </br>
			<label> Assurance annulation</label>
				<input type="checkbox" name="insurance" ></br>	
		</fieldset>
		<input type="submit" value="Etape suivante" name="button" />
		<input type="button" value="Annuler la réservation" onclick="location.href='Accueil.php'">  <!--session lost with window.location.href -->
	<FORM/>	

	
</html>