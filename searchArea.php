<?php

$response = array();

	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	$area=$_GET['Area'];
	//echo $area;
	$query=mysql_query("SELECT Name FROM `Area` WHERE `Name` like '$area%' order by `Name` ASC");
	$response = array();
	while($r = mysql_fetch_assoc($query)) {
    $response[] = $r;
    }
    print json_encode($response);
	
	?>