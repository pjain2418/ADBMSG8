<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
$conn = mysqli_connect("localhost","root","root","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$src=$_POST['src'];
$dest=$_POST['dest'];


$sql = "SELECT trains.t_source,trains.t_destination, trains.t_name, trains.t_no, routes.available_on FROM routes 
JOIN trains ON routes.t_no=trains.t_no WHERE routes.src LIKE '%$src%' AND routes.dest LIKE '%$dest%'";
$result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a ticket</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.8);
			border-radius: 25px;
		}
		html { 
		  background: url(img/bg7.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#src,#dest	{
		
			margin-left: 150px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
		
		tr{
			color: white;
			font-style: bold;
		}
	</style>
	<script type="text/javascript">
		function validate()	{
			var submit=document.getElementById("submit");
			if(submit.selectedIndex==0)
			{
				alert("Please select your train");
				submit.focus();
				return false;		
			}
		}
	</script>
</head>
<body>
	<?php
		include ('header.php');
	

	
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your journey</h1><br/><br/>
	<form method="post" name="journeyform" onsubmit="return validate()">
		

	
		<input id="src" placeholder="From" name="src" align required><br><br>
		<input id="dest" placeholder="To" name="dest" align="center" required>
			
		<br/><br/>
		
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	
	<table border=1  action="PPPP.php">
	<?php
	if (isset($_POST['submit'])){
		
   
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc() ){
			
			echo "<tr><td>";
			echo "From";
			echo("</td><td>");

			echo" To";
			echo("</td><td>");
			echo "Train No.";
			echo("</td><td>");
			echo("Runs On");
			echo("</td><td>");
			echo("No. of person");
			echo("</tr><td>");


			echo($row['t_source']);
			echo("</td><td>");
			echo($row['t_destination']);
			echo("</td><td>");
			echo($row['t_no']);
			echo("</td><td>");
			echo($row['available_on']);
			echo("</td><td>");
			echo ("<select name='person' >
			<option value=1>1</option>
			<option value=2>2</option>
			<option value=3>3</option>
			<option value=4>4</option>

			</select>");
			echo("</td><td>");

			echo '<a href="PPPP.php">book now </a>';
			}
		} else {
			echo "0 records";
		}
	}
		
		$conn->close();
		
	?>
	</table>
	</div>
	</body>
	</html>