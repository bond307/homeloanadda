   
<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';?>
 
   
<?php include 'inc/footer.php';}else{header('Location:../login.php');}?>