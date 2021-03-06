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
    <li><a href="./logout.php">Logout</a></li>
     <li class="active">Account</li>
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
          <img style="width : 80%" id="profpic" src="//placehold.it/100" alt="Upload a photo!">
          <h6>Upload a different photo...</h6>
		  <form enctype="multipart/form-data" id="image_upload_form" method="post">
          <input id="image1" type="file" class="form-control">           
          <input type="button" class="form-control" value="Upload Photo" onclick="userUpload()">
             <input type="button" class="btn btn-default" value="Delete" onclick="ProfDelete()">
		  </form>
        </div>
        <div>
        <div class="col-s-6 col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#modalimg" onclick=setIMGID(0)>
          <img style="display:none;" id="pic0" src="" class="avatar img-circle" alt="">
        </a>
        </div>
        <div class="col-s-6 col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#modalimg" onclick=setIMGID(1)>
          <img style="display:none;" id="pic1" src="" class="avatar img-circle" alt="">
        </a>
        </div>
        <div class="col-s-6 col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#modalimg" onclick=setIMGID(2)>
          <img style="display:none;" id="pic2" src="" class="avatar img-circle" alt="">
        </a>
        </div>
        <div class="col-s-6 col-md-3">
        <a href="#" class="thumbnail" data-toggle="modal" data-target="#modalimg" onclick=setIMGID(3)>
          <img style="display:none;" id="pic3" src="" class="avatar img-circle" alt="">
        </a>
        </div>
        <div id="modalimg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-body">
									<img id="modalsrc" src="" class="img-responsive">
									<button id="delete" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalimg" onclick=deleteIMG()>Delete</button>
									<button id="setpfp" type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalimg" onclick=setProfIMG()>Set as profile pic</button>
								</div>
							</div>
						</div>
					</div>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info" id="personal_div">
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
            <label class="col-lg-3 control-label">Interests:</label>
            <div class="col-lg-8" id="interest_div">
              <input onkeypress="handle(event)" id="interests" class="form-control" type="text" name="lname">
              <br>
              <div id="interest_sub">
               
              </div>
                <br>            
              <input type="button" class="btn btn-primary" value="Add interest" onclick="addinterest()">
              <span></span>
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