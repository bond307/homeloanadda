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
$resBF = mysqli_query($conn, "SELECT * FROM `loan_disbursal` WHERE agent_id = '".$_SESSION['id']."'  AND user_id = '$userID'  ");
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
      <div class="col-md-8">
      
       <div class="card">
           <h4 class="bg-warning text-center pt-2 pb-2 text-white">Loan Disbursal Steps</h4>
        <div class="card-body">
          
          <div class="card">
              <div class="card-body">
              <?php
    if(isset($_GET['loan-disbural'])){
           echo '<div class="">
               <label style="font-weight: bold;">Loan Disbural</label>
           <p class="border p-3">'.nl2br($showBF['loan_disbursal']).'</p>
           </div>';
    }else{
        echo '<div class="alert alert-danger">Loan Disbursal Steps</div>  ';
    }?> 
                
               
           <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `loan_disbursal_msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class="col-md-10 offset-md-1 your-com red-box ">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p>'.nl2br($row['loan_disbursal_msg']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="green-box">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p>'.nl2br($row['loan_disbursal_msg']).'</p></div>';
            }
              
           }
        }
            ?>
            
            

        </div>

    </div><br>
    
    
    <?php
    // b_f
    if(isset($_POST['bf'])){
    $bf = mysqli_real_escape_string($conn, $_POST['b_f']);
       if(mysqli_query($conn, "INSERT INTO `loan_disbursal` (`id`, `loan_disbursal`, `user_id`, `agent_id`) VALUES (NULL, '$bf', '$userID', '$agentID')")){
           
           echo '<meta http-equiv="refresh" content="0;url=loan-disbrusal.php?User_Id='.$userID.'&loan-disbural" />';
         }
        
    }?>
     <!-------------- FB Comments -------------->
      <?php 
if(isset($_POST['ld'])){
   $fedbak = mysqli_real_escape_string($conn, $_POST['fbm']); 
    
   if(mysqli_query($conn, "INSERT INTO `loan_disbursal_msg` (`id`, `loan_disbursal_msg`, `user_id`, `agent_id`, `who`) VALUES (NULL, '$fedbak', '$userID', '$agentID', 'Agent')")){
echo '<meta http-equiv="refresh" content="0">';

    }else{
       echo 'Data is not insert';
   }
}            

?>
    
<?php if(isset($_GET['loan-disbural'])){?>

  <form action="" method="post">
        <div class="form-group">
            <textarea name="fbm" class="form-control" placeholder="Write Comments"></textarea>
        </div>
              <button class="btn btn-primary" type="submit" name ="ld"><i class="fa fa-comment"></i> Commetns</button>   
           
        
    </form>
<?php }else{
    echo '<form action="" method="post">
        <div class="form-group">
            <textarea name="b_f" required class="form-control" placeholder="Loan Disbursal..."></textarea>
        </div>
       <button class="btn btn-primary" type="submit" name ="bf"><i class="fa fa-comment"></i> Loan Disbursal </button>
    </form>';
}?>
    <!----- ####################################################################################################### comments upodate #######################----------->

    </div>
    </div>
      </div>
      
        <div class="col-md-4">
        <div class="card">
            <h4 class="bg-warning text-center pt-2 pb-2 text-white">Loan Disbursal Documents</h4>
            <div class="card-body">
          
                <!---------------- Doc file show -------->
          <?php 
            $sr = 0;
            $showDOC = mysqli_query($conn, "SELECT * FROM `loan_disbursal_file` WHERE user_id = '$userID' AND agent_id = '$agentID'");

            if(mysqli_num_rows($showDOC)>0){
                while($row = mysqli_fetch_array($showDOC)){ $sr++;?>
          <div class="col-md-10 offset-md-1 your-com file-box">
                  <label style="font-weight: bold;">Document File <span class="badge badge-warning"><?php echo $sr;?></span>:</label>
                <p class=""><a href="../docFile/<?php echo $row['loan_disbursal_file'];?>" download><?php echo $row['loan_disbursal_file'];?></a></p>
           </div>
               <?php }}?>
          
          
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