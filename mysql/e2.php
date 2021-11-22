<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Weblink validation</title>
</head>
<body>
	<?php 
		if ($_SERVER['REQUEST_METHOD']==='POST') {
			// code...
			$url = $_POST['weblink'];
			if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    		echo("$url is a valid URL");
			}
			 else {
    			echo("$url is not a valid URL");
			}
		}
	 ?>
</body>
</html>