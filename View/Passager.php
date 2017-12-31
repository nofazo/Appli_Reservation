<?php
$reservation = unserialize($_SESSION['reservation']);
?>

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

	<title>Passager <?php echo ($_SESSION['LengthPass']); ?> </title>
</head>
<body>
	<aside class="callout">
        <div class="text-vertical-center">
            
        </div>
    </aside>

    <section id="services" class="services bg-primary">
        <div class="container">
            
            	 <div class="col-lg-12">
            	 	 <div class="col-lg-6">
	<h1>Passager <?php echo ($_SESSION['LengthPass']); ?> </h1>
<form action="index.php?page=Passager" method="post">
	<fieldset>
		<legend>Vos coordonnées</legend>
		<label>Nom</label>
			<input class="form-control" type="text" name="LastName" value="<?php echo $LastName; ?>" required autofocus > </br> </br>
		<label>Prénom</label>
			<input  class="form-control" type="text" name="FirstName" value="<?php echo $FirstName; ?>" required> </br> </br>
		<label>Age</label>
			<input  class="form-control" type="number" name="Age" value="<?php echo $Age; ?>" min="1" max="100" required> </br> </br>
	</fieldset>
<input type="submit"  class="btn btn-warning" value="Etape suivante" name="button2">
	<p> <font color="red"> <?php echo ($Msg_Error); ?> </font></p>
	
</form>
</div>
      <div class="col-lg-6">
      	<br>
      	<br>
      	<br>
	
<br>
<br>
<form action="index.php?page=Accueil" method="post">
	<input class="btn btn-warning" type="submit" value="Annuler la réservation" name="Nouvelle_Reservation">
</form>

<br>
<form action="index.php?page=Reservation" method="post">
	<input class="btn btn-warning"  type="submit" value="Retour à la page précédente" name="precedent" >
</form>
<br>
</div>
      </div>
            <!-- /.row -->
       </div>
   </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>AirBoeing </strong>
                    </h4>
                    <BR>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>  02 420 22 00</li><br>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">info@AirBoeing.com</a>
                        </li>

                    </ul>
                    <br>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright 2018</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>
</body>

</html>