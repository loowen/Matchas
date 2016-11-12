<?php
    include "connect.php";
    $src = $_POST['src'];
    $pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"DELETE FROM `pictures`
    WHERE PicID = :src"
	);
    $stmt->bindParam(':src', $src);  
    $stmt->execute();
?>