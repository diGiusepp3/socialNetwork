<?php
	
	require ('../../ini.inc');
	
	if (isset($_POST['submit'])) {
		$email = $conn->real_escape_string($_POST['email']);
		$password = $conn->real_escape_string($_POST['password']);
		
		$sql= "SELECT  `id`, `email`, `password`, `profileImage`, `firstName`, `middleName`, `lastName` FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			session_start();
			$row = $result->fetch_assoc();
			$userId = $row['id'];
			$name = $row['firstName'];
			$middleName = $row['middleName'];
			$lastName = $row['lastName'];
			$username = $name;
			$profileImage = $row['profileImage'];
			$_SESSION['userId'] = $userId;
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $name;
			$_SESSION['profileImage'] = $profileImage;
			
			header('Location: /');
		} else {
			echo "<p class='error'>error</p>";
		}
		
	}

