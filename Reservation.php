<?php
if (isset($id))
	$_SESSION['id'] = $id ;
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
				<select name= "destination" required>
					<option value = ""> ----Choisir---- </option>
					<option value = "Marrakech" <?php if($destination == "Marrakech") {echo "selected";} ?> > Marrakech </option>
					<option value = "Tanger" <?php if($destination == "Tanger") {echo "selected";} ?> > Tanger </option>
					<option value ="Londres" <?php if($destination == "Londres") {echo "selected";} ?> > Londres </option>
					<option value = "Malaisie" <?php if($destination == "Malaisie") {echo "selected";} ?> > Malaisie </option>
					<option value ="Chine" <?php if($destination == "Chine") {echo "selected";} ?> > Chine </option>
					<option value = "Canada" <?php if($destination == "Canada") {echo "selected";} ?> > Canada </option>
					<option value ="Hawaï" <?php if($destination == "Hawaï") {echo "selected";} ?> > Hawaï </option>
				</select></br>
			<label>Nombre de places</label>
				<input type="number" name="place" value="<?php echo $place; ?>" min="1" max="11" required> </br> 
			<label> Assurance annulation</label>
				<input type="checkbox" name="insurance" <?php if($insurance === 'OUI') echo "checked" ?> > </br>	
		</fieldset>
		<input type="submit" value="Etape suivante" name="button" />
		<input type="button" value="Annuler la réservation" onclick="location.href='Accueil.php'">  <!--session lost with window.location.href -->
	<FORM/>	

	
</html>