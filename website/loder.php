<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=dashboard.php" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Redirect you deshboard</title>
</head>
<style>
    *{
        margin: 0 auto;
        padding: 0;
    }
    body{
        background: #f1f1f1;
        
    }
    .loader{
        height: 340px;
        width: 380px;
        background: #fff;
        margin-top: 30px;
        box-shadow: 0px 0px 1px 1px #42C9DC;
        border-radius: 5px;
    }
    .loader-img{
        height: 280px;
        width: 100%;
    }
    .loader h3{
        text-align: center;
        color: #42C9DC;
        text-shadow: 0px 1px 1px;
        margin-bottom: 30px;
        font-size: 25px;
        font-family: sans-serif;
        
    }
    
</style>
<body onclick="loadingFunc()">
    
   <div class="loader">
       <img src="images/loder.gif" alt="" class="loader-img">
       <h3>Redirect to your Dashboard</h3>
   </div>
    
</body>
</html>