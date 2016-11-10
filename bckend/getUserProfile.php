<?php
	include "connect.php";
	file_put_contents("Deanlog.txt", print_r($_POST, true));
	
	session_start();
	$logged_user = $_SESSION['logged_on_user'];
	if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
	$user = $_POST['user'];
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
	$stmt = $pdo->prepare('SELECT 
	username, email, Firstname, 
	Lastname, Age, Gender, Bio, 
	SexualPref, FameRating, ProfViews, 
	FameRating, GPS, LastLog
	FROM users
	WHERE username = :user');
	$stmt->bindParam(":user", $user); //want the userprofile of the one sent by Post
	$stmt->execute(); // execute statement
	$data = $stmt->fetch(PDO::FETCH_ASSOC); // fetch data as associative array, dont need loop because we expect one result
	$stmt = $pdo->prepare("SELECT PicID, ProfPic FROM pictures WHERE Username = :user");
	$stmt->bindParam(":user", $user);
	$stmt->execute();
	if ($stmt->rowCount() != 0)
		$pic = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['PicID'];
	else
		$pic = "srcimg/avatar.png";
	$data['image'] = $pic;
	file_put_contents("z.txt", print_r($data, true));
	echo json_encode($data); //encode as JSON so javascript can decode it
?>