<?php include 'db.php';

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
              echo '<script>window.location.replace("login.php");</script>';
    }
    }
}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">


<link rel="icon" href="fevo.png" type="image/png">

    <title>Registration :: Home loan adda </title>
</head>
<style>
    input[type="checkbox"] {
        margin-right: 8px;
        border: 1px solid #ddd;
        border-radius: 3px;}

    .login-content .login-box {
        min-height: 750px;
        padding-bottom: 40px;
    }
    .login-box{
        margin-bottom: 50px;
    }
    .login-content .logo {
	margin-bottom: 10px;
	/* font-family: "Niconne"; */
	/* color: #fff; */
	margin-top: 25px;
    }
    #loader{
        background: #fff;
        background-image: url(images/loder.gif);
        background-position: center;
        position: fixed;
        height: 100vh;
        width: 100%;
        z-index: 999;
        background-repeat: no-repeat;
    }
</style>
<div id="loader"></div>
<body onload="lodingFunc()">
   <!-- Error Alert -->
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <img src="logo.png" alt="">
        </div>

        <div class="login-box">
            <form class="login-form" action="" method="post">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>USER SIGN UP</h3>

               <?php if(isset($ChekError))  echo $ChekError;?>
             
               
                <div class="form-group">
                    <label class="control-label">FULL NAME</label>
                    <input class="form-control" type="text" placeholder="Full Name" autofocus required name="uname" value="<?php if(isset($_POST['uname']))  echo $_POST['uname'];?>">
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
                 <p class="text-center pt-4 font-italic">I do not have an account <a href="login.php"> Login Now</a></p>
            </form>

        </div> 
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="admin/js/jquery-3.3.1.min.js"></script>
    <script src="admin/js/popper.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/main.js"></script>
   <script src="admin/js/bootstrap-select.min.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="Adminjs/plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
        
    

       
    </script>
</body>

</html>