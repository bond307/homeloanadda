<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';


if(isset($_GET['agent_id']) ){
    $agentID = $_GET['agent_id'];
    //sql 
    $agentRes = mysqli_query($conn, "SELECT * FROM `agent_regis` WHERE id = '$agentID' ");
    $row = mysqli_fetch_assoc($agentRes);
    
    
}

// get meeting date and time 
$meeting = mysqli_query($conn , "SELECT * FROM `discussion` WHERE agent_id = '$agentID' AND user_id = '".$_SESSION['id']."' ");
$mettingRow = mysqli_fetch_assoc($meeting);
$status = $mettingRow['status'];
    if($status == 'meeting-is-complete'){
         echo '<script>window.location.replace("initial-documents-collection.php?agent_id='.$agentID.'");</script>';
    }
   
?>
<style>
    .img-waitng{
        width: 100%;
      
    }
    .card h4{
        color: brown;
        text-shadow: 0px 1px 1px;
        font-size: 35px;
        line-height: 50px;
    }
    .card p{
        font-size: 15px;
        line-height: 20px;
    }
    .card p b{
        font-size: 18px;
        color: darkgreen;
        text-shadow: 0px 1px 1px;
    }
    .accpect-meeting p{
        font-size: 20px;
        font-style: italic;
        line-height: 30px;
        letter-spacing: 1px;
        text-align: center;
    }
    .accpect-meeting p b{
        font-size: 26px;
        font-weight: 600;
        
    }
    .meeting-success-img{
        height: 300px;
        background-image: url(../images/success.gif);
        background-size: cover;
        background-position: center;
    }
</style>
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body ">
               
                <h4 class="text-center font-italic">Wait for agent respons  </h4>
                <p class="text-center"><b>Thank you</b> for your interstate. The agent will be contact with you as soon as posibel </p>
                <div class="col-md-4 offset-md-4">
                    <img src="images/waiting.gif" class="img-waitng" alt="">
                </div>
                
               
            </div>
             
        </div>
    </div>
</div>


<?php 
// check meeting date expery


include 'inc/footer.php';}else{header('Location:../login.php');}?>