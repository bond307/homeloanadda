<?php 
session_start();
if(isset($_SESSION['id'])){
include'inc/head.php';

if(isset($_GET['agent_id'])){
    $agentID = $_GET['agent_id'];
}
$userID = $_SESSION['id'];
/*if(isset($_SESSION['id']) && !empty($_SESSION['id'])){*/


/*--------- Update status  info show -------*/
$resStates = mysqli_query($conn, "SELECT * FROM `discussion` WHERE user_id = '$userID' AND agent_id = '$agentID'  ");
    $rowStatus = mysqli_fetch_assoc($resStates);
    $status = $rowStatus['status'];
if($status == 'Identity-check'){
       echo '<script>window.location.replace("waiting-for-bank-identity.php?agent_id='.$agentID.'");</script>';
}    


    
$resFurDOC = mysqli_query($conn, "SELECT * FROM `further_doc` WHERE agent_id = '$agentID' AND user_id = '$userID'  ");
$showFurDOC = mysqli_fetch_assoc($resFurDOC);

?>
<style>
    .red-box p{
    border: 1px solid;
    border-radius: 100px;
    box-shadow: 0px 0px 2px 0px #d00;
    background-color: #d00;
    color: #fff;
   padding-top: 4px;
    padding-bottom: 7px;
    padding-left: 20px;
    padding-right: 20px;
    }
    .red-box label{
        color: #d00;
    }
    .green-box p{
   font-size: 16px;
    padding-top: 4px;
    padding-bottom: 7px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 100px;
    box-shadow: 0px 0px 2px 0px #0084FF;
        background-color: #0084FF;
        color: #fff;
    }
    .green-box label{
        color: #336359;
    }
    .file-box p{
              border: 1px solid;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 0px 2px 0px green;
        background-color: greenyellow;
        color: #fff;  
    }
    input[type="file"] {
        color: #fff;
        border: 1px solid #336359;
        background-color: #336359; 
    }
</style>
<div class="col-md-10 offset-md-1">
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <strong>We need some further documents! Agent will br give you!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

<div class="col-md-10 offset-md-1">
    <div class="card">
        <div class="card-body">
           <h4 class="font-width-bold font-italic text-center">Further documents section</h4>
        </div>
    </div>
    <br>

  <div class="row">

   <div class="col-md-8">
    <div class="card">
         
        <div class="card-body">
          
          <div class="card">
              <div class="card-body">
         <?php if($showFurDOC['further_doc'] != false){?>
           <div class="">
               <label style="font-weight: bold;">Documents Needed:</label>
           <p class="border p-3"><?php echo nl2br($showFurDOC['further_doc']);?></p>
           </div>
    <?php }else{echo '<div class="alert alert-danger">Agent will mention the documents needed shortly</div>';} ?>
          <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `further_doc_msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
   
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class="col-md-10 offset-md-1 your-com green-box">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p class="">'.nl2br($row['further_Doc_Msg']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="red-box">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p class="">'.nl2br($row['further_Doc_Msg']).'</p></div>';
            }
              
           }
        }
   
            ?>
        </div>

    </div><br>
    
    <!----- ####################################################################################################### comments upodate #######################----------->
    <?php
    // 1st com 
    if(isset($_POST['fdf'])){
        $fdm = mysqli_real_escape_string($conn, $_POST['reply_com']);
        if(mysqli_query($conn, "INSERT INTO further_doc_msg (further_Doc_Msg, user_id, agent_id, who)VALUES('$fdm', '$userID', '$agentID', 'customer' )")){
          echo '<meta http-equiv="refresh" content="0">';

        }
    }
/* --------- furhter doc file upload -----*/    
  if(isset($_POST['FDFU'])){
      $fileName = $_FILES['further_doc_file']['name'];
      $filesize = $_FILES['further_doc_file']['size'];
      
      if($_FILES['further_doc_file']['size'] > 1048576){
       echo '<script>alert("Your File Is big! Please send 1 MB File")</script>';
      }else{
          
          $upLodSucc = mysqli_query($conn, "INSERT INTO `further_doc_file` (`id`, `further_doc_file`, `user_id`, `agent_id`) VALUES (NULL, '$fileName', '$userID', '$agentID')");
          if($upLodSucc == true){
              move_uploaded_file($_FILES['further_doc_file']['tmp_name'], '../docFile/furtherFile/'.$fileName);
              echo '<meta http-equiv="refresh" content="0">';
          }else{
              echo 'somthig is worng';
          }
      }
      
  }  

    ?>
<form action="" method="post" enctype="multipart/form-data">
      
        <div class="form-group">
            <textarea name="reply_com" class="form-control" placeholder="Reply Customer Comments"></textarea>
        </div>
    <div class="row">
      
        <button class="btn btn-primary col-md-6" type="submit" name ="fdf"><i class="fa fa-comment"></i> Commetns</button>
   </div>
   
    </form>
    </div>
    </div>
</div>


   <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i> Upload Document Files</button>
                <!---------------- Doc file show -------->
          <?php 
            $sr = 0;
            $showDOC = mysqli_query($conn, "SELECT * FROM `further_doc_file` WHERE user_id = '$userID' AND agent_id = '$agentID'");

            if(mysqli_num_rows($showDOC)>0){
                while($row = mysqli_fetch_array($showDOC)){ $sr++;?>
          <div class="col-md-10 offset-md-1 your-com file-box">
                  <label style="font-weight: bold;">Document File <span class="badge badge-warning"><?php echo $sr;?></span>:</label>
                <p class=""><a href="../docFile/furtherFile/<?php echo $row['further_doc_file'];?>" download><?php echo $row['further_doc_file'];?></a></p>
           </div>
               <?php }}?>
          
          
            </div>
        </div>
</div>  

</div>
</div>
<!---------- ################################################################################################# user comments ##########################---------------->
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

   <form action="" method="post" enctype="multipart/form-data">
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Upload your document file</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="further_doc_file">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger mb-1" data-dismiss="modal">Close</button><br>
        <button class="btn btn-primary mt-1" name="FDFU" type="submit">Submit</button>
      </div>
    </div>
       
   </form>

  </div>
</div>
<?php include 'inc/footer.php';}else{header('Location:../login.php');}?>