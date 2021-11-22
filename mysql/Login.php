<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<h1 align="middle">Welcome to log in page</h1>
<form action="LoginAction.php" method="POST">
<fieldset>
	<legend>*User Name:</legend>
	<input type="text" name="username">
	<br><br>
	<legend>*Password:</legend>
	<input type="password" name="password">
	<br><br>
	<input type="checkbox" name="remember">remember
	<br><br>
	
	<input type="submit" name="login" value="login">
	<br><br>
</fieldset>
</form>
</body>
</html>