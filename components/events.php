<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Events | GabFest</title>
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
	<div class="container">
		<div class="row">
			<div class="col-md-3 hidden-sm hidden-xs">
				<div class="control-label">
					<label>TIME</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time1" value="option1">
						All
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time2" value="option2">
						Today
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time3" value="option3">
						Tomorrow
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time4" value="option1">
						This Week
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time5" value="option2">
						This Weekend
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="time" id="time6" value="option3">
						Next Week
					</label>
				</div>
				<div class="control-label">
					<label>LOCATION</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue1" value="option1">
						Near Me
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue2" value="option2">
						New Delhi, India
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue3" value="option3">
						Noida, India
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue1" value="option1">
						Delhi, India
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue2" value="option2">
						Faridabad, India
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="venue" id="venue3" value="option3">
						Ghaziabad, India
					</label>
				</div>
				<div class="control-label">
					<label>CATEGORY</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category2" value="option2">
						Art - Film
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category3" value="option3">
						Books &bull; Literature
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category1" value="option1">
						Comedy
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category2" value="option2">
						Games
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category3" value="option3">
						Food - Drink
					</label>
				</div>
				<div class="radio">
					<label>
						<input type="radio" name="category" id="category1" value="option1">
						Religion - Spiritual
					</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">Host New Event</h4>
					</div>
					<div class="panel-body">
						<form class="form-horizontal" action="../actions/event.php" method="post" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="control-label col-md-3">Title</label>
								<div class="col-md-9">
									<input type="text" name="event-title" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">Venue</label>
								<div class="col-md-9">
									<input type="text" name="event-venue" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">Time</label>
								<div class="col-md-9">
									<input type="datetime-local" name="event-time" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">Category</label>
								<div class="col-md-9">
									<input type="text" name="event-category" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">Image</label>
								<div class="col-md-9">
									<div id="event-image-holder" style="background-image: url('../img/2.jpg')"></div>
									<input type="file" name="e_image" onchange="readURL(this, '#event-image-holder');" id="e_image">
								</div>
							</div>
							<button class="btn btn-info btn-block" type="submit" name="event-submit">Create Event</button>
						</form>
					</div>
				</div>
				<?php 
					include 'all-events.php';
				?>
			</div>
			<div class="col-md-3 ">
				<div class="well well-sm">
					<h4>Upcoming Events</h4>
				</div>
				<?php 
					include 'all-events.php';
				?>
			</div>
		</div>
	</div>		
</body>
</html>