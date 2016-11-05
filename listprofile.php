 <?php    
    include_once "../bckend/connect.php";
    function userlist($data)
    { 
        $count = count($data);
        //print_r($data);
        
       for($i = 0 ; $i < $count; $i++)
        {
            echo'

            <div class="container">
    <div class="user-menu-container  "> <!--  square row-->
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>'. $data[$i]['Firstname'] . ' ' . $data[$i]['Lastname'] . '</h3>
                        <h4 class="white"><i class="fa fa-check-circle-o"></i> San Antonio, TX</h4>
                        <h4 class="white"><i class=""></i>Age ' . $data[$i]['Age'] .'</h4>
                        <button data-dismiss="modal" data-toggle="modal" data-target="#profile" type="button" class="btn  btn-info" href="#">
                 <span><i class="glyphicon glyphicon-user"></i></span></button>
                  <button data-dismiss="modal" data-toggle="modal" data-target="#profile" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-comment"></i></span></button>
                          <button data-dismiss="modal" data-toggle="modal" data-target="#chat-modal" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-thumbs-up"></i></span></button>
                            <button data-dismiss="modal" data-toggle="modal" data-target="#block-modal" type="button" class="btn  btn-info" href="#">
                        <span><i class="glyphicon glyphicon-ban-circle"></i></span></button>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="' . $data[$i]['image'] .'" class="img-responsive thumbnail">
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

function extract_users()
{
        //session_start();
        /*$user = $_SESSION['logged_on_user']; */
        $pdo = connect();
        $pdo->query("USE matcha_db");
        //echo $user;
        $stmt = $pdo->prepare("SELECT `username`,Firstname, Lastname, Age, Gender, Bio FROM `users`");
        $stmt->execute(); 
        while ( $row = $stmt->fetchAll(PDO::FETCH_ASSOC))
        {
            $data[] = $row;
        } 
        $pdo = null;
        return ($data);
}
    ?>