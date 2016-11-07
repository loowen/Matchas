<?PHP

include "connect.php";

$email = $_POST['email'];
$username = $_POST['username'];
if($password = $_POST['pword'])
{
    echo"worked";
}
else{
    header("Location: index.php?err=11");
}
if($age = $_POST['age'])
{
    echo"found";
}
else
{
    header("Location: index.php?err=11");
}
if($gender = $_POST['gender'])
{
    echo"found";
}
else
{
    header("Location: index.php?err=9");
}
if($sexpref = $_POST['sexpref'])
{
    echo"found";
}
else
{
    header("Location: index.php?err=10");
}
$first=$_POST['first'];
$last=$_POST['last'];
$hshed = hash("whirlpool", $password);

echo "user = $username  pass = $hshed <br>";

$pdo = connect();
echo"work?";
$pdo->query("USE matcha_db");
echo" query ";
$stmt = $pdo->prepare("SELECT `Username` FROM `users` WHERE username = :username OR email = :email");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->execute();

echo $stmt->rowCount();
echo" work ";
echo"1";
if ($stmt->rowCount() > 0)
{
    echo "ERROR";
    header("Location: ../index.php?err=1");die();
	
}
echo"1";
if (strlen($password) < 6)
{
    echo "ERROR";
    header("Location: ../index.php?err=2");die();
}
echo"1";
if (strlen($username) < 6 || !preg_match('/^[A-Za-z0-9_-]+$/', $username))
{
    echo "ERROR";
    header("Location: ../index.php?err=3");die();
}
echo"1";
if ($password != $_POST['conf'])
{
    echo "ERROR";
    header("Location: ../index.php?err=4");die();
}
echo"1";
if(!isset($gender) || !isset($sexpref) 
	|| $sexpref > 3 || $sexpref <= 0 || $gender > 2 || $gender <= 0 )
{
    header("Location: ../index.php?err=5");die();
}
echo"1";
if($age < 18)
{
    header("Location: ../index.php?err=$age");die();
}
echo"3";
if (! preg_match('/^([a-zA-Z0-9.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/', $email))
{
    header("Location: ../index.php?err=7");die();
}
echo"2";
if(!isset($first) || !isset($last) 
	|| !preg_match('/^[A-Za-z- ]+$/', $first) || !preg_match('/^[A-Za-z- ]+$/', $last))
{
    header("Location: ../index.php?err=8");die();
}
echo"checked";
$stmt = $pdo->prepare("INSERT INTO `users` ( `Username`, `password`, `email`, `Firstname`, `Lastname`, `Age`, `Gender`, `SexualPref`)
    VALUES (:username, :pword, :email, :first, :last, :age, :gender, :sexualpref)");
echo" prepare ";
    $stmt->bindParam(':email', $email);
    echo"$email";
    $stmt->bindParam(':username', $username);
    echo"$username";
    $stmt->bindParam(':pword',$hshed);
    echo"$hshed";
    $stmt->bindParam(':first',$first);
    echo"$first";
    $stmt->bindParam(':last', $last);
    echo"$last";
    $stmt->bindParam(':age', $age);
    echo"$age";
    $stmt->bindParam(':gender', $gender);
    echo"$gender";
    $stmt->bindParam(':sexualpref', $sexpref);
    echo"$sexpref";
    $stmt->execute();
echo"profile";
header("Location: ../homepage/home.php");
echo "Records added successfully.\n";
?> 