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

	public function GetLastName()
	{
		return $this->lastName;
	}

	public function GetFirstName()
	{
		return $this->firstName;
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
	private $price ;

	
	public function __construct($destination, $place, $insurance,$array_Pass,$price)
	{
		$this->destination = $destination;
		$this->place = $place ;
		$this->insurance = $insurance ;
		$this->array_Pass = $array_Pass;
		$this->price = $price ;
	}

	public function GetDestination() 
	{ 
	   return $this->destination; 
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

	public function AddPass($passager)
	{
		array_push($this->array_Pass, $passager);
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

	public function GetPrice()  // va servir pour un tableau des destinations et prix à renseigner au client
	{
		return $this->price;
	}

	public function GetNumberAdult()
	{
		$pass = 0;
		foreach ($this->array_Pass as $passager) 
		{
			if ($passager->GetAge() > 12)
			{
				$pass += 1 ;
			}
		}
		return $pass;
	}

	public function GetNumberChild()
	{
		$child = 0;
		foreach ($this->array_Pass as $children) 
		{
			if ($children->GetAge() < 12)
			{
				$child += 1 ;
			}
		}
		return $child;
	}

	public function GetTotalPrice()
	{	
		if ($this->GetInsurance() === 'OUI')
		{
			$totalPrice = ($this->GetNumberAdult() * $this->price) + ($this->GetNumberChild() * 0.5 * $this->price) + 30;
			return $totalPrice;
		}

		else
		{
			$totalPrice = ($this->GetNumberAdult() * $this->price) + ($this->GetNumberChild() * 0.5 * $this->price) ;
			return $totalPrice;
		}
	}
}

/**
* 
*/
?>