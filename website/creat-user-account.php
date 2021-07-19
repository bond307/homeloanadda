<?php 
include 'inc/head.php';

if(isset($_POST['check_box']) && !empty($_POST['check_box'])){
    if(isset($_POST['submit'])){
        
        //number validation
       if(isset ($_POST['number']) && !empty($_POST['number'])){
        if(preg_match("/^\d+\.?\d*$/",$_POST['number'])){
             $number = $_POST['number'];
        }else{
            $error = '<p class="text-danger font-bold">Error! Please enter you valid phone number.</p>';
        }
           }

       //Validates password & confirm passwords.
     
    if($_POST["pass"] == $_POST["repass"]) {
       $password = ($_POST["pass"]);
    }else{
         $cpasswordErr = '<p class="text-danger font-bold">Error! Password do not match.</p>';
    }
    
        
        
        $vkey = md5(rand(0000, 9999).$_POST['number']);
        $accontNo = rand(0000, 9999);
        $date = date('d-M-y');
        //sql
        if(isset($password) && !empty($password) && isset($number) && !empty($number)){
        
        $sql = "INSERT INTO `user_regi` (`id`, `uname`, `number`, `state`, `location`, `pass`, `account_no`, `date`, `verify`, `vkey`) VALUES (NULL, '".$_POST['uname']."', '$number', '".$_POST['state']."', '".$_POST['location']."', '$password', '$accontNo', '$date', '1', '$vkey')";
        $result = mysqli_query($conn, $sql);
        if($result == true){
              $success = '
             <div class="alert alert-success">
                   <p><a href="all-user.php"><span class="btn btn-success">Success</span></a> You create a new agent.</p>
               </div>
        ';
    }
    }
}
}

?>


<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="text-center maincolor text-uppercase" >Create a new agent account</h4>
                </div>
            </div>
            <div class="card-body">
               
                  <?php if(isset($success)) echo $success; ?>
               
                <div class="login-box">
                    <form class="login-form" action="" method="post" enctype="multipart/form-data">
                           
                     
                <div class="form-group">
                    <label class="control-label">FULL NAME</label>
                    <input class="form-control" type="text" placeholder="Full Name" autofocus name="uname" value="<?php if(isset($_POST['uname']))  echo $_POST['uname'];?>">
                </div>
                
                <div class="form-group">
                    <label class="control-label">PHONE NUMBER</label>
                    <input class="form-control" type="number" placeholder="Type 10 Digite Phone Number" required value="<?php if(isset($_POST['number']))  echo $_POST['number'];?>" name="number">
                     <?php if(isset($error))  echo $error;?>
                </div>
                
                <div class="form-group">
                  <label class="control-label">State</label>
                <select class="form-control selectpicker" name="state" data-live-search="true" required>
                  

                         <?php 
                            $sql = "SELECT * FROM `state` ORDER BY `state`.`id` DESC  ";
                            $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                echo '<option selected value="'.$row['state'].'"> '.$row['state'].'</option>';
                                }
                                
                            ?>
                        <option  disabled>Coming Soon...</option>

                </select>
                </div>
                
              
                   <div class="form-group">
                  <label class="control-label">Location</label>
                <select class="form-control selectpicker" name="location" data-live-search="true" required>
                  

                         <?php 
                            $sql = "SELECT * FROM `location` ORDER BY `location`.`id` DESC  ";
                            $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                echo '<option selected value="'.$row['location'].'"> '.$row['location'].'</option>';
                                }
                                
                            ?>
                        <option  disabled>Coming Soon...</option>

                </select>
                </div>
                   
                   <div class="form-group">
                       <label class="control-label">PASSWORD</label>
                       <div class="input-group">
                          <input type="password" class="form-control pwd" name="pass" value="<?php if(isset($_POST['pass']))  echo $_POST['pass'];?>">
                          <div class="input-group-prepend">
                            <button class="btn btn-default reveal input-group-text" type="button"><i class="fa fa-eye"></i></button>
                         </div>   
                        
                        </div>
                         <?php if(isset($passwordErr))  echo $passwordErr;?>   
                </div>
                <div class="form-group">
                       <label class="control-label">PASSWORD</label>
                       <div class="input-group">
                          <input type="password" class="form-control pwd" name="repass" value="<?php if(isset($_POST['repass']))  echo $_POST['repass'];?>">
                          <div class="input-group-prepend">
                            <button class="btn btn-default reveal input-group-text" type="button"><i class="fa fa-eye"></i></button>
                         </div>   
                               
                        </div>
                        <?php if(isset($cpasswordErr))  echo $cpasswordErr;?>  
                </div>
                

                <div class="form-group">
                      <label>&nbsp;
                        <input type="checkbox" required name="check_box"><span class="label-text">I read you all <a href="">Trams & Condition</a></span>
                    </label>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN Up</button>
                </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>