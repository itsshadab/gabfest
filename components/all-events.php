<?php
$conn = mysqli_connect("localhost", "root", "", "connecton");
$sql = "SELECT title, venue, e_image, time, category FROM events";
$result = mysqli_query($conn, $sql);
if ($result) {
	$num = mysqli_num_rows($result);
	for ($i=0; $i < $num; $i++) { 
		$row = mysqli_fetch_assoc($result);
		echo "<div class='well'>
			<div class='event-image' style='background-image: url(\"../".$row['e_image']."\")'></div>
			<h4>".$row['title']."</h4>
			<b>Venue: </b>".$row['venue']."<br>
			<b>Time: </b>".$row['time']."<br>
			<b>Category: </b>".$row['category']."
		</div>";
	}
}
?>