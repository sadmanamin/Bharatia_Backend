
<?php
					session_start();
					$servername = "localhost";
					$username = "sadmanadmin_sadman";
					$password = "Sadony1910";
					$dbname = "sadmanadmin_bharatia";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
				
					
					$sql = "SELECT * FROM Post WHERE Availability=TRUE AND Type1='Rent'";
					$result = $conn->query($sql);
						
					if ($result->num_rows > 0){
						echo 550;
						while($row = $result->fetch_assoc()){
							$response[] = $result; 
						}
					}
					else {
						echo "0 results";
					}

					$conn->close();
?>