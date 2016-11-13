<?php
    include"bckend/connect.php";

    $pdo=connect();
    $pdo->query("USE matcha_db");
    $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :mail");

    $email = $_POST['email'];
    $stmt->bindParam(":mail", $email);
    $stmt->execute();
    if($stmt->rowCount() == 1)
    {
        $stmt = $pdo->prepare("UPDATE users SET password = :hash WHERE email = :mail");
        $pass= uniqid();
        $hash = hash("whirlpool", $pass);
        $stmt->bindParam(":hash", $hash);
        $stmt->bindParam(":mail", $email);
        $stmt->execute();
    }
    else
    {
        die(";-;");
    }
    $message= "Your new password is $pass Go to Localhost:8080/Matcha/myaccount.php and reset your password";
    $subject = "Password Reset";
    mail($email,$subject,$message);
    header("Location : login.php");
?>