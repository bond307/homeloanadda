<?php 
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
$agentId = $_SESSION['id'];
?>
  
  
   <style>
    .fa-whatsapp, .fa-sticky-note{
    color: green;
    font-weight: bold;
        font-size: 20px;
}

</style> 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> Welcome <span class="text-danger font-weight-bold"><?php echo $_SESSION['username'];?></span></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
         <div class="row">
         
        
         <style>
             .agent_profile{
                 width: 100px;
                 margin: 25px auto;
                 border-radius: 100%;
             }
             .col-md-4{
                 margin-bottom: 20px;
             }
             .font-20{
                 font-size: 17px;
                
             }
         </style>
          <div class="col-md-10 offset-md-1">
                   
             
              <div class="card">
                 <div class="card-body">
             <?php 

              $sql = "SELECT * FROM `discussion` where status = 'pending' AND agent_id = '".$_SESSION['id']."' ";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if($num == 1){?>
                    
          
                  <a href="all-new-discussion.php">
                    <div class="alert alert-danger">
                     <span class="font-weight-bold font-20">New user waiting for discussion <span class="badge badge-danger ml-2">
                         <?php 
                         $cuntSQL = mysqli_query($conn, "SELECT COUNT(*) FROM discussion WHERE status = 'pending' ");
                          $cunt = mysqli_fetch_array($cuntSQL);
                          $totalCunt = array_shift($cunt);
                              echo $totalCunt;
                         ?>
                     </span></span>
                 </div>
                 </a>
                 <?php }else{?>
               
                
                      <div class="alert alert-warning">
                          <p class="font-20 m-0">There is no one new to discuss <i class="fa fa-frown-o" aria-hidden="true"></i></p>
                      </div>
                     <?php }?>
                      
                      
                   <?php
                    $resStates = mysqli_query($conn, "SELECT * FROM `discussion` WHERE agent_id = '$agentId'");
                            if(mysqli_num_rows($resStates)){
                              $Arow = mysqli_fetch_assoc($resStates);
                                $DisSatus = $Arow['status'];
                                $userid = $Arow['user_id'];
                               
                               
                        if(isset($DisSatus)){
                          if($DisSatus == 'processing'){
                              echo '<div class="alert alert-success">
                          <p class="font-20 m-0">User waiting For Your Response.  <a href="https://homeloanadda.com/agent/waiting-for-discussion.php?95cf88f6f721c9f1e1d6c8cad1628fb7">Click here</a></p> </div>';
                          }else if($DisSatus == 'meeting-is-complete'){
                               echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Documents Collection Screen.  <a href="https://homeloanadda.com/agent/inital-documetn-uplod-option.php?User_Id='.$userid.'">Click here</a></p> </div>';
                          }else if($DisSatus == 'Bank-Feedback'){
                               echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Someone waiting for Credit score Screen. <a href="https://homeloanadda.com/agent/bank-feedback.php?User_Id='.$userid.'&bank_feed_complete">Click here</a></p> </div>';
                          }else if($DisSatus == 'Further-Documet'){
                               echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Someone waiting for further documents . <a href="https://homeloanadda.com/agent/further-document.php?User_Id='.$userid.'">Click here</a></p> </div>';
                          }else if($DisSatus == 'Identity-check'){
                             echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Visit bank for identy, Some one waiting. <a href="https://homeloanadda.com/agent/bank-visit.php?User_Id='.$userid.'">Click here</a></p> </div>';
                          }else if($DisSatus == 'identity-is-ok'){
                                echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Loan Approve Bank Feedback, Some one waiting. <a href="https://homeloanadda.com/agent/loan-is-approve.php?User_Id='.$userid.'">Click here</a></p> </div>';
                          }else if($DisSatus == 'Loan-Disbursal'){
                                echo '<div class="alert alert-success">
                          <p class="font-20 m-0">Loan Disbursal Steps, Some one waiting. <a href="https://homeloanadda.com/agent/loan-disbrusal.php?User_Id='.$userid.'">Click here</a></p> </div>';
                          }else if($DisSatus == 'pending'){
                               echo 'You Request for a loan. <a href= "waiting-for-agent-discussion.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else{
                              echo 'I am Head of HOMELOANADDA. Thank You for compplete this loan.';
                          }     
                    }
                    
                            }
                   ?>
              
               
                  </div>
              </div>
              
              
             
          </div>
         
      </div>
     
     
   <?php include 'inc/footer.php';}else{header('Location: login.php');}?>