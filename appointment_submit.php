<?php

session_start();

include('header.html');

$day = $_GET['day'];
$time = $_GET['time'];
$doctor = $_GET['doctor'];
$subject = $_SESSION['subject'];
$message = $_SESSION['message'];


require('connect_db.php');
$q = "INSERT INTO appointments(day, time, doctor, subject, message)
	  VALUES ('$day', '$time', '$doctor', '$subject', '$message');";
mysqli_query($dbc, $q);

echo "<div class='submit-complete-container'>
      <div class='submit-complete'>Your appointment for $subject has been submitted for $time on $day with Dr. $doctor</div>
	  <br>
	  <div class='issue'>Issue: $message</div>
	  </div>";

include('footer.php');