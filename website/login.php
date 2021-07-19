<?php 
session_start();
include 'db.php';

if(isset($_POST['submit'])){
    $number = $_POST['number'];
    $pass = $_POST['pass'];
    
    if(isset($number) && isset($pass)){
        //sql 
        $sql = "SELECT * FROM `user_regi` WHERE number ='$number' AND pass='$pass' AND verify = '1' ";
        $res = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($res);
        if($num > 0){
            $row = mysqli_fetch_assoc($res);
            $_SESSION['id'] = $row['id'];
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['number'] = $row['number'];
            $_SESSION['state'] = $row['state'];
            $_SESSION['pass'] = $row['pass'];
            $_SESSION['location'] = $row['location'];
   
            echo '<meta http-equiv="refresh" content="0;url=login-loader.php" />';
        }else{
            echo " <script>
        alert('Sorry! We can not find you. Please Try again and Verify your email');  
    </script>";
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
    <link rel="stylesheet" type="text/css" href="admin/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="fevo.png" type="image/png">
    <title>Home Loan Adda :: User Login Page</title>
  </head>
  <style>
      .login-box{
          height: 450px;
      }    
</style>
 
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <img src="logo.png" alt="">
      </div>
      <div class="login-box">
      
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">NUMBER</label>
            <input class="form-control" type="text" placeholder="Phone Number" autofocus name="number">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="pass">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <!--<p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>-->
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
          </div>
          <p class="text-center pt-4 font-italic">I do not have an account <a href="registration.php"> Registration Now</a></p>
        </form>
        
        
        
        
        
        <!--
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="Admin/js/jquery-3.3.1.min.js"></script>
    <script src="Admin/js/popper.min.js"></script>
    <script src="Admin/js/bootstrap.min.js"></script>
    <script src="Admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="Admin/js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
   
  </body>
</html>