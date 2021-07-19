<?php 
include 'inc/head.php';
//All agent show
if(isset($_GET['agent_id'])){
    $sql = "DELETE FROM `agent_regis` WHERE id = '".$_GET['agent_id']."' ";
        
      $result = mysqli_query($conn, $sql);
    
    if($result == true){
     $success = '<div class="alert alert-success">
    Delete Success
</div>';   
        
     echo '<script>window.location.replace("all-agent.php");</script>';
    }
    
}
?>
<style>
    .rating{
        font-size: 7px;
    }
 .c{color: orange;}
       .rating{
           margin-bottom: 20px;
       }
</style>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h4 class="maincolor">All Agent List</h4>
        </div>
        <?php if(isset($success))echo $success;?>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SR No.</th>
                      <th>Pic</th>
                      <th>Account No.</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Bank</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Acction</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                        $sr = 0;
                        $sql = "SELECT * FROM `agent_regis` ORDER BY `agent_regis`.`date` DESC ";
                        $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                          $sr++;
                    ?>
                   
                    <tr>
                      <td><?php echo $sr ;?></td>
                      <td><img  style="hight:40px; width:40px;" src="agent-profile/<?php echo $row['pic']; ?>">
                      
                      
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
                      
                      </td>
                      <td><?php echo $row['account_no']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['number']; ?></td>
                      <td><?php echo $row['bankname']; ?></td>
                      <td><?php echo $row['location']; ?></td>
                      <td><?php echo $row['date']; ?></td>
                      
                      <td>
                          <a onclick="alert()" href="all-agent.php?agent_id=<?php echo $id;?>" class="btn btn-outline-danger">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                  
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>


<script>
    function alert(){
        confirm('Are you sure! You want to delete?');
    }
</script>
<?php include 'inc/footer.php'?>