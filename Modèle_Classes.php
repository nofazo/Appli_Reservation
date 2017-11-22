<?php
/**
* 
*/
class Passager
{
	private $lastName;
	private $firstName;
	private $age;
	
	public function __construct($lastName, $firstName, $age)  // encapsulation à changer (pas celle du constructeur car toujours public)
	{
		$this -> lastName = $lastName;
		$this -> firstName = $firstName;
		$this -> age = $age;
	}
	public function setLastName($lastName)
	{
		return $this->lastName;
	}
	public function getLastName()
	{
		return $this->lastName;
	}
	public function setFirstName($firstName)
	{
		return $this->firstName;
	}
	public function getFirstName()
	{
		return $this->firstName;
	}
	public function setAge($age)
	{
		return $this->age;
	}
	public function GetAge()
	{
		return $this->age;
	}

}

/**
* 
*/
class Reservation
{
	public $destination;
	public $place;
	public $insurance;

	
	public function __construct($destination, $place, $insurance)
	{
		$this -> destination = $destination;
		$this -> place = $place ;
		$this -> insurance = $insurance ;
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
	public function getInsurance() 
	{ 
		if($this->insurance)
		{
			return 'OUI';
		}
		else
		{
			return 'NON';
		}
	}
	
	public function setInsurance($insurance) 
	{
		$this->insurance = $insurance;
	}
}
?>