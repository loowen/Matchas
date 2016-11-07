<?php
	include "connect.php";
	file_put_contents("Deanlog.txt", print_r($_POST, true));
	
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
	if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
	$stmt = $pdo->prepare('SELECT 
	username, email, Firstname, 
	Lastname, Age, Gender, Bio, 
	SexualPref, FameRating, ProfViews, 
	FameRating, GPS, LastLog
	FROM users
	WHERE username = :user');
	$stmt->bindParam(":user", $logged_user); //want the userprofile of the one sent by Post
	$stmt->execute(); // exectue statement
	$data = $stmt->fetch(PDO::FETCH_ASSOC); // fetch data as associative array, dont need loop because we expect one result
	echo json_encode($data); //encode as JSON so javascript can decode it
?>