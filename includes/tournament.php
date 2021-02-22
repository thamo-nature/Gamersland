<?php
require_once 'config.php';

class Submitpost{


   public $match_id;


     public function __construct(){
          
           $this->submit_post();
       
     }




//verify payment process and then make joined to yes.

      public function submit_post(){ 
             
        global $database;
        global $postdetail;

//get match id from matches tables
        $query_it = $database->connection->query('SELECT match_id FROM matches ORDER BY id desc'); 
        $row = mysqli_fetch_assoc($query_it);        
       $this->match_id = $row['match_id'];
                            
$kills = 0;

$price = $database->connection->query("select mobile_number from users where pubg_id='$database->logged_user' ");
$result = mysqli_fetch_array($price);
$number = $result['mobile_number'];

         $razorpay_payment_id = $_POST['razorpay_payment_id'];
         // echo "Razorpay success ID: ". $razorpay_payment_id;
                     $joined = "yes";
         if(empty($razorpay_payment_id )){
         }else{
    $post_insert = $database->connection->query("insert into tournaments values(NULL,'$this->match_id','$database->logged_user','$number','$kills','0','$joined',0,0)");
    $post_to_db =  $database->connection->query($post_insert); 

    echo "<script>alert('Registration Successful,Will see you in Game !.')</script>";
    header('refresh: 0; url= index.php');

         }
        
       }
      

  }
    
   
$submit_it = new Submitpost();
?>