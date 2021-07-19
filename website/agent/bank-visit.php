<?php 
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
    
if(isset($_GET['User_Id'])){
    $userID = $_GET['User_Id'];
}
$agentID = $_SESSION['id'];
if(isset($_POST['identity_ok'])){
    if(mysqli_query($conn, "UPDATE discussion SET status = 'identity-is-ok' WHERE user_id = '$userID' AND agent_id = '$agentID' ")){
          echo '<script>window.location.replace("loan-is-approve.php?User_Id='.$userID.' ");</script>';
    }
}
?>
<style>
    form{
        padding: 30px 10px;
    }
    
   .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
       font-weight: 600;
} 
/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="bg-dark">
            <h5 class="text-center text-white pt-3 pb-3"><i class="fa fa-id-badge" aria-hidden="true"></i> &nbsp; Identity check By Bank</h5>
        </div>
    </div>
    
    
<!----- chekc id --->
   
   <div class="col-md-8 offset-md-2">
       <div class="card">
           <div class="card-body">
              <form action="" method="post">
                  <div class="form-group">
                     <label class="container">Pan card verification
                    <input type="checkbox" required name='chek_identity'>
                    <span class="checkmark"></span>
                    </label>
                  </div>
                   <div class="form-group">
                     <label class="container">Aadhar Card verification
                    <input type="checkbox" required name='chek_identity'>
                    <span class="checkmark"></span>
                    </label>
            
                  </div>
                   <div class="form-group">
                     <label class="container">Signature Verification
                    <input type="checkbox" required name='chek_identity'>
                    <span class="checkmark"></span>
                    </label>
                  </div><br>
                  <button class="btn btn-primary" type="submit" name="identity_ok">Loan Approval Status</button>
              </form>
           </div>
       </div>
   </div>
    
</div>
<?php include 'inc/footer.php';}else{header('Location: login.php');}?>