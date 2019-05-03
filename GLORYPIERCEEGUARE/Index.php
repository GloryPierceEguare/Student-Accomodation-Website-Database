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

<table>
<?php

	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "Assignment";
	
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	
	if($conn === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	echo '<table border="1">'."\n";
	
	$result = mysqli_query($conn,"Select Id, Firstname, Surname, Location, Room, Facility From students");
	while ($row = mysqli_fetch_row($result))
	{
		echo "<tr><td>";
		echo(htmlentities($row[0]));
		echo ("</td><td>");
		echo(htmlentities($row[1]));
		echo ("</td><td>");
		echo(htmlentities($row[2]));
		echo ("</td><td>");
		echo(htmlentities($row[3]));
		echo ("</td><td>");
		echo(htmlentities($row[4]));
		echo ("</td><td>");
		echo(htmlentities($row[5]));
		echo("</td><td>\n");
		echo('<a href="Edit.php?id='.htmlentities($row[0]).'">Edit</a> / ');
		echo('<a href="Delete.php?id='.htmlentities($row[0]).'">Delete</a>');
		echo("</td></tr>\n");
	}
	
?>
</table>
<a href="Add.html">Add New</a> &nbsp
<a href="Sign_in.html">Log Out</a>

