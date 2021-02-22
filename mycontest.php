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

  <title>No-Warning Guild - Gaming is in my DNA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
<style>
 .navbar {
    background:transparent;
}

      .button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        color: #ffffff;
        background-color: #7aa8b7;
        border-radius: 6px;
        outline: none;
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

  </br></br></br>
  <?php echo $old_detail->my_body; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
