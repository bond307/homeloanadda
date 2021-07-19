<?php 
session_start();
include 'inc/head.php';

if(isset($_POST['submit'])){
    if($_SESSION['pass'] == $_POST['old_pass']){
        $sql = "UPDATE admin SET pass = '".$_POST['newPass']."' WHERE id = '".$_SESSION['id']."'";
    if(mysqli_query($conn, $sql)){
        $success = ' <div class="alert alert-primary">
                     <span>Successfully chnage Your Password</span> 
                 </div>';
        echo '<meta http-equiv = "refresh" content = "1 ; url = logout.php"/>';
    }
}else{
        $error = ' <div class="alert alert-danger">
                     <span>Sorry! your old password do not match</span> 
                 </div'; 
    }
    
}

?>
    
    
    <style>
        .btn-round{
            border-radius: 100px;
            margin-top: -8px;
        }
        span{
            font-weight: bold;
            font-size: 16px;
        }
</style>
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>  <span class="text-success font-italic"><?php echo $_SESSION['admin'];?></span></h1>
          <p>Admin can change view all thing. </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
      
      <div class="row">
        <div class="col-md-6">
         <div class="card">
             <div class="card-header">
                 <h4>Quick View:</h4>
             </div>
             <div class="card-body">
                 <div class="alert alert-warning">
                     <span>All User</span> <span><a href="all-user.php" class="btn btn-outline-warning btn-round float-right"> View</a></span>
                 </div>
                 
                 <div class="alert alert-primary">
                     <span>All Agent</span> <span><a href="all-agent.php" class="btn btn-outline-primary btn-round float-right"> View</a></span>
                 </div>
                 <div class="alert alert-success">
                     <span>All Complied Loan</span> <span><a href="all-agent.php" class="btn btn-outline-success btn-round float-right"> View</a></span>
                 </div>
             </div>
         </div>
        </div>
        
        
        
        <div class="col-md-6">
         <div class="card">
           
             <div class="card-header">
                 <h4>Change Password:</h4>
             </div>
             <div class="card-body">
                 <?php if(isset($success))echo $success;?>
            <?php if(isset($error))echo $error;?>
                 <div class="form">
                     <form action="" method="post">
                         <div class="form-group">
                             <label><b>Old Password:</b></label>
                             <input type="password" class="form-control" placeholder="Old Password" name="old_pass" required> 
                             
                         </div>
                         <div class="form-group">
                             <label><b>New Password:</b></label>
                             <input type="password" class="form-control" placeholder="New Password" name="newPass" required> 
                             
                         </div>
                         <button class="btn btn-danger" type="submit" name="submit">Change Now</button>
                     </form>
                 </div>
             </div>
         </div>
        </div>
      </div>
      
      
   <?php include 'inc/footer.php';?>