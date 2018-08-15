<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<?php require "components/head.html"; ?>
</head>
<body>
<?php if (!isset($_SESSION['uid'])) {
		// print_r($_SESSION);
		include 'actions/loggin.php';
		include 'components/home.html';
	} else{ 
		include 'actions/logout.php';
		include 'components/newsfeed.html';
	}
?>
<script type="text/javascript" src="js/detecter.js"></script>
</body>
</html>