<?php

include_once("includes/config.php");

if(isset($_POST['login_button'])) {
global $database;

    $mobile_number = $_POST['log_mobile_number'];
	$_SESSION['mobile_number'] = $mobile_number; //Store email into session variable
	$password = md5($_POST['log_password']); //Get password
	$password;
	$check_database_query = mysqli_query($con, "SELECT * FROM gamer_users WHERE mobile_number='$mobile_number' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$pubg_id = $row['pubg_id'];

		$_SESSION['pubg_id'] = $pubg_id;
		//$_SESSION['pubg_id'] = $row['pubg_id'];
		  header("Location: index.php");
		exit();
	}
	else {
	//	array_push($error_array, "Email or password was incorrect<br>");

		$message = "Mobile Number and/or Password incorrect.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header('refresh: 0; url=login.php');

	}

	if(isset($_SESSION['pubg_id'])){
		//Clear session variables

		$_SESSION['mobile_number'] = "";

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

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">
<style>
body{
  background-color: #343A40;
}

/* sign in FORM */
#logreg-forms{
    width:412px;
    margin:10vh auto;
    background-color:#f3f3f3;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}
#logreg-forms form {
    width: 100%;
    max-width: 410px;
    padding: 15px;
    margin: auto;
}
#logreg-forms .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
}
#logreg-forms .form-control:focus { z-index: 2; }
#logreg-forms .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
#logreg-forms .form-signin input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

#logreg-forms .social-login{
    width:390px;
    margin:0 auto;
    margin-bottom: 14px;
}
#logreg-forms .social-btn{
    font-weight: 100;
    color:white;
    width:190px;
    font-size: 0.9rem;
}

#logreg-forms a{
    display: block;
    padding-top:10px;
    color:lightseagreen;
}

#logreg-form .lines{
    width:200px;
    border:1px solid red;
}


#logreg-forms button[type="submit"]{ margin-top:10px; }

#logreg-forms .facebook-btn{  background-color:#3C589C; }

#logreg-forms .google-btn{ background-color: #DF4B3B; }

#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

#logreg-forms .form-signup .social-btn{ width:210px; }

#logreg-forms .form-signup input { margin-bottom: 2px;}

.form-signup .social-login{
    width:210px !important;
    margin: 0 auto;
}

/* Mobile */

@media screen and (max-width:500px){
    #logreg-forms{
        width:300px;
    }

    #logreg-forms  .social-login{
        width:200px;
        margin:0 auto;
        margin-bottom: 10px;
    }
    #logreg-forms  .social-btn{
        font-size: 1.3rem;
        font-weight: 100;
        color:white;
        width:200px;
        height: 56px;

    }
    #logreg-forms .social-btn:nth-child(1){
        margin-bottom: 5px;
    }
    #logreg-forms .social-btn span{
        display: none;
    }
    #logreg-forms  .facebook-btn:after{
        content:'Facebook';
    }

    #logreg-forms  .google-btn:after{
        content:'Google+';
    }

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
                  <a style='color : red' class='nav-link' href='account.php'>My-Contest</a>
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
                  <a style='color : red' class='nav-link' href='register.php'>Register</a>
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



        <div id="logreg-forms">
        <form method="post" action="login.php" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Login In</h1>
            <input type="text" maxlength='10'  pattern="\d*" name="log_mobile_number" id="inputEmail" class="form-control" placeholder="Mobile Number" required="" value="<?php echo $number ?>" autofocus="">
            <input type="password" id="inputPassword" name="log_password" class="form-control" placeholder="Password" required="">

            <button class="btn btn-success btn-block" name="login_button" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <!-- <a href="#" id="forgot_pswd">Forgot password?</a> -->
            <div style="margin-left:50%" class='or-seperator'><b>or</b></div>

            <center>
            <a type="button" class="btn btn-primary btn-block" href="register.php" id="btn-signup"><i class="fas fa-angle-left"></i>Register here</a></center></br>
            <!-- <p>Don't have an account!</p>  -->
            <!-- <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button> -->
            If you forgot your password,kindly text us in WhatsApp, we provide you new password.
            </form>
          </div>

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
