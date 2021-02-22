<?php

include_once("includes/init.php");
include_once("includes/config.php");
//Declaring variables to prevent errors

$price = $database->connection->query("select bank_account,ifsc,gpay from gamer_users where pubg_id ='$database->logged_user' ");
while($row=mysqli_fetch_assoc($price)){
$ba = $row['bank_account'];
$if = $row['ifsc'];
$gp = $row['gpay'];
}
if(!empty($ba) and !empty($if)){

//$message = "You Already Submitted Account Details ! You will be paid after the Game..";
//echo "<script  type='text/javascript'>alert('$message');</script>";
//header('refresh: 0; url= index.php');

}

$bank_account = "";
$ifsc = "";
$gpay = "";


if(isset($_POST['bank_button'])){


	$bank_account = strip_tags($_POST['bank_account']); //Remove html tags
	$bank_account = str_replace(' ', '', $bank_account); //remove spaces

	$ifsc = strip_tags($_POST['ifsc']); //Remove html tags
	$ifsc = str_replace(' ', '', $ifsc); //remove spaces

  $query = mysqli_query($con, "update gamer_users set bank_account = '$bank_account', ifsc = '$ifsc' where pubg_id = '$database->logged_user' ");
if($query){
  header("location:index.php");
}

}

if(isset($_POST['gpay_button'])){

	$gpay = strip_tags($_POST['gpay']); //Remove html tags
	$gpay = str_replace(' ', '', $gpay); //remove spaces

  $query = mysqli_query($con, "update gamer_users set gpay = '$gpay' where pubg_id = '$database->logged_user' ");
  if($query){
    header("location:index.php");
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
  <!-- <link href="css/grid.css" rel="stylesheet" /> -->
  <!-- <link href="css/signupgrid.css" rel="stylesheet" /> -->
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
    /* set entire body that is webpage */
body{
	background: #383a3d;
	padding-top: 25vh;
}
/* set form background colour*/
form{
	background: #fff;
}
/* set padding and size of th form */
.form-container{
	border-radius: 10px;
	padding: 30px;
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


  <center>
    <table border=0 cellspacing=0 cellpadding=0>
      <tr valign="top">
        <td width="600">
        <p  style="color:green" class="card-text">We Send your winning amount via Bank or G-pay.,You will Receive the money within 1 hour after the game Played </p>
     <h5  style="color:white" class="card-title"><span  style="color:green">1 .</span> Your Bank Account Number and IFSC Code</h5>
    <h5 style="color:white" class="card-title"><span  style="color:green">2 .</span>Or G-pay ID </h5>
    <p  style="color:green" class="card-text">If you have any doubt Write to us in WhatsApp.<a style="color:red" href="https://chat.whatsapp.com/KhqaNWXrvw3HXgRl0etGiV">Here </a></p></br>
        </td>
      </tr>
    </table>

</center>


  <section class="container-fluid">
    <!-- row and justify-content-center class is used to place the form in center -->
    <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4">
        <form action="redeem.php" method="post" class="form-container">
        <div class="form-group">
          <!-- <h4 class="text-center font-weight-bold">Bank Details</h4> -->
          <!-- <label for="InputEmail1">Email Address</label> -->
           <input type="text" pattern="\d*" name="bank_account" class="form-control" id="InputEmail1" aria-describeby="emailHelp" placeholder="Account Number">
        </div>
        <div class="form-group">
          <!-- <label for="InputPassword1">Password</label> -->
          <input type="text" name="ifsc" class="form-control" id="InputPassword1" placeholder="IFSC CODE">
        </div>
        <button type="submit" name="bank_button" class="btn btn-primary btn-block">Submit</button>
        </br>
        <div class="form-group">
        <h4 style='color: gery;' class="text-center font-weight-bold">OR</h4>
        </div>

        <div class="form-group">
          <!-- <label for="InputPassword1">Password</label> -->

    <!-- <label for="exampleFormControlSelect1">Payment method</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>G-pay</option>
      <option>Phone pay</option>
      <option>paytm</option>
      <option>Amazon pay</option>
      <option>5</option>
    </select> -->


          <input type="text" class="form-control" name="gpay" id="InputPassword1" placeholder="G-Pay ID">
        </div>
        <button type="submit" name="gpay_button" class="btn btn-primary btn-block">Submit</button>


        <div class="form-footer">

        </div>
        </form>
      </section>
    </section>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
