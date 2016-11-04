 <?php    
    
    function imagelist($username, $firstname, $lastname, $imgurl, $age, $bio)
    { 
        $count = count($username);
       for($i = 0 ; $i < $count; $i++)
        {
            echo"
                        <div class='container'>
    <div class='user-menu-container'>
        <div class='col-md-7 user-details'>
            <div class='row coralbg white'>
                <div class='col-md-6 no-pad'>
                    <div class='user-pad'>
                        <h3>$firstname[$i] $lastname[$i]</h3>
                        <h4 class='white'><i class='fa fa-check-circle-o'></i>$location[$i]</h4>
                         <h4 class='white'><i class='fa fa-check-circle-o'></i>$age[$i]</h4>
                        <button type='button' class='btn btn-info' href='#'>
                        <span><i class='glyphicon glyphicon-user'></i></span></button>
                        <button type='button' class=' btn btn-info' href='#'>
                        <span><i class='glyphicon glyphicon-comment'></i></span></button>
                          <button data-dismiss='modal' data-toggle='modal' data-target='#chat-modal' type='button' class='btn  btn-info' href='#'>
                        <span><i class='glyphicon glyphicon-thumbs-up'></i></span></button>
                    </div>
                </div>
                <div class='col-md-6 no-pad'>
                    <div class='user-image'>
                        <img src='$imgurl[$i]' class='img-responsive thumbnail'>
                    </div>
                </div>
            </div>
              <h3>Bio</h3>
     <!--       <div class='row overview'>
                $bio[$i]
            </div> -->
        </div>
   
    </div>
</div>";
        }
    }

  function extract_users()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `usernames` FROM `imagetable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }

    function extract_firstn()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `usernames` FROM `imagetable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }

    function extract_lastn()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `usernames` FROM `imagetable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }



    function extract_image_user()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `image_url` FROM `imagetable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }

    function extract_age_user()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `age` FROM `agetable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }

    function extract_location_user()
    {
        session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `location` FROM `locationtable` WHERE `user` = '$user'");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }
    ?>