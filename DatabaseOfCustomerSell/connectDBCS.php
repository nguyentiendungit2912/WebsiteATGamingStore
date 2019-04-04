<?php
$sName="localhost";
$uname="root";
$passwd="";
$database="databaseCustomers";
$conn=mysqli_connect($sName,$uname,$passwd,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql="CREATE TABLE databaseOfCustomerSelled(
		id int(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		email VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		phone VARCHAR(15) COLLATE utf8_unicode_ci NOT NULL ,
		province VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		district VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		town VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		address VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		note text COLLATE utf8_unicode_ci NOT NULL ,
		
		total_products int(255) NOT NULL ,
		totalAmount double(10, 2) NOT NULL,
		created datetime NOT NULL,
		nameOfProduct1 VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		priceOfProduct1 double(10, 2) NOT NULL,
		nameOfProduct2 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct2 double(10, 2) ,
		nameOfProduct3 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct3 double(10, 2) ,
		nameOfProduct4 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct4 double(10, 2) ,
		nameOfProduct5 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct5 double(10, 2) ,
		nameOfProduct6 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct6 double(10, 2) ,
		nameOfProduct7 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct7 double(10, 2) ,
		nameOfProduct8 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct8 double(10, 2) ,
		nameOfProduct9 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct9 double(10, 2) ,
		nameOfProduct10 VARCHAR(255) COLLATE utf8_unicode_ci ,
		priceOfProduct10 double(10, 2) ,
		
		PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		
		if ($conn->query($sql) === TRUE) 
		{
			echo "Table <b>productions</b> created successfully";
		} else 
		{
			echo "Error creating table: " . $conn->error;
		}
$conn->close();

?>