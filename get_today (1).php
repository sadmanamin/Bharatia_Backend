<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();

$ID = $_GET['ID'];


$query = mysql_query("INSERT INTO `Steps`(`USERID`, `STEPS`, `DISTANCE`) VALUES ($ID,$Steps,$Distance)");

if($query){
	echo "Done";
}
else{
	echo "Not Inserted";
}
?>