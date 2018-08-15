<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>GabFest</title>
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.6-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.6-dist/font-awesome-4.7.0/css/font-awesome.css">
<script type="text/javascript" src="../bootstrap-3.3.6-dist/js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php 
		include "nav.html"; 
	?>
	<div style="margin-top:80px;"></div>
	<div class="row job-image img img-responsive">
		<div class="col-sm-8"></div>
		<div class="col-sm-4 job_post">
			<h4>Have Us Call You</h4>
			<form  action="../actions/postjob.php" method="post" enctype="multipart/form-data">
				<input class="form-control" type="text" placeholder="Name" name="name" required>
				<input class="form-control" type="text" placeholder="Organisation" name="organisation" required>
				<input class="form-control" type="text" placeholder="Location" name="location" required>
				<input class="form-control" type="text" placeholder="Mobile number" name="mobile" required>
				<input class="form-control" type="text" placeholder="Email" name="email" required>
				<input class="btn btn-success form-control" type="submit">
			</form>
			<div>
				<p>Contact Us at: +91 9643664881</p>
				<p>Email: itss.shadab@gmail.com</p>
			</div>
		</div>
	</div>
	<div class="job-nav" id="myJob-nav">
		<a href="#">SPECIAL OFFERS</a>
		<a href="#">JOB POSTING</a>
		<a href="#">RESUME DATABASE ACCESS</a>
		<a href="#">CUSTOMER SPEAK</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
	</div>

<script type="text/javascript">	
	function myFunction() {
	    var x = document.getElementById("myJob-nav");
	    if (x.className === "job-nav") {
	        x.className += " responsive";
	    } else{
	        x.className = "job-nav";
	    }
	}
</script>
</body>
</html>