<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
/* ---- set user id -----*/
if(isset($_GET['agent_id'])){
$agentID = $_GET['agent_id'];
}
$userID = $_SESSION['id'];
/*if(isset($_SESSION['id']) && !empty($_SESSION['id'])){*/

 /*--------- bank feed back info show -------*/   
$resBF = mysqli_query($conn, "SELECT * FROM `bank_feed` WHERE user_id ='$userID' AND agent_id = '$agentID' ");
$showBF = mysqli_fetch_assoc($resBF);

  
/*--------- Update status  info show -------*/
$resStates = mysqli_query($conn, "SELECT * FROM `discussion` WHERE user_id = '$userID' AND agent_id = '$agentID'  ");
    $rowStatus = mysqli_fetch_assoc($resStates);
    $status = $rowStatus['status'];
if($status == 'Further-Documet'){
       echo '<script>window.location.replace("further-documents-need.php?agent_id='.$agentID.'");</script>';
}    

 ?>
<style>
    .hide{
        display: none;
    }
    .show{
        display: block;
    }
      .red-box p{
      font-size: 16px;
    border-radius: 100px;
    box-shadow: 0px 0px 2px 0px #d00;
    background-color: #d00;
    color: #fff;
   padding-top: 4px;
    padding-bottom: 7px;
    padding-left: 20px;
    padding-right: 20px;
    }
    .red-box label{
        color: #d00;
    }
    .green-box p{
   font-size: 16px;
    padding-top: 4px;
    padding-bottom: 7px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 100px;
    box-shadow: 0px 0px 2px 0px #0084FF;
        background-color: #0084FF;
        color: #fff;
    }
    .p-3{font-size: 15px;font-weight: 500; font-family: sans-serif;}
    .green-box label{
        color: #336359;
    }
    .file-box p{
              border: 1px solid;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 0px 2px 0px green;
        background-color: greenyellow;
        color: #fff;  
    }
    i{
        color: #fff;
    }
</style>
 <div class="col-md-12">
  <div class="row">
      <div class="col-md-8 offset-md-2">
      
       <div class="card">
         
        <div class="card-body">
            <h4 class="bg-dark text-center pt-1 pb-1 text-white"><i class="fa fa-star"></i>  Credit score Screen</h4>
          <div class="card">
              <div class="card-body">
           
           <div class="">
               <label style="font-weight: bold;">Bank Feedback:</label>
           <p class="border p-3"><?php echo nl2br($showBF['bank_feed']);?></p>
           </div>
   
                
                 
           <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `feedback_msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class=" your-com green-box ">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p>'.nl2br($row['fbm']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="red-box col-md-10 offset-md-1">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p>'.nl2br($row['fbm']).'</p></div>';
            }
              
           }
        }
            ?>
            
            

        </div>

    </div><br>
    
    
    <?php
    // FB COmmetcs
if(isset($_POST['fbm_com'])){
    $fedbak = mysqli_real_escape_string($conn, $_POST['fbm']);    
   if(mysqli_query($conn, "INSERT INTO `feedback_msg` (`id`, `fbm`, `user_id`, `agent_id`, `who`) VALUES (NULL, '$fedbak', '$userID', '$agentID', 'customer')")){
     echo "<meta http-equiv='refresh' content='0'>";
    }
}            
            
?>
  <form action="" method="post">
        <div class="form-group">
            <textarea name="fbm" required class="form-control" placeholder="Write Comments"></textarea>
        </div>
       <button class="btn btn-primary" type="submit" name ="fbm_com"><i class="fa fa-comment"></i> Commetns</button>
    </form>

    <!----- ####################################################################################################### comments upodate #######################----------->

    </div>
    </div>
      </div>
      
       
  </div>
</div>  
   
 
    <?php include 'inc/footer.php'; }else{header('Location:login.php');}?>