<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 

 
    $First = $_GET['First'];
    $Last = $_GET['Last'];
    $Username = $_GET['Username'];
    $Email = $_GET['Email'];
    $Password = $_GET['Password'];
    $Photo=$_GET['Photo'];
    $Phone = $_GET['Phone'];
    if(empty($_GET['Password'])){
        $Password="User".$Email;
    }
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    
   
    // mysql inserting a new row
    
    $result = mysql_query("INSERT INTO `User`(`UserID`, `First`, `Last`, `Username`, `Email`, `Password`, `Photo`, `Phone`) VALUES (null,'$First','$Last','$Username', '$Email', '$Password','$Photo',$Phone)");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
            $r = mysql_query("SELECT * FROM User WHERE Email = '$Email' AND Password ='$Password'");
            if($r){
            $response = mysql_fetch_assoc($r);
            $_SESSION['user'] = $response['UserID'];
            print json_encode($_SESSION['user']);
            echo " Success ";
            }
            
 
        // echoing JSON response
        //echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops!";
 
        // echoing JSON response
        echo json_encode($response);
    }
    
    
// } else {
//     // required field is missing
//     $response["success"] = 0;
//     $response["message"] = "Required field(s) is missing";
 
//     // echoing JSON response
//     echo json_encode($response);
// }
?>

