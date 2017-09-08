<?php  
	include 'model/connection.php';
	include('model/products.php');

	$pdo = Database::connect();
 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$data = json_decode(file_get_contents("php://input"));
	$action = $data->action;

	
	switch ($action) {
		case 'getProducts':
			$formData = $data->formData;
			Products::selectAllData($pdo,$formData[0]);
			break;
		case 'getProductid':
			Products::countAllData($pdo);
			break;
		case 'registerProduct':
			$formData = $data->formData;
			Products::registerProduct($pdo,$formData[0]);
			break;
		case 'updateProducts':
			$formData = $data->formData;
			Products::updateProducts($pdo,$formData[0]);
			break;
		case 'deleteProducts':
			$formData = $data->formData;
			Products::deleteProducts($pdo,$formData[0]);
			break;
		case 'getProductCount':
			Products::getProductCount($pdo);
			break;
		default:
			# code...
			break;
	}
?>