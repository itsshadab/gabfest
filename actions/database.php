<?php 
	$conn = mysqli_connect("localhost","root","","connecton");
	if (!$conn) {
		mysqli_error("Cannot connect to Database.\n Error: ".$conn);
	}
?>