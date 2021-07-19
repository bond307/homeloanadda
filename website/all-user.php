<?php 
include 'inc/head.php';
//All agent show
if(isset($_GET['user_id'])){
    $sql = "DELETE FROM `user_regi` WHERE id = '".$_GET['user_id']."' ";
        
      $result = mysqli_query($conn, $sql);
    
    if($result == true){
     $success = '<div class="alert alert-success">
    Delete Success
</div>';   
        
     echo '<script>window.location.replace("all-user.php");</script>';
    }
    
}
?>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h4 class="maincolor">All Agent List</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SR No.</th>
                      <th>Account No.</th>
                      <th>Name</th>
                      <th>Number</th>
                      <th>Email</th>
                      <th>state</th>
                      <th>Date</th>
                      <th>Acction</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                        $sr = 0;
                        $sql = "SELECT * FROM `user_regi` ORDER BY `user_regi`.`date` DESC ";
                        $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                          $sr++;
                    ?>
                   
                    <tr>
                      <td><?php echo $sr ;?></td>
                      <td><?php echo $row['account_no']; ?></td>
                      <td><?php echo $row['uname']; ?></td>
                      <td><?php echo $row['number']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['state']; ?></td>
                      <td><?php echo $row['date']; ?></td>
                      
                      <td>
                          <a onclick="alert()" href="all-user.php?user_id=<?php echo $id;?>" class="btn btn-outline-danger">Delete</a>
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