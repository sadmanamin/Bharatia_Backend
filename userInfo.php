

<?php

$response = array();

require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	$userid=$_GET['UserID'];
	//echo $email;
	$query=mysql_query("SELECT * FROM `User` WHERE UserID=$userid");
	if($query){
		$row=mysql_fetch_assoc($query);
		echo json_encode($row);
		//echo "Subha";
	}
	else echo "No Subha";
?>