<?php 
if (isset($_POST['li-submit-btn'])) {
	include 'database.php';
	if ($_POST['psw'] == mysqli_fetch_assoc(mysqli_query($conn, "SELECT psw FROM members WHERE uname='".$_POST['uname']."'"))['psw']) {
		$query = mysqli_query($conn, "SELECT * FROM members WHERE uname='".$_POST['uname']."' AND psw='".$_POST['psw']."'");
		if ($query == TRUE) {
			$user = mysqli_fetch_assoc($query); 
			$_SESSION['fname'] = $user['fname'];
			$_SESSION['lname'] = $user['lname'];
			$_SESSION['uname'] = $user['uname'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['uid'] = $user['uid'];
			$_SESSION['headline'] = $user['headline'];
			$_SESSION['workplace'] = $user['workplace'];
			$_SESSION['dob'] = $user['dob'];
			$_SESSION['status'] = $user['status'];
			$_SESSION['city'] = $user['city'];
			$_SESSION['country'] = $user['country'];
			$_SESSION['mobile'] = $user['mobile'];
			$_SESSION['yob'] = $user['yob'];
			$_SESSION['gender'] = $user['gender'];
			$_SESSION['lang'] = $user['lang'];
			$_SESSION['src'] = $user['src'];
			header("Location: index.php");
		}
	}
}
?>