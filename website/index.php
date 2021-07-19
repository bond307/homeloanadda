<?php  
session_start();
include 'inc/db.php';

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    
    if(isset($uname) && isset($pass)){
        //sql 
        $sql = "SELECT * FROM `admin` WHERE admin ='$uname' AND pass='$pass' ";
        $res = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($res);
        if($num > 0){
            while($row = mysqli_fetch_assoc($res)){
            $_SESSION['id'] = $row['id'];
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['pass'] = $row['pass'];
             echo " <script>
        window.location.href = 'https://homeloanadda.com/admin/dashboard.php';
    </script>";
            }
        }else{
            echo " <script>
        alert('Sorry! We can not find you.');  
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home Loan Adda :: Agent Login Page</title>
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
        <a href="dashboard.php"><img src="images/logo.png" alt=""></a>
      </div>
      <div class="login-box">
      
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-users"></i>ADMIN SIGN IN</h3>
          <?php if(isset($success)) echo $success ;?>
          <div class="form-group">
            <label class="control-label">ADMIN NAME</label>
            <input class="form-control" type="text" placeholder="ADMIN NAME"  name="uname">
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
            
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
          </div>
        </form>
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
        </form>
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