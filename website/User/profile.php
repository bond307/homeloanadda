<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';

if(isset($_POST['submit'])){
    $u = $_POST['u'];
    $n = $_POST['n'];
    $s = $_POST['s'];
    $loc = $_POST['l'];
    
    if(isset($u) && isset($n) && isset($s) && isset($loc)){
        
$sql = "UPDATE user_regi SET uname = '$u', state = '$s', location ='$loc', number ='$n' WHERE id = '".$_SESSION['id']."'";
        
        if(mysqli_query($conn, $sql)){
            $success = '<div class="alert alert-success"><p>Successfully Update</p></div>';
            echo '<meta http-equiv = "refresh" content = "1 ; url = logout.php"/>
';
        }else{
            echo 'Something is worng';
        }
    
        
        
    }
    
    
}
?>
    
     <section class="lockscreen-content">
     
      <div class="lock-box">
       
       <?php if(isset($success)) echo $success;?>
       
        <h4 class="text-center user-name"><?php echo $_SESSION['uname'];?></h4>
        <p class="text-center text-muted">You can update your data</p>
        <form class="unlock-form" action="" method="post">
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['uname'];?>" autofocus name="u">
          </div>
           <div class="form-group">
            <label class="control-label">PHONE NUMBER</label>
            <input class="form-control" type="text" value="<?php echo $_SESSION['number']?>" autofocus name="n">
          </div>
           <div class="form-group">
            <label class="control-label">YOUR STATE</label>
            <select class="form-control" name="s">
            <option value="<?php echo $_SESSION['state'];?>" ><?php echo $_SESSION['state'];?></option>
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
            <label class="control-label">YOUR STATE</label>
            <select class="form-control" name="l">
            <option value="<?php echo $_SESSION['location'];?>" ><?php echo $_SESSION['location'];?></option>
            <?php 
                $sql = "SELECT * FROM `location`";
                $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                    echo '<option value="'.$row['location'].'"> '.$row['location'].'</option>';
                    }
            ?>
           </select>
          </div>
      
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="icon-edit"></i>UPDATE YOUR PROFILE</button>
          </div>
        </form>
        <p><a href="change-password.php">You can change your password</a></p>
      </div>
    </section>
     
   <?php include 'inc/footer.php';}else{header('Location: ../login.php');}?>