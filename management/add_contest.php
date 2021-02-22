<?php
require 'db.php';


if(empty($_SESSION['admin'])){
  header("Location: ../index.php");
}


   $query_it = mysqli_query($con,'SELECT match_id FROM matches ORDER BY id desc');
   $row = mysqli_fetch_assoc($query_it);
   $match_id = $row['match_id'];

   if(isset($_POST['post_button'])) {

  $new_match_id = $_POST['match_id'];
  $price_pool = $_POST['price_pool'];
  $per_kill = $_POST['per_kill'];
  $entry = $_POST['entry'];
  $map = $_POST['map'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $type = $_POST['type'];
  $total_joined_this_match = 0; //initial value

    $post_insert = mysqli_query($con,"insert into matches values(NULL,'$new_match_id','$price_pool','$per_kill','$entry','$map','$date','$time','$type','$total_joined_this_match',0,0)");
    if($post_insert){
      echo "updated";
    }
    elseif(!$post_insert){
        echo "post not updated";
    }

   }


   if(isset($_POST['room_button'])) {

      $room_key = $_POST['room_key'];
      $room_pass = $_POST['room_pass'];

      $post_insert = mysqli_query($con,"update matches set room_key = '$room_key', room_pass = '$room_pass' where match_id = '$match_id' ");
      if(!$post_insert){
          echo "room not updated";
      }

     }

     if(isset($_POST['room_button'])) {

       $room_key = $_POST['room_key'];
       $room_pass = $_POST['room_pass'];

        $post_insert = mysqli_query($con,"update tournaments set room_key = '$room_key', room_pass = '$room_pass' where match_id = '$match_id' ");
        if(!$post_insert){
            echo "room not updated";
        }

       }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>No-Warning Guild - Gaming is in my DNA</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.min.css" rel="stylesheet">

<style>
 .navbar {
    background:transparent;
}

</style>
</head>

<body>

  <!-- Navigation -->
  <nav style="margin-top:-10px;" class="navbar navbar-expand-lg navbar-dark bg-transparent fixed-top" id="mainNav">
    <div class="container">
      <a style="color : red" class="navbar-brand" href="../index.php"><span style="margin-left:20px;">No-Warning Guild </span></br> Gaming is in my DNA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span style="color:#00FC01">Menu</span>
        <i style="color:red" class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul  class="navbar-nav ml-auto">

          <li class='nav-item'>
            <a style='color : red' class='nav-link' href='../contest_result.php'>contest-results</a>
          </li>
          <li class='nav-item'>
            <a style='color : red' class='nav-link' href='manage.php'>Manage</a>
          </li>
          <li class='nav-item'>
            <a style='color : red' class='nav-link' href='add_contest.php'>New-contest</a>
          </li>

          <?php
          if(empty($_SESSION['admin'])){
          echo " <li class='nav-item'>
            <a style='color : red' class='nav-link' href='account.php'>Login/Register</a>
          </li>";
          } else{
            echo "
            <li class='nav-item'>
              <a style='color : red' class='nav-link' href='../logout.php'>Logout</a>
            </li>";
          }
          ?>


        </ul>
      </div>
    </div>
  </nav>


        </br></br></br></br>

  <div class="container">
  <h4>Add New Contest</h4>
                       <center><h2>Last Match id : <?php   echo   $match_id; ?></h2></center>
  <form class="form-horizontal" method="POST" action="add_contest.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Match id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Match id" name="match_id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Prize Pool:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="prize" name="price_pool">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Per Kill:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="per kill" name="per_kill">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Entry Fees:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="Entry Fees" name="entry">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">MaP:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="Map" name="map">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Date :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="Date" name="date">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Time :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="Time" name="time">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Match Type :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="Type" name="type">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button style="background-color:chartreuse" type="submit" name="post_button" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>


<div class="container">
<center> <h4>Update roomkey and password to users</h4></center>
                       <center><h2>Last Match id : <?php   echo   $match_id; ?></h2></center>
  <form class="form-horizontal" method="POST" action="add_contest.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Room Key:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Room key" name="room_key">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Room Password:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pwd" placeholder="password" name="room_pass">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button style="background-color:chartreuse" type="submit" name="room_button" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>



  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
