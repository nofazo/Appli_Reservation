<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
</body>
<form action ="index.php?page=Admin" method="post" > 
<TABLE border="1" cellspacing="0" cellpadding="5">
	<caption>Récapitulatif</caption>

	<tr>
		<th> id</th>   
		<th>Destination</th>
		<th>Assurance</th>
		<th>Total</th>
		<th>Nom-Age</th>
		<th>Editer</th>
		<th>Supprimer</th>
	</tr>

<?php 
$dbname='fazo';
try
{
    $bdd = new PDO('mysql:host=localhost','root','');
        $bdd->query("use $dbname");
}
catch(Exception $e)
{
	 die('Erreur : '.$e->getMessage());
}

$reponse=$bdd->query('SELECT * FROM reservation');

while ($donnees = $reponse->fetch())
{
    $nameArray=explode(",", $donnees['Name']);
    $ageArray=explode(",", $donnees['Age']);

?>
	<tr>
		<td> <?php echo $donnees['id'] ; ?></td>
		<td> <?php echo $donnees['Destination']; ?></td>
		<td> <?php echo $donnees['Insurance']; ?></td>
		<td> <?php echo $donnees['Total']; ?></td>
		<td> 
			<?php 
					
		        for($i=0; $i < count($nameArray); $i++ )
		        {
		            echo $nameArray[$i] . " - " . $ageArray[$i] . "</br>";
		        } 
			?>
		</td>
		<td> <?php echo '<input type="submit" value="Editer" name="Edit'.$donnees['id']. '" >' ; ?></td>
		<td> <?php echo '<input type="submit" value="Supprimer" name="Suppr'.$donnees['id']. '">' ; ?></td>
	</tr>


<?php
}
$reponse->closeCursor(); 
?>

</table>
<br />
    <input type='submit' value='Nouvelle réservation' name='Nouvelle_reservation' onclick="location.href='Accueil.php'">
</form>
</html>