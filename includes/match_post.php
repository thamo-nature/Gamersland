<?php

class Post{

   public $match_id;
   public $prize_pool;
   public $per_kill;
   public $entry;
   public $map;
   public $date;
   public $time;
   public $type;
   public $filled;

   public $postbody;




  public function __construct(){

    $this->postdata();
         
    }
  

public function postdata(){

 global $database;

$this->postbody = "";

$query_it = $database->connection->query('SELECT match_id FROM matches ORDER BY id desc'); 
$row = mysqli_fetch_assoc($query_it);        
$match_id = $row['match_id'];
 //echo "<center><h2>Last Match id :  $match_id </h2></center>";

$query_it = $database->connection->query("SELECT COUNT(player_id) AS `count` FROM tournaments WHERE match_id = '$match_id' "); 
$row = mysqli_fetch_assoc($query_it);
$this->filled = $row['count'];

$query_it = $database->connection->query('SELECT match_id,prize_pool,per_kill,entry,map,date,time,type,filled FROM matches ORDER BY id desc limit 1'); 

//$row = mysqli_fetch_assoc($query_it);

while($row = mysqli_fetch_assoc($query_it))    {
  
   $this->match_id = $row['match_id'];
    $this->prize_pool = $row['prize_pool'];
    $this->per_kill = $row['per_kill'];
    $this->entry = $row['entry'];
    $this->map = $row['map'];
   $this->date = $row['date'];
   $this->time = $row['time'];
   $this->type = $row['type'];
  
  $this->postbody .= "
  <ul style='font-size:15px;margin-top:5px' class='list-group-item' >
      
  <ul class='list-group flex-sm-row'>
  <li class='list-group-item'>
      Prize pool :<span style='color:red;'> Rs.$this->prize_pool</span>
  </li>
  <li class='list-group-item'>
  Per Kill  :<span style='color:red;'> Rs.$this->per_kill</span>
  </li>
  <li class='list-group-item'>
      Entry :<span style='color:red;'> Rs. $this->entry</span>
  </li>
  <li class='list-group-item'>
      Map :<span style='color:red;'> $this->map</span>
  </li></ul>

  <ul class='list-group flex-sm-row'>
  <li class='list-group-item'>
      Date :<span style='color:red;'>$this->date</span>
  </li>
  <li class='list-group-item'>
      Time :<span style='color:red;'> $this->time</span>
  </li>
  <li class='list-group-item'>
      Type :<span style='color:red;'>  $this->type</span>
  </li>
  <li class='list-group-item'>
      Filled :<span style='color:red;'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this->filled/100</span>
  </li>
</ul>";


}


}

}

$postdetail = new Post();

?>