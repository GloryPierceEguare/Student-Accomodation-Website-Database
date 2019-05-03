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
	
	if ( isset($_POST['delete']) && isset($_POST['id']) ) 
	{
		$id = mysqli_real_escape_string($conn,$_GET['id']);
		$sql = "DELETE FROM students WHERE Id = $id";
		mysqli_query($conn,$sql);
		echo 'Deletion was a Success - <a href="index.php">Continue...</a>';
		return;
	}
	
	$id = mysqli_real_escape_string($conn,$_GET['id']);
	$result = mysqli_query($conn,"SELECT Id, Firstname, Surname, Location, Room, Facility FROM students WHERE id='$id'");
	$row = mysqli_fetch_row($result);
	echo "<p>Confirm: Deleting $row[0]</p>\n";
	echo('<form method="post"><input type="hidden" ');
	echo('name="id" value="'.htmlentities($row[1]).'">'."\n");
	echo('<input type="submit" value="Delete" name="delete">');
	echo('<a href="Index.php">Cancel</a>');
	echo("\n</form>\n");
	
?>