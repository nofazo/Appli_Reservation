<?php
if (isset($id))
	$_SESSION['id'] = $id ;
?>

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

	<title>Réservation</title>
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
	 <h1> Nouvelle réservation </h1>
 	 <p>Réduction de -50% pour les voyageurs de moins de 12 ans. </br> Le prix de l'assurance annulation est de 30 euros quel que soit le nombre de voyageurs.</p>
 	 <p>Tarifs (par personne): </br> Marrakech : 320 euros Tanger: 270 euros Londres : 100 euros Malaisie: 450 euros Chine: 500 euros Canada: 600 euros Hawaï: 700 euros </p>
    </div>
    <div class="col-lg-6">
 	 	<form action ="index.php?page=Reservation" method="post" >
		<fieldset>
			<h1>Veuillez saisir les informations</h1>
			<label>Destination</label>
				<select class="btn btn-warning" name= "destination" required>
					<option class="btn btn-warning"  value = ""> ----Choisir---- </option>
					<option value = "Marrakech" <?php if($destination == "Marrakech") {echo "selected";} ?> > Marrakech </option>
					<option value = "Tanger" <?php if($destination == "Tanger") {echo "selected";} ?> > Tanger </option>
					<option value ="Londres" <?php if($destination == "Londres") {echo "selected";} ?> > Londres </option>
					<option value = "Malaisie" <?php if($destination == "Malaisie") {echo "selected";} ?> > Malaisie </option>
					<option value ="Chine" <?php if($destination == "Chine") {echo "selected";} ?> > Chine </option>
					<option value = "Canada" <?php if($destination == "Canada") {echo "selected";} ?> > Canada </option>
					<option value ="Hawaï" <?php if($destination == "Hawaï") {echo "selected";} ?> > Hawaï </option>
				</select></br>
			<label>Nombre de places</label>
				<input class="btn btn-warning" type="number" name="place" value="<?php echo $place; ?>" min="1" max="11" required>
				 </br> 
			<label> Assurance annulation</label>
				<input class="btn btn-warning" type="checkbox" name="insurance" <?php if($insurance === 'OUI') echo "checked" ?> > </br>	
		</fieldset>
		<input class="btn btn-warning" type="submit" value="Etape suivante" name="button">
	</form>
	<form action ="index.php?page=Accueil" method="post" >
		<input class="btn btn-warning" type="submit" value="Annuler la réservation" name="Nouvelle_Reservation"> 
	</form>
 	 </div>

      </div>
            <!-- /.row -->
       </div>
   </div>
    </section>
     <!-- Callout -->
   
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