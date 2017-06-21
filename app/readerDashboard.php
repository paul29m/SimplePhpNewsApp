
<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="../css/style.css" />
	<title>News App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script type="text/javascript">
			var xmlhttp;
			
			var lastSearch="";
			var lastSearchS="";
			var lastSearchE="";
			function getNews(){
				var url="../functions/showTable.php";
				var getter=$.get(url,function(data){
					document.getElementById("maindiv").innerHTML=data;
				});
			}
			function searchNewsC(){
				var $form=$("#searchForm");
				console.log("search by news");
				var	category=$form.find('input[name="Category"]').val();
				var url="../functions/showNewsGenre.php";
				var getter=$.get(url,{Category:category},function(data){
					if(lastSearch!=""){
					data="<p> Last Category Search: " + lastSearch + "</p>"+data;
					}else
					if(lastSearchS!="" && lastSearchE!=""){
					data="<p> Last date search between: "+lastSearchS+ " and "+lastSearchE+data;
					}
					document.getElementById("maindiv").innerHTML=data;
					lastSearch=category;
					lastSearchE="";
					lastSearchS="";
				});
			}
			
			function searchNewsD(){
				var $form=$("#searchForm");
				console.log("search by date");
				
				var	startdate=$form.find('input[name="StartDate"]').val();
					enddate=$form.find('input[name="EndDate"]').val();
				
				var url="../functions/showNewsDate.php";
				var getter=$.get(url,{StartDate:startdate,EndDate: enddate},function(data){
					if(lastSearchS!="" && lastSearchE!=""){
					data="<p> Last date search between: "+lastSearchS+ " and "+lastSearchE+data;
					}
					if(lastSearch!=""){
						data="<p> Last Category Search: " + lastSearch + "</p>"+data;
					}
					document.getElementById("maindiv").innerHTML=data;
					lastSearchS=startdate;
					lastSearchE=enddate;
					lastSearch=""
				});
			}
			
			
			
			$(document).ready(function(){ 
				getNews();
			});
		</script>
	</head>
	<body>
		<h1 align= "center"> <a href = "dashboard.php"> News </a></h1>
			 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
					
					<form action="/" id="searchForm">
						<input type="text" name="Category" placeholder="Category" required />
						<input type="button" value="Search Category" onclick="searchNewsC()" />
						<p></p>
						<input type="date" name="StartDate" placeholder="Start Date: yyyy-mm-dd" required />
						<input type="date" name="EndDate" placeholder="End Datey: yyy-mm-dd" required />
						<input type="button" value="Search Between" onclick="searchNewsD()" />
					</form>
					<div id="maindiv"></div>
					<div>  <a href="login.php">Go to login page</a></div>
					</div>
					
                </div>
            </div>
		
	</body>
</html>
