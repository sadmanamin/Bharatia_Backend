<?php
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
	$userID=$_GET['UserID'];
	$query=mysql_query("SELECT * FROM `Post` WHERE UserID=$userID ORDER BY PostID DESC");
	if($query){
	$response=array();
	if($query){
		while($r = mysql_fetch_assoc($query)) {
		$response[] = $r;
		//echo "1 ";
		}
		print json_encode($response);
	}
	}
	else echo "error";
	?>
	
	