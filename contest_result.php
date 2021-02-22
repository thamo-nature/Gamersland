<?php
require 'key.php';
include_once("includes/init.php");

if ($_POST) {
	$razorpay_payment_id = $_POST['razorpay_payment_id'];

	// echo "Razorpay success ID: ". $razorpay_payment_id;
}


$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>No-Warning Guild - Gaming is in my DNA</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
  <!-- <link href="css/grid.css" rel="stylesheet" /> -->
  <!-- <link href="css/signupgrid.css" rel="stylesheet" /> -->

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

  <br><br><br>
  <div class="card-body">
    <?php echo $old_detail->postbody; ?>
  </div>
</div>

<div class='modal fade' id="ul" id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5  class='modal-title' id='exampleModalLongTitle'>Match Results</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
    <?php

    echo $old_detail->result_body;

    ?>
    </div>




    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
// $(document).ready(function(){
//    $("#myModal").modal();
// });
</script>

<script>

var currentURL = <?php echo $result['id']; ?>

if (currentURL === ""){

  document.getElementById("ul").style.display = "none";

 } else {

  $('#ul').modal('show');

 }

</script>


</body>

</html>
