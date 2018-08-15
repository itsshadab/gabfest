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
<script type="text/javascript">
	function editField(id, td) {
		var elem  = document.getElementById(id);
		td.parentElement.innerHTML = "<i class='fa fa-check' onclick='submitField("+id+")'></i>";
		var val = elem.innerHTML;
		elem.innerHTML = "<input type='text' class='form-control' value='"+val+"'>";
	}
	function submitField(name) {
		name = name.id;
		window.location.href="../actions/edit_general.php?"+name+"="+$("#"+name+" input").val();
	}
</script>
</head>
<body>
	<?php 
		include "nav.html"; 
	?>
	<div style="margin-top:180px;"></div>
	<div class="container row">
		<ul class="nav nav-pills nav-stacked col-xs-4">
			<li class="active"><a data-toggle="pill" href="#g_setting">General</a></li>
			<li><a data-toggle="pill" href="#security">Security and login</a></li>
			<li><a data-toggle="pill" href="#notification">Notification</a></li>
			<li><a data-toggle="pill" href="#mobile">Mobile</a></li>
		</ul>

		<div class="tab-content col-xs-8">
			<div id="g_setting" class="tab-pane fade in active">
				<h1>General Account Setting</h1>
				<table class="table">
					<tbody>
						<tr>
							<td>First Name</td>
							<td id="fname"><?php echo $_SESSION['fname']; ?></td>
							<td><i class="fa fa-pencil" onclick="editField('fname', this)"></i></td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td id="lname"><?php echo $_SESSION['lname']; ?></td>
							<td><i class="fa fa-pencil" onclick="editField('lname', this)"></i></td>
						</tr>
						<tr>
							<td>Username</td>
							<td id="uname"><?php echo $_SESSION['uname']; ?></td>
							<td><i class="fa fa-pencil" onclick="editField('uname', this)"></i></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="security" class="tab-pane fade">
				<h1>Security and login</h1>
				<table class="table">
					<tbody>
						<tr>
							<td>Change Your Password</td>
							<td id="psw"><?php echo $_SESSION['psw']; ?></td>
							<td><i class="fa fa-pencil" onclick="editField('psw', this)"></i></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="notification" class="tab-pane fade">
				<h1>Notification</h1>
				<button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#ongabfest">On GabFest</button>
				<div id="ongabfest" class="collapse">
					<h4>Sounds</h4>
					<p>play a Sound when Each new notification recieved.<input class="shift-right" type="checkbox" name=""></p>
					<p>Play a sound when a message is received.<input class="shift-right" type="checkbox" name=""></p>
					<hr>
					<h4>What You Get Notified About</h4>
					<p>Activity that involves you.<input class="shift-right" type="checkbox" name=""></p>
					<p>Close Friend Activity.<input class="shift-right" type="checkbox" name=""></p>
					<p>Birthdays.<input class="shift-right" type="checkbox" name=""></p>
					<p class="dropdown">On this day.
					<button class="btn btn-primary dropdown-toggle shift-right" type="button" data-toggle="dropdown">Highlights<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="#">Following</a></li>
						<li><a href="#">Intrests</a></li>
						<li><a href="#">Stared Company</a></li>
					</ul>
					</p>
				</div>
				<button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#onemail">On Email</button>
				<div id="onemail" class="collapse">
					<h4>What will you recieve.</h4>
					<input type="radio" id="first" name=""><label>All notification, Except the ones you have unsubscribed.</label><br>
					<input type="radio" id="first" name=""><label>Important Notification.</label><br>
					<input type="radio" id="first" name=""><label>only Notification about you account details.</label><br>
					<hr>
					<h4>Notification you have turned off.</h4>
					<p>You have not turn off any notification.</p>
				</div>
				<button type="button" class="btn btn-info form-control" data-toggle="collapse" data-target="#ondesktop">On Desktop</button>
				<div id="ondesktop" class="collapse">
					<h4>Desktop.</h4>
					<p>See your notifications in the corner of your computer screen, even when Facebook is closed.</p>
					<p>Chrome<button class="btn btn-success shift-right">Turn On</button></p>
					<hr>
					<h4>Mobile.</h4>
					<p>See all the notification on you mobile screen even if it locked <a href="#">learn more</a>.</p>
					<hr>
					<h4>Notification you have turned off.</h4>
					<p>You have not turn off any notification.</p>
				</div>
			</div>
			<div id="mobile" class="tab-pane fade">
				<h1>Mobile Setting</h1>
				<table class="table">
					<tbody>
						<tr>
							<td>Text Messeges</td>
							<td id="mobile">Send Text to:<?php echo $_SESSION['mobile']; ?></td>
							<td><i class="fa fa-pencil" onclick="editField('moble', this)"></i></td>
						</tr>
						<tr>
							<td>Mobile Pin</td>
							<td id="lname">Mobile PIN is turned off.</td>
							<td><i class="fa fa-pencil" onclick="editField('lname', this)"></i></td>
						</tr>
						<tr>
							<td>Day Time</td>
							<td id="uname">You will recieve Text from GabFest only from 7:00am to 10:00pm</td>
							<td><i class="fa fa-pencil" onclick="editField('uname', this)"></i></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>