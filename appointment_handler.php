<?php

$subject = $_GET['subject'];
$message = $_GET['message'];

//The days of the week are in regular expression form to be case insensitive
$days_of_week = ["/Sunday/i", "/Monday/i", "/Tuesday/i", "/Wednesday/i", "/Thursday/i", "/Friday/i", "/Saturday/i"];

include('header.html');

require('connect_db.php');

$q = "SELECT * FROM doctors";

$r = mysqli_query($dbc, $q);

while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	echo "Dr $row[last_name] <br>
		  <table class='doctors_table'>
		  <tr><th>Availability:</th></tr>";
	foreach($days_of_week as $day){
		if(preg_match($day, "$row[availability] <br>")){
			//Trimmed slashes from day to display
			$trimmed_day = str_replace('/i', '', substr_replace($day,'',0,1));
			echo "<td class='day'><span class='dropdown-menu-btn'>$trimmed_day
			<select class='dropdown-menu' style='visibility: hidden;'>
				<option>1:00</option>
				<option>1:30</option>
				<option>2:00</option>
				<option>5:30</option>
				<option>6:00</option>
				<option>6:30</option>
			</select>
			</span></td>";
		}
		else echo "<td>Unavailable</td>";
	}
	echo "</table><br>";
}

include('footer.html');