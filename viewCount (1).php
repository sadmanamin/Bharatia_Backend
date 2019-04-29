<?php
 
$response = array();
	require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
 
    $UserID=$_GET['UserID'];
	$query=mysql_query("UPDATE `User` SET ViewCnt=ViewCnt+1 WHERE UserID=$UserID");
	
    print json_encode($response)

?>