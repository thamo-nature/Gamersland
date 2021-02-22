<?php
include_once("includes/init.php");
require 'signup.php';
//require 'sms/password_reset.php';
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



        <div id="logreg-forms">
          <form method="post" action="register.php"  class="form-signin">
          <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign Up</h1>
              <input type="text" id="user-name" name="pubg_name" class="form-control" placeholder="FreeFire username" value="<?php
              if(isset($_SESSION['pub_id']))
              { echo $_SESSION['pub_id'];
               }?>" required="" autofocus="">
     <?php if(in_array("Your pubg_username must be between 2 and 25 characters<br>", $error_array)) echo 'Your pubg_username must be between 2 and 25 characters<br>'; ?></span>
              <input type="text" id="number" name="number" class="form-control" maxlength='10'  pattern="\d*" placeholder="Mobile Number" value="<?php
              if(isset($_SESSION['number']))
              { echo $_SESSION['number'];
               }?>" required >
    <?php if(in_array("Please Enter Valid Mobile Numbers<br>", $error_array)) echo "Please Enter Valid Mobile Numbers<br>"; ?></span>
              <input type="password" id="user-pass" name="password" class="form-control" placeholder="Password" required >
              <input type="password" id="user-repeatpass" name="password2" class="form-control" placeholder="Repeat Password" required >  <?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";
else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) echo "Your password must be betwen 5 and 30 characters<br>"; ?></span>
              <button class="btn btn-primary btn-block"name="register_button" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button></br>
              <center>or</center>
              <center>
              <a href="login.php" id="cancel_signup"><i class="fas fa-angle-left"></i> Login here</a></center>
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
