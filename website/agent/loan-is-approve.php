<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
/* ---- set user id -----*/
if(isset($_GET['User_Id'])){
    $userID = $_GET['User_Id'];
}
$agentID = $_SESSION['id'];
/*--------- Further info show -------*/
$reslbf = mysqli_query($conn, "SELECT * FROM `loan_approv_doc` WHERE aget_id = '$agentID' AND user_id = '$userID'  ");
$showlbf = mysqli_fetch_assoc($reslbf);

 ?>
<style>
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
</style>
 <div class="col-md-12">
  <div class="row">
      <div class="col-md-7">
      
       <div class="card">
         
        <div class="card-body">
            <h4 class="bg-warning text-center pt-2 pb-2 text-white">Loan Approve Bank Feedback</h4>
          <div class="card">
              <div class="card-body">
              <?php if($showlbf['loan_approv_doc'] != false){?>
           <div class="">
               <label style="font-weight: bold;">Loan Approve Bank Feedback:</label>
           <p class="border p-3"><?php echo nl2br($showlbf['loan_approv_doc']);?></p>
           </div>
    <?php }else{echo '<div class="alert alert-danger">Please upload these further documents as asked by Bank</div>';} ?>
                
           <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `loan_ap_msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class="col-md-10 offset-md-1 your-com green-box ">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p>'.nl2br($row['loan_ap_msg']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="red-box">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p>'.nl2br($row['loan_ap_msg']).'</p></div>';
            }
              
           }
        }
            ?>
            
            

        </div>

    </div><br>
    
    <!----- ####################################################################################################### comments upodate #######################----------->
<?php
    // 1st com 
    if(isset($_POST['fdcom'])){
         $fdm = mysqli_real_escape_string($conn, $_POST['reply_com']);
        if(mysqli_query($conn, "INSERT INTO loan_ap_msg (loan_ap_msg, user_id, agent_id, who)
        VALUES('$fdm', '$userID', '$agentID', 'Agent' )")){
          echo '<meta http-equiv="refresh" content="0">';
        }
    }
    
    /*----- upload further documents -----*/
    if(isset($_POST['labf'])){
        $fbdoc = mysqli_real_escape_string($conn, $_POST['lbf'] );
        
        if(mysqli_query($conn, "INSERT INTO `loan_approv_doc` (`id`, `loan_approv_doc`, `user_id`, `aget_id`) VALUES (NULL, '$fbdoc', '$userID', '$agentID')")){
            
        echo '<meta http-equiv="refresh" content="0;url=loan-is-approve.php?User_Id='.$userID.'&loan-approve-bank-feedback" />';

        }else{
            echo 'Ok';
        }
    }
     /*----- upload STATUS documents -----*/
if(isset($_POST['loan_dis'])){
    if(mysqli_query($conn, "UPDATE discussion SET status = 'Loan-Disbursal' WHERE user_id = '$userID' AND agent_id = '$agentID' ")){
     echo '<script>window.location.replace("loan-disbrusal.php?User_Id='.$userID.'");</script>';
    }
}
    /*----- check further documents is set -----*/

    if(isset($_GET['loan-approve-bank-feedback'])){
        echo '
<form action="" method="post">
        <div class="form-group">
            <textarea name="reply_com" class="form-control" placeholder="Reply Customer Comments"></textarea>
            
        </div>
        <!---- 1st comments---->
      <div class="row">
          <div class="col-md-6">
               <button class="btn btn-primary col-md-6" type="submit" name ="fdcom"><i class="fa fa-comment"></i> Commetns</button>
          </div>
           <div class="col-md-6">
               <button onclick="check()" class="btn btn-success col-md-10 float-right" type="submit" name="loan_dis"><i class="fa fa-star"></i> Loan Disbursal</button>
          </div>
      </div>
    </form>
  ';
    }else{
      echo '
       <form action="" method="post">
      <div class="form-group">
            <textarea name="lbf" required class="form-control" placeholder="Locan Approve Bank Feedback"></textarea>
        </div>
        <button  class="btn btn-primary" type="submit" name="labf">Locan Approve Bank Feedback</button>
      </form>
      ';
    }
 ?>  
   
    </div>
    </div>
      </div>
      
      
   <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                      <h4 class="bg-dark text-center pt-2 pb-2 text-white">Loan Approval Documents</h4>
                       <!---------------- Doc file show -------->
           <?php 
            $sr = 0;
            $showDOC = mysqli_query($conn, "SELECT * FROM `loan_ap_doc_file` WHERE user_id = '$userID' AND agent_id = '$agentID'");

            if(mysqli_num_rows($showDOC)>0){
                while($row = mysqli_fetch_array($showDOC)){ $sr++;?>
          <div class="col-md-10 offset-md-1 your-com file-box">
                  <label style="font-weight: bold;">Document File <span class="badge badge-warning"><?php echo $sr;?></span>:</label>
                <p class=""><a href="../docFile/<?php echo $row['loan_ap_doc_file'];?>" download><?php echo $row['loan_ap_doc_file'];?></a></p>
           </div>
               <?php }}?>
          
          
          
            </div>
        </div>
</div>  
  </div>
</div>  
   
  <script>
      function check(){
          alert('Are you sure to move to Identity check By Bank screen?');
      }
</script>
    <?php include 'inc/footer.php'; }else{header('Location:login.php');}?>