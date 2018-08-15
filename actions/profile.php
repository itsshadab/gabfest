<?php
session_start();
$target_dir = "uploads/profile/";
$target_file = $target_dir.basename($_FILES["dp"]["name"]);
$uploadOk = 1;
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
// if ($_FILES["dp"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// } else {
// if everything is ok, try to upload file
if (move_uploaded_file($_FILES["dp"]["tmp_name"], $target_file)) {
	$conn = mysqli_connect("localhost", "root", "", "connecton");

	// Check connection
	if (!$conn) {
		echo "<script> alert('Failed') </script>";
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "UPDATE members SET src='actions/$target_file' WHERE uid=".$_SESSION['uid'];
	if (mysqli_query($conn, $sql)) {
		// echo "Updated";
		// echo "<script>alert(\"UPDATE members SET fname='$fname', lname='$lname', headline=$headline, dob=$dob, status=$status, state=$state, country=$country WHERE uid=$uid\");</script>";
		$_SESSION['src'] = "actions/".$target_file;
		header("Location: ../components/profile.php");
	} else {
		$str = mysqli_error($conn);
		echo "<script>alert('Not Done');</script>";
		echo $str;
		exit;
		// echo "<script>alert('Error: ".$str."');</script>";
		// echo ;
	}
// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
	echo $target_file;
	echo "<script>alert('Not Done');</script>";
    // echo "Sorry, there was an error uploading your file.";
}
?>
