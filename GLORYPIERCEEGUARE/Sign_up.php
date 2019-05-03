<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<title>Student Accomodation</title>
<head>
  <link rel="stylesheet" type="text/css" href="Assignment.css">
</head>
	<h1>Delete</h1>
	
	<ul>
		<li><a href="Assignment.html" ><i class="fa fa-fw fa-home"></i>Home</a></li>
		<li><a href="Location.html" ><i class="fa fa-fw fa-map"></i>Locations</a></li>
		<li><a href="Rooms.html" ><i class="fa fa-fw fa-bed"></i>Rooms</a></li>
		<li><a href="Facility.html" ><i class="fa fa-fw fa-soccer-ball-o"></i>Facilities</a></li>
		<li><a href="Contact.html" ><i class="fa fa-fw fa-envelope"></i>Contact</a></li>
		<li style="float:right"><a class="active" href="Sign_in.html"><i class="fa fa-fw fa-user"></i>Sign-In</a></li>
		<li style="float:right"><a class="active" href="Sign_up.html"><i class="fa fa-fw fa-user-plus"></i>Sign-Up</a></li>
	</ul>
	<br>
</body>
</html>

<?php

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "Assignment";
	
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	
	if($conn === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$sql_a = "SELECT * FROM Users WHERE Username='$username'";
	$res_a = mysqli_query($conn, $sql_a);
	
	if (mysqli_num_rows($res_a) > 0) 
	{
  	  echo "Username is already taken.";
	  echo 'Return to sign in page. - <a href="Sign_in.html">  Continue...</a>';
	}
	else
	{
		$sql = "INSERT INTO Users (Username, Password) VALUES ('$username', '$password')";
		
		if(mysqli_query($conn, $sql))
		{
			echo "New account has been created.";
			echo 'Return to sign in page. - <a href="Sign_in.html">Continue...</a>';
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}	
		
?>