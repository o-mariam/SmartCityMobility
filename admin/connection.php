<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "web";  
      
    $conn= mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Unable to Connect database: " . mysqli_connect_error());  
    }  
?> 
