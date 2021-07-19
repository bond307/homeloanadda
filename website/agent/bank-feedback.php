<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
/* ---- set user id -----*/
if(isset($_GET['User_Id'])){
    $userID = $_GET['User_Id'];
}
$agentID = $_SESSION['id'];
/*if(isset($_SESSION['id']) && !empty($_SESSION['id'])){*/

/*--------- Meeting info show -------*/
$resDocShow = mysqli_query($conn, "SELECT * FROM `document` WHERE agent_id = '".$_SESSION['id']."'  AND user_id = '$userID'  ");
$showDocinfo = mysqli_fetch_assoc($resDocShow);

 /*--------- bank feed back info show -------*/   
$resBF = mysqli_query($conn, "SELECT * FROM `bank_feed` WHERE agent_id = '".$_SESSION['id']."'  AND user_id = '$userID'  ");
    $showBF = mysqli_fetch_assoc($resBF);
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
              <?php
    if(isset($_GET['bank_feed_complete'])){
           echo '<div class="">
               <label style="font-weight: bold;">Bank Feedback</label>
           <p class="border p-3">'.nl2br($showBF['bank_feed']).'</p>
           </div>';
    }else{
        echo 'Please give me bank feedback';
    }?> 
                
                 
           <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `feedback_msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class="col-md-10 offset-md-1 your-com red-box ">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p>'.nl2br($row['fbm']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="green-box">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p>'.nl2br($row['fbm']).'</p></div>';
            }
              
           }
        }
            ?>
            
            

        </div>

    </div><br>
    
    
    <?php
    
     if(isset($_POST['com'])){
        
                   if(mysqli_query($conn, "INSERT INTO msg (msg, user_id, agent_id, who)
                   VALUES('".$_POST['reply_com']."', '$userID', '$agentID', 'Agent' )")){
          echo '<meta http-equiv="refresh" content="0">';

        }
    }

    
    
    // b_f
    if(isset($_POST['bf'])){
    $bf = mysqli_real_escape_string($conn, $_POST['b_f']);
       if(mysqli_query($conn, "INSERT INTO `bank_feed` (`id`, `bank_feed`, `user_id`, `agent_id`) VALUES (NULL, '$bf', '$userID', '$agentID')")){
           
          $upStats = mysqli_query($conn, "UPDATE discussion SET status = 'Bank-Feedback' WHERE user_id = '$userID' AND agent_id = '$agentID' ");
           if($upStats){
               echo '<script>window.location.replace("bank-feedback.php?User_Id='.$userID.'&bank_feed_complete ");</script>';
         }
        }
    }?>
     <!-------------- FB Comments -------------->
      <?php 
if(isset($_POST['fbm_com'])){
   $fedbak = mysqli_real_escape_string($conn, $_POST['fbm']);     
   if(mysqli_query($conn, "INSERT INTO `feedback_msg` (`id`, `fbm`, `user_id`, `agent_id`, `who`) VALUES (NULL, '$fedbak', '$userID', '$agentID', 'Agent')")){
echo '<meta http-equiv="refresh" content="0">';

    }else{
       echo 'Data is not insert';
   }
}            
// set status
if(isset($_POST['further_doc_up'])){
    if(mysqli_query($conn, "UPDATE discussion SET status = 'Further-Documet' WHERE user_id = '$userID' AND agent_id = '$agentID' ")){
        echo '<script>window.location.replace("further-document.php?User_Id='.$userID.' ");</script>';
    }
}
?>
    
<?php if(isset($_GET['bank_feed_complete'])){?>

  <form action="" method="post">
        <div class="form-group">
            <textarea name="fbm" class="form-control" placeholder="Write Comments"></textarea>
        </div>
        <div class="row">
            <div class="col-md-4">
               <button class="btn btn-primary" type="submit" name ="fbm_com"><i class="fa fa-comment"></i> Commetns</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-warning" type="submit" name ="further_doc_up"> Further documents</button>
            </div>
            <div class="col-md-4">
               <a href="bank-visit.php?User_Id=<?php echo userID;?>" class="btn btn-success" type="submit" name ="fbm_com">Bank Visit for Identity</a>
            </div>
        </div>
    </form>
<?php }else{
    echo '<form action="" method="post">
        <div class="form-group">
            <textarea name="b_f" required class="form-control" placeholder="Wright here bank feed back"></textarea>
        </div>
       <button class="btn btn-primary col-md-6" type="submit" name ="bf"><i class="fa fa-comment"></i> Feedback</button>
    </form>';
}?>
    <!----- ####################################################################################################### comments upodate #######################----------->

    </div>
    </div>
      </div>
      
       
  </div>
</div>  
   
  <script>
      function check(){
          confirm('Are you sure to move to credit score screen?');
      }
</script>
    <?php include 'inc/footer.php'; }else{header('Location:login.php');}?>