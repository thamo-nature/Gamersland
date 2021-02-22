<?php

class Old{

  public $id;
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
   public $result_body;
   public $my_body;

  public function __construct(){

    $this->postdata();
    $this->resultdata();
         
    }




public function postdata(){

 global $database;

$this->postbody = "";

$query_it = $database->connection->query('SELECT id,match_id,prize_pool,per_kill,entry,map,date,time,type,filled FROM matches ORDER BY id desc'); 

//$row = mysqli_fetch_assoc($query_it);

while($row = mysqli_fetch_assoc($query_it))    {
  $this->id = $row['id'];
 $this->match_id = $row['match_id'];
    $this->prize_pool = $row['prize_pool'];
    $this->per_kill = $row['per_kill'];
    $this->entry = $row['entry'];
    $this->map = $row['map'];
   $this->date = $row['date'];
   $this->time = $row['time'];
   $this->type = $row['type'];
   $this->filled = $row['filled'];

  $this->postbody .= "

      
  <ul style='border: thick double #32a1ce;' class='list-group flex-sm-row'>

<li class='list-group-item'>
  Contest Count :<span style='color:red;'> $this->id </span>
</li>

 <li class='list-group-item'>
      Prize pool :<span style='color:red;'> Rs.$this->prize_pool</span>
  </li>

  <li class='list-group-item'>
  Per Kill  :<span style='color:red;'> Rs.$this->per_kill</span>
  </li>
  <li class='list-group-item'>
      Entry :<span style='color:red;'> Rs.$this->entry</span>
  </li>
  <li class='list-group-item'>
      Map: <span style='color:red;'>$this->map</span>
  </li>

  <li class='list-group-item'>
      Date: <span style='color:red;'>$this->date</span>
  </li>
  <li class='list-group-item'>
  Time: <span style='color:red;'>$this->time</span>
</li>
  <li class='list-group-item'>
      Type :<span style='color:red;'>$this->type</span>
  </li>
  <li class='list-group-item'>
      Filled :<span style='color:red;'>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;90/100</span>
  </li>
  <center><a style=margin-top:6px;' href='contest_result.php?id={$row['match_id']}'  class='btn btn-primary'>View Results</a></center>
</ul></br>";

   }



}


public function resultdata(){
  global $database;

$this->result_body = "";

$id = $_GET['id'];
if(!empty($id)){
$query_it = $database->connection->query("SELECT * FROM tournaments where match_id = '$id' ORDER BY kills desc LIMIT 100"); 


while($row = mysqli_fetch_assoc($query_it))    {
  $id = "{$row['id']}";
   $match_id = "{$row['match_id']}";
   $player_id = "{$row['player_id']}";
   $kills = "{$row['kills']}";


$this->result_body .= "<ul style='border: thick double #32a1ce;' class='list-group flex-sm-row'>
      <li class='list-group-item'>
      Player Name  :<span style='color:red;'> $player_id</span>
      </li>
      <li class='list-group-item'>
          Kills :<span style='color:red;'> $kills</span>

      </li>
</ul>";


         }


}
         $this->my_body = "";
     
         $query_it = $database->connection->query("SELECT * FROM tournaments where player_id='$database->logged_user'"); 
         
         
         while($row = mysqli_fetch_assoc($query_it))    {
         
            $match_id = $row['match_id'];
            $player_id = $row['player_id'];
            $kills = $row['kills'];
            $money = $row['money'];
            $room = $row['room_key'];
            $key = $row['room_pass'];
         
         $this->my_body .= "<center>
         <ul style='border: thick double #32a1ce;' class='list-group flex-sm-row'>
               <li class='list-group-item'>
               Player Name  :<span style='color:red;'> $player_id</span>
               </li>
               <li class='list-group-item'>
                   Kills :<span style='color:red;'> $kills</span>
         
               </li>
               <li class='list-group-item'>
               Money Won :<span style='color:red;'> $money</span>
     
           </li>
           <li class='list-group-item'>
           Room Key :<span style='color:red;'> $room</span>
 
       </li>
       <li class='list-group-item'>
       Room Pass :<span style='color:red;'> $key</span>

   </li>
         </ul></center>";
         
         
                  }         
     }


}

$old_detail = new Old();

?>