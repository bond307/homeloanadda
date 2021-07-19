<?php 
include 'inc/head.php';
//ssho loan status
$showLoan = mysqli_query($conn, "SELECT * FROM `discussion` WHERE status = 'Complete'");
$showLoanStatus = mysqli_fetch_assoc($showLoan);
$LuserID = $showLoanStatus['user_id'];
$LagentID = $showLoanStatus['agent_id'];
//check if loan is colpete

?>

<div class="col-md-8 offset-md-2">
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <h4 class="maincolor">All Complete Loan</h4>
        </div>
        <div class="card-body">
           <?php if($showLoanStatus == true){?>
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>SR No.</th>
                      <th>Acction</th>
                    </tr>
                  </thead>
                  <tbody>
                
                    <?php 
                      //ssho loan status
                        $sr = 0;
                        $showLoan = mysqli_query($conn, "SELECT * FROM `discussion` WHERE status = 'Complete'");
                        while(mysqli_fetch_assoc($showLoan)){
                      $sr ++;
                      ?>
                    <tr>
                     <td><?php echo $sr;?></td>
                      
                      <td>
                          <a onclick="alert()" href="delete-all-info.php?user_id=<?php echo $LuserID;?>&agent_id=<?php echo $LagentID;?>" class="btn btn-outline-danger">Delete</a>
                      </td>
                    </tr>
                 <?php }?>
                  
                  </tbody>
                </table>
              </div>
              <?php }else{
              echo '<div class="alert alert-danger">
                  <strong>Sorry! Any Loan is not complete right now!</strong>
              </div>';
            }?>
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