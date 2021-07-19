<?php
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
/* ---- set user id -----*/
if(isset($_GET['User_Id'])){
    $userID = $_GET['User_Id'];
}
$agentID = $_SESSION['id'];
/*if(isset($_SESSION['id']) && !empty($_SESSION['id'])){*/

/*--------- Meeting info show -------*/
$resDocShow = mysqli_query($conn, "SELECT * FROM `doc` WHERE agent_id = '".$_SESSION['id']."'  AND user_id = '$userID'  ");
$showDocinfo = mysqli_fetch_assoc($resDocShow);

 ?>
<style>
      .red-box p{
      font-size: 16px;
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
    .p-3{font-size: 15px;font-weight: 500; font-family: sans-serif;}
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
</style>
 <div class="col-md-12">
  <div class="row">
      <div class="col-md-7">
      
       <div class="card">
         
        <div class="card-body">
            <h4 class="bg-dark text-center pt-2 pb-2 text-white">Documets Collection Screen</h4>
          <div class="card">
              <div class="card-body">
           <div class="">
               <label style="font-weight: bold;">Documents Needed:</label>
           <p class="border p-3"><?php echo nl2br($showDocinfo['doc']);?></p>
           </div>
           
           <div>
                <label style="font-weight: bold;">Your Comments:</label>
           <p class="border p-3"><?php echo nl2br($showDocinfo['doc_com']);?></p>
           </div>
                
           <!----- chat option reply ------->  
          <?php 
             $sr = 0;
            $showMSG= mysqli_query($conn, "SELECT * FROM `msg` WHERE user_id = '$userID' AND agent_id = '$agentID' ");
            if(mysqli_num_rows($showMSG)>0){
            while($row = mysqli_fetch_array($showMSG)){ 
                $sr++;
                  
            if($row['who'] == 'customer'){
                echo ' <div class="col-md-10 offset-md-1 your-com green-box ">
                  <label style="font-weight: bold;">Your Reply Comments:</label>
           <p>'.nl2br($row['msg']).'</p>
           </div>';
            }else if($row['who'] == 'Agent'){
                echo '
                <div class="red-box">
            <label style="font-weight: bold;">Agent Comments:</label>
               <p>'.nl2br($row['msg']).'</p></div>';
            }
              
           }
        }
            ?>
            
            

        </div>

    </div><br>
    
    <!----- ####################################################################################################### comments upodate #######################----------->
<?php
    // 1st com 
    if(isset($_POST['com'])){
         $msg = mysqli_real_escape_string($conn, $_POST['reply_com']);
                   if(mysqli_query($conn, "INSERT INTO msg (msg, user_id, agent_id, who)
                   VALUES('$msg', '$userID', '$agentID', 'Agent' )")){
          echo '<meta http-equiv="refresh" content="0">';

        }
    }

    ?>
<form action="" method="post">
      
        <div class="form-group">
            <textarea name="reply_com" required class="form-control" placeholder="Reply Customer Comments"></textarea>
        </div>
       
        <!---- 1st comments---->
      <div class="row">
          <div class="col-md-6">
               <button class="btn btn-primary col-md-6" type="submit" name ="com"><i class="fa fa-comment"></i> Commetns</button>
          </div>
           <div class="col-md-6">
               <a href="bank-feedback.php?User_Id=<?php echo $userID; ?>" onclick="check()" class="btn btn-warning col-md-10 float-right" type="submit"><i class="fa fa-star"></i> Credit Score Update</a>
          </div>
      </div>
       
        
        

    </form>
     
    </div>
    </div>
      </div>
      
      
   <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                      <h4 class="bg-dark text-center pt-2 pb-2 text-white">Documets Files</h4>
                       <!---------------- Doc file show -------->
          <?php 
            $sr = 0;
            $showDOC = mysqli_query($conn, "SELECT * FROM `doc_file` WHERE user_id = '$userID' AND agent_id = '$agentID'");

            if(mysqli_num_rows($showDOC)>0){
                while($row = mysqli_fetch_array($showDOC)){ $sr++;?>
          <div class="col-md-10 offset-md-1 your-com file-box">
                  <label style="font-weight: bold;">Document File <span class="badge badge-warning"><?php echo $sr;?></span>:</label>
                <p class=""><a href="../docFile/<?php echo $row['doc_file'];?>" download><?php echo $row['doc_file'];?></a></p>
           </div>
               <?php }}else{
                echo '<div class="alert alert-danger">Ther are no documents files</div> ';
            }?>
          
          
            </div>
        </div>
</div>  
  </div>
</div>  
   
  <script>
      function check(){
          confirm('Are you sure to move to credit score screen?');
      }
</script>
    <?php include 'inc/footer.php'; }else{header('Location:login.php');}?>