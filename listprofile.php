 <?php    
    
    function imagelist($rel, $urls, $id, $liclass, $imgclass)
    { 
       // echo "<ul class='hoverbox'>";
        $count = count($urls);
       for($i = 0 ; $i < $count; $i++)
        {
            echo"
            <li class='$liclass'>
            <a href='" . $rel . $id[$i]
            . "'><img src='" . $rel . $urls[$i] . "'
            alt='image not found'
            class='" . $imgclass . "'/></a>
            </li>";
        }
        //echo "</ul>";







        <div class="container">
    <div class="user-menu-container  "> <!--  square row-->
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>$firstname $lastname</h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                        <h4 class="white"><i class="fa fa-twitter"></i> CoolesOCool</h4>
                      
                        <button type="button" class="btn btn-info" href="#">
                        <span><i class="glyphicon glyphicon-user"></i></span></button>
                        <button type="button" class=" btn btn-info" href="#">
                        <span><i class="glyphicon glyphicon-comment"></i></span></button>
                          <button data-dismiss="modal" data-toggle="modal" data-target="#chat-modal" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-thumbs-up"></i></span></button>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="$urls" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
              <h3>Interests/ bio ¯\_(ツ)_/¯</h3>
     <!--       <div class="row overview">
  
            </div> -->
        </div>
   
    </div>
</div>
    }


    function extract_image_user()
    {
        session_start();
        $user = $_SESSION['logged_on_user'];
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `image_url` FROM `imagetable` WHERE `user` = '$user' ORDER BY `date_created` DESC ");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }

    function extract_image_user()
    {
        session_start();
        $user = $_SESSION['logged_on_user'];
        $pdo = connect();
        $pdo->query("USE db_matcha");
        echo $user;
        $stmt = $pdo->prepare("SELECT `image_url` FROM `imagetable` WHERE `user` = '$user' ORDER BY `date_created` DESC ");
        $stmt->execute();   
        $urls = $stmt->fetchAll(PDO::FETCH_COLUMN);
        $pdo = null;
        return ($urls);
    }
    ?>