<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<title>Student Accomodation</title>
<head>
  <link rel="stylesheet" type="text/css" href="Assignment.css">
</head>
	<h1>Edit Student Profile on Accomodation Database</h1>
	
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
	
	<p>Edit Student Profile</p>
	<form method="post">
	<input type="hidden" name="Id" >
	<p>Firstname:
	<input type="text" name="Firstname" ></p>
	<p>Surname:
	<input type="text" name="Surname" ></p>
	<p>Location:
	<input type="text" name="Location" ></p>
	<p>Room:
	<input type="text" name="Room" ></p>
	<p>Facility:
	<input type="text" name="Facility" "></p>
	<p><input type="submit" value="Update"/>
	<a href="Index.php">Cancel</a></p>
	</form>
	
</body>
</html>

<?php

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "Assignment";
	
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	
	// Check connection
	if($conn === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	if ( isset($_POST['Firstname']) && isset($_POST['Surname'])&& isset($_POST['Location']) && isset($_POST['Room']) && isset($_POST['Facility']) && isset($_POST['Id']) ) 
	{
		$firstname = mysqli_real_escape_string($conn,$_POST['Firstname']);
		$surname = mysqli_real_escape_string($conn,$_POST['Surname']);
		$location = mysqli_real_escape_string($conn,$_POST['Location']);
		$room = mysqli_real_escape_string($conn,$_POST['Room']);
		$facility = mysqli_real_escape_string($conn,$_POST['Facility']);
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$sql = "UPDATE students SET Firstname='$firstname', Surname='$surname', Location='$location', Room='$room', Facility='$facility' WHERE Id='$id'";
		mysqli_query($conn,$sql);
		echo 'Student Profile has been updated - <a href="Index.php">Continue...</a>';
		return;
	}
	
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	$result = mysqli_query($conn,"Select Id, Firstname, Surname, Location, Room, Facility From students");
	$row = mysqli_fetch_row($result);
	$id = htmlentities($row[0]);
	$firstname = htmlentities($row[1]);
	$surname = htmlentities($row[2]);
	$location = htmlentities($row[3]);
	$room = htmlentities($row[4]);
	$facility = htmlentities($row[5]);
?>