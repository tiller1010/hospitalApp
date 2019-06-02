<?php

session_start();

include('header.html');

$_SESSION = array();

session_destroy();

echo "Goodbye";

include('footer.html');