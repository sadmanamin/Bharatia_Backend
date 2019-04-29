
<?php
	require_once __DIR__ . '/db_connect.php';
	$db = new DB_CONNECT();
	
$UserID =$_GET['UserID'];
//echo $UserID;
	$query=mysql_query("SELECT * FROM `Post` WHERE PostID IN (SELECT PostID FROM Bookmark WHERE UserID=$UserID ORDER BY PostID DESC)");
	$response=array();
	if($query){
		while($r = mysql_fetch_assoc($query)) {
		$response[] = $r;
		//echo "1 ";
		}
		
		echo json_encode($response);
	}
	else echo "failed";
?>
