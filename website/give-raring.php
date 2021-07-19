<?php include 'inc/head.php';

if(isset($_POST['submit'])){
    if(isset($_POST['agent_id']) && isset($_POST['agent_rating']) ){
        
        $fedUp = mysqli_query($conn, "INSERT INTO `feedback`(`feedback_for_agent`, `agent_id`) VALUES ('".$_POST['agent_rating']."', '".$_POST['agent_id']."')");
        
        if($fedUp == true){
          $succ = '<div class="alert alert-success"><b>Successfull upload agent rating</b></div>';
        }else{
            echo 'Worng';
        }
        
    }
}
echo $id;
?>
<link rel="stylesheet" href="style.css">
<style></style>
<div class="row">
    <div class="col-md-4 offset-md-4">
       <?php if(isset($succ)) echo $succ;?>
        <div class="card">
            <div class="card-header">
                <h4>Agent Rating Screen</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <h6>Select Agent</h6>
                        <select class="form-control" name="agent_id">
                            <?php 
                        $sr = 0;
                        $sql = "SELECT * FROM `agent_regis` ORDER BY `agent_regis`.`date` DESC ";
                        $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                          $sr++;
                    ?>
                   
                            <option value="<?php echo $row['id']?>"><?php echo $row['username']?></option>
                          <?php }?> 
                        </select>
                    </div>
                        <div class="form-group">
                       
                        <div class="container">
                            <div class="rating-wrap">
                                <h5>Star Rating</h5>
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
  <button class="btn btn-primary col-md-12" name="submit">Start Rating</button>
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
<?php include 'inc/footer.php'?>