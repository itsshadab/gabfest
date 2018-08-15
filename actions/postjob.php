<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "connecton");

// Check connection
if (!$conn) {
	echo "<script> alert('Failed') </script>";
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$organisation = $_POST['organisation'];
$location = $_POST['location'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$sql = "INSERT INTO jobs(name, organisation, location, mobile, email) VALUES('$name', '$organisation', '$location', '$mobile', '$email')";
	echo "<script>alert('Job has been Added.');</script>";
if (mysqli_query($conn, $sql)) {
	header("Location: ../components/postjob.php?job=added");
} else {
	$str = mysqli_error($conn);
	echo "<script>alert('Not Done');</script>";
	echo $str;
	exit;
}