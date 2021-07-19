<?php 
include 'inc/head.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['submit'])){

         $profile = $_FILES['profile']['name'];
    $target = 'agent-profile/'. $profile; 

    
     $user = $_POST['user'];
     $pass = $_POST['pass'];
     $num = $_POST['number'];
     $bank = $_POST['bank'];
     $state = $_POST['state'];
     $location = $_POST['location'];
     $date = date('M-d-Y');
     
    $acount_Number = rand(0000, 9998);
    
    
if(move_uploaded_file($_FILES['profile']['tmp_name'], $target)) {
    $sql = "INSERT INTO `agent_regis` (`id`, `pic`, `username`, `pass`, `number`, `bankname`, `state`, `location`, `account_no`, `date`) VALUES (NULL, '$profile', '$user', '$pass', '$num', '$bank', '$state', '$location', '$acount_Number', '$date')";
    $result = mysqli_query($conn, $sql);
    if($result == true){
       
        
        echo '<script>window.location.href = "create-agent-account.php?agent_success";</script>';
      
            
   
    }
 }else{
    echo 'Somethin is worng on your database.....';
    
}   
}

}
?>
<script src="star-ratings.js"> </script>
<link rel="stylesheet" href="style.css">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4 class="text-center maincolor text-uppercase" >Create a new agent account</h4>
                </div>
            </div>
            <div class="card-body">
             <?php if(isset($_GET['agent_success'])){?>
             <div class="alert alert-success">
                 <a href="all-agent.php" class="btn btn-success">View</a> &nbsp;<strong>Agent Profile create success.</strong>
             </div>
             <?php }else{?>  
                <div class="login-box">
                    <form name="myForm" onsubmit="return validateForm()" class="login-form" action="" method="post" enctype="multipart/form-data">
                           
                        <div class="form-group">
                            <img src="images/plasholder.png" class="plceholder" onclick="triggerClick()" id="ImgDisplay" alt="">
                                    
                                    <input type="file" onchange="DisplayImg(this)" name="profile" id="profile" style="display: none;" >
                        </div>
                         
                        <div class="form-group">
                            <label class="control-label">User Name</label>
                            <input class="form-control" type="text" placeholder="User name" autofocus required name="user">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password" required name="pass">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" type="number" placeholder="Phone Number" required name="number">
                        </div>
                        
                         <div class="form-group">
                            <label class="control-label">Bank Account</label>
                            <input class="form-control" type="text" placeholder="Bank name" required name="bank">
                        </div>

                        
                        
                <div class="form-group">
                  <label class="control-label">State</label>
                <select class="form-control selectpicker" name="state" data-live-search="true" required>
                  

                         <?php 
                            $sql = "SELECT * FROM `state` ORDER BY `state`.`id` DESC  ";
                            $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                echo '<option selected value="'.$row['state'].'"> '.$row['state'].'</option>';
                                }
                                
                            ?>
                        <option  disabled>Coming Soon...</option>

                </select>
                </div>
                
              
                   <div class="form-group">
                  <label class="control-label">Location</label>
                <select class="form-control selectpicker" name="location" data-live-search="true" required>
                  

                         <?php 
                            $sql = "SELECT * FROM `location` ORDER BY `location`.`id` DESC  ";
                            $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                echo '<option selected value="'.$row['location'].'"> '.$row['location'].'</option>';
                                }
                                
                            ?>
                        <option  disabled>Coming Soon...</option>

                </select>
                </div>
                 

                        <div class="form-group btn-container">
                            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
                        </div>
                    </form>
                </div>
<?php }?>
            </div>
        </div>
    </div>
</div>


<script>
function validateForm() {
  var x = document.forms["myForm"]["profile"].value;
  if (x == "") {
    alert("Please upload Agent Profile Images.");
    return false;
  }
}
   
</script>
<?php include 'inc/footer.php';?>