<?php  
class Database{

	private static $servername = "localhost";
	private static $username = "root";
	private static $password = "admin123";
	private static $database = "my_db";


	private static $cont  = null;

	public function __construct(){
		die('Init function is not allowed');
	}

	public function connect(){
		if(null == self::$cont){
			try{
				self::$cont = new PDO("mysql:host=".self::$servername.";dbname=".self::$database.";",self::$username,self::$password);
			}
			catch(PDOExeption $ex){
				die($ex->getMessage());
			}
		}
		return self::$cont;
	}

	public function disconnect(){
		self::$cont = null;
	}
}
?>