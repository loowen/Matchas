<?php
    include "connect.php";

    session_start();
    $user = $_SESSION['logged_on_user'];
    $interest = $_POST['interest'];
    
    if (!$interest || strlen($interest) <= 0 || !preg_match('/^[A-Za-z0-9_ -]+$/', $interest))
	{
		echo "ERROR : invalid interest.";
		die();
	}
    $pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"DELETE FROM `interests`
    WHERE User = :user AND Interests = :interest"
	);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':interest', $interest);    
    $stmt->execute();
?>