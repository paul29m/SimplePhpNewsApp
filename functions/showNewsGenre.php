<?php
	$con = mysqli_connect("localhost","root","","newsdb");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}

	$category = $_GET["Category"];

	$result = mysqli_query($con, "SELECT * FROM news where category='" . $category . "'");
	
	
	while($row = mysqli_fetch_array($result ,MYSQLI_ASSOC)){
		echo "<p>";
		echo "<p>" . $row['title'] . "</p>";
		echo "<p>" . $row['text'] . "</p>";
		echo "<p> Category: " . $row['category']. "</p>";
		echo "<p> Date: " . $row['date'] . "</p>";
		echo "</p>";
	}
	mysqli_close($con);
?> 


