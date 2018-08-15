<?php 
$conn = mysqli_connect("localhost", "root", "", "connecton");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO likes(uid,pid) VALUES(".$_GET['uid'].",".$_GET['pid'].")";
if(mysqli_query($conn, $sql)){
	// header("Location: ../index.php");
} else {
	echo mysqli_error($conn);
}
?>