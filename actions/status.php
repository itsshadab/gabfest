<?php
if (isset($_POST['post-submit'])) {
	$conn = mysqli_connect("localhost", "root", "", "connecton");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO posts(uid, msg) VALUES(". $_SESSION['uid'] .", '". $_POST['post'] ."')";
	if(mysqli_query($conn, $sql)) {
		// echo "<script>alert('Done');</script>";
	} else{
		echo mysqli_error($conn);
	}
}
?>
