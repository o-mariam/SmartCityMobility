<?php 
    include "connection.php";
    header('Content-Type: application/json');

    $sql = "SELECT content_type, round(AVG(age)/60,2) as average FROM entrie GROUP BY content_type";
    $query = mysqli_query($conn,$sql);
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $result [] = $row['average'];   
    }
    $conn->close();    
    echo json_encode($result);                             
?>   