<?php

require 'vendor/autoload.php';

use Carbon\Carbon;

include('header.html');
include('logout_link.php');

//Package here for a clock
printf("<div class='clock'>Right now in Erie is %s</div>", Carbon::now('GMT-4'));

echo "<div class='flexbox'>";
//Allow doctor to sign in and patient to make appointment
if(!isset($_SESSION['doctor_validate'])){
	echo "<div class='homepage-container appointment-img'><a href='appointment.php'>Make an appointment today.</a></div>";
	//Do not display doctor login if patient is logged in
	if(!isset($_SESSION['user_id'])){
		echo "<div class='homepage-container doctor-img'><a href='doctor_login.php'>Doctor Sign In</a></div>";
	}
}
else{
	echo "<div class='homepage-container staff-img'><a href='dashboard.php'>Staff Dashboard</a></div>";
}
echo "</div>";
include('footer.html');