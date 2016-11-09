<!DOCTYPE html>
<html>

<title>Pic Snap :D</title>
<head>

    	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="Stylesheet">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

   <link rel="Stylesheet" type="text/css" href="home.css">
<link rel="Stylesheet" type="text/css" href="../css/homebar.css">
<link rel="Stylesheet" type="text/css" href="../css/chat.css">
  <link rel="shortcut icon" url("srcimg/cherry.png")/>
        <br>

<h1><center><font style="font-family:Chopin Script, Arial;" color=black>Matcha</font></center></h1>
<br>
</head>
<body>
<link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
<center><nav class="home">
    <ul>
    <li class="active"><a href="#home">Home</a></li>
    <li><a href="./gallery.php">Gallery</a></li>
    <li><a href="#contact">Contact</a></li>
     <li><a href="../myaccount.php">Account</a></li>
  </ul>
</nav></center>
    <br>
<center><section>

<header>

<!--<div class="container">
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search for Users" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control">
                                        <option value="0" selected>All Users</option>
                                        <option value="1">Liked Users</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Most compatible</option>
                                        <option value="4">Age</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Interests</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Keywords</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
	</div>
</div>-->


</header>



<div id="chat-modal" class="modal fade">
        <div class=""> <!-- modal-dialog  style="width: 90%"-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Chat</h4>
                </div>
                <div class="modal-body " id="chat">

     
                  
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
               <script>$( "#chat" ).load( "../chat.html" )</script>


<div id="profile-modal" class="modal modal-wide fade">
            <div style="background: white"  class="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="username" class="modal-title">User Profile</h4>
                </div>
                <div class="modal-body " id="profile">

                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
           <script>$( "#profile" ).load( "./viewprofile.php" )</script>


<div id="" class="modal modal-wide fade">
            <div class=" modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Block User</h4>
                </div>
                <div class="modal-body " id="block">

     
                  
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
               <script>$( "#block" ).load( "../block.html" )</script>
<!--<aside>
<form method="POST" action="">
<center><header></header></center>

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
</ul>
</div>

<label style="width: 100%">Age</label>
<input name="age" type="number">
</form>


</aside>-->

<br></br>
<br></br>
<br></br>

<?php
    include "../listprofile.php";

    $data = extract_users();
    userlist($data);
?>


<br></br>
<br></br>
<br></br>
<footer>:D</footer>
</section></center>

<script type="text/javascript" src="../js/functions.js"></script>
<script type="text/javascript" src="../js/getProfile.js"></script>
</body>



</html>