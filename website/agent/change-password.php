<?php
session_start();

if(isset($_SESSION['id'])){

include 'inc/head.php';

 if(isset($_POST['submit'])){
   $oldPass = $_SESSION['pass'];
     $nePass = $_POST['new_pass'];
     
     if($oldPass == $_POST['old_pass']){
        $sql = "UPDATE agent_regis SET pass = '".$_POST['new_pass']."' WHERE id = '".$_SESSION['id']."'";
         
         if(mysqli_query($conn, $sql)){
            $success = '<div class="alert alert-success"><p>You successfully change your password. You need login again to continue.</p></div>';
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
       <img class="rounded-circle user-image" src="../Admin/agent-profile/<?php echo $_SESSION['pic'];?>">
        <h4 class="text-center user-name"><?php echo $_SESSION['username'];?></h4>
        <p class="text-center text-muted"><?php echo $_SESSION['state'];?></p>
        <form class="unlock-form" action="" method="post">
          <div class="form-group">
            <label class="control-label">OLD PASSWORD</label>
            <input class="form-control" type="password" placeholder="Old Password" autofocus name="old_pass" required>
          </div>
           <div class="form-group">
            <label class="control-label">NEW PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" autofocus name="new_pass" required>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-key fa-lg"></i>CHANGE PASSWORD </button>
          </div>
        </form>
        <p class="text-center"><a href="page-login.html">Forget Password?</a></p>
      </div>
    </section>
      <?php include 'inc/footer.php';}else{header('Location: login.php');}?>