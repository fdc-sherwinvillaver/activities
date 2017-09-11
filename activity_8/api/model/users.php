<?php 
require_once('connection.php');
class Users{

	private $db;
	private $pdo;

	public function __construct(){
		$this->db = new DatabaseClass();
		$this->pdo = $this->db->connect();
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
 	public function selectAllData($datas){
	 	$rows = [];
	 	$sql = "SELECT id,first_name,last_name,middle_name,gender,birthday FROM users LIMIT 10 OFFSET $datas->offset";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			$rows[] = $row;
		}
		echo json_encode($rows);
 	}

	public function getUserCount(){
	 	$sql = "SELECT COUNT(*) FROM users";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			$rows[] = $row;
		}
		$int = (int)$rows[0]['COUNT(*)'];
		$datatype = gettype($int/10);
		echo json_encode(array("datatype" => $datatype, "count" => $int));
	}

	public function registerUser($datas){
	 	echo $datas->first_name;
	 	$date_today = date("Y-m-d");
	 	$sql = "INSERT INTO users (first_name, last_name, middle_name, gender, birthday, created_date, modified_date, created_ip, modified_ip)
	 			VALUES('$datas->first_name','$datas->last_name','$datas->middle_name','$datas->gender','$datas->date','$date_today','$date_today','192.168.122.122','192.16822.122.123')";
	 	if($this->pdo->exec($sql)){
		}
	}
	public function updateUser($pdo,$datas){
	 	$date_today = date("Y-m-d");
	 	$sql = "UPDATE users SET first_name = '$datas->first_name',last_name = '$datas->last_name',middle_name = '$datas->middle_name', gender = '$datas->gender', birthday = '$datas->date', modified_date = '$date_today', modified_ip = '192.168.312.111' WHERE id = '$datas->id'";
	 	if($this->pdo->exec($sql)){
		}
	}
	public function deleteUser($datas){
	 	$date_today = date("Y-m-d");
	 	$sql = "DELETE FROM `users` WHERE id = $datas->id";
	 	if($this->pdo->exec($sql)){
		}
	 }
	 
}
	 // function updateData($pdo){
	 // 	$sql = "UPDATE activity4 SET firstname = 'spencer' WHERE lastname = 'villaver'";
		// $pdo->exec($sql);
	 // }

	 // function deleteData($pdo){
	 // 	$sql = "DELETE FROM activity4 WHERE lastname = 'villaver'";
		// $pdo->exec($sql);
	 // }

	 // createDatabase($pdo);
	 // createTable($pdo);
	 // insertData($pdo);
	 // selectAllData($pdo);
	 // echo "<br>";
	 // selectOneRow($pdo);
?>