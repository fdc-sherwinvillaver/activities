<?php  
	include 'connection.php';
	include('users.php');

	$pdo = Database::connect();
 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$data = json_decode(file_get_contents("php://input"));
	$action = $data->action;

	
	switch ($action) {
		case 'getUsers':
			Users::selectAllData($pdo);
			break;
		case 'registerUser':
			$formData = $data->formData;
			Users::registerUser($pdo,$formData[0]);
			break;
		case 'updateUser':
			$formData = $data->formData;
			Users::updateUser($pdo,$formData[0]);
			break;
		case 'deleteUser':
			$formData = $data->formData;
			Users::deleteUser($pdo,$formData[0]);
			break;
		default:
			# code...
			break;
	}
?>