<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Action</title>
</head>
<body>
	<h1>Form Action</h1>
	<?php
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		if(empty($firstname))
		{
			echo "Fill first name properly" ;
			echo "<br>";

		}
		/*else
		{
			echo "<b>First name:</b> ". $firstname;
			echo "<br>";
		}*/
		if(empty($lastname))
		{
			echo "Fill last name properly";
			echo "<br>";
		}
		if(empty($_POST['gender']))
		{
			echo " Select your gender";
			echo "<br>";
		}
		if(empty($_POST['DOB']))
		{
			echo "Fill the DoB";
			echo "<br>";
		}
		if (empty($_POST['Religion'])) {
			echo "Fill yor religion";
			echo "<br>";
		}
		if(empty($_POST['email']))
		{
			echo "Input your email address";
			echo "<br>";
		}
		if(empty($_POST['username']))
		{
			echo "Input username";
			echo "<br>";
		}
		if (empty($_POST['password'])) {
			echo "Input password";
			echo "<br>";
		}
		if(empty($firstname)==false and empty($lastname)==false and empty($_POST['gender'])==false and empty($_POST['DOB'])==false and empty($_POST['Religion'])==false and empty($_POST['email'])==false and empty($_POST['username'])==false and empty($_POST['password'])==false){
			
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "user";
		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql = "INSERT INTO userinformation (FirstName,LastName,Gender,DOB,Religion,PresentAddress,PermanentAddress,Phone,Email,Weblink,username,password) VALUES (?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?)";

			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sssssssissss", $firstname,$lastname,$gender,$DOB,$religion,$presentAddress,$permanentaddress,$phone,$email,$weblink,$username,$password);
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$gender=$_POST['gender'];
			$DOB=$_POST['DOB'];
			$religion=$_POST['Religion'];
			$presentAddress=$_POST['presentaddress'];
			$permanentaddress=$_POST['permanentaddress'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$weblink=$_POST['weblink'];
			$username=$_POST['username'];
			$password=$_POST['password'];


			$res = $stmt->execute();
			if ($res) {
				echo "Registration successful";
			}
			else {
				echo "Failed to Register";
			}
		$conn->close();
		}
		function sanitize($data){
			$data=trim($data);
			$data=stripcslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		} 
	?>
</body>
</html>