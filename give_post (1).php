<?php

/*<html>
<head><title>Login | NUNU</title></head>
    <body>
        <h1>Login NUNU</h1>
        <form action="" method="post">
            UserID <input type="number_format" name="UserID" value="" placeholder="Enter UserID" /><br/>
            Room_No <input type="number_format" name="Room_No" value="" placeholder="Enter Room_No" /><br/>
            Size <input type="number_format" name="Size" value="" placeholder="Enter Flat Size" /><br/>
			Price <input type="number_format" name="Price" value="" placeholder="Enter Price" /><br/>
			Lat <input type="number_format" name="Lat" value="" placeholder="Enter Price" /><br/>
			Lon <input type="number_format" name="Lon" value="" placeholder="Enter Price" /><br/>
			Area <input type="text" name="Area" value="" placeholder="Enter Area" /><br/>
			Address <input type="text" name="Address" value="" placeholder="Enter Address" /><br/>
            Description <input type="text" name="Description" value="" placeholder="Enter Description" /><br/>
			Phone_No <input type="number_format" name="Phone_No" value="" placeholder="Enter Phone No" /><br/>
			
			Email <input type="text" name="Email" value="" placeholder="Enter Email" /><br/>
			Type1 <input type="text" name="Type1" value="" placeholder="Enter Email" /><br/>
			Type2 <input type="text" name="Type2" value="" placeholder="Enter Email" /><br/>
            <input type="submit" name="btnSubmit" value="Signup"/>
        </form>
        
*/

 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
//echo $_POST['Room_No']; 
// check for required fields

    $UserID=$_GET['UserID'];
    $Room_No = $_GET['Room_No'];
    $Price = $_GET['Price'];
    $Description = $_GET['Description'];
    $Description=str_replace('_', ' ', $Description);
	$Size = $_GET['Size'];
    $Phone_No = $_GET['Phone_No'];
    $Email = $_GET['Email'];
    $Address = $_GET['Address'];
    $Address=str_replace('_', ' ', $Address);
    $Area=$_GET['Area'];
    $Area=str_replace('_', ' ', $Area);
    $Type1=$_GET['Type1'];
    $Type2=$_GET['Type2'];
    $Lat=$_GET['Lat'];
    $Lon=$_GET['Lon'];
    $Photo=$_GET['Photo'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    //echo "1";
 
    // mysql inserting a new row
    if(empty($_GET['Lat']) || empty($_GET['Lon'])){
    $result = mysql_query("INSERT INTO `Post`(`PostID`, `UserID`, `Room_No`, `Size`, `Price`, `Area`, `Address`, `Description`, `Lat`, `Lon`, `Availability`, `Phone_No`, `Email`, `Type1`, `Type2`,`CoverPhoto`,`Date`) VALUES (null,$UserID,$Room_No,$Size,$Price,'$Area','$Address','$Description',0,0,TRUE,'$Phone_No','$Email','$Type1','$Type2','$Photo',CURDATE()");
    }
    else $result = mysql_query("INSERT INTO `Post`(`PostID`, `UserID`, `Room_No`, `Size`, `Price`, `Area`, `Address`, `Description`, `Lat`, `Lon`, `Availability`, `Phone_No`, `Email`, `Type1`, `Type2`,`CoverPhoto`,`Date`) VALUES (null,$UserID,$Room_No,$Size,$Price,'$Area','$Address','$Description',$Lat,$Lon,TRUE,'$Phone_No','$Email','$Type1','$Type2','$Photo',CURDATE())");
    
    //echo "2";
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        
        //new
        $query = mysql_query("SELECT PostID FROM Post WHERE UserID=$UserID ORDER BY PostID DESC LIMIT 1");
        if($query){
        		while($r = mysql_fetch_assoc($query)) {
        		$response[] = $r;
        		//echo "1 ";
        		}
        		print json_encode($response);
        }
        else echo "Error";
        //newEnd
        
        $response["success"] = 1;
        $response["message"] = "To-Let successfully posted!";
        $q1=mysql_query("UPDATE `User` SET totalPost=totalPost+1 WHERE UserID=$UserID");
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred. Some fields might be missing";
 
        // echoing JSON response
        echo json_encode($response);
    }

?>

        