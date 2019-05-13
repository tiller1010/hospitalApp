<?php

function load($page = 'login.php'){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;

	header("Location: $url");
	exit();
}

function validate($dbc, $user = '', $pwd = ''){
	$errors = array();

	if(empty($user)){
		$errors[] = 'Enter your username.';
	}
	else{
		$u = mysqli_real_escape_string($dbc, trim($user));
	}

	if(empty($pwd)){
		$errors[] = 'Enter your password.';
	}
	else{
		$p = mysqli_real_escape_string($dbc, trim($pwd));
	}

	if(empty($errors)){
		$q = "SELECT user_id, first_name, last_name FROM patients WHERE username = '$u' AND pass = SHA2('$p', 256)";

		$r = mysqli_query($dbc, $q);

		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		}
		else{
			$errors[] = 'Username or password not found.';
		}
	}

	return array(false, $errors);
}