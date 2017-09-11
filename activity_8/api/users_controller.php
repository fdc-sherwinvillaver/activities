<?php  
	include('model/users.php');
	$users = new Users();
	$data = json_decode(file_get_contents("php://input"));
	$action = $data->action;
	switch ($action) {
		case 'getUsers':
			$formData = $data->formData;
			$users->selectAllData($formData[0]);
			break;
		case 'registerUser':
			$formData = $data->formData;
			$users->registerUser($formData[0]);
			break;
		case 'updateUser':
			$formData = $data->formData;
			$users->updateUser($formData[0]);
			break;
		case 'deleteUser':
			$formData = $data->formData;
			$users->deleteUser($formData[0]);
			break;
		case 'getUserCount':
			$users->getUserCount();
			break;
		default:
			# code...
			break;
	}
?>