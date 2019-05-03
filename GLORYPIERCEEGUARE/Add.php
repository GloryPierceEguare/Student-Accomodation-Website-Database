<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
<title>Student Accomodation</title>
<head>
  <link rel="stylesheet" type="text/css" href="Assignment.css">
</head>
	<h1>View Database</h1>
	
	<ul>
		<li><a href="Assignment.html" ><i class="fa fa-fw fa-home"></i>Home</a></li>
		<li><a href="Location.html" ><i class="fa fa-fw fa-map"></i>Locations</a></li>
		<li><a href="Rooms.html" ><i class="fa fa-fw fa-bed"></i>Rooms</a></li>
		<li><a href="Facility.html" ><i class="fa fa-fw fa-soccer-ball-o"></i>Facilities</a></li>
		<li><a href="Contact.html" ><i class="fa fa-fw fa-envelope"></i>Contact</a></li>
		<li style="float:right"><a class="active" href="Sign_in.html"><i class="fa fa-fw fa-user"></i>Sign-In</a></li>
		<li style="float:right"><a class="active" href="Sign_up.html"><i class="fa fa-fw fa-user-plus"></i>Sign-Up</a></li>
	</ul>
	<br><br>
	
</body>
</html>

<?php

	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$surname = $_POST['surname'];
	$location = $_POST['location'];
	$room = $_POST['room'];
	$facility = $_POST['facility'];
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "Assignment";
	
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	
	if( mysqli_connect_error())
	{
		die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
	else
	{
		$sql = "INSERT INTO students (Id, Firstname, Surname, Location, Room, Facility) values ('$id', '$firstname', '$surname', '$location', '$room', '$facility')";
		if($conn->query($sql))
		{
			echo "New record is inserted  ";
		}
		else
		{
			echo "Error: ". $sql."<br>".$conn->error;
		}
		$conn->close();
	}
	echo '<a href="Index.php">Return to Student Database View</a>';
	
?>

