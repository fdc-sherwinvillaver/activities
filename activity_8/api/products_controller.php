<?php  
	include('model/products.php');
	$products = new Products();
	$data = json_decode(file_get_contents("php://input"));
	$action = $data->action;
	switch ($action) {
		case 'getProducts':
			$formData = $data->formData;
			$products->selectAllData($formData[0]);
			break;
		case 'getProductid':
			$products->countAllData();
			break;
		case 'registerProduct':
			$formData = $data->formData;
			$products->registerProduct($formData[0]);
			break;
		case 'updateProducts':
			$formData = $data->formData;
			$products->updateProducts($formData[0]);
			break;
		case 'deleteProducts':
			$formData = $data->formData;
			$products->deleteProducts($formData[0]);
			break;
		case 'getProductCount':
			$products->getProductCount();
			break;
		default:
			# code...
			break;
	}
?>