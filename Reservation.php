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
 	 <p>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros. </br> Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>
	</body>
	<FORM action ="index.php?page=Reservation" method="post" >
		<fieldset>
			<legend>Veuillez saisir les informations</legend>
			<label>Destination</label>
				<select name= "destination">
					<option value = ""> ----Choisir---- </option>
					<option value = "Belgique"> Bruxelles </option>
					<option value = "Maroc"> Marrakech </option>
					<option value = "Maroc"> Tanger </option>
					<option value ="Royaume-Uni"> Londres </option>
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