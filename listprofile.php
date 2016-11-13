 <?php    
    include_once "bckend/connect.php";
    function userlist($data)
    { 
        $count = count($data);
       for($i = 0 ; $i < $count; $i++)
        {
            if($data[$i]['blocker'] != 1
            && ($data[$i]['Age'] >= $_GET['age_min'] || !$_GET['age_min'])
            && ($data[$i]['Age'] <= $_GET['age_max'] || !$_GET['age_max'])
            && ($data[$i]['FameRating'] >= $_GET['fame_min'] || !$_GET['fame_min'])
            && ($data[$i]['FameRating'] <= $_GET['fame_max'] || !$_GET['fame_max'])
            )
            {
                echo '
            <div class="container">
    <div class="user-menu-container  ">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>'. $data[$i]['Firstname'] . ' ' . $data[$i]['Lastname'] . '</h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                        <h4 class="white"><i class=""></i>Age ' . $data[$i]['Age'] .'</h4>
                          <button onclick ="getProfile(\''. $data[$i]['Username'] .'\')" data-dismiss="modal" data-toggle="modal" data-target="#profile-modal" type="button" class="btn  btn-info href="#">
                 <span><i class="glyphicon glyphicon-user"></i></span></button>';
                 if($data[$i]['liked'] == 1)
                 {
                        echo'<button data-dismiss="modal" data-toggle="modal" data-target="#chat-modal" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-comment"></i></span></button>';
                  }
                         echo'<button data-dismiss="modal" onclick="getLiked(\''. $data[$i]['Username'].'\')" data-toggle="modal" data-target="#like" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-thumbs-up"></i></span></button>
                            <button data-dismiss="modal" onclick="getBlock(\''.$data[$i]['Username'].'\')" data-toggle="modal" data-target="#block-modal" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-ban-circle"></i></span></button>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img id="userpfp' .  $i . '" src="' . $data[$i]['image'] .'" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
              <h3>' .$data[$i]['Bio'] .'</h3>
     <!--       <div class="row overview">
  
            </div> -->
        </div>
   
    </div>
</div>
            ';
            }
        }
    }

function extract_users()
{
    include_once"bckend/connect.php";
    session_start();
    $user = $_SESSION['logged_on_user'];
    $i = 0;
    $pdo = connect();
    $pdo->query("USE matcha_db");
    $stmt = $pdo->prepare("SELECT SexualPref FROM `users` WHERE Username = :user");
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $pref = $stmt->fetch(PDO::FETCH_ASSOC);
    if($pref = 3)
    {
    $stmt = $pdo->prepare("SELECT Username, Firstname, Lastname, Age, Gender, Bio FROM `users` WHERE Username != :user");
    }
    elseif($pref = 2)
    {
        $stmt = $pdo->prepare("SELECT Username, Firstname, Lastname, Age, Gender, Bio FROM `users` WHERE Username != :user AND Gender = 2");
    }
    elseif($pref = 1)
    {
        $stmt = $pdo->prepare("SELECT Username, Firstname, Lastname, Age, Gender, Bio FROM `users` WHERE Username != :user AND Gender = 1");
    }
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    while ($i < $count)
    {
        $stmt = $pdo->prepare("SELECT PicID FROM pictures WHERE Username = :user AND ProfPic = 1");
        $stmt->bindParam(":user", $data[$i]['Username']);
        $stmt->execute();
        $img = $stmt->fetch(PDO::FETCH_ASSOC);
        $data[$i]['image'] = "../" . $img['PicID'];
        $i++;
    }
    $i = 0;
    $stmt = $pdo->prepare("SELECT UserLiked, Liker FROM ProfLikes WHERE UserLiked = :user OR Liker = :users ");
    $stmt->bindParam(":users", $user);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $likes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    while($i < $count)
    {
       if($likes[$i]['UserLiked'] != $user)
       {
           $temp = $likes[$i]['UserLiked'];
           $x = 0;
           while($x < $count)
           {
               if($likes[$x]['Liker'] == $temp)
               {
                   $found = 1;
               }
               $x++;
           }
           if($found == 1)
           {
                $x=0;
                while($x < $count)
                {
                    if($data[$x]['Username'] == $temp)
                    {
                        $data[$x]['liked'] = 1;
                    }
                    $x++;
                }
           }
       }
       else if($likes[$i]['Liker'] != $user)
       {
           $temp = $likes[$i]['Liker'];
           $x = 0;
           while($x < $count)
           {
               if($likes[$x]['UserLiked'] == $temp)
               {
                   $found = 1;
               }
               $x++;
           }
           if($found == 1)
           {
                $x=0;
                while($x < $count)
                {
                    if($data[$x]['Username'] == $temp)
                    {
                        $data[$x]['liked'] = 1;
                    }
                    $x++;
                }
           }
       }
       $i++;

    }
    $stmt = $pdo->prepare("SELECT Blocker, Blocked FROM blocked WHERE Blocker = :user OR Blocked = :users ");
    $stmt->bindParam(":users", $user);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $blocks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    $i = 0;
   while ($i < $count) 
    {
        if($blocks[$i]['Blocker'] != $user)
        {
            $temp=$blocks[$i]['Blocker'];
            $x = 0;
            while($x < $count)
            {
                if($data[$x]['Username'] == $temp)
                {
                    $data[$x]['blocker'] = 1;
                }
                $x++;
            }
        }
        elseif($blocks[$i]['Blocked'] != $user)
        {
            $temp=$blocks[$i]['Blocked'];
            $x = 0;
            while($x < $count)
            {
                if($data[$x]['Username'] == $temp)
                {
                    $data[$x]['blocker'] = 1;
                }
                $x++;
           }
        }
        $i++;
    }
    $pdo = null;
    return ($data);
}

function search_users()
{
    session_start();
    $user=$_SESSION['logged_on_user'];
    $pdo=connect();
    $pdo->query("USE matcha_db");
    if($username != "")
    {
        $stmt= $pdo->prepare("SELECT Username, Firstname, Lastname, Age, Gender, Bio FROM `users` Where Username != :user AND Username = :userfind");
        $stmt->bindParam(":userfind", $userfind);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
    }
    else if($liked != "")
    {
        $stmt= $pdo->query("SELECT Username, Firstname, Lastname, Age, Gender, Bio FROM `users` Where Username != :user AND ");
    }
    else
    {

    }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    while ($i < $count)
    {
        $stmt = $pdo->prepare("SELECT PicID FROM pictures WHERE Username = :user AND ProfPic = 1");
        $stmt->bindParam(":user", $data[$i]['Username']);
        $stmt->execute();
        $img = $stmt->fetch(PDO::FETCH_ASSOC);
        $data[$i]['image'] = "../" . $img['PicID'];
        $i++;
    }
    $pdo = null;
    return($data);
}
    ?>