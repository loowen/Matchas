<?PHP

include "bckend/connect.php";

$email = /*$_POST['email']*/ "hamlynluke@gmail.com";
$username = /*$_POST['username']*/"loowen";
if($password = /*$_POST['pword']*/"15hamllu")
{
    echo"worked";
}
else{
    header("Location: index.html?err=11");
}
if($age = /*$_POST['age']*/ 19)
{
    echo"found";
}
else
{
    header("Location: index.html?err=11");
}
if($gender = /*$_POST['gender']*/1)
{
    echo"found";
}
else
{
    header("Location: index.html?err=9");
}
if($sexpref= /*$_POST['sexpref']*/3)
{
    echo"found";
}
else
{
    header("Location: index.html?err=10");
}
$first=/*$_POST['first']*/"luke";
$last=/*$_POST['last']*/"hamlyn";
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
    header("Location: index.html?err=1");
}
echo"1";
if (strlen($password) < 6)
{
    echo "ERROR";
    header("Location: index.html?err=2");
}
echo"1";
if (strlen($username) < 6)
{
    echo "ERROR";
    header("Location: index.html?err=3");
}
echo"1";
if ($password != /*$_POST['conf']*/"15hamllu")
{
    echo "ERROR";
    header("Location: index.html?err=4");
}
echo"1";
if(!isset($gender) || !isset($sexpref))
{
    header("Location: index.html?err=5");
}
echo"1";
if($age < 18)
{
    header("Location: index.html?err=$age");
}
echo"3";
if (! preg_match('/^([a-zA-Z0-9.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/', $email))
{
    header("Location: index.html?err=7");
}
echo"2";
if(!isset($first) || !isset($last))
{
    header("Location: index.html?err=8");
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
header("Location: login.php");
echo "Records added successfully.\n";
?> 