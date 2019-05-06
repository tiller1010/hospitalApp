<?php

$page_title = 'Register';
include('header.html');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require('connect_db.php');
	$errors = array();

	#Check for username
	if(empty($_POST['username'])){
		$errors[] = 'Enter your username.';
	}
	else{
		$un = mysqli_real_escape_string($dbc, trim($_POST['username']));
	}

	#Check for first name
	if(empty($_POST['first_name'])){
		$errors[] = 'Enter your first name.';
	}
	else{
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}


	#Check for last name
	if(empty($_POST['last_name'])){
		$errors[] = 'Enter your last name.';
	}
	else{
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	#Confirm and check password
	if(!empty($_POST['pass1'])){
		if($_POST['pass1'] != $_POST['pass2']){
			$errors[] = 'Passwords do not match.';
		}
		else{
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	}
	else{
		$errors[] = 'Enter your password.';
	}


	#Register user to database table 'users'
	if(empty($errors)){
		$q = "INSERT INTO patients(username, first_name, last_name, pass)
		VALUES ('$un', '$fn', '$ln', SHA2('$p', 256))";

		$r = mysqli_query($dbc, $q);

		if($r){
			echo '<h1>Registered</h1>
				  <p>You are now registered</p>
				  <p><a href="login.php">Login</a></p>';
		}

		mysqli_close($dbc);
		exit();
	}
	else{
		echo '<h1>Error!</h1>
		<p id="err_msg">The following error(s) occured:<br>';
		foreach($errors as $msg){
			echo " - $msg<br>";
		}
		echo 'Please try again.</p>';
		mysqli_close($dbc);
	}
}

?>

<h1>Register</h1>
<form action='register.php' method='POST'>
	<p>
		Username: <input type="text" name="username" value=<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>>
	</p>
	<p>
		First Name: <input type="text" name="first_name" value=<?php if(isset($_POST['first_name'])){ echo $_POST['first_name']; } ?>>
		Last Name: <input type="text" name="last_name" value=<?php if(isset($_POST['last_name'])){ echo $_POST['last_name']; } ?>>
	</p>
	<p>
		Password: <input type="text" name="pass1" value=<?php if(isset($_POST['pass1'])){ echo $_POST['pass1']; } ?>>
		Confirm Password: <input type="text" name="pass2" value=<?php if(isset($_POST['pass2'])){ echo $_POST['pass2']; } ?>>
	</p>
	<input type="submit" value="Register">
</form>

<?php

include('footer.html');