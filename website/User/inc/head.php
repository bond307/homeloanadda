<?php 
error_reporting(0);
session_start();

include 'inc/db.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Home Loan Adda :: User Dashbord</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="../admin/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   
 <style>
     .app-sidebar__user-avatar{
         width: 40px;
         height: 40px;
     }
     .noti-profile{
        border-radius: 100px;
        height: 40px;
        width: 40px;
         border: 1px solid green;
     }
     .noti-content{
         margin-left: 10px;
     }
     #loader{
        background: #fff;
        background-image: url(../images/loder.gif);
        background-position: center;
        position: fixed;
        height: 100vh;
        width: 100%;
        z-index: 999;
        background-repeat: no-repeat;
    }
     .notify{
         position: absolute;
         width: 10px;
         height: 10px;
         background-color: red;
         border-radius: 100%;
     }
     #reload{
         width: 100%;
     }
</style>
  </head>
  <div id="loader"></div>

  <body onload="lodingFunc()" class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a href="dashboard.php"><img src="images/logo.png" alt=""></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
     
        <!--Notification Menu-->
          <!--Notification Menu-->
     <li class=""><a class="app-nav__item" onClick="window.location.reload();"><i class="fa fa-refresh"></i><span class="notify"></span></a>
  </li>
      
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
             <li><a class="dropdown-item" href="change-password.php"><i class="fa fa-key fa-lg"></i> Change Password</a></li>
            <li><a onclick="logout()" class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/plasholder.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['uname'];?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['location'];?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        
       
       <li><a class="app-menu__item" href="profile.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">All Your Profile</span></a></li>

      <li><a class="app-menu__item" href="change-password.php"><i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">Change Password</span></a></li>

  <li><a onclick="logout()" class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
        
        
       
        
      
      </ul>
    </aside>
    
    <script>
        function logout(){
            alert('Are you sure! you want to logout?');
        }
  
</script>
    
    
    <main class="app-content">