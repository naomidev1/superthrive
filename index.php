<?php
    session_start();

    if (!isset($_SESSION['valid'])) {
        header("Location: login.php");
        exit(); 
    }
    include("conn.php");
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        .message {
            color: green;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="mainBody">
       <div class="left">
            <?php
                include_once('leftBar.php');
            ?>
       </div>
       <div class="right">
           <div class="reg">
                
           </div>
       </div>
   </div>

</body>
</html>
