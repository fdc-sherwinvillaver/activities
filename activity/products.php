<?php  
require_once('connection.php');
class ProductsClass {
	private $db;
	private $pdo;
	public function __construct(){
		$this->db = new DatabaseClass();
		$this->pdo = $this->db;
	}
}
?>