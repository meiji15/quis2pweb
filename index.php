<?php

session_start();

if( !isset($_SESSION["loginpage"]) ) {
    header("Location: loginpage.php");
    exit;
}

?>

<!DOCTYPE html> 
<html> 
  
<head> 
    <title>Home</title> 
</head> 
  
<body> 
    <h1 style="text-align:center;color:pink;"> 
         Welcome 
    </h1> 

    <h3 style="text-align:center;color:grey;">""" Selamat datang di Home Page :) """</h3> 

    <h3 style="text-align:center;color:black;"> <a href="logout.php">Logout</a></h3> 
      
</body> 
  
</html> 