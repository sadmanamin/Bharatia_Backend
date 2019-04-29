<?php
 
$response = array();
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
 
    $PostID=$_GET['PostID'];
	$query=mysql_query("SELECT * FROM `Photo` WHERE `PostID`=$PostID");
	
	while($r = mysql_fetch_assoc($query)) {
    $response[] = $r;
    }
    print json_encode($response)

?>