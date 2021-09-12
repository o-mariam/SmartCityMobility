<?php 
    session_start();
    include 'connection.php';
    header('Content-Type: application/json');

    $status = ["status <='199'", "status >='200' AND status<='299'", "status >='300' AND status<='399'", "status >='400' AND status<='499'", "status >='500' AND status<='599'"];
    $result = [];

    foreach($status as $a)
    {
        $sql= "SELECT COUNT(*) as total from entrie where $a";
        $query = mysqli_query($conn,$sql);
        while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
            $result [] = $row['total'];
        }
    }

    $conn->close();
    echo json_encode($result);
?>