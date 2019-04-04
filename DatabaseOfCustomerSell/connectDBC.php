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

$sql="CREATE TABLE databaseOfCustomers(
		id int(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		email VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		phone VARCHAR(15) COLLATE utf8_unicode_ci NOT NULL ,
		province VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		district VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		town VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		address VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		note text COLLATE utf8_unicode_ci NOT NULL ,
		created datetime NOT NULL,
		modified datetime NOT NULL,
		status enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
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