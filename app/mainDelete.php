<?php
include("../functions/auth.php"); //include auth.php file on all secure pages
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>News App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<link rel="stylesheet" href="../css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    
	<script>  
	$(document).ready(function(){  
		function fetch_data()  
		{  
           $.ajax({  
                url:"../functions/select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_table').html(data);  
                }  
           });  
		}  
		fetch_data();  
		$(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id7");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
				console.log("delete");
                $.ajax({  
                     url:"../functions/delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>
</head>
<body>
<div class="form">
<h3>Welcome <?php echo $_SESSION['username']; ?>!</h3>
<p></p>
</div>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="index.php">Add News</a></li>
  <li role="presentation" class="active" ><a href="mainDelete.php">Delete News</a></li>
  <li role="presentation"><a href="mainUpdate.php">Update News</a></li>
  <li role="presentation"><a href="logout.php">Logout</a></li>
</ul>
<div class="table-responsive">  
       <div id="live_table"></div>                 
</div>  
</body>
</html>