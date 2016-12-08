<?php
	session_start();
	unset($_SESSION['session_user']);
	session_destroy();
	
	//Direct logout. No time
	//header("Location: login.php");
	
	//For timed redirect
	echo "You are logged out. You will be redired in 5 seconds";
	header("Refresh: 5; login.php");
?>