   <?php
        include"bckend/connect.php";
        session_start();
        date_default_timezone_set("Africa/Johannesburg");
        $date = date("d/m/Y G:i:s");
        $user = $_SESSION['logged_on_user'];
        $pdo=connect();
        $pdo->query("USE matcha_db");
        $stmt = $pdo;
        $stmt->query("UPDATE `users` SET `LastLog` = $date AND `Logged` = FALSE WHERE `Username` = :user");
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $_SESSION['logged_on_user'] = "";
        header("Location: index.php");

    ?>