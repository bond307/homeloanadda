<?php

session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';

 if(isset($_POST['submit'])){
    $oldPass = $_SESSION['pass'];
     $nePass = $_POST['new_pass'];
     
     if($oldPass == $_POST['old_pass']){
        $sql = "UPDATE user_regi SET pass = '$nePass' WHERE id = '".$_SESSION['id']."'";
         
         if(mysqli_query($conn, $sql)){
            $success = '<div class="alert alert-success"><p>You successfully change your password</p></div>';
             echo '<meta http-equiv = "refresh" content = "1 ; url = logout.php"/>';
         }else{
            echo 'something is worng';
         }
 }else{
        $PassNot = '<div class="alert alert-danger"><p>Your old password do not match</p></div>';
     }
     
 }


?> 
     
      <section class="lockscreen-content">
      <div class="lock-box">
       <?php if(isset($PassNot)) echo $PassNot;?>
       <?php if(isset($success)) echo $success;?>
        <h4 class="text-center user-name"><?php echo $_SESSION['uname'];?></h4>
        <p class="text-center text-muted">Change your password.</p>
        <form class="unlock-form" action="" method="post">
          <div class="form-group">
            <label class="control-label">OLD PASSWORD</label>
            <input class="form-control" type="password" placeholder="Old Password" autofocus name="old_pass">
          </div>
           <div class="form-group">
            <label class="control-label">NEW PASSWORD</label>
            <input class="form-control" type="password" placeholder="New Password" autofocus name="new_pass">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-key fa-lg"></i>CHANGE PASSWORD </button>
          </div>
        </form>
        <p><a href="profile.php">Go to your profile</a></p>
      </div>
    </section>




     
   <?php include 'inc/footer.php';}else{header('Location:../login.php');}?>