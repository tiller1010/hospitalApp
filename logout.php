<?php

session_start();

include('header.html');

$_SESSION = array();

session_destroy();

echo "<div class='goodbye-msg'>
	  <h2>Goodbye</h2>
	  <a href='index.php'>Return to homepage.</a>
	  </div>";

include('footer.php');