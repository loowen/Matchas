<?php 
include "connect.php";
	
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
	if ($logged_user == "")
		die("ERROR : no user logged on");
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
	$stmt = $pdo->prepare("SELECT PicID, ProfPic FROM pictures WHERE Username = :user AND ProfPic != 1");
	$stmt->bindParam(":user", $logged_user);
	$stmt->execute();
	
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    file_put_contents("loger.txt", print_r($data, true));
    echo json_encode($data);
?>