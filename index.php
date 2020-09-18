<?php
include('connect.php');
include('process.php');
session_start();
if(isset($_SESSION["username"])){

} else{
	header('location: login.php');
}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$sql = "SELECT * FROM `info` WHERE id = $id";
	$result = $db->query($sql);
	$row = $result->fetch_array();
	$name = $row['name'];
	$location = $row['location'];
	$edit_state = true;
}
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$db->query("DELETE FROM info WHERE id = $id");
	header('location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset = "UTF-8" />
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel = "stylesheet" href = "bootstrap.css">
	<link rel = "stylesheet" href = "style.css">
</head>
<body>
<h1 class = "text-center heading">Home Page(Add, Edit and Delete info)</h1>
<h4><?php echo "welcome " . $_SESSION["username"]; ?> Click here to <a href="logout.php">logout</a></h4>
<table class = "table custom-table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['location']; ?></td>
			<td><a class = "btn btn-info" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
			<a class = "btn btn-danger" href="index.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<form action = "index.php" method="POST" class = "form-horizontal custom-form">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div class = "form-group">
				<label>Name: </label>
				<input type="text" name="name" class = "form-control" placeholder="Enter your name" value="<?php echo $name; ?>">
			</div>
			<div class = "form-group">
				<label>Location: </label>
				<input type="text" name="location" class = "form-control" placeholder="Enter your location" value="<?php echo $location; ?>">
			</div>
			<?php if($edit_state == false): ?>
			<button name = "save" class = "btn btn-info">Save</button>
			<?php else: ?>
				<button name = "update" class = "btn btn-info">Update</button>
			<?php endif; ?>

</form>

<script src = "jquery-3.2.1.js"></script>
<script src = "bootstrap.min.js"></script>
<script src = "script.js"></script>
</body>
</html>
