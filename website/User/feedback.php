<?php 
session_start();
if(isset($_SESSION['id'])){
include'inc/head.php';
 if(isset($_GET['agent_id']) ){
    $agentID = $_GET['agent_id'];
}
    $userID = $_SESSION['id']; 
   
    /*----- insert into rating ----*/
if(isset($_POST['feedback'])){
$fedUp = mysqli_query($conn, "INSERT INTO `feedback` ( `feedback_for_interfac`, `feedback_for_agent`, `user_id`, `agent_id`) VALUES ( '".$_POST['rate']."', '".$_POST['agent_rating']."', '$userID', '$agentID');");
    if($fedUp == true){
    $succ = ' <div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body">
            <div class="check"><i class="fa fa-check"></i><p>Thank you for your feedback</p></div><br>
            <a href="dashboard.php" class="btn btn-primary"> Go to home </a>
        </div>
        </div></div>';
    $hide = 'hide';
}else{
        echo 'something is worng';
    }
}
    
?>
<script src="star-ratings.js"></script>
<link rel="stylesheet" href="style.css">
<div class="row">
    <?php if(isset($succ)) echo $succ;?>
    
  
   
    
     
    <div class="col-md-8 offset-md-2">
        <div class="card  <?php if(isset($hide)) echo $hide;?>">
        
            <h5 class="pt-2 pb-2 bg-dark text-center text-white">Please Provide Feedback</h5>
            <div class="card-body faq">
                <!------ 3tr feedback----->
                <form action="" method="post">
                    <div class="form-group">
                        <p class="howInter">How do you like the User Interface?</p>
                        <div class="stars row">
                            <input type="radio" id="one" name="rate" value="Hate">
                            <label for="one" id="one"></label>
                            <input type="radio" id="two" name="rate" value="Don't Like">
                            <label for="two" id="two"></label>
                            <input type="radio" id="three" name="rate" value="Good">
                            <label for="three" id="three"></label>
                            <input type="radio" id="five" name="rate" value="Love">
                            <label for="five" id="five"></label>
                            <span class="result"></span>
                        </div>
                    </div><br><br>
                    <!------ Agent feedback ---->
<div class="form-group">
<p class="howInter">Please rate your agent experience </p>
<div class="container">
    <div class="rating-wrap">
        <h2>Star Rating</h2>
        <div class="center">
            <fieldset class="rating">
                <input type="radio" id="star5" name="agent_rating" value="5" /><label for="star5" class="full" title="Awesome"></label>
                <input type="radio" id="star4.5" name="agent_rating" value="4.5" /><label for="star4.5" class="half"></label>
                <input type="radio" id="star4" name="agent_rating" value="4" /><label for="star4" class="full"></label>
                <input type="radio" id="star3.5" name="agent_rating" value="3.5" /><label for="star3.5" class="half"></label>
                <input type="radio" id="star3" name="agent_rating" value="3" /><label for="star3" class="full"></label>
                <input type="radio" id="star2.5" name="agent_rating" value="2.5" /><label for="star2.5" class="half"></label>
                <input type="radio" id="star2" name="agent_rating" value="2" /><label for="star2" class="full"></label>
                <input type="radio" id="star1.5" name="agent_rating" value="1.5" /><label for="star1.5" class="half"></label>
                <input type="radio" id="star1" name="agent_rating" value="1" /><label for="star1" class="full"></label>
                <input type="radio" id="star0.5" name="agent_rating" value="0.5" /><label for="star0.5" class="half"></label>
            </fieldset>
        </div>

        <h4 id="rating-value"></h4>
    </div>
</div>

</div>

                    <button class="btn btn-primary col-md-4 offset-md-4" name="feedback" type="submit">Send Feedback</button>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    let star = document.querySelectorAll('input');
    let showValue = document.querySelector('#rating-value');

    for (let i = 0; i < star.length; i++) {
        star[i].addEventListener('click', function() {
            i = this.value;

            showValue.innerHTML = i + " out of 5";
        });
    }
</script>
<?php include 'inc/footer.php';}else{header('Location:../login.php');}?>