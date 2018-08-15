<?php
session_start();
$target_dir = "uploads/events/";
$target_file = $target_dir.basename($_FILES["e_image"]["name"]);
$uploadOk = 1;
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
// if ($_FILES["e_image"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// } else {
// if everything is ok, try to upload file
if (move_uploaded_file($_FILES["e_image"]["tmp_name"], $target_file)) {
	$conn = mysqli_connect("localhost", "root", "", "connecton");

	// Check connection
	if (!$conn) {
		echo "<script> alert('Failed') </script>";
	    die("Connection failed: " . mysqli_connect_error());
	}

	$title = $_POST['event-title'];
	$venue = $_POST['event-venue'];
	$time = $_POST['event-time'];
	$time = str_replace("T", " ", $time);
	$daytime = explode(" ", $time);
	$day = explode("-", $daytime[0]);
	$time = $day[0] . "-" . $day[2] . "-" . $day[1] . " " . $daytime[1];
	$time .= ":00";
	$category = $_POST['event-category'];
	echo $time."<br>";

	$sql = "INSERT INTO events(title, venue, time, e_image, category) VALUES('$title', '$venue', '$time', 'actions/$target_file', '$category')";
	if (mysqli_query($conn, $sql)) {
		// echo "Updated";
		// echo "<script>alert(\"UPDATE members SET fname='$fname', lname='$lname', headline=$headline, dob=$dob, status=$status, state=$state, country=$country WHERE uid=$uid\");</script>";
		header("Location: ../components/events.php?event=added");
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
