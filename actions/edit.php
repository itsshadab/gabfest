<?php 
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "connecton");

	// Check connection
	if (!$conn) {
		echo "<script> alert('Failed') </script>";
	    die("Connection failed: " . mysqli_connect_error());
	}
	$keys = array_keys($_GET);
	// echo $keys[0];
	$data = $_GET[$keys[0]];

	$sql = "UPDATE members SET ".$keys[0]."='$data' WHERE uid=".$_SESSION['uid'];
	if (mysqli_query($conn, $sql)) {
		// echo "Updated";
		// echo "<script>alert(\"UPDATE members SET fname='$fname', lname='$lname', headline=$headline, dob=$dob, status=$status, state=$state, country=$country WHERE uid=$uid\");</script>";
		$_SESSION[$keys[0]] = $data;
		header("Location: ../components/profile.php");
	} else {
		$str = mysqli_error($conn);
		echo "<script>alert('Not Done');</script>";
		echo $str;
		exit;
		// echo "<script>alert('Error: ".$str."');</script>";
		// echo ;
	}
?>
								