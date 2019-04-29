

<?php
   $response = array();
 
// include db connect class
	require_once __DIR__ . '/db_connect.php';
    
// connecting to db
	$db = new DB_CONNECT();
	//$Type=$_POST['Type'];
	
	
	$query =  mysql_query("SELECT * FROM Post WHERE Availability=TRUE ORDER BY PostID DESC");
	
	
if($query){
		while($r = mysql_fetch_assoc($query)) {
		$response[] = $r;
		//echo "1 ";
		}
		print json_encode($response);
	}
	else echo "Error";
	
?>