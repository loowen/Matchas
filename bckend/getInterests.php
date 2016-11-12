<?php
    include "connect.php";

    session_start();
    $user = $_SESSION['logged_on_user'];

    $pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"SELECT `Interests` FROM `interests` 
    WHERE User = :user"
	);
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $data = $stmt->fetchALL(PDO::FETCH_COLUMN);
    echo json_encode($data);
?>