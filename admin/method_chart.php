<?php 
    include "connection.php";

    $methods = ['GET', 'POST', 'PUT', 'HEAD', 'DELETE', 'PATCH', 'OPTIONS'];
    $result = [];

    foreach($methods as $a){
        $sql = "SELECT COUNT(*) as total FROM entrie WHERE method = '$a'";
        $query = mysqli_query($conn,$sql);
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
            $result [] = $row['total'];
        }
        
    }

    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($result);
?>