<?php session_start();

	if (!isset($_SESSION['username'])){
		header("Location:index.php");
		
	}

?>


<?php 
	if (isset($_POST['startChat'])){
		$con = mysqli_connect("localhost","root","chat");
		$toUser = htmlentities($_POST['toUser']);
		$q = "SELECT * FROM logins WHERE username = '".$toUser."'";
		$query = mysqli_query($con,$q);
		$isUser = mysqli_fetch_assoc($query);
		
		if (!$isUser){
			echo "Sorry cannot find that user";
		}else{
			$q = "CREATE TABLE ".$_SESSION['username']."_".$toUser."(id INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT, message VARCHAR(1000), userFrom VARCHAR(20))";
			mysqli_query($con,$q);
			$message = htmlentities($_POST['message']);
			$q = "INSERT INTO ".$_SESSION['username']."_".$toUser."(message,userFrom) VALUES ('".$message."','".$_SESSION['username']."')";
			mysqli_query($con,$q);
			$q = "INSERT INTO chats (user1, user2) VALUES ('".$_SESSION['username']."','".$toUser."')";
			mysqli_query($con,$q);
		}
		mysqli_close($con);
	}
	?>
	
	
	<html>
		<head>
			<title>Chat Part</title>
		</head>	
		<body>
			<form action='' method='post'>
				<input type="text" name="toUser" placeholder="To: " required></br>
				<textarea rows="10" clos="100" name="message" required>Messages...</textarea></br>
				<input type="submit" name="startChat" value="Begin Chat">
			</form>
			<?php
				$con = mysqli_connect("localhost","root","","chat");
				$q = "SELECT * FROM chats WHERE user1 = '".$_SESSION['username']."' OR user2 = '".$_SESSION['username']."'";
				$query = mysqli_query($con,$q);
				while($row = mysqli_fetch_assoc($query)){
					echo "<a href='indChat.php?user1=".$row['user1']."&user2=".$row['user2']."'>Chat between: ".$row['user1']." and ".$row['user2']."</a><br>";
				}
			
				mysqli_close($con);
			?>
		</body>
	</html>
	
	
	