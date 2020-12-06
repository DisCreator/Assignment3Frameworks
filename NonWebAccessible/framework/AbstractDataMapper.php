<?php
namespace Quwius\Framework;
abstract class AbstractDataMapper
{
	protected $pdo;

	public function __construct()
	{
		$reg = Registry::instance();
		$this->pdo = $reg->getPdo();
	}

	public function find($email)
	{
		$this->select()->execute([$email]);
		$row = $this->select()->fetch();
		$this->select()->closeCursor();

		if (! is_array($row)) {return null;}
		if (! isset($row['email'])) {return null;}

		$object = $this->createObject($row);
		return $object;
	}

	public function createObject(array $raw): DomainObject
	{
		$obj = $this->doCreateObject($raw);
		return $obj;
	}

	public function insert(DomainObject $obj)
	{
		$this->doInsert($obj);
	}

	abstract public function update(DomainObject $object);
	abstract protected function doCreateObject(array $raw): DomainObject;
	abstract protected function doInsert(DomainObject $object);
	abstract protected function select(): \PDOStatement;
}


