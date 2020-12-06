<?php
namespace Quwius\Framework;

class DomainObject 
{
	protected $name;
	protected $email;
	protected $pass;

	public function __construct($name,$email,$pass)
	{
		$this->name = $name;
		$this->email = $email;
		$this->pass = $pass;

	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getPass()
	{
		return $this->pass;
	}

	
}