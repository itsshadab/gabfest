<?php 
$conn = mysqli_connect("localhost", "root", "", "connecton");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM likes WHERE uid=".$_GET['uid']." AND pid=".$_GET['pid'];
if(mysqli_query($conn, $sql)){
	echo "Unliked Successfully";
	// header("Location: ../index.php");
} else {
	echo mysqli_error($conn);
}
?>