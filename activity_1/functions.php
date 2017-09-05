<?php
	$servername = "localhost";
	$username = "root";
	$password = "admin123";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=my_db", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   //  $conn->beginTransaction();
	   //  for($index = 1; $index < 51; $index++){
	   //  	//users query insert 50 datas
	   //  	$conn->exec("INSERT INTO users (first_name, last_name, middle_name,gender,birthday,created_date,modified_date,created_ip,modified_ip) 
    // VALUES ('Firstname$index', 'Lastname$index', 'Middlename$index','1','2017-05-04','2017-05-04','2017-05-04','192.168.1.1','192.168.1.1')");
	   //  	//products query insert 50 datas
	   //  	$conn->exec("INSERT INTO products (product_id, name, description,type,created_date,modified_date,created_ip,modified_ip) 
    // // VALUES ('Productid$index', 'Productname$index', 'description$index','Type$index','2017-05-04','2017-05-04','192.168.1.1','192.168.1.1')");
	   //  }
	   //  $conn->commit();
    }
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }
?>
