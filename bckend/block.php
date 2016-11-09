<?php
    include"connect.php";
    $pdo = connect();
    session_start();
    $logged = $_SESSION['logged_on_user'];
    if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
    $user = $_POST['user'];
    
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
    $stmt = $pdo->prepare("INSERT INTO blocked (Blocker, Blocked) VALUES (:logged , :user)");
    $stmt->bindParam(":logged", $logged);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
?>