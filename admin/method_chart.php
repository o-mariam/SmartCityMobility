<?php 
    include "connection.php";
    header('Content-Type: application/json');

    $methods = ['GET', 'POST', 'PUT', 'HEAD', 'DELETE', 'PATCH', 'OPTIONS'];
    $result = [];

    foreach($methods as $default){
        $sql = "SELECT COUNT(*) as total FROM entrie WHERE method = '$default'";
        $query = mysqli_query($conn,$sql);
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
            $result [] = $row['total'];
        }
        
    }

    $conn->close();
    
    echo json_encode($result);
?>