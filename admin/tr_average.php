<?php 
    session_start();

    include "connection.php";

    $content_type = $_POST['content_type'];
    $http_method = $_POST['method'];
    $day_of_the_week = $_POST['StartedDateTime'];
    $telephone_provider = $_POST['isp'];

    
    $sql = "SELECT HOUR(StartedDateTime) AS hour, 
        Round(AVG(wait),2) AS avg 
    FROM entrie
    WHERE DAYNAME(StartedDateTime) IN $day_of_the_week
        AND method IN $http_method
        AND content_type IN $content_type
        AND isp IN $telephone_provider 
    GROUP BY HOUR(StartedDateTime)";

    $query = mysqli_query($link,$sql);
    $result = [];
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) { 
        $result [] = [$row['hour'],$row['avg']];
    }
    mysqli_close($link);
    header('Content-Type: application/json');
    echo json_encode($result);
?>