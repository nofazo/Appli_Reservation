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
	<title>Confirmation</title>
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
	<h1>Confirmation des réservations</h1>
	<p>Votre demande a bien été enregistrée. </br>
	   Merci de bien vouloir verser la somme de <?php echo ($reservation->GetTotalPrice()) ?> euros sur le compte 000-00000-00.
	</p>
</div>
<div class="col-lg-6">
      	<br>
      	<br>
      	<br>
	<form method="post" action="index.php?page=Accueil">
	<input type="submit" class="btn btn-warning" value="Retour à la page d'accueil" name="Nouvelle_Reservation" > <br>
</form>
<form method="post" action="index.php?page=Admin"><br>
	<input type="submit"  class="btn btn-warning" value="Voir le tableau des réservations"  > 
</form>
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