<?php
$conn = mysqli_connect("localhost", "root", "", "connecton");
$sql = "SELECT name, organisation, location, mobile, email FROM jobs";
$result = mysqli_query($conn, $sql);
if ($result) {
	$num = mysqli_num_rows($result);
	for ($i=0; $i < $num; $i++) { 
		$row = mysqli_fetch_assoc($result);
		echo "<div class='well'>						
				<h3>Job Profile</h3>
				<p>".$row['organisation']."</p>
				<p>Skills</p>
				<button class='btn btn-default shift-right'>Apply</button>
				<p>".$row['location']."</p>
				<p>Experience</p>
				<button class='btn btn-default'>Share</button>
				<button class='btn btn-default'>Save this job</button>
			</div>";
	}
}
?>