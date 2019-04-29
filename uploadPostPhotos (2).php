<?php
 
$response = array();
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
 
    $PostID=$_GET['PostID'];
	$PhotoLink=$_GET['PhotoLink'];
	$q1="INSERT INTO `Photo`(`PId`, `PostID`, `Link`) VALUES (null,".$PostID.",'".$PhotoLink."')";
	//$query=mysql_query("INSERT INTO `Photo`(`PId`, `PostID`, `Link`) VALUES (null,$PostID,'$PhotoLink')");
	
	$query=mysql_query($q1);
	
	if($query){
		echo "Success";
	}
	else{
		echo "Error";
	}

?>
