<?php

session_start();

if(isset($_SESSION['user_id'])){
	echo "<div id='logout'><a href='logout.php'>Logout</a></div>";
}
else echo "<div id='logout'><a href='register.php'>Create an account today.</a></div>";