<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&family=Young+Serif&display=swap" rel="stylesheet">
</head>
<style>
    *
{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
   
}

.direct{
    margin: 10px;
}
  
  .header {
    display: inline-block;
    background-color: #095899;
    padding-right: 1175px;
    padding-bottom: 10px;
    padding-top: 7px;
    padding-left: 46px;
    font-size: 19px;
    color: white;
    position: relative;
    bottom: -10px;
    left: 20px;
    text-align: center;  
    margin-top: 15px
  }

  .cp {
    display: inline-block;
    background-color: #96a0a9;
    padding-right: 706px;
    padding-left: 6px;
    position: relative;
    bottom: -23px;
    left: 20px;
    text-align: center; 
    
  
  }
  .cp a {
    text-decoration: none;
    color: #095899;
    font-size: 15px;
   
  }
</style>
<body>
  <?php

    include "navbar.php";

  ?>
    <div class="direct">
        <span>Settings</span> <span> >> </span>
    </div>
   
    <div class="header">
         <p>Password and Sign In Method</p>
    </div>
    <div class="cp">
        <a href="">Change Password</a>
    </div>

    <a style="color: black;" href="logout.php">LogOut</a>
</body>
</html>