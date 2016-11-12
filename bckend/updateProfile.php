<?php


	session_start();
	$user = $_SESSION['logged_on_user'];
	$first = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$bio = $_POST['bio'];
	$passwd = $_POST['passwd'];
	$confpasswd = $_POST['confpasswd'];
	$interests = $_POST['interests'];
	
	$bio = htmlspecialchars($bio);
	if (!$first || strlen($first) <= 0 || !preg_match('/^[A-Za-z0-9_-]+$/', $first))
	{
		echo "ERROR : invalid name.";
		die();
	}
	if (!$surname || strlen($surname) <= 0 || !preg_match('/^[A-Za-z0-9_ -]+$/', $surname))
	{
		echo "ERROR : invalid surname.";
		die();
	}

	if (strlen($bio) > 500)
		{
		echo "ERROR : bio too long";
		die();
	}
	
	if (! preg_match('/^([a-zA-Z0-9.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/', $email))
	{
		echo "ERROR : Invalid Email";
		die();
	}

	if($passwd != $confpasswd)
	{
		echo "ERROR : Passwords Don't match";
		die();
	}
	
	include "connect.php";
	
	if(sizeof($passwd) >= 8)
	{
	$pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"UPDATE `users` SET
	`password` = :pass, 
	`email` = :email , 
	`Firstname` = :first,
	`Lastname` = :last,
	`Bio` = :bio
	WHERE `Username` = :username"
	);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':first',$first);
    $stmt->bindParam(':last', $surname);
	$stmt->bindParam(':bio', $bio);
	$stmt->bindParam(':username', $user);
	$passwd = hash("whirlpool",$passwd);
	$stmt->bindParam(':pass', $passwd);
	}
	else
	{
	$pdo = connect();
	$pdo->query("USE matcha_db");
	$stmt = $pdo->prepare(
	"UPDATE `users` SET
	`email` = :email , 
	`Firstname` = :first,
	`Lastname` = :last,
	`Bio` = :bio
	WHERE `Username` = :username"
	);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':first',$first);
    $stmt->bindParam(':last', $surname);
	$stmt->bindParam(':bio', $bio);
	$stmt->bindParam(':username', $user);
	}
	//$stmt->bindParam(':age', $age);
    //$stmt->bindParam(':gender', $gender);
    //$stmt->bindParam(':sexualpref', $sexpref);

	/*$stmt = $pdo->prepare("INSERT INTO `interests` (
		:Interests, :username)";
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':Interests', $interests);
    $stmt->execute();
*/

    $stmt->execute();
?>