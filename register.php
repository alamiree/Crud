<?php
include('connect.php');
session_start();

if(isset($_POST['register'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	if($password == $password2){
		$sql = "INSERT INTO `users`(first_name, last_name, username, email, password) VALUES ('$firstname', '$lastname', '$username', '$email', '$password')";
		$conn->query($sql);
		header('location: login.php');
	} else{
		header('location: register.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration form</title>
	<meta charset = "UTF-8" />
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel = "stylesheet" href = "css/bootstrap.css">
	<link rel = "stylesheet" href = "style.css">
</head>
<body>
<h1 class = "text-center heading">Registration Form</h1>
<div class = "container">

		<form action = "register.php" method="POST" class = "form-horizontal custom-form">
		
			<div class = "form-group">
				<label>First Name: </label>
				<input type="text" name="firstname" class = "form-control" placeholder="Enter your first name">
			</div>
			<div class = "form-group">
				<label>Last Name: </label>
				<input type="text" name="lastname" class = "form-control" placeholder="Enter your last name">
			</div>
			<div class = "form-group">
				<label>Username: </label>
				<input type="text" name="username" class = "form-control" placeholder="Enter your username">
			</div>
			<div class = "form-group">
				<label>Email: </label>
				<input type="email" name="email" class = "form-control" placeholder="Enter your email">
			</div>
			<div class = "form-group">
				<label>Password: </label>
				<input type="password" name="password" class = "form-control" placeholder="Enter your password">
			</div>
			<div class = "form-group">
				<label>Password again: </label>
				<input type="password" name="password2" class = "form-control" placeholder="Enter your password again">
			</div>
			<input type="submit" class = "btn btn-info" name="register" value = "Register">
		</form>
	

</div>

<script src = "js/jquery-3.2.1.js"></script>
<script src = "js/bootstrap.min.js"></script>
<script src = "js/script.js"></script>
</body>
</html>