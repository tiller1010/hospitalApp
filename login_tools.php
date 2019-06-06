<?php

function load($page = 'login.php'){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	$url = rtrim($url, '/\\');
	$url .= '/' . $page;

	header("Location: $url");
	exit();
}

function validate($dbc, $user = '', $pwd = '', $usrType){
	$errors = array();
	$requiredName = ($usrType == 'patient' ? 'username' : 'full name');
	if(empty($user)){
		$errors[] = "Enter your $requiredName.";
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
		if($usrType == 'patient'){
			$q = "SELECT user_id, first_name, last_name FROM patients WHERE username = '$u' AND pass = SHA2('$p', 256)";
		}
		elseif($usrType == 'doctor'){
			//Make sure a full name is entered
			if(str_word_count($u) == 2){
				//Split fullname for query and session variable
				$n = explode(' ', $u);
				$f = $n[0];
				$l = $n[1];
			}
			else{
				//Pass some dummy text so query goes through
				$f = 'INVALID';
				$l = 'INVALID';
			}
			$q = "SELECT first_name, last_name FROM doctors WHERE first_name = '$f' AND last_name = '$l' AND pass = SHA2('$p', 256)";
		}
		$r = mysqli_query($dbc, $q);

		if(mysqli_num_rows($r) == 1){
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			return array(true, $row);
		}
		else{
			$errors[] = "$requiredName or password not found.";
		}
	}

	return array(false, $errors);
}