<?php
include("../functions/auth.php"); //include auth.php file on all secure pages
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>News App</title>
	<link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"> </script> 	
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script>
	<script>	
		function updateNews(){
				var $form =$("#addForm");
				console.log("update");
				var id=$form.find('input[name="ID"]').val(),
					text=$form.find('input[name="Text"]').val(),
					title=$form.find('input[name="Title"]').val(),
					producer=$form.find('input[name="Producer"]').val(),
					category=$form.find('input[name="Category"]').val();
					date=$form.find('input[name="Date"]').val();
				if (text.length < 5 || title.length <5 || producer.length <5 || category.length <5 || date.length <10)
				{
					console.log("Not valid input");
					alert("Invalid input");
				}
				else
				{
				var url="../functions/edit.php";
				var posting=$.post(url,{ID:id,Title:title,Text:text,Producer:producer,Category:category,Date:date},function(data){
					alert(data);
				});
				}
		}
	$(document).ready(function(){ 
	 $('#addForm').validate({ // initialize the plugin
        rules: {
            Title: {
                required: true,
				minlength: 5,
            },
            Text: {
                required: true,
                minlength: 5,
            },
			Producer: {
                required: true,
                minlength: 5
            },
			Category: {
                required: true,
                minlength: 5
            },
			Date: {
                required: true,
                minlength: 10
            }
			
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
  <li role="presentation"><a href="mainDelete.php">Delete News</a></li>
  <li role="presentation" class="active"><a href="mainUpdate.php">Update News</a></li>
  <li role="presentation"><a href="logout.php">Logout</a></li>
</ul>
 <form id="addForm">
		<input type="number" name="ID" placeholder="ID" required />
		<li><input type="text" name="Title" placeholder="Title" /></li>
		<li><input type="text" name="Text" placeholder="Text" /></li>
		<li><input type="text" name="Producer" placeholder="Producer" /></li>
		<li><input type="text" name="Category" placeholder="Category" /></li>
		<li><input type="date" name="Date" placeholder="yyyy-mm-dd"/></li>
        <li><input type="button" value="Update" onclick="updateNews()" /></li>
 </form>
</body>
</html>
