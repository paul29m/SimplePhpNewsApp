<?php  
 $connect = mysqli_connect("localhost", "root", "", "newsdb");  
 $sql = "DELETE FROM news WHERE id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted'; 
	  
 }  else {
		echo "Error deleting record: " . $connect->error;
	}
 ?>