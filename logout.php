   <?php
        include"bckend/connect.php";
        //session_start();
        $user = /*$_SESSION['logged_on_user']*/'loowen';
        $pdo=connect();
        $pdo->query("USE matcha_db");
        $stmt = $pdo->prepare("UPDATE `users` SET `LastLog` = NOW(), `Logged` = 0 WHERE `Username` = :user");
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $_SESSION['logged_on_user'] = "";
        echo ' <script type="text/javascript"> parent.window.location.replace("http://localhost:8080/Matcha/login.php"); </script> ';
    ?>