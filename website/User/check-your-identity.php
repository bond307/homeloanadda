<?php 
session_start();
if(isset($_SESSION['id'])){
include 'inc/head.php';
?>
<style>

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
             <h4 class="text-center font-italic">Wait for agent respons  </h4>
                <p class="text-center"><b>Thank you</b> for your interstate. The agent will be contact with you as soon as posibel </p>
                <div class="col-md-4 offset-md-4">
                    <img src="images/waiting.gif" class="img-waitng" alt="">
                </div>
           </div>
       </div>
   </div>
    
</div>
<?php include 'inc/footer.php';}else{header('Location: login.php');}?>