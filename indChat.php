<?php session_start();
if (isset($_POST['submit']))
	$user1 = htmlentities($_GET['user1']);
	$user2 = htmlentities($_GET['user2']);
	
	$message= htmlentities($_POST['message']);
	$con = mysqli_connect("localhost","root","","chat");
	$q = "INSERT INTO " .$user1."_"$user2."(message , userFrom) VALUES ('".$message."','".$_SESSION['username']."')";
}
?>

<!DOCTYPE html>
<html>
	<head>
	</head>
	
	<body>
	
	<form action='' method="post">
		<textarea rows="5" cols="50" name="message">Message...
		<input type="submit" name = "submit" value="Send">
	</form>


<?php
	$user1 = htmlentities($_GET['user1']);
	$user2 = htmlentities($_GET['user2']);
	
	$con = mysqli_connect("localhost","root","","chat");
	$q = "SELECT * FROM ".$user1."_".$user2." ORDER BY id DESC");
	while($row= mysqli_fetch_assoc($q))){
		echo "From : ".$row['userFrom']."<br>";
		echo "Message : ".$row['message']."<br>"
	}

?>