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
      
     $result = mysqli_query($conn, "SELECT * FROM `agent_regis` WHERE location = '".$_SESSION['location']."' ");
      $dis = mysqli_query($conn, "SELECT * FROM `discussion` WHERE agent_id = '$agentID' AND user_id = '$userID' ");
$o = 0;
    if(mysqli_num_rows($result)>0){
         while($row = mysqli_fetch_assoc($result)){
         $agentID = $row['id'];
        $dis = mysqli_query($conn, "SELECT * FROM `discussion` WHERE agent_id = '$agentID' AND user_id = '$userID' ");
           if(mysqli_num_rows($dis)>0){
                while($rows = mysqli_fetch_assoc($dis)){
                 echo $rows['status'];
                    
                    if($rows['status'] == 'pending' ){
                    echo '   <a class="btn btn-warning text-white col-md-6 offset-md-3"><i class="fa fa-heart"></i> Pendnig</a>';
                    }else{
                        echo 'ok';
                    }
                }
           }
    }
    }
    ?>
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

                   <a href="agent-initial-discussion.php?agent_id=<?php echo $row['id'];?>" class="btn btn-warning text-white col-md-6 offset-md-3"><i class="fa fa-heart"></i> Pendnig</a>
                      
                      
                  </div>
                  
              </div>
          </div>
  
      </div>
     
   <?php include 'inc/footer.php';}else{header('Location:../login.php');}?>