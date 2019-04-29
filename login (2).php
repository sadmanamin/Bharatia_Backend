<?php
 
/*
 * Following code will get single product details
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();

//echo $_GET["Email"];
 
// check for post data
//echo 0;
//if (!empty($_GET['Email']) && !empty($_GET['Password'])) {
    
    $Email= $_GET['Email'];
    
    $Password=$_GET['Password'];
    //echo "1";
    // get a product from products table
    //if(empty($_GET['Password'])) $Password="magi".$Email;
    if(empty($_GET['Password'])) $Password="User".$Email;
    
    
    $result = mysql_query("SELECT * FROM User WHERE Email = '$Email' AND Password ='$Password'");
     if (!empty($result)) {
        //echo 2;
        if (mysql_num_rows($result) == 1) {
 
            $response = mysql_fetch_assoc($result);
            $_SESSION['user'] = $response['UserID'];
            print json_encode($_SESSION['user']);
            echo " Success ";
 
            
        } else {
            //echo 3;
            $response["success"] = 0;
            $response["message"] = "No id found";
 
            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        //echo 4;
        // no product found
        $response["success"] = 0;
        $response["message"] = "No id found";
 
        // echo no users JSON
        echo json_encode($response);
    }
    
    
    


?>