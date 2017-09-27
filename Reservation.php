<html>
	<head>
	<title>Réservation</title>
	</head>
	<body>
	 <h1> Nouvelle réservation </h1>
 	 <p>Le prix de la place est de 10 euros jusqu'à 12 ans et ensuite de 15 euros. </br> Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>
	</body>
	<!--Formulaire qui va appeler Passenger.php en cliquant sur Etape suivante-->
	<FORM action ="InfoReservation.php" method="post">
		<fieldset>
			<legend>Veuillez saisir les informations</legend>
			<label>Destination</label>
				<select name= "Destination">
					<option value = ""> ----Choisir---- </option>
					<option value = "Belgique"> Bruxelles </option>
					<option value = "Maroc"> Marrakech </option>
					<option value = "Maroc"> Tanger </option>
					<option value ="Royaume-Uni"> Londres </option>
				</select></br>
			<label>Nombre de places</label>
				<input type="text" name="name" > </br>
			<label> Assurance annulation</label>
				<input type="checkbox" ></br>	
		</fieldset>
		<input type="submit" value="Etape suivante">
		<input type="reset" value="Annuler la réservation">
	<FORM/>	
</html>