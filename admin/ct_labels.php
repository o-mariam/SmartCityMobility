<?php 
    include "connection.php";
    header('Content-Type: application/json');
    $result = [];

    $sql = "SELECT DISTINCT content_type from entrie ORDER BY content_type ASC";
    $query = mysqli_query($conn,$sql);
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
        if($row['content_type'] != ""){
            $result [] = $row['content_type'];
        } 
        
    }
    $conn->close();    
    
    echo json_encode($result);                             
?>   