<?php
  include"bckend/connect.php";
  session_start();
   if (!isset($_SESSION['logged_on_user']))
   header("Location: login.php");
?> 
<!DOCTYPE html>
<html>
<title>Pic Snap :D</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="Stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

   <link rel="Stylesheet" type="text/css" href="homepage/home.css">
<link rel="Stylesheet" type="text/css" href="css/homebar.css">
  <link rel="shortcut icon" url("srcimg/cherry.png")/>
        <br>

<h1><center><font style="font-family:Chopin Script, Arial;" color=black>Matcha</font></center></h1>
<br>
</head>
<body>

<center><nav class="home">
    <ul>
    <li><a href="./homepage/home.php">Home</a></li>
    <li><a href="./gallery.php">Gallery</a></li>
    <li><a href="#contact">Contact</a></li>
     <li class="active"><a href="/../myaccount.php">Account</a></li>
  </ul>
</nav></center>
<br>
<center><section>

<div class="container" id="edit_contain">
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
<?php
        $user = $_SESSION['logged_on_user'];
        $pdo=connect();
        $pdo->query("USE matcha_db");
        $stmt = $pdo->prepare("SELECT PicID FROM Pictures WHERE Username = :user AND ProfPic = 1");
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        if($stmt->rowCount() != 1)
        {
          $str = "//placehold.it/100";
        }
        else
        {
          $str = $stmt->fetch(PDO::FETCH_COLUMN);
        }
        ?>
          <img style="width : 80%" id="profpic" src="<?php echo $str ?>" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
		  <form enctype="multipart/form-data" id="image_upload_form" method="post">
          <input id="image1" type="file" class="form-control">           
          <input type="button" class="form-control" value="Upload Photo" onclick="userUpload()">
		  </form>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info" id="personal_div">
    <!--    <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> -->
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method="POST" action="bckend/changes.php">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input id="first_name" class="form-control" type="text" name="fname" value="Jane">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input id="last_name" class="form-control" type="text" name="lname" value="Bishop">
            </div>
          </div>
   <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input id="email" class="form-control" type="text" name="email" value="Example@gmail.com">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Bio:</label>
            <div class="col-lg-8">
              <textarea id="bio" maxlength="500" style="height: 200px" class="form-control" name="bio" type="text" value=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input readonly class="form-control" type="text" name="uname" value="<?php session_start();
              echo$_SESSION['logged_on_user']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input id="passwd" class="form-control" type="password" name="pass" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input id="confpasswd" class="form-control" type="password" name="confpass" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary" value="Save Changes" onclick="updateProfile();">
              <span></span>
              <input type="button" class="btn btn-default" value="Cancel" onclick="getAccountInfo()">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

<br></br>
<footer>:D</footer>
</section></center>

<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript" src="js/getAccount.js"></script>
<script type="text/javascript" src="js/updateProfile.js"></script>
<script>
getAccountInfo();
</script>
</body>



</html>