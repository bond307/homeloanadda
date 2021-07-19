<?php
session_start();
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
include 'inc/head.php';
    if(isset($_GET['userID'])){
         $userID = $_GET['userID'];
    }
$md5 = md5('meetingaccpected');


//select all info 
$agentID = $_SESSION['id'];
$sql = "SELECT * FROM `discussion` WHERE agent_id = '$agentID' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>
    <style>
             .font-20{
                 font-size: 17px;
                
             }
             .meeting-accpect {
                 background-image: url(../images/success.gif);
                 height: 400px;
                 width: 100%;
                 background-size: cover;
                 background-position: center;
                 
             }
             .meeting-accpect h4{
                 color: green;
                 font-size: 29px;
                 text-align: center;
                 margin-top: 10px;
             }
             .meeting-accpect p{
                 font-size: 20px;
                 font-weight: 600;
                 text-align: center;
                 margin-top: 10px;
             }
             .meeting-is-complete{
                
                 bottom: 0;
                 
                 
             }
             .meeting-is-complete label{
                 font-weight: 600;
                 font-size: 15px;
             }
         </style>
       
 <div class="row">
         
        
     
       <?php 
     if(isset($_GET[$md5])){
     ?>
        <!-----start ----->
          <div class="col-md-6 offset-md-3 meeting-accpect">   
           <h4>Congratulations!</h4>  
            <p>Please remind customer once before we reach his home</p>
            
           <!--################################################################################################## Meeting complete check #################################################################------> 
           <?php
              if(isset($_POST['check_meetting_is_over'])){
                  $userID = $row['user_id'];
                  if(isset($_POST['meeting_complete'])){
                      $resultMeet = mysqli_query($conn, "UPDATE discussion SET status = 'meeting-is-complete' WHERE user_id = '$userID'");
                      
                      if($resultMeet){
                           echo '<script>window.location.replace("inital-documetn-uplod-option.php?User_Id='.$userID.' ");</script>';
                      }
                  }
              }
              
            ?>
          </div>
           <div class="meeting-is-complete col-md-6 offset-md-3 card mt-2 ">
                <form action="" class="card-body" method="post">
                    <div class="form-group">
                            <label>
                                <input type="checkbox" name="check_meetting_is_over"> &nbsp; Click Here to go to document upload screen if  meeting is over!
                            </label>
                       
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning col-md-4 offset-md-4" type="submit" name="meeting_complete">Click Here</button>
                    </div>
                </form>
            </div>
          <?php }else{?>
         <div class="col-md-10 offset-md-1 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center font-italic">Meeting Info</h4>
                </div>
            </div>
        
          </div>

          <div class="col-md-10 offset-md-1">
               
              <div class="card">
                  <div class="card-body">
                      
              <table class="table table-bordered">
                 <tr>
                     <th>WhatsApp Number: </th>
                     <td><?php echo $row['Uwhatsapp'];?></td>
                 </tr>
                  <tr>
                     <th>Meeting Date: </th>
                     <td><?php echo $row['meeting_date'];?></td>
                 </tr>
                  <tr>
                     <th>Perfect Meeting Time: </th>
                     <td><?php echo $row['meeting_titme'];?></td>
                 </tr>
                  
              </table> 
             <div class=" card">
                  <div class="col-md-12 border">
                     <hr>
                      <strong class="text-center">Meeting Note's</strong>
                      <hr>
                      <p><?php echo nl2br($row['meeting_notes']);?></p>
                  </div>
                  
                      </div>
          <?php 
        if(isset ($_POST['meetingComplete'])){
    //update status
    $sql = "UPDATE discussion SET status = 'processing' WHERE user_id = '$userID' AND agent_id = '$agentID' ";
    if(mysqli_query($conn, $sql)){
         echo '<script>window.location.replace("waiting-for-discussion.php?'.$md5.'");</script>';
       
    }else{
        echo 'something is worng';
    }
}
              
        ?>
                <form action="" method="post">
                    <button type="submit" name="meetingComplete" class="btn btn-success mt-3 col-md-4 offset-md-4"><i class="fa fa-check-circle"></i>Meeting Request Accpected</button> 
                </form>       
                      
                  </div>
              </div>
          </div>
          <!----- end ------->
         <?php }?> 
          
          
          
          
          
          
         
      </div>

<script>
function Check(){
    confirm('Are you sure! Your meeting is complete?');
}
</script>
<?php include 'inc/footer.php';}else{echo '<meta http-equiv="refresh" content="0;url=login.php " />';}?>