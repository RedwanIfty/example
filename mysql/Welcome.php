<?php
	session_start();
	if($_SESSION['username']==false)
	{
		header("location:Login.php");
	}
	echo "<h1>Welcome, " .$_SESSION['username']."</h1>"; 
	echo "<br><br>";
	echo "";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Welcome</title>
 </head>
 <body>
 
 </body>
 </html>