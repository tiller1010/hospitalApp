<?php

session_start();

if(!isset($_SESSION['user_id'])){
	require('login_tools.php');
	load();
}

include('header.html');

$_SESSION = array();

session_destroy();

echo "Goodbye";

include('footer.html');