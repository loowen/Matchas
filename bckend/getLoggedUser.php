<?php
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
	if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
	echo json_encode($logged_user);
?>