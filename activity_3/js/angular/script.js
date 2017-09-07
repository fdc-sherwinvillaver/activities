var myApp = angular.module('myApp', ['ngRoute']);
// create the controller and inject Angular's $scope
myApp.config(function($routeProvider){
	$routeProvider.
	when('/',{
		templateUrl : "pages/users.html",
		controller : "usersController"
	}).
	when('/products',{
		templateUrl : "pages/products.html",
		controller : "productsController"
	})
});

myApp.controller('usersController',['$scope','$http','$filter', function($scope,$http,$filter) {
	//get data from database
	var newGender;
	$scope.listUsers = function(){
		$http.post('api/users_controller.php',{ action : "getUsers"})
			.then(function success(e){
				$scope.users = e.data;
				for(var i = 0; i < e.data.length; i++){
					$scope.date_created = new Date(e.data[i].birthday);
				}
			}, function error(e){

			});
	}
	$scope.listUsers();
	// end get data from database

	//edit
	var index;
	$scope.edit = function(item){
		index = item.id;
		$scope.first_name = item.first_name;
		$scope.last_name = item.last_name;
		$scope.middle_name = item.middle_name;
		$scope.gender = item.gender;
		$scope.number = index;
		var dates = $filter('date')(new Date(item.birthday), "yyyy-MM-dd");
		$scope.date = dates;
	}
	//end edit

	//register users to database
	$scope.registerUser = function(){
		$scope.datas = [{
			"first_name" : $scope.first_name,
			"last_name" : $scope.last_name,
			"middle_name" : $scope.middle_name,
			"gender" : $scope.gender,
			"date" : $scope.date
		}];
		$http.post('api/users_controller.php',{action : 'registerUser', formData : $scope.datas })
			.then(function success(e){
				$scope.listUsers();
			}, function error(e){

			});
		$scope.first_name = "";
		$scope.last_name = "";
		$scope.middle_name = "";
		$scope.gender = "";
		$scope.date = "";
	}
	//end register

	//update user to database
	$scope.updateUser= function(){
		$scope.datas = [{
			"id" : index,
			"first_name" : $scope.first_name,
			"last_name" : $scope.last_name,
			"middle_name" : $scope.middle_name,
			"gender" : $scope.gender,
			"date" : $scope.date
		}];
		$http.post('api/users_controller.php',{action : 'updateUser', formData : $scope.datas })
			.then(function success(e){
				$scope.listUsers();
			}, function error(e){

			});
		$scope.first_name = "";
		$scope.last_name = "";
		$scope.middle_name = "";
		$scope.gender = "";
		$scope.date = "";
	}
	//end update

	//delete user from database
	$scope.remove = function(item){
		index = item.id;
		$scope.datas = [{
			"id" : index,
		}];
		$http.post('api/users_controller.php',{action : 'deleteUser', formData : $scope.datas })
			.then(function success(e){
				$scope.listUsers();
			}, function error(e){

			});
	}
	$scope.first = false;
	$scope.toggle = function(){
		$scope.first = !$scope.first;
	}
}]);


myApp.controller('productsController',['$scope','$http','$filter', function($scope,$http,$filter) {
	var productid;
	var product_id;
	var x;
	//get productid
	$scope.getProductID = function(){
		$http.post('api/products_controller.php',{ action : "getProductid"})
			.then(function success(e){
				productid = parseInt(e.data[0]['COUNT(*)']);
				x = productid + parseInt(1);
				$scope.product_id = "Product" + x.toString();
				product_id = "Product" + x.toString();
			}, function error(e){

			});
	}
	$scope.getProductID();

	//end productid

	//get_all products
	$scope.listProducts = function(){
		$http.post('api/products_controller.php',{ action : "getProducts"})
			.then(function success(e){
				$scope.products = e.data;
			}, function error(e){

			});
	}
	$scope.listProducts();

	//edit products
	var index;
	$scope.edit = function(item){
		index = item.product_id;
		$scope.product_id = item.product_id;
		$scope.product_name = item.name;
		$scope.product_type = item.type;
		$scope.product_description = item.description;
	}
	//end edit products

	//register products
	$scope.registerProducts = function(){
		$scope.getProductID();
		$scope.datas = [{
			"product_id" : product_id,
			"product_name" : $scope.product_name,
			"product_type" : $scope.product_type,
			"product_description" : $scope.product_description
		}];
		$http.post('api/products_controller.php',{action : 'registerProduct', formData : $scope.datas })
			.then(function success(e){
				$scope.listProducts();
				$scope.getProductID();
			}, function error(e){

			});
		$scope.product_id = "";
		$scope.product_name = "";
		$scope.product_type = "";
		$scope.product_description = "";
	}
	//end register products

	//update products
	$scope.updateProducts = function(){
		$scope.datas = [{
			"id" : index,
			"product_id" : $scope.product_id,
			"product_name" : $scope.product_name,
			"product_type" : $scope.product_type,
			"product_description" : $scope.product_description
		}];
		$http.post('api/products_controller.php',{action : 'updateProducts', formData : $scope.datas })
			.then(function success(e){
				$scope.listProducts();
				$scope.getProductID();
			}, function error(e){

			});
		$scope.product_id = "";
		$scope.product_name = "";
		$scope.product_type = "";
		$scope.product_description = "";
	}
	//end update products

	//delete product
	$scope.remove = function(item){
		index = item.product_id;
		$scope.datas = [{
			"id" : index,
		}];
		$http.post('api/products_controller.php',{action : 'deleteProducts', formData : $scope.datas })
			.then(function success(e){
				$scope.listProducts();
				$scope.getProductID();
			}, function error(e){

			});
	}
	//end delete product

	//end products
	// var product_id = "PR-002";
	// var index = 2;
	// $scope.product_id = product_id;
	// //register product on list
	// $scope.registerProducts = function(){

	// 	product_id = "PR-00" + index;
	// 	//insert data on list
	// 	$scope.datas.push({
	// 		"product_id" : product_id,
	// 		"product_name" : $scope.product_name,
	// 		"product_type" : $scope.product_type,
	// 		"product_description" : $scope.product_description,
	// 	});
	// 	$scope.product_name = "";
	// 	$scope.product_type = "";
	// 	$scope.product_description = "";
	// 	index++;
	// 	$scope.product_id = "PR-00" + index;
	// }
	// //update product on list
	// $scope.updateProduct= function(){
	// 	var number = $scope.number;
	// 	$scope.datas[number].product_name = $scope.product_name;
	// 	$scope.datas[number].product_type = $scope.product_type;
	// 	$scope.datas[number].product_description = $scope.product_description;

	// 	$scope.product_name = "";
	// 	$scope.product_type = "";
	// 	$scope.product_description = "";
	// 	$scope.product_id = "PR-00" + index;
	// }

	// //remove data from list
	// $scope.remove = function(item){
	// 	var index = $scope.datas.indexOf(item);
	// 	$scope.datas.splice(index,1);
	// }

	// $scope.edit = function(item){
	// 	var indexs = $scope.datas.indexOf(item);
	// 	$scope.number = indexs;
	// 	$scope.product_id = item.product_id;
	// 	$scope.product_name = item.product_name;
	// 	$scope.product_type = item.product_type;
	// 	$scope.product_description = item.product_description;
	// }
	$scope.first = false;
	$scope.toggle = function(){
		$scope.first = true;
	}
}]);

myApp.controller('headerController', function($scope, $location) {
	$scope.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
});  
