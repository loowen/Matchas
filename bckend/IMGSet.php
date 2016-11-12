<?php
    include"connect.php";

    session_start();
    $log = $_SESSION['logged_on_user'];
    if ($log == "")
		die("ERROR : no user logged on");
    $pdo = connect();
    $pdo->query("USE matcha_db");
    $stmt = $pdo->prepare("UPDATE `pictures` SET ProfPic = 0 WHERE Username = :user AND ProfPic = 1");
    $stmt->bindParam(":user", $log);
    $stmt->execute();
    $stmt = $pdo->prepare("UPDATE `pictures` SET ProfPic = 1 WHERE Username = :user AND PicID = :pic");
    $img = $_POST['newIMG'];
    $stmt->bindParam(":user", $log);
    $stmt->bindParam(":pic", $img);
    $stmt->execute();
?>