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

$ID = mysql_escape_string($_POST['ID']);
$Date = mysql_escape_string($_POST['Date']);
$Time = mysql_escape_string($_POST['Time']);
$Hash = mysql_escape_string($_POST['Hash']);

$check = mysql_query("SELECT * FROM `Token` WHERE USERID=$ID and TOKEN='$Hash'");

if(mysql_num_rows($check)>0){

	$CurMonth = date("m",strtotime($Date));
	$CurYear = date("y",strtotime($Date));
	$CurDay = date("d",strtotime($Date));
	
	$CurH = date("H",strtotime($Date));
	$CurMin = date("M",strtotime($Date));
	$CurSec = date("S",strtotime($Date));
	
	$query = mysql_query("SELECT * from Steps where Dates between 01-".$CurMonth."-".$CurYear." and '$Date'" );
	if($query){
		while($r = mysql_fetch_assoc($query)) {
		$response[] = $query;
		//echo "1 ";
		}
		echo json_encode($response);
	}
	else{
		echo "No Value";
	}
}

else{
		echo "Not Allowed";
}
?>