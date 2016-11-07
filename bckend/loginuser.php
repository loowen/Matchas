<?php
    include"connect.php";
    session_start();
    $user = $_POST['username'];
    $pword = hash("whirlpool",$_POST['pword']);
    echo "user = $user<br>";
    echo "pword = $pword<br>";
    
    $pdo = connect();
    $pdo->query("USE matcha_db");
    echo"query";
    $stmt = $pdo->prepare("SELECT `password` FROM `users` WHERE Username = :username");
    $stmt->bindParam(':username', $user);
    $stmt->execute();
    echo"stmt->rowCount()=".$stmt->rowCount();
    $check = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "pword = " . $check[0];
     if ($stmt->rowCount() != 1)
     {
         echo"ERROR";
         header("Location: ../login.php?err=1");
     }
     else if($check[0] == $pword)
     {
         echo"working";
         $_SESSION['logged_on_user'] = $user;
         $stmt= $pdo->prepare("UPDATE `users` SET `Logged` = 1 WHERE `Username` = :user");
         $stmt->bindParam(":user", $user);
         $stmt->execute();
         header("Location: ../homepage/home.php");
     }
     else
     {
         echo"ERROR";
     }
?>