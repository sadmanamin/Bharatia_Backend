<?php
 
$response = array();
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
 
    $PostID=$_GET['PostID'];
	$query=mysql_query("UPDATE `Post` SET ViewCnt=ViewCnt+1 WHERE PostID=$PostID");
	
    print json_encode($response)

?>