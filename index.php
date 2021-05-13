<?php session_start(); 
<!DOCTYPE html>
<html>

	<head>
		<title>chat System</title>
	</head>
	
	<body>
		<form action="login.php" method = "post">
			<input type = "text" name = "user" placeholder="Username" required>
			<input type = "password" name = "pass" value = "Pass" required>
			<input type = "submit" name = "submit" value="Login">
		</form>	
	</body>
</html>