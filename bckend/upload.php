<?PHP
include_once "connect.php";

function getImgName()
{
    $name = uniqid("IMG-") . ".png";
    return $name;
}

function uploadUserImage($user)
{
    file_put_contents("log.txt", print_r($_FILES, true));    
	$name = $_FILES['user']['name'];
	$tmpLoc = $_FILES['user']['tmp_name'];
	$type = $_FILES['user']['type'];
	$size = $_FILES['user']['size'];
	$err = $_FILES['user']['error'];
	if (empty($name))
	{
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit;
	}
	$extpos = strrpos($name, ".", 0);
	$ext = strtolower(substr($name, $extpos));
	$newName = getImgName();
	$path = "../images/" . $newName;
	if ($ext != ".jpg" && $ext != ".jpeg" && $ext != ".png")
	{
		echo "ERROR: Only jpeg and png images are supported.";
		if (file_exists($tmpLoc))
			unlink($tmpLoc);
		exit;
	}
        file_put_contents("log.txt", "stuff");
	
	if(move_uploaded_file($tmpLoc, $path))
	{
        file_put_contents("log.txt", "stuff");
		addImageDb($path, $newName, $user);
	}
   	else
	{
		echo "move_uploaded_file function failed";
		exit;
	}
	
}


    function addImageDb($path, $name, $user)
    {
		file_put_contents("log.txt", "$path, $name, $user");
        $pdo = connect();
        date_default_timezone_set("Africa/Johannesburg");
        $sql = $pdo->query("USE matcha_db");
        $stmt = $pdo->prepare("INSERT INTO pictures (PicID, Username) 
            VALUES (:pic_id, :user)");
        $stmt->bindParam(':pic_id', $path);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $pdo = null;
    }

    	session_start();
        $user = $_SESSION['logged_on_user'];
//	$user = $_SESSION['logged_on_user'];	
//	if ($_SESSION['logged_on_user'] == "")
//		exit;
	if (file_exists('../images') == false)
	{
		echo "Directory not made, creating";
		mkdir('../images');
	}
	if (isset($_FILES['user']))
	{
		uploadUserImage($user);	
	}
	else
	{
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit;
	}
?>