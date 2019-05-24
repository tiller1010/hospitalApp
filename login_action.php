<?php

if($_SERVER['REQUEST_METHOD']){
	require('connect_db.php');
	require('login_tools.php');

	if($_POST['user-type'] == 'patient'){

		list($check, $data) = validate($dbc, $_POST['username'], $_POST['pass'], 'patient');

		if($check){
			session_start();

			$_SESSION['user_id'] = $data['user_id'];
			$_SESSION['first_name'] = $data['first_name'];
			$_SESSION['last_name'] = $data['last_name'];

			load('appointment.php');
		}
		else{
			$errors = $data;
		}

		include('login.php');

	}

	//Apply DRY to this if it works
	elseif($_POST['user-type'] == 'doctor'){

		list($check, $data) = validate($dbc, $_POST['fullname'], $_POST['pass'], 'doctor');

		if($check){
			session_start();
			$_SESSION['first_name'] = $data['first_name'];
			$_SESSION['last_name'] = $data['last_name'];

			load('dashboard.php');
		}
		else{
			$errors = $data;
		}

		include('doctor_login.php');

	}

	mysqli_close($dbc);

}