<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Action</title>
</head>
<body>

	<h1>Form Action</h1>

	<table>
	<?php 
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender=$_POST['gender'];

		if (empty($firstname) ) {
			echo "Fill up first name". "<br><br>";
		}
		if (empty($lastname)) {
			echo "Fill last name";
		}
		else {
			$firstname = sanitize($firstname);
			$lastname = sanitize($lastname);
			
			$handle1 = fopen("data.json", "a");

			$arr1 = array('firstname' => $firstname, 'lastname' => $lastname,'gender' => $gender);
			$encode = json_encode($arr1);

			$res = fwrite($handle1, $encode . "\n");

			if ($res) {
				echo "Successfully saved";
				echo "<br><br>";

				echo "First name: " . sanitize($firstname);
				echo "<br><br>";
				echo "Last name: ".$lastname;
				echo "<br><br>";
				echo "Gender : " .$gender;
			}
			else {
				echo "Error while saving";
			}
		}

		function sanitize($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
</body>
</html>
