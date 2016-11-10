<?php
include "bckend/connect.php";
session_start();
$user = $_SESSION['logged_on_user'];
$pdo = connect();

$sql = $pdo->query("USE matcha_db");
$stmt = $pdo->prepare("SELECT UserLiked FROM proflikes WHERE user = :Username");
$stmt->bindParam(":Username", $user);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $like)
{
    $stmt = $pdo->prepare("SELECT UserLiked FROM proflikes WHERE user = :Username AND UserLiked = :UserLiked");
    $stmt->bindParam(":Username", $like['UserLiked']);
    $stmt->bindParam(":UserLiked", $user);
    $stmt->execute();
    if ($stmt->rowCount() > 0)
    {
        //get info
        $stmt = $pdo->prepare("SELECT Username, name, surname FROM users WHERE Username = :Username");
        $stmt->bindParam(":Username", $like['UserLiked']);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //get profile pic
        $stmt = $pdo->prepare("SELECT image_path FROM images WHERE user = :Username AND is_main = 'Y'");
        $stmt->bindParam(":Username", $like['UserLiked']);
        $stmt->execute();
        $imgdata = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data[0]['profile_pic'] = $imgdata[0]['image_path'];
        $matches[] = $data[0];
    }
}
echo json_encode($matches);