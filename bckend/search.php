<?php

   $age_min = $_POST['age_min'];
   $age_max = $_POST['age_max'];
   $fame_min = $_POST['fame_min'];
   $fame_max = $_POST['fame_max'];
   $interests = $_POST['interests'];
   
   if ($age_min < 18 && $age_min)
    $age_min = 18;
    if (!$age_min)
    $age_min = 0;
    if ($fame_min < 0 || !isset($fame_min))
    $fame_min = 0;
    if (!$fame_max)
    $fame_max = 0;  
   
   $url = "home.php?";
   if ($age_min)
   $url = $url . "age_min=$age_min&";
   if ($age_max)
   $url = $url . "age_max=$age_max&";
   if ($fame_min)
   $url = $url . "fame_min=$fame_min&";
    if ($fame_max)
   $url = $url . "fame_max=$fame_max&";
    if ($interests)
   $url = $url . "interests=$interests&";
  // $url = "home.php?age_min=$age_min&age_max=$age_max&fame_min=$fame_min&fame_max=$fame_max&interests=$interest";
   echo $url;
/*    include "connect.php";

    session_start();
    $user = $_SESSION['logged_on_user'];
    $search = $_POST['search'];

    $pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"SELECT `Username` FROM `users` 
    WHERE Username = :search"
	);
    $stmt->bindParam(':search',$search);
    $stmt->execute();
    $data = $stmt->fetchALL(PDO::FETCH_COLUMN);
    echo json_encode($data);
//echo("thigs");
*/

?>