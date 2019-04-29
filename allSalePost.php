

<?php
   $response = array();
 
// include db connect class
	require_once __DIR__ . '/db_connect.php';
    
// connecting to db
	$db = new DB_CONNECT();
	$tp=$_GET['Type'];
	$Type="Order by PostID desc";
	if(!empty($_GET['Type'])){
	    $Type="Order By $tp ".$SortType;
	    
	}
	$lat=$_GET['Lat'];
	$lng=$_GET['Lon'];
	//$Radius=$_GET['Radius'];
	
	
	if(!empty($_GET['Type']) && $tp=="Nearest"){
	   
	    $query =  mysql_query("SELECT *,( 3959 * acos( cos( radians('".$lat."') ) * cos( radians( Lat ) ) * cos( radians( Lon ) - radians('".$lng."') ) + sin( radians('".$lat."') ) * sin( radians( Lat ) ) ) ) AS distance FROM Post WHERE Availability=TRUE AND Type1='Sale' HAVING distance < 2");
	}
	else{
	
	
	$query =  mysql_query("SELECT * FROM `Post` WHERE Availability=TRUE and Type1='Sale' ".$Type);
	}
	
	
if($query){
		while($r = mysql_fetch_assoc($query)) {
		$response[] = $r;
		//echo "1 ";
		}
		print json_encode($response);
	}
	else echo "Error";
	
?>