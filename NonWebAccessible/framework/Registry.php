<?php
namespace Quwius\Framework;

class Registry
{
	private static $instance = null;
	private $values = [];
	protected $session;
	protected $pdo;

	public static function instance(): self
	{
		if (is_null(self::$instance)) {
		self::$instance = new self();
		}
		return self::$instance;
	}

	public function getSession(): SessionClass
	{
		if (is_null($this->session)) {
			$this->session = new SessionClass();
		}
		return $this->session;
	}

	public function getPDO(){
		if (is_null($this->pdo)){
			$this->pdo = new \PDO('mysql:host=localhost;dbname=mooc', 'root', '');
		}
		return $this->pdo;
	}

	public function set(string $key, $value)
	{
		$this->values[$key] = $value;
	}

}