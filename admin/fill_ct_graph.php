<?php 
    include "connection.php";

    $sql = "SELECT content_type, round(AVG(age)/60,2) as average FROM entrie GROUP BY content_type";
    $query = mysqli_query($conn,$sql);
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
            $result [] = $row['average'];   
    }
    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($result);                             
?>   