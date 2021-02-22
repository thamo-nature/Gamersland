<?php
require 'db.php';

if(empty($_SESSION['admin'])){  
  header("Location: ../index.php");
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
            <a style='color : red' class='nav-link' href='add_contest.php'>New-contest</a>
          </li>

          <li class='nav-item'>
            <a style='color : red' class='nav-link' href='manage.php'>Manage</a>
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
        </br></br></br></br></br></br>
<div class="form">
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$kills =$_REQUEST['kills'];
$money =$_REQUEST['money'];

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $result);
$here = $result['id'];
$there = $result['match_id'];

$update="update tournaments set kills='$kills',money='$money' where match_id = '$there' and player_id = '$here'   ";
mysqli_query($con, $update) ;
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
header("location:manage.php");
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<center><p><input type="text" name="kills" placeholder="Enter kills" 
value="<?php echo $row['kills'];?>" /></p>
<p><input type="text" name="money" placeholder="Enter money for kills" 
 value="<?php echo $row['money'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p></center>
</form>
<?php } ?>
</div>
</div>
</body>
</html>