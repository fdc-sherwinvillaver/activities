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
	//count users data from database
	var count;
	var datatype;
	var increment = 1;
	var check_decimal;
	$scope.getUserCount = function(){
		count = 0;
		datatype;
		increment = 0;
		check_decimal;

		$scope.pages = [];

		$http.post('api/users_controller.php',{ action : "getUserCount"})
			.then(function success(e){
				count = e.data.count
				datatype = e.data.datatype
				if(datatype == "double"){
					count = count/10;
					check_decimal = parseInt(count.toString()[2]);
					if(check_decimal < 5){
						count = Math.round(count+1);
					} else{
						count = Math.round(count);
					}
				}
				else{
					count = count/10;
				}
				for(var i = 0; i < count; i++){
					$scope.pages.push({
						"page" : i + 1,
						"increment" : increment
					});
					increment = increment + 10;
				}

				$scope.active = 1;
			}, function error(e){

			});
	}
	$scope.getUserCount();

	

	//end count data from database

	//get data from database
	var newGender;
	$scope.listUsers = function(page,increment){
		$scope.datas = [{
			"offset" : increment
		}];
		$http.post('api/users_controller.php',{ action : "getUsers" , formData: $scope.datas})
			.then(function success(e){
				$scope.users = e.data;
				// console.log(e);
			}, function error(e){

			});
		$scope.active = page;
	}
	var array = [{
		"page" : 1,
		"increment" : 0
	}];

	$scope.listUsers(array[0].page,array[0].increment);
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
				$scope.listUsers(1,1);
				$scope.getUserCount();
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
				$scope.listUsers(1,1);
				$scope.getUserCount();
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
				$scope.listUsers(1,1);
				$scope.getUserCount();
			}, function error(e){

			});
	}
	$scope.first = false;
	$scope.toggle = function(){
		$scope.first = !$scope.first;
	}
}]);


myApp.controller('productsController',['$scope','$http','$filter', function($scope,$http,$filter) {
	//get product count
	var count;
	var datatype;
	var increment = 1;
	var check_decimal;
	$scope.getProductCount = function(){
		count = 0;
		datatype;
		increment = 0;
		check_decimal;
		$scope.pages = [];
		$http.post('api/products_controller.php',{ action : "getProductCount"})
			.then(function success(e){
				count = e.data.count
				datatype = e.data.datatype
				if(datatype == "double"){
					count = count/10;
					check_decimal = parseInt(count.toString()[2]);
					if(check_decimal < 5){
						count = Math.round(count+1);
					} else{
						count = Math.round(count);
					}
				}
				else{
					count = count/10;
				}
				for(var i = 0; i < count; i++){
					$scope.pages.push({
						"page" : i + 1,
						"increment" : increment
					});
					increment = increment + 10;
				}

				$scope.active = 1;
			}, function error(e){

			});
	}
	$scope.getProductCount();
	//end product count




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
	$scope.listProducts = function(page,increment){
		$scope.datas = [{
			"offset" : increment
		}];
		$http.post('api/products_controller.php',{ action : "getProducts" , formData: $scope.datas})
			.then(function success(e){
				$scope.products = e.data;
				// console.log(e);
			}, function error(e){

			});
		$scope.active = page;
	}
	var array = [{
		"page" : 1,
		"increment" : 0
	}];

	$scope.listProducts(array[0].page,array[0].increment);

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
				$scope.listProducts(1,1);
				$scope.getProductCount();
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
				$scope.listProducts(1,1);
				$scope.getProductCount();
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
				$scope.listProducts(1,1);
				$scope.getProductCount();
				$scope.getProductID();
			}, function error(e){

			});
	}
	//end delete product
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
