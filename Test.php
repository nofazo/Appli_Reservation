$i = 0;
for($i=0 ; $i<$nbr_places ; $i++)
{
	$nom = $_POST['nom'][$i];
	$age = $_POST['age'][$i];

	if($nom=="" || $age<0 || $age == "" || !ctype_digit($age))
	{

		if($nom == "") 
		{
			$_SESSION['erreurs']['nom'][$i] =
			"Erreur : Veuillez entrer un nom !";
		}
		else 
		{
			$_SESSION['erreurs']['nom'][$i] = NULL;
		}

		if($age < 0)
		{
			$_SESSION['erreurs']['age'][$i] = "Erreur :
			Veuillez entrer un âge supérieur à 0 !";
			$age = "";
		}

		else if($age == "")
		{
			$_SESSION['erreurs']['age'][$i] = "Erreur :
			Veuillez entrer un âge !";
		}

		else if(!ctype_digit($age))
		{
			$_SESSION['erreurs']['age'][$i] = "Erreur :
			Veuillez entrer un âge valide !";
		}
		else
		{
			$_SESSION['erreurs']['age'][$i] = NULL;
		}
	}
	else
	{
		$_SESSION['erreurs'][$i] = array();
	}
	if($_SESSION['erreurs'][$i] != NULL)
	{
		$_SESSION['passagers'][$i] = new Voyageur($nom , $age);
		header('Location:index.php?step=2');
	}

	else
	{
		$_SESSION['passagers'][$i] = new Voyageur($nom , $age);
	}
}