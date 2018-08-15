<?php 
	if (isset($_GET['logged']) && $_GET['logged'] == "false") {
		session_destroy();
		header("Location: index.php");
	}
?>