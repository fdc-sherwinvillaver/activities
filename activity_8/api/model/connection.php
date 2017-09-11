<?php  
class DatabaseClass{
	private $servername = "localhost";
	private $username = "root";
	private $password = "admin123";
	private $database = "my_db";
	private $pdo = null;

	public function __construct(){
		if($this->pdo == null){
			try {
				$this->pdo = new PDO("mysql:host=".$this->servername.";dbname=".$this->database.";",$this->username,$this->password);
			} catch (Exception $ex) {
				die($ex->getMessage());
			}
		}
	}

	public function connect(){
		if($this->pdo){
			return $this->pdo;
		}
	}
}
?>