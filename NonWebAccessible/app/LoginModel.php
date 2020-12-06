<?php
use Quwius\Framework\Observable_Model;
use Quwius\Framework\DataMapper;
 class LoginModel extends Observable_Model{
 	public function findAll(): array{
 		return [];
 	}
 	public function findRecord(string $id): array{
 		$mapper = new DataMapper();
 		$data = $mapper->find($id);
 		
 		return ['user'=>['name'=>$data->getName(),'email'=>$data->getEmail(),'password'=>$data->getPass(),] ];
 	}
 }


