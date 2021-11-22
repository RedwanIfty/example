<?php
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(empty($_POST['username']) or empty($_POST['password'])){
			echo "username and pass required";
		}
		else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "user";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM userinformation WHERE username = ? and password = ?";

		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $username, $password);
		$username = $_POST['username'];
		$password = $_POST['password'];
		$res = $stmt->execute();

		if ($res) {
			$data = $stmt->get_result();

			if ($data->num_rows > 0) {
				while ($row = $data->fetch_assoc()) {
					
						session_start();
						$_SESSION['username']=$_POST['username'];
							header("location:Welcome.php");	
				}
			}
			else {
				echo "Username and password do not match";
			}
		}
		else {
			echo "Error while executing the statement";
		}

		$conn->close();
		}
	}
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<title>Login Action</title>
  </head>
  <body>
  
  </body>
  </html>