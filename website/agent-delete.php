<?php 
include 'inc/db.php';

if(isset($_GET['agent_id'])){
$result = ($conn ("DELETE * FORM agent_regis WHERE id = '".$_GET['agent_id']."' "));
    if($result){
        echo 'Delete Success';
    }
}
?>