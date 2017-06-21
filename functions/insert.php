<?php  
	$connect = mysqli_connect("localhost", "root", "", "newsdb");  
 
	if ($connect->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	//$id=$_POST["ID"];
	$title=$_POST["Title"];
	$text=$_POST["Text"];
	$producer=$_POST["Producer"];
	$category=$_POST["Category"];
	$date=$_POST["Date"];
	
	$sql = "insert into news (title,text,producer,date,category) VALUES('" . $title . "','". $text . "','" . $producer . " ','" . $date . "','" . $category . " ')";
	
	if (mysqli_query($connect, $sql)) {
		echo "Record added successfully";
	} else {
		echo "Error adding record: " . $connect->error;
	}
	
 ?> 