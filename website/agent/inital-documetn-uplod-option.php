<?php include 'inc/head.php';
/* ---- set user id -----*/
if(isset($_GET['User_Id'])){
    $userID = $_GET['User_Id'];
}
$agentID = $_SESSION['id'];
//md5 code 
$uploadDocNed = md5('update-success');
/*--------- Meeting info insert -------*/    
if(isset($_POST['Doc_Sub'])){
    
    if(isset($_POST['document_need']) && !empty($_POST['document_need'])){
    $document_need = mysqli_real_escape_string($conn, $_POST['document_need']);
    }
    if(isset($_POST['Agentcomment1']) && !empty($_POST['Agentcomment1'])){
    $Agentcomment = mysqli_real_escape_string($conn, $_POST['Agentcomment1']);
    }
  
        //Insert 
      $sql = "INSERT INTO `doc` (`id`, `doc`, `doc_com`, `user_id`, `agent_id`)
      VALUES (NULL, '$document_need', '$Agentcomment', '$userID', '$agentID' )";
        
        $result = mysqli_query($conn, $sql);
        
        if($result == true){
             echo '<script>window.location.replace("document-need-reply.php?User_Id='.$userID.' ");</script>';
        }else{
           echo  'worng';
           
        }

   
}

?>     
<style>
    textarea{
        height: 200px;
    }
    .hide{
        display: none;
    }
</style>

<div class="row">
   <div class="col-md-8 offset-md-2 card mb-2">
       <div class="card-body">
           <h4 class="font-width-bold font-italic text-center ">Documents Collection Screen</h4>
       </div>
    </div>
    <div class="col-md-8 offset-md-2 card">
        <div class="card-body">   
             

            
            <form action="" method="post" class="<?php echo $hide;?>">
                <div class="form-group">
                    <label>Document's Needed: </label>
                    <textarea class="form-control" name="document_need" required></textarea>
                </div>
                <div class="form-group">
                   <label>Comments: </label>
                    <textarea class="form-control" name="Agentcomment1" required></textarea>
                </div>
                
                <button class="btn btn-primary" type="submit" name="Doc_Sub">Submit</button>
            </form>
 <!-------------------------------------------- Form Compelete ---------------->
           
          
            
            

       
       
        </div>
    </div>
</div>

<?php include 'inc/footer.php' ;?>