<?php
/**
* 
*/
class Passager
{
	private $lastName;
	private $firstName;
	private $age;
	
	public function __construct($lastName, $firstName, $age)  
	{
		$this->lastName = $lastName;
		$this->firstName = $firstName;
		$this->age = $age;
	}

	public function SetLastName($lastName)
	{
		return $this->lastName;
	}

	public function GetLastName()
	{
		return $this->lastName;
	}

	public function SetFirstName($firstName)
	{
		return $this->firstName;
	}

	public function GetFirstName()
	{
		return $this->firstName;
	}

	public function SetAge($age)
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
	private $destination;
	private $place;
	private $insurance;
	private $array_Pass = array();

	
	public function __construct($destination, $place, $insurance,$array_Pass)
	{
		$this->destination = $destination;
		$this->place = $place ;
		$this->insurance = $insurance ;
		$this->array_Pass = $array_Pass;
	}

	public function SetDestination($destination) 
	{ 
	   $this->destination = $destination; 
	}

	public function GetDestination() 
	{ 
	   return $this->destination; 
	}

	public function SetPlace($place) 
	{ 
	   $this->place = $place; 
	}

	public function GetPlace() 
	{ 
	   return $this->place; 
	}

	public function GetInsurance() 
	{ 
		if($this->insurance === 'TRUE')
		{
			return 'OUI';
		}
		else
		{
			return 'NON';
		}
	}
	
	public function SetInsurance($insurance) 
	{
		$this->insurance = $insurance;
	}

	public function AddPass($passager)
	{
		array_push($this->array_Pass, $passager);   // comprendre pourquoi marche qu'avec $this->array_Pass et non $array_Pass
	}

	public function GetLengthPass()
	{
		return count($this->array_Pass);
	}

	public function GetArray()
	{
		return $this->array_Pass;
	}

	public function Reset_Pass()
	{
		$this->array_Pass = array();
	}
}

/**
* 
*/
?>