<?php
/**
* 
*/
class Passager
{
	private $nom;
	private $prenom;
	private $age;
	
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
	private $destination;
	private $place;
	private $assurance;

	
	public function __construct($destination, $place, $assurance)
	{
		$this -> destination = $destination;
		$this -> place = $place ;
		$this -> assurance = $assurance ;
	}
	public function setDestination($destination) 
	{ 
	   $this->destination = $destination; 
	}

	public function getDestination() 
	{ 
	   return $this->destination; 
	}
	public function setPlace($place) 
	{ 
	   $this->places = $places; 
	}

	public function getPlace() 
	{ 
	   return $this->places; 
	}
	public function getAssurance() 
	{ 
		if($this->assurance)
		{
			return 'OUI';
		}
		else
		{
			return 'NON';
		}
	}
	
	public function setAssurance($assurance) 
	{
		$this->assurance = $assurance;
	}
}
?>