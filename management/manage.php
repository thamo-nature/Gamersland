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

  <div class="form">


<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>kills</strong></th>
<th><strong>Money</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Account Number</strong></th>
<th><strong>IFSC</strong></th>
<th><strong>G-pay</strong></th>
</tr>
</thead>
<tbody></br></br></br></br>
<form  method="get" action="manage.php">
<center>Search All record from match id<input type="text" name="match_id" placeholder="Enter match id" ></center>
<center>  <input type="submit" value="Submit"></center>
</form>
<?php

$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($query, $result);
$here = $result['match_id'];

  $query_it = mysqli_query($con,'SELECT match_id FROM matches ORDER BY id desc');
  $row = mysqli_fetch_assoc($query_it);
  $match_id = $row['match_id'];
   echo "<center><h2>Last Match id :  $match_id </h2></center>";


$count=1;
//$sel_query="Select match_id,player_id,kills,money from tournaments where match_id = '$here'  ORDER BY player_id desc;";
$sel_query = "SELECT t1.*,u2.*

FROM tournaments t1
     INNER JOIN gamer_users u2
     ON t1.player_id = u2.pubg_id

WHERE
    t1.match_id = '$here' ";

$result = mysqli_query($con,$sel_query);


while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["player_id"]; ?></td>
<td align="center"><?php echo $row["kills"]; ?></td>
<td align="center"><?php echo $row["money"]; ?></td>
<td align="center">
<a href="edit.php?id=<?php echo $row["player_id"] ."&match_id=" .$row["match_id"]; ?>"><span style="color: red;">Edit</span></a>
</td>
<td align="center"><?php echo $row["bank_account"]; ?></td>
<td align="center"><?php echo $row["ifsc"]; ?></td>
<td align="center"><?php echo $row["gpay"]; ?></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
