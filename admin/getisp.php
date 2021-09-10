<?php 
    include "connection.php";
    $total = [];

    $sql = "SELECT DISTINCT isp from entrie ORDER BY isp ASC";
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        if($row['isp'] != ""){//μερικά κενά από ad block
            $total [] = $row['isp'];
        } 
        
    }
    echo json_encode($total);
    $conn->close();    
    header('Content-Type: application/json');                    
?>  