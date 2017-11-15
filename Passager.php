<?php
session_cache_limiter('private_no_expire, must-revalidate');  // pour éviter l'erreur 'la page a expiré' lorsque l'on fait un retour en arrière
if(!isset($_SESSION))
{
	session_start();

}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Passager 1</title>
</head>
<body>
	<h1>Passager 1</h1>

</body>
<form action="Controller.php" method="post">
	<fieldset>
		<legend>Vos coordonnées</legend>
		<label>Nom</label>
			<input type="text" name="Nom"> </br> </br>
		<label>Prénom</label>
			<input type="text" name="Prénom"> </br> </br>
		<label>Age</label>
			<input type="text" name="Age"> </br> </br>  <!--Penser à laisser un plus grand espace entre les label et les input pour que tout soit alligné-->
	</fieldset>

	<input type="submit" value="Etape suivante" name="bouton2">
	<input type="button" value="Retour à la page précédente" onclick='history.go(-1)' > <!-- ou onclick = "window.history.back()"-->
	<input type="button" value="Annuler la réservation" onclick="history.go(-2)">      <!-- on redirigera vers une page d'accueil, se fera comme : <input type="button" value="Accueil" OnClick="window.location.href=\'http://www..." />, sinon avec form -->

</form>


</html>