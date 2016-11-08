<?php
    include"connect.php";
    file_put_contents("z.txt", print_r("start", true));
    session_start();
    $logged = $_SESSION['logged_on_user'];
    if ($_SESSION['logged_on_user'] == "")
		die("ERROR : no user logged on");
	$user = $_POST['user'];
    
	$pdo = connect(); //returns PDO object thats connected to db.
	$pdo->query("USE matcha_db"); //tell it what database to use

    file_put_contents("x.txt", print_r("$user", true));
    $stmt = $pdo->prepare("SELECT UserLiked FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");

    file_put_contents("z.txt", print_r("check", true));
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":logged", $logged);
    $stmt->execute();
     file_put_contents("z.txt", print_r("executed", true));
    if($stmt->rowCount() == 1)//deletes the like if one is found
    {
        file_put_contents("z.txt", print_r("found", true));
        $stmt = $pdo->prepare("DELETE FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
    }
    elseif ($stmt->rowCount() == 0) //Creates a like if one isn't found
    {
        file_put_contents("z.txt", print_r("not found", true));
        $stmt = $pdo->prepare("INSERT INTO ProfLikes (UserLiked, Liker) VALUES (:user , :logged)");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
        file_put_contents("check.txt", print_r("executed", true));
    }
    else 
    {
        file_put_contents("z.txt", print_r("too many", true));
        $stmt = $pdo->prepare("DELETE FROM ProfLikes WHERE UserLiked = :user AND Liker = :logged");
        $stmt->bindParam(":user", $user);
        $stmt->bindParam(":logged", $logged);
        $stmt->execute();
    }
?>