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
	<title>Validation</title>
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
<form action="index.php?page=Confirmation" method="post">
	<fieldset>
		<h1>Informations</h1>
		<label>Destination: </label>
			<label> <?php echo $reservation->GetDestination(); ?> </label> </br>
		<label>Nombre de passager(s): </label>
			<label> <?php echo $reservation->GetPlace(); ?> </label> </br>
		<label>Assurance annulation: </label>
			<label> <?php echo $reservation->GetInsurance(); ?> </label>

		<?php 
		echo $_SESSION['dataPass']; 
		?>

	</fieldset>
    <br>
    <input class="btn btn-warning"  type="submit" value="Etape suivante">

    

    
</form>
</div>
<div class="col-lg-6">

<br>
<br>
<form action="index.php?page=Accueil" method="post">
	<input class="btn btn-warning" type="submit" value = "Annuler la réservation" name="Nouvelle_Reservation">
</form>
<br>
<form action ="index.php?page=Passager" method="post"> 
	<input class="btn btn-warning"  type="submit" value = "Retour à la page précédente" name="precedent" >
</form>
<br>
</div>
</div>
  
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
                        <li><i class="fa fa-phone fa-fw"></i>02 420 22 00</li><br>
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