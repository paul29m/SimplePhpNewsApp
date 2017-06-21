<?php  
	$connect = mysqli_connect("localhost", "root", "", "newsdb");  
 
	if ($connect->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$id=$_POST["ID"];
	$title=$_POST["Title"];
	$text=$_POST["Text"];
	$producer=$_POST["Producer"];
	$category=$_POST["Category"];
	$date=$_POST["Date"];
	
	$sql = "UPDATE news set title= '" . $title . "', text= '". $text . "', producer= '" . $producer . "', date= '" . $date . "', category ='" . $category . "' where ID= '" . $id . "'";
	
	if (mysqli_query($connect, $sql)) {
		echo "UPDATE successfully";
	} else {
		echo "Error updating record: " . $connect->error;
	}
	
 ?> 