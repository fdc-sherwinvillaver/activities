<?php 
	include 'connection.php';
	$pdo = Database::connect();

 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 function createDatabase($pdo){
	 	$sql = "CREATE DATABASE IF NOT EXISTS db_activity4";
		$pdo->exec($sql);
		$sql = "use db_activity4";
		$pdo->exec($sql);
	 }

	 function createTable($pdo){
	 	$sql = "CREATE TABLE IF NOT EXISTS activity4 (
	 					ID int(11) AUTO_INCREMENT PRIMARY KEY,
	 					first_name VARCHAR(50) NOT NULL,
	 					last_name VARCHAR(50) NOT NULL,
	 					middle_name VARCHAR(50) NOT NULL)";
		$pdo->exec($sql);
	 }

	 function insertData($pdo){
	 	$sql = "INSERT INTO activity4 (first_name,last_name,middle_name) VALUES('sherwin','villaver','lauronilla')";
		$pdo->exec($sql);
	 }

	 function selectAllData($pdo){
	 	$sql = "SELECT * FROM activity4";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			echo $row['ID'] . " ";
			echo $row['first_name'] . " ";
			echo $row['last_name'] . " ";
			echo $row['middle_name'] . " ";
		}
	 }

	 function selectOneRow($pdo){
	 	$sql = "SELECT * FROM activity4 LIMIT 1";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results2 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result2 = $stmt->fetchAll();
		foreach ($result2 as $row2) {
			echo $row2['ID'] . " ";
			echo $row2['first_name'] . " ";
			echo $row2['last_name'] . " ";
			echo $row2['middle_name'] . " ";
		}
	 }

	 function updateData($pdo){
	 	$sql = "UPDATE activity4 SET firstname = 'spencer' WHERE lastname = 'villaver'";
		$pdo->exec($sql);
	 }

	 function deleteData($pdo){
	 	$sql = "DELETE FROM activity4 WHERE lastname = 'villaver'";
		$pdo->exec($sql);
	 }

	 createDatabase($pdo);
	 createTable($pdo);
	 insertData($pdo);
	 selectAllData($pdo);
	 echo "<br>";
	 selectOneRow($pdo);
?>