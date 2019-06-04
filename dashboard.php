<?php

session_start();

//Prevent users from reaching page without doctor validation
if(!isset($_SESSION['doctor_validate'])){
	require('login_tools.php');
	load();
}

include('header.html');

echo "Welcome to the dashboard, $_SESSION[first_name]";
echo "<br>";
echo "<div id='logout'><a href='logout.php'>Logout</a></div>";
echo "<br>";

require('connect_db.php');

//Query database for appointments
$q = "SELECT * FROM appointments WHERE doctor = '$_SESSION[last_name]'";
$r = mysqli_query($dbc, $q);

if(mysqli_num_rows($r) == 0){
	echo "No new appointments.";
}
else{
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		echo "$row[day] $row[time] with $row[doctor] <br>";
	}
}