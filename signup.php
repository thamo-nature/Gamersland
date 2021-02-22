<?php
include_once("includes/config.php");
//Declaring variables to prevent errors
$pubg_name = ""; //First name
$number = ""; //Last name
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = array(); //Holds error messages

if(isset($_POST['register_button'])){

	//Registration form values

	//First name
	$pubg_name = strip_tags($_POST['pubg_name']); //Remove html tags
	$pubg_name = str_replace(' ', '', $pubg_name); //remove spaces
	$_SESSION['pub_id'] = $pubg_name; //Stores first name into session variable


	//Password
	$password = strip_tags($_POST['password']); //Remove html tags
	$password2 = strip_tags($_POST['password2']); //Remove html tags

	$number = strip_tags($_POST['number']); //Remove html tags
	$number = str_replace(' ', '', $number); //remove spaces
    $_SESSION['number'] = $number;

    if(preg_match('/^[0-9]{10}+$/', $number)) {
        if (strlen($number) < 10 || strlen($number) > 14){
        array_push($error_array, "Please Enter Valid Mobile Numbers<br>");
    }}


	$date = date("Y-m-d"); //Current date
	$_SESSION['date'] = $date;

	if(strlen($pubg_name) > 25 || strlen($pubg_name) < 2) {
		array_push($error_array, "Your pubg_username must be between 2 and 25 characters<br>");
	}


	if($password != $password2) {
		array_push($error_array,  "Your passwords do not match<br>");
	}

	// if(strlen($password > 40 || strlen($password) < 5)) {
	// 	array_push($error_array, "Your password must be betwen 5 and 30 characters<br>");
	// }

	if(empty($error_array)) {
		$password = md5($password); //Encrypt password before sending to database
		$_SESSION['password'] = $password;

		$check_username_query = $database->connection->query("SELECT mobile_number FROM gamer_users WHERE mobile_number='$number'");
		while(mysqli_num_rows($check_username_query) != 0) {

			$message = "mobile numer already exists.";
			echo "<script  type='text/javascript'>alert('$message');</script>";
			header('refresh: 0; url=register.php');
			exit();

		}
	//	$query = mysqli_query($con, "INSERT INTO gamer_users VALUES (NULL,'$pubg_name','$number','$password','$date','No')");
	$query = $database->connection->query("INSERT INTO gamer_users VALUES (NULL,'$pubg_name','$number','$password','$date',0,0,0,'Yes')");
     // header("location:sms/index.php");
		//array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");
		if($query){
			//Clear session variables
			$_SESSION['pubg_id'] = "$pubg_name";
			//$_SESSION['number'] = "";
		//	$_SESSION['date'] = "";
		//	$_SESSION['password'] = "";

		  $message = "Account Created Successfully ! Go Ahead Join Game .";
		  echo "<script  type='text/javascript'>alert('$message');</script>";
		  header('refresh: 0; url=index.php');

	} else{
	echo"Please enter correct OTP";
	}
//if(isset($_SESSION['pubg_id'])){
		//Clear session variables
		//$_SESSION['pubg_name'] = "";
		//$_SESSION['number'] = "";
//	}
}

}
?>
