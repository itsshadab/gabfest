<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php require 'components/head.html'; ?>
</head>
<body>

	<?php 
		include 'actions/logout.php';
		include 'actions/edit.php';
		include "components/nav.html";
	?>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?uid=<?php echo $_SESSION['uid']; ?>">
			<div class="panel panel-lg panel-danger" style="margin:80px 0px;">
				<div class="panel-heading">
					<h4>Profile detail</h4>
				</div>
				<div class="panel-body">
					<img src="img/img_avatar2.png" height="200px"><h2> <?php echo isset($_SESSION['fname']) ? $_SESSION['fname']." ".$_SESSION['lname'] : "Dummy User"; ?> </h2>
					<p>Work</p>
					<p>Education</p>
					<p>dd mm yyyy</p>
					<p>Country</p>				
				</div>
			</div>
			<div class="well">
				<h2>Personal Info</h2>
				<div class="row">
					<div class="col-md-3">
						<input class="form-control" name="fname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : "Dummy User"; ?>">
					</div>
					<div class="col-md-3">
						<input class="form-control" type="" name="lname" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['lname'] : "Dummy User"; ?>">
					</div>
					<div class="col-md-3">
						<input class="form-control" name="headline" value="<?php echo isset($_SESSION['headline']) ? !empty($_SESSION['headline']) ? $_SESSION['headline'] : 'Your Professional Headline' : 'Your Professional Headline'; ?>">
						<!-- <input class="form-control" name="" value="<?php //echo (isset($_SESSION['headline']) and empty($_SESSION['headline'])) ? $_SESSION['headline'] : "Your professional headline"; ?>"> -->
					</div>
					<div class="col-md-3">
						<input class="form-control" type="text" name="dob" value="<?php echo isset($_SESSION['dob']) ? !empty($_SESSION['dob']) ? $_SESSION['dob'] : 'DOB' : 'DOB'; ?>">
					</div>
				</div>
			</div>
			<div class="well">
				<h2>Education</h2>
				<div class="row">
					<div class="col-md-3">
						<input class="form-control" name="" value="School">
					</div>
					<div class="col-md-3">
						<input class="form-control" name="" value="High School">
					</div>
					<div class="col-md-3">
						<input class="form-control" name="" value="Field of Study">
					</div>
					<div class="col-md-3">
						<input class="form-control" name="" value="Grade">
					</div>
				</div>
			</div>
			<div class="well">
				<h2>Additional info</h2>
				<div class="row">
					<div class="col-md-4">
						<input class="form-control" name="status" value="<?php echo isset($_SESSION['status']) ? !empty($_SESSION['status']) ? $_SESSION['status'] : 'Enter Status' : 'Enter Status'; ?>">
					</div>
					<div class="col-md-4">
						<input class="form-control" name="state" value="<?php echo isset($_SESSION['state']) ? !empty($_SESSION['state']) ? $_SESSION['state'] : 'State' : 'State'; ?>">
					</div>
					<div class="col-md-4">
						<input class="form-control" name="country" value="<?php echo isset($_SESSION['country']) ? !empty($_SESSION['country']) ? $_SESSION['country'] : 'Country' : 'Country'; ?>">
					</div>
				</div>
			</div>
			<div class="well">
				<h2>Skill</h2>
					<p contenteditable="true">Java,Web Dev</p>
					<input class="form-control" name="" value="Java,Web Dev">

			</div>
			<div class="well">
				<h2>Languages</h2>
					<input class="form-control" name="" value="English">
			</div>
			<div class="well">
				<h2>Course</h2>
					<input class="form-control" name="" value="Software Engg">
			</div>
			<button type="submit" class="btn btn-default btn-success" name="submit_btn"><span class="glyphicon glyphicon-ok">Submit</span></button>
		</form>
	</div>

<link rel="stylesheet" type="text/css" href="css/main.css">

</body>
</html>