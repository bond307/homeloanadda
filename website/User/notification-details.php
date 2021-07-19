<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';

if(isset($_GET['interstate_id'])){
    $intID = $_GET['interstate_id'];
    
$sql = "SELECT * FROM `interste` WHERE agent_status = 'Talking' AND id = '$intID' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
      
}

?>
  
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
         </style>
          <div class="col-md-4 offset-md-4">
              <div class="card">
                  <div class="card-body">
                    <div class="col-md-6 offset-md-3">
                         <img class="agent_profile user-image" src="admin.homeloanadda.com/agent-profile/<?php echo $row['agent_pic'];?>">
                    </div>
                      <table class="table table-bordered">
                          <tr>
                              <th>Agent Name: </th>
                              <td><?php echo $row['agent_name'];?></td>
                          </tr>
                          <tr>
                              <th>Agent State: </th>
                              <td><?php echo $row['agent_state'];?></td>
                          </tr>
                           <tr>
                              <th>Agent Bank: </th>
                              <td><?php echo $row['agent_bank'];?></td>
                          </tr>
                           <tr>
                             
                          </tr>
                      </table>
                       <a href="tel:<?php echo $row['agent_num'];?>" class="text-white btn btn-warning col-md-6 offset-md-3"><i class="fa fa-phone"></i>Call Now</a>
                  </div>
              </div>
          </div>
       
      </div>
  
     
   <?php include 'inc/footer.php';}else{header('Location: ../login.php');}?>