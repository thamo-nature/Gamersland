<?php
require 'key.php';
include_once("includes/init.php");
  //6380053664

if ($_POST) {

	$razorpay_payment_id = $_POST['razorpay_payment_id'];

// 	echo "Razorpay success ID: ". $razorpay_payment_id;
}

//$database->logged_user;

$query_it = $database->connection->query('SELECT COUNT(player_id) AS `count` FROM tournaments WHERE match_id =2');
$row = mysqli_fetch_assoc($query_it);
 $row['count'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
<style>
body{
  background-color: #343A40;
}
.jumbotron {
  position:relative;
  overflow:hidden;
}

.jumbotron .container {
  position:relative;
  z-index:2;

  background:rgba(0,0,0,0.2);
  padding:2rem;
  border:1px solid rgba(0,0,0,0.1);
  border-radius:3px;
}

.jumbotron-background {
  object-fit:cover;
  font-family: 'object-fit: cover;';
  position:absolute;
  top:0;
  z-index:1;
  width:100%;
  height:100%;
  opacity:0.5;
}

img.blur {
  -webkit-filter: blur(4px);
  filter: blur(4px);
  filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');

}
</style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a style="color : red" class="navbar-brand" href="index.php"><span style="margin-left:20px;">No-Warning Guild </span></br> Gaming is in my DNA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span style="color:#00FC01">Menu</span>
        <i style="color:red" class="navbar-toggler-icon"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul  class="navbar-nav ml-auto">


              <?php
                if(empty($_SESSION['pubg_id'])){
                echo " <li class='nav-item'>
                  <a style='color : red' class='nav-link' href='login.php'>My-Contest</a>
                </li>";
                } else{
                  echo "
                  <li class='nav-item'>
                    <a style='color : red' class='nav-link' href='mycontest.php'>My-Contest</a>
                  </li>";
                }
                ?>

                <li class='nav-item'>
                  <a style='color : red' class='nav-link' href='contest_result.php'>Contest-Results</a>
                </li>


                <?php
                if(!empty($_SESSION['pubg_id'])){
                echo " <li class='nav-item'>
                  <a style='color : red' class='nav-link' href='redeem.php'>	<span style='font-size:15px;'>₹</span>-Redeem</a>
                </li>";
                }?>



                <?php
                if(empty($_SESSION['pubg_id'])){
                echo " <li class='nav-item'>
                  <a style='color : red' class='nav-link' href='login.php'>Login</a>
                </li>";
                } else{
                  echo "
                  <li class='nav-item'>
                    <a style='color : red' class='nav-link' href='logout.php'>Logout</a>
                  </li>";
                }
                ?>

              </ul>
            </div>
          </div>
        </nav>
</br>


<div class="jumbotron jumbotron-fluid bg-dark">

  <div class="jumbotron-background">
    <img src="img/pubg.png" class="blur ">
  </div>
  <!-- Page Content -->
  <div class="container text-white">

    <h1 class="display-4">Free Fire</h1>
    <p class="lead">Every kill is a skill, Play and earn Money..</p>
    <hr class="my-4">
    <p>Any quries or problem, write to us in whatsapp..</p>
    <center><a style="color:green;margin-top:150px;" href="https://chat.whatsapp.com/KhqaNWXrvw3HXgRl0etGiV" >Join Group<img src="img/wp.png"></a></center>

  </div>
  <!-- /.container -->
</div>


<!-- News jumbotron -->
<div id="about"  class="jumbotron text-center hoverable p-4">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-4 offset-md-1 mx-3 my-3">

      <!-- Featured image -->
      <div class="view overlay">
        <img src="img/psign.jpeg" class="img-fluid" alt="Sample image for first version of blog listing">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div  class="col-md-7 text-md-left ml-3 mt-3">


<form style="margin-left:10px;" action="index.php" method="POST">
<?php  echo $postdetail->postbody; ?>
</form>

<div>

<?php

$query_it = $database->connection->query("SELECT mobile_number FROM gamer_users where pubg_id = '$database->logged_user' limit 1");
$row = mysqli_fetch_assoc($query_it);
$number = $row['mobile_number'];

  $money = $postdetail->entry.'00';
  $pay= "<center>
 <form action='index.php' method='POST'>
                    <script
    src='https://checkout.razorpay.com/v1/checkout.js'
    data-key= $api_key_id
    data-amount=  $money
    data-currency='INR'
    data-buttontext='Join Now'
    data-name='No-Warning Guild'
    data-description='Pay and play the tournament'
    data-image='img/pubg.png'
    data-prefill.name='pubg user'
    data-prefill.email= 'nowarning@gmail.com'
    data-prefill.contact= $number
    data-theme.color='#F37254'
></script>

</form>
</center>";
?>

<?php



$query_it = $database->connection->query('SELECT match_id FROM matches ORDER BY id desc limit 1');
$row = mysqli_fetch_assoc($query_it);
$match_id = $row['match_id'];
 //echo "<center><h2>Last Match id :  $match_id </h2></center>";

$query_it = $database->connection->query("SELECT COUNT(player_id) AS `count` FROM tournaments WHERE match_id = '$match_id' ");
$row = mysqli_fetch_assoc($query_it);
$filled = $row['count'];

$query_it = $database->connection->query("SELECT room_key,room_pass,player_id,match_id from tournaments where player_id = '$database->logged_user' and match_id = '$match_id'");
$row = mysqli_fetch_assoc($query_it);
$joined = $row['player_id'];
$room_key = $row['room_key'];
$room_pass = $row['room_pass'];

if(isset($database->logged_user) && ($filled > 50)){

  echo  "<center><h3>Room Filled kindly join next match</h3></center>";

  }
elseif(isset($database->logged_user) && ($filled < 50) && !empty($joined) ){
  if(($room_key == 0) and ($room_pass == 0)){
    echo  "<center><h6>You Already Joined the Game,Kindly login 30 mins before the game to get your room_key and  pasword!</h6></center>";
  }else{
    echo "</br>";
             echo "<center> your room key is : <strong><h6>$room_key </h6></strong></center>";
             echo "<center> your room password is :<strong><h6>$room_pass</h6></strong></center>";
  }
    }
elseif(isset($database->logged_user) && ($filled < 50) && empty($joined)){

  echo  $pay;

}elseif(!isset($database->logged_user) and empty($match_id)){

  echo  "<center><h1>Sooner the game starts <h1></center>";
  echo  "<center><a class='btn btn-primary btn' href='login.php' role='button'>Register Now</a></center>";
}elseif(!isset($database->logged_user)){

  echo  "<center><a class='btn btn-primary btn' href='login.php' role='button'>Join Now</a></center>";
}
?>
<?php
// if(isset($database->logged_user)){

//   $query_it = mysqli_query($con,'SELECT match_id FROM matches ORDER BY id desc limit 1');
//   $row = mysqli_fetch_assoc($query_it);
//   $match_id = $row['match_id'];

// $query_it = $database->connection->query("SELECT room_key,room_pass from tournaments where player_id = '$database->logged_user' and match_id = '$match_id' ");
// while($row = mysqli_fetch_assoc($query_it)){
//             $room_key = $row['room_key'];
//             $room_pass = $row['room_pass'];
//            if(($room_key == 0) and ($room_pass == 0)){
//             echo "<center> You Joined the Game,Kindly login 30 mins before the game to get your room_key and  pasword!</center>";
//            }elseif($room_key != 0 and $room_pass != 0){
//             echo "</br>";
//              echo "<center> your room key is : $room_key </center>";
//              echo "<center> your room password is : $room_pass </center>";
//              echo "<script>";
//            }
// }
// }
 ?>
</div>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- News jumbotron -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

$(function () { objectFitImages() });

</script>
</body>

</html>
