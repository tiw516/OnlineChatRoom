<?php session_start();

if (isset($_POST['user']) && isset($_POST['pass'])){
	$user = htmlentities($_POST['user']);
	$pass = htmlentities($_POST['pass']);
	
	$con = mysqli_connect("localhost","root","","chat");
	
	$query = "SELECT * FROM logins WHERE username = '".$user."'";
	
	$q = mysqli_query($con, $query);
	$queryResult = mysqli_fetch_assoc($q);
	
	if ($pass == $queryResult['password']){
		$_SESSION['username'] = $user;
		header("Location:chat.php");
		
	}
	
}
	
echo "Wrong username or password. Click <a href='index.php'>here</a> to return.";
	
	


?>