<?php 
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';

 $userID = $_SESSION['id'];


?>
  

   <style>
    .fa-whatsapp, .fa-sticky-note{
    color: green;
    font-weight: bold;
        font-size: 20px;
     }
       .c{color: orange;}
       .rating{
           margin-bottom: 20px;
       }
  .agent_profile{
                 width: 100px;
                 margin: 25px auto;
                 border-radius: 100%;
             }
             .col-md-4{
                 margin-bottom: 20px;
             }
</style> 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> Welcome <span class="text-danger font-weight-bold"><?php echo $_SESSION['uname'];?></span></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
         <div class="row">
         <?php
    $resStates = mysqli_query($conn, "SELECT * FROM `discussion` WHERE user_id = '$userID' ");
    if(mysqli_num_rows($resStates)){
        while($Arow = mysqli_fetch_assoc($resStates)){
             $DisUsertID = $Arow['user_id'];
             $DiagenttID = $Arow['agent_id'];
             $DisSatus = $Arow['status'];
            
            
if($DisUsertID = $userID){
$result = mysqli_query($conn, "SELECT * FROM `agent_regis` WHERE location = '".$_SESSION['location']."' AND id = '$DiagenttID' ");
while($row = mysqli_fetch_assoc($result)){
  $agentID = $row['id'];   
  $Apic = $row['pic'];   
  $Aname = $row['username'];   
  $Astate = $row['state'];   
  $Aloc = $row['location'];   
  $Abank = $row['bankname'];   

                
             ?>
        
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-6 offset-md-3">
                      <img class="agent_profile user-image" src="../admin/agent-profile/<?php echo $Apic;?>">
                         <div class="rating">
        <?php 
    //show agent id
$totalRowFeedback = mysqli_query($conn, "SELECT * FROM `feedback` WHERE agent_id ='".$row['id']."' ");
$totalRow = mysqli_num_rows($totalRowFeedback);
if(mysqli_num_rows($totalRowFeedback)){
    $countRat = mysqli_query($conn, "SELECT SUM(feedback_for_agent) AS total FROM feedback WHERE agent_id='".$row['id']."'");
    $cuntData = mysqli_fetch_assoc($countRat);
     $totalData = array_shift($cuntData); 
    $total  = round($totalData / $totalRow);
    
        if($total <= 1){
            echo ' <span class="fa fa-star c"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 2){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 3){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 4){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star "></span>';
             echo ' <span>'.$totalRow.'</span>';
        }else{
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }
                             
        }
        ?>

                         </div>
                    </div>
                      <table class="table table-bordered">
                          <tr>
                              <th>Agent Name: </th>
                              <td><?php echo $Aname;?></td>
                          </tr>
                          <tr>
                              <th>Agent Location: </th>
                              <td><?php echo $Aloc;?>, <b><?php echo $Astate;?></b></td>
                          </tr>
                           <tr>
                              <th>Agent Bank: </th>
                              <td><?php echo $Abank;?></td>
                          </tr>
                      </table>
                      <?php
                       if(isset($DisSatus)){
                          if($DisSatus == 'processing'){
                              echo 'Your meeting is Processing. <a href ="waiting-for-agent-discussion.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'meeting-is-complete'){
                               echo 'Your meeting is Complite. <a href= "initial-documents-collection.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'Bank-Feedback'){
                               echo 'Documets Collection is done. <a href= "bank-feedback.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'Further-Documet'){
                               echo ' Credit score is done. <a href= "further-documents-need.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'Identity-check'){
                               echo 'Further Documetns is collocted. <a href= "waiting-for-bank-identity.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'identity-is-ok'){
                               echo 'Identity Check is Complite. <a href= "waiting-for-bank-identity.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'Loan-Disbursal'){
                               echo 'Loan Approve Bank Feedback Check is Complite. <a href= "loan-disbursal.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else if($DisSatus == 'pending'){
                               echo 'You Request for a loan. <a href= "waiting-for-agent-discussion.php?agent_id='.$agentID.'"> Click here to continu</a>';
                          }else{
                              echo 'Thanks! Your Loan is close! Wait for admin few moment to go to your dashboard.';
                          }
                      }?>
                  </div>
                  
              </div>
          </div>
    <?php }}}}else{
            $result = mysqli_query($conn, "SELECT * FROM `agent_regis` WHERE location = '".$_SESSION['location']."' ");
               if(mysqli_num_rows($result)>0){
                   while($row = mysqli_fetch_assoc($result)){

        ?>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-6 offset-md-3">
                         <img class="agent_profile user-image" src="../admin/agent-profile/<?php echo $row['pic'];?>">
                         <div class="rating">
        <?php 
    //show agent id
$totalRowFeedback = mysqli_query($conn, "SELECT * FROM `feedback` WHERE agent_id ='".$row['id']."' ");
$totalRow = mysqli_num_rows($totalRowFeedback);
if(mysqli_num_rows($totalRowFeedback)){
    $countRat = mysqli_query($conn, "SELECT SUM(feedback_for_agent) AS total FROM feedback WHERE agent_id='".$row['id']."'");
    $cuntData = mysqli_fetch_assoc($countRat);
     $totalData = array_shift($cuntData); 
    $total  = round($totalData / $totalRow);
    
        if($total <= 1){
            echo ' <span class="fa fa-star c"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
            echo ' <span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 2){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 3){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star"></span>';
                echo '<span class="fa fa-star"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }elseif($total <= 4){
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star "></span>';
             echo ' <span>'.$totalRow.'</span>';
        }else{
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
                echo '<span class="fa fa-star c"></span>';
             echo ' <span>'.$totalRow.'</span>';
        }
                             
        }
        ?>

                         </div>
                    </div>
                      <table class="table table-bordered">
                          <tr>
                              <th>Agent Name: </th>
                              <td><?php echo $row['username'];?></td>
                          </tr>
                          <tr>
                              <th>Agent State: </th>
                              <td><?php echo $row['state'];?></td>
                          </tr>
                           <tr>
                              <th>Agent Bank: </th>
                              <td><?php echo $row['bankname'];?></td>
                          </tr>
                      </table>
                      <a href="agent-initial-discussion.php?agent_id=<?php echo $row['id'];?>" class="btn btn-success text-white col-md-6 offset-md-3"><i class="fa fa-heart"></i> Interstate</a>
                  </div>
                  
              </div>
          </div>
      <?php }}}?>
      </div>
    
   <?php include 'inc/footer.php';}else{header('Location:../login.php');}?>