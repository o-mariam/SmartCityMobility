<?php
    include 'connection.php';

    $result = [];

    $sql = "SELECT user_lat, user_long, latitude, longitude, COUNT(id)*100/(SELECT count(*) from entrie) 
    AS thick FROM entrie GROUP BY user_lat, user_long, latitude, longitude";
    
    $query = mysqli_query($conn, $sql);
    while ($row = $query->fetch_array(MYSQLI_ASSOC)){
        if($row['latitude'] != 0 && $row['longitude'] != 0){
            $result [] = [$row['user_lat'] , $row['user_long'] ,$row['latitude'] , $row['longitude'], $row['thick']];
        }
    }

    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($result);

?>