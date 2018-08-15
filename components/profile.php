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
		window.location.href="../actions/edit.php?"+name+"="+$("#"+name+" input").val();
	}
</script>	
</head>
<body>
	<?php 
		include "nav.html"; 
		include "changePhoto.html"; 
	?>
	<div style="margin-top:80px;"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row well">
					<div class="col-md-4">
			        	<?php
			        	if(isset($_SESSION['src']))
				        	$dp = $_SESSION['src']; 
				        else 
				        	$dp = 'actions/uploads/temp.png';
			        	?>
						<div class="user-pic" style="background-image: url('../<?php echo $dp; ?>')">
							<div class="info" data-toggle='modal' data-target='#changePhotoModal'><h3>Change Photo</h3></div>
						</div>
						<p>Profile Completion</p>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%"> 70%</div>
						</div>	
					</div>
					<div class="col-md-8">
						<h1 style="color:skyblue;"><?php echo isset($_SESSION['fname']) ? $_SESSION['fname']." ". $_SESSION['lname']: "Dummy User"; ?></h1>
						<?php
						if(isset($_SESSION['workplace']))
							$h_info = $_SESSION['headline']." at ".$_SESSION['workplace'];
						else
							$h_info = $_SESSION['headline'];
						?>
						<p><?php echo $h_info ?></p>
						<p>New Delhi, Delhi, India</p>
					</div>
				</div>
				<hr>
				<div class="panel-group" id="accordion">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color:skyblue; font-size: 25px;">About</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body">
								<table class="table">
									<tbody>
<!-- 										<tr>
											<td>Username</td>
											<td id="email"><?php echo $_SESSION['uname']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('uname', this)"></i></td>
										</tr>
 -->										<tr>
											<td>Mobile Phone</td>
											<td id="mobile"><?php echo $_SESSION['mobile']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('mobile', this)"></i></td>
										</tr>
										<tr>
											<td>Date of Birth</td>
											<td id="dob"><?php echo $_SESSION['dob']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('dob', this)"></i></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td id="gender"><?php echo $_SESSION['gender']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('gender', this)"></i></td>
										</tr>
										<tr>
											<td>Status</td>
												<?php
												if (isset($_SESSION['status'])) {
														$u_status = $_SESSION['status'];
												}
												else
													$u_status = ' ';
												?>
											<td id="status"><?php echo $u_status; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('status', this)"></i></td>
										</tr>
										<tr>
											<td>City</td>
											<td id="city"><?php echo $_SESSION['city']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('city', this)"></i></td>
										</tr>
										<tr>
											<td>Country</td>
											<td id="country"><?php echo $_SESSION['country']; ?></td>
											<td><i class="fa fa-pencil" onclick="editField('country', this)"></i></td>
										</tr>
										<tr>
											<td>Languages</td>
											<td id="lang">English, Hindi, Urdu</td>
											<td><i class="fa fa-pencil" onclick="editField('lang', this)"></i></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color:skyblue; font-size: 25px;">Photos</a>
							</h4>
						</div>
						<div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="row">
								<?php 
									$conn = mysqli_connect("localhost", "root", "", "connecton") or die("Connection Error ".mysqli_connect_error());
									$sql = "SELECT image FROM posts WHERE image LIKE '%uploads%' AND uid=".$_SESSION['uid'];
									$result = mysqli_query($conn, $sql);
									if ($result) {
										$num = mysqli_num_rows($result);
										if ($num > 0) {
											switch ($num) {
												case 1: case 2: case 3:
													$div = 12/$num;
													break;
												case 4:
													$div = 6;
													break;
												case 5: case 6: case 9: case 12:
													$div = 4;
													break;
												case 7: case 8: case 10: case 11:
													$div = 3;
													break;
												
												default:
													$div = 12/$num;
													break;
											}
											for ($i=0; $i < $num; $i++) { 
												$row = mysqli_fetch_assoc($result);
												echo "<div class='col-md-$div col-sm-$div' style='margin-bottom: 10px;'>
													<img src='../".$row['image']."' class='img img-responsive'>
												</div>";
											}
										}
									} else {
										echo mysqli_error($conn);
									}
								?>
								</div>
							</div>
					    </div>
					</div>
					<div class="panel panel-info">
			    		<div class="panel-heading">
			    			<h4 class="panel-title">
			        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="color:skyblue; font-size: 25px;">Accomplishments</a>
							</h4>
						</div>
			    		<div id="collapse3" class="panel-collapse collapse">
			    			<div class="panel-body">
			    				<input class="form-control" type="text" name="">
			    			</div>
			    		</div>
					</div>
					<div class="panel panel-info">
			    		<div class="panel-heading">
			    			<h4 class="panel-title">
			        			<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" style="color:skyblue; font-size: 25px;">Interests</a>
							</h4>
						</div>
			    		<div id="collapse3" class="panel-collapse collapse">
			    			<div class="panel-body">
			    				<input class="form-control" type="text" name="">			    
			    			</div>
			    		</div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<a href="events.php"><h4 class="panel-title">Upcoming Events</h4></a>
					</div>
					<div class="panel-body">
						<div>
							<?php 
								include 'all-events.php';
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>