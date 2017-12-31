<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<title>tableau</title>
</head>
<body>
	<header id="top" class="header">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

<br>
		<br>
		<br>
		<br>
		<br>


<br>
	
<div class="col-lg-12">
	<div class="col-lg-4">

	</div>
		 <div class="col-lg-8">
        <div class="text-vertical-center">
        	<form action ="index.php?page=Admin" method="post" > 
        		<div class="table-responsive">
 
<TABLE class="table table-striped" >
	<h2>Récapitulatif</h2>
 <thead class="thead-inverse">
	<tr>
		<th class="bg-warning"> id</th>   
		<th class="bg-warning">Destination</th>
		<th class="bg-warning">Assurance</th>
		<th class="bg-warning">Total</th>
		<th class="bg-warning">Nom-Age</th>
		<th class="bg-warning">Editer</th>
		<th class="bg-warning">Supprimer</th>
	</tr>
</thead>
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
		<td class="bg-warning"> <?php echo $donnees['id'] ; ?></td>
		<td class="bg-warning"> <?php echo $donnees['Destination']; ?></td>
		<td class="bg-warning"> <?php echo $donnees['Insurance']; ?></td>
		<td class="bg-warning"> <?php echo $donnees['Total']; ?></td>
		<td class="bg-warning"> 
			<?php 
					
		        for($i=0; $i < count($nameArray); $i++ )
		        {
		            echo $nameArray[$i] . " - " . $ageArray[$i] . "</br>";
		        } 
			?>
		</td>
		<td class="bg-warning"> <?php echo '<input class="btn btn-success" type="submit" value="Editer" name="Edit'.$donnees['id']. '" >' ; ?></td>
		<td class="bg-warning"> <?php echo '<input class="btn btn-warning" type="submit" value="Supprimer" name="Suppr'.$donnees['id']. '">' ; ?></td>
	</tr>


<?php
}
$reponse->closeCursor(); 
?>

</table>
</div>
</form>
<form action ="index.php?page=Accueil" method="post" >
    <input type='submit' class="btn btn-primary" value='Nouvelle réservation' name='Nouvelle_Reservation'>
</form>
</div>
</div>
</div>
</div>
</header>
</body>

</html>