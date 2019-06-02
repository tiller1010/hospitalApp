<?php
	
include('header.html');
include('logout_link.php');
echo "<a href='appointment.php'>Make an appointment today.</a>";
echo "<br>";
//Allow doctor to sign in, if they are already then link to dashboard
if(!isset($_SESSION['doctor_validate'])){
	//Do not display doctor login if patient is logged in
	if(!isset($_SESSION['user_id'])){
		echo "<a href='doctor_login.php'>Doctor Sign In</a>";
	}
}
else{
	echo "<a href='dashboard.php'>Staff Dashboard</a>
		  <br>
		  <a href='logout.php'>Logout</a>";
}
include('footer.html');