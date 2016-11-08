<?php
    include"connect.php";

    session_start();
    $logged = $_SESSION['logged_on_user'];
    if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
	$user = $_POST['user'];
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use
    $stmt = $pdo->query("SELECT UserLiked FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":logged", $logged);
    $stmt->execute();
    if($stmt->rowCount() == 1)//deletes the like if one is found
    {
        $stmt = $pdo->query("DELETE FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
    }
    elseif ($stmt->rowCount() == 0) //Creates a like if one isn't found
    {
        $stmt = $pdo->query("INSERT INTO ProfLikes (UserLiked, Liker) VALUES (:user , :logged");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
    }
    else 
    {
        $stmt = $pdo->query("DELETE FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
    }
?>