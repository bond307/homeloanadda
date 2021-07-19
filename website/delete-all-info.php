<?php
include('inc/db.php');
if(isset($_GET['user_id']) && isset($_GET['agent_id'])){
    echo $LuserID = $_GET['user_id'];
    echo $LagentID = $_GET['agent_id'];

    $delete = mysqli_query($conn, "DELETE FROM `bank_feed` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //doc
     $delete = mysqli_query($conn, "DELETE FROM `doc` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //doc_file
     $delete = mysqli_query($conn, "DELETE FROM `doc_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
  
    
    
     //doc_file
     $delete = mysqli_query($conn, "DELETE FROM `doc_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //feedback
     $delete = mysqli_query($conn, "DELETE FROM `feedback` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //feedback_msg
     $delete = mysqli_query($conn, "DELETE FROM `feedback_msg` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //further_doc
     $delete = mysqli_query($conn, "DELETE FROM `further_doc` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //further_doc_file
     $delete = mysqli_query($conn, "DELETE FROM `further_doc_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //further_doc_msg
     $delete = mysqli_query($conn, "DELETE FROM `further_doc_msg` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //loan_ap_doc_file
     $delete = mysqli_query($conn, "DELETE FROM `loan_ap_doc_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
     //loan_ap_msg
     $delete = mysqli_query($conn, "DELETE FROM `loan_ap_msg` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
     //loan_disbursal
     $delete = mysqli_query($conn, "DELETE FROM `loan_disbursal` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //loan_disbursal_file
     $delete = mysqli_query($conn, "DELETE FROM `loan_disbursal_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    
    //loan_disbursal_msg
     $delete = mysqli_query($conn, "DELETE FROM `loan_disbursal_msg` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //msg
     $delete = mysqli_query($conn, "DELETE FROM `msg` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //doc_file
     $delete = mysqli_query($conn, "DELETE FROM `doc_file` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    //discussion
     $delete = mysqli_query($conn, "DELETE FROM `discussion` WHERE user_id = '$LuserID' AND agent_id = '$LagentID'");
    
    if($delete == true){
       echo '<script>window.location.href = "all-complet-loan.php";</script>';
    }
    
}

?>