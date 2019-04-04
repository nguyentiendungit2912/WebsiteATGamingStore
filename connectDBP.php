<?php
$sName="localhost";
$uname="root";
$passwd="";
$database="databaseproduction";
$conn=mysqli_connect($sName,$uname,$passwd,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql="CREATE TABLE productions(
		id int(11) NOT NULL AUTO_INCREMENT,
		name VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL ,
		code VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL , 
		image text COLLATE utf8_unicode_ci NOT NULL ,
		image1 text COLLATE utf8_unicode_ci,
		image2 text COLLATE utf8_unicode_ci,
		image3 text COLLATE utf8_unicode_ci,
		image4 text COLLATE utf8_unicode_ci,
		image5 text COLLATE utf8_unicode_ci,
		price double(10, 2) NOT NULL,
		amount int(255) NOT NULL,
		detail VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
		created datetime NOT NULL,
		modified datetime NOT NULL,
		status enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
		PRIMARY KEY (id),
		UNIQUE KEY product_code (code)
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