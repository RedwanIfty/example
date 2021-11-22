<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Form</title>
</head>
<body>
	<h1>Registration Form</h1>
	<form action="formAction.php" method="POST">
		<fieldset>
		<h1><b>Basic Information:</b></h1>
		<br><br>
		<hr>
		First Name: <input type="text" name="firstname">
		<br>
		<br>
		Last Name: <input type="text" name="lastname">
		<br>
		<br>

		Gender: 
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female
		<br>
		<br>
		
		DOB: 
		<input type="date" id="DOB" name="DOB">
		<br>
		<br>
		Religion: 
		<select name="Religion" id="religion">
			<option value="Muslim">Muslim
			</option>
		
			<option value ="Hindu">Hindu</option>
				<option value ="Bodhu">Bodhu</option>
			<option value ="Cristan">Cristan</option>
		
		</select>
		<br>
		<br>
		<hr>
		<h1><b>Contact Information:</b></h1>
		<br>
		<br>
		Present address:
		<textarea id="Present address" name="presentaddress"></textarea>
		<br>
		<br>
		Permanent address:
		<textarea id="Permanent address" name="permanentaddress"></textarea>
		<br>
		<br>
		Phone number:
		<input type="tel" id="phone" name="phone">
		<br>
		<br>
		Email:
		<input type="Email" id="email" name="email">
		<br>
		<br>

		Personal weblink:
		<input type="text" name="weblink">
		<br><br>
		<hr>
		<h1><b>Account Information:</b></h1>
		<br><br>
		Username:
		<input type="text" name="username">
		<br><br>
		
		Password:
		<input type="password" name="password">
		<br><br>
		<hr>
		<input type="submit" name="submit" value="Register">
		</fieldset>
	</form>

</body>
</html>