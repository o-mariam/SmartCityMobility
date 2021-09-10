<?php 
    include "connection.php";
    $total = array();

    $sql = "SELECT DISTINCT content_type from entrie ORDER BY content_type ASC";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $total[] = $row['content_type'];
        }
    }
    header('Content-Type: application/json');

    echo json_encode($total);
    $conn->close();
?>