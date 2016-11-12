<?php
    include "connect.php";

    session_start();
    $user = $_SESSION['logged_on_user'];
    $pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"DELETE FROM `history`
    WHERE User = :user"
	);
    $stmt->bindParam(':user', $user);  
    $stmt->execute();
?>