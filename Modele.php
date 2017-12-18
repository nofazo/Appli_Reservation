<?php

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

	public function SetLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	public function GetFirstName()
	{
		return $this->firstName;
	}

	public function SetFirstName($firstName)
	{
		$this->firstName = $firstName;
	}


	public function GetAge()
	{
		return $this->age;
	}

	public function SetAge($age)
	{
		$this->age = $age;
	}

}


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

	public function SetPass($numberPass, $lastName, $firstName, $age)
	{
		$pass = $this->array_Pass[$numberPass]; // pour accéder au passager voulu
		$pass->SetLastName($lastName);
		$pass->SetFirstName($firstName);
		$pass->SetAge($age);

	}

	public function GetPrice()  
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

	public function Get18Years()
	{
		$pass = 0;
		foreach ($this->array_Pass as $passager) 
		{
			if ($passager->GetAge() >= 18)
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

	public function GetArrayNames()
	{
		$passName = array();
		foreach ($this->array_Pass as $pass) 
		{
			//$passName .= $pass->GetFirstName() . ',';
			array_push($passName, $pass->GetFirstName());
		}
		return $passName ;
	}

	public function GetArrayAges()
	{
		$passAge = array();
		foreach ($this->array_Pass as $pass) 
		{
			array_push($passAge, $pass->GetAge());
		}
		return $passAge ;
	}
}

?>