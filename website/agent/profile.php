<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';

 if(isset($_POST['submit'])){
     
        $sql = "UPDATE agent_regis SET username = '".$_POST['Una']."', number = '".$_POST['Un']."', bankname = '".$_POST['Ub']."', state = '".$_POST['Us']."', location = '".$_POST['Ul']."' WHERE id = '".$_SESSION['id']."' ";
         
         if(mysqli_query($conn, $sql)){
            $success = '<div class="alert alert-success"><p>You successfully change your Profile. You need to login again to continue.</p></div>';
             
             echo '<meta http-equiv = "refresh" content = "1 ; url = logout.php"/>';
         }else{
            echo 'something is worng';
         }
 }
     
 


?> 
     
      <section class="lockscreen-content">
    
      <div class="lock-box">
      <?php if(isset($success)) echo $success;?>
       <img class="rounded-circle user-image" src="../admin/agent-profile/<?php echo $_SESSION['pic'];?>">
        <h4 class="text-center user-name"><?php echo $_SESSION['username'];?></h4>
        <p class="text-center text-muted"><?php echo $_SESSION['account_no'];?></p>
        <form class="unlock-form" action="" method="post">
          <div class="form-group">
            <label class="control-label">User Name:</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['username'];?>" autofocus name="Una">
          </div>
          
          <div class="form-group">
            <label class="control-label">Number:</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['number'];?>" autofocus name="Un">
          </div>
          
          <div class="form-group">
            <label class="control-label">Bank:</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['bankname'];?>" autofocus name="Ub">
          </div>
          
          <div class="form-group">
            <label class="control-label">State:</label>
            <select class="form-control" name="Us">
                <option value="<?php echo $_SESSION['state'];?>"><?php echo $_SESSION['state'];?></option>
                <?php 
                    $sql = "SELECT * FROM `state` ORDER BY `state`.`id` DESC  ";
                    $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['state'].'"> '.$row['state'].'</option>';
                        }
                  ?>
            </select>
          </div>
        <div class="form-group">
            <label class="control-label">Location:</label>
            <select class="form-control" name="Ul">
                <option value="<?php echo $_SESSION['location'];?>"><?php echo $_SESSION['location'];?></option>
                <?php 
                    $sql = "SELECT * FROM `location` ORDER BY `location`.`id` DESC  ";
                    $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row['location'].'"> '.$row['location'].'</option>';
                        }
                  ?>
            </select>
          </div>
        
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-unlock fa-lg"></i>CHANGE PROFILE </button>
          </div>
        </form>
       
      </div>
    </section>
   <?php include 'inc/footer.php';}else{header('Location: login.php');}?>