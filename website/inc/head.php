<?php 
error_reporting(0);
session_start();
include 'inc/db.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Home Loan Adda :: Admin Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    
    <!---- bootstrap selete ----->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
   
 <style>
     .app-sidebar__user-avatar{
         height: 40px;
         width: 40px;
         border-radius: 100%;
     } 
     .app-header__logo img{
         height: 100%;
     }
</style>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header">
     <a class="app-header__logo" href="dashboard.php">
     <img src="images/logo.png" alt=""></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
      
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i></a>
        
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/plasholder.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['admin'];?></p>
          <p class="app-sidebar__user-designation">Admin Dashboard</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
         
         <li><a class="app-menu__item" href="all-complet-loan.php"><i class="app-menu__icon fa fa-check"></i><span class="app-menu__label">Complied Loan Note's</span></a></li>
         
         
         
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-plus"></i><span class="app-menu__label">Create User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="create-agent-account.php"><i class="icon fa fa-circle-o"></i> Create new agent</a></li>
            <li><a class="treeview-item" href="creat-user-account.php"><i class="icon fa fa-circle-o"></i>Create new User</a></li>
          </ul>
        </li>
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Manage User's</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="all-user.php"><i class="icon fa fa-circle-o"></i>All User</a></li>
             <li><a class="treeview-item" href="all-agent.php"><i class="icon fa fa-circle-o"></i>All Agent</a></li>
          </ul>
        </li>
        
          <li><a class="app-menu__item" href="give-raring.php"><i class="app-menu__icon fa fa-star"></i><span class="app-menu__label">Agent Rating</span></a></li>
      </ul>
    </aside>
    
    
    <main class="app-content">