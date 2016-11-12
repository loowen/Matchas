<?php
    include "connect.php";
	
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
    $prof= $_POST['prof'];
    $decrease = $_POST['type'];
	if ($logged_user == "")
		die("ERROR : no user logged on");
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
    $stmt = $pdo->prepare("UPDATE `users` VALUES  `FameRating` = `FameRating` - $decrease WHERE Username = :user");
    $stmt->bindParam(":user", $prof);
    $stmt->execute();
?>