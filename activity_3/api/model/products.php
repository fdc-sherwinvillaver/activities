<?php 
class Products{
	 function selectAllData($pdo,$datas){
	 	$sql = "SELECT product_id,name,description,type FROM products LIMIT 10 OFFSET $datas->offset";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	 }

	 function getProductCount($pdo){
	 	$sql = "SELECT COUNT(*) FROM products";
		$stmt = $pdo->prepare($sql);
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


	 function countAllData($pdo){
	 	$sql = "SELECT COUNT(*) FROM products";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();
		foreach ($result as $row) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	 }
	 function registerProduct($pdo,$datas){
	 	$date_today = date("Y-m-d");
	 	$sql = "INSERT INTO products (product_id, name, type, description , created_date, modified_date, created_ip, modified_ip)
	 			VALUES('$datas->product_id','$datas->product_name','$datas->product_type','$datas->product_description','$date_today','$date_today','192.168.122.122','192.16822.122.123')";
	 	if($pdo->exec($sql)){
		}
	 }

	 function updateProducts($pdo,$datas){
	 	$date_today = date("Y-m-d");
	 	$sql = "UPDATE products SET name = '$datas->product_name',type = '$datas->product_type',description = '$datas->product_description', modified_date = '$date_today', modified_ip = '192.168.312.111' WHERE product_id = '$datas->id'";
	 	if($pdo->exec($sql)){
		}
	 }
	  function deleteProducts($pdo,$datas){
	 	$date_today = date("Y-m-d");
	 	$sql = "DELETE FROM products WHERE product_id = '$datas->id'";
	 	if($pdo->exec($sql)){
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