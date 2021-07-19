<?php 
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';


if(isset($_GET['agent_id'])){
    $agentID = $_GET['agent_id'];

if(isset($_POST['submit_discussion'])){

    $wa = $_POST['WthNum'];
    $mt = $_POST['meetin_time'];
    $md = $_POST['meeting_date'];
    $mn = mysqli_real_escape_string($conn, $_POST['meeting_note']);
    //sql 
    $ReqDis = mysqli_query($conn, "INSERT INTO `discussion` (`id`, `meeting_date`, `meeting_titme`, `meeting_notes`, `Uwhatsapp`, `doc_need`, `agent_com`, `user_id`, `agent_id`, `status`) VALUES (NULL, '$md', '$mt', '$mn', '$wa', 'NULL', 'NULL', '".$_SESSION['id']."', '$agentID', 'pending')");
    
    if( $ReqDis == true){
         echo '<script>window.location.replace("waiting-for-agent-discussion.php?agent_id='.$agentID.'");</script>';
    }else{
        echo 'worng';
    }
    
    
}

}
 ?>
<style>
textarea.form-control {
  height: 120px;
}

.form-group label{
    font-weight: bold;
}

</style>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body ">
                <h4 class="text-center font-italic">Discussion Form</h4>
            </div>
        </div>
    </div>
</div><br>
<!----- form ------->
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>WhatsApp Number</label>
                        <input type="number" class="form-control" name="WthNum" required>
                    </div>
                    <div class="form-group">
                        <label>Meeting Date</label>
                        <input type="date" class="form-control" name="meeting_date" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Meeting Note's</label>
                        <textarea class="form-control" name="meeting_note" required placeholder="Meeting Note's"></textarea>
                    </div>
                     <div class="form-group">
                        <label>Preferrd Time Form Meeting</label>
                        <input type="time" class="form-control" name="meetin_time" required>
                    </div>
                     
                    
                
                        <button class="col-md-4 offset-md-4 btn btn-primary" type="submit" name="submit_discussion">Go to Next Step</button>
                 
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'inc/footer.php';}else{header('Location:../login.php');}?>