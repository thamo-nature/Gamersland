<?php

require 'db.php';

if(isset($_SESSION['admin'])){
  header("Location: manage.php");
}
if(isset($_POST['login_button'])) {
    global $con;

     $username = $_POST['username'];
	   $password = $_POST['password']; //Get password

	$check_database_query = mysqli_query($con, "SELECT * FROM gamer_admin WHERE username='$username' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query);

	if($check_login_query == 1) {
    $row = mysqli_fetch_array($check_database_query);
   // $gamer_admin = $row['username'];

		$_SESSION['admin'] = $row['username'];
		  header("Location: manage.php");
		exit();
	}
	else {
	//	array_push($error_array, "Email or password was incorrect<br>");

		$message = "Mobile Number and/or Password incorrect.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";

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
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}


</style>
</head>

<body>

        </br></br></br></br></br>
  <form method="post" action="index.php" style="max-width:500px;margin:auto">
  <center><h2>Login Form</h2></center>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="username">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="password" name="password">
  </div>

  <button type="submit" name="login_button" class="btn">Login</button>
</form>





  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
