<?php
    include "connect.php";
	
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
    $prof= $_POST['prof'];
    $type = $_POST['type'];
	if ($logged_user == "")
		die("ERROR : no user logged on");
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
    $stmt = $pdo->prepare("INSERT INTO `history` (`clicker`, `clickee`, `type`) VALUES (:user , :prof , :type ");
    $stmt->bindParam(":prof", $prof);
    $stmt->bindParam(":user", $logged_user);
    if($type == 1)
    {
        $type = "Viewed your profile";
    }
    elseif($type == 5)
    {
        $type = "Liked your profile";
    }
    $stmt->execute();
?>