<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>News App</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
	<?php
		$con = mysqli_connect("localhost","root","","login");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		session_start();
		// If form submitted, insert values into the database.
		if (isset($_POST['username'])){
			
			$username = stripslashes($_REQUEST['username']); // removes backslashes
			$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
			$password = stripslashes($_REQUEST['password']);
			$password = mysqli_real_escape_string($con,$password);
		//Checking is user existing in the database or not
			$query = "SELECT * FROM `users` WHERE user='$username' and password='$password'";
			$result = mysqli_query($con,$query);
			$rows = mysqli_num_rows($result);
			if($rows==1){
				$_SESSION['username'] = $username;
				header("Location: mainAdd.php"); // Redirect user to index.php
				}else{
					echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
					}
		}else{
	?>

	<div class="form">
		<h1>News App</h1>
		<h3>Log in to Edit</h3>
		<form action="" method="post" name="login">
			<input type="text" name="username" placeholder="Username" required />
			<input type="password" name="password" placeholder="Password" required />
			<input name="submit" type="submit" value="Login" />
		</form>
		<p>
		<a href="ReaderDashboard.php">Continue as reader</a>
		</p>
		</div>
		<?php } ?>
	</body>
</html>
