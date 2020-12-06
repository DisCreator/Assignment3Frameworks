<?php
namespace Quwius\Framework;

abstract class Model_Abstract{
	protected $json = [];

	abstract public function findAll():array;

	abstract public function findRecord(string $id): array;
	public function loadData(string $filename): array
	{
		//Gets file name from passed variable
		$file = basename($filename, '.json');

		//Checks if file is already stored 
		if(!isset($this->json[$file]) || empty($this->json[$file])){

			//Gets data from file and stores it if not already done
			$json_file = file_get_contents($filename);
			$this->json[$file] = json_decode($json_file,true);
		}

		return $this->json[$file];
	}
	public static function makeConnection(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "mooc";

		// Create connection
		$conn = mysqli_connect($host, $user, $pass, $db);

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		return $conn;

	}
}