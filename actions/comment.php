<?php 
$conn = mysqli_connect("localhost", "root", "", "connecton");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments(uid, pid, comment) VALUES (".$_GET['uid'].",".$_GET['pid'].",".$_GET['comment']")";
if(mysqli_query($conn, $sql)){
	// header("Location: ../index.php");
} else {
	echo mysqli_error($conn);
}
?>