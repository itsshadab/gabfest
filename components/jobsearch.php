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
	<div class="">
		<div class="col-sm-8 job-search">
			<h3>Advance Job Search</h3>
			<form class="well well-lg">
				<input class="form-control" type="text" name="Keyword" placeholder="Keyword">
					<div class="row">
						<div class="col-sm-6">						
							<select class="form-control">
								<option selected>Exp (years)</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
							</select>
						</div>
						<div class="col-sm-6">						
							<input class="form-control" type="text" name="location" placeholder="Location">
						</div>
					</div>
				<input class="form-control" type="text" name="Function" placeholder="Function">
				<input class="form-control" type="text" name="Role" placeholder="Role">
				<input class="form-control btn btn-info" type="submit" name="" value="Search">
			</form>
			<div>
				<ul class="nav nav-pills nav-justified">
					<li class="active"><a data-toggle="pill" href="#pill1">Jobs you may like</a></li>
					<li><a data-toggle="pill" href="#pill2">Agent Jobs for you</a></li>
					<li><a data-toggle="pill" href="#pill3">Network job for you</a></li>
				</ul>
				<div class="tab-content">
					<div id="pill1" class="tab-pane fade in active">

						<?php include 'all-jobs.php'; ?>

					</div>
					<div id="pill2" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content.</p>
					</div>
					<div id="pill3" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Some content.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col=sm-4"></div>
	</div>
</body>
</html>