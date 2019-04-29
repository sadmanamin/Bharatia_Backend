<html>
<head><title>Login | KosalGeek</title></head>
<body>
<h1>Login Example | <a href=”http://www.kosalgeek.com”>KosalGeek</a></h1>
<form action="" method="post">
    Type <input type="text" name="Type" value="" placeholder="Enter UserID" /><br/>

    <input type="submit" name="btnSubmit" value="Signup"/>
</form>
</body>
</html>

<?php
require_once __DIR__ . '/db_connect.php';
$db = new DB_CONNECT();
$Type=$_POST['Type'];
echo $Type;
$query;
if($Type=='Sale'){
    echo 1;
    $query=mysql_query("SELECT * FROM `Post` WHERE Type='Sale'");
}
else{
    echo 2;
    $query=mysql_query("SELECT * FROM `Post` WHERE 1");
}
if($query){
    echo 3;
    while($r = mysql_fetch_assoc($query)) {
        echo 4;
        $response[] = $r;
    }
    print json_encode($response);
}
else echo "failed";
?>


