<!DOCTYPE html>
<html>
<!--   <?php
  // session_start();
   // if ($_SESSION['logged_on_user'] == "")
   // header("Location: login.php");
    ?> -->
<title>Pic Snap :D</title>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <link rel="Stylesheet" type="text/css" href="css/login.css"/>
  <link rel="shortcut icon" url="srcimg/cherry.png"/>
        <br/>
<h1><center><font style="font-family:Chopin Script, Arial;" color=black>:D</font></center></h1> 
  
</head>
<body>

<!-- <center><section> -->


<form method="POST" action="bckend/reguser.php">
<center><header>Register</header></center>
<?php
	$error = $_GET['err'];
	echo"<div class='help' style='color:red;'>";
    echo "Error code = $error";
    echo"</div>"; // make pretty and add ifs
?>

<label>Username</label>
<div class="help">At least 6 characters</div>
<input name="username" type="text">
<label>First Name</label>
<input name="first" type="text">
<label>Last Name</label>
<input name="last" type="text">
<label>Email</label>
<input name="email" type="text">
<label style="width: 100%">Gender</label>

<div class="container">	
  <ul>
  <li>
    <input type="radio" id="a-option" name="gender" value="1">
    <label for="a-option">Male</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="b-option" name="gender" value="2">
    <label for="b-option">Female</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
</ul>
</div>

<label style="width: 100%">Sexual Preferance</label>

<div class="container">	
  <ul>
  <li>
    <input type="radio" id="c-option" name="sexpref" value ="1">
    <label for="c-option">Male</label>
    
    <div class="check"></div>
  </li>
  
  <li>
    <input type="radio" id="d-option" name="sexpref" value="2">
    <label for="d-option">Bisexual</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
  
  <li>
    <input type="radio" id="e-option" name="sexpref" value="3">
    <label for="e-option">Female</label>
    
    <div class="check"><div class="inside"></div></div>
  </li>
</ul>
</div>

<label style="width: 100%">Age</label>
<input name="age" type="number">

<!--
if($_GET["err"] == 1)
{
    echo"<div class='help' style='color:red;'>";
    echo"   Username or Password is incorrect";
    echo"</div>";
}
-->
<label>Password</label>
<input name="pword" type="password"/>
<div class="help">Use upper and lowercase letters as well</div>
<label> confirm Password</label>
<input name="conf" type="password"/>

<a href="login.php" class="button" style="float:left; margin-left: 60px" type="submit" name="submit" value="OK" class="button">Login</a>

<button style="float:right; padding: 3px">Register</button>



</form>
<!-- </section> -->


    
<!--<nav>
    <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="./gallery.php">Gallery</a></li>
    <li><a href="#contact">Contact</a></li>
    <li style="float:right"><a href="./logout.php">logout</a></li>
    </ul>
</nav> -->

<br/>
</div>
</body>



</html>