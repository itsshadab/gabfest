<?php if (isset($_POST['su-submit-btn'])) {
	session_start();
		include 'database.php';
		$sql = "INSERT INTO members (fname, lname, uname, psw, mobile, gender, dob, headline, city, country) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['uname']."','".$_POST['psw']."','".$_POST['mobile']."','".$_POST['gender']."','".$_POST['dob']."','".$_POST['headline']."','".$_POST['city']."','".$_POST['country']."')";
		$query = mysqli_query($conn, $sql);
		if ($query == TRUE) {
			$_SESSION['fname'] = $_POST['fname'];
			$_SESSION['lname'] = $_POST['lname'];
			$_SESSION['uname'] = $_POST['uname'];
			$_SESSION['mobile'] = $_POST['mobile'];
			$_SESSION['gender'] = $_POST['gender'];
			$_SESSION['dob'] = $_POST['dob'];
			$_SESSION['headline'] = $_POST['headline'];
			$_SESSION['city'] = $_POST['city'];
			$_SESSION['country'] = $_POST['country'];
			$_SESSION['uid'] = mysqli_insert_id($conn);

			header("Location: ../index.php");
		} else {
			header("Location: ../index.php?error=connection&msg=".mysqli_error($conn));
		}
}
?>