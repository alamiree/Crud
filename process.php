<?php
$db = new mysqli("localhost", "root", "", "test");
$name = "";
$location = "";
$id = 0;
$edit_state = false;

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$location = $_POST['location'];
	$sql = "INSERT INTO info (name, location) VALUES ('$name', '$location')";
	$db->query($sql);
	header('location: index.php');
}
if(isset($_POST['update'])){
	$name = $_POST['name'];
	$location = $_POST['location'];
	$id = $_POST['id'];
	$sql = "UPDATE info SET name = '$name', location = '$location' WHERE id = '$id'";
	$db->query($sql);
	header('location: index.php');
}

$result = $db->query("SELECT * FROM info");
?>