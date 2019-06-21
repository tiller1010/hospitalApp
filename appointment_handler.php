<?php

session_start();

$_SESSION['subject'] = $_GET['subject'];
$_SESSION['message'] = $_GET['message'];

//The days of the week are in regular expression form to be case insensitive
$days_of_week = ["/Sunday/i", "/Monday/i", "/Tuesday/i", "/Wednesday/i", "/Thursday/i", "/Friday/i", "/Saturday/i"];

include('header.html');

require('connect_db.php');

$q = "SELECT * FROM doctors";

$r = mysqli_query($dbc, $q);


echo "<div class='form availability'>";
while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	echo "Dr $row[last_name] <br>
		  <table class='doctors_table'>
		  <tr><th>Availability:</th></tr>";
	foreach($days_of_week as $day){
		if(preg_match($day, "$row[availability] <br>")){
			//Trimmed slashes from day to display
			$trimmed_day = str_replace('/i', '', substr_replace($day,'',0,1));
			//Creates a hidden drop down list for each available time. Then links to the handler page once selected
			echo "<td class='day'><span class='dropdown-menu-btn'>$trimmed_day
			<select class='dropdown-menu' style='visibility: hidden;' onchange='location = this.value;'>
				<option value='appointment_handler.php'>Select a time</option>
				<option value='appointment_submit.php?time=1:00&day=$trimmed_day&doctor=$row[last_name]'>1:00</option>
				<option value='appointment_submit.php?time=1:30&day=$trimmed_day&doctor=$row[last_name]'>1:30</option>
				<option value='appointment_submit.php?time=2:00&day=$trimmed_day&doctor=$row[last_name]'>2:00</option>
				<option value='appointment_submit.php?time=5:30&day=$trimmed_day&doctor=$row[last_name]'>5:30</option>
				<option value='appointment_submit.php?time=6:00&day=$trimmed_day&doctor=$row[last_name]'>6:00</option>
				<option value='appointment_submit.php?time=6:30&day=$trimmed_day&doctor=$row[last_name]'>6:30</option>
			</select>
			</span></td>";
		}
		else echo "<td>Unavailable</td>";
	}
	echo "</table><br>";
}
echo "</div>";

include('footer.php');