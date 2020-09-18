<?php
include('connect.php');
if(isset($_POST['login'])){
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) == 1){
		$_SESSION["username"] = $username;
		header('location: index.php');
	} else{
		header('location: login.php');
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset = "UTF-8" />
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel = "stylesheet" href = "css/bootstrap.css">
	<link rel = "stylesheet" href = "style.css">
</head>
<body>
<h1 class = "text-center heading">Login Form</h1>
<div class = "container">
	<form action = "login.php" method="POST" class = "form-horizontal custom-form">
			<div class = "form-group">
				<label>Username: </label>
				<input type="text" name="username" class = "form-control" placeholder="Enter your username">
			</div>
			<div class = "form-group">
				<label>Password: </label>
				<input type="password" name="password" class = "form-control" placeholder="Enter your password">
			</div>
			<input type="submit" class = "btn btn-info" name="login" value = "Login">
	</form>
</div>
<script src = "js/jquery-3.2.1.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/script.js"></script>
</body>
</html>