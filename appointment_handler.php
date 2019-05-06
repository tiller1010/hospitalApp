<?php

require('connect_db.php');

$q = "SELECT * FROM doctors";

$r = mysqli_query($dbc, $q);

while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	echo "Dr $row[last_name], available $row[availability] <br>";
}