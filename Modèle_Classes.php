<?php
/**
* 
*/
class Passager
{
	public $nom;
	public $prenom;
	public $age;
	
	public function __construct($nom, $prenom, $age)  // encapsulation à changer (pas celle du constructeur car toujours public)
	{
		$this -> nom = $nom;
		$this -> prenom = $prenom;
		$this -> age = $age;
	}
}

/**
* 
*/
class Reservation
{
	public $destination;
	public $place;
	public $assurance;

	
	function __construct($destination, $place, $assurance)
	{
		$this -> destination = $destination;
		$this -> place = $place ;
		$this -> assurance = $assurance ;
	}
}
?>