<?php include 'inc/head.php';

//select all info 
$agentID = $_SESSION['id'];
$sql = "SELECT * FROM `discussion` WHERE agent_id = '$agentID' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>


<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-responsive-md table-responsive-sm">
                    <tr>
                        <th>No</th>
                        <th>Meeting Date</th>
                        <th>Meeting Time</th>
                        <th>Action</th>
                    </tr>
                    
                    
                    <tr>
                        <td>1</td>
                        <td><?php echo $row['meeting_date'];?></td>
                        <td><?php echo $row['meeting_titme'];?></td>
                    
                        <td><a href="waiting-for-discussion.php?userID=<?php echo $row['user_id'];?>" class="btn btn-warning">See More</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<?php include 'inc/footer.php';?>